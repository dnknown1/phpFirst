<?php
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: '.$_SERVER['REQUEST_METHOD']);
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

  if($data['flag']) {
    echo json_encode(
      array('message' => 'Request Accepted',
            'data' => array('u_id' => $data['u_id']),
            'flag' => $data['flag']
        )
    );
  } else {
    echo json_encode(
      array('message' => 'Request Not Accepted',
            'error' => $data['error'],
            'flag' => $data['flag']
            )
    );
  }
