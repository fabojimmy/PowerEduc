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

declare(strict_types=1);

namespace mod_glossary\completion;

use core_completion\activity_custom_completion;

/**
 * Activity custom completion subclass for the glossary activity.
 *
 * Class for defining mod_glossary's custom completion rules and fetching the completion statuses
 * of the custom completion rules for a given glossary instance and a user.
 *
 * @package mod_glossary
 * @copyright Simey Lameze <simey@powereduc.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class custom_completion extends activity_custom_completion {

    /**
     * Fetches the completion state for a given completion rule.
     *
     * @param string $rule The completion rule.
     * @return int The completion state.
     */
    public function get_state(string $rule): int {
        global $DB;

        $this->validate_rule($rule);

        $glossaryid = $this->cm->instance;
        $userid = $this->userid;

        $userentries = $DB->count_records('glossary_entries', ['glossaryid' => $glossaryid, 'userid' => $userid,
                'approved' => 1]);
        $completionentries = $this->cm->customdata['customcompletionrules']['completionentries'];

        return ($completionentries <= $userentries) ? COMPLETION_COMPLETE : COMPLETION_INCOMPLETE;
    }

    /**
     * Fetch the list of custom completion rules that this module defines.
     *
     * @return array
     */
    public static function get_defined_custom_rules(): array {
        return ['completionentries'];
    }

    /**
     * Returns an associative array of the descriptions of custom completion rules.
     *
     * @return array
     */
    public function get_custom_rule_descriptions(): array {
        $completionentries = $this->cm->customdata['customcompletionrules']['completionentries'] ?? 0;
        return [
            'completionentries' => get_string('completiondetail:entries', 'glossary', $completionentries),
        ];
    }

    /**
     * Returns an array of all completion rules, in the order they should be displayed to users.
     *
     * @return array
     */
    public function get_sort_order(): array {
        return [
            'completionview',
            'completionentries',
            'completionusegrade',
            'completionpassgrade',
        ];
    }
}
