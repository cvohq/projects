<?php

namespace Controllers;

/**
 * Description of Week4Controller
 *
 * @author cv
 */
class Week4Controller extends Controller{
    
    public function __construct() {
       
        $this->model = new \Models\Week3Model();
        
        $this->template = [
            '/Templates/Nav.template.php',
            '/Templates/Footer.template.php'  
                ];
        
    }
    
    public function PythagoreanTriple() {
        $this->template[] = '/Templates/pythagoreanTriple.php';
        $this->view = new \Views\View($this->template);
    }
    
    private function CountCollatzProblem($n,$count = 1) {
        //echo $n . '->';
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
		echo $count .'<br><br>';
		return;
	}
        $this->CountCollatzProblem($n,$count);
    }
    
    public function LongestCountCollatzProblem()
    {
        for($n = 1; $n<1000; $n++)
        {
            echo $this->CountCollatzProblem($n);
            echo '<br>';
        }
        //$this->model->addvalue($this->CountCollatzProblem(1));
        $this->template[] = '/Templates/Week4.template.php';
        $this->view = new \Views\View($this->template);
    }
}
