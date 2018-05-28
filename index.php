<?php
require __DIR__ . '/vendor/autoload.php';

$requestPath = explode('/', $_SERVER['REQUEST_URI']);
$routes = new \Classes\Routes($requestPath);
$controller = $routes->getController();

var_dump($controller->getModel());

//$model = $controller->getModel();
//$data = $model->getData();
//$view = $controller->getView();

//echo $view->render($data);
?>