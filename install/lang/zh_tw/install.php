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

$string['admindirname'] = '管理目錄';
$string['availablelangs'] = '可使用的語言包';
$string['chooselanguagehead'] = '選擇一種語言';
$string['chooselanguagesub'] = '請選擇在安裝過程中所用的語言。這語言也將會當作這網站的預設語言。但稍後您可以根據需要再重新選擇。';
$string['clialreadyconfigured'] = '檔案 config.php  已經存在，若你要這一網站上安裝PowerEduc，請使用admin/cli/install_database.php';
$string['clialreadyinstalled'] = '檔案 config.php  已經存在，若你要在這一網站為PowerEduc升級，請使用admin/cli/install_database.php';
$string['cliinstallheader'] = 'PowerEduc {$a} 命令列安裝程式';
$string['clitablesexist'] = '資料庫的資料表已經呈現出來。命令列介面安裝不能繼續。';
$string['databasehost'] = '資料庫主機';
$string['databasename'] = '資料庫名稱';
$string['databasetypehead'] = '選擇資料庫裝置';
$string['dataroot'] = '資料目錄';
$string['datarootpermission'] = '資料目錄存取授權';
$string['dbprefix'] = '資料表名稱的前置字元';
$string['dirroot'] = 'PowerEduc目錄';
$string['environmenthead'] = '檢查您的環境中...';
$string['environmentsub2'] = '每一個PowerEduc版本都有一些PHP版本的最低要求和一堆強制開啟的PHP擴展。在進行安裝或升級之前都需要作完整的環境檢查。<br />
若你不知道要怎樣新的PHP版本或啟用PHP擴展，請聯絡伺服器管理員。';
$string['errorsinenvironment'] = '環境檢查失敗!';
$string['installation'] = '安裝';
$string['langdownloaderror'] = '很不幸地，語言“{$a}”無法下載安裝。此安裝過程將以英文繼續進行。';
$string['memorylimithelp'] = '<p>你的伺服器的PHP記憶體上限目前設定為{$a}。</p>
<p>稍後它可能會造成PowerEduc記憶體的問題，尤其當您啟動了很多的模組以及有大量的用戶之後。</p>
<p>若可能，建議您將PHP的上限設得高一點，比如40M。
以下有幾種方式您可以試試：</p>
<ol>
<li>如果可以的話，用<i>--enable-memory-limit</i>重新編譯PHP。讓PowerEduc自己設定記憶體上限。
<li>如果您可以更改 php.ini 檔，就改變<b>memory_limit</b> 這個設定值，例如，改到40M。如果您無法更改這個檔案，您可以請寄存主機的管理者幫您做。</li>
<li>在一些PHP伺服器上，您可以在PowerEduc目錄下，建立.htaccess檔，包含這行:

<blockquote>php_value memory_limit 40M</blockquote>

<p>然而，在某些伺服器上，這可能造成<b>所有的</b> PHP 網頁無法運作(當您查看這些網頁時，您就會看到錯誤訊息) 因此，您就必須將 .htaccess 檔案移除。</li>
</ol>';
$string['paths'] = '路徑';
$string['pathserrcreatedataroot'] = '資料目錄 ({$a->dataroot})無法由這安裝程式建立';
$string['pathshead'] = '確認路徑';
$string['pathsrodataroot'] = '資料根目錄是無法寫入的';
$string['pathsroparentdataroot'] = '上層目錄({$a->parent})是不可寫入的。安裝程式無法建立資料目錄({$a->dataroot})。';
$string['pathssubadmindir'] = '有些網站主機使用/admin這個網址來瀏覽控制面版或其他功能。很不幸，這個設定和PowerEduc管理頁面的標準路徑產生衝突。這個問題可以解決，只需在您的安裝目錄中把admin更換名稱，然後把新名稱輸入到這裡。例如<em>powereducadmin</em>這麼做會改變PowerEduc中的管理連接。';
$string['pathssubdataroot'] = '<p>你需要有一個目錄讓PowerEduc可以儲存所有的用戶上傳的檔案。</p><p>這目錄對於網頁伺服器用戶(通常是"www-data"、"nobody"或"apache")而言，應該是可讀的和<b>可寫的</b>。</p>
<p>它必須是不能透過網際網路直接存取的。</p>
<p>若此目錄目前不存在，這安裝過程將會試著建立它。</p>';
$string['pathssubdirroot'] = '包含PowerEduc程式碼的目錄的完整路徑';
$string['pathssubwwwroot'] = '可以進入使用PowerEduc的完整網址，也就是用戶為了要使用PowerEduc，而需要輸入到瀏覽器的網址列的地址。

不可能使用多個網址來存取PowerEduc，如果您的網站有多個公開網址，您必須選擇一個最簡單的網址，並把其他的網址都設定為永久重新導向。

如果您的網站可以透過網際網路，也可以透過內部網路來瀏覽，那麼在此請設定公開的網址。

如果目前的網址不正確，請在你的瀏覽器的網址列中更改網址，並重新安裝。';
$string['pathsunsecuredataroot'] = '資料根(Dataroot)目錄的位置不安全';
$string['pathswrongadmindir'] = '管理目錄不存在';
$string['phpextension'] = '{$a} PHP擴展';
$string['phpversion'] = 'PHP版本';
$string['phpversionhelp'] = '<p>PowerEduc 需要的PHP版本至少要4.3.0或是5.1.0 (5.0.x有一些已知的問題) </p>
<p>您目前執行的版本是{$a}</p>
<p>您必須更新您的 PHP 或在有更新版本的主機上進行安裝！(若是5.0.x，你可以下降到4.4.x 版本)</p>';
$string['welcomep10'] = '{$a->installername} ({$a->installerversion})';
$string['welcomep20'] = '這個頁面是提醒您已經在您的電腦上成功安裝與啟動 <strong>{$a->packname} {$a->packversion}</strong> ，恭喜！';
$string['welcomep30'] = '這一<strong>{$a->installername}</strong>的版本包含了一些可以建立<strong>PowerEduc</strong>執行環境的應用程序：';
$string['welcomep40'] = '這個軟體還包含了<strong>PowerEduc {$a->powereducrelease} ({$a->powereducversion})</strong>。';
$string['welcomep50'] = '使用本軟體包所包含的所有應用程序時，應遵循它們各自的授權協議。整個<strong>{$a->installername}</strong> 軟體都是<a href="http://www.opensource.org/docs/definition_plain.html">開放原始碼</a> ，並且是在 <a href="http://www.gnu.org/copyleft/gpl.html">GPL</a> 授權協議下發佈。';
$string['welcomep60'] = '接下來的一些頁面將會透過一些簡單的步驟引導您配置和設定在你電腦上的 <strong>PowerEduc</strong> 。
您可以接受這些預設值，或是針對你自己的需要來調整。';
$string['welcomep70'] = '點選 "下一步" 按鈕，繼續設定<strong>PowerEduc</strong>.';
$string['wwwroot'] = '網站位址';
