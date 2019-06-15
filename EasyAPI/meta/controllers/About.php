<?php
/**
 *
 */
class About extends BaseController{

    function __construct()
    {
        parent::__construct();
    }
    public function _default(){
        $this->load->view('.','about');
    }
}
?>
