<?php

class Week3Controller extends Controller {
 
    public function __construct() {
       
        $this->model = new Week3Model();
        
        $this->template = [
            '/Templates/Nav.template.php',
            '/Templates/Footer.template.php'
                ];
    }
    
    public function add($number) {
        $this->template[] = '/Templates/Week3.Math.template.php';
        $this->model->addvalue(0); //0 = add
        $this->model->addvalue(array_sum($number));     
        $this->view = new View($this->template);
    }
    
    public function subtract($number) {
        $subtract = $number['a'];
        foreach (array_slice($number, 1) as $x) {
            $subtract -= $x;
        }
        
        $this->template[] = '/Templates/Week3.Math.template.php';
        $this->model->addvalue(1); // 1 = subtract
        $this->model->addvalue($subtract);
        $this->view = new View($this->template);
    }
    
    public function multiply($number) {
        $multiply = 1;
        foreach ($number as $value) {
            $multiply *= $value;
        }
        
        $this->template[] = '/Templates/Week3.Math.template.php';
        $this->model->addvalue(2); // 2 = multiply
        $this->model->addvalue($multiply);
        $this->view = new View($this->template);
    }
    
    public function divide($number) {
        $divide = $number['a'];
        foreach (array_slice($number,1) as $value) {
            $divide /= $value;
        }
        
        $this->template[] = '/Templates/Week3.Math.template.php';
        $this->model->addvalue(3);
        $this->model->addvalue($divide);
        $this->view = new View($this->template);
    }
}
