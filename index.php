<?php
//routing
$url = $_SERVER['REQUEST_URI'];
$url = explode('/', $url);

$action = $url[2];
$params = array();

if (isset($url[3])) {
    $params = explode('&', $url[3]);
}
require_once('Controllers/userController.php');
$controller = new userController();
//check if action exists

if($action == ''){
    $controller->indexDisplay();
}else if (method_exists($controller, $action)) {
    //check if params exists
    $controller->$action($params);
} else{
    require_once('Views/404.php');
    $view = new _404();
    $view->index();
}

?>
