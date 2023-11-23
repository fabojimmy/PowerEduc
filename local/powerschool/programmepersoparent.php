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
require_once(__DIR__ . '/idetablisse.php');

global $DB;
global $USER;

require_login();
$context = context_system::instance();
// require_capability('local/message:managemessages', $context);

$PAGE->set_url($CFG->wwwroot.'/local/powerschool/rentrernote.php');
$PAGE->set_context(\context_system::instance());
// $PAGE->set_title('Entrer les '.$_GET['libelcou'].'');
$PAGE->set_heading('Votre Programme');

// $PAGE->navbar->add('Administration du Site',  $CFG->wwwroot.'/local/powerschool/index.php'));
// $PAGE->navbar->add(get_string('inscription', 'local_powerschool'), $managementurl);
// $PAGE->requires->js_call_amd('local_powerschool/confirmsupp');
// $PAGE->requires->js_call_amd('local_powerschool/confirmsupp');

// $mform=new note();


$sqllu = "SELECT fullname,DATE_FORMAT(FROM_UNIXTIME(p.datecours),'%D %b %Y') as datec,heuredebutcours,heurefincours,numerosalle 
FROM {course} c, {semestre} s,{specialite} sp,{cycle} cy,{salle} sa, {programme} p,{inscription} i,{user} u
WHERE p.idcourses = c.id AND p.idsemestre =s.id AND p.idspecialite = sp.id AND i.idetudiant='".$_GET['idenf']."' AND i.idetudiant=u.id
AND p.idcycle = cy.id AND i.idcycle=cy.id AND i.idspecialite=sp.id AND idsemestre='".$_GET["idsem"]."' AND u.idparent='".$USER->id."'
AND sa.id=p.idsalle AND DAYOFWEEK(FROM_UNIXTIME(p.datecours))=2";

$lundi=$DB->get_records_sql($sqllu);
$sqlma = "SELECT fullname,DATE_FORMAT(FROM_UNIXTIME(p.datecours),'%D %b %Y') as datec,heuredebutcours,heurefincours,numerosalle 
FROM {course} c, {semestre} s,{specialite} sp,{cycle} cy,{salle} sa, {programme} p,{inscription} i,{user} u
WHERE p.idcourses = c.id AND p.idsemestre =s.id AND p.idspecialite = sp.id AND i.idetudiant='".$_GET['idenf']."' AND i.idetudiant=u.id
AND p.idcycle = cy.id AND i.idcycle=cy.id AND i.idspecialite=sp.id AND idsemestre='".$_GET["idsem"]."' AND u.idparent='".$USER->id."'
AND sa.id=p.idsalle AND DAYOFWEEK(FROM_UNIXTIME(p.datecours))=3";

$mardi=$DB->get_records_sql($sqlma);
$sqlme = "SELECT fullname,DATE_FORMAT(FROM_UNIXTIME(p.datecours),'%D %b %Y') as datec,heuredebutcours,heurefincours,numerosalle 
FROM {course} c, {semestre} s,{specialite} sp,{cycle} cy,{salle} sa, {programme} p,{inscription} i,{user} u
WHERE p.idcourses = c.id AND p.idsemestre =s.id AND p.idspecialite = sp.id AND i.idetudiant='".$_GET['idenf']."'
AND p.idcycle = cy.id AND i.idcycle=cy.id AND i.idspecialite=sp.id AND idsemestre='".$_GET["idsem"]."' AND u.idparent='".$USER->id."'
AND sa.id=p.idsalle AND DAYOFWEEK(FROM_UNIXTIME(p.datecours))=4";

$mercredi=$DB->get_records_sql($sqlme);
$sqljeu = "SELECT fullname,DATE_FORMAT(FROM_UNIXTIME(p.datecours),'%D %b %Y') as datec,heuredebutcours,heurefincours,numerosalle 
FROM {course} c, {semestre} s,{specialite} sp,{cycle} cy,{salle} sa, {programme} p,{inscription} i,{user} u
WHERE p.idcourses = c.id AND p.idsemestre =s.id AND p.idspecialite = sp.id AND i.idetudiant='".$_GET['idenf']."'
AND p.idcycle = cy.id AND i.idcycle=cy.id AND i.idspecialite=sp.id AND idsemestre='".$_GET["idsem"]."' AND u.idparent='".$USER->id."'
AND sa.id=p.idsalle AND DAYOFWEEK(FROM_UNIXTIME(p.datecours))=5";

