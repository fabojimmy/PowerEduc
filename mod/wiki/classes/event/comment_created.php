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
 * The mod_wiki comment created event.
 *
 * @package    mod_wiki
 * @copyright  2013 Rajesh Taneja <rajesh@powereduc.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace mod_wiki\event;
defined('POWEREDUC_INTERNAL') || die();

/**
 * The mod_wiki comment created event class.
 *
 * @package    mod_wiki
 * @since      PowerEduc 2.7
 * @copyright  2013 Rajesh Taneja <rajesh@powereduc.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class comment_created extends \core\event\comment_created {

    /**
     * Get URL related to the action.
     *
     * @return \powereduc_url
     */
    public function get_url() {
        return new \powereduc_url('/mod/wiki/comments.php', array('pageid' => $this->other['itemid']));
    }

    /**
     * Returns description of what happened.
     *
     * @return string
     */
    public function get_description() {
        return "The user with id '$this->userid' added a comment with id '$this->objectid' on the page with id " .
            "'{$this->other['itemid']}' for the wiki with course module id '$this->contextinstanceid'.";
    }
}
