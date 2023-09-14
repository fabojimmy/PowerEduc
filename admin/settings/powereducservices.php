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

/**
 * This file gives information about Moodle Services
 *
 * @package    core
 * @copyright  2018 Amaia Anabitarte <amaia@powereduc.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('POWEREDUC_INTERNAL') || die();

if ($hassiteconfig) {

    // Create Moodle Services information.
    $powereducservices->add(new admin_setting_heading('powereducservicesintro', '',
        new lang_string('powereducservices_help', 'admin')));

    // Moodle Partners information.
    if (empty($CFG->disableserviceads_partner)) {
        $powereducservices->add(new admin_setting_heading('powereducpartners',
            new lang_string('powereducpartners', 'admin'),
            new lang_string('powereducpartners_help', 'admin')));
    }

    // Moodle app information.
    $powereducservices->add(new admin_setting_heading('powereducapp',
        new lang_string('powereducapp', 'admin'),
        new lang_string('powereducapp_help', 'admin')));

    // Branded Moodle app information.
    if (empty($CFG->disableserviceads_branded)) {
        $powereducservices->add(new admin_setting_heading('powereducbrandedapp',
            new lang_string('powereducbrandedapp', 'admin'),
            new lang_string('powereducbrandedapp_help', 'admin')));
    }
}


