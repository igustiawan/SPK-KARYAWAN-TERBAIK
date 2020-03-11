<?php
	include 'db/db_config.php';
    extract($_POST);
    
    //echo $id;

	if($db->update('admin',"nama='$nama',alamat='$alamat',telepon='$telepon',email='$email'")->where("id='$id'")->count()==1){
		header('location:tampil_admin.php');
	} else {
		//echo "update gagal";
		header('location:tampil_admin.php');
	}
?>