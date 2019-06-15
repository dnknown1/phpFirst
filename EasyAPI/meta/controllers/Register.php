<?php
/**
 * Registration controller class
 */
class Register extends BaseController{

    function __construct(){
        parent::__construct();
    }

    public function _default(){
        $this->load->view('.','register');
    }

    public function landing(){
        if(!empty($_REQUEST)){
            $content = [
                'full_name' => $_REQUEST['fn'].' '.$_REQUEST['ln'],
                'u_name' => $_REQUEST['un'],
                'pwd' => $_REQUEST['pwd'],
                'bal' => $_REQUEST['bal'],
            ];
            $data = get_json(url_for.'api/users/createuser', 'POST', $content);
            if ($data['flag']) {
                $data = get_json(url_for.'api/users/user/'.$data['data']['u_id'], 'GET');
                $data['flag'] = true;
                $this->load->view('.','register',$data);
            } else {
                $data['flag'] = false;
                $this->load->view('.','register',$data);
            }

        } else{
            notFound();
        }

    }

}
