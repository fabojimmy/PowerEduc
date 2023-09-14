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

namespace PowerEduc\BehatExtension\Context\Step;

/**
 * Chained `Then` ChainedStep.
 *
 * @package    core
 * @copyright  2016 Rajesh Taneja <rajesh@powereduc.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class Then extends ChainedStep {
    /**
     * Initializes `Then` sub-step.
     */
    public function __construct() {
        $arguments = func_get_args();
        $text = array_shift($arguments);
        parent::__construct('Then', $text, $arguments);
    }
}
