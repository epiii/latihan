<?php
	// error_reporting(0);
 	include '../../vd.php';
	$nodeArr=array();
		// $nodeArr[2][1] = 7;
		// $nodeArr[2][3] = 10;
		// $nodeArr[2][4] = 15;

		// $nodeArr[1][2] = 7;
		// $nodeArr[1][3] = 9;
		// $nodeArr[1][6] = 14;

		// $nodeArr[3][1] = 9;
		// $nodeArr[3][2] = 10;
		// $nodeArr[3][4] = 11;
		// $nodeArr[3][6] = 2;

		// $nodeArr[4][2] = 15;
		// $nodeArr[4][3] = 11;
		// $nodeArr[4][5] = 6;

		// $nodeArr[5][4] = 6;
		// $nodeArr[5][6] = 9;

		// $nodeArr[6][1] = 14;
		// $nodeArr[6][3] = 2;
		// $nodeArr[6][5] = 9;

	$qArr = array();	
	$solution=array();
	$tmpUnvisited = array();	
	$nNode=5;
	// input user
	$start=2;
	$end=5;
	// $dist = array(); 	//jarak
	// $prev = array();	//node sebelumnya
	// initilize
	for($i=0; $i<$nNode; $i++){
		for($j=0;$j<$nNode; $j++){
			$qArr[]=array(
				'name'      =>'label_'.($i+1),
				'dist'      =>9999,
				'prev'      =>0, 
				'isVisited' =>0
			);
		}
	}
vd($qArr);
	// set awal
	$qArr[0]['dist']=0;
	$solution[]=$qArr[0];

	// vd($solution);
	$inputNode=array();

	// row A (0)
	$inputNode[0][1]=5;
	$inputNode[0][3]=11;
	$inputNode[0][4]=2;
	// row B (1)
	$inputNode[1][2]=4;
	$inputNode[1][3]=5;
	// row C (2)
	$inputNode[2][3]=8;
	// row D (3) --> kosong tidak ada arah 
	
	// row E (4)
	$inputNode[4][1]=4;
	// vd($inputNode);
	// $u=min($qArr[$i]['dist']);
	// vd($u);
	// foreach ($qArr as $i => $v) {
	// 	$u.=min($qArr[$i]['dist']);
	// }vd($u);
	// $dist[0]=0; // jarak dari sumber ke sumber default 0
	// while(!empty($qArr)){	
	// 	if(min($qArr['dist'])
	// }
	// vd($tmpUnvisited);

	$matrixPrint='';
	for($i=0; $i<$nNode; $i++) {
		for($j=0; $j<$nNode; $j++) {
			echo $qArr[]
		}
		$matrixPrint.='<br>';
	}echo $c;
	echo $qArr[0][0];
	echo $matrixPrint;
?>