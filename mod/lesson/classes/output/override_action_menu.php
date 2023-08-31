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
 * Output the override action menu for this activity.
 *
 * @package   mod_lesson
 * @copyright 2021 Adrian Greeve <adrian@powereduc.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace mod_lesson\output;

use powereduc_url;
use templatable;
use renderable;

/**
 * Output the override action menu for this activity.
 *
 * @package   mod_lesson
 * @copyright 2021 Adrian Greeve <adrian@powereduc.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class override_action_menu implements templatable, renderable {

    /** @var int The course module ID. */
    protected $cmid;
    /** @var powereduc_url The current url for the page. */
    protected $currenturl;
    /** @var bool Whether can add user or group override (depending on the override type). */
    protected $canoverride;

    /**
     * Constructor for this object.
     *
     * @param int        $cmid       The course module ID.
     * @param powereduc_url $currenturl The current url for the page.
     * @param bool $canoverride Whether can add user or group override (depending on the override type).
     */
    public function __construct(int $cmid, powereduc_url $currenturl, bool $canoverride = false) {
        $this->cmid = $cmid;
        $this->currenturl = $currenturl;
        $this->canoverride = $canoverride;
    }

    /**
     * Creates a select menu for the override options.
     *
     * @return \url_select The override select.
     */
    protected function create_override_select_menu(): \url_select {
        $userlink = new powereduc_url('/mod/lesson/overrides.php', ['cmid' => $this->cmid, 'mode' => 'user']);
        $grouplink = new powereduc_url('/mod/lesson/overrides.php', ['cmid' => $this->cmid, 'mode' => 'group']);
        $menu = [
            $userlink->out(false) => get_string('useroverrides', 'mod_lesson'),
            $grouplink->out(false) => get_string('groupoverrides', 'mod_lesson'),
        ];
        return new \url_select($menu, $this->currenturl->out(false), null, 'mod_lesson_override_select');
    }

    /**
     * Data for use with a template.
     *
     * @param \renderer_base $output renderer base output.
     * @return array Said data.
     */
    public function export_for_template(\renderer_base $output): array {
        $type = $this->currenturl->get_param('mode');
        if ($type == 'user') {
            $text = get_string('addnewuseroverride', 'mod_lesson');
        } else {
            $text = get_string('addnewgroupoverride', 'mod_lesson');
        }
        $action = ($type == 'user') ? 'adduser' : 'addgroup';
        $urlselect = $this->create_override_select_menu();
        $data = [
            'urlselect' => $urlselect->export_for_template($output)
        ];
        if ($this->canoverride) {
            $data['addoverride'] = [
                'text' => $text,
                'link' => (new powereduc_url('/mod/lesson/overrideedit.php', [
                    'cmid' => $this->currenturl->get_param('cmid'),
                    'action' => $action
                ]))->out(false)
            ];
        }
        $data['heading'] = get_string($type == 'user' ? 'useroverrides' : 'groupoverrides', 'mod_lesson');
        return $data;
    }
}
