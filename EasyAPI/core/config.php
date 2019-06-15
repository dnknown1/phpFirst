<?php

// Database configuration class
class db_config {
    private $host = 'localhost';
    private $db_name = 'easyapi';
    private $username = 'dnknown1';
    private $password = 'pureveg';
    private $conn = null;
    public function __construct(){
        try {
            $this->conn = new PDO(
                'mysql:host=' . $this->host .
                ';dbname=' . $this->db_name,
                $this->username,
                $this->password
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo 'Connection Error: ' . $e->getMessage();
        }
    }
    public function connect() {
      return $this->conn;
    }
}
//-----------------------------------------------

// Loader configuration class
class Load {
    public function __construct(){}

    public function view($root,$file,$data = NULL){
        invoke("views",$root,$file,$data);
    }
    public function model($root,$model){
        invoke("models",$root,$model);
        return new $model();
    }
}
//----------------------------------------------

// Starts the application in development mode
developer_mode(true);
//-----------------------------------------------

// Static Root
define('statics', '/statics/');
define('templates', 'templates/');
define('url_for','http://'.$_SERVER['SERVER_NAME'].'/');
//-----------------------------------------------

// Specify apps installed
$INSTALED_APPS = array('api',);
//-----------------------------------------------
