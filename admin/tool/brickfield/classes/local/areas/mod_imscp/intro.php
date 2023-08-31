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

namespace tool_brickfield\local\areas\mod_imscp;

use tool_brickfield\local\areas\module_area_base;

/**
 * IMSCP activity intro observer.
 *
 * @package    tool_brickfield
 * @copyright  2020 onward: Brickfield Education Labs, www.brickfield.ie
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class intro extends module_area_base {

    /**
     * Get table name.
     * @return string
     */
    public function get_tablename(): string {
        return 'imscp';
    }

    /**
     * Get field name.
     * @return string
     */
    public function get_fieldname(): string {
        return 'intro';
    }
}
