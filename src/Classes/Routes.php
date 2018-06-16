<?php

namespace Classes;

class Routes {
    public $routes = [
        'week3' => '\Controllers\Week3Controller',
        'week4' => '\Controllers\Week4Controller',
        'week5' => '\Controllers\Week5Controller',
        'week6' => '\Controllers\Week6Controller'
    ];
    
    public $requestPath = [];
    
    public function __construct($requestPath = []) {
        
        if(empty($requestPath)) {
            return new \Controllers\ErrorController('404');
        }
        
        $this->requestPath = $requestPath;
    }
    
    public function getController() {
        $path = $this->routes[$this->requestPath[1]];   
        if (isset($path)) {  
            return new $path($this->requestPath);
        } else {
            return new \Controllers\ErrorController('404');
            // Return a 404 controller            
            // return new NotFoundController($requestPath);
        }
    }

}
