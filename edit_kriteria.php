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
                      <form method="post" action="update_kriteria.php" enctype="multipart/form-data">
                          <?php if (!empty($_GET['error_msg'])): ?>
                              <div class="alert alert-danger">
                                  <?= $_GET['error_msg']; ?>
                              </div>
                          <?php endif ?>
                          <?php foreach ($db->select('*','kriteria')->where('id_kriteria='.$_GET['id'])->get() as $data): ?>
                              <input type="hidden" name="id" value="<?= $data[0]?>">
                              <div class="form-group">
                                  <label for="nama">Nama Kriteria</label>
                                  <input type="text" class="form-control" id="kriteria" name="kriteria" value="<?= $data['kriteria']?>">
                              </div>
                              <div class="form-group">
                                  <label>Bobot</label>
                                  <input type="number" name="bobot" class="form-control bobot" value="<?= $data['bobot']?>" pattern="^[0-9\.\-\/]+$">
                              </div>
                              <div class="form-group">
                                  <label>Type</label>
                                  <select class="form-control" name="type">
                                      <option value="Cost" <?php if($data['type']=='Cost'){ echo 'selected'; }?>>Cost</option>
                                      <option value="Benefit" <?php if($data['type']=='Benefit'){ echo 'selected'; }?>>Benefit</option>
                                  </select>
                              </div>  
                          <?php endforeach ?>
                          
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