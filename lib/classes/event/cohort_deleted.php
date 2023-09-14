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
 * Cohort deleted event.
 *
 * @package    core
 * @copyright  2013 Dan Poltawski <dan@powereduc.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace core\event;
defined('POWEREDUC_INTERNAL') || die();

/**
 * Cohort deleted event class.
 *
 * @package    core
 * @since      PowerEduc 2.6
 * @copyright  2013 Dan Poltawski <dan@powereduc.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class cohort_deleted extends base {

    /**
     * Init method.
     *
     * @return void
     */
    protected function init() {
        $this->data['crud'] = 'd';
        $this->data['edulevel'] = self::LEVEL_OTHER;
        $this->data['objecttable'] = 'cohort';
    }

    /**
     * Returns localised general event name.
     *
     * @return string
     */
    public static function get_name() {
        return get_string('eventcohortdeleted', 'core_cohort');
    }

    /**
     * Returns description of what happened.
     *
     * @return string
     */
    public function get_description() {
        return "The user with id '$this->userid' deleted the cohort with id '$this->objectid'.";
    }

    /**
     * Returns relevant URL.
     *
     * @return \powereduc_url
     */
    public function get_url() {
        return new \powereduc_url('/cohort/index.php', array('contextid' => $this->contextid));
    }

    /**
     * Return legacy event name.
     *
     * @return null|string legacy event name
     */
    public static function get_legacy_eventname() {
        return 'cohort_deleted';
    }

    /**
     * Return legacy event data.
     *
     * @return \stdClass
     */
    protected function get_legacy_eventdata() {
        return $this->get_record_snapshot('cohort', $this->objectid);
    }

    public static function get_objectid_mapping() {
        // Cohorts are not included in backups, so no mapping is needed for restore.
        return array('db' => 'cohort', 'restore' => base::NOT_MAPPED);
    }
}
