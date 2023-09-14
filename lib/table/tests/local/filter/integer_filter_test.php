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
 * Unit tests for core_table\local\filter\filter.
 *
 * @package   core_table
 * @category  test
 * @copyright 2020 Andrew Nicols <andrew@nicols.co.uk>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU Public License
 */

declare(strict_types=1);

namespace core_table\local\filter;

use advanced_testcase;
use TypeError;

/**
 * Unit tests for core_table\local\filter\integer_filter.
 *
 * @package   core_table
 * @category  test
 * @copyright 2020 Andrew Nicols <andrew@nicols.co.uk>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class integer_filter_test extends advanced_testcase {
    /**
     * Ensure that the add_filter_value function works as expected with valid values.
     */
    public function test_add_filter_value_int(): void {
        $filter = new integer_filter('example');

        // Initially an empty list.
        $this->assertEmpty($filter->get_filter_values());

        // Adding a value should return that value.
        $filter->add_filter_value(10);
        $this->assertSame([
            10,
        ], $filter->get_filter_values());

        // Adding a second value should add that value.
        // The values should sorted.
        $filter->add_filter_value(2);
        $this->assertSame([
            2,
            10,
        ], $filter->get_filter_values());

        // Adding a duplicate value should not lead to that value being added again.
        $filter->add_filter_value(10);
        $this->assertSame([
            2,
            10,
        ], $filter->get_filter_values());
    }

    /**
     * Ensure that the add_filter_value function rejects invalid types.
     *
     * @dataProvider add_filter_value_invalid_types_provider
     * @param mixed $value
     * @param string $type
     */
    public function test_add_filter_value_type_invalid($value, string $type): void {
        $filter = new integer_filter('example');

        // Adding empty string is not supported.
        $this->expectException(TypeError::class);
        $this->expectExceptionMessage("The value supplied was of type '{$type}'. An integer was expected.");
        $filter->add_filter_value($value);
    }

    /**
     * Data provider for add_filter_value tests with invalid types.
     *
     * @return array
     */
    public function add_filter_value_invalid_types_provider(): array {
        return [
            'Null' => [null, 'NULL'],
            'Empty string' => ['', 'string'],
            'Filled string' => ['example', 'string'],
            'Float 1.0' => [1.0, 'double'],
            'Float 1.1' => [1.1, 'double'],
            'bool' => [false, 'boolean'],
            'array' => [[], 'array'],
            'stdClass' => [(object) [], 'stdClass'],

            // Note: The comparison value will be a fully-qualfied class name.
            'Class' => [new filter('example'), filter::class],
        ];
    }
}
