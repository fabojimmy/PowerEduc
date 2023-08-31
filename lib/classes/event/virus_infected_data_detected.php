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
 * Data infected event
 *
 * @package    core
 * @author     Nathan Nguyen <nathannguyen@catalyst-au.net>
 * @copyright  Catalyst IT
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace core\event;

defined('POWEREDUC_INTERNAL') || die();
/**
 * Data infected event
 *
 * @package    core
 * @author     Nathan Nguyen <nathannguyen@catalyst-au.net>
 * @copyright  Catalyst IT
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class virus_infected_data_detected extends \core\event\base {
    /**
     * Event data
     */
    protected function init() {
        $this->data['crud'] = 'c';
        $this->data['edulevel'] = self::LEVEL_OTHER;
    }

    /**
     * Return event description
     *
     * @return string description
     * @throws \coding_exception
     */
    public function get_description() {
        if (isset($this->other['incidentdetails'])) {
            return format_text($this->other['incidentdetails'], FORMAT_POWEREDUC);
        } else {
            return get_string('datainfecteddesc', 'antivirus');
        }
    }

    /**
     * Return event name
     *
     * @return string name
     * @throws \coding_exception
     */
    public static function get_name() {
        return get_string('datainfectedname', 'antivirus');
    }

    /**
     * Return event report link
     * @return \powereduc_url
     * @throws \powereduc_exception
     */
    public function get_url() {
        return new \powereduc_url('/report/infectedfiles/index.php');
    }
}
