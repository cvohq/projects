<h2><?= $data[0] ?></h2>
<?php 
    if($data[1] === 'add')
    {
        echo 'Sum = ' .$data[2];
    }
    elseif($data[1] === 'subtract')
    {
        echo 'Subtract = '.$data[2];
    }
    elseif($data[1] === 'multiply')
    {
        echo 'Multiply = ' .$data[2];
    }
    elseif($data[1] === 'divide')
    {
        echo 'Divide = ' .$data[2];
    }
    elseif($data[1] === 'evenlydivisible')
    {
        echo 'The smallest positive number that is evenly divisible by all of the numbers from 1 to '. $data[2] . ' : ' . $data[3];
    }
    elseif($data[1] === 'difference_sum_squares')
    {
        echo '(1+2+3+......+' .$data[2].')^2  -  (1^2 + 2^2 + .....+ ' .$data[2] . '^2) = ' .$data[3]; 
    }
    elseif($data[1] === 'greatestproduct')
    {
        echo 'The adjacent digits: ' . $data[2] . ' have the greatest product are: ' .$data[3];
    }
    /*else {
        echo '<font size="5" color="red">'. $data[1] .'</font>';
    }*/
?>