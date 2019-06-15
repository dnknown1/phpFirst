<?php
session_start();
/**
 * Profile loader class
 */
class Profile extends BaseController{
    public function __construct(){
        parent::__construct();
    }

    public function _default(){
        $id = $_SESSION['user'];
        $data['error'] = false;
        //---------------active users id -------------------------------
        //--------------------------------------------------------------
        if ($_REQUEST) {
            $res = get_json(url_for.'api/users/user/'.$id, 'GET');
            $data['amount'] = $res['data'][0]['balance'];
            if ($_REQUEST['type'] == 'debit') {
                if ($data['amount'] - $_REQUEST['amt'] >= 0.00) {
                    $res = array(
                    'u_id'   => $id,
                    't_type' => $_REQUEST['type'],
                    't_amt'  => $_REQUEST['amt'],
                );
                $res = get_json(url_for.'api/ledger/update','POST',$res);
                }else {
                    $data['error'] = true;
                };
            }else {
                $res = array(
                    'u_id'   => $id,
                    't_type' => $_REQUEST['type'],
                    't_amt'  => $_REQUEST['amt'],
                );
                $res = get_json(url_for.'api/ledger/update','POST',$res);
            }
        }
        $res = get_json(url_for.'api/users/user/'.$id, 'GET');
        $data['all'] = get_json(url_for.'api/ledger/report/'.$id, 'GET');
        $data['week'] = get_json(url_for.'api/ledger/wkreport/'.$id, 'GET');
        $data['amount'] = $res['data'][0]['balance'];
        $data['ratio'] = number_format($this->getRatio($data['all']['data']),2).'%';
        $data['full name'] = $res['data'][0]['full name'];
        $data['username'] = $res['data'][0]['username'];
        $this->load->view('.','profile',$data);
    }
     private function getRatio($set){
         $expence = 0.00;
         $add = 0.00;
         foreach ($set as $key){
             if ($key['t_type'] == 'debit') {
                 $expence +=$key['t_amt'];
             } else {
                 $add += $key['t_amt'];
             }
         }
         for($x=$expence;$x>1;$x--) {
             if(($add%$x)==0 && ($expence % $x)==0) {
                 $add = $add/$x;
                 $expence = $expence/$x;
             }
         }
         return ($expence*100)/$add;
     }
}
