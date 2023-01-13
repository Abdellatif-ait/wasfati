<?php
//routing
$url = $_SERVER['REQUEST_URI'];
$url = explode('/', $url);
if ($url[2] == 'admin') {
    $controller = $url[3];
    $action = $url[4];
    $params = array();

    if (isset($url[5])) {
        $params = explode('&', $url[5]);
    }
    require_once('admin/Controllers/adminController.php');
    $controller = new adminController();
    //check if action exists
    if (method_exists($controller, $action)) {
        //check if params exists
        $controller->$action($params);
    } else {
        require_once('admin/Views/404.php');
        $view = new _404();
        $view->index();
    }
} else {
    $action = $url[2];
    $params = array();

    if (isset($url[3])) {
        $params = explode('&', $url[3]);
    }
    require_once('Controllers/userController.php');
    $controller = new userController();
    //check if action exists
    if (method_exists($controller, $action)) {
        //check if params exists
        $controller->$action($params);
    } else {
        require_once('Views/404.php');
        $view = new _404();
        $view->index();
    }
}

?>
    <?php
    ?>
