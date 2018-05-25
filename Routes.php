<?php

class Routes {
    public $routes = [
        'week3' => 'Controllers\Week3Controller',
        'week4' => 'Controllers\Week4Controller',
        'week5' => 'Controllers\Week5Controller'
    ];
    
    public $requestPath = [];
    
    public function __construct($requestPath = []) {
        
        if(empty($requestPath))
        {
            echo 'Page not found';
        }
        
        $this->requestPath = $requestPath;
    }
    
    public function getController() {
        
        if (isset($this->routes[$this->requestPath[1]])) {
            return new $this->routes[$this->requestPath[1]]($this->requestPath);
        } else {
            echo 'Page not found';
            // Return a 404 controller            
            // return new NotFoundController($requestPath);
        }
    }

}
