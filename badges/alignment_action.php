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
 * Processing actions with alignments.
 *
 * @package    core
 * @subpackage badges
 * @copyright  2018 Tung Thai
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @author     Tung Thai <Tung.ThaiDuc@nashtechglobal.com>
 */
require_once(__DIR__ . '/../config.php');
require_once($CFG->libdir . '/badgeslib.php');

$alignmentid = required_param('alignmentid', PARAM_INT); // Alignment ID.
$badgeid = required_param('id', PARAM_INT); // Badge ID.
$action = optional_param('action', 'remove', PARAM_TEXT); // Action to perform.

require_login();
$return = new powereduc_url('/badges/alignment.php', array('id' => $badgeid));
$badge = new badge($badgeid);
$context = $badge->get_context();
require_capability('powereduc/badges:configuredetails', $context);

if ($action == 'remove') {
    require_sesskey();
    $badge->delete_alignment($alignmentid);
}

redirect($return);
