<?php
/**
 * Ledger table model
 */
class LedgerModel extends BaseModel{
    private $table = 'ledger';

    public function __construct(){
        parent::__construct();
    }

    public function update($data){
        if ($data->t_type == 'debit') {
            $sql = "UPDATE users
                    SET u_bal = u_bal - $data->t_amt
                    WHERE u_id = '$data->u_id'";
            $res = $this->write($sql);
        } else {
            $sql = "UPDATE users
                    SET u_bal = u_bal + $data->t_amt
                    WHERE u_id = '$data->u_id'";
            $res = $this->write($sql);
        }
        $sql = "INSERT INTO $this->table(u_id,t_type,t_amt,t_dt)
        VALUES('$data->u_id','$data->t_type','$data->t_amt',now())";
        $res = $this->write($sql);
        $sql = "SELECT t_id FROM $this->table
        WHERE (u_id,t_type,t_amt)
        IN (('$data->u_id','$data->t_type','$data->t_amt'))
        ORDER BY t_id DESC";
        $res = $this->read($sql);
        $res['t_id'] = $res['data'][0]['t_id'];
        return $res;
    }

    public function report($id){
        $sql = "SELECT * FROM $this->table WHERE u_id = $id ORDER BY t_id DESC";
        $res = $this->read($sql);
        return $res;
    }

    public function transaction($id){
        $sql = "SELECT * FROM $this->table WHERE t_id = $id";
        $res = $this->read($sql);
        //print_r($res);
        return $res;
    }

    public function wkReport($id){
        $sql = "SELECT * FROM $this->table
                WHERE t_dt BETWEEN DATE(now()) + interval -7 DAY AND DATE(now())
                AND u_id = $id ORDER BY t_id DESC";
        $res = $this->read($sql);
        return $res;
    }
}
//
//
//
?>
