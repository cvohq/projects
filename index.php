<?php
require __DIR__ . '/vendor/autoload.php';

$requestPath = explode('/', $_SERVER['REQUEST_URI']);
$routes = new \Classes\Routes($requestPath);
$controller = $routes->getController();

$model = $controller->getModel();
$data = $model->getData();
$title = $model->getTitle();
$view = $controller->getView();

echo $view->render($data,$title);
?>