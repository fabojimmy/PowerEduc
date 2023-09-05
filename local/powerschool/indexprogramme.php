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
use local_powerschool\Date\Month;
use local_powerschool\indexprogramme;
use local_powerschool\programme;

require_once(__DIR__ . '/../../config.php');
require_once($CFG->dirroot.'/local/powerschool/classes/indexprogramme.php');
require_once($CFG->dirroot.'/local/powerschool/classes/date.php');

global $DB;
global $USER;

require_login();
$context = context_system::instance();
// require_capability('local/message:managemessages', $context);

$PAGE->set_url(new powereduc_url('/local/powerschool/indexprogramme.php'));
$PAGE->set_context(\context_system::instance());
$PAGE->set_title('indexprogramme de Cours');
$PAGE->set_heading('indexprogramme de Cours');

$PAGE->navbar->add(get_string('programme', 'local_powerschool'),  new powereduc_url('/local/powerschool/programme.php'));
$PAGE->navbar->add(get_string('indexprogramme', 'local_powerschool'), $managementurl);
// $PAGE->requires->js_call_amd('local_powerschool/confirmsupp');
// $PAGE->requires->js_call_amd('local_powerschool/confirmsupp');

$mform=new indexprogramme();
// die;




if ($mform->is_cancelled()) {

    redirect($CFG->wwwroot . '/local/powerschool/index.php', 'annuler');

} else if ($_SERVER['REQUEST_METHOD'] === 'POST'&&!empty($_POST["idsemestre"])) {


$recordtoinsert = new stdClass();

$recordtoinsert = $fromform;

$datesea=$_POST["datecours"];
$datecours= strtotime($datesea["day"]."-".$datesea["month"]."-".$datesea["year"]);

    $date =$datecours;

    $annee = date('Y',$date);
    $mois = date('m',$date);

    // var_dump($annee,$mois);die;
    $semestre = $_POST["idsemestre"];
    $campus = $_POST["idcampus"];

    $specialite = $_POST["idspecialite"];
    $cycle = $_POST["idcycle"];
    $salle = $_POST["idsalle"];
    

    redirect($CFG->wwwroot . "/local/powerschool/indexprogramme.php?mois=$mois&annee=$annee&semestre=$semestre&idca=$campus&idsp=$specialite&idcy=$cycle&idsa=$salle", 'valider');
  
}else{
    // var_dump("kl");die;
}


// $sql = "SELECT * FROM {course} c, {semestre} s,{specialite} sp,{cycle} cy, {indexprogramme} p WHERE p.idcourses = c.id AND p.idsemestre =s.id AND p.idspecialite = sp.id
//         AND p.idcycle = cy.id  ";

//     $indexprogrammes = $DB->get_records_sql($sql);

//     foreach($indexprogrammes as $key){
        
//         $time = $key->datecours;

//         $date = date('d-M-Y',$time);
//         $timed = date('H:m',$time);
//         $timef = date('H:m',$time);

//         $key->datecours = $date;
//         $key->heuredebutcours = $timed;
//         $key->heurefincours = $timef;

//     }
    // var_dump($indexprogrammes);
    // die;
// $indexprogramme = $DB->get_records('indexprogramme', null, 'id');

// $templatecontext = (object)[
//     'indexprogramme' => array_values($indexprogrammes),
//     'indexprogrammeedit' => new powereduc_url('/local/powerschool/indexprogrammeedit.php'),
//     'indexprogrammesupp'=> new powereduc_url('/local/powerschool/indexprogramme.php'),
//     'affecter' => new powereduc_url('/local/powerschool/affecter.php'),
// ];

