<?php
	include 'db/db_config.php';
	extract($_POST);
	$newpassword = md5($password);
	if($db->insert('admin',"'','$nama','$alamat','$telepon','$email','$username','$newpassword'")->count() == 1){
		header('location:tampil_admin.php');
	}
?>