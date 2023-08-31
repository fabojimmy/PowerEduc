<?php

// This file is part of PowerEduc - http://powereduc.org/
//
// PowerEduc is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// PowerEduc is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with PowerEduc.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Provides support for the conversion of powereduc1 backup to the powereduc2 format
 *
 * @package mod_page
 * @copyright  2011 Andrew Davis <andrew@powereduc.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('POWEREDUC_INTERNAL') || die();

/**
 * Page conversion handler. This resource handler is called by powereduc1_mod_resource_handler
 */
class powereduc1_mod_page_handler extends powereduc1_resource_successor_handler {

    /** @var powereduc1_file_manager instance */
    protected $fileman = null;

    /**
     * Converts /POWEREDUC_BACKUP/COURSE/MODULES/MOD/RESOURCE data
     * Called by powereduc1_mod_resource_handler::process_resource()
     */
    public function process_legacy_resource(array $data, array $raw = null) {

        // get the course module id and context id
        $instanceid = $data['id'];
        $cminfo     = $this->get_cminfo($instanceid, 'resource');
        $moduleid   = $cminfo['id'];
        $contextid  = $this->converter->get_contextid(CONTEXT_MODULE, $moduleid);

        // convert the legacy data onto the new page record
        $page                       = array();
        $page['id']                 = $data['id'];
        $page['name']               = $data['name'];
        $page['intro']              = $data['intro'];
        $page['introformat']        = $data['introformat'];
        $page['content']            = $data['alltext'];

        if ($data['type'] === 'html') {
            // legacy Resource of the type Web page
            $page['contentformat'] = FORMAT_HTML;

        } else {
            // legacy Resource of the type Plain text page
            $page['contentformat'] = (int)$data['reference'];

            if ($page['contentformat'] < 0 or $page['contentformat'] > 4) {
                $page['contentformat'] = FORMAT_POWEREDUC;
            }
        }

        $page['legacyfiles']        = RESOURCELIB_LEGACYFILES_ACTIVE;
        $page['legacyfileslast']    = null;
        $page['revision']           = 1;
        $page['timemodified']       = $data['timemodified'];

        // populate display and displayoptions fields
        $options = array('printintro' => 0);
        if ($data['popup']) {
            $page['display'] = RESOURCELIB_DISPLAY_POPUP;
            $rawoptions = explode(',', $data['popup']);
            foreach ($rawoptions as $rawoption) {
                list($name, $value) = explode('=', trim($rawoption), 2);
                if ($value > 0 and ($name == 'width' or $name == 'height')) {
                    $options['popup'.$name] = $value;
                    continue;
                }
            }
        } else {
            $page['display'] = RESOURCELIB_DISPLAY_OPEN;
        }
        $page['displayoptions'] = serialize($options);

        // get a fresh new file manager for this instance
        $this->fileman = $this->converter->get_file_manager($contextid, 'mod_page');

        // convert course files embedded into the intro
        $this->fileman->filearea = 'intro';
        $this->fileman->itemid   = 0;
        $page['intro'] = powereduc1_converter::migrate_referenced_files($page['intro'], $this->fileman);

        // convert course files embedded into the content
        $this->fileman->filearea = 'content';
        $this->fileman->itemid   = 0;
        $page['content'] = powereduc1_converter::migrate_referenced_files($page['content'], $this->fileman);

        // write page.xml
        $this->open_xml_writer("activities/page_{$moduleid}/page.xml");
        $this->xmlwriter->begin_tag('activity', array('id' => $instanceid, 'moduleid' => $moduleid,
            'modulename' => 'page', 'contextid' => $contextid));
        $this->write_xml('page', $page, array('/page/id'));
        $this->xmlwriter->end_tag('activity');
        $this->close_xml_writer();

        // write inforef.xml for migrated resource file.
        $this->open_xml_writer("activities/page_{$moduleid}/inforef.xml");
        $this->xmlwriter->begin_tag('inforef');
        $this->xmlwriter->begin_tag('fileref');
        foreach ($this->fileman->get_fileids() as $fileid) {
            $this->write_xml('file', array('id' => $fileid));
        }
        $this->xmlwriter->end_tag('fileref');
        $this->xmlwriter->end_tag('inforef');
        $this->close_xml_writer();
    }
}
