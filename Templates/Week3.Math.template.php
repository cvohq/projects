<?php 
    if($data[1] === 'add')
        echo 'Sum = ' .$data[2];
    if($data[1] === 'subtract')
        echo 'Subtract = '.$data[2];
    if($data[1] === 'multiply')
        echo 'Multiply = ' .$data[2];
    if($data[1] === 'divide')
        echo 'Divide = ' .$data[2];
    if($data[1] === 'evenlydivisible')
        echo 'The smallest positive number that is evenly divisible by all of the numbers from 1 to '. $data[2] . ' : ' . $data[3];
    

?>