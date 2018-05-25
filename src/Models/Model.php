<?php

namespace Models;

class Model {

   public $data = [];

   public function getData() {
       return $this->data;
   }
   
   public function setData($data){
       $this->data = $data;
   }

   public function addData($data) {
       $this->data[] = $data;
   }
           
}
?>