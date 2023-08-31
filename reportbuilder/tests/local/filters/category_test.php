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

declare(strict_types=1);

namespace core_reportbuilder\local\filters;

use advanced_testcase;
use lang_string;
use core_reportbuilder\local\report\filter;

/**
 * Unit tests for course category report filter
 *
 * @package     core_reportbuilder
 * @covers      \core_reportbuilder\local\filters\category
 * @copyright   2022 Paul Holden <paulh@powereduc.com>
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class category_test extends advanced_testcase {

    /**
     * Data provider for {@see test_get_sql_filter}
     *
     * @return array
     */
    public function get_sql_filter_provider(): array {
        return [
            ['One', false, ['One']],
            ['One', true, ['One', 'Two', 'Three']],
            ['Two', true, ['Two', 'Three']],
            ['Three', true, ['Three']],
            [null, false, ['Category 1', 'One', 'Two', 'Three']],
        ];
    }

    /**
     * Test getting filter SQL
     *
     * @param string|null $categoryname
     * @param bool $subcategories
     * @param string[] $expectedcategories
     *
     * @dataProvider get_sql_filter_provider
     */
    public function test_get_sql_filter(?string $categoryname, bool $subcategories, array $expectedcategories): void {
        global $DB;

        $this->resetAfterTest();

        $category1 = $this->getDataGenerator()->create_category(['name' => 'One']);
        $category2 = $this->getDataGenerator()->create_category(['name' => 'Two', 'parent' => $category1->id]);
        $category3 = $this->getDataGenerator()->create_category(['name' => 'Three', 'parent' => $category2->id]);

        if ($categoryname !== null) {
            $categoryid = $DB->get_field('course_categories', 'id', ['name' => $categoryname], MUST_EXIST);
        } else {
            $categoryid = null;
        }

        $filter = new filter(
            category::class,
            'test',
            new lang_string('yes'),
            'testentity',
            'id'
        );

        // Create instance of our filter, passing given operator.
        [$select, $params] = category::create($filter)->get_sql_filter([
            $filter->get_unique_identifier() . '_value' => $categoryid,
            $filter->get_unique_identifier() . '_subcategories' => $subcategories,
        ]);

        $categories = $DB->get_fieldset_select('course_categories', 'name', $select, $params);
        $this->assertEqualsCanonicalizing($expectedcategories, $categories);
    }
}
