<?php
	include 'db/db_config.php';
	extract($_POST);
	$crt_tmp = explode(' ',$kriteria);
	// $crt = implode('_', $crt_tmp);
	$crt = str_replace(str_split('\\/:*?"<>|+-()'), '', implode('_', $crt_tmp));
	
	// echo $crt;
	if($db->insert('kriteria',"'','$crt','$bobot','$type'")->count() == 1){
		$db->alter('hasil_tpa','add column',"$crt",'float(10,2)')->get();
		header('location:tampil_kriteria.php');
	}
?>