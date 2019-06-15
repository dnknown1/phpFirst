<?php
/**
 *
 */
class UserModel extends BaseModel{
    private $table = 'users';

    public function __construct(){
        parent::__construct();
    }

    public function allusers(){
        $sql = "SELECT full_name,u_name,u_id,u_bal
                FROM ".$this->table;
        return $this->read($sql);
    }

    public function user($id){
        $sql = "SELECT full_name,u_name,u_id,u_bal
                FROM $this->table
                WHERE u_id = $id";
        return $this->read($sql);
    }

    public function exists($data){
        $sql = "SELECT u_id
                FROM $this->table
                WHERE (u_name,u_pwd) in (('$data->username','$data->password'))";
        $res = $this->read($sql);
        if ($res['data'] != NULL) {
            $res['u_id'] = $res['data'][0]['u_id'];
        } else {
            // No such user
            $res['flag'] = false;
            $res['error'] = 'Invalid Username/password';
        }
        return $res;
    }

    public function createuser($data){
        $sql = "INSERT INTO $this->table(u_name,u_pwd,full_name,u_bal)
                VALUES('$data->u_name','$data->pwd','$data->full_name','$data->bal')";
        $res = $this->write($sql);
        $sql = "SELECT u_id
                FROM $this->table
                WHERE u_name = '$data->u_name'";
        $res['u_id'] = $this->read($sql)['data'][0]['u_id'];
        return $res;
    }

    public function update($data){
        $sql = "UPDATE $this->table
                SET $data->field = '$data->value'
                WHERE u_id = '$data->id'";
        $res = $this->write($sql);
        $res['u_id'] = $data->id;
        return $res;
    }

    public function delete($id){
        $sql = "DELETE FROM $this->table
                WHERE u_id = $id";
        $res = $this->write($sql);
        $res['u_id'] = $id;
        return $res;
    }
}
