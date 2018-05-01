<?php

class HelloWorldController extends Controller {

   public function __construct() {
       
       // Setting the model
       $this->model = new HelloWorldModel();

       // Setting the template
       $this->template = '/Templates/HelloWorld.template.php';

       $this->view = new View($this->template);
   }
   

}

?>