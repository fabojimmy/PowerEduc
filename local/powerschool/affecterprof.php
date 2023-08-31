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
use local_powerschool\affecterprof;

require_once(__DIR__ . '/../../config.php');
require_once($CFG->dirroot.'/local/powerschool/classes/affecterprof.php');

global $DB;
global $USER;

require_login();
$context = context_system::instance();
// require_capability('local/powerschool:managepages', $context);

$PAGE->set_url(new powereduc_url('/local/powerschool/affecterprof.php'));
$PAGE->set_context(\context_system::instance());
$PAGE->set_title(get_string('affecterprof', 'local_powerschool'));
$PAGE->set_heading(get_string('affecterprof', 'local_powerschool'));

$PAGE->navbar->add(get_string('configurationminini', 'local_powerschool'),  new powereduc_url('/local/powerschool/configurationmini.php'));
$PAGE->navbar->add(get_string('affecterprof', 'local_powerschool'), $managementurl);
// $PAGE->requires->js_call_amd('local_powerschool/confirmsupp');
// $PAGE->requires->js_call_amd('local_powerschool/confirmsupp');

$mform=new affecterprof();


if ($fromform = $mform->get_data()) {


$recordtoinsert = new stdClass();

$recordtoinsert = $fromform;

    // var_dump($fromform);
    // die;
 
        $DB->insert_record('affecterprof', $recordtoinsert);
}

//elle permet faire une affectation d'un professeur à une matiere dans une specialite et un cycle precis
if (!empty($_POST["professeur"])&& !empty($_POST["specialite"])&& !empty($_POST["cycle"])&& !empty($_POST["cours"]) && !empty($_POST["semestre"]) && !empty($_POST["salle"])) {
//  var_dump("df");die;
     $cours=$DB->get_records_sql("SELECT cse.id as idcouse FROM {coursspecialite} as csp,{courssemestre} cse WHERE csp.id=cse.idcoursspecialite AND idsemestre='".$_POST["semestre"]."' AND idcourses='".$_POST["cours"]."' AND idspecialite='".$_POST["specialite"]."' AND idcycle='".$_POST["cycle"]."'");
     foreach ($cours as $key => $value) {
         
    }

    $verifisaletsql="SELECT * FROM {salleele} sa,{inscription} i WHERE sa.idsalle='".$_POST["salle"]."'
                     AND sa.idetudiant=i.idetudiant AND i.idspecialite='".$_POST["specialite"]."' AND i.idcycle='".$_POST["cycle"]."'";
                    
    $verifisal=$DB->get_records_sql($verifisaletsql);
        // var_dump($verifisal);die;
if($verifisal)
  {

    $veriprof=$DB->get_records_sql("SELECT * FROM {coursspecialite} as csp,{courssemestre} cse,{affecterprof} af WHERE af.idcourssemestre=cse.id AND csp.id=cse.idcoursspecialite AND idsemestre='".$_POST["semestre"]."' AND idcourses='".$_POST["cours"]."' AND idspecialite='".$_POST["specialite"]."' AND idcycle='".$_POST["cycle"]."' AND idprof='".$_POST["professeur"]."'");

    if(!$veriprof)
    {

        $recordtoinsert = new stdClass();
        $recordtoinsert->idcourssemestre = $value->idcouse;
        // var_dump($recordtoinsert->idcourssemestre);die;
        $recordtoinsert->idprof =$_POST["professeur"];
        //  var_dump($_POST["professeur"],$_POST["specialite"],$_POST["cycle"],$_POST["cours"],$_POST["semestre"],$recordtoinsert->idcourssemestre,$recordtoinsert->idprof,$USER->id);die;
    
        $DB->execute("INSERT INTO mdl_affecterprof VALUES (0,'".$recordtoinsert->idcourssemestre."', '".$recordtoinsert->idprof."', '".$USER->id."','".time()."','".time()."','".$_POST["salle"]."')");
        //  $DB->insert_record('affecterprof', $recordtoinsert);
        
    }
    else
    {

        \core\notification::add('Vous ne pouvez pas affecter un cours dans le meme semestre un meme professeur'.$value->libellespecialite.'', \core\output\notification::NOTIFY_ERROR);
        redirect($CFG->wwwroot . '/local/powerschool/affecterprof.php?idca='.$_POST["idcampus"].'');
    }
  }
  else{
    $speci=$DB->get_records_sql("SELECT * FROM {specialite} WHERE id='".$_POST["specialite"]."'");

    foreach ($speci as $key => $value) {
        # code...
    }
    \core\notification::add('Cette salle n\'appertient pas à cette specialité '.$value->libellespecialite.'', \core\output\notification::NOTIFY_ERROR);
    redirect($CFG->wwwroot . '/local/powerschool/affecterprof.php?idca='.$_POST["idcampus"].'');

  }
}