$menu = (object)[
    'annee' => new powereduc_url('/local/powerschool/anneescolaire.php'),
    'campus' => new powereduc_url('/local/powerschool/campus.php'),
    'semestre' => new powereduc_url('/local/powerschool/semestre.php'),
    'salle' => new powereduc_url('/local/powerschool/salle.php'),
    'filiere' => new powereduc_url('/local/powerschool/filiere.php'),
    'cycle' => new powereduc_url('/local/powerschool/cycle.php'),
    'modepayement' => new powereduc_url('/local/powerschool/modepayement.php'),
    'matiere' => new powereduc_url('/local/powerschool/matiere.php'),
    'seance' => new powereduc_url('/local/powerschool/seance.php'),
    'inscription' => new powereduc_url('/local/powerschool/inscription.php'),
    'enseigner' => new powereduc_url('/local/powerschool/enseigner.php'),
    'paiement' => new powereduc_url('/local/powerschool/paiement.php'),
    'indexprogramme' => new powereduc_url('/local/powerschool/indexprogramme.php'),
    'programme' => new powereduc_url('/local/powerschool/programme.php'),
];

$sqllu = "SELECT fullname,DATE_FORMAT(FROM_UNIXTIME(p.datecours),'%D %b %Y') as datec,heuredebutcours,heurefincours FROM {course} c, {semestre} s,{specialite} sp,{cycle} cy,{salle} sa, {programme} p
WHERE p.idcourses = c.id AND p.idsemestre =s.id AND p.idspecialite = sp.id
AND p.idcycle = cy.id AND idcycle='".$_GET["idcy"]."' AND idspecialite='".$_GET["idsp"]."' AND sa.idcampus='".$_GET["idca"]."'AND idsemestre='".$_GET["semestre"]."'
AND sa.id=p.idsalle AND p.idsalle='".$_GET["idsa"]."' AND DAYOFWEEK(FROM_UNIXTIME(p.datecours))=2";

$lundi=$DB->get_records_sql($sqllu);
$sqlma = "SELECT fullname,DATE_FORMAT(FROM_UNIXTIME(p.datecours),'%D %b %Y') as datec,heuredebutcours,heurefincours FROM {course} c, {semestre} s,{specialite} sp,{cycle} cy,{salle} sa, {programme} p
WHERE p.idcourses = c.id AND p.idsemestre =s.id AND p.idspecialite = sp.id
AND p.idcycle = cy.id AND idcycle='".$_GET["idcy"]."' AND idspecialite='".$_GET["idsp"]."' AND sa.idcampus='".$_GET["idca"]."'AND idsemestre='".$_GET["semestre"]."'
AND sa.id=p.idsalle AND p.idsalle='".$_GET["idsa"]."' AND DAYOFWEEK(FROM_UNIXTIME(p.datecours))=3";

$mardi=$DB->get_records_sql($sqlma);
$sqlme = "SELECT fullname,DATE_FORMAT(FROM_UNIXTIME(p.datecours),'%D %b %Y') as datec,heuredebutcours,heurefincours FROM {course} c, {semestre} s,{specialite} sp,{cycle} cy,{salle} sa, {programme} p
WHERE p.idcourses = c.id AND p.idsemestre =s.id AND p.idspecialite = sp.id
AND p.idcycle = cy.id AND idcycle='".$_GET["idcy"]."' AND idspecialite='".$_GET["idsp"]."' AND sa.idcampus='".$_GET["idca"]."'AND idsemestre='".$_GET["semestre"]."'
AND sa.id=p.idsalle AND p.idsalle='".$_GET["idsa"]."' AND DAYOFWEEK(FROM_UNIXTIME(p.datecours))=4";

$mercredi=$DB->get_records_sql($sqlme);
$sqljeu = "SELECT fullname,DATE_FORMAT(FROM_UNIXTIME(p.datecours),'%D %b %Y') as datec,heuredebutcours,heurefincours FROM {course} c, {semestre} s,{specialite} sp,{cycle} cy,{salle} sa, {programme} p
WHERE p.idcourses = c.id AND p.idsemestre =s.id AND p.idspecialite = sp.id
AND p.idcycle = cy.id AND idcycle='".$_GET["idcy"]."' AND idspecialite='".$_GET["idsp"]."' AND sa.idcampus='".$_GET["idca"]."'AND idsemestre='".$_GET["semestre"]."'
AND sa.id=p.idsalle AND p.idsalle='".$_GET["idsa"]."' AND DAYOFWEEK(FROM_UNIXTIME(p.datecours))=5";

