<?php
// This file is part of powereduc Course Rollover Plugin
//
// powereduc is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// powereduc is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with powereduc.  If not, see <http://www.gnu.org/licenses/>.

/**
 * @package     local_powerschool
 * @author      Wilfried
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

use core\progress\display;
use local_powerschool\specialite;
use local_powerschool\tranche;

require_once(__DIR__ . '/../../config.php');
require_once(__DIR__ . '/lib.php');

global $DB;
global $USER;

require_login();
$context = context_system::instance();
// require_capability('local/powerschool:managepages', $context);

$PAGE->set_url(new moodle_url('/local/powerschool/activat.php'));
$PAGE->set_context(\context_system::instance());
$PAGE->set_title("Activation");
$PAGE->set_heading("Activer soit Année ou Etablissement");

$PAGE->navbar->add(get_string('configurationminini', 'local_powerschool'),  new moodle_url('/local/powerschool/configurationmini.php'));
$PAGE->navbar->add(get_string('activat', 'local_powerschool'), $managementurl);
// $PAGE->requires->js_call_amd('local_powerschool/confirmsupp');
// $PAGE->requires->js_call_amd('local_powerschool/confirmsupp');



// $specialite = $DB->get_records('specialite', null, 'id');

// var_dump($etablisse,$gloannee);
// die;
if ($_GET["idca"] && $_GET["libel"]="campus") {
    $idcampus=$DB->get_records("campus", array("activerca"=>1));
    if($idcampus)
    foreach ($idcampus as $key => $value) {
        // var_dump($idcampus);
        // die;
        $DB->update_record("campus", array(
            "id"=>$value->id,
            "activerca"=>0
        ));
    } 
   $iid= $DB->update_record("campus", array(
        "id"=>$_GET["idca"],
        "activerca"=>1
    ));

//     var_dump($iid);die;
//   if($iid)
  {
      redirect($CFG->wwwroot . '/local/powerschool/activat.php', 'L\'etablissement choisi');
  }
    
} 
if ($_GET["idan"] && $_GET["libel"]="anneee")
{
    // var_dump('dfghjk');
    // die;
    $idannee=$DB->get_records("anneescolaire", array("activeran"=>1));
    if($idannee)
    {
        foreach ($idannee as $key => $value) 
        {
            
            $DB->update_record("anneescolaire", array(
                "id"=>$value->id,
                "activeran"=>0
            ));
        } 
    }
    
    //   var_dump($_GET["id"]);die;
    $iid=$DB->update_record("anneescolaire", array(
        "id"=>$_GET["idan"],
        "activeran"=>1
    ));
    # code...
    if($iid)
    {

        redirect($CFG->wwwroot . '/local/powerschool/activat.php', 'L\'année scolaire choisie');
    }
}

// die;
$campus=$DB->get_records_sql("SELECT * FROM {campus}");
$annee=$DB->get_records_sql("SELECT * FROM {anneescolaire}");
foreach($annee as $key => $ab)
{
    $time = $ab->datedebut;
    $timef = $ab->datefin;

    $dated = date('Y',$time);
    $datef = date('Y',$timef);

    $ab->datedebut = $dated;
    $ab->datefin = $datef;
}
$templatecontext = (object)[
    "campus"=>array_values($campus),
    "annee"=>array_values($annee),
    'campuslien' => new moodle_url('/local/powerschool/activat.php'),
    'anneelien'=> new moodle_url('/local/powerschool/activat.php'),
    // 'cycle' => new moodle_url('/local/powerschool/cycle.php'),
];

// $menumini = (object)[
//     'affecterprof' => new moodle_url('/local/powerschool/affecterprof.php'),
//     'configurerpaie' => new moodle_url('/local/powerschool/configurerpaiement.php'),
//     'coursspecialite' => new moodle_url('/local/powerschool/coursspecialite.php'),
//     'salleele' => new moodle_url('/local/powerschool/salleele.php'),
//     'tranche' => new moodle_url('/local/powerschool/tranche.php'),
//     'confinot' => new moodle_url('/local/powerschool/configurationnote.php'),
//     'logo' => new moodle_url('/local/powerschool/logo.php'),
//     'message' => new moodle_url('/local/powerschool/message.php'),
//     'materiell' => new moodle_url('/local/powerschool/materiels.php'),



// ];




echo $OUTPUT->header();

// echo $OUTPUT->render_from_template('local_powerschool/navbar', $menu);
echo html_writer::start_tag("div",array("style"=>"margin-top:40px"));
echo html_writer::end_tag("div");
// $mform->display();


echo $OUTPUT->render_from_template('local_powerschool/activat', $templatecontext);


echo $OUTPUT->footer();