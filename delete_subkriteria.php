<?php
	include 'db/db_config.php';
    $id = $_GET['id'];
    
	if($db->delete('sub_kriteria')->where('id_subkriteria='.$id)->count() == 1){
		header('location:tampil_subkriteria.php');
	} else {
		header('location:tampil_subkriteria.php?error_msg=delete_failed');
	}
?>