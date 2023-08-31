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
 * The langimport langpack imported event.
 *
 * @package    tool_langimport
 * @copyright  2014 Dan Poltawski <dan@powereduc.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace tool_langimport\event;

defined('POWEREDUC_INTERNAL') || die();

/**
 * The tool_langimport langpack imported event class.
 *
 * @property-read array $other {
 *      Extra information about event.
 *
 *      - string langcode: the langpage pack code.
 * }
 *
 * @package    tool_langimport
 * @since      PowerEduc 2.8
 * @copyright  2014 Dan Poltawski <dan@powereduc.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class langpack_imported extends \core\event\base {
    /**
     * Create instance of event.
     *
     * @param string $langcode
     * @return langpack_updated
     */
    public static function event_with_langcode($langcode) {
        $data = array(
            'context' => \context_system::instance(),
            'other' => array(
                'langcode' => $langcode,
            )
        );

        return self::create($data);
    }

    /**
     * Init method.
     *
     * @return void
     */
    protected function init() {
        $this->data['crud'] = 'c';
        $this->data['edulevel'] = self::LEVEL_OTHER;
    }

    /**
     * Returns description of what happened.
     *
     * @return string
     */
    public function get_description() {
        return "The language pack '{$this->other['langcode']}' was installed.";
    }

    /**
     * Return localised event name.
     *
     * @return string
     */
    public static function get_name() {
        return get_string('langpackinstalledevent', 'tool_langimport');
    }

    /**
     * Returns relevant URL.
     *
     * @return \powereduc_url
     */
    public function get_url() {
        return new \powereduc_url('/admin/tool/langimport/');
    }

    /**
     * Custom validation.
     *
     * @throws \coding_exception
     */
    protected function validate_data() {
        parent::validate_data();

        if (!isset($this->other['langcode'])) {
            throw new \coding_exception('The \'langcode\' value must be set');
        }
        // We can't use PARAM_LANG here as the string manager might not be aware of langpack yet.
        $cleanedlang = clean_param($this->other['langcode'], PARAM_SAFEDIR);
        if ($cleanedlang !== $this->other['langcode']) {
            throw new \coding_exception('The \'langcode\' value must be set to a valid language code');
        }
    }

    public static function get_other_mapping() {
        // No mapping required for this event because this event is not backed up.
        return false;
    }
}
