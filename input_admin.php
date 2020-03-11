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
                    Form Admin
                  </div>
                  <div class="panel-body">
                      <form method="post" action="insert_admin.php" enctype="multipart/form-data">
                          <?php if (!empty($_GET['error_msg'])): ?>
                              <div class="alert alert-danger">
                                  <?= $_GET['error_msg']; ?>
                              </div>
                          <?php endif ?>                      
                          <div class="form-group">
                              <label for="nama">Nama Lengkap</label>
                              <input required type="text" class="form-control" id="nama" name="nama">
                          </div>
                          <div class="form-group">
                              <label for="nama">Alamat </label>
                              <Textarea required type="text" class="form-control" id="alamat" name="alamat"></Textarea>
                          </div>
                          <div class="form-group">
                              <label>Telepon</label>
                              <input required type="number" name="telepon" class="form-control " pattern="^[0-9\.\-\/]+$">
                          </div>
                          <div class="form-group">
                              <label for="nama">Email </label>
                              <input required type="text" class="form-control" id="email" name="email">
                          </div>
                          <div class="form-group">
                              <label for="nama">Username</label>
                              <input required type="text" class="form-control" id="username" name="username">
                          </div>
                          <div class="form-group">
                              <label for="nama">Password</label>
                              <input required type="password" class="form-control" id="password" name="password">
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