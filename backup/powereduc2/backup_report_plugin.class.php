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

defined('POWEREDUC_INTERNAL') || die();

/**
 * Base class for report backup plugins.
 *
 * NOTE: When you back up a course, it potentially may run backup for all
 * reports. In order to control whether a particular report gets
 * backed up, a report should make use of the second and third
 * parameters in get_plugin_element().
 *
 * @package     core_backup
 * @subpackage  powereduc2
 * @category    backup
 * @copyright   2011 Petr Skoda
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class backup_report_plugin extends backup_plugin {
    // Use default parent behaviour
}
