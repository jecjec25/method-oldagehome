<!DOCTYPE html>
<html lang="en">

<head>
  
  <title>Old Age Home Management System || Login Page</title>
  <!-- base:css -->
  <link rel="stylesheet" href="login/vendors/typicons/typicons.css">
  <link rel="stylesheet" href="login/vendors/css/vendor.bundle.base.css">
 
  <link rel="stylesheet" href="login/css/vertical-layout-light/style.css">
  <!-- endinject -->
  
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <h3 style="color:seagreen;">OAHMS</h3>
              <h4>Hello! let's get started</h4>
              <h6 class="font-weight-light">Register</h6>
              <form class="pt-3" action="UserController/register" method="post" >
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg border-left-0" id="LastName" placeholder="Lastname" name="lastname">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg border-left-0" id="FirstName" placeholder="First Name" name="firstname">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg border-left-0" id="Address" placeholder="Address" name="address">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg border-left-0" id="username" placeholder="username" name="username" >
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg border-left-0" id="email" placeholder="email" name="email" >
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg border-left-0" id="contactnum" placeholder="Contact Number" name="contactnum" >
                </div>

                <div class="form-group">
                  <input type="password" class="form-control form-control-lg border-left-0" id="password" placeholder="Password" name="password" required="true" >
                </div>
                <div class="mt-3">
                  <button type="submit" class="btn btn-block btn-info btn-lg font-weight-medium auth-form-btn" name="submit">REGISTER</button>
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                       <input type="checkbox" class="form-check-input" id="remember" name="remember">
                      Keep me signed in
                    </label>
                  </div>
                  <a href="forgot-password.php" class="auth-link text-black">Forgot password?</a>
                </div>
               <a href="../index.php" class="auth-link text-black">Home Page!!!</a>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- base:js -->
  <script src="login/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="login/js/off-canvas.js"></script>
  <script src="login/js/hoverable-collapse.js"></script>
  <script src="login/js/template.js"></script>
  <script src="login/js/settings.js"></script>
  <script src="login/js/todolist.js"></script>
  <!-- endinject -->
</body>

</html>