<?php
	include 'db/db_config.php';
	extract($_POST);
	//print_r($_POST);
	$n = 0;
	foreach ($db->select('kriteria','kriteria')->get() as $c) {
		 $k[$n] = $c['kriteria'];
		 $n++;
	}
	$data = [];
	for ($i=0; $i < count($kriteria) ; $i++) { 
		array_push($data,$k[$i].'='.$kriteria[$i]);
	}
	$data = implode(',', $data);
	if($db->update('hasil_tpa',$data)->where("id_calon_kr='$id'")->count()==1){
		header('location:tampil_tpa.php');
	} else {
		echo "update gagal";
	}
?>