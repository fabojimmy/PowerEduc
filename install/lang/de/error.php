<?php
// This file is part of PowerEduc - https://powereduc.org/
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
// along with PowerEduc.  If not, see <https://www.gnu.org/licenses/>.

/**
 * Automatically generated strings for PowerEduc installer
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

$string['cannotcreatedboninstall'] = '<p>Die Datenbank konnte nicht angelegt werden.</p><p>Die angegebene Datenbank existiert nicht und das genannten Nutzerkonto hat keine Rechte, die Datenbank neu anzulegen. Die Datenbank-Konfiguration muss überprüft werden.</p>';
$string['cannotcreatelangdir'] = 'Das Verzeichnis \'lang\' wurde nicht angelegt.';
$string['cannotcreatetempdir'] = 'Das Verzeichnis \'temp\' wurde nicht angelegt.';
$string['cannotdownloadcomponents'] = 'Einige Komponenten können nicht geladen werden.';
$string['cannotdownloadzipfile'] = 'Die ZIP-Datei kann nicht heruntergeladen werden';
$string['cannotfindcomponent'] = 'Die Komponente kann nicht gefunden werden.';
$string['cannotsavemd5file'] = 'Die md5-Datei wurde nicht gespeichert.';
$string['cannotsavezipfile'] = 'Die ZIP-Datei wurde nicht gespeichert.';
$string['cannotunzipfile'] = 'Die Datei kann nicht entpackt werden';
$string['componentisuptodate'] = 'Die Komponente ist aktuell.';
$string['dmlexceptiononinstall'] = '<p>Ein Datenbankfehler ist aufgetreten [{$a->errorcode}]. <br />{$a->debuginfo}</p>';
$string['downloadedfilecheckfailed'] = 'Die Überprüfung der heruntergeladenen Datei ist gescheitert';
$string['invalidmd5'] = 'Der Prüfwert ist ungültig. Versuchen Sie es bitte nochmal!';
$string['missingrequiredfield'] = 'Einige erforderliche Felder sind nicht ausgefüllt.';
$string['remotedownloaderror'] = '<p>Der Download auf Ihren Server konnte nicht ausgeführt werden. Prüfen Sie bitte die Proxy-Einstellungen, die PHP CURL Erweiterung wird dringend empfohlen.</p><p>Die Datei <a href="{$a->url}">{$a->url}</a> muss nun manuell herunter geladen, entpackt und auf den Server nach "{$a->dest}" kopiert werden. there.</p>';
$string['wrongdestpath'] = 'Falscher Pfad';
$string['wrongsourcebase'] = 'Falsche URL-Quelle';
$string['wrongzipfilename'] = 'Falscher ZIP-Dateiname';
