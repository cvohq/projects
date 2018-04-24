<?php
	function multiples($number, $endnumber)
	{
		$a = array();
		$i = 1;
		while($number*$i < $endnumber)
		{
			$a[] = $number*$i;
			$i++;
		}
		return $a;
	}

	function sum_of_multiples($endnumber)
	{
		$a = multiples(3, $endnumber);
		$tmp = multiples(5, $endnumber);
		
		//remove dublicate number
		foreach ($tmp as $x) {
			if(!in_array($x, $a))
			{
				$a[] = $x;
			}
		}
		return array_sum($a);
	}

	echo "Home work 1: Sum of multiples(1000):  ";
	echo sum_of_multiples(1000);


	function prime($number)
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

	function primefactors($number,$i,$a)
	{
		global $a;

		//if $number = 1 done
		if($number == 1)
		{
			return $a;
		}


		// check $number can divide $i  and $i is prime number 
		//-> add $i to array and re-run the function with $number =$number / $i
		if($number % $i == 0 && prime($i) == 1)
		{
			if(!in_array($i,$a))
			{
				$a[$i] = 1; // all number go here????
			}
			else
			{
				echo $a[$i];
				$a[$i] = $a[$i] + 1; // can not change
			}
			primefactors($number/$i, 2, $a);
			
		}

		// if not change $i++ and check $i is prime? and re-run function with new $i
		else
		{
			do
			{
				$i++;
			}
			while(prime($i)==0);
			
			primefactors($number, $i, $a);
		}
		
	}

	$a = array();
	primefactors(600851475143,2,$a);

	echo '<br><br>The largest prime factor of the number 600851475143 are: <br>';
	foreach ($a as $key => $value) {
		echo 'number: ' . $key . '-' . $value . ' times'. '<br>';
	}
?>
