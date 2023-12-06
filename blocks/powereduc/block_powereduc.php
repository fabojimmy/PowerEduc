<?php
  class block_powereduc extends block_base{
    function init(){
        global $CFG;
        $this->title=get_string('powereduc','block_powereduc');
        $this->get_context();
    }
    function has_config(){
        return true;
    }
    public function get_context(){
        if($this->content !==null){
            return $this->content;
        }
        $this->content=new stdClass;
        $this->content->text ="<a href=''> gghddhjshhkjshdkjhdkshsjkhkhshkhsghjklmùmlkj </a>";
        $this->content->footer="Your footer is displayed here";
        return $this->content; 
    }

    public function instance_allow_multiple()
    {
        return true;
    }
    public function instance_allow_config()
    {
        return true;
    }
  }
?>