<!DOCTYPE html>
<html lang="en">

<head>
  
  <title>Admin Login</title>
  <link rel="stylesheet" href="login/vendors/typicons/typicons.css">
  <link rel="stylesheet" href="login/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="login/css/vertical-layout-light/style.css">
  
</head>
<style>
    .input-form {
        border-color: #ced4da; /* Kulay ng border */
        transition: border-color 0.3s, box-shadow 0.3s; /* Smooth na transition */
    }

    .password:hover {
        border-color: #007bff; /* Asul na kulay */
        box-shadow: 0 0 10px #007bff;
    }
</style>
<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <!-- sa register ito na message -->
            <?php if(session()->getFlashdata('success')): ?>
                  <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
              <?php endif; ?>
            <!-- sa register ito na message -->
            <!-- sa login ito na message -->
            <?php if(session()->getFlashdata('msg')):?>
                <div class="alert alert-danger">
                  <?= session()->getFlashdata('msg')?>
                </div>
                <?php endif;?>
            <!-- sa login ito na message-->
              <h3 style="color:seagreen;">Senior Care</h3>
              <h4>Hello! Let's get started</h4>
              <h6 class="font-weight-light">Login to continue.</h6>
              <br>
              <form action="<?= base_url('/UserController/loginAuth')?>" method="post">
              <div class="form-group">
              <label for="Email">Email</label>
                <input type="text" class="form-control form-control-lg border-left-2" id="Email" placeholder="Email" name="Email">
              </div>
              <div class="form-group">
              <label for="Password">Password</label>
                <div class="input-group">
                  <input type="password" class="form-control form-control-lg border-left-2 password" id="password" placeholder="Password" name="Password" required="true" >
                  <div class="input-group-append">
                        <button type="button" id="togglePassword" class="btn btn-outline-secondary"><i class="typcn typcn-eye"></i></button>
                  </div>
              </div>
                </div>
                <div class="mt-3">
                <button type="submit" class="btn btn-block btn-info btn-lg font-weight-medium auth-form-btn">LOGIN</button>
              </div>
              </form> 
              <div class="mt-3">
                <p>Don't have an account yet? <a href="/signup">Register here</a>.</p>
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
  <script>
    const togglePassword = document.getElementById('togglePassword');
    const password = document.getElementById('password');

    togglePassword.addEventListener('click', function() {
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        this.innerHTML = type === 'password' ? '<i class="typcn typcn-eye"></i>' : '<i class="typcn typcn-eye-outline"></i>';
    });
</script>

  <script src="login/vendors/js/vendor.bundle.base.js"></script>
  <script src="login/js/off-canvas.js"></script>
  <script src="login/js/hoverable-collapse.js"></script>
  <script src="login/js/template.js"></script>
  <script src="login/js/settings.js"></script>
  <script src="login/js/todolist.js"></script>
</body>

</html>