if($_GET['id']) {

    // var_dump($_GET["id"]);die;
    $mform->supp_affecterprof($_GET['id']);
    redirect($CFG->wwwroot . '/local/powerschool/affecterprof.php', 'Bien supp');
        
}

//professeur
$sql="SELECT us.id as userid,firstname,lastname FROM {user} as us,{role_assignments} WHERE us.id=userid AND roleid=4";
$professeur=$DB->get_records_sql($sql);
//specialite
$sql="SELECT sp.id,libellespecialite FROM {specialite} sp,{filiere} f WHERE sp.idfiliere=f.id AND idcampus='".$_GET["idca"]."'";
$specialite=$DB->get_records_sql($sql);

$sql1="SELECT * FROM {salle} WHERE idcampus='".$_GET["idca"]."'";
$salle=$DB->get_records_sql($sql1);

// var_dump($salle);die;
$affecter=$DB->get_recordset_sql("SELECT af.id as idaffe,libellecycle,libellespecialite,libellesemestre,fullname,firstname,lastname,numerosalle FROM {coursspecialite} as csp,{courssemestre} cse,{affecterprof} af,
                            {semestre} se,{specialite} sp,{cycle} cy,{course} cou,{user} as us,{filiere} f,{salle} sal WHERE sal.id=af.idsalle AND sp.idfiliere=f.id AND csp.id=cse.idcoursspecialite AND us.id=idprof
                            AND idsemestre=se.id AND idcourses=cou.id AND idspecialite=sp.id AND idcycle=cy.id AND af.idcourssemestre=cse.id AND f.idcampus='".$_GET["idca"]."'");
// $affecterprof = $DB->get_recordset_sql('affecterprof', null, 'id');
$affecterprof = array();
foreach ($affecter as $record) {
    $affecterprof[] = (array) $record;
}
$templatecontext = (object)[
    'affecterprof' => array_values($affecterprof),
    'professeur' => array_values($professeur),
    'specialite' => array_values($specialite),
    'sallee' => array_values($salle),
    'affecterprofedit' => new powereduc_url('/local/powerschool/affecterprofedit.php'),
    'affecterprofsupp'=> new powereduc_url('/local/powerschool/affecterprof.php'),
    'salle' => new powereduc_url('/local/powerschool/salle.php'),
    'courssemestre' => new powereduc_url('/local/powerschool/affecterprof.php'),
    'root'=>$CFG->wwwroot,
    'idca'=>$_GET["idca"],
    'affec'=>get_string('affecterprof', 'local_powerschool')
];

$menumini = (object)[
    'affecterprof' => new powereduc_url('/local/powerschool/affecterprof.php'),
    'configurerpaie' => new powereduc_url('/local/powerschool/configurerpaiement.php'),
    'coursspecialite' => new powereduc_url('/local/powerschool/coursspecialite.php'),
    'salleele' => new powereduc_url('/local/powerschool/salleele.php'),
    'tranche' => new powereduc_url('/local/powerschool/tranche.php'),
    'confinot' => new powereduc_url('/local/powerschool/configurationnote.php'),
    'logo' => new powereduc_url('/local/powerschool/logo.php'),
    'message' => new powereduc_url('/local/powerschool/message.php'),

    ];
$campus=$DB->get_records('campus');
$campuss=(object)[
        'campus'=>array_values($campus),
        'confpaie'=>new powereduc_url('/local/powerschool/affecterprof.php'),
    ];
// $menu = (object)[
//     'annee' => new powereduc_url('/local/powerschool/anneescolaire.php'),
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
//     'notes' => new powereduc_url('/local/powerschool/note.php'),
// ];


echo $OUTPUT->header();


echo $OUTPUT->render_from_template('local_powerschool/navbarconfiguration', $menumini);
echo $OUTPUT->render_from_template('local_powerschool/campustou', $campuss);
// $mform->display();


echo $OUTPUT->render_from_template('local_powerschool/affecterprof', $templatecontext);


echo $OUTPUT->footer();