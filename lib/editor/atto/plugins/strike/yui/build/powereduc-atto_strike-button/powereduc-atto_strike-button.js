YUI.add('powereduc-atto_strike-button', function (Y, NAME) {

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

/*
 * @package    atto_strike
 * @copyright  2013 Damyon Wiese  <damyon@powereduc.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

/**
 * @module powereduc-atto_strike-button
 */

/**
 * Atto text editor strike plugin.
 *
 * @namespace M.atto_strike
 * @class button
 * @extends M.editor_atto.EditorPlugin
 */

Y.namespace('M.atto_strike').Button = Y.Base.create('button', Y.M.editor_atto.EditorPlugin, [], {
    initializer: function() {
        var strike;

        this.addButton({
            callback: this._toggleStrike,
            icon: 'e/strikethrough',
            buttonName: strike,
            inlineFormat: true,

            // Watch the following tags and add/remove highlighting as appropriate:
            tags: 'del, strike'
        });
        this._strikeApplier = window.rangy.createClassApplier("bf-editor-strike-del");
    },
    /**
     * Toggle the strikethrough setting.
     *
     * @method _toggleStrike
     */
    _toggleStrike: function() {
        var host = this.get('host');

        // Change all <del> and <strike> tags to applier class.
        host.changeToCSS('del', 'bf-editor-strike-del');
        host.changeToCSS('strike', 'bf-editor-strike-del');

        // Use the applier toggle selection.
        this._strikeApplier.toggleSelection();

        // Then change the applier class back to <del> tags.
        host.changeToTags('bf-editor-strike-del', 'del');
    }
});


}, '@VERSION@', {"requires": ["powereduc-editor_atto-plugin"]});
