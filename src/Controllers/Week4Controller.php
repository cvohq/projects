<?php

namespace Controllers;

/**
 * Description of Week4Controller
 *
 * @author cv
 */
class Week4Controller extends Controller{
    
    public function __construct($requestPath = []) {
        
        parent::__construct();
        
        $this->model = new \Models\Week4Model();
        
        if($requestPath[2] === 'PythagoreanTriple')
        {
            $this->PythagoreanTriple();
        }
        elseif($requestPath[2] === '20x20')
        {
            $this->greatestproduct20x20();
        }
        elseif ($requestPath[2] === 'CollatzProblem') {
            $this->LongestCountCollatzProblem();
        }
        else
        {
            $this->template[] = "/Templates/404.php";           
        }
        
        $this->template[] = '/Templates/Week4.template.php';
        $this->view = new \Views\View($this->template);
    }
    
    public function PythagoreanTriple() {
        $this->template[] = '/Templates/pythagoreanTriple.php';
    }
    
    private function readinput()
    {
        $a = [];
        $myfile = fopen("./input1.txt", "r") or die("Unable to open file!");
        while(!feof($myfile)) {
            $a[] = fgets($myfile) . "<br>";
        }
        fclose($myfile);
        return $a;
    }
    
    public function greatestproduct20x20() {
        $input = self::readinput();
        $column = count($input);
        $row = count(explode(' ', $input[0]));
        for($i = 0; $i < $column; $i++)
        {
            $temp = explode(' ', $input[$i]);
            
            for($j = 0; $j <$row; $j++)
            {
                $arr[$i][$j] = $temp[$j]; 
            }
        }
        
        $greatest_product = 1;
        $greatest_product_x = 0;
        $greatest_product_y = 0;
        $greatest_product_dir = '';
        
        for($i = 0; $i < $column;$i++)
        {
            for($j = 0; $j < $row; $j++)
            {
                if($j < $row - 3)
                {
                    $multiplication_row = (int)$arr[$i][$j] * (int)$arr[$i][$j+1] * (int)$arr[$i][$j+2] * (int)$arr[$i][$j+3];
                }
                if($i < $column -3)
                {
                    $multiplication_column = (int)$arr[$i][$j] * (int)$arr[$i+1][$j] * (int)$arr[$i+2][$j] * (int)$arr[$i+3][$j];
                    
                    if($j < $row - 3)
                    {
                        $multiplication_diagonal_right = (int)$arr[$i][$j] * (int)$arr[$i+1][$j+1] * (int)$arr[$i+2][$j+2] * (int)$arr[$i+3][$j+3];
                    }
                    if($j > 3)
                    {
                        $multiplication_diagonal_left = (int)$arr[$i][$j] * (int)$arr[$i+1][$j-1] * (int)$arr[$i+2][$j-2] * (int)$arr[$i+3][$j-3];
                    }
                }
                
                if($greatest_product < $multiplication_row)
                {
                    $greatest_product = $multiplication_row;
                    $greatest_product_x = $i;
                    $greatest_product_y = $j;
                    $greatest_product_dir = 'row';
                }
                elseif($greatest_product < $multiplication_diagonal_right) {
                    $greatest_product = $multiplication_diagonal_right;
                    $greatest_product_x = $i;
                    $greatest_product_y = $j;
                    $greatest_product_dir = 'diagonal right';
                }
                elseif($greatest_product < $multiplication_diagonal_left) {
                    $greatest_product = $multiplication_diagonal_left;
                    $greatest_product_x = $i;
                    $greatest_product_y = $j;
                    $greatest_product_dir = 'diagonal left';
                }
                elseif($greatest_product < $multiplication_column) {
                    $greatest_product = $multiplication_column;
                    $greatest_product_x = $i;
                    $greatest_product_y = $j;
                    $greatest_product_dir = 'column';
                }
            }
        }
        
        for($i = 0; $i < $column;$i++)
        {
            for($j = 0; $j < $row; $j++)
            {
                if($greatest_product_dir =='column')
                {
                    if($i == $greatest_product_x && $j ==$greatest_product_y)
                    {
                        echo '<font size="4" color="red">';
                        echo $arr[$i][$j] . '  ';
                        echo '</font>';
                    }
                    elseif($i == $greatest_product_x+1 && $j == $greatest_product_y)
                    {
                        echo '<font size="4" color="red">';
                        echo $arr[$i][$j] . '  ';
                        echo '</font>';
                    }
                    elseif($i == $greatest_product_x+2 && $j == $greatest_product_y)
                    {
                        echo '<font size="4" color="red">';
                        echo $arr[$i][$j] . '  ';
                        echo '</font>';
                    }
                    elseif($i == $greatest_product_x+3 && $j == $greatest_product_y)
                    {
                        echo '<font size="4" color="red">';
                        echo $arr[$i][$j] . '  ';
                        echo '</font>';
                    }
                    else 
                    {
                        echo $arr[$i][$j] . '  ';
                    }
                    continue;
                }
                elseif ($greatest_product_dir == 'row') 
                {
                    if($i == $greatest_product_x && $j == $greatest_product_y)
                    {
                        echo '<font size="4" color="red">';
                        echo $arr[$i][$j] . '  ';
                        echo '</font>';
                    }
                    elseif($i == $greatest_product_x && $j == $greatest_product_y+1)
                    {
                        echo '<font size="4" color="red">';
                        echo $arr[$i][$j] . '  ';
                        echo '</font>';
                    }
                    elseif($i == $greatest_product_x && $j == $greatest_product_y+2)
                    {
                        echo '<font size="4" color="red">';
                        echo $arr[$i][$j] . '  ';
                        echo '</font>';
                    }
                    elseif($i == $greatest_product_x && $j == $greatest_product_y+3)
                    {
                        echo '<font size="4" color="red">';
                        echo $arr[$i][$j] . '  ';
                        echo '</font>';
                    }
                    else 
                    {
                        echo $arr[$i][$j] . '  ';
                    }
                    continue;
                }
                elseif ($greatest_product_dir == 'diagonal right') 
                {
                    if($i == $greatest_product_x && $j == $greatest_product_y)
                    {
                        echo '<font size="4" color="red">';
                        echo $arr[$i][$j] . '  ';
                        echo '</font>';
                    }
                    elseif($i == $greatest_product_x+1 && $j == $greatest_product_y+1)
                    {
                        echo '<font size="4" color="red">';
                        echo $arr[$i][$j] . '  ';
                        echo '</font>';
                    }
                    elseif($i == $greatest_product_x+2 && $j == $greatest_product_y+2)
                    {
                        echo '<font size="4" color="red">';
                        echo $arr[$i][$j] . '  ';
                        echo '</font>';
                    }
                    elseif($i == $greatest_product_x+3 && $j == $greatest_product_y+3)
                    {
                        echo '<font size="4" color="red">';
                        echo $arr[$i][$j] . '  ';
                        echo '</font>';
                    }
                    else 
                    {
                        echo $arr[$i][$j] . '  ';
                    }
                    continue;
                }
                elseif ($greatest_product_dir == 'diagonal left') 
                {
                    if($i == $greatest_product_x && $j == $greatest_product_y)
                    {
                        echo '<font size="4" color="red">';
                        echo $arr[$i][$j] . '  ';
                        echo '</font>';
                    }
                    elseif($i == $greatest_product_x+1 && $j == $greatest_product_y-1)
                    {
                        echo '<font size="4" color="red">';
                        echo $arr[$i][$j] . '  ';
                        echo '</font>';
                    }
                    elseif($i == $greatest_product_x+2 && $j == $greatest_product_y-2)
                    {
                        echo '<font size="4" color="red">';
                        echo $arr[$i][$j] . '  ';
                        echo '</font>';
                    }
                    elseif($i == $greatest_product_x+3 && $j == $greatest_product_y-3)
                    {
                        echo '<font size="4" color="red">';
                        echo $arr[$i][$j] . '  ';
                        echo '</font>';
                    }
                    else 
                    {
                        echo $arr[$i][$j] . '  ';
                    }
                    continue;
                }
                
                
            }
           // echo '<br>';
        }
     
    }
    
    private function CountCollatzProblem($n,$count = 1) {
	if($n % 2 == 0)
	{
            $n = $n / 2;
	}
	else
	{
            $n = 3 * $n +1;
	}
	
	$count++;
	if($n == 1)
	{
            return $count;
	}
        return $this->CountCollatzProblem($n,$count);
    }
    
    public function LongestCountCollatzProblem()
    {
        $count = 0;
        $x = 0;
        for($n = 1; $n<1000000; $n++)
        {
            $temp = $this->CountCollatzProblem($n);
            if($count < $temp)
            {
                $count = $temp;
                $x = $n;
            }
            
        }
        $this->model->addData('CountCollatzProblem');
        $this->model->addData($x);
        $this->model->addData($count);
    }
}
