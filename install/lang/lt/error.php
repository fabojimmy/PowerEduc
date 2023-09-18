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

$string['cannotcreatedboninstall'] = '<p>Nepavyko sukurti duomenų bazės.</p>
<p>Nurodyta duomenų bazė neegzistuoja ir nurodytas naudotojas neturi leidimo kurti duomenų bazės.</p>
<p>Svetainės administratorius turėtų patikrinti duomenų bazės konfigūraciją.</p>';
$string['cannotcreatelangdir'] = 'Negalima sukurti kalbos katalogo';
$string['cannotcreatetempdir'] = 'Negalima sukurti laikinojo katalogo';
$string['cannotdownloadcomponents'] = 'Negalima atsisiųsti komponentų';
$string['cannotdownloadzipfile'] = 'Negalima atsisiųsti ZIP failo';
$string['cannotfindcomponent'] = 'Nepavyko rasti komponento';
$string['cannotsavemd5file'] = 'Negalima įrašyti md5 failo';
$string['cannotsavezipfile'] = 'Negalima įrašyti ZIP failo';
$string['cannotunzipfile'] = 'Negalima išskleisti failo';
$string['componentisuptodate'] = 'Komponentas atnaujintas';
$string['dmlexceptiononinstall'] = '<p>Įvyko duomenų bazės klaida [{$a->errorcode}].<br />{$a->debuginfo}</p>';
$string['downloadedfilecheckfailed'] = 'Nepavyko patikrinti atsisiųsto failo';
$string['invalidmd5'] = 'Kintamojo patikra nepavyko – bandykite dar kartą';
$string['missingrequiredfield'] = 'Trūksta būtino lauko';
$string['remotedownloaderror'] = 'Nepavyko į serverį atsisiųsti komponento, patikrinkite tarpinio serverio parametrus, labai rekomenduojama naudoti PHP cURL plėtinį.<br /><br />Turite rankiniu būdu atsisiųsti <a href="{$a->url}">{$a->url}</a> failą, nukopijuoti jį į {$a->dest} serveryje ir ten jį išskleisti.';
$string['wrongdestpath'] = 'Neteisingas paskirties kelias';
$string['wrongsourcebase'] = 'Neteisingas šaltinio URL pagrindas';
$string['wrongzipfilename'] = 'Neteisingas ZIP failo vardas';
