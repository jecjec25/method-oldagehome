<!DOCTYPE html>
<html lang="en">

<head>
  
  <title>Admin Register</title>

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
              <h6 class="font-weight-light">Register</h6>
              <form class="pt-3" action="<?= base_url('store'); ?>" method="post" id="tbladmin" >
                <div class="form-group">
                <?php if(isset($validation)):?>
                 <small class="text-danger"><?= $validation->getError('LastName') ?></small>
                <?php endif;?>
                  <input type="text" class="form-control form-control-lg border-left-2" placeholder="Lastname" name="LastName" >
                </div>  
                <div class="form-group">
                <?php if(isset($validation)):?>
                <small class="text-danger"><?= $validation->getError('FirstName') ?></small>
                <?php endif;?>
                  <input type="text" class="form-control form-control-lg border-left-2" placeholder="First Name" name="FirstName">
                </div>
                <div class="form-group">
                <?php if(isset($validation)):?>
                <small class="text-danger"><?= $validation->getError('Username') ?></small>
                <?php endif;?>
                  <input type="text" class="form-control form-control-lg border-left-2" placeholder="Username" name="Username" >
                </div>
                <div class="form-group">
                <?php if(isset($validation)):?>
                <small class="text-danger"><?= $validation->getError('Email') ?></small>
                <?php endif;?>
                  <input type="text" class="form-control form-control-lg border-left-2" placeholder="Email" name="Email" >
                </div>
                <div class="form-group">
                <?php if(isset($validation)):?>
                <small class="text-danger"><?= $validation->getError('ContactNumber') ?></small>
                <?php endif;?>
                  <input type="text" class="form-control form-control-lg border-left-2"  placeholder="Contact Number" name="ContactNumber" >
                </div>
                <div class="form-group">
                  <input type="date" class="form-control form-control-lg border-left-2"  placeholder="Birth Day" name="birthday" >
                </div>
                <div class="form-group">
                <?php if(isset($validation)):?>
                <small class="text-danger"><?= $validation->getError('Password') ?></small>
                <?php endif;?>
                  <input type="password" class="form-control form-control-lg border-left-2" placeholder="Password" name="Password" required="true" >
              </div>
                <div class="mt-3">
                  <button type="submit" class="btn btn-block btn-info btn-lg font-weight-medium auth-form-btn" name="submit">REGISTER</button>
                </div>
              </form>
              <div class="mt-3">
                <p>Already have an account? <a href="/signin">Login here.</a>.</p>
              </div>
              <div class="mt-3">
               <a href="../index.php" class="auth-link text-black">Home Page!!!</a>
              </div>
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