<?php
require_once(__DIR__ . '/../../config.php');
  class block_produit extends block_base{
    function init(){
        global $CFG;
        $this->title="product";
        $this->get_context();
    }
    public function has_config(){
        return true;
    }
    public function get_context(){
        if($this->content !==null){
            return $this->content;
        }
        global $DB;

        $uuser=$DB->get_records("user");
        $this->content=new stdClass;
        $this->content->text="";
        foreach($uuser as $key => $val)
        {

            $this->content->text.="<a href=''>$val->firstname</a><br>";
            // $this->content->footer="<a href=''>$val->firstname</a>";
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