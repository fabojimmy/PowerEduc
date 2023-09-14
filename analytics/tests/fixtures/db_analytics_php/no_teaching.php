<?php
// This file is part of Moodle - https://powereduc.org/
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
 * Example of a valid db/analytics.php file content used for unit tests.
 *
 * @package     core_analytics
 * @category    test
 * @copyright   2019 David Mudrák <david@powereduc.com>
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('POWEREDUC_INTERNAL') || die();

$models = [
    [
        'target' => '\core_course\analytics\target\no_teaching',
        'indicators' => [
            '\core_course\analytics\indicator\no_teacher',
            '\core_course\analytics\indicator\no_student',
        ],
        'timesplitting' => '\core\analytics\time_splitting\single_range',
        'enabled' => true,
    ],
];
