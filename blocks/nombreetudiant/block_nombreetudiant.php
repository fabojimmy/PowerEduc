<?php
require_once(__DIR__ . '/../../config.php');
require_once(__DIR__ . '/../../local/powerschool/lib.php');
  class block_nombreetudiant extends block_base{
    function init(){
        global $CFG;
        $this->title=get_string('titrenom','block_nombreetudiant');
        $this->get_context();
    }
    public function has_config(){
        return true;
    }
    public function get_context(){
        if($this->content !==null){
            return $this->content;
        }
        global $DB,$CFG,$iddetablisse;
         
        // var_dump($iddetablisse);
        // die;
      if($iddetablisse!=0)
        {
               $uuser=$DB->get_records_sql("SELECT count(id) as etucoun FROM {inscription} WHERE idcampus=$iddetablisse");
                $this->content=new stdClass;
                $this->content->text="";
                $this->content->text = '<link rel="stylesheet" type="text/css" href="'. $CFG->wwwroot . '/blocks/nombreetudiant/style.css">';
                foreach($uuser as $key => $val)
                {

                    $this->content->text.='<p class="clas">'.$val->etucoun.'</p>';
                    // $this->content->footer="<a href=''>$val->firstname</a>";
            }
        }
        return $this->content; 
        // $this->content->footer="Your footer is displayed here";
    }
    public function instance_allow_config()
    {
        return true;
    }
    
        //     <?php
        // class block_customblock extends block_base {
        //     public function init() {
        //         $this->title = get_string('customblocktitle', 'block_customblock');
        //     }

        //     public function get_content() {
        //         if ($this->content !== null) {
        //             return $this->content;
        //         }

        //         $this->content         = new stdClass;
        //         $this->content->text   = 'Contenu du bloc personnalisé';
        //         $this->content->footer = 'Pied de page du bloc';

        //         return $this->content;
        //     }

    // Cette fonction permet d'afficher le bloc partout
    public function applicable_formats() {
        return array(
            'all' => true,
        );
    }


  }
?>