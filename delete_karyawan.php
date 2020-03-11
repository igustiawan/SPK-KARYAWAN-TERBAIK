<?php
	include 'db/db_config.php';
	$id = $_GET['id'];
	if($db->delete('karyawan')->where('id_calon_kr='.$id)->count() == 1){
		header('location:tampil_karyawan.php');
	} else {
		header('location:tampil_karyawan.php?error_msg=error_delete');
	}
?>