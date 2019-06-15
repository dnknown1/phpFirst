<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
if ($data['flag']) {
    $result_set = array(
        'message' =>count($data['data']).' record(s) found',
        'data' => array()
    );
    foreach ($data['data'] as $key) {
        extract($key);
        //$pwd = ;
        $result = array(
            'id' => $u_id,
            'full name' => $full_name,
            'username' => $u_name,
            'password' => isset($u_pwd) ? $u_pwd : "YES:PROTECTED",
            'balance' => $u_bal
        );
        array_push($result_set['data'],$result);
    }
    echo json_encode($result_set);
} else {
    echo json_encode(
      array('message' => 'No record(s) Found')
    );
}
