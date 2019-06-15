<?php

class Users extends BaseController{
    private $model;

   public function __construct(){
       parent::__construct();
       $this->model = $this->load->model('api','UserModel');
   }

   public function _default(){
       notFound();
   }

   public function allusers(){
       if (validate('GET')) {
           $data = $this->model->allusers();
           $this->load->view('api',"users",$data);
       }
   }

   public function user($id){
       if (validate('GET')) {
           $data = $this->model->user($id);
           $this->load->view('api',"users",$data);
       }
   }

   public function exists(){
       if (validate('POST')) {
           $file = json_decode(file_get_contents("php://input"));
           $data = $this->model->exists($file);
           $this->load->view('api',"userupdate",$data);
       }
   }

   public function createuser(){
       if (validate('POST')) {
           $file = json_decode(file_get_contents("php://input"));
           $data = $this->model->createuser($file);
           $this->load->view('api',"userupdate",$data);
       }
   }

   public function update(){
       if (validate('PUT')) {
           $file = json_decode(file_get_contents("php://input"));
           $data = $this->model->update($file);
           $this->load->view('api',"userupdate",$data);
       }
   }

   public function delete($id){
       if (validate('GET')) {
           $data = $this->model->delete($id);
           $this->load->view('api',"userupdate",$data);
       }
   }
}
