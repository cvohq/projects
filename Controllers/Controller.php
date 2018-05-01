<?php

class Controller {

   public $model;
   public $template;
   public $view;

   public function __construct() {
       // Constructor for the parent class
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