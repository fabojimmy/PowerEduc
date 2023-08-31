YUI.add('powereduc-core-notification-alert', function (Y, NAME) {

/* eslint-disable no-unused-vars, no-unused-expressions */
var DIALOGUE_PREFIX,
    BASE,
    CONFIRMYES,
    CONFIRMNO,
    TITLE,
    QUESTION,
    CSS_CLASSES;

DIALOGUE_PREFIX = 'powereduc-dialogue';
BASE = 'notificationBase';
CONFIRMYES = 'yesLabel';
CONFIRMNO = 'noLabel';
TITLE = 'title';
QUESTION = 'question';
CSS_CLASSES = {
    BASE: 'powereduc-dialogue-base',
    WRAP: 'powereduc-dialogue-wrap',
    HEADER: 'powereduc-dialogue-hd',
    BODY: 'powereduc-dialogue-bd',
    CONTENT: 'powereduc-dialogue-content',
    FOOTER: 'powereduc-dialogue-ft',
    HIDDEN: 'hidden',
    LIGHTBOX: 'powereduc-dialogue-lightbox'
};

// Set up the namespace once.
M.core = M.core || {};
/**
 * A dialogue type designed to display an alert to the user.
 *
 * @module powereduc-core-notification
 * @submodule powereduc-core-notification-alert
 */

var ALERT_NAME = 'PowerEduc alert',
    ALERT;

/**
 * Extends core Dialogue to show the alert dialogue.
 *
 * @param {Object} config Object literal specifying the dialogue configuration properties.
 * @constructor
 * @class M.core.alert
 * @extends M.core.dialogue
 */
ALERT = function(config) {
    config.closeButton = false;
    ALERT.superclass.constructor.apply(this, [config]);
};
Y.extend(ALERT, M.core.notification.info, {
    /**
     * The list of events to detach when destroying this dialogue.
     *
     * @property _closeEvents
     * @type EventHandle[]
     * @private
     */
    _closeEvents: null,
    initializer: function() {
        this._closeEvents = [];
        this.publish('complete');
        var yes = Y.Node.create('<input type="button" class="btn btn-primary" id="id_yuialertconfirm-' + this.get('COUNT') + '"' +
                                 'value="' + this.get(CONFIRMYES) + '" />'),
            content = Y.Node.create('<div class="confirmation-dialogue"></div>')
                    .append(Y.Node.create('<div class="confirmation-message">' + this.get('message') + '</div>'))
                    .append(Y.Node.create('<div class="confirmation-buttons text-xs-right"></div>')
                            .append(yes));
        this.get(BASE).addClass('powereduc-dialogue-confirm');
        this.setStdModContent(Y.WidgetStdMod.BODY, content, Y.WidgetStdMod.REPLACE);
        this.setStdModContent(Y.WidgetStdMod.HEADER,
                '<h5 id="powereduc-dialogue-' + this.get('COUNT') + '-wrap-header-text">' + this.get(TITLE) + '</h5>',
                Y.WidgetStdMod.REPLACE);

        this._closeEvents.push(
            Y.on('key', this.submit, window, 'down:13', this),
            yes.on('click', this.submit, this)
        );

        var closeButton = this.get('boundingBox').one('.closebutton');
        if (closeButton) {
            // The close button should act exactly like the 'No' button.
            this._closeEvents.push(
                closeButton.on('click', this.submit, this)
            );
        }
    },
    submit: function() {
        new Y.EventHandle(this._closeEvents).detach();
        this.fire('complete');
        this.hide();
        this.destroy();
    }
}, {
    NAME: ALERT_NAME,
    CSS_PREFIX: DIALOGUE_PREFIX,
    ATTRS: {

        /**
         * The title of the alert.
         *
         * @attribute title
         * @type String
         * @default 'Alert'
         */
        title: {
            validator: Y.Lang.isString,
            value: 'Alert'
        },

        /**
         * The message of the alert.
         *
         * @attribute message
         * @type String
         * @default 'Confirm'
         */
        message: {
            validator: Y.Lang.isString,
            value: 'Confirm'
        },

        /**
         * The button text to use to accept the alert.
         *
         * @attribute yesLabel
         * @type String
         * @default 'OK'
         */
        yesLabel: {
            validator: Y.Lang.isString,
            setter: function(txt) {
                if (!txt) {
                    txt = 'OK';
                }
                return txt;
            },
            value: 'OK'
        }
    }
});

M.core.alert = ALERT;


}, '@VERSION@', {"requires": ["powereduc-core-notification-dialogue"]});