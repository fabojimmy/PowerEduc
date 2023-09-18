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

$string['admindirname'] = 'ບັນຊີຜູ້ເບິ່ງແຍງ';
$string['availablelangs'] = 'ຊຸດພາສາທີ່ມີໃຫ້';
$string['chooselanguagehead'] = 'ເລືອກພາສາ';
$string['chooselanguagesub'] = 'ກະລຸນາເລືອກພາສາສໍາລັບການຕິດຕັ້ງ. ພາສານີ້ຍັງຈະຖືກໃຊ້ເປັນພາສາເລີ່ມຕົ້ນສໍາລັບເວັບໄຊທ໌, ເຖິງແມ່ນວ່າ ມັນອາດຈະຖືກປ່ຽນແປງໃນພາຍຫຼັງ.';
$string['clialreadyconfigured'] = 'ໄຟລ໌ການຕັ້ງຄ່າ config.php ມີຢູ່ແລ້ວ. ກະລຸນາໃຊ້ admin/cli/install_database.php ເພື່ອຕິດຕັ້ງ PowerEduc ສໍາລັບເວັບໄຊທ໌ນີ້.';
$string['clialreadyinstalled'] = 'ໄຟລ໌ການຕັ້ງຄ່າ config.php ມີຢູ່ແລ້ວ. ກະລຸນາໃຊ້ admin/cli/install_database.php ເພື່ອອັບເກຣດ PowerEduc ສໍາລັບເວັບໄຊນີ້.';
$string['cliinstallheader'] = 'ໂຄງການການຕິດຕັ້ງສາຍຄຳສັ່ງ PowerEduc {$a}';
$string['clitablesexist'] = 'ຕາຕະລາງຖານຂໍ້ມູນແລ້ວ; ການຕິດຕັ້ງ CLI ບໍ່ສາມາດສືບຕໍ່ໄດ້.';
$string['databasehost'] = 'ເຈົ້າພາບຖານຂໍ້ມູນ';
$string['databasename'] = 'ຊື່ຖານຂໍ້ມູນ';
$string['databasetypehead'] = 'ເລືອກຕົວຂັບເຄື່ອນຖານຂໍ້ມູນ';
$string['dataroot'] = 'ລາຍການຂໍ້ມູນ';
$string['datarootpermission'] = 'ການອະນຸຍາດລາຍການຂໍ້ມູນ';
$string['dbprefix'] = 'ຄໍານໍາຫນ້າຕາຕະລາງ';
$string['dirroot'] = 'ລາຍການ PowerEduc';
$string['environmenthead'] = 'ກຳລັງກວດສອບສະພາບແວດລ້ອມຂອງທ່ານ ...';
$string['environmentsub2'] = 'ແຕ່ລະລຸ້ນ PowerEduc ມີຄວາມຕ້ອງການສະບັບ PHP ຕ່ຳສຸດທີ່ ແລະ ຈໍານວນການຂະຫຍາຍ PHP ບັງຄັບ.
ການກວດສອບສະພາບແວດລ້ອມຢ່າງເຕັມທີ່ ແມ່ນເຮັດກ່ອນທີ່ຈະຕິດຕັ້ງ ແລະ ຍົກລະດັບແຕ່ລະຄົນ. ກະລຸນາຕິດຕໍ່ຫາຜູ້ບໍລິຫານເຄື່ອງແມ່ຂ່າຍ ຖ້າຫາກວ່າທ່ານບໍ່ຮູ້ວິທີການຕິດຕັ້ງສະບັບໃໝ່ ຫຼື ເປີດໃຊ້ຂະຫຍາຍ PHP ໄດ້.';
$string['errorsinenvironment'] = 'ກວດສອບສິ່ງແວດລ້ອມບໍ່ສໍາເລັດ!';
$string['installation'] = 'ການຕິດຕັ້ງ';
$string['langdownloaderror'] = 'ຂໍອະໄພ, ບໍ່ສາມາດດາວໂຫຼດພາສາ "{$a}" ໄດ້. ຂະບວນການຕິດຕັ້ງຈະສືບຕໍ່ເປັນພາສາອັງກິດ.';
$string['memorylimithelp'] = '<p>ຂີດຈຳກັດຄວາມຈຳ PHP ສຳລັບເຊີບເວີຂອງທ່ານປະຈຸບັນຖືກຕັ້ງເປັນ {$a}.</p>

