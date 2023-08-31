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
 * Defines backup_glossary_activity_task class
 *
 * @package     mod_glossary
 * @category    backup
 * @copyright   2010 onwards Eloy Lafuente (stronk7) {@link http://stronk7.com}
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('POWEREDUC_INTERNAL') || die();

require_once($CFG->dirroot . '/mod/glossary/backup/powereduc2/backup_glossary_stepslib.php');

/**
 * Provides the steps to perform one complete backup of the Glossary instance
 */
class backup_glossary_activity_task extends backup_activity_task {

    /**
     * No specific settings for this activity
     */
    protected function define_my_settings() {
    }

    /**
     * Defines a backup step to store the instance data in the glossary.xml file
     */
    protected function define_my_steps() {
        $this->add_step(new backup_glossary_activity_structure_step('glossary_structure', 'glossary.xml'));
    }

    /**
     * Encodes URLs to the index.php and view.php scripts
     *
     * @param string $content some HTML text that eventually contains URLs to the activity instance scripts
     * @return string the content with the URLs encoded
     */
    static public function encode_content_links($content) {
        global $CFG;

        $base = preg_quote($CFG->wwwroot,"/");

        // Link to the list of glossaries
        $search="/(".$base."\/mod\/glossary\/index.php\?id\=)([0-9]+)/";
        $content= preg_replace($search, '$@GLOSSARYINDEX*$2@$', $content);

        // Link to glossary view by moduleid
        $search="/(".$base."\/mod\/glossary\/view.php\?id\=)([0-9]+)/";
        $content= preg_replace($search, '$@GLOSSARYVIEWBYID*$2@$', $content);

        // Link to glossary entry
        $search="/(".$base."\/mod\/glossary\/showentry.php\?courseid=)([0-9]+)(&|&amp;)eid=([0-9]+)/";
        $content = preg_replace($search, '$@GLOSSARYSHOWENTRY*$2*$4@$', $content);

        return $content;
    }
}
