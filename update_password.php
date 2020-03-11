<?php
	include 'db/db_config.php';
    extract($_POST);
    session_start();
    $iduser=$_SESSION['id'];
    $pwd = md5($rp);
    //echo $id;
    if($np!=$rp){
        header('location:ubah_password.php?error_msg=Password Dont Match');
    }
    else{
        if($db->update('admin',"password='$pwd'")->where("id='$iduser'")->count()==1){
            header('location:ubah_password.php?error_msg=Success for update password');
        } else {
            echo "update gagal";
        }

    }
	// if($db->update('sub_kriteria',"subkriteria='$subkriteria',id_kriteria='$id_kriteria',nilai='$nilai'")->where("id_subkriteria='$id'")->count()==1){
	// 	header('location:tampil_subkriteria.php');
	// } else {
	// 	//echo "update gagal";
	// 	header('location:tampil_subkriteria.php');
	// }
?>