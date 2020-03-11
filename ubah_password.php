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
                    Form Ubah Password
                  </div>
                  <div class="panel-body">
                      <form method="post" action="update_password.php" enctype="multipart/form-data">
                          <?php if (!empty($_GET['error_msg'])): ?>
                              <div class="alert alert-danger">
                                  <?= $_GET['error_msg']; ?>
                              </div>
                          <?php endif ?>  
                          <div class="form-group">
								<label for="inputEmail">New Password</label>
								<input required type="password" name="np" class="form-control" id="inputEmail" placeholder="New Password">
							</div>
							<div class="form-group">
								<label  for="inputPassword">Re-type Password</label>
								<input required type="password" name="rp" class="form-control" id="inputPassword" placeholder="Re-type Password">
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