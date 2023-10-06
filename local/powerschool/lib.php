<?php

//     /**
//  * Database connection. Used for all access to the database.
//  * @global int $etablisse
//  * @name $etablisse
//  */
//  global $iddetablisse;
//  /**
//   * Database connection. Used for all access to the database.
//   * @global int $annee
//   * @name $annee
//   */
//   global $gloannee;
//     require_once(__DIR__.'/../../config.php');
//     //l'appel de l'etablissement selectionné
//     global $DB;
//     // die;
//     $verrrif=false;
// //  if($iddetablisse!=0)
// //  {

//      $etablissement=$DB->get_records("campus",array("activerca"=>1));
//      foreach($etablissement as $key => $valet)
//      {
 
//      }
//      $iddetablisse=$valet->id;
//  }
    // die;
    // var_dump($scolaire);die;
    // $gloannee=$valean->id;
function  local_powerschool_extend_navigation (global_navigation $navigation  ){
      
    global $USER,$SESSION,$CFG,$DB;

    $nodefoo=$navigation->add("PowerEduc",null,
    null, null, 'home', null, '');
    // $nodefo=$nodefoo->add('Campus');
    // foreach($tarcampus as $key=> $pro){
       
    //           $nodebar=$nodefo->add($key, new moodle_url($pro),null,null,'Professeur',new pix_icon('i/course', ''));
    //        $nodebar->forceopen=true;
        
      
    // }
    $role=$DB->get_records("role_assignments",array("userid"=>$USER->id,"roleid"=>3));
    if($role&& isloggedin())
    {

         $nodefoo->add("Notes", new \moodle_url('/local/powerschool/note.php'),null,null,'Professeur',null);
         $nodefoo->add("Gérer les absences", new \moodle_url('/local/powerschool/absenceetu.php'),null,null,'Professeur',null);
         $nodefoo->add("Liste des apprenants absences", new \moodle_url('/local/powerschool/listeetuabsenprof.php'),null,null,'Professeur',null);
       }
   
   if(is_siteadmin())
   {

       $nodefoo->add("Liste des absences", new \moodle_url('/local/powerschool/listeetuabsenadmin.php'),null,null,'Professeur',null);
   }
 $role=$DB->get_records("role_assignments",array("userid"=>$USER->id,"roleid"=>5));
           if($role)
           {

               $nodefoo->add("Profit Apprenant", new \moodle_url('/local/powerschool/gerer.php'),null,null,'Professeur',null);
           }

}
?>