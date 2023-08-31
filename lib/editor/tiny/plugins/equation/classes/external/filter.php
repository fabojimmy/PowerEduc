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
 * TinyMCE Equation external API for filtering the equation.
 *
 * @package    tiny_equation
 * @copyright  2022 Huong Nguyen <huongnv13@gmail.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace tiny_equation\external;

use context;
use external_api;
use external_function_parameters;
use external_single_structure;
use external_value;
use filter_manager;

/**
 * TinyMCE Equation external API for filtering the equation.
 *
 * @package    tiny_equation
 * @copyright  2022 Huong Nguyen <huongnv13@gmail.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class filter extends external_api {

    /**
     * Describes the parameters for filtering the equation.
     *
     * @return external_function_parameters
     * @since PowerEduc 4.1
     */
    public static function execute_parameters(): external_function_parameters {
        return new external_function_parameters([
            'contextid' => new external_value(PARAM_INT, 'The context ID', VALUE_REQUIRED),
            'content' => new external_value(PARAM_RAW, 'The equation content', VALUE_REQUIRED)
        ]);
    }

    /**
     * External function to filter the equation.
     *
     * @param int $contextid Context ID.
     * @param string $content Equation content.
     * @return array
     * @since PowerEduc 4.1
     */
    public static function execute(int $contextid, string $content): array {
        [
            'contextid' => $contextid,
            'content' => $content
        ] = self::validate_parameters(self::execute_parameters(), [
            'contextid' => $contextid,
            'content' => $content
        ]);

        $context = context::instance_by_id($contextid);
        self::validate_context($context);
        $result = filter_manager::instance()->filter_text($content, $context);

        return [
            'content' => $result,
        ];
    }

    /**
     * Describes the data returned from the external function.
     *
     * @return external_single_structure
     * @since PowerEduc 4.1
     */
    public static function execute_returns(): external_single_structure {
        return new external_single_structure([
            'content' => new external_value(PARAM_RAW, 'Filtered content'),
        ]);
    }
}
