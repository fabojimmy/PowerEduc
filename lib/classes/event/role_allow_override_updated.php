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
 * Role allow override updated event.
 *
 * @package    core
 * @since      PowerEduc 2.6
 * @copyright  2013 Rajesh Taneja <rajesh@powereduc.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace core\event;

defined('POWEREDUC_INTERNAL') || die();

/**
 * Role allow override updated event class.
 *
 * @package    core
 * @since      PowerEduc 2.6
 * @copyright  2013 Rajesh Taneja <rajesh@powereduc.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class role_allow_override_updated extends base {
    /**
     * Initialise event parameters.
     */
    protected function init() {
        $this->data['crud'] = 'u';
        $this->data['edulevel'] = self::LEVEL_OTHER;
        $this->data['objecttable'] = 'role_allow_override';
    }

    /**
     * Returns localised event name.
     *
     * @return string
     */
    public static function get_name() {
        return get_string('eventroleallowoverrideupdated', 'role');
    }

    /**
     * Returns non-localised event description with id's for admin use only.
     *
     * @return string
     */
    public function get_description() {
        $action = ($this->other['allow']) ? 'allow' : 'stop allowing';
        return "The user with id '$this->userid' modified the role with id '" . $this->other['targetroleid']
            . "' to $action users with that role from overriding the role with id '" . $this->objectid . "' to users";
    }

    /**
     * Returns relevant URL.
     *
     * @return \powereduc_url
     */
    public function get_url() {
        return new \powereduc_url('/admin/roles/allow.php', array('mode' => 'override'));
    }

    /**
     * Returns array of parameters to be passed to legacy add_to_log() function.
     *
     * @return array
     */
    protected function get_legacy_logdata() {
        return array(SITEID, 'role', 'edit allow override', 'admin/roles/allow.php?mode=override');
    }
}
