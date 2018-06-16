<?php

namespace Models;

class Model {
    
    public $data = [];
    public $title;
    
    public function getData() {
        return $this->data;
    }

    public function setData($data){
        $this->data = $data;
    }

    public function addData($data) {
        $this->data[] = $data;
    }
    
    public function getTitle()
    {
        return $this->title;
    }
    
    public function setTitle($title)
    {
        $this->title = $title;
    }
}
?>