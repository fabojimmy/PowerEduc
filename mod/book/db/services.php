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
 * Book external functions and service definitions.
 *
 * @package    mod_book
 * @category   external
 * @copyright  2015 Juan Leyva <juan@powereduc.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @since      PowerEduc 3.0
 */

defined('POWEREDUC_INTERNAL') || die;

$functions = array(

    'mod_book_view_book' => array(
        'classname'     => 'mod_book_external',
        'methodname'    => 'view_book',
        'description'   => 'Simulate the view.php web interface book: trigger events, completion, etc...',
        'type'          => 'write',
        'capabilities'  => 'mod/book:read',
        'services'      => array(POWEREDUC_OFFICIAL_MOBILE_SERVICE)
    ),

    'mod_book_get_books_by_courses' => array(
        'classname'     => 'mod_book_external',
        'methodname'    => 'get_books_by_courses',
        'description'   => 'Returns a list of book instances in a provided set of courses,
                            if no courses are provided then all the book instances the user has access to will be returned.',
        'type'          => 'read',
        'capabilities'  => '',
        'services'      => array(POWEREDUC_OFFICIAL_MOBILE_SERVICE)
    )
);
