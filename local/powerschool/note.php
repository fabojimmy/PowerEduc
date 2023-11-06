<?php
// This file is part of Moodle Course Rollover Plugin
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
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * @package     local_powerschool
 * @author      Wilfried
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

use core\progress\display;
use local_powerschool\note;

require_once(__DIR__ . '/../../config.php');
require_once($CFG->dirroot.'/local/powerschool/classes/note.php');
// require_once('tcpdf/tcpdf.php');
require_once(__DIR__ . '/lib.php');

global $DB;
global $USER;

require_login();
$context = context_system::instance();
// require_capability('local/message:managemessages', $context);

$PAGE->set_url($CFG->wwwroot.'/local/powerschool/inscription.php');
$PAGE->set_context(\context_system::instance());
$PAGE->set_title('Configuration Bulletin');
$PAGE->set_heading('Configuration Bulletin');

// $PAGE->navbar->add('Administration du Site',  $CFG->wwwroot.'/local/powerschool/index.php'));
$PAGE->navbar->add(get_string('inscription', 'local_powerschool'), $managementurl);
// $PAGE->requires->js_call_amd('local_powerschool/confirmsupp');
// $PAGE->requires->js_call_amd('local_powerschool/confirmsupp');

$mform=new note();



if ($mform->is_cancelled()) {

    redirect($CFG->wwwroot . '/local/powerschool/index.php', 'annuler');

} else if ($_SERVER['REQUEST_METHOD'] === 'POST' ) {


$recordtoinsert = new stdClass();

// $recordtoinsert = $fromform;
    
// var_dump($recordtoinsert);
// die;
    # code...
    $verif=$DB->get_records_sql("SELECT * FROM {coursspecialite} cs,{courssemestre} css,{affecterprof} af
                                 WHERE cs.id=css.idcoursspecialite AND css.id=af.idcourssemestre AND 
                                 cs.idcycle='".$_POST["idcycle"]."' AND cs.idspecialite='".$_POST["idspecialite"]."'
                                 AND css.idsemestre='".$_POST["idsemestre"]."' AND af.idprof='".$USER->id."' 
                                 AND af.idsalle='".$_POST["salle"]."'");
 if($verif)
 {
    $vetar=[
       "idcycle"=>$_POST["idcycle"],
       "idspecialite"=>$_POST["idspecialite"],
       "idcampus"=>$_POST["idcampus"],
       "idsemestre"=>$_POST["idsemestre"],
       "idanneescolaire"=>$_POST["idanneescolaire"],
       "idprofesseur"=>$USER->id,
       "idsalle"=>$_POST["salle"],
    ];
    $verib=$DB->get_records("bulletin",$vetar);
        if(!$verib)
        {

        
            $recordtoinsert->idcycle=$_POST["idcycle"];
            $recordtoinsert->idprofesseur=$USER->id;
            $recordtoinsert->idcampus=$_POST["idcampus"];
            $recordtoinsert->idsemestre=$_POST["idsemestre"];
            $recordtoinsert->idanneescolaire=$_POST["idanneescolaire"];
            $recordtoinsert->idspecialite=$_POST["idspecialite"];
            $recordtoinsert->usermodified=$_POST["usermodified"];
            $recordtoinsert->timecreated=$_POST["timecreated"];
            $recordtoinsert->timemodified=$_POST["timemodified"];

            // var_dump($recordtoinsert,$_POST["salle"]);die;
            // $DB->insert_record('bulletin', $recordtoinsert);
            $DB->execute("INSERT INTO mdl_bulletin VALUES(0,'".$USER->id."','".$recordtoinsert->idanneescolaire."','".$recordtoinsert->idsemestre."','".$recordtoinsert->idcampus."','".$recordtoinsert->idspecialite."','".$recordtoinsert->idcycle."','".$recordtoinsert->usermodified."','".$recordtoinsert->timecreated."','".$recordtoinsert->timemodified."','".$_POST["salle"]."')");
            redirect($CFG->wwwroot . '/local/powerschool/note.php?idca='.$_POST["idcampus"].'', 'Enregistrement effectué');
        }
        else{

            \core\notification::add('Vos avez déjà fait une configuration similaire', \core\output\notification::NOTIFY_ERROR);
           
            redirect($CFG->wwwroot . '/local/powerschool/note.php?idca='.$_POST["idcampus"].'');
        }
 }
 else
 {
    \core\notification::add('Soit vous n\'appartenez pas à cette Specialite/Classe <br>
                             Soit à au cycle <br>
                             Soit à la Salle <br>', \core\output\notification::NOTIFY_ERROR);

    redirect($CFG->wwwroot . '/local/powerschool/note.php?idca='.$_POST["idcampus"].'');

 }
 
   
}



// if($_GET['id']) {

//     // $mform->supp_inscription($_GET['id']);
//     redirect($CFG->wwwroot . '/local/powerschool/inscription.php', 'Information Bien supprimée');
        
// }


// $inscription =$tab = array();

$sql_inscrip = "SELECT i.id as idbu,idspecialite,idcycle,i.idanneescolaire,i.idcampus,numerosalle,sa.id as idsa,idsemestre,libellesemestre,datedebut,datefin,villecampus,libellecampus,libellespecialite,libellecycle,nombreannee
                FROM {bulletin} i, {anneescolaire} a,{semestre} sem, {user} u, {specialite} s, {campus} c, {cycle} cy,{salle} sa
                WHERE i.idsalle=sa.id AND i.idanneescolaire=a.id AND i.idspecialite=s.id AND i.idprofesseur=u.id 
                AND i.idcampus=c.id AND i.idcycle = cy.id AND i.idsemestre=sem.id AND i.idprofesseur='".$USER->id."' AND i.idcampus='".$_GET["idca"]."'" ;

// $inscription = $DB->get_records('inscription', null, 'id');


// var_dump($sql_inscrip);
// die;
$inscriptionss = $DB->get_recordset_sql($sql_inscrip);
// $i=0;

// var_dump($inscription);
// die;

$inscription=array();
foreach ($inscriptionss as $key=> $value){

    $time = $value->datedebut;
    $timef = $value->datefin;

    $dated = date('Y',$time);
    $datef = date('Y',$timef);

    $value->datedebut = $dated;
    $value->datefin = $datef;

    $inscription[]= (array) $value;

}

// var_dump($i);
// var_dump($inscription);
// die;
$campus=$DB->get_records("campus");
$campuss=(object)[
    'campus'=>array_values($campus),
    'confpaie'=>$CFG->wwwroot.'/local/powerschool/note.php',
];
$templatecontext = (object)[
    'inscription' => array_values($inscription),
    // 'nb'=>array_values($tab),
    'inscriptionedit' => $CFG->wwwroot.'/local/powerschool/inscriptionedit.php',
    'inscriptionsupp'=> $CFG->wwwroot.'/local/powerschool/inscription.php',
    'note'=> $CFG->wwwroot.'/local/powerschool/entrernote.php',
    // 'imprimer' => $CFG->wwwroot.'/local/powerschool/imp.php'),
];

$menu = (object)[
    'annee' => $CFG->wwwroot.'/local/powerschool/anneescolaire.php',
    'campus' => $CFG->wwwroot.'/local/powerschool/campus.php',
    'semestre' => $CFG->wwwroot.'/local/powerschool/semestre.php',
    'salle' => $CFG->wwwroot.'/local/powerschool/salle.php',
    'seance' => $CFG->wwwroot.'/local/powerschool/seance.php',
    'filiere' => $CFG->wwwroot.'/local/powerschool/filiere.php',
    'cycle' => $CFG->wwwroot.'/local/powerschool/cycle.php',
    'modepayement' => $CFG->wwwroot.'/local/powerschool/modepayement.php',
    'matiere' => $CFG->wwwroot.'/local/powerschool/matiere.php',
    'specialite' => $CFG->wwwroot.'/local/powerschool/specialite.php',
    'inscription' => $CFG->wwwroot.'/local/powerschool/inscription.php',
    'enseigner' => $CFG->wwwroot.'/local/powerschool/enseigner.php',
    'paiement' => $CFG->wwwroot.'/local/powerschool/paiement.php',
    'programme' => $CFG->wwwroot.'/local/powerschool/programme.php',
    'notes' => $CFG->wwwroot.'/local/powerschool/note.php',

];


echo $OUTPUT->header();

if(has_capability("local/powerschool:notes",context_system::instance(),$USER->id))
{
    
}
// echo $OUTPUT->render_from_template('local_powerschool/navbar', $menu);
echo '<div style="margin-top:80px";><wxcvbn</div>';
echo $OUTPUT->render_from_template('local_powerschool/campustou', $campuss);

$mform->display();


echo $OUTPUT->render_from_template('local_powerschool/note', $templatecontext);


echo $OUTPUT->footer();