<?php
	include 'db/db_config.php';
    $id = $_GET['id'];
    
	if($db->delete('admin')->where('id='.$id)->count() == 1){
		header('location:tampil_admin.php');
	} else {
		header('location:tampil_admin.php?error_msg=delete_failed');
	}
?>