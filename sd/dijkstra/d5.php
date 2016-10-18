<?php
	include '../../vd.php';

	$weightArr=array();
		$edgeWeight[0][1] = 30;
		$edgeWeight[0][2] = 25;

		$edgeWeight[1][5] =5;
		$edgeWeight[1][4] =10;

		$edgeWeight[2][3] =5;
		
		$edgeWeight[3][4] =5;

		$edgeWeight[4][6] =5;
		
		$edgeWeight[5][6] =10;
		$nn=7;

		// $edgeWeight[0][1] = 5;
		// $edgeWeight[0][3] = 11;
		// $edgeWeight[0][4] = 2;

		// $edgeWeight[1][2] = 4;
		// $edgeWeight[1][3] = 5;

		// $edgeWeight[2][3] = 8;
		// $edgeWeight[2][3] = 8;

		// $edgeWeight[4][3] = 9;

	// $nn=5;
	initMatrix($nn);
	echo 'init matrix '.$nn.' x '.$nn.'<br>';
		vwMatrix(); 
	
	inputNode($edgeWeight);
	// vd($edgeArr);
	echo '<br>update matrix : <br>';
		vwMatrix(); 

	echo '<br>start node : A(0)';
	echo '<br>destination node  : G(6)';
	echo '<br>hasilnya <br>';
		dijkstra(0,6);
// --------------

	$nodeArr=array(); // = 5 
	$edgeArr=array(); // <= 25 

	// $nodeVisited=array();
	$nodeSolu=array();
	$nodeWeight=array();

	// node
	function initMatrix($nNode){
		global $edgeArr,$nodeArr;
		for($i=0; $i<$nNode; $i++){
			$nodeArr[$i]['isVisited']=false;
			for($j=0;$j<$nNode; $j++){
				 $edgeArr[$i][$j]['edgeWeight']=99;
				 $edgeArr[$i][$j]['accuWeight']=0;
				 $edgeArr[$i][$j]['prevWeight']=0;
			}
		}
	}
	
	function vwMatrix(){
		global $edgeArr;
		$out='';
		// vd($edgeArr);
		foreach ($edgeArr as $i => $v) {
			foreach ($v as $ii => $vv) {
				if($vv['edgeWeight']==99)  $out.='**&nbsp';
				else $out.=(strlen($vv['edgeWeight'])==1?'0'.$vv['edgeWeight']:$vv['edgeWeight']).'&nbsp';
				// $out.=(strlen($vv['edgeWeight'])==1?'0'.$vv['edgeWeight']:$vv['edgeWeight']).'&nbsp';
			}$out.='<br>';
		}echo $out;	
	}

	function inputNode($nArr){
		global $edgeArr;
		foreach ($nArr as $i => $v) {
			foreach ($v as $ii => $vv) {
				$edgeArr[$i][$ii]['edgeWeight']=$vv;
			}
		}
	}

	function routeList(){
		// global $edgeArr;
		// $out='';
		// foreach ($edgeArr as $i => $v) {
		// 	foreach ($v as $ii => $vv) {
		// 		$out.=$edgeArr[$i][$ii]=$vv;
		// 	}
		// }
	}

	function minVal($value='')
	{
		# code...
	}

	function dijkstra($start,$end){ // start = 0 || end = 3
		global $nn,$nodeArr,$edgeArr,$nodeSolu,$nodeWeight;
		$tempSolutionRow=array();
		$out='';
		$curWeight=0;

		// for($i=0; $i<($nn*$nn); $i++){
		$counter=0;
		$startNode=$start;

		while($counter<$nn){
			$nodeArr[$startNode]['isVisited']=true;

			foreach($edgeArr[$startNode] as $i => $v){
				if($v['edgeWeight']!=99){
					$prevWeight = $v['prevWeight']; // 0
					$edgeWeight = $v['edgeWeight']; // 30
					$accuWeight = $prevWeight+$edgeWeight; // 30
					
					$v['accuWeight']=$accuWeight;
					$tempSolutionRow[$j]=$accuWeight; // index => jarak akumulatif
				};
			}
			$shortest=min($tempSolutionRow); // jarak akumulatif terpendek
			$shortestIndex=array_search($shortest,$tempSolutionRow); // index jarak terpendek
			$nodeArr[$shortestIndex]['isVisited']=true; 
			vd($nodeArr);
			
			$counter++;
		}
		vd($tempSolutionRow);

		// foreach ($edgeArr as $i => $v) { 
		// 	if($start==$end) $out='node asal sama dengan tujuan'; // cek : apa start == end
		// 	else{ // cek : jika tidak sama (beda node)
		// 		$startNode=$start;
		// 		$nodeArr[$start]['isVisited']=true;
		// 		$ruteArr=array();
				
		// 		foreach ($v as $ii => $vv) {  // loop column
		// 			if($vv['weight']!=99) {
		// 				$prevWeight=($i==$start?0:$vv['prevWeight']);
		// 				$vv['weight']+=$prevWeight;
		// 				$nodeArr[$i]['isVisited']=true;
		// 				$ruteArr[$i][]=$ii;
		// 				$vv['prevWeight']=$vv['weight'];
		// 			}
		// 		}
		// 	}
		// }echo $out;	
	}

	// $weightArr=array();
	// 	$edgeWeight[0][1] = 5;
	// 	$edgeWeight[0][3] = 11;
	// 	$edgeWeight[0][4] = 2;

	// 	$edgeWeight[1][2] = 4;
	// 	$edgeWeight[1][3] = 5;

	// 	$edgeWeight[2][3] = 8;
	// 	$edgeWeight[2][3] = 8;

	// 	$edgeWeight[4][3] = 9;
	
	// $nn=5;
	// initMatrix($nn);
	// echo 'init matrix '.$nn.' x '.$nn.'<br>';
	// 	vwMatrix(); 
	
	// inputNode($weightArr);
	// echo '<br>update matrix : <br>';
	// 	vwMatrix(); 

	// echo '<br>input source : 0';
	// echo '<br>input tujuan : 4';
	// echo '<br>hasilnya <br>';
	// 	dijkstra(0,3);
		// // vd($nodeSolu);
		// echo 'visited: ';
		// // print_r($nodeVisited);
		// echo '<br>solu: ';
		// print_r($nodeSolu);
		// echo '<br>weight: ';
		// print_r($nodeWeight);

		/*// node
		{
			'node':[{
				'label':'sby',
				'isVisited':false,
			},{
				'label':'',
				'isVisited':true,
			}]
		};
		// edge
		{
			'edge':[{
				'weight':7,
				'curNode':1,
				'prevNode':0,
			},{
				'weight':11,
				'curNode':1,
				'prevNode':0,
			}]
		};*/

0 30 25 0 0 0 0 
0 0 0 0 10 05 0 
0 0 0 05 0 0 0 
0 0 0 0 05 0 0 
0 0 0 0 0 0 05 
0 0 0 0 0 0 10 
0 0 0 0 0 0 0 


there has been error unable to write inside TEMP environtment  variable path 