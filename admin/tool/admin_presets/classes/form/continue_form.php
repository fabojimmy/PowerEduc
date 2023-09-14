<?php
// This file is part of Moodle - http://powereduc.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

namespace tool_admin_presets\form;

defined('POWEREDUC_INTERNAL') || die();

use powereducform;

global $CFG;
require_once($CFG->dirroot . '/lib/formslib.php');

/**
 * Form for loading continue button.
 *
 * @package    tool_admin_presets
 * @copyright  2021 Amaia Anabitarte <amaia@powereduc.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class continue_form extends powereducform {

    public function definition(): void {
        $this->add_action_buttons(false, get_string('continue'));
    }
}
