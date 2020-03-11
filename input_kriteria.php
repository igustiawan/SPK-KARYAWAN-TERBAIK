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
                    Form Kriteria
                  </div>
                  <div class="panel-body">
                      <form method="post" action="insert_kriteria.php" enctype="multipart/form-data">
                          <?php if (!empty($_GET['error_msg'])): ?>
                              <div class="alert alert-danger">
                                  <?= $_GET['error_msg']; ?>
                              </div>
                          <?php endif ?>
                          <div class="form-group">
                              <label for="nama">Nama Kriteria</label>
                              <input type="text" required class="form-control" id="kriteria" name="kriteria">
                          </div>
                          <div class="form-group">
                              <label>Bobot</label>
                              <?php 
                                //   $n = 0; 
                                //   foreach ($db->select('bobot','kriteria')->get() as $k){
                                //      $n += $k['bobot'];
                                //   }
                                //   $h = 1000-$n;
                               ?>
                              <input type="number" required name="bobot" class="form-control bobot " pattern="^[0-9\.\-\/]+$" value="<?= $h ?>">
                          </div>
                          <div class="form-group">
                              <label>Type</label>
                              <select class="form-control" name="type">
                                    <option value="Cost">Cost</option>
                                    <option value="Benefit">Benefit</option>
                                </select>
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
        $("#ds").addClass('menu-top-active');
    });
</script>