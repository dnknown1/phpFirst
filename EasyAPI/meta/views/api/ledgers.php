<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
if (!empty($data['data'])) {
    $result_set = array(
        'message' =>count($data['data']).' record(s) found',
        'data' => array()
    );
    foreach ($data['data'] as $key) {
        extract($key);
        //$pwd = ;
        $result = array(
            't_id' => $t_id,
            'u_id' => $u_id,
            't_type' => $t_type,
            't_amt' => $t_amt,
            't_dt' => $t_dt
        );
        array_push($result_set['data'],$result);
    }
    echo json_encode($result_set);
} else {
    echo json_encode(
      array('message' => 'No record(s) Found')
    );
}
?>
