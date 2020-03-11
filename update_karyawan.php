<?php
	include 'db/db_config.php';
	extract($_POST);
	if(isset($_FILES)){
		$target_dir = "assets/foto_calon_karyawan/";
		$file_name = $_FILES['foto']['name'];
		$target_file = $target_dir.basename($_FILES['foto']['name']);
		$file_type = $_FILES['foto']['type'];
		$error = $_FILES["foto"] ["error"];
		// if(empty($file_type)){
		// 	echo $file_type = substr($file_name, -3);
		// 	if($file_type=='jpg' || $file_type=='gif' || $file_type=='jpeg'){
		// 		$file_type = 'image/'.$file_type;
		// 	} else {
		// 		header('location:edit_karyawan.php?error_msg=error_type&id='.$id_calon_kr);
		// 	}
		// }
		
		if ($error > 0)
		{
			$db->update('karyawan',"nama='$nama',ttl='$ttl',skill='$skill',pengalaman='$pengalaman',
									TempatLahir='$tempatlahir',PendidikanTerakhir='$pendidikan',
									alamat='$alamat',Jabatan='$jabatan',TglBergabung='$ttb',jeniskelamin='$jeniskelamin',telepon='$telepon'")->where("id_calon_kr='$id_calon_kr'")->count();
			header('location:tampil_karyawan.php');		
		}else
		{
			if($_FILES['foto']['size'] < 10000000){
				//move_uploaded_file($_FILES['foto']['tmp_name'], $target_file);
				move_uploaded_file($_FILES["foto"]["tmp_name"],$target_dir. $_FILES["foto"]["name"]);
				if($db->update('karyawan',"nama='$nama',foto='$file_name',ttl='$ttl',skill='$skill',pengalaman='$pengalaman',
											TempatLahir='$tempatlahir',PendidikanTerakhir='$pendidikan',
											alamat='$alamat',Jabatan='$jabatan',TglBergabung='$ttb',jeniskelamin='$jeniskelamin',telepon='$telepon'")->where("id_calon_kr='$id_calon_kr'")->count()==1){
					header('location:tampil_karyawan.php');
					//echo "A";
				} else {
					header('location:edit_karyawan.php?error_msg=update_gagal&id='.$id_calon_kr);
				}
				} else {
					header('location:edit_karyawan.php?error_msg=error_ukuran&id='.$id_calon_kr);
				} 
			
		}		
	} else{
		if($db->update('karyawan',"nama='$nama',ttl='$ttl',skill='$skill',pengalaman='$pengalaman',
								TempatLahir='$tempatlahir',PendidikanTerakhir='$pendidikan',
								alamat='$alamat',Jabatan='$jabatan',TglBergabung='$ttb',jeniskelamin='$jeniskelamin',telepon='$telepon'")->where("id_calon_kr='$id_calon_kr'")->count()==1){
			header('location:tampil_karyawan.php');
		} else {
			header('location:edit_karyawan.php?error_msg=update_gagal&id='.$id_calon_kr);
		}
	}		
?>