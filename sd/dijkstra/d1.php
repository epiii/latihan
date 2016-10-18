 <?php
 	include '../../vd.php';
	/**
	 *  Dijkstra's algorithm in PHP by zairwolf
	 * 
	 *  Demo: http://www.you4be.com/dijkstra_algorithm.php
	 *
	 *  Source: https://github.com/zairwolf/Algorithms/blob/master/dijkstra_algorithm.php
	 *
	 *  Author: Hai Zheng @ https://www.linkedin.com/in/zairwolf/
	 *
	 */
	//set the distance array
	$_distArr = array();

	$_distArr[1][2] = 7;
	$_distArr[1][3] = 9;
	$_distArr[1][6] = 14;

	$_distArr[2][1] = 7;
	$_distArr[2][3] = 10;
	$_distArr[2][4] = 15;

	$_distArr[3][1] = 9;
	$_distArr[3][2] = 10;
	$_distArr[3][4] = 11;
	$_distArr[3][6] = 2;

	$_distArr[4][2] = 15;
	$_distArr[4][3] = 11;
	$_distArr[4][5] = 6;

	$_distArr[5][4] = 6;
	$_distArr[5][6] = 9;

	$_distArr[6][1] = 14;
	$_distArr[6][3] = 2;
	$_distArr[6][5] = 9;

	//the start and the end
	$a = 1;	//titk asal
	$b = 5; //titik tujuan 

	//initialize the array for storing
	$Q = array();//the left nodes without the nearest path 	(tampung node)
	$S = array();//the nearest path with its parent and weight (tampung solusi)

	foreach(array_keys($_distArr) as $val) {
		$Q[$val] = 99999; 	// inisialisasi bobot semua matrix dg infinite 
	}
	$Q[$a]   = 0;		// inisialisasi  
	
	// $x=[3,5,1,7];
	// Array
	// (
	//     [0] => 3
	//     [1] => 5
	//     [2] => 1
	//     [3] => 7
	// )
	// vd($x);
	// vd(min($x)); value terkecil 1  
	// vd(max($x)); value terbesar 7 
// vd($_distArr);
	//start calculating
	$tampungMin=array();
    // $min = array_search(min($Q), $Q); // cari "value(bukan index)" terkecil dari array//the most min weight return index 
	// vd($min);
	while(!empty($Q)){ // loop hanya dijalankan 1x  
		$min = array_search(min($Q), $Q); // nilai minimum dari index array pertama ||cari "value(bukan index)" terkecil dari array//the most min weight return index 
	    array_push($tampungMin, $min); //epi
	    if($min == $b) 
	    	break; //jika node terkecil = node tujuan --> lewati   

	// 6 row | 
	// 18 data	    
	    foreach($_distArr[$min] as $key=>$val) { //loop untuk index ke-2 (kolom) 
	    	if(!empty($Q[$key]) && $Q[$min] + $val < $Q[$key]) { 
		        $Q[$key] = $Q[$min] + $val;
		        $S[$key] = array($min, $Q[$key]);
		    }
		}
		echo '<pre>';
			print_r($Q);
		echo'</pre>';
		// exit();
	    unset($Q[$min]); //hapus array beserta strukturnya 
	}
	// vd($xx);
	// vd($tampungMin);
	//list the path
	$path = array();
	$pos  = $b;
	while($pos != $a){
		$path[] = $pos;
		$pos    = $S[$pos][0];
	}
	$path[] = $a;
	$path   = array_reverse($path);

	//print result
	echo "<img src='http://www.you4be.com/dijkstra_algorithm.png'>";
	echo "<br />From $a to $b";
	echo "<br />The length is ".$S[$b][1];
	echo "<br />Path is ".implode('->', $path);



?>