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

use local_powerschool\configurationnote;
use local_powerschool\periode;

require_once(__DIR__ . '/../../config.php');
require_once($CFG->dirroot.'/local/powerschool/classes/configurationnote.php');

global $DB;
global $USER;

require_login();
$context = context_system::instance();
// require_capability('local/powerschool:managepages', $context);

$PAGE->set_url(new powereduc_url('/local/powerschool/configurationnote.php'));
$PAGE->set_context(\context_system::instance());
$PAGE->set_title(get_string('confignote', 'local_powerschool'));
$PAGE->set_heading(get_string('confignote', 'local_powerschool'));

$PAGE->navbar->add(get_string('configurationminini', 'local_powerschool'),  new powereduc_url('/local/powerschool/configurationmini.php'));
$PAGE->navbar->add(get_string('confignote', 'local_powerschool'), $managementurl);
// $PAGE->requires->js_call_amd('local_powerschool/confirmsupp');
// $PAGE->requires->js_call_amd('local_powerschool/confirmsupp');

$mform=new configurationnote();



if ($mform->is_cancelled()) {

    redirect($CFG->wwwroot . '/local/powerschool/index.php', 'annuler');

} else if ($_SERVER['REQUEST_METHOD'] === 'POST' && $fromform = $mform->get_data()) {


$recordtoinsert = new stdClass();

$recordtoinsert = $fromform;

    // var_dump($fromform);
    // die;
    if(($fromform->normal+$fromform->cc)>100)
    {
        \core\notification::add('L\'addiction du pourcentage de la normal et du controle continue ne peut pas dépasser 100%', \core\output\notification::NOTIFY_ERROR);
        redirect($CFG->wwwroot . '/local/powerschool/configurationnote.php?');
    
    }
    else{

        $DB->insert_record('configurationnote', $recordtoinsert);
        redirect($CFG->wwwroot . '/local/powerschool/configurationnote.php', 'Enregistrement effectué');
        exit;
    }
}

if($_GET['id']) {

    $mform->supp_periode($_GET['id']);
    redirect($CFG->wwwroot . '/local/powerschool/configurationnote.php', 'Information Bien supprimée');
        
}



// var_dump($mform->selectperiode());
// die;
$sqlconf="SELECT con.id,normal,cc,libellecampus FROM {configurationnote} con,{campus} c WHERE con.idcampus=c.id";
$periode = $DB->get_records_sql($sqlconf);

$templatecontext = (object)[
    'periode' => array_values($periode),
    'periodeedit' => new powereduc_url('/local/powerschool/configurationnoteedit.php'),
    'periodesupp'=> new powereduc_url('/local/powerschool/configurationnote.php'),
    'coursspecialite'=> new powereduc_url('/local/powerschool/coursspecialite.php'),
    'programme' => new powereduc_url('/local/powerschool/programme.php'),
];

// $menu = (object)[
//     'annee' => new powereduc_url('/local/powerschool/anneescolaire.php'),
//     'campus' => new powereduc_url('/local/powerschool/campus.php'),
//     'semestre' => new powereduc_url('/local/powerschool/semestre.php'),
//     'salle' => new powereduc_url('/local/powerschool/salle.php'),
//     'filiere' => new powereduc_url('/local/powerschool/filiere.php'),
//     'cycle' => new powereduc_url('/local/powerschool/cycle.php'),
//     'periode' => new powereduc_url('/local/powerschool/periode.php'),
//     'modepayement' => new powereduc_url('/local/powerschool/modepayement.php'),
//     'matiere' => new powereduc_url('/local/powerschool/matiere.php'),
//     'seance' => new powereduc_url('/local/powerschool/seance.php'),
//     'inscription' => new powereduc_url('/local/powerschool/inscription.php'),
//     'enseigner' => new powereduc_url('/local/powerschool/enseigner.php'),
//     'paiement' => new powereduc_url('/local/powerschool/paiement.php'),
//     'programme' => new powereduc_url('/local/powerschool/programme.php'),
// ];


echo $OUTPUT->header();


// echo $OUTPUT->render_from_template('local_powerschool/navbar', $menu);
$mform->display();


echo $OUTPUT->render_from_template('local_powerschool/configurationnote', $templatecontext);


echo $OUTPUT->footer();