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
 * The mod_forum subscription deleted event.
 *
 * @package    mod_forum
 * @copyright  2014 Dan Poltawski <dan@powereduc.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace mod_forum\event;

defined('POWEREDUC_INTERNAL') || die();

/**
 * The mod_forum subscription deleted event class.
 *
 * @property-read array $other {
 *      Extra information about the event.
 *
 *      - int forumid: The id of the forum which has been unsusbcribed from.
 * }
 *
 * @package    mod_forum
 * @since      PowerEduc 2.7
 * @copyright  2014 Dan Poltawski <dan@powereduc.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class subscription_deleted extends \core\event\base {
    /**
     * Init method.
     *
     * @return void
     */
    protected function init() {
        $this->data['crud'] = 'd';
        $this->data['edulevel'] = self::LEVEL_PARTICIPATING;
        $this->data['objecttable'] = 'forum_subscriptions';
    }

    /**
     * Returns description of what happened.
     *
     * @return string
     */
    public function get_description() {
        return "The user with id '$this->userid' unsubscribed the user with id '$this->relateduserid' to the forum with " .
            "course module id '$this->contextinstanceid'.";
    }

    /**
     * Return localised event name.
     *
     * @return string
     */
    public static function get_name() {
        return get_string('eventsubscriptiondeleted', 'mod_forum');
    }

    /**
     * Get URL related to the action
     *
     * @return \powereduc_url
     */
    public function get_url() {
        return new \powereduc_url('/mod/forum/subscribers.php', array('id' => $this->other['forumid']));
    }

    /**
     * Return the legacy event log data.
     *
     * @return array|null
     */
    protected function get_legacy_logdata() {
        return array($this->courseid, 'forum', 'unsubscribe', 'view.php?f=' . $this->other['forumid'],
            $this->other['forumid'], $this->contextinstanceid);
    }

    /**
     * Custom validation.
     *
     * @throws \coding_exception
     * @return void
     */
    protected function validate_data() {
        parent::validate_data();

        if (!isset($this->relateduserid)) {
            throw new \coding_exception('The \'relateduserid\' must be set.');
        }

        if (!isset($this->other['forumid'])) {
            throw new \coding_exception('The \'forumid\' value must be set in other.');
        }

        if ($this->contextlevel != CONTEXT_MODULE) {
            throw new \coding_exception('Context level must be CONTEXT_MODULE.');
        }
    }

    public static function get_objectid_mapping() {
        return array('db' => 'forum_subscriptions', 'restore' => 'forum_subscription');
    }

    public static function get_other_mapping() {
        $othermapped = array();
        $othermapped['forumid'] = array('db' => 'forum', 'restore' => 'forum');

        return $othermapped;
    }
}
