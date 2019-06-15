<?php
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: '.$_SERVER['REQUEST_METHOD']);
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

  if(!is_null($data['t_id'])) {
    echo json_encode(
      array('message' => 'Request Accepted',
            'data' => array('t_id' => $data['t_id']),
            'flag' => $data['flag']
        )
    );
  } else {
    echo json_encode(
      array('message' => 'Request Not Accepted',
            'error' => $data['error'],
            'flag' => false
            )
    );
  }
