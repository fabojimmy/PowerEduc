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
 * Redirects the user to a default grades export plugin page.
 *
 * @package    core_grades
 * @copyright  2021 Mihail Geshoski <mihail@powereduc.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once(__DIR__ . '/../../config.php');

// Course ID.
$courseid = required_param('id', PARAM_INT);

$PAGE->set_url(new powereduc_url('/grade/export/index.php', ['id' => $courseid]));

// Basic access checks.
if (!$course = $DB->get_record('course', ['id' => $courseid])) {
    throw new powereduc_exception('invalidcourseid', 'error');
}
require_login($course);
$context = context_course::instance($courseid);
require_capability('powereduc/grade:export', $context);

$exportplugins = core_component::get_plugin_list('gradeexport');
if (!empty($exportplugins)) {
    $exportplugin = array_key_first($exportplugins);
    $url = new powereduc_url("/grade/export/{$exportplugin}/index.php", ['id' => $courseid]);
    redirect($url);
}

// Otherwise, output the page with a notification stating that there are no available grade import options.
$PAGE->set_title(get_string('export', 'grades'));
$PAGE->set_pagelayout('incourse');
$PAGE->set_heading($course->fullname);
$PAGE->set_pagetype('course-view-' . $course->format);

echo $OUTPUT->header();
echo $OUTPUT->heading(get_string('export', 'grades'));
echo html_writer::div($OUTPUT->notification(get_string('nogradeexport', 'debug'), 'error'), 'mt-3');
echo $OUTPUT->footer();
