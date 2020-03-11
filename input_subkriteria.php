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
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            <br/>  
              <div class="panel panel-default">
                  <div class="panel-heading">
                    Form Sub Kriteria
                  </div>
                  <div class="panel-body">
                      <form method="post" action="insert_subkriteria.php" enctype="multipart/form-data">
                          <?php if (!empty($_GET['error_msg'])): ?>
                              <div class="alert alert-danger">
                                  <?= $_GET['error_msg']; ?>
                              </div>
                          <?php endif ?>                      
                          <div class="form-group">
                              <label for="nama">Nama Sub Kriteria</label>
                              <input required type="text" class="form-control" id="subkriteria" name="subkriteria">
                          </div>
                          <div class="form-group">
                                <label for="nama">Nama Kriteria</label>
                                <select required class="form-control" name="id_kriteria">
                                <?php  foreach ($db->select('*','kriteria')->get() as $val): ?> 
                                <option value="<?= $val['id_kriteria']?>"><?= $val['kriteria'] ?></option>
                                <?php endforeach ?>
                                </select>
                          </div>
                          <div class="form-group">
                              <label>Nilai</label>
                              <input required type="number" name="nilai" class="form-control " pattern="^[0-9\.\-\/]+$">
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

<?php include 'footer.php';?>
<script type="text/javascript">
    $(function(){
        $("#sk").addClass('menu-top-active');
    });
</script>