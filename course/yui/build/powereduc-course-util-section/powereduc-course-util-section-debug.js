YUI.add('powereduc-course-util-section', function (Y, NAME) {

/**
 * A collection of utility classes for use with course sections.
 *
 * @module powereduc-course-util
 * @submodule powereduc-course-util-section
 */

Y.namespace('PowerEduc.core_course.util.section');

/**
 * A collection of utility classes for use with course sections.
 *
 * @class PowerEduc.core_course.util.section
 * @static
 */
Y.PowerEduc.core_course.util.section = {
    CONSTANTS: {
        SECTIONIDPREFIX: 'section-'
    },

    /**
     * Determines the section ID for the provided section.
     *
     * @method getId
     * @param section {Node} The section to find an ID for.
     * @return {Number|false} The ID of the section in question or false if no ID was found.
     */
    getId: function(section) {
        // We perform a simple substitution operation to get the ID.
        var id = section.get('id').replace(
                this.CONSTANTS.SECTIONIDPREFIX, '');

        // Attempt to validate the ID.
        id = parseInt(id, 10);
        if (typeof id === 'number' && isFinite(id)) {
            return id;
        }
        return false;
    }
};


}, '@VERSION@', {"requires": ["node", "powereduc-course-util-base"]});
