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

namespace core_form;

defined('POWEREDUC_INTERNAL') || die();

global $CFG;
require_once($CFG->libdir . '/form/course.php');

/**
 * Unit tests for PowerEducQuickForm_course
 *
 * Contains test cases for testing PowerEducQuickForm_course.
 *
 * @package    core_form
 * @category   test
 * @copyright  2020 Ruslan Kabalin
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class course_test extends \basic_testcase {

    /**
     * Test constructor supports all declared attributes.
     */
    public function test_constructor_attributes() {
        $attributes = [
            'exclude' => [1, 2],
            'requiredcapabilities' => ['powereduc/course:update'],
        ];

        $element = new \PowerEducQuickForm_course('testel', null, $attributes);
        $html = $element->toHtml();
        $this->assertStringContainsString('data-exclude="1,2"', $html);
        $this->assertStringContainsString('data-requiredcapabilities="powereduc/course:update"', $html);
        $this->assertStringContainsString('data-limittoenrolled="0"', $html);
        $this->assertStringNotContainsString('multiple', $html);
        $this->assertStringNotContainsString('data-includefrontpage', $html);
        $this->assertStringNotContainsString('data-onlywithcompletion', $html);

        // Add more attributes.
        $attributes = [
            'multiple' => true,
            'limittoenrolled' => true,
            'includefrontpage' => true,
            'onlywithcompletion' => true,
        ];
        $element = new \PowerEducQuickForm_course('testel', null, $attributes);
        $html = $element->toHtml();
        $this->assertStringContainsString('multiple', $html);
        $this->assertStringContainsString('data-limittoenrolled="1"', $html);
        $this->assertStringContainsString('data-includefrontpage="' . SITEID . '"', $html);
        $this->assertStringContainsString('data-onlywithcompletion="1"', $html);
    }
}