<p>ສິ່ງນີ້ອາດເຮັດໃຫ້ PowerEduc ມີບັນຫາຄວາມຈຳໃນພາຍຫຼັງ, ໂດຍສະເພາະ
   ຖ້າທ່ານມີຫຼາຍຊຸດທີ່ເປີດໃຊ້ງານ ແລະ/ຫຼື ຫຼາຍຜູ້ໃຊ້.</p>

<p>ພວກເຮົາແນະນໍາໃຫ້ທ່ານກໍານົດຄ່າ PHP ທີ່ມີຂອບເຂດທີ່ສູງກວ່າ ຖ້າຫາກວ່າເປັນໄປໄດ້, ເຊັ່ນ 40M.
   ມີຫຼາຍວິທີໃນການເຮັດສິ່ງນີ້ທີ່ທ່ານສາມາດລອງໄດ້:</p>
<ol>
<li>ຖ້າທ່ານສາມາດ, ລວບລວມ PHP ຄືນໃໝ່ດ້ວຍ <i>--enable-memory-limit</i>.
    ສິ່ງນີ້ຈະເຮັດໃຫ້ PowerEduc ສາມາດຕັ້ງຂີດຈຳກັດຄວາມຈຳໄດ້ເອງ.</li>
<li>ຖ້າທ່ານມີການເຂົ້າເຖິງໄຟລ໌ php.ini ຂອງທ່ານ, ທ່ານສາມາດປ່ຽນ <b>memory_limit</b> ໄດ້.
    ຕັ້ງຢູ່ໃນນັ້ນເພື່ອບາງສິ່ງບາງຢ່າງເຊັ່ນ: 40M. ຖ້າທ່ານບໍ່ມີການເຂົ້າເຖິງ ທ່ານອາດຈະ
    ສາມາດຂໍໃຫ້ຜູ້ເບິ່ງແຍງລະບົບຂອງທ່ານເຮັດອັນນີ້ໃຫ້ກັບທ່ານໄດ້.</li>
<li>ໃນບາງເຊີບເວີ PHP ທ່ານສາມາດສ້າງໄຟລ໌ .htaccess ໃນໄດເລກະທໍລີ PowerEduc
    ປະກອບມີເສັ້ນນີ້:
    <blockquote><div>php_value memory_limit 40M</div></blockquote>
    <p>ຢ່າງໃດກໍຕາມ, ໃນບາງເຊີບເວີ ສິ່ງນີ້ຈະປ້ອງກັນ <b>ທັງໝົດ</b> ໜ້າ PHP ຈາກການເຮັດວຽກ
    (ທ່ານຈະເຫັນຂໍ້ຜິດພາດໃນເວລາທີ່ທ່ານເບິ່ງໜ້າຕ່າງໆ) ດັ່ງນັ້ນ ທ່ານຈະຕ້ອງເອົາໄຟລ໌ .htaccess ອອກ.</p></li>
