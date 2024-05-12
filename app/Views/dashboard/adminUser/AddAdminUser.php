<!DOCTYPE html>
<html lang="en">

<head>
  
  <title>Admin Register</title>

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
              <h3 style="color:seagreen;">Senior Care</h3>
              <h4>Hello! Let's get started</h4>
              <h6 class="font-weight-light">Register Admin</h6>

              <?= session()->get('msg');?>
              <form class="pt-3" action="<?= base_url('adminRegister'); ?>" method="post" id="tbladmin" >
                <div class="form-group">
                <label for="Lastname">Lastname</label>
                <?php if(isset($validation)):?>
                 <small class="text-danger"><?= $validation->getError('LastName') ?></small>
                <?php endif;?>
                  <input type="text" class="form-control form-control-lg border-left-2" placeholder="Lastname" name="LastName" >
                </div>  
                <div class="form-group">
                <label for="Firstname">Firstname</label>
                <?php if(isset($validation)):?>
                <small class="text-danger"><?= $validation->getError('FirstName') ?></small>
                <?php endif;?>
                  <input type="text" class="form-control form-control-lg border-left-2" placeholder="First Name" name="FirstName">
                </div>
                <div class="form-group">
                <label for="Username">Username</label>
                <?php if(isset($validation)):?>
                <small class="text-danger"><?= $validation->getError('Username') ?></small>
                <?php endif;?>
                  <input type="text" class="form-control form-control-lg border-left-2" placeholder="Username" name="Username" >
                </div>
                <div class="form-group">
                <label for="Email">Email</label>
                <?php if(isset($validation)):?>
                <small class="text-danger"><?= $validation->getError('Email') ?></small>
                <?php endif;?>
                  <input type="text" class="form-control form-control-lg border-left-2" placeholder="Email" name="Email" >
                </div>
                <div class="form-group">
                <label for="ContactNo">Contact Number</label>
                <?php if(isset($validation)):?>
                <small class="text-danger"><?= $validation->getError('ContactNo') ?></small>
                <?php endif;?>
                  <input type="text" class="form-control form-control-lg border-left-2" id="ContactNo" placeholder="Contact Number" name="ContactNumber" >
                </div>
                <div class="form-group">
                <label for="birthday">Birthday</label>
                  <input type="date" class="form-control form-control-lg border-left-2"  placeholder="Birth Day" name="birthday" >
                </div>
                <div class="form-group">
                <label for="Password">Password</label>
                <?php if(isset($validation)):?>
                <small class="text-danger"><?= $validation->getError('Password') ?></small>
                <?php endif;?>
                <div class="input-group">
                  <input type="password" class="form-control form-control-lg border-left-2 password" id="password" placeholder="Password" name="Password" required="true" >
                  <div class="input-group-append">
                        <button type="button" id="togglePassword" class="btn btn-outline-secondary"><i class="typcn typcn-eye"></i></button>
                  </div>
              </div>
                </div>
                <div class="mt-3">
                  <button type="submit" class="btn btn-block btn-info btn-lg font-weight-medium auth-form-btn" name="submit" onclick="return confirm('Are you sure you want to submit this form?')">REGISTER</button>
                </div>
              </form>
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
			var inputs = document.getElementById("ContactNo");
        inputs.addEventListener("input", function(event) {
            this.value = this.value.replace(/[^0-9]/g, '');
        });
    </script>
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