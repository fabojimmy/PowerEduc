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
use local_powerschool\periode;

require_once(__DIR__ . '/../../config.php');
// require_once($CFG->dirroot.'/local/powerschool/classes/periode.php');

global $DB;
global $USER;

require_login();
$context = context_system::instance();
// require_capability('local/powerschool:managepages', $context);

// $PAGE->set_url(new moodle_url('/local/powerschool/periode.php'));
$PAGE->set_context(\context_system::instance());
$PAGE->set_title('Enregistrer un periode');
$PAGE->set_heading('Listes des differents apprenants et leur Moyennes');

// $PAGE->navbar->add('Administration du Site',  new moodle_url('/local/powerschool/index.php'));
// $PAGE->navbar->add(get_string('periode', 'local_powerschool'), $managementurl);
// $PAGE->requires->js_call_amd('local_powerschool/confirmsupp');
// $PAGE->requires->js_call_amd('local_powerschool/confirmsupp');

// $mform=new periode();
$sql1="SELECT firstname,lastname,libellespecialite,libellecycle,idetudiant FROM {inscription} i,{user} u,{specialite} sp,{cycle} cy WHERE i.idetudiant=u.id
       AND i.idspecialite='".$_GET["idsp"]."' AND i.idcycle='".$_GET["idcy"]."' AND sp.id=idspecialite
       AND cy.id=idcycle";
$inscription=$DB->get_records_sql($sql1);
// var_dump($inscription);
// die;
foreach($inscription as $key => $vvallno)
{
    $rolecam=$DB->get_records_sql("SELECT * FROM {campus} c,{typecampus} ty WHERE c.idtypecampus=ty.id AND c.id='".$_GET["idca"]."'");
    foreach($rolecam as $key => $rolev)
    {}
    if($rolev->libelletype=="universite" || $rolev->libelletype=="college" || $rolev->libelletype=="lycee")
    {
    $sql="SELECT
        ln.idetudiant,
        csms.idsemestre,
        u.firstname,
        u.lastname,
        libellespecialite,
        libellecycle,
        SUM(ln.note3 * cs.credit) / SUM(cs.credit) as moyenne_semestre
    FROM
        {coursspecialite} cs
    INNER JOIN
        {courssemestre} csms ON cs.id = csms.idcoursspecialite
    INNER JOIN
        {affecterprof} ap ON csms.id = ap.idcourssemestre
    INNER JOIN
        {listenote} ln ON ap.id = ln.idaffecterprof
    INNER JOIN 
        {specialite} sp ON cs.idspecialite=sp.id
    INNER JOIN 
        {cycle} cy ON cs.idcycle=cy.id
    INNER JOIN 
        {user} u ON u.id=ln.idetudiant
    WHERE
        csms.idsemestre='".$_GET["idsem"]."'
    AND 
        cs.idanneescolaire='".$_GET["idan"]."'
    AND 
        ln.idetudiant='".$vvallno->idetudiant."'
    ";
    }
    else{
        $sql="SELECT
        ln.idetudiant,
        csms.idsemestre,
        u.firstname,
        u.lastname,
        libellespecialite,
        libellecycle,
        SUM(ln.note3) as moyenne_semestre
    FROM
        {coursspecialite} cs
    INNER JOIN
        {courssemestre} csms ON cs.id = csms.idcoursspecialite
    INNER JOIN
        {affecterprof} ap ON csms.id = ap.idcourssemestre
    INNER JOIN
        {listenote} ln ON ap.id = ln.idaffecterprof
    INNER JOIN 
        {specialite} sp ON cs.idspecialite=sp.id
    INNER JOIN 
        {cycle} cy ON cs.idcycle=cy.id
    INNER JOIN 
        {user} u ON u.id=ln.idetudiant
    WHERE
        csms.idsemestre='".$_GET["idsem"]."'
    AND 
        cs.idanneescolaire='".$_GET["idan"]."'
    AND 
        ln.idetudiant='".$vvallno->idetudiant."'
    ";
    }
    $moyen=$DB->get_records_sql($sql);
    // var_dump($moyen);
    foreach($moyen as $key =>$vvvv)
    {}
   
    if($rolev->libelletype=="universite")
    {
        $pourcent=$DB->get_records("configurationnote",array("idcampus"=>$_GET["idca"]));

        foreach($pourcent as $key =>$pou)
        {}
        $vvallno->moyenne_semestre=$vvvv->moyenne_semestre*$pou->normal/100;
    }
    // var_dump($moyen);
}

// die;
$templatecontext = (object)[
    'etudiant' => array_values($inscription),
    'reglagesedit' => new moodle_url('/local/powerschool/reglagesedit.php'),
    'reglagessupp'=> new moodle_url('/local/powerschool/reglages.php'),
    'filiere' => new moodle_url('/local/powerschool/filiere.php'),
];
echo $OUTPUT->header();


// echo $OUTPUT->render_from_template('local_powerschool/navbar', $menu);
// $mform->display();


echo $OUTPUT->render_from_template('local_powerschool/listeetudmoyem', $templatecontext);


echo $OUTPUT->footer();