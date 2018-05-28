<?php

namespace Controllers;

class Controller {
    
    public $params;

    public $model;
    public $template;
    public $view;

    public function __construct() {
        $this->model = new \Models\Model();
        $this->template = [];
        $this->view = new \Views\View($this->template);
    }

    public function setParams($params) {
        $this->params = $params;
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