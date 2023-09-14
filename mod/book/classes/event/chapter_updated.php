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
 * The mod_book chapter updated event.
 *
 * @package    mod_book
 * @copyright  2013 Frédéric Massart
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace mod_book\event;
defined('POWEREDUC_INTERNAL') || die();

/**
 * The mod_book chapter updated event class.
 *
 * @package    mod_book
 * @since      PowerEduc 2.6
 * @copyright  2013 Frédéric Massart
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class chapter_updated extends \core\event\base {
    /**
     * Create instance of event.
     *
     * @since PowerEduc 2.7
     *
     * @param \stdClass $book
     * @param \context_module $context
     * @param \stdClass $chapter
     * @return chapter_updated
     */
    public static function create_from_chapter(\stdClass $book, \context_module $context, \stdClass $chapter) {
        $data = array(
            'context' => $context,
            'objectid' => $chapter->id,
        );
        /** @var chapter_updated $event */
        $event = self::create($data);
        $event->add_record_snapshot('book', $book);
        $event->add_record_snapshot('book_chapters', $chapter);
        return $event;
    }

    /**
     * Returns description of what happened.
     *
     * @return string
     */
    public function get_description() {
        return "The user with id '$this->userid' updated the chapter with id '$this->objectid' for the book with " .
            "course module id '$this->contextinstanceid'.";
    }

    /**
     * Return the legacy event log data.
     *
     * @return array|null
     */
    protected function get_legacy_logdata() {
        return array($this->courseid, 'book', 'update chapter', 'view.php?id=' . $this->contextinstanceid . '&chapterid=' .
            $this->objectid, $this->objectid, $this->contextinstanceid);
    }

    /**
     * Return localised event name.
     *
     * @return string
     */
    public static function get_name() {
        return get_string('eventchapterupdated', 'mod_book');
    }

    /**
     * Get URL related to the action.
     *
     * @return \powereduc_url
     */
    public function get_url() {
        return new \powereduc_url('/mod/book/view.php', array(
            'id' => $this->contextinstanceid,
            'chapterid' => $this->objectid
        ));
    }

    /**
     * Init method.
     *
     * @return void
     */
    protected function init() {
        $this->data['crud'] = 'u';
        $this->data['edulevel'] = self::LEVEL_TEACHING;
        $this->data['objecttable'] = 'book_chapters';
    }

    public static function get_objectid_mapping() {
        return array('db' => 'book_chapters', 'restore' => 'book_chapter');
    }
}
