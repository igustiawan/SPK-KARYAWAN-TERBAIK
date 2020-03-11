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
                      <form method="post" action="update_subkriteria.php" enctype="multipart/form-data">
                          <?php if (!empty($_GET['error_msg'])): ?>
                              <div class="alert alert-danger">
                                  <?= $_GET['error_msg']; ?>
                              </div>
                          <?php endif ?>
                          <?php foreach ($db->select('*','sub_kriteria')->where('id_subkriteria='.$_GET['id'])->get() as $data): ?>
                              <input type="hidden" name="id" value="<?= $data[0]?>">
                                <div class="form-group">
                                    <label for="nama">Nama Sub Kriteria</label>
                                    <input type="text" readonly class="form-control" id="subkriteria" name="subkriteria" value="<?= $data['subkriteria']?>">
                                </div>
                                <div class="form-group">
                                    <label for="nama">Nama Kriteria</label>
                                    <select required class="form-control" id="id_kriteria" name="id_kriteria">
                                        <?php  foreach ($db->select('*','kriteria')->get() as $val): ?> 
                                        <option value="<?php echo $val['id_kriteria']; ?>"<?php if($data['id_kriteria'] == $val['id_kriteria']) { echo ' selected="selected"'; } ?>>
                                        <?= $val['kriteria'] ?></option>
                                        <?php endforeach ?>
                                    </select>   
                                </div>
                                <div class="form-group">
                                    <label>Nilai</label>
                                    <input type="number" name="nilai" id="nilai" class="form-control " value="<?= $data['nilai']?>" pattern="^[0-9\.\-\/]+$">
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
        $("#sk").addClass('menu-top-active');
    });
</script>