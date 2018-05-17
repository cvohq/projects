<?php

namespace Models;

class Week3Model extends Model {
    public function __construct() {
        $this->addData('Welcome to Week 3');
    }
    
    public function addvalue($data){
        $this->addData($data);
    }
}
