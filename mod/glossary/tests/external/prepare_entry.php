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
 * External function test for prepare_entry.
 *
 * @package    mod_glossary
 * @category   external
 * @since      PowerEduc 3.10
 * @copyright  2020 Juan Leyva <juan@powereduc.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace mod_glossary\external;

defined('POWEREDUC_INTERNAL') || die();

global $CFG;
require_once($CFG->dirroot . '/webservice/tests/helpers.php');

use external_api;
use externallib_advanced_testcase;
use mod_glossary_external;
use context_module;
use context_user;
use external_util;

/**
 * External function test for prepare_entry.
 *
 * @package    mod_glossary
 * @copyright  2020 Juan Leyva <juan@powereduc.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class prepare_entry_testcase extends externallib_advanced_testcase {

    /**
     * test_prepare_entry
     */
    public function test_prepare_entry() {
        global $USER;
        $this->resetAfterTest(true);

        $course = $this->getDataGenerator()->create_course();
        $glossary = $this->getDataGenerator()->create_module('glossary', ['course' => $course->id]);
        $gg = $this->getDataGenerator()->get_plugin_generator('mod_glossary');

        $this->setAdminUser();
        $aliases = ['alias1', 'alias2'];
        $entry = $gg->create_content(
            $glossary,
            ['approved' => 1, 'userid' => $USER->id],
            $aliases
        );

        $cat1 = $gg->create_category($glossary, [], [$entry]);
        $gg->create_category($glossary);

        $return = prepare_entry::execute($entry->id);
        $return = external_api::clean_returnvalue(prepare_entry::execute_returns(), $return);

        $this->assertNotEmpty($return['inlineattachmentsid']);
        $this->assertNotEmpty($return['attachmentsid']);
        $this->assertEquals($aliases, $return['aliases']);
        $this->assertEquals([$cat1->id], $return['categories']);
        $this->assertCount(2, $return['areas']);
        $this->assertNotEmpty($return['areas'][0]['options']);
        $this->assertNotEmpty($return['areas'][1]['options']);
    }
}
