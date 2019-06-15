<?php
session_start();
/**
 * Log in Classs
 */
class Login extends BaseController{
    function __construct()
    {
        parent::__construct();
    }

    public function _default(){
        if ($_SESSION['user']) {
            header("Location:".url_for.'profile');
        } else {
            $this->load->view('.','login');
        }

    }

    public function verf() {
        if (!empty($_REQUEST)) {
            $content = [
                   'username' => $_REQUEST['un'],
                   'password' => $_REQUEST['pwd'],
                   ];
               // check if valid user or not
               $data = [];
               $res = get_json(url_for.'api/users/exists', 'POST', $content);
               if ($res['flag']) {
                   $_SESSION['user'] = $res['data']['u_id'];
                   header("Location:".url_for.'profile');
               } else {
                  $this->load->view('.','login',$res);
               }
        }else{
            echo 'inelse';
            notFound();
        }
    }
     public function out(){
         session_destroy();
         header("Location:".url_for.'home');
     }
}
