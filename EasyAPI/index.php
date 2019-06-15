<?php
include_once './core/lib/BaseModel.php';
include_once './core/lib/BaseController.php';
include_once "./core/helper.php";
include_once "./core/config.php";

// Configure URL
$url = trim($_SERVER['REQUEST_URI'],"/");
$url = explode("/",$url);
$app = $url[0];
//-----------------------------------------------
//echo "<pre>";
//print_r( $_SERVER);
//echo "</pre>";
// Specify controller , method , argument
if (in_array($app,$INSTALED_APPS)) {
    $controller = !empty($url[1]) ? $url[1] : NULL;
    $method = !empty($url[2]) ? $url[2] : NULL;
    $arg = !empty($url[3]) ? $url[3] : NULL ;
}else{
    $controller = !empty($url[0]) ? $url[0] : "Home";
    $method = !empty($url[1]) ? $url[1] : NULL;
    $arg = !empty($url[2]) ? $url[2] : NULL ;
    $app = '.';
}

//------------------------------------------------
// Route
invoke('controllers',$app,$controller);
$ctlr = new $controller();
if ($arg != NULL) {
    $ctlr->{$method}($arg);
} else {
    method_exists($ctlr,$method) ? $ctlr->{$method}() : $ctlr->_default();
}
//-------------------------------------------------

?>
