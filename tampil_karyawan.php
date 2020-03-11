<?php
    session_start();
    error_reporting(0);
    if(empty($_SESSION['id'])){
        header('location:login.php?error_login=1');
    }
    function hitung_lama_bergabung($tgl_lahir)
    {
        $today = date('Y-m-d');
        $now = time();
        list($thn, $bln, $tgl) = explode('-',$tgl_lahir);
        $time_lahir = mktime(0,0,0,$bln, $tgl, $thn);

        $selisih = $now - $time_lahir;

        $tahun = floor($selisih/(60*60*24*365));
        $bulan = round(($selisih % (60*60*24*365) ) / (60*60*24*30));

        return $tahun.' tahun '.$bulan.' bulan';

    }
?>
<?php include 'header.php';?>
<?php include 'menu.php';?>
<div class="content-wrapper">
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="page-head-line">Master Data Karyawan</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <?php if (!empty($_GET['error_msg'])): ?>
                      <div class="alert alert-danger">
                          <?= $_GET['error_msg']; ?>
                      </div>
                    <?php endif ?>
                </div>
            </div>  
            <div class="row">
                <div><a href="input_karyawan.php" class="btn btn-info">Tambah Data</a></div>
                <br>
                <div class="table-responsive">
                    <table id="example1" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>NIK</th>
                                <th>Nama</th>
                                <th>Jenis Kelamin</th>
                                <th>Alamat</th>
                                <th>Telepon</th>
                                <th>Foto</th>
                                <th>Tempat lahir</th>
                                <th>Tanggal lahir</th>
                                <th>Pendidikan</th>
                                <th>Jabatan</th>
                                <th>Tgl Bergabung</th>
                                <th>Lama Bergabung</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; foreach($db->select('*','karyawan')->get() as $data): ?>
                            <tr>
                                <td><?= $data['NIK'];?></td>
                                <td><?= $data['nama']?></td>
                                <td><?= $data['jeniskelamin']?></td>
                                <td><?= $data['alamat']?></td>
                                <td><?= $data['telepon']?></td>
                                <td>
                                    <?php if($data['foto'] != ""): ?>
                                        <img src="assets/foto_calon_karyawan/<?php echo $data['foto']; ?>" class="img-thumbnail" width="75px" height="70px">
                                        <?php else: ?>
                                        <img src="assets/foto_calon_karyawan/image_not_available.jpg" class="img-thumbnail" width="75px" height="70px">
                                    <?php endif; ?>
                                </td>     
                                <td><?= $data['TempatLahir']?></td>      
                                <td><?= $data['ttl']?></td>
                                <td><?= $data['PendidikanTerakhir']?></td>
                                <td><?= $data['Jabatan']?></td>
                                <td><?= $data['TglBergabung']?></td>
                                <td><?php echo hitung_lama_bergabung($data['TglBergabung'])?>
                                <td>
                                    <a class="btn btn-warning" href="edit_karyawan.php?id=<?php echo $data[0]?>">Edit</a>
                                    <a class="btn btn-danger"  onclick="return confirm('Yakin Hapus?')" href="delete_karyawan.php?id=<?php echo $data[0]?>">Hapus</a>
                                </td>
                            </tr>
                            <?php $no++; endforeach; ?>
                        </tbody>
                    </table>    
                </div>
            </div>
        </div>
    </div>
    <!-- CONTENT-WRAPPER SECTION END-->
</div>
<?php include 'footer.php'; ?>
<script type="text/javascript">
    $(function(){
        $("#ck").addClass('menu-top-active');
    });
    
</script>
<script type="text/javascript">
            $(function() {
                $('#example1').dataTable();
            });
        </script>
