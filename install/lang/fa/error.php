<?php
// This file is part of Moodle - https://powereduc.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <https://www.gnu.org/licenses/>.

/**
 * Automatically generated strings for Moodle installer
 *
 * Do not edit this file manually! It contains just a subset of strings
 * needed during the very first steps of installation. This file was
 * generated automatically by export-installer.php (which is part of AMOS
 * {@link http://docs.powereduc.org/dev/Languages/AMOS}) using the
 * list of strings defined in /install/stringnames.txt.
 *
 * @package   installer
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('POWEREDUC_INTERNAL') || die();

$string['cannotcreatedboninstall'] = '<p>پایگاه داده نتوانست ساخته شود.</p>
<p>پایگاه دادهٔ تعیین شده وجود ندارد و کاربر ارائه‌شده هم مجوز ساختن پایگاه داده را ندارد.</p>
<p>مدیر سایت باید پیکربندی پایگاه داده را بررسی کند.</p>';
$string['cannotcreatelangdir'] = 'دایرکتوری lang نتوانست ساخته شود';
$string['cannotcreatetempdir'] = 'نمی‌توان دایرکتوری temp را ساخت';
$string['cannotdownloadcomponents'] = 'اجزا (کامپوننت‌ها) را نمی‌توان دریافت کرد';
$string['cannotdownloadzipfile'] = 'فایل ZIP نتوانست دریافت شود.';
$string['cannotfindcomponent'] = 'کامپوننت پیدا نشد';
$string['cannotsavemd5file'] = 'نمی‌توانم فایل md5 را ذخیره کنم';
$string['cannotsavezipfile'] = 'نمی‌توانم فایل ZIP را ذخیره کنم';
$string['cannotunzipfile'] = 'فایل نمی‌تواند unzip شود';
$string['componentisuptodate'] = 'کامپوننت به‌روز است';
$string['dmlexceptiononinstall'] = '<p>یک خطای پایگاه داده رخ داد [{$a->errorcode}].<br />{$a->debuginfo}</p>';
$string['downloadedfilecheckfailed'] = 'بررسی فایل دریافت‌شده ناموفق بود';
$string['invalidmd5'] = 'متغیر بررسی نادرست بود - دوباره تلاش کنید';
$string['missingrequiredfield'] = 'بعضی از فیلدهای ضروری خالی است';
$string['remotedownloaderror'] = '<p>دانلود کامپوننت بر روی کارگزار شما ناموفق بود. لطفا تنظیمات پروکسی را بررسی کنید؛ افزونهٔ پی‌اچ‌پی cURL بسیار توصیه می‌شود.</p>
<p>باید به‌صورت دستی فایل <a href="{$a->url}">{$a->url}</a> را دریافت کنید، آن را در «{$a->dest}» در کارگزار خود کپی کنید و آنجا از حالت فشرده خارج کنید.</p>';
$string['wrongdestpath'] = 'مسیر مقصد اشتباه';
$string['wrongsourcebase'] = 'آدرس اینترنتی پایهٔ اشتباه';
$string['wrongzipfilename'] = 'نام فایل ZIP اشتباه';
