<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Controllers;

/**
 * Description of 404Controller
 *
 * @author cv
 */
class ErrorController extends Controller {
    public function __construct($error) {
        
        parent::__construct();
        $this->model = new \Models\Model();
        if($error == '404')
        {
            $this->Error_404();
        }
        
        $this->view = new \Views\View($this->template);
    }
    
    public function Error_404()
    {
        $this->template[] = "/Templates/404.php";
       
    }
}
