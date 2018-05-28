<?php

namespace Classes;

class Routes {
    public $routes = [
        'week3' => '\Controllers\Week3Controller',
        'week4' => '\Controllers\Week4Controller',
        'week5' => '\Controllers\Week5Controller'
    ];
    
    public $requestPath = [];
    
    public function __construct($requestPath = []) {
        
        if(empty($requestPath)) {
            echo 'Page not found';
        }
        
        $this->requestPath = $requestPath;
    }
    
    public function getController() {
        
        $className = $this->routes[$this->requestPath[1]];        
        if (isset($className)) {  
            
            $controller = new $className;
            $controller->setParams($this->requestPath);
            return new $className;
        } else {
            echo 'Page not found';
            // Return a 404 controller            
            // return new NotFoundController($requestPath);
        }
    }

}
