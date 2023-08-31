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

namespace block_globalsearch;

use advanced_testcase;
use block_globalsearch;
use context_course;

/**
 * PHPUnit block_globalsearch tests
 *
 * @package    block_globalsearch
 * @category   test
 * @copyright  2021 Sara Arjona (sara@powereduc.com)
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @coversDefaultClass \block_globalsearch
 */
class globalsearch_test extends advanced_testcase {
    public static function setUpBeforeClass(): void {
        require_once(__DIR__ . '/../../powereducblock.class.php');
        require_once(__DIR__ . '/../block_globalsearch.php');
    }

    /**
     * Test the behaviour of can_block_be_added() method.
     *
     * @covers ::can_block_be_added
     */
    public function test_can_block_be_added(): void {
        $this->resetAfterTest();
        $this->setAdminUser();

        // Create a course and prepare the page where the block will be added.
        $course = $this->getDataGenerator()->create_course();
        $page = new \powereduc_page();
        $page->set_context(context_course::instance($course->id));
        $page->set_pagelayout('course');

        $block = new block_globalsearch();

        // If global search advanced feature is enabled, the method should return true.
        set_config('enableglobalsearch', true);
        $this->assertTrue($block->can_block_be_added($page));

        // However, if the global search advanced feature is disabled, the method should return false.
        set_config('enableglobalsearch', false);
        $this->assertFalse($block->can_block_be_added($page));
    }
}