</ol>';
$string['paths'] = 'ເສັ້ນທາງ';
$string['pathserrcreatedataroot'] = 'ລາຍການຂໍ້ມູນ ({$a->dataroot}) ບໍ່ສາມາດສ້າງໄດ້ໂດຍຕົວຕິດຕັ້ງ.';
$string['pathshead'] = 'ຢືນຢັນເສັ້ນທາງ';
$string['pathsrodataroot'] = 'ລາຍການ Dataroot ບໍ່ສາມາດຂຽນໄດ້.';
$string['pathsroparentdataroot'] = 'ລາຍຊື່ພໍ່ແມ່ ({$a->parent}) ບໍ່ສາມາດຂຽນໄດ້. ລາຍການຂໍ້ມູນ ({$a->dataroot}) ບໍ່ສາມາດສ້າງໄດ້ໂດຍຕົວຕິດຕັ້ງ.';
$string['pathssubadmindir'] = 'webhosts ຈໍານວນໜ້ອຍດຽວໃຊ້ /admin ເປັນ URL ພິເສດສໍາລັບທ່ານທີ່ຈະເຂົ້າເຖິງກະດານຄວບຄຸມ ຫຼື ບາງສິ່ງບາງຢ່າງ. ແຕ່ໜ້າເສຍດາຍ, ນີ້ຂັດກັບສະຖານທີ່ມາດຕະຖານສໍາລັບໜ້າ ຜູ້ເບິ່ງແຍງລະບົບ PowerEduc. ທ່ານສາມາດແກ້ໄຂສິ່ງນີ້ໂດຍການປ່ຽນຊື່ຜູ້ເບິ່ງແຍງລະບົບໃນການຕິດຕັ້ງຂອງທ່ານ ແລະ ໃສ່ຊື່ໃໝ່ນີ້ຢູ່ທີ່ນີ້. ຕົວຢ່າງ: <em>powereducadmin</em>. ສິ່ງນີ້ຈະແກ້ໄຂການເຊື່ອມຕໍ່ຜູ້ເບິ່ງແຍງລະບົບໃນ PowerEduc.';
$string['pathssubdataroot'] = '<p>ລາຍການທີ່ PowerEduc ຈະເກັບຮັກສາເນື້ອຫາໄຟລ໌ທັງໝົດທີ່ອັບໂຫຼດໂດຍຜູ້ໃຊ້.</p>
<p>ລາຍການນີ້ຄວນຈະເປັນທັງສາມາດອ່ານໄດ້ ແລະ ຂຽນໄດ້ໂດຍຜູ້ໃຊ້ເວັບເຊີບເວີ (ໂດຍປົກກະຕິແລ້ວ \'www-data\', \'nobody\', ຫຼື \'apache\').</p>
<p>ມັນຕ້ອງບໍ່ສາມາດເຂົ້າເຖິງໄດ້ໂດຍກົງຜ່ານເວັບ.</p>
<p>ຖ້າບໍ່ມີບັນຊີລາຍຊື່ໃນປັດຈຸບັນ, ຂະບວນການຕິດຕັ້ງຈະພະຍາຍາມສ້າງມັນ.</p>';
$string['pathssubdirroot'] = '<p>ເສັ້ນທາງເຕັມໄປຫາລາຍການທີ່ມີລະຫັດ PowerEduc.</p>';
$string['pathssubwwwroot'] = '<p>ທີ່ຢູ່ເຕັມທີ່ PowerEduc ຈະຖືກເຂົ້າຫາເຊັ່ນ: ທີ່ຢູ່ທີ່ຜູ້ໃຊ້ຈະເຂົ້າໄປໃນແຖບທີ່ຢູ່ຂອງຕົວທ່ອງເວັບຂອງເຂົາເຈົ້າເພື່ອເຂົ້າເຖິງ PowerEduc.</p>
<p>ມັນບໍ່ສາມາດເຂົ້າເຖິງ PowerEduc ໂດຍໃຊ້ຫຼາຍທີ່ຢູ່. ຖ້າເວັບໄຊທ໌ຂອງທ່ານສາມາດເຂົ້າເຖິງໄດ້ຜ່ານຫຼາຍທີ່ຢູ່ ຈາກນັ້ນເລືອກອັນທີ່ງ່າຍທີ່ສຸດ ແລະ ຕັ້ງການປ່ຽນເສັ້ນທາງຖາວອນສຳລັບແຕ່ລະທີ່ຢູ່ອື່ນ.</p>
<p>ຖ້າເວັບໄຊຂອງທ່ານສາມາດເຂົ້າເຖິງໄດ້ທັງຈາກອິນເຕີເນັດ ແລະ ຈາກເຄືອຂ່າຍພາຍໃນ (ບາງຄັ້ງເອີ້ນວ່າ ອິນທຣາເນັດ), ຫຼັງຈາກນັ້ນໃຫ້ໃຊ້ທີ່ຢູ່ສາທາລະນະທີ່ນີ້.</p>
<p>ຖ້າທີ່ຢູ່ປັດຈຸບັນບໍ່ຖືກຕ້ອງ, ກະລຸນາປ່ຽນ URL ໃນແຖບທີ່ຢູ່ຂອງບຣາວເຊີຂອງທ່ານ ແລະ ເລີ່ມການຕິດຕັ້ງຄືນໃໝ່.</p>';
$string['pathsunsecuredataroot'] = 'ສະຖານທີ່ຕັ້ງ Dataroot ແມ່ນບໍ່ປອດໄພ';
$string['pathswrongadmindir'] = 'ລາຍການບໍລິຫານບໍ່ມີຢູ່';
$string['phpextension'] = 'ສ່ວນຂະຫຍາຍ PHP {$a}';
$string['phpversion'] = 'ສະບັບ PHP';
$string['phpversionhelp'] = '<p>PowerEduc ຕ້ອງການສະບັບ PHP ຢ່າງໜ້ອຍ 5.6.5 ຫຼື 7.1 (7.0.x ມີການຈຳກັັດບາງເຄື່ອງຈັກ).</p>
<p>ປະຈຸບັນທ່ານກຳລັງແລ່ນລຸ້ນ {$a}.</p>
<p>ທ່ານຕ້ອງໄດ້ຍົກລະດັບ PHP ຫຼື ຍ້າຍໄປເປັນເຈົ້າພາບກັບສະບັບທີ່ໃໝ່ກວ່າຂອງ PHP.</p>';
$string['welcomep10'] = '{$a->installername} ({$a->installerversion})';
$string['welcomep20'] = 'ທ່ານກໍາລັງເຫັນໜ້ານີ້ ເພາະວ່າທ່ານໄດ້ຕິດຕັ້ງປະສົບຜົນສໍາເລັດ ແລະ
     ເປີດຕົວແພັກເກັດ <strong>{$a->packname} {$a->packversion}</strong> ໃນຄອມພິວເຕີຂອງທ່ານ. ຊົມເຊີຍ!';
$string['welcomep30'] = 'ສິ່ງນີ້ໄດ້ປົດປ່ອຍ <strong>{$a->installername}</strong> ລວມມີໄປຼແກຼມ
    ເພື່ອສ້າງສະພາບແວດລ້ອມທີ່ <strong>PowerEduc</strong> ຈະດຳເນີນ, ຄື:';
$string['welcomep40'] = 'ແພັກເກດຍັງລວມມີ <strong>PowerEduc {$a->powereducrelease} ({$a->powereducversion})</strong>.';
$string['welcomep50'] = 'ການນໍາໃຊ້ຄໍາຮ້ອງສະໝັກທັງໝົດໃນແພັດເກດນີ້ ແມ່ນຖືກຄຸ້ມຄອງໂດຍໃບອະນຸຍາດຂອງພວກເຂົາ. ແພັກເກດ <strong>{$a->installername}</strong> ທີ່ສົມບູນແມ່ນ <a href="https://www.opensource.org/docs/definition_plain.html">ແຫຼ່ງຂໍ້ມູນເປີດ</a> ແລະ ຖືກແຈກຢາຍພາຍໃຕ້ ໃບອະນຸຍາດ <a href="https://www.gnu.org/copyleft/gpl.html">GPL</a>.';
$string['welcomep60'] = 'ຫນ້າຕໍ່ໄປນີ້ຈະນໍາທ່ານຜ່ານບາງຂັ້ນຕອນທີ່ງ່າຍຕໍ່ການປະຕິບັດຕາມ
     ກຳນົດຄ່າ ແລະ ຕັ້ງຄ່າ <strong>PowerEduc</strong> ໃນຄອມພິວເຕີຂອງທ່ານ. ທ່ານອາດຈະຍອມຮັບຄ່າເລີ່ມຕົ້ນ
     ການຕັ້ງຄ່າ ຫຼື ທາງເລືອກ, ປັບປຸງໃຫ້ເຂົາເຈົ້າເໝາະສົມກັບຄວາມຕ້ອງການຂອງທ່ານເອງ.';
$string['welcomep70'] = 'ຄລິກທີ່ປຸ່ມ "ຕໍ່ໄປ" ດ້ານລຸ່ມ ເພື່ອສືບຕໍ່ການຕັ້ງຄ່າ <strong>PowerEduc</strong>.';
$string['wwwroot'] = 'ທີ່ຢູ່ເວັບ';
