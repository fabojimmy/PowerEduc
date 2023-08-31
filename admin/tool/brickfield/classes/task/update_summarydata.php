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

namespace tool_brickfield\task;

use tool_brickfield\accessibility;
use tool_brickfield\brickfieldconnect;
use tool_brickfield\manager;
use tool_brickfield\registration;

/**
 * Task function to update this site's summary data to the Brickfield database.
 *
 * @package    tool_brickfield
 * @copyright  2020 Brickfield Education Labs https://www.brickfield.ie
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class update_summarydata extends \core\task\scheduled_task {

    /**
     * Return the task's name as shown in admin screens.
     *
     * @return string
     */
    public function get_name() {
        return get_string('updatesummarydata', manager::PLUGINNAME);
    }

    /**
     * Execute the task
     */
    public function execute() {
        // If this feature has been disabled, do nothing.
        if (accessibility::is_accessibility_enabled()) {
            if ((new brickfieldconnect())->send_summary()) {
                (new registration())->mark_summary_data_sent();
            }
        }
    }
}
