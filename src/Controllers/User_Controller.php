<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Controllers;

/**
 * Description of User_Controller
 *
 * @author cv
 */
class User_Controller  {
    private $mysql;

    public function __construct() {
        $this->mysql = new \Classes\Mysql();
        $this->mysql->connect_db();
    }
    
    
    
    
}
