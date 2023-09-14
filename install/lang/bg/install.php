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

$string['availablelangs'] = 'Налични езикови пакети';
$string['chooselanguagehead'] = 'Изберете език';
$string['chooselanguagesub'] = 'Моля, изберете език за инсталацията. Този език ще бъде, също така, език по подразбиране на сайта, но може да бъде променен и по-късно след инсталирането.';
$string['databasehost'] = 'Хост на базата данни';
$string['databasename'] = 'Име на базата данни';
$string['databasetypehead'] = 'Избиране на драйвер за база данни';
$string['dataroot'] = 'Директория за данни';
$string['dbprefix'] = 'Представка на таблиците';
$string['dirroot'] = 'Директория на Moodle';
$string['environmenthead'] = 'Проверка на Вашата работна среда ...';
$string['environmentsub2'] = 'Всяка версия на Moodle изисква някаква минимална версия на PHP и няколко необходими PHP разширения. Преди всяко инсталиране или надграждане се извършва пълна проверка на работната среда. Моля, обърнете се към администратора на сървъра ако не знаете как да инсталирате нова версия или да разрешите резширенията на PHP.';
$string['errorsinenvironment'] = 'Проверката на роботната среда е прекратена!';
$string['installation'] = 'Инсталиране';
$string['langdownloaderror'] = 'За съжаление езикът "{$a}" не може да бъде изтеглен. Инсталирането ще продължи на английски.';
$string['paths'] = 'Пътища';
$string['pathshead'] = 'Потвърждаване на пътищата';
$string['pathsroparentdataroot'] = 'Директория ({$a->parent}) не е разрешена за запис и директорията за данни ({$a->dataroot}) не може да бъде създадена от инсталатора.';
$string['pathssubdataroot'] = 'Тази директория е място, където Moodle, записва качваните файлове. Тази директория трябва да е достъпна за четене И ЗА ЗАПИС от потребителя на интернет сървъра (обикновено \'nobody\' или \'apache\'), но не трябва да е достъпна пряко през Интернет. Инталаторът ще се опита да създаде директорията, ако тя не съществува.';
$string['pathssubdirroot'] = 'Пълен път до директорията на Moodle.';
$string['pathssubwwwroot'] = 'Пълен интернет адрес, на който ще се отваря Moodle. Не е възможно Moodle да се отваря чрез различни адреси. Ако Вашият сайт има няколко адреса трябва на всеки от другите адреси да направите пренасочване към този. Ако Вашият сайт се отваря както глобално от Интернет, така и от локална мрежа, настройте DNS, така че потребителите от локалната мрежа също да могат да ползват глобалния адрес. Ако адресът не е коректен, моля, променете адреса в браузъра си и започнете инсталирането с правилния адрес.';
$string['phpextension'] = '{$a} разширение на PHP';
$string['phpversionhelp'] = '<p>Moodle изисква версия на PHP най-малко 4.3.0 или 5.1.0 (5.0.x има значителен брой известни проблеми).</p> <p>Вие използвате в момента версия {$a}</p> <p>Трябва да обновите PHP или да се преместите на нов хост (сървър) с по-нова версия на PHP!<br /> (В случая с 5.0.x може да опитате да инсталирате по-старата версия 4.4.x)</p>';
$string['wwwroot'] = 'Уеб адрес';
