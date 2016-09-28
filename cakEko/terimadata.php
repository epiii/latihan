<?php 
	/*
	 url example : 
		 send 			>> http://domain.com?mode=kirim&value=999
		 read all 		>> http://domain.com?mode=terimaAll
		 read currently >> http://domain.com?mode=terimaCurr
	*/
	require"dbconnect.php";
	$out='';
	if(isset($_GET['mode']=='kirim')){ // insert 
		$sql='INSERT INTO  tb_anu set val='.$_GET['value'];
		$exe=mysqli_query($sql);
		$out=array('msg'=>'send_mode',($exe?'insert_successfuly':'insert_error'));
	}elseif($_GET['mode']=='terimaAll'){ //read all
		$sql='SELECT * from tb_anu ';
		$exe=mysqli_query($sql);
		$dtArr=array();
		while($rec=mysqli_fetch_assoc()){
			$dtArr[]=array(
				'id'        =>$rec['id'],
				'val'       =>$rec['val'],
				'timestamp' =>$rec['timestamp'],
			);	
		}$out=array('msg'=>'get_mode','data'=>$dtArr);
	}elseif($_GET['mode']=='terimaCur'){ //read current (last or new data)
		$sql     ='SELECT * from tb_anu LIMIT 1 order by desc';
		$exe     =mysqli_query($sql);
		$rec     =mysqli_fetch_assoc($exe);
		$out =array(
			'msg'       =>'get_mode',
			'id'        =>$rec['id'],
			'val'       =>$rec['val'],
			'timestamp' =>$rec['timestamp'],
		);
	}else $out=array('msg'=>'invalid_parameter');

	echo json_encode($out);
?>
