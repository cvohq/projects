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
        $this->model->addvalue('add');
        $this->model->addvalue(array_sum($number));     
        $this->view = new View($this->template);
    }
    
    public function subtract($number) {
        $subtract = $number['a'];
        foreach (array_slice($number, 1) as $x) {
            $subtract -= $x;
        }
        
        $this->template[] = '/Templates/Week3.Math.template.php';
        $this->model->addvalue('subtract');
        $this->model->addvalue($subtract);
        $this->view = new View($this->template);
    }
    
    public function multiply($number) {
        $multiply = 1;
        foreach ($number as $value) {
            $multiply *= $value;
        }
        
        $this->template[] = '/Templates/Week3.Math.template.php';
        $this->model->addvalue('multiply');
        $this->model->addvalue($multiply);
        $this->view = new View($this->template);
    }
    
    public function divide($number) {
        $divide = $number['a'];
        foreach (array_slice($number,1) as $value) {
            $divide /= $value;
        }
        
        $this->template[] = '/Templates/Week3.Math.template.php';
        $this->model->addvalue('divide');
        $this->model->addvalue($divide);
        $this->view = new View($this->template);
    }
    
    private function prime($number)
    {
        //0,1 are not prime number
	if($number < 2)
            return 0;

	// run from 2 to $number / 2 if any number can divide any number -> fail
	for ($i=2; $i <= $number/2; $i++) { 
            if ($number % $i ==0) {
                return 0;
            }
	}
	return 1;
    }

    public function evenlydivisible($number) {
        $result = $number * 9 * 4;
        for($i=7; $i<$number; $i++)
        {
            if(self::prime($i)==1)
            {
                $result *= $i;
            }
        }
        
        
        $this->template[] = '/Templates/Week3.Math.template.php';
        $this->model->addvalue('evenlydivisible');
        $this->model->addvalue($number);
        $this->model->addvalue($result);
        $this->view = new View($this->template);
    }
}
