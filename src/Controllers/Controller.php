<?php

namespace Controllers;

class Controller {

    public $model;
    public $template;
    public $view;

    public function __construct() {
        // Setting defaults
        $this->template = [
            '/Templates/Nav.template.php',
            '/Templates/Footer.template.php'  
                ];
        //$this->view = new \Views\View($this->template);*/
    }

    public function getTemplate() {
        return $this->template;
    }

    public function getModel() {
        return $this->model;
    }

    public function getView() {
        return $this->view;
    }

}

?>