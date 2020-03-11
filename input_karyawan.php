<?php
    session_start();
    error_reporting(0);
    if(empty($_SESSION['id'])){
        header('location:login.php?error_login=1');
    }
?>
<?php include 'header.php';?>
<?php include 'menu.php';?>
<div class="content-wrapper">
<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            <br/>  
              <div class="panel panel-default">
                  <div class="panel-heading">
                  Form Karyawan
                  </div>
                  <div class="panel-body">
                      <form method="post" action="insert_karyawan.php" enctype="multipart/form-data">
                          <?php if (!empty($_GET['error_msg'])): ?>
                              <div class="alert alert-danger">
                                  <?= $_GET['error_msg']; ?>
                              </div>
                          <?php endif ?>
                          <div class="form-group">
                              <label for="nama">NIK</label>
                              <input type="text" required class="form-control" id="nik" name="nik">
                          </div>
                          <div class="form-group">
                              <label for="nama">Nama Karyawan</label>
                              <input type="text" required rows="2" class="form-control" id="nama" name="nama">
                          </div>
                          <div class="form-group">
                              <label for="jeniskelamin">Jenis Kelamin</label>
                                <select required class="form-control" ID="jeniskelamin" name="jeniskelamin">
                                <option value="">-PILIH JENIS KELAMIN-</option>
                                <option value="Pria">Pria</option>
                                <option value="Wanita">Wanita</option>
                                </select>
                          </div>
                          <div class="form-group">
                              <label for="nama">Alamat</label>
                              <textarea type="text" required class="form-control" id="alamat" name="alamat"></textarea>
                          </div>
                          <div class="form-group">
                              <label for="nama">Telepon</label>
                              <input type="number" required class="form-control" id="telepon" name="telepon"/>
                          </div>
                          <div class="form-group">
                              <label for="ttl">Tanggal / Bulan / Tahun Lahir</label>
                              <input type="date" required class="form-control" id="ttl" name="ttl">
                          </div>
                          <div class="form-group">
                              <label for="nama">Tempat Lahir</label>
                              <input type="text" required class="form-control" id="tempatlahir" name="tempatlahir">
                          </div>
                          <div class="form-group">
                              <label for="nama">Pendidikan Terakhir</label>
                                <select required class="form-control" ID="pendidikan" name="pendidikan">
                                <option value="">-PILIH PENDIDIKAN-</option>
                                <option value="SD">SD</option>
                                <option value="SMA">SMA</option>
                                <option value="D3">D3</option>
                                <option value="S1">S1</option>
                                </select>
                          </div>
                          <div class="form-group">
                              <label for="nama">Jabatan</label>
                              <input required type="text" class="form-control" id="jabatan" name="jabatan">
                          </div>
                          <div class="form-group">
                              <label for="ttl">Tanggal Bergabung</label>
                              <input required type="date" class="form-control" id="ttb" name="ttb">
                          </div>
                          <div class="form-group">
                              <label for="foto">Foto</label>
                              <input type="file" id="foto" name="foto" />
                          </div>
                          <div class="form-group">
                              <label for="skill">Skill</label>
                              <input type="text" class="form-control" id="skill" name="skill">
                          </div>
                          <div class="form-group">
                              <label for="nama">Pengalaman</label>
                              <textarea class="form-control" rows="8" name="pengalaman"></textarea>
                          </div>
                          <div class="form-group">
                              <button class="btn btn-primary">Simpan</button>
                          </div>
                      </form>
                  </div>
              </div>
            </div>
        </div>
        </div>
    </div>
</div>
</div>
<?php include 'footer.php';?>
<script type="text/javascript">
    $(function(){
        $("#ck").addClass('menu-top-active');
    });
</script>