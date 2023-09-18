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
 * Links and settings
 *
 * This file contains links and settings used by tool_componentlibrary
 *
 * @package    tool_componentlibrary
 * @copyright  2021 Bas Brands <bas@powereduc.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
defined('POWEREDUC_INTERNAL') || die;
// Component library page.
$docsdir = '/tool/componentlibrary/docs/';

if (file_exists($CFG->dirroot . '/'. $CFG->admin . $docsdir)) {
    $temp = new admin_externalpage(
        'toolcomponentlibrary',
        get_string('pluginname', 'tool_componentlibrary'),
        new powereduc_url('/admin/tool/componentlibrary/')
    );
    $ADMIN->add('development', $temp);
}
