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
 * Competency framework viewed event.
 *
 * @package    core_competency
 * @copyright  2016 Issam Taboubi <issam.taboubi@umontreal.ca>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace core\event;

use core\event\base;
use core_competency\competency_framework;

defined('POWEREDUC_INTERNAL') || die();

/**
 * Competency framework viewed event class.
 *
 * @package    core_competency
 * @since      PowerEduc 3.1
 * @copyright  2016 Issam Taboubi <issam.taboubi@umontreal.ca>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class competency_framework_viewed extends base {

    /**
     * Convenience method to instantiate the event.
     *
     * @param competency_framework $framework The framework.
     * @return self
     */
    public static function create_from_framework(competency_framework $framework) {
        if (!$framework->get('id')) {
            throw new \coding_exception('The competency framework ID must be set.');
        }
        $event = static::create(array(
            'contextid' => $framework->get('contextid'),
            'objectid' => $framework->get('id')
        ));
        $event->add_record_snapshot(competency_framework::TABLE, $framework->to_record());
        return $event;
    }

    /**
     * Returns description of what happened.
     *
     * @return string
     */
    public function get_description() {
        return "The user with id '$this->userid' viewed the competency framework with id '$this->objectid'";
    }

    /**
     * Return localised event name.
     *
     * @return string
     */
    public static function get_name() {
        return get_string('eventcompetencyframeworkviewed', 'core_competency');
    }

    /**
     * Returns relevant URL.
     *
     * @return \powereduc_url
     */
    public function get_url() {
        return \core_competency\url::framework($this->objectid, $this->contextid);
    }

    /**
     * Init method.
     *
     * @return void
     */
    protected function init() {
        $this->data['crud'] = 'r';
        $this->data['edulevel'] = self::LEVEL_OTHER;
        $this->data['objecttable'] = competency_framework::TABLE;
    }

    /**
     * Get_objectid_mapping method.
     *
     * @return string the name of the restore mapping the objectid links to
     */
    public static function get_objectid_mapping() {
        return base::NOT_MAPPED;
    }

}
