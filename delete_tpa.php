<?php
	include 'db/db_config.php';
	$id = $_GET['id'];
	if($db->delete('hasil_tpa')->where('id_calon_kr='.$id)->count() == 1){
		header('location:tampil_tpa.php');
	} else {
		header('location:tampil_tpa.php?error_msg=error_delete');
	}
?>