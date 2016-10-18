<?php
	$array = array(
	    'fruit1' => 'apple',
	    'fruit2' => 'orange',
	    'fruit3' => 'grape',
	    'fruit4' => 'apple',
	    'fruit5' => 'apple'
	);

	// this cycle echoes all associative array
	// key where value equals "apple"
	// var_dump(current($array));exit();
	while ($fruit_name = current($array)) {
	    if ($fruit_name == 'apple') {
	        echo key($array).'<br />';
	    }
	    next($array); //counter array ($x++)
	}
	// hasil 1, 4, 5
?>