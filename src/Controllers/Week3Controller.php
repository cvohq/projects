<?php

namespace Controllers;

class Week3Controller extends Controller {
 
    public function __construct() {
       
        $this->model = new \Models\Week3Model();
        
        $this->template = [
            '/Templates/Nav.template.php',
            '/Templates/Footer.template.php',
            '/Templates/Week3.Math.template.php'
                ];
        $this->view = new \Views\View($this->template);
    }
    
    public function add($number) {
        $this->model->addvalue('add');
        $this->model->addvalue(array_sum($number));     
    }
    
    public function subtract($number) {
        $subtract = $number['a'];
        foreach (array_slice($number, 1) as $x) {
            $subtract -= $x;
        }
        
        $this->model->addvalue('subtract');
        $this->model->addvalue($subtract);
    }
    
    public function multiply($number) {
        $multiply = 1;
        foreach ($number as $value) {
            $multiply *= $value;
        }
        
        $this->model->addvalue('multiply');
        $this->model->addvalue($multiply);
    }
    
    public function divide($number) {
        $divide = $number['a'];
        foreach (array_slice($number,1) as $value) {
            $divide /= $value;
        }
        
        $this->model->addvalue('divide');
        $this->model->addvalue($divide);
    }
    
    
    //Homework Math 1
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
         
        $this->model->addvalue('evenlydivisible');
        $this->model->addvalue($number);
        $this->model->addvalue($result);
    }
    
    //Homework difference sum squares
    
    public function difference_sum_squares($number) {
        $result = $number * ($number * $number -1) * (3 * $number + 2) / 12; //Dont ask why !!!!
        
        $this->model->addvalue('difference_sum_squares');
        $this->model->addvalue($number);
        $this->model->addvalue($result);
    }
    
    //homework read file and file greate product
    
    private function readinput()
    {
        $a = [];
        $myfile = fopen("./input.txt", "r") or die("Unable to open file!");
        while(!feof($myfile)) {
            $a[] = fgets($myfile) . "<br>";
        }
        fclose($myfile);
        return $a;
    }
    
    public function greatestproduct($number) {
        $a = self::readinput();
        $collumn = count($a);
        $row = strlen($a[0]);
        $greatesnumber = 0;
        for($i=0; $i<$collumn; $i++)
        {
            for($j = 0; $j<$row-$number; $j++)
            {
                $tmp = (int)substr($a[$i],$j,$number);
                if($greatesnumber < $tmp)
                    $greatesnumber = $tmp;
            }
        }
        
        $tmp = $greatesnumber;
        $result = 1;
        for($i = 0;$i < $number; $i++)
        {
            $result *= ($tmp%10);
            $tmp = intval($tmp / 10);
        }
   
        $this->model->addvalue('greatesnumber');
        $this->model->addvalue($greatesnumber);
        $this->model->addvalue($result);
    }
}