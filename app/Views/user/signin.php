<!DOCTYPE html>
<html lang="en">

<head>
  
  <title>Senior Care Management System || Login Page</title>
  <link rel="stylesheet" href="login/vendors/typicons/typicons.css">
  <link rel="stylesheet" href="login/vendors/css/vendor.bundle.base.css">
 
  <link rel="stylesheet" href="login/css/vertical-layout-light/style.css">
  
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <h3 style="color:seagreen;">Senior Care</h3>
              <h4>Hello! let's get started</h4>
              <h6 class="font-weight-light">Sign in to continue.</h6>
              <?php if(session()->getFlashdata('msg')):?>
                <div class="alert alert-warning">
                  <?= session()->getFlashdata('msg')?>
                </div>
                <?php endif;?>
              <form class="pt-3" action="<?php echo base_url(); ?>/SigninController/loginAuth" method="post" id="tbladmin">
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg border-left-0" id="Username" placeholder="Username" name="Username" value="<?= ('Username') ?>">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg border-left-0" id="password" placeholder="Password" name="password" required="true" value="">
                </div>
                <div class="mt-3" action="/dashboard">
                  <button type="submit" class="btn btn-block btn-info btn-lg font-weight-medium auth-form-btn" name="submit">LOGIN</button>
                </div>
                </form> 
                <form action="/signup">
                <div class="mt-3">
                  <button type="submit" class="btn btn-block btn-info btn-lg font-weight-medium auth-form-btn btn-success" name="submit">REGISTER</button>
                </div>
                </form>
                <div class="my-2 d-flex justify-content-between align-items-center">
                </div>
               <a href="../index.php" class="auth-link text-black">Home Page!!!</a>
              
            </div>
          </div>
        </div>
      </div>
    </div>
              </div>
  <script src="login/vendors/js/vendor.bundle.base.js"></script>

  <script src="login/js/off-canvas.js"></script>
  <script src="login/js/hoverable-collapse.js"></script>
  <script src="login/js/template.js"></script>
  <script src="login/js/settings.js"></script>
  <script src="login/js/todolist.js"></script>
</body>

</html>
