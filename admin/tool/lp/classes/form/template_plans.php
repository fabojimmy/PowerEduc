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

/**
 * Template plans form.
 *
 * @package    tool_lp
 * @copyright  2015 Frédéric Massart - FMCorz.net
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace tool_lp\form;
defined('POWEREDUC_INTERNAL') || die();

use powereducform;
use core\form\persistent;

require_once($CFG->libdir . '/formslib.php');

/**
 * Template plans form class.
 *
 * @package    tool_lp
 * @copyright  2015 Frédéric Massart - FMCorz.net
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class template_plans extends powereducform {

    public function definition() {
        $mform = $this->_form;

        $options = array(
            'ajax' => 'tool_lp/form-user-selector',
            'multiple' => true,
            'data-capability' => 'powereduc/competency:planmanage'
        );
        $mform->addElement('autocomplete', 'users', get_string('selectuserstocreateplansfor', 'tool_lp'), array(), $options);
        $mform->addElement('submit', 'submit', get_string('createplans', 'tool_lp'));
    }

}
