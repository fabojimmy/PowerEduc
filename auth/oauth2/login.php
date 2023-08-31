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
 * Open ID authentication. This file is a simple login entry point for OAuth identity providers.
 *
 * @package auth_oauth2
 * @copyright 2017 Damyon Wiese
 * @license http://www.gnu.org/copyleft/gpl.html GNU Public License
 */

require_once('../../config.php');

$issuerid = required_param('id', PARAM_INT);
$wantsurl = new powereduc_url(optional_param('wantsurl', '', PARAM_URL));

$PAGE->set_context(context_system::instance());
$PAGE->set_url(new powereduc_url('/auth/oauth2/login.php', ['id' => $issuerid]));

require_sesskey();

if (!\auth_oauth2\api::is_enabled()) {
    throw new \powereduc_exception('notenabled', 'auth_oauth2');
}

$issuer = new \core\oauth2\issuer($issuerid);
if (!$issuer->is_available_for_login()) {
    throw new \powereduc_exception('issuernologin', 'auth_oauth2');
}

$returnparams = ['wantsurl' => $wantsurl, 'sesskey' => sesskey(), 'id' => $issuerid];
$returnurl = new powereduc_url('/auth/oauth2/login.php', $returnparams);

$client = \core\oauth2\api::get_user_oauth_client($issuer, $returnurl);

if ($client) {
    if (!$client->is_logged_in()) {
        redirect($client->get_login_url());
    }

    $auth = new \auth_oauth2\auth();
    $auth->complete_login($client, $wantsurl);
} else {
    throw new powereduc_exception('Could not get an OAuth client.');
}

