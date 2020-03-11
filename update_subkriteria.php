<?php
	include 'db/db_config.php';
    extract($_POST);
    
    //echo $id;

	if($db->update('sub_kriteria',"subkriteria='$subkriteria',id_kriteria='$id_kriteria',nilai='$nilai'")->where("id_subkriteria='$id'")->count()==1){
		header('location:tampil_subkriteria.php');
	} else {
		//echo "update gagal";
		header('location:tampil_subkriteria.php');
	}
?>