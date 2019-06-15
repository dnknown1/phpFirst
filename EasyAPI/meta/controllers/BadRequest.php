<?php
/**
 * Custom ERROR page
 */
class BadRequest extends BaseController{
    function __construct(){ parent::__construct();
    }
    public function _default(){
        $this->load->view('.','badrequest');
    }
}
?>
