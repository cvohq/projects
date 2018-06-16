<h2><?= $data[0] ?></h2>
<?php

if($data[1] == 'CountCollatzProblem')
{
    echo 'Which starting number: '. $data[2] . ', under one million, produces the longest chain: ' .$data[3] . ' steps.';
}