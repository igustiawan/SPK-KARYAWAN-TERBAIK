<?php
	include 'db/db_config.php';
	extract($_POST);
	$ids = array();
	foreach($_POST['place'] as $val)
	{
	$ids[] = (int) $val;
	}
	echo $ids = implode(',', $ids);
	
	if($db->insert('hasil_tpa',"'','$id_calon_kr',$ids")->count() == 1){
		header('location:tampil_tpa.php');
	}
	
?>