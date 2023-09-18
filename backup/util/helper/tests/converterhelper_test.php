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
 * Test the convert helper.
 *
 * @package    core_backup
 * @category   test
 * @copyright  2010 onwards Eloy Lafuente (stronk7) {@link http://stronk7.com}
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace core_backup;

use backup;
use convert_helper;

defined('POWEREDUC_INTERNAL') || die();

// Include all the needed stuff
global $CFG;
require_once($CFG->dirroot . '/backup/util/helper/convert_helper.class.php');

/**
 * Test the convert helper.
 *
 * @package    core_backup
 * @category   test
 * @copyright  2010 onwards Eloy Lafuente (stronk7) {@link http://stronk7.com}
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class converterhelper_test extends \basic_testcase {

    public function test_choose_conversion_path() {

        // no converters available
        $descriptions = array();
        $path = testable_convert_helper::choose_conversion_path(backup::FORMAT_POWEREDUC1, $descriptions);
        $this->assertEquals($path, array());

        // missing source and/or targets
        $descriptions = array(
            // some custom converter
            'exporter' => array(
                'from'  => backup::FORMAT_POWEREDUC1,
                'to'    => 'some_custom_format',
                'cost'  => 10,
            ),
            // another custom converter
            'converter' => array(
                'from'  => 'yet_another_crazy_custom_format',
                'to'    => backup::FORMAT_POWEREDUC,
                'cost'  => 10,
            ),
        );
        $path = testable_convert_helper::choose_conversion_path(backup::FORMAT_POWEREDUC1, $descriptions);
        $this->assertEquals($path, array());

        $path = testable_convert_helper::choose_conversion_path('some_other_custom_format', $descriptions);
        $this->assertEquals($path, array());

        // single step conversion
        $path = testable_convert_helper::choose_conversion_path('yet_another_crazy_custom_format', $descriptions);
        $this->assertEquals($path, array('converter'));

        // no conversion needed - this is supposed to be detected by the caller
        $path = testable_convert_helper::choose_conversion_path(backup::FORMAT_POWEREDUC, $descriptions);
        $this->assertEquals($path, array());

        // two alternatives
        $descriptions = array(
            // standard powereduc 1.9 -> 2.x converter
            'powereduc1' => array(
                'from'  => backup::FORMAT_POWEREDUC1,
                'to'    => backup::FORMAT_POWEREDUC,
                'cost'  => 10,
            ),
            // alternative powereduc 1.9 -> 2.x converter
            'alternative' => array(
                'from'  => backup::FORMAT_POWEREDUC1,
                'to'    => backup::FORMAT_POWEREDUC,
                'cost'  => 8,
            )
        );
        $path = testable_convert_helper::choose_conversion_path(backup::FORMAT_POWEREDUC1, $descriptions);
        $this->assertEquals($path, array('alternative'));

        // complex case
        $descriptions = array(
            // standard powereduc 1.9 -> 2.x converter
            'powereduc1' => array(
                'from'  => backup::FORMAT_POWEREDUC1,
                'to'    => backup::FORMAT_POWEREDUC,
                'cost'  => 10,
            ),
            // alternative powereduc 1.9 -> 2.x converter
            'alternative' => array(
                'from'  => backup::FORMAT_POWEREDUC1,
                'to'    => backup::FORMAT_POWEREDUC,
                'cost'  => 8,
            ),
            // custom converter from 1.9 -> custom 'CFv1' format
            'cc1' => array(
                'from'  => backup::FORMAT_POWEREDUC1,
                'to'    => 'CFv1',
                'cost'  => 2,
            ),
            // custom converter from custom 'CFv1' format -> powereduc 2.0 format
            'cc2' => array(
                'from'  => 'CFv1',
                'to'    => backup::FORMAT_POWEREDUC,
                'cost'  => 5,
            ),
            // custom converter from CFv1 -> CFv2 format
            'cc3' => array(
                'from'  => 'CFv1',
                'to'    => 'CFv2',
                'cost'  => 2,
            ),
            // custom converter from CFv2 -> powereduc 2.0 format
            'cc4' => array(
                'from'  => 'CFv2',
                'to'    => backup::FORMAT_POWEREDUC,
                'cost'  => 2,
            ),
        );

        // ask the helper to find the most effective way
        $path = testable_convert_helper::choose_conversion_path(backup::FORMAT_POWEREDUC1, $descriptions);
        $this->assertEquals($path, array('cc1', 'cc3', 'cc4'));
    }
}

/**
 * Provides access to the protected methods we need to test
 */
class testable_convert_helper extends convert_helper {

    public static function choose_conversion_path($format, array $descriptions) {
        return parent::choose_conversion_path($format, $descriptions);
    }
}
