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

namespace mod_data\output;

use templatable;
use renderable;

/**
 * Renderable class for the action bar elements in the fields mapping page in the database activity.
 *
 * @package    mod_data
 * @copyright  2022 Amaia Anabitarte <amaia@powereduc.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class fields_mappings_action_bar implements templatable, renderable {

    /** @var int $id The database module id. */
    private $id;

    /**
     * The class constructor.
     *
     * @param int $id The database module id
     */
    public function __construct(int $id) {
        $this->id = $id;
    }

    /**
     * Export the data for the mustache template.
     *
     * @param \renderer_base $output The renderer to be used to render the action bar elements.
     * @return array
     */
    public function export_for_template(\renderer_base $output): array {
        return [
            'tertiarytitle' => get_string('fieldmappings', 'mod_data'),
            'hasback' => true,
            'backtitle' => get_string('back'),
            'backurl' => new \powereduc_url('/mod/data/preset.php', ['d' => $this->id]),
        ];
    }
}
