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
 * @package    powereduc
 * @subpackage registration
 * @author     Jerome Mouneyrac <jerome@mouneyrac.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL
 * @copyright  (C) 1999 onwards Martin Dougiamas  http://dougiamas.com
 *
 * This page displays the site registration form.
 * It handles redirection to the hub to continue the registration workflow process.
 * It also handles update operation by web service.
 */

require_once('../../config.php');
require_once($CFG->libdir . '/adminlib.php');

admin_externalpage_setup('registrationpowereducorg');

$unregistration = optional_param('unregistration', false, PARAM_BOOL);
$confirm = optional_param('confirm', false, PARAM_BOOL);

if ($unregistration && \core\hub\registration::is_registered()) {
    if ($confirm) {
        require_sesskey();
        \core\hub\registration::unregister(false, false);

        if (!\core\hub\registration::is_registered()) {
            redirect(new powereduc_url('/admin/registration/index.php'));
        }
    }

    echo $OUTPUT->header();
    echo $OUTPUT->confirm(
        get_string('registerwithpowereducorgremove', 'core_hub'),
        new powereduc_url(new powereduc_url('/admin/registration/index.php', ['unregistration' => 1, 'confirm' => 1])),
        new powereduc_url(new powereduc_url('/admin/registration/index.php'))
    );
    echo $OUTPUT->footer();
    exit;
}

$isinitialregistration = \core\hub\registration::show_after_install(true);
if (!$returnurl = optional_param('returnurl', null, PARAM_LOCALURL)) {
    $returnurl = $isinitialregistration ? '/admin/index.php' : '/admin/registration/index.php';
}

$siteregistrationform = new \core\hub\site_registration_form();
$siteregistrationform->set_data(['returnurl' => $returnurl]);
if ($fromform = $siteregistrationform->get_data()) {

    // Save the settings.
    \core\hub\registration::save_site_info($fromform);

    if (\core\hub\registration::is_registered()) {
        if (\core\hub\registration::update_manual()) {
            redirect(new powereduc_url($returnurl));
        }
        redirect(new powereduc_url('/admin/registration/index.php', ['returnurl' => $returnurl]));
    } else {
        \core\hub\registration::register($returnurl);
        // This method will redirect away.
    }

}

// OUTPUT SECTION.

echo $OUTPUT->header();

// Current status of registration.

$notificationtype = \core\output\notification::NOTIFY_ERROR;
if (\core\hub\registration::is_registered()) {
    $lastupdated = \core\hub\registration::get_last_updated();
    if ($lastupdated == 0) {
        $registrationmessage = get_string('pleaserefreshregistrationunknown', 'admin');
    } else if (\core\hub\registration::get_new_registration_fields()) {
        $registrationmessage = get_string('pleaserefreshregistrationnewdata', 'admin');
    } else {
        $lastupdated = userdate($lastupdated, get_string('strftimedate', 'langconfig'));
        $registrationmessage = get_string('pleaserefreshregistration', 'admin', $lastupdated);
        $notificationtype = \core\output\notification::NOTIFY_INFO;
    }
    echo $OUTPUT->notification($registrationmessage, $notificationtype);
} else if (!$isinitialregistration) {
    $registrationmessage = get_string('registrationwarning', 'admin');
    echo $OUTPUT->notification($registrationmessage, $notificationtype);
}

// Heading.
if (\core\hub\registration::is_registered()) {
    echo $OUTPUT->heading(get_string('registerwithpowereducorgupdate', 'core_hub'));
} else if ($isinitialregistration) {
    echo $OUTPUT->heading(get_string('registerwithpowereducorgcomplete', 'core_hub'));
} else {
    echo $OUTPUT->heading(get_string('registerwithpowereducorg', 'core_hub'));
}

$renderer = $PAGE->get_renderer('core', 'admin');
echo $renderer->powereducorg_registration_message();

$siteregistrationform->display();

if (\core\hub\registration::is_registered()) {
    // Unregister link.
    $unregisterhuburl = new powereduc_url("/admin/registration/index.php", ['unregistration' => 1]);
    echo html_writer::div(html_writer::link($unregisterhuburl, get_string('unregister', 'hub')), 'unregister mt-2');
} else if ($isinitialregistration) {
    echo html_writer::div(html_writer::link(new powereduc_url($returnurl), get_string('skipregistration', 'hub')),
        'skipregistration mt-2');
}
echo $OUTPUT->footer();
