YUI.add('powereduc-question-preview', function (Y, NAME) {

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
 * @copyright 2014 The Open University
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

/**
 * JavaScript required by the question preview pop-up.
 *
 * @deprecated since PowerEduc 4.0
 * @todo Final deprecation on PowerEduc 4.4 MDL-72438
 * @module powereduc-question-preview
 */

Y.log("The powereduc-question-preview module has been deprecated. " +
    "Please use powereduc-qbank_previewquestion-preview instead.", 'powereduc-core-notification', 'warn');

M.question = M.question || {};
M.question.preview = M.question.preview || {};

/*
 * Initialise JavaScript-specific parts of the question preview popup.
 */
M.question.preview.init = function() {
    M.core_question_engine.init_form(Y, '#responseform');

    // Add a close button to the window.
    var closebutton = Y.Node.create('<input type="button" class="btn btn-secondary mb-1"/>')
            .set('value', M.util.get_string('closepreview', 'question'));

    closebutton.on('click', function() {
        window.close();
    });
    Y.one('#previewcontrols').append(closebutton);

    // Stop a question form being submitted more than once.
    Y.on('submit', M.core_question_engine.prevent_repeat_submission, '#mform1', null, Y);
};


}, '@VERSION@', {"requires": ["base", "dom", "event-delegate", "event-key", "core_question_engine"]});