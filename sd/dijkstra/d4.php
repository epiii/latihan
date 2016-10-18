<?php
	include '../../vd.php';
	
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
				 $edgeArr[$i][$j]['weight']=99;
			}
		}
	}
	
	function vwMatrix(){
		global $edgeArr;
		$out='';
		foreach ($edgeArr as $i => $v) {
			foreach ($v as $ii => $vv) {
				if($vv['weight']==99)  $out.='~ &nbsp';
				else $out.=(strlen($vv['weight'])==1?'0'.$vv['weight']:$vv['weight']).'&nbsp';
			}$out.='<br>';
		}echo $out;	
	}

	function inputNode($nArr){
		global $edgeArr;
		foreach ($nArr as $i => $v) {
			foreach ($v as $ii => $vv) {
				$edgeArr[$i][$ii]['weight']=$vv;
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

	function dijkstra($start,$end){ // start = 0 || end = 3
		global $nodeArr,$edgeArr,$nodeSolu,$nodeWeight;
		$out='';
		$curWeight=0;

		foreach ($edgeArr as $i => $v) { 
			if($start==$end) $out='node sama dengan tujuan'; // cek : apa start == end
			else{ // cek : jika tidak sama (beda node)
				if($i==$end) { //jika iterasi node ke -i = node tujuan 
					$nodeSolu[]=$i;
					break;
				}else{ // jika 
					if($nodeArr[$i]['isVisited']){ // tru(sudah dikunjungi)
						continue;
					}else{ // false (belum dikunjungi)
						$startNode=$start;
						$nodeArr[$start]['isVisited']=true;
						$ruteArr=array();
						
						foreach ($v as $ii => $vv) {  // loop column
							if($vv['weight']!=99) {
								$prevWeight=($i==$start?0:$vv['prevWeight']);
								$vv['weight']+=$prevWeight;
								$nodeArr[$i]['isVisited']=true;
								$ruteArr[$i][]=$ii;
								$vv['prevWeight']=$vv['weight'];
							}
						}
						vd($v);
						// vd($v[$i]);
						// $minVal   = min($edgeArr[$i]); 	// edge terkecil (val)
						// $minIndex = array_search($minVal,$vv['weight']); // edge terkeil (index)
						
						// $startNode  = $minIndex;	// start node yang baru (index) 
						// $prevWeight = $minVal;		// start node yg baru (weight accumulation)
						
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
		// print_r($nodeVisited);
		echo '<br>solu: ';
		print_r($nodeSolu);
		echo '<br>weight: ';
		print_r($nodeWeight);

vd($edgeArr);
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
