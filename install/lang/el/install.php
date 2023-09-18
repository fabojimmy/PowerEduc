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

$string['admindirname'] = 'Φάκελος διαχειριστή';
$string['availablelangs'] = 'Λίστα διαθέσιμων πακέτων γλώσσας';
$string['chooselanguagehead'] = 'Επιλογή γλώσσας';
$string['chooselanguagesub'] = 'Παρακαλούμε, επιλέξτε γλώσσα για την εγκατάσταση. Αυτή η γλώσσα θα χρησιμοποιηθεί επίσης ως προεπιλεγμένη γλώσσα για τον ιστότοπο, αν και μπορεί να αλλάξει αργότερα.';
$string['clialreadyconfigured'] = 'Το αρχείο ρυθμίσεων config.php υπάρχει ήδη. Χρησιμοποιήστε το admin/cli/install_database.php για να εγκαταστήσετε το PowerEduc για αυτόν τον ιστότοπο.';
$string['clialreadyinstalled'] = 'Το αρχείο ρυθμίσεων config.php υπάρχει ήδη. Χρησιμοποιήστε το admin/cli/install_database.php για να αναβαθμίσετε το PowerEduc για αυτόν τον ιστότοπο.';
$string['cliinstallheader'] = 'PowerEduc {$a} πρόγραμμα εγκατάστασης γραμμής εντολών';
$string['clitablesexist'] = 'Οι πίνακες βάσεων δεδομένων υπάρχουν ήδη. Η εγκατάσταση από γραμμή εντολών δεν μπορεί να συνεχιστεί.';
$string['databasehost'] = 'Κεντρικός H/Y που φιλοξενεί την Βάση Δεδομένων';
$string['databasename'] = 'Όνομα Βάσης Δεδομένων';
$string['databasetypehead'] = 'Επιλογή οδηγού βάσης δεδομένων';
$string['dataroot'] = 'Φάκελος δεδομένων';
$string['datarootpermission'] = 'Άδεια φακέλων/καταλόγων δεδομένων';
$string['dbprefix'] = 'Πρόθεμα πινάκων';
$string['dirroot'] = 'Φάκελος PowerEduc';
$string['environmenthead'] = 'Έλεγχος περιβάλλοντος...';
$string['environmentsub2'] = 'Κάθε έκδοση PowerEduc έχει κάποια ελάχιστη απαίτηση σχετικά με την έκδοση της PHP και ενός αριθμού από αναγκαίες επεκτάσεις PHP.
Ο πλήρης έλεγχος του περιβάλλοντος πραγματοποιείται πριν κάθε εγκατάσταση και αναβάθμιση. Παρακαλούμε επικοινωνήστε με τον διαχειριστή του εξυπηρετητή εάν δεν ξέρετε πως να εγκαταστήσετε νέα έκδοση της PHP ή να ενεργοποιήσετε επεκτάσεις της.';
$string['errorsinenvironment'] = 'Ο έλεγχος του περιβάλλοντος απέτυχε!';
$string['installation'] = 'Εγκατάσταση';
$string['langdownloaderror'] = 'Δυστυχώς η γλώσσα «{$a}» δεν είναι εγκατεστημένη. Η εγκατάσταση θα συνεχιστεί στα αγγλικά.';
$string['memorylimithelp'] = '<p>Το όριο μνήμης της PHP στον εξυπηρετητή σας είναι ορισμένο αυτή τη στιγμή στα {$a}.</p>

<p>Αυτό μπορεί να προκαλέσει προβλήματα μνήμης στο PowerEduc στη συνέχεια, ειδικά αν έχετε πολλά ενεργοποιημένα αρθρώματα και/ή πολλούς χρήστες.</p>

<p>Συνιστάται η ρύθμιση της PHP με μεγαλύτερο όριο, αν αυτό είναι δυνατό, π.χ. 40M. Υπάρχουν πολλοί τρόποι να το κάνετε αυτό, τους οποίους μπορείτε να δοκιμάσετε:</p>
<ol>
<li>Αν έχετε τη δυνατότητα, κάνετε επαναμεταγλώττιση της PHP με την παράμετρο <i>--enable-memory-limit</i>. Αυτό θα επιτρέψει στο PowerEduc να ορίσει μόνο του το όριο μνήμης.</li>
<li>Αν έχετε πρόσβαση στο αρχείο php.ini, μπορείτε να αλλάξετε τη ρύθμιση <b>memory_limit</b> σε 40M. Αν δεν έχετε πρόσβαση ζητήστε από το διαχειριστή να το κάνει για εσάς.</li>
<li>Σε κάποιους εξυπηρετητές PHP μπορείτε να δημιουργήσετε ένα αρχείο .htaccess στο φάκελο του PowerEduc που να περιέχει την παρακάτω γραμμή:
<blockquote>php_value memory_limit 40M</div></blockquote>
<p>Ωστόσο, σε κάποιους εξυπηρετητές αυτό θα εμποδίσει τη λειτουργία <b>όλων</b> των σελίδων PHP (θα βλέπετε σφάλματα όταν ανοίγετε τις σελίδες), οπότε θα πρέπει να διαγράψετε το αρχείο .htaccess.</p></li>
</ol>';
$string['paths'] = 'Μονοπάτια';
$string['pathserrcreatedataroot'] = 'Ο φάκελος δεδομένων ({$a->dataroot}) δεν μπορεί να δημιουργηθεί από το πρόγραμμα εγκατάστασης.';
$string['pathshead'] = 'Επιβεβαίωση μονοπατιών';
$string['pathsrodataroot'] = 'Ο Φάκελος Δεδομένων δεν είναι εγγράψιμος.';
$string['pathsroparentdataroot'] = 'Ο γονικός φάκελος ({$a->parent}) δεν είναι εγγράψιμος. Ο φάκελος δεδομένων ({$a->dataroot}) δεν μπορεί να δημιουργηθεί από το πρόγραμμα εγκατάστασης.';
$string['pathssubadmindir'] = 'Κάποιοι λίγοι κεντρικοί υπολογιστές ιστού χρησιμοποιούν το /admin ως ειδική διεύθυνση URL για την πρόσβαση σε κάποιο πίνακα ελέγχου ή κάτι τέτοιο. Δυστυχώς αυτό έρχεται σε αντίθεση με την τυπική τοποθεσία των σελίδων διαχείρισης (admin) του PowerEduc. Αυτό μπορεί να διορθωθεί με την μετονομασία του admin φακέλου στην εγκατάστασή σας, και βάζοντας αυτό το καινούργιο όνομα εδώ. Για παράδειγμα: <em>powereducadmin</em>. Αυτό θα διορθώσει όλους τους συνδέσμους με το admin στην διεύθυνσή τους σε όλη την εγκατάσταση του PowerEduc σας.';
$string['pathssubdataroot'] = '<p>Ένας φάκελος όπου το PowerEduc θα αποθηκεύει όλα τα ανεβασμένα από τους χρήστες αρχεία.</p><p>Αυτός ο φάκελος θα πρέπει να είναι αναγνώσιμος ΚΑΙ ΕΓΓΡΑΨΙΜΟΣ από τον χρήστη του εξυπηρετητή ιστού (συνήθως «nobody» ή «apache»).</p><p>Δεν πρέπει να είναι προσβάσιμος κατευθείαν από τον ιστό.</p><p>Αν ο φάκελος δεν υπάρχει, η διαδικασία εγκατάστασης θα προσπαθήσει να τον δημιουργήσει.</p>';
$string['pathssubdirroot'] = '<p>Η πλήρης διαδρομή του φακέλου που περιέχει τα αρχεία κώδικα του PowerEduc.</p>';
$string['pathssubwwwroot'] = '<p>Η πλήρης διεύθυνση από την οποία θα γίνεται η πρόσβαση στο PowerEduc, δηλαδή η διεύθυνση που οι χρήστες θα εισάγουν στην γραμμή διεύθυνσης του περιηγητή, για να έχουν πρόσβαση στου PowerEduc.</p>
<p>Δεν είναι δυνατόν να έχετε πρόβαση στο PowerEduc χρησιμοποιώντας πολλαπλές διευθύνσεις. Εάν ο ιστότοπος θα είναι προσβάσιμος μέσω πολλαπλών διευθύνσεων τότε επιλέξτε την ευκολότερη και εγκαταστήστε μια μόνιμη ανακατεύθυνση για καθεμία από τις άλλες διευθύνσεις.</p>
<p>Εάν ο ιστότοπός σας είναι προσβάσιμος τόσο από το Διαδίκτυο όσο και από ένα εσωτερικό δίκτυο (που συχνά λέγεται intranet) τότε χρησιμοποιήστε εδώ την δημόσια διεύθυνση.</p>
<p>Αν η τρέχουσα διεύθυνση δεν είναι σωστή, παρακαλούμε αλλάξτε την URL διεύθυνση στην γραμμή διευθύνσεων του περιηγητή σας και επανεκκινήστε την εγκατάσταση.</p>';
$string['pathsunsecuredataroot'] = 'Η τοποθεσία του Φάκελου Δεδομένων δεν είναι ασφαλής';
$string['pathswrongadmindir'] = 'Ο φάκελος Admin δεν υπάρχει';
$string['phpextension'] = 'Επέκταση {$a} της PHP';
$string['phpversion'] = 'Έκδοση της PHP';
$string['phpversionhelp'] = 'p>Το PowerEduc απαιτεί η έκδοση της PHP να είναι τουλάχιστον 5.6.5 ή 7.1 (η 7.0.x έχει κάποιους περιορισμούς στη μηχανή).</p>
<p>Αυτή τη στιγμή εκτελείτε την έκδοση {$a}</p>
<p>Πρέπει να αναβαθμίσετε την PHP ή να μεταφερθείτε σε έναν κεντρικό Η/Υ με μια νεότερη έκδοση της PHP!</p>';
$string['welcomep10'] = '{$a->installername} ({$a->installerversion})';
$string['welcomep20'] = 'Βλέπετε αυτή τη σελίδα γιατί εγκαταστήσατε και ξεκινήσατε με επιτυχία το πακέτο <strong>{$a->packname} {$a->packversion}</strong> στον υπολογιστή σας. Συγχαρητήρια!';
$string['welcomep30'] = 'Αυτή η έκδοση/διανομή <strong>{$a->installername}</strong> περιλαμβάνει τις εφαρμογές για τη δημιουργία ενός περιβάλλοντος μέσα στο οποίο θα λειτουργεί το <strong>PowerEduc</strong>, ονομαστικά:';
$string['welcomep40'] = 'Το πακέτο περιλαμβάνει επίσης το <strong>PowerEduc {$a->powereducrelease} ({$a->powereducversion})</strong>.';
$string['welcomep50'] = 'Η χρήση όλων των εφαρμογών σε αυτό το πακέτο υπόκειται στις αντίστοιχες άδειες χρήσης. Ολόκληρο το πακέτο <strong>{$a->installername}</strong> είναι <a href="https://www.opensource.org/docs/definition_plain.html">λογισμικό ανοικτού κώδικα</a> και διανέμεται με την άδεια χρήσης <a href="https://www.gnu.org/copyleft/gpl.html">GPL</a>.';
$string['welcomep60'] = 'Οι παρακάτω σελίδες θα σας καθοδηγήσουν με εύκολα βήματα στην εγκατάσταση και ρύθμιση του <strong>PowerEduc</strong> στον υπολογιστή σας. Μπορείτε να δεχθείτε τις προεπιλεγμένες ρυθμίσεις ή προαιρετικά, να τις τροποποιήσετε ανάλογα με τις ανάγκες σας.';
$string['welcomep70'] = 'Πατήστε το κουμπί «Συνέχεια» για να συνεχίσετε με την εγκατάσταση του <strong>PowerEduc</strong>.';
$string['wwwroot'] = 'Διεύθυνση ιστού';
