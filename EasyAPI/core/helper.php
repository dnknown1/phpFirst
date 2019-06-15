<?php

function developer_mode($isit=true){
    error_reporting($isit);
}

function notFound(){
    header("Location: http://".$_SERVER['SERVER_NAME']."/badrequest");
}

function invoke($DIR,$SUBDIR,$MODULE,$data=NULL){
    if (file_exists("./meta/".$DIR."/".$SUBDIR."/".$MODULE.".php")) {
        include_once "./meta/".$DIR."/".$SUBDIR."/".$MODULE.".php";
        //echo "./meta/".$DIR."/".$SUBDIR."/".$MODULE.".php";
    } else {
        notFound();
        //echo "not found\n";
    }
}

function validate($method){
    if ($_SERVER['REQUEST_METHOD'] === $method) {
        return true;
    } else {
        $method = $_SERVER['REQUEST_METHOD'];
        echo json_encode(
            array(
                'message' => 'Not Acceptable Request Type',
                'methods' => array(
                             'GET'  => 'To get Content',
                             'POST' => 'To add content',
                             'PUT'  => 'To update content'
                         ),
                'requested' => $method,
                'data' => 'Secured',
                'error' => true
             )
         );
         return false;
    }
}

function get_json($link,$method='GET',$content=NUll){
    $opts = array(
        'http'=> array(
            'method'  => $method,
            'header'  => 'Content-type: application/json',
            'content' => json_encode($content)
        )
    );
    $obj = json_decode(
        file_get_contents($link,false,stream_context_create($opts)),true);
    return $obj;
}
