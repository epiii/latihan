<?php

	$stk=['(',')','j','8'];
	// $stk=['(',')','j','8'];
	// $stk=['*7(j8)$'];
	$list=[];
	$balance=true;
	$cetak;
	// var_dump(count($stk));
	$n=count($stk);
	// $n=strlen($stk);
	for ($i=0;$i<$n; $i++){
		if($stk[$i]=='('){
			array_push($list,$stk[$i]);
			// ($stk[$i]);
			// $balance=true;
		}else
			$balance=false;
		// else

	}
		// $cetak=$balance&&
	echo $list;
?>