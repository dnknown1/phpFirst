<?php
/**
 * Base Model class
 */
class BaseModel {
    private $db ;
    function __construct()
    {
        $this->db = new db_config();
    }

    protected function read($sql) {
        $conn = $this->db->connect();
        try{
            $query = $conn->query($sql);
            return array(
                'flag' => true,
                'data' => $query->fetchAll()
            );
        } catch(Exception $e){
            return array(
                'flag' => false,
                'error' => $e->getMessage());
        }
    }
    protected function write($sql){
        $conn = $this->db->connect();
        try{
            $query = $conn->query($sql);
            return array(
                'flag' => true,
                'u_id');
        } catch(Exception $e){
            return array(
                'flag' => false,
                'error' => $e->getMessage());
        }
    }
}
