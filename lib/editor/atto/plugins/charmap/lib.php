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
 * Atto text editor charmap plugin lib.
 *
 * @package    atto_charmap
 * @copyright  2014 Frédéric Massart
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('POWEREDUC_INTERNAL') || die();

/**
 * Initialise the strings required for JS.
 *
 * @return void
 */
function atto_charmap_strings_for_js() {
    global $PAGE;

    // In order to prevent extra strings to be imported, comment/uncomment the characters
    // which are enabled in the JavaScript part of this plugin.
    $PAGE->requires->strings_for_js(
        array(
            'amacron',
            'emacron',
            'imacron',
            'omacron',
            'umacron',
            'amacron_caps',
            'emacron_caps',
            'imacron_caps',
            'omacron_caps',
            'umacron_caps',
            'interrobang',
            'insertcharacter',
            'nobreakspace',
            'ampersand',
            'quotationmark',
            'centsign',
            'eurosign',
            'poundsign',
            'yensign',
            'copyrightsign',
            'registeredsign',
            'trademarksign',
            'permillesign',
            'microsign',
            'middledot',
            'bullet',
            'threedotleader',
            'minutesfeet',
            'secondsinches',
            'sectionsign',
            'paragraphsign',
            'sharpsesszed',
            'singleleftpointinganglequotationmark',
            'singlerightpointinganglequotationmark',
            'leftpointingguillemet',
            'rightpointingguillemet',
            'leftsinglequotationmark',
            'rightsinglequotationmark',
            'leftdoublequotationmark',
            'rightdoublequotationmark',
            'singlelow9quotationmark',
            'doublelow9quotationmark',
            'lessthansign',
            'greaterthansign',
            'lessthanorequalto',
            'greaterthanorequalto',
            'endash',
            'emdash',
            'macron',
            'overline',
            'currencysign',
            'brokenbar',
            'diaeresis',
            'invertedexclamationmark',
            'turnedquestionmark',
            'circumflexaccent',
            'smalltilde',
            'degreesign',
            'minussign',
            'plusminussign',
            'divisionsign',
            'fractionslash',
            'multiplicationsign',
            'superscriptone',
            'superscripttwo',
            'superscriptthree',
            'fractiononequarter',
            'fractiononehalf',
            'fractionthreequarters',
            'functionflorin',
            'integral',
            'narysumation',
            'infinity',
            'squareroot',
            // 'similarto',
            // 'approximatelyequalto',
            'almostequalto',
            'notequalto',
            'identicalto',
            // 'elementof',
            // 'notanelementof',
            // 'containsasmember',
            'naryproduct',
            // 'logicaland',
            // 'logicalor',
            'notsign',
            'intersection',
            // 'union',
            'partialdifferential',
            // 'forall',
            // 'thereexists',
            // 'diameter',
            // 'backwarddifference',
            // 'asteriskoperator',
            // 'proportionalto',
            // 'angle',
            'acuteaccent',
            'cedilla',
            'feminineordinalindicator',
            'masculineordinalindicator',
            'dagger',
            'doubledagger',
            'agrave_caps',
            'aacute_caps',
            'acircumflex_caps',
            'atilde_caps',
            'adiaeresis_caps',
            'aringabove_caps',
            'ligatureae_caps',
            'ccedilla_caps',
            'egrave_caps',
            'eacute_caps',
            'ecircumflex_caps',
            'ediaeresis_caps',
            'igrave_caps',
            'iacute_caps',
            'icircumflex_caps',
            'idiaeresis_caps',
            'eth_caps',
            'ntilde_caps',
            'ograve_caps',
            'oacute_caps',
            'ocircumflex_caps',
            'otilde_caps',
            'odiaeresis_caps',
            'oslash_caps',
            'ligatureoe_caps',
            'scaron_caps',
            'ugrave_caps',
            'uacute_caps',
            'ucircumflex_caps',
            'udiaeresis_caps',
            'yacute_caps',
            'ydiaeresis_caps',
            'thorn_caps',
            'agrave',
            'aacute',
            'acircumflex',
            'atilde',
            'adiaeresis',
            'aringabove',
            'ligatureae',
            'ccedilla',
            'egrave',
            'eacute',
            'ecircumflex',
            'ediaeresis',
            'igrave',
            'iacute',
            'icircumflex',
            'idiaeresis',
            'eth',
            'ntilde',
            'ograve',
            'oacute',
            'ocircumflex',
            'otilde',
            'odiaeresis',
            'oslash',
            'ligatureoe',
            'scaron',
            'ugrave',
            'uacute',
            'ucircumflex',
            'udiaeresis',
            'yacute',
            'thorn',
            'ydiaeresis',
            'alpha_caps',
            'beta_caps',
            'gamma_caps',
            'delta_caps',
            'epsilon_caps',
            'zeta_caps',
            'eta_caps',
            'theta_caps',
            'iota_caps',
            'kappa_caps',
            'lambda_caps',
            'mu_caps',
            'nu_caps',
            'xi_caps',
            'omicron_caps',
            'pi_caps',
            'rho_caps',
            'sigma_caps',
            'tau_caps',
            'upsilon_caps',
            'phi_caps',
            'chi_caps',
            'psi_caps',
            'omega_caps',
            'alpha',
            'beta',
            'gamma',
            'delta',
            'epsilon',
            'zeta',
            'eta',
            'theta',
            'iota',
            'kappa',
            'lambda',
            'mu',
            'nu',
            'xi',
            'omicron',
            'pi',
            'rho',
            'finalsigma',
            'sigma',
            'tau',
            'upsilon',
            'phi',
            'chi',
            'psi',
            'omega',
            // 'alefsymbol',
            // 'pisymbol',
            // 'realpartsymbol',
            // 'thetasymbol',
            // 'upsilonhooksymbol',
            // 'weierstrassp',
            // 'imaginarypart',
            'leftwardsarrow',
            'upwardsarrow',
            'rightwardsarrow',
            'downwardsarrow',
            'leftrightarrow',
            // 'carriagereturn',
            // 'leftwardsdoublearrow',
            // 'upwardsdoublearrow',
            // 'rightwardsdoublearrow',
            // 'downwardsdoublearrow',
            // 'leftrightdoublearrow',
            // 'therefore',
            // 'subsetof',
            // 'supersetof',
            // 'notasubsetof',
            // 'subsetoforequalto',
            // 'supersetoforequalto',
            // 'circledplus',
            // 'circledtimes',
            // 'perpendicular',
            // 'dotoperator',
            // 'leftceiling',
            // 'rightceiling',
            // 'leftfloor',
            // 'rightfloor',
            // 'leftpointinganglebracket',
            // 'rightpointinganglebracket',
            'lozenge',
            'blackspadesuit',
            'blackclubsuit',
            'blackheartsuit',
            'blackdiamondsuit',
            // 'enspace',
            // 'emspace',
            // 'thinspace',
            // 'zerowidthnonjoiner',
            // 'zerowidthjoiner',
            // 'lefttorightmark',
            // 'righttoleftmark',
            // 'softhyphen',
        ),
        'atto_charmap'
    );
}