$jeudi=$DB->get_records_sql($sqljeu);
$sqlven = "SELECT fullname,DATE_FORMAT(FROM_UNIXTIME(p.datecours),'%D %b %Y') as datec,heuredebutcours,heurefincours,numerosalle 
FROM {course} c, {semestre} s,{specialite} sp,{cycle} cy,{salle} sa, {programme} p,{inscription} i,{user} u
WHERE p.idcourses = c.id AND p.idsemestre =s.id AND p.idspecialite = sp.id AND i.idetudiant='".$_GET['idenf']."'
AND p.idcycle = cy.id AND i.idcycle=cy.id AND i.idspecialite=sp.id AND idsemestre='".$_GET["idsem"]."' AND u.idparent='".$USER->id."'
AND sa.id=p.idsalle AND DAYOFWEEK(FROM_UNIXTIME(p.datecours))=6";

$vendredi=$DB->get_records_sql($sqlven);
$sqlsad = "SELECT fullname,DATE_FORMAT(FROM_UNIXTIME(p.datecours),'%D %b %Y') as datec,heuredebutcours,heurefincours,numerosalle 
FROM {course} c, {semestre} s,{specialite} sp,{cycle} cy,{salle} sa, {programme} p,{inscription} i,{user} u
WHERE p.idcourses = c.id AND p.idsemestre =s.id AND p.idspecialite = sp.id AND i.idetudiant='".$_GET['idenf']."'
AND p.idcycle = cy.id AND i.idcycle=cy.id AND i.idspecialite=sp.id AND idsemestre='".$_GET["idsem"]."' AND u.idparent='".$USER->id."'
AND sa.id=p.idsalle AND DAYOFWEEK(FROM_UNIXTIME(p.datecours))=7";

$samedi=$DB->get_records_sql($sqlsad);
// var_dump($samedi);die;

$progr='
<div class="table card mt-2 mb-2">
<table class="table">
<tr>
<th>Lundi</th>
<th>Mardi</th>
<th>Mercredi</th>
<th>Jeudi</th>
<th>Vendredi</th>
<th>Samedi</th>
</tr>
<tr>
<td >';
foreach($lundi as $key => $valuel)
{
   $progr.='<div class="my-3 col-12 border-top" style="width:100%;"> <div  style="font-weight:650">Cours :</div> <em class="badge badge-info mx-4" style="font-size:14px ">'.$valuel->fullname.'</em> 
   <br> <div style="font-weight:650">Heure:</div> <em class="badge badge-warning mx-4" style="font-size:14px">'.$valuel->heuredebutcours.'h-'.$valuel->heurefincours.'h </em><br> <div style="font-weight:650"> Salle:</div> <em class="badge badge-info mx-4" style="font-size:14px">'.$valuel->numerosalle.'</em></div>';
}
$progr.='</td>';
$progr.='<td>';
 foreach($mardi as $key => $valuel)
{
  $progr.='<div class="my-3 col-12 border-top" style="width:100%;"> <div style="font-weight:650">Cours :</div> <em class="badge badge-info mx-4" style="font-size:14px">'.$valuel->fullname.'</em> 
  <br> <div style="font-weight:650">Heure:</div> <em class="badge badge-warning mx-4" style="font-size:14px">'.$valuel->heuredebutcours.'h-'.$valuel->heurefincours.'h </em><br> <div style="font-weight:650"> Salle:</div> <em class="badge badge-info mx-4" style="font-size:14px">'.$valuel->numerosalle.'</em></div>';
}
$progr.='</td>';
       
$progr.='<td>';
 foreach($mercredi as $key => $valuel)
{
  $progr.='<div class="my-3 col-12 border-top" style="width:100%;"> <div style="font-weight:650">Cours :</div> <em class="badge badge-info mx-4" style="font-size:14px">'.$valuel->fullname.'</em> 
  <br> <div style="font-weight:650">Heure:</div> <em class="badge badge-warning mx-4" style="font-size:14px">'.$valuel->heuredebutcours.'h-'.$valuel->heurefincours.'h </em><br> <div style="font-weight:650"> Salle:</div> <em class="badge badge-info mx-4" style="font-size:14px">'.$valuel->numerosalle.'</em></div>';
}
$progr.='</td>';
       
$progr.='<td>';
 foreach($jeudi as $key => $valuel)
{
  $progr.='<div class="my-3 col-12 border-top" style="width:100%;"> <div style="font-weight:650">Cours :</div> <em class="badge badge-info mx-4" style="font-size:14px">'.$valuel->fullname.'</em> 
   <br> <div style="font-weight:650">Heure:</div> <em class="badge badge-warning mx-4" style="font-size:14px">'.$valuel->heuredebutcours.'h-'.$valuel->heurefincours.'h </em><br> <div style="font-weight:650"> Salle:</div> <em class="badge badge-info mx-4" style="font-size:14px">'.$valuel->numerosalle.'</em></div>';
}
$progr.='</td>';
       
$progr.='<td>';
 foreach($vendredi as $key => $valuel)
{
  $progr.='<div class="my-3 col-12 border-top" style="width:100%;"> <div style="font-weight:650">Cours :</div> <em class="badge badge-info mx-4" style="font-size:14px">'.$valuel->fullname.'</em> 
  <br> <div style="font-weight:650">Heure:</div> <em class="badge badge-warning mx-4" style="font-size:14px">'.$valuel->heuredebutcours.'h-'.$valuel->heurefincours.'h </em><br> <div style="font-weight:650"> Salle:</div> <em class="badge badge-info mx-4" style="font-size:14px">'.$valuel->numerosalle.'</em></div>';
}
$progr.='</td>';
       
$progr.='<td>';
 foreach($samedi as $key => $valuel)
{
  $progr.='<div class="my-3 col-12 border-top" style="width:100%;"> <div style="font-weight:650">Cours :</div> <em class="badge badge-info mx-4" style="font-size:14px">'.$valuel->fullname.'</em> 
  <br> <div style="font-weight:650">Heure:</div> <em class="badge badge-warning mx-4" style="font-size:14px">'.$valuel->heuredebutcours.'h-'.$valuel->heurefincours.'h </em><br> <div style="font-weight:650"> Salle:</div> <em class="badge badge-info mx-4" style="font-size:14px">'.$valuel->numerosalle.'</em></div>';
}
$progr.='</td>';
       
      $progr.='</tr>
   </table>
</div>';
$menu = (object)[
   'programme' => new moodle_url('/local/powerschool/programmepersoparent.php'),
   'paiement' => new moodle_url('/local/powerschool/paiementpersoparent.php'),
   'note' => new moodle_url('/local/powerschool/bulletinnotepersoparent.php'),
   'absence' => new moodle_url('/local/powerschool/listeetuabsenetuparent.php'),
];
$semestre=$DB->get_records("semestre");
$enfant=$DB->get_records("user",array("idparent"=>$USER->id));
// var_dump($semestre);
// die;
$templatecontext=[
    "programme"=>$progr,
    "semestre"=>array_values($semestre),
    'enfant'=>array_values($enfant),
    'enfantabse'=> new moodle_url('/local/powerschool/programmepersoparent.php'),
    "courssemestre"=>$CFG->wwwroot.'/local/powerschool/programmepersoparent.php',
    "idsem"=>$_GET['idsem'],
];
echo $OUTPUT->header();


echo $OUTPUT->render_from_template('local_powerschool/navbargerer', $menu);
// $mform->display();


// echo $OUTPUT->render_from_template('local_powerschool/navbar', $menu);
// $mform->display();


echo $OUTPUT->render_from_template('local_powerschool/programmepersoparent', $templatecontext);


echo $OUTPUT->footer();

?>