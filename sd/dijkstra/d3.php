<?php
	include '../../vd.php';
	$nodeArr=array();
	$nodeVisited=array();
	$nodeSolu=array();
	$nodeWeight=array();

	// node
	function initMatrix($nNode){
		global $nodeArr;
		for($i=0; $i<$nNode; $i++){
			
			for($j=0;$j<$nNode; $j++){
				 $nodeArr[$i][$j]=99;
			}
		}
	}
	
	function vwMatrix(){
		global $nodeArr;
		$out='';
		foreach ($nodeArr as $i => $v) {
			foreach ($v as $ii => $vv) {
				if($vv==99)  $out.='~ &nbsp';
				else $out.=(strlen($vv)==1?'0'.$vv:$vv).'&nbsp';
			}$out.='<br>';
		}echo $out;	
	}

	function inputNode($nArr){
		global $nodeArr;
		foreach ($nArr as $i => $v) {
			foreach ($v as $ii => $vv) {
				$nodeArr[$i][$ii]=$vv;
			}
		}
	}

	function routeList(){
		// global $nodeArr;
		// $out='';
		// foreach ($nodeArr as $i => $v) {
		// 	foreach ($v as $ii => $vv) {
		// 		$out.=$nodeArr[$i][$ii]=$vv;
		// 	}
		// }
	}

	function dijkstra($start,$end){ // start = 0 || end = 3
		global $nodeArr,$nodeSolu,$nodeVisited,$nodeWeight;
		$nodeVisited[]=$start;
		$out='';
		// $nodeSolu[]=$end;

		foreach ($nodeArr as $i => $v) { 
			if($start==$end) $out='node sama dengan tujuan'; // cek : apa start == end
			else{ // cek : jika tidak sama (beda node)
				if($i==$end) { //jika iterasi node ke -i = node tujuan 
					$nodeSolu[]=$i;
					break;
				}else{ // jika 
					$minVal=min($nodeArr[$i]); // edge terkecil
					$isNodeVisited=array_search($minVal, $nodeVisited);
					if(!$isNodeVisited){ // get index array of "minimum distance" where in "array vsited"
						continue;
					}else{ // ada 
						$minIndex=array_search($minVal,$nodeArr[$i]); // get index array of "minimum dist of node"  in row -i  
						$nodeVisited[]=$minIndex; 	// update (visited) 
						$nodePrev[]=$i; 	// insert node prev   
						$nodeWeight[]=$nodeArr[$i][$minIndex];
						// foreach ($v as $ii => $vv) {
						// 	$out.=$minIndex.'<br>';
						// 	$nodeSolu[]=$minIndex;
						// }
					}
				}
			}
		}echo $out;	
	}

	$weightArr=array();
		$weightArr[0][1] = 5;
		$weightArr[0][3] = 11;
		$weightArr[0][4] = 2;

		$weightArr[1][2] = 4;
		$weightArr[1][3] = 5;

		$weightArr[2][3] = 8;
		$weightArr[2][3] = 8;

		$weightArr[4][3] = 9;
	
	$nn=5;
	initMatrix($nn);
	echo 'init matrix '.$nn.' x '.$nn.'<br>';
		vwMatrix(); 
	
	inputNode($weightArr);
	echo '<br>update matrix : <br>';
		vwMatrix(); 

	echo '<br>input source : 0';
	echo '<br>input tujuan : 4';
	echo '<br>hasilnya <br>';
		dijkstra(0,3);
		// vd($nodeSolu);
		echo 'visited: ';
		print_r($nodeVisited);
		echo '<br>solu: ';
		print_r($nodeSolu);
		echo '<br>weight: ';
		print_r($nodeWeight);