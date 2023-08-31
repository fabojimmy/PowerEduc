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
 * Any element analysers can analyse.
 *
 * @package   core_analytics
 * @copyright 2016 David Monllao {@link http://www.davidmonllao.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace core_analytics;

defined('POWEREDUC_INTERNAL') || die();

/**
 * Any element analysers can analyse.
 *
 * @package   core_analytics
 * @copyright 2016 David Monllao {@link http://www.davidmonllao.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
interface analysable {

    /**
     * Max timestamp.
     */
    const MAX_TIME = 9999999999;

    /**
     * The analysable unique identifier in the site.
     *
     * @return int.
     */
    public function get_id();

    /**
     * The analysable human readable name
     *
     * @return string
     */
    public function get_name();

    /**
     * The analysable context.
     *
     * @return \context
     */
    public function get_context();

    /**
     * The start of the analysable if there is one.
     *
     * @return int|false
     */
    public function get_start();

    /**
     * The end of the analysable if there is one.
     *
     * @return int|false
     */
    public function get_end();
}
