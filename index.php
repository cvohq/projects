<?php
require __DIR__ . '/vendor/autoload.php';
require_once 'Routes.php';
$requestPath = explode('/', $_SERVER['REQUEST_URI']);

$controller = (new Routes($requestPath))->getController();

$model = $controller->getModel();
$data = $model->getData();
$view = $controller->getView();

echo $view->render($data);
?>