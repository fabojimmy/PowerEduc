<?php
// This file is part of PowerEduc Course Rollover Plugin
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
 * @package     local_powerschool
 * @author      Wilfried
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

use core\progress\display;
use local_powerschool\filiere;

require_once(__DIR__ . '/../../config.php');
require_once($CFG->dirroot.'/local/powerschool/classes/filiere.php');

global $DB;
global $USER;

require_login();
$context = context_system::instance();
// require_capability('local/powerschool:managepages', $context);

$PAGE->set_url(new powereduc_url('/local/powerschool/filiere.php'));
$PAGE->set_context(\context_system::instance());
$PAGE->set_title('Enregistrer une filiere');
$PAGE->set_heading('Enregistrer une filiere');

$PAGE->navbar->add(get_string('reglages', 'local_powerschool'),  new powereduc_url('/local/powerschool/reglages.php'));
$PAGE->navbar->add(get_string('filiere', 'local_powerschool'), $managementurl);
// $PAGE->requires->js_call_amd('local_powerschool/confirmsupp');
// $PAGE->requires->js_call_amd('local_powerschool/confirmsupp');

$mform=new filiere();



if ($mform->is_cancelled()) {

    redirect($CFG->wwwroot . '/local/powerschool/index.php', 'annuler');

} else if ($_SERVER['REQUEST_METHOD'] === 'POST' && $fromform = $mform->get_data()) {


$recordtoinsert = new stdClass();

$recordtoinsert = $fromform;

    // var_dump($fromform);
    // die;
 if (!$mform->verifiliere($recordtoinsert->libellefiliere,$recordtoinsert->idcampus)) {
    # code...
    $DB->insert_record('filiere', $recordtoinsert);
    redirect($CFG->wwwroot . '/local/powerschool/filiere.php', 'Enregistrement effectué');
    exit;
} else {
    //  redirect($CFG->wwwroot . '/local/powerschool/filiere.php', 'Cette filiere excite');
     \core\notification::add('Cette filiere existe', \core\output\notification::NOTIFY_ERROR);

 }
 
}

if($_GET['id']) {

    $mform->supp_filiere($_GET['id']);
    redirect($CFG->wwwroot . '/local/powerschool/filiere.php', 'Information Bien supprimée');
        
}



// var_dump($mform->selectfiliere());
// die;
$filiere = $DB->get_records('filiere', null, 'id');
$campus=$DB->get_records("campus");
$vericam=$DB->get_records_sql("SELECT * FROM {campus} c,{typecampus} t
                                WHERE t.id=c.idtypecampus AND c.id='".$_GET["idca"]."'");    
            foreach($vericam as $key => $ver)
            { 
                if($ver->libelletype=="college"|| $ver->libelletype=="lycee")
                {

                    $table='
                    <input type="checkbox" class="toutpr">
                    <tr>
                        <td style="font-size:17px;font-weight:700;"><input type="checkbox" name="filiere[]" class="checkboxItem" value="Economique et sociale">Economique et sociale</td>
                        <td style="font-size:17px;font-weight:700;"><input type="checkbox" name="filiere[]" class="checkboxItem" value="Scientifique">Scientifique</td>
                        <td style="font-size:17px;font-weight:700;"><input type="checkbox" name="filiere[]" class="checkboxItem" value="Littéraire ">Littéraire </td>
                        <td style="font-size:17px;font-weight:700;"><input type="checkbox" name="filiere[]" class="checkboxItem" value="Sciences et Technologies du Management et de la Gestion ">Sciences et Technologies du Management et de la Gestion </td>
                    </tr>';
                }else if($ver->libelletype=="primaire")
                {

                    $table='
                    <input type="checkbox" class="toutpr">
                    <tr>
                        <td style="font-size:17px;font-weight:700;"><input type="checkbox" name="filiere[]" class="checkboxItem" value="standard">standard</td>
                    </tr>';
                }
            }
$templatecontext = (object)[
    'filiere' => array_values($filiere),
    'campus' => array_values($campus),
    'table' => $table,
    'filiereedit' => new powereduc_url('/local/powerschool/filiereedit.php'),
    'filieresupp'=> new powereduc_url('/local/powerschool/filiere.php'),
    'specialite' => new powereduc_url('/local/powerschool/specialite.php'),
    'specialiteexe' => new powereduc_url('/local/powerschool/specialiteexe.php'),
    'root'=>$CFG->wwwroot,
    'idca'=>$_GET["idca"],

];

// $menu = (object)[
//     'annee' => new powereduc_url('/local/powerschool/anneescolaire.php'),
//     'campus' => new powereduc_url('/local/powerschool/campus.php'),
//     'semestre' => new powereduc_url('/local/powerschool/semestre.php'),
//     'salle' => new powereduc_url('/local/powerschool/salle.php'),
//     'filiere' => new powereduc_url('/local/powerschool/filiere.php'),
//     'cycle' => new powereduc_url('/local/powerschool/cycle.php'),
//     'modepayement' => new powereduc_url('/local/powerschool/modepayement.php'),
//     'matiere' => new powereduc_url('/local/powerschool/matiere.php'),
//     'seance' => new powereduc_url('/local/powerschool/seance.php'),
//     'inscription' => new powereduc_url('/local/powerschool/inscription.php'),
//     'enseigner' => new powereduc_url('/local/powerschool/enseigner.php'),
//     'paiement' => new powereduc_url('/local/powerschool/paiement.php'),
//     'programme' => new powereduc_url('/local/powerschool/programme.php'),
//     // 'notes' => new powereduc_url('/local/powerschool/note.php'),
//     'bulletin' => new powereduc_url('/local/powerschool/bulletin.php'),
//     'configurermini' => new powereduc_url('/local/powerschool/configurationmini.php'),
//     'gerer' => new powereduc_url('/local/powerschool/gerer.php'),
//     'modepaie' => new powereduc_url('/local/powerschool/modepaiement.php'),
//     'statistique' => new powereduc_url('/local/powerschool/statistique.php'),


// ];

$menu = (object)[
    'statistique' => new powereduc_url('/local/powerschool/statistique.php'),
    'reglage' => new powereduc_url('/local/powerschool/reglages.php'),
    // 'matiere' => new powereduc_url('/local/powerschool/matiere.php'),
    'seance' => new powereduc_url('/local/powerschool/seance.php'),
    'programme' => new powereduc_url('/local/powerschool/programme.php'),

    'inscription' => new powereduc_url('/local/powerschool/inscription.php'),
    // 'notes' => new powereduc_url('/local/powerschool/note.php'),
    'bulletin' => new powereduc_url('/local/powerschool/bulletin.php'),
    'configurermini' => new powereduc_url('/local/powerschool/configurationmini.php'),
    // 'gerer' => new powereduc_url('/local/powerschool/gerer.php'),

];


echo $OUTPUT->header();


// echo $OUTPUT->render_from_template('local_powerschool/navbar', $menu);
$mform->display();


echo $OUTPUT->render_from_template('local_powerschool/filiere', $templatecontext);


echo $OUTPUT->footer();