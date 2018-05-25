<?php

namespace Controllers;

class Week3Controller extends Controller {
 
    public function __construct($requestPath = []) {
        $this->model = new \Models\Week3Model();
        
        if($requestPath[2] === 'math')
        {
            $tag = explode('?', $requestPath[3]);
            $calculator = $tag[0];
            parse_str($tag[1], $number);
            
            if($calculator === 'add')
            {
                $this->add($number);
            }
            elseif ($calculator === 'subtract') {
                $this->subtract($number);
            }
            elseif ($calculator === 'multiply') {
                $this->multiply($number);
            }
            elseif ($calculator === 'divide') {
                $this->divide($number);
            }
        }
        elseif ($requestPath[2] === 'greatestproduct') {
            $this->greatestproduct($requestPath[3]);
        }
        elseif ($requestPath[2] === 'differencesumsquares') {
            $this->difference_sum_squares($requestPath[3]);
        }
        elseif ($requestPath[2] === 'evenlydivisible') {
            $this->evenlydivisible($requestPath[3]);
        }
        else
        {
            //echo 'Page not found';
            $this->model->addData('Page not found');
            
        }
        
        
        
        $this->template = [
            '/Templates/Nav.template.php',
            '/Templates/Footer.template.php',
            '/Templates/Week3.Math.template.php'
                ];
        $this->view = new \Views\View($this->template);
    }
    
    public function add($number = []) {
        $this->model->addData('add');
        $this->model->addData(array_sum($number));     
    }
    
    public function subtract($number) {
        $subtract = $number['a'];
        foreach (array_slice($number, 1) as $x) {
            $subtract -= $x;
        }
        
        $this->model->addData('subtract');
        $this->model->addData($subtract);
    }
    
    public function multiply($number) {
        $multiply = 1;
        foreach ($number as $value) {
            $multiply *= $value;
        }
        
        $this->model->addData('multiply');
        $this->model->addData($multiply);
    }
    
    public function divide($number) {
        $divide = $number['a'];
        foreach (array_slice($number,1) as $value) {
            $divide /= $value;
        }
        
        $this->model->addData('divide');
        $this->model->addData($divide);
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
         
        $this->model->addData('evenlydivisible');
        $this->model->addData($number);
        $this->model->addData($result);
    }
    
    //Homework difference sum squares
    
    public function difference_sum_squares($number) {
        $result = $number * ($number * $number -1) * (3 * $number + 2) / 12; //Dont ask why !!!!
        
        $this->model->addData('difference_sum_squares');
        $this->model->addData($number);
        $this->model->addData($result);
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
   
        $this->model->addData('greatestproduct');
        $this->model->addData($greatesnumber);
        $this->model->addData($result);
    }
}