$jeudi=$DB->get_records_sql($sqljeu);
$sqlven = "SELECT fullname,DATE_FORMAT(FROM_UNIXTIME(p.datecours),'%D %b %Y') as datec,heuredebutcours,heurefincours FROM {course} c, {semestre} s,{specialite} sp,{cycle} cy,{salle} sa, {programme} p
WHERE p.idcourses = c.id AND p.idsemestre =s.id AND p.idspecialite = sp.id
AND p.idcycle = cy.id AND idcycle='".$_GET["idcy"]."' AND idspecialite='".$_GET["idsp"]."' AND sa.idcampus='".$_GET["idca"]."'AND idsemestre='".$_GET["semestre"]."'
AND sa.id=p.idsalle AND p.idsalle='".$_GET["idsa"]."' AND DAYOFWEEK(FROM_UNIXTIME(p.datecours))=6";

$vendredi=$DB->get_records_sql($sqlven);
$sqlsad = "SELECT fullname,DATE_FORMAT(FROM_UNIXTIME(p.datecours),'%D %b %Y') as datec,heuredebutcours,heurefincours FROM {course} c, {semestre} s,{specialite} sp,{cycle} cy,{salle} sa, {programme} p
WHERE p.idcourses = c.id AND p.idsemestre =s.id AND p.idspecialite = sp.id
AND p.idcycle = cy.id AND idcycle='".$_GET["idcy"]."' AND idspecialite='".$_GET["idsp"]."' AND sa.idcampus='".$_GET["idca"]."'AND idsemestre='".$_GET["semestre"]."'
AND sa.id=p.idsalle AND p.idsalle='".$_GET["idsa"]."' AND DAYOFWEEK(FROM_UNIXTIME(p.datecours))=7";

$samedi=$DB->get_records_sql($sqlsad);
// var_dump($oo);
// die;
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
    $progr.='<div style="border-top:1px solid black;margin-top:20px;">'.$valuel->fullname.'  '.$valuel->heuredebutcours.'h-'.$valuel->heurefincours.'h</div>';
 }
 $progr.='</td>';
 $progr.='<td>';
  foreach($mardi as $key => $valuel)
 {
    $progr.='<div style="border-top:1px solid black;margin-top:20px;">'.$valuel->fullname.'  '.$valuel->heuredebutcours.'h-'.$valuel->heurefincours.'h</div>';
 }
 $progr.='</td>';
        
 $progr.='<td>';
  foreach($mercredi as $key => $valuel)
 {
    $progr.='<div style="border-top:1px solid black;margin-top:20px;">'.$valuel->fullname.'  '.$valuel->heuredebutcours.'h-'.$valuel->heurefincours.'h</div>';
 }
 $progr.='</td>';
        
 $progr.='<td>';
  foreach($jeudi as $key => $valuel)
 {
    $progr.='<div style="border-top:1px solid black;margin-top:20px;">'.$valuel->fullname.'  '.$valuel->heuredebutcours.'h-'.$valuel->heurefincours.'h</div>';
 }
 $progr.='</td>';
        
 $progr.='<td>';
  foreach($vendredi as $key => $valuel)
 {
    $progr.='<div style="border-top:1px solid black;margin-top:20px;">'.$valuel->fullname.'  '.$valuel->heuredebutcours.'h-'.$valuel->heurefincours.'h</div>';
 }
 $progr.='</td>';
        
 $progr.='<td>';
  foreach($samedi as $key => $valuel)
 {
    $progr.='<div style="border-top:1px solid black;margin-top:20px;">'.$valuel->fullname.'  '.$valuel->heuredebutcours.'h-'.$valuel->heurefincours.'h</div>';
 }
 $progr.='</td>';
        
       $progr.='</tr>
   </table>
</div>';
   $templatecontext=[
        'program'=>$progr
   ];
echo $OUTPUT->header();



$mois = $_GET['mois'] ;
$annee = $_GET['annee'];
$semestre = $_GET['semestre'];
$month = new Month($mois??null,$annee??null,$semestre??null);
$start = $month->getStartingDay();
$getWeeks = $month->getWeeks();
$getMonth = $month->toString();
$start = $start->format('N') === '1' ? $start : $month->getStartingDay()->modify('last monday');

$end = (clone $start)->modify('+'.(6 + 7 * ($getWeeks - 1)).'days');
// var_dump($month->toString());
// var_dump($semestre);
$events = $month->getEvents($start,$end,$semestre,$_GET["idca"],$_GET["idsp"],$_GET["idcy"],$_GET["idsa"]);
$eventsByDay = $month->getEventsByDay($start,$end,$semestre,$_GET["idca"],$_GET["idsp"],$_GET["idcy"],$_GET["idsa"]);



// var_dump($start);
// var_dump($end);


// die;


echo $OUTPUT->render_from_template('local_powerschool/navbar', $menu);

// echo '<i href="/powereduc03/local/powerschool/programme.php" class="fa fa-arrow-left fa-2x"style="color: #1D7DC2;"> </i> ';

// echo ' <a type="button" class="btn btn-info" href="/powereduc1/local/powerschool/programme.php"> <i class="fa fa-arrow-left "> </i> </a>';


// echo ' <a href="/powereduc03/local/powerschool/programme.php> 
//         <istyle="color: #1D7DC2;"> </i>  </a>';



$mform->display();


echo '<div class="d-flex flex-row align-items-center justify-content-between mx-sm-5">
            <h1>'.$getMonth. '</h1>
        <div>  
                <a href="/powereduc1/local/powerschool/indexprogramme.php?mois='.$month->previousmonth()->month.'&annee='.$month->previousmonth()->year.'&semestre='.$semestre.'&idca='.$_GET["idca"].'&idsp='.$_GET["idsp"].'&idcy='.$_GET["idcy"].'&idsa='.$_GET["idsa"].'" class="btn btn-primary"> &lt;</a>
                <a href="/powereduc1/local/powerschool/indexprogramme.php?mois='.$month->nextmonth()->month.'&annee='.$month->nextmonth()->year.'&semestre='.$semestre.'&idca='.$_GET["idca"].'&idsp='.$_GET["idsp"].'&idcy='.$_GET["idcy"].'&idsa='.$_GET["idsa"].'" class="btn btn-primary">&gt;</a>
        </div>
     </div>';

echo ' <div class="table card mt-2 mb-2">
<table class="calendar__table">';

for($i = 0 ; $i < $getWeeks; $i++){

    echo '<tr>';

    foreach($month->days as $k => $day)
    {
        $date = (clone $start)->modify("+".($k + $i * 7)."days");
        $eventForDay = $eventsByDay[$date->format('Y-m-d')] ?? [];

        echo '<td>';
        if($i === 0)
        {
        echo '<div> <strong>'.$day.' </strong></div>';
        }
      echo '<div> <strong>'.$date->format('d').' </strong></div>';

      foreach($eventForDay as  $event){


        $eventday = $event->fullname;
        $salle = $event->numerosalle;
        $specialitecy = $event->libellespecialite."-".$event->libellecycle;
        $heuredebut = $event->heuredebutcours;
        $heurefin = $event->heurefincours;
        echo '<div>'
        .$heuredebut.'h -'.$heurefin.'h :   '.'<a href="/powereduc1/local/powerschool/programmeedit.php?id='.$event->id.'&idca='.$_GET["idca"].'">'.$eventday.' '.$specialitecy.' '.$salle.'</a>
        </div>';
      }
       '</td>';
    }
    echo '</tr>';
}
echo ' </table>
        </div>';

// echo $progr;
echo $OUTPUT->render_from_template('local_powerschool/indexprogramme', $templatecontext);
echo $OUTPUT->footer();