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
 * Message contact added event.
 *
 * @package    core
 * @copyright  2014 Mark Nelson <markn@powereduc.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace core\event;

defined('POWEREDUC_INTERNAL') || die();

/**
 * Message contact added event class.
 *
 * @package    core
 * @since      PowerEduc 2.7
 * @copyright  2014 Mark Nelson <markn@powereduc.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class message_contact_added extends base {

    /**
     * Init method.
     */
    protected function init() {
        $this->data['objecttable'] = 'message_contacts';
        $this->data['crud'] = 'c';
        $this->data['edulevel'] = self::LEVEL_OTHER;
    }

    /**
     * Returns localised general event name.
     *
     * @return string
     */
    public static function get_name() {
        return get_string('eventmessagecontactadded', 'message');
    }

    /**
     * Returns relevant URL.
     *
     * @return \powereduc_url
     */
    public function get_url() {
        return new \powereduc_url('/message/index.php', array('user1' => $this->userid, 'user2' => $this->relateduserid));
    }

    /**
     * Returns description of what happened.
     *
     * @return string
     */
    public function get_description() {
        return "The user with id '$this->userid' added the user with id '$this->relateduserid' to their contact list.";
    }

    /**
     * Return legacy data for add_to_log().
     *
     * @return array
     */
    protected function get_legacy_logdata() {
        return array(SITEID, 'message', 'add contact', 'index.php?user1=' . $this->relateduserid .
            '&amp;user2=' . $this->userid, $this->relateduserid);
    }

    /**
     * Custom validation.
     *
     * @throws \coding_exception
     */
    protected function validate_data() {
        parent::validate_data();

        if (!isset($this->relateduserid)) {
            throw new \coding_exception('The \'relateduserid\' must be set.');
        }
    }

    public static function get_objectid_mapping() {
        // Messaging contacts are not backed up, so no need to map them on restore.
        return array('db' => 'message_contacts', 'restore' => base::NOT_MAPPED);
    }
}
