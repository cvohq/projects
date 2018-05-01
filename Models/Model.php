<?php
class Model {

   public $data = [];

   public function getData() {
       return $this->data;
   }

   public function addData($data) {
       $this->data[] = $data;
   }
           
}
?>