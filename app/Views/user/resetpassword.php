<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reset Password</title>
  <link rel="icon" type="image/png" href="/LogoHapagAruga.png/">
  <link rel="stylesheet" href="login/vendors/typicons/typicons.css">
  <link rel="stylesheet" href="login/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="login/css/vertical-layout-light/style.css">
  <style>
    body {
      background-color: #f8f9fa;
    }

    .input-form {
      border-color: #ced4da;
      transition: border-color 0.3s, box-shadow 0.3s;
    }

    .password:hover {
      border-color: #007bff;
      box-shadow: 0 0 10px #007bff;
    }

    .text-danger {
      font-size: 0.9rem;
      color: red;
    }

    @media (max-width: 576px) {
      .auth-form-light {
        padding: 2rem;
      }

      .auth-link {
        font-size: 14px;
      }
    }
  </style>
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 col-md-6 col-sm-8 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <h3 style="color:seagreen;">Senior Care</h3>
              <h4>Hello! Let's get started</h4>
              <h6 class="font-weight-light">Reset Password</h6>
              <form class="pt-3" action="<?= base_url('PasswordAuth'); ?>" method="post" id="tbladmin" onsubmit="return confirmPasswordMatch()">
                <div class="form-group">
                  <label for="password">Password</label>
                  <div class="input-group">
                    <input type="password" class="form-control form-control-lg border-left-2 password" id="password" placeholder="Password" name="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                    <div class="input-group-append">
                      <button type="button" id="togglePassword" class="btn btn-outline-secondary"><i class="typcn typcn-eye"></i></button>
                    </div>
                  </div>
                </div>
                <input type="text" name="email" value="<?= $email?>" hidden>
                <div class="form-group">
                  <label for="confirmPassword">Confirm Password</label>
                  <div class="input-group">
                    <input type="password" class="form-control form-control-lg border-left-2 password" id="confirmPassword" placeholder="Confirm Password" name="ConfirmPassword" required>
                    <div class="input-group-append">
                      <button type="button" id="toggleConfirmPassword" class="btn btn-outline-secondary"><i class="typcn typcn-eye"></i></button>
                    </div>
                  </div>
                  <small id="passwordError" class="text-danger"></small>
                </div>

                <div class="mt-3">
                  <button type="submit" class="btn btn-block btn-info btn-lg font-weight-medium auth-form-btn" name="submit">Change Password</button>
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
    // Function to toggle password visibility
    document.getElementById("togglePassword").addEventListener("click", function () {
      const passwordField = document.getElementById("password");
      passwordField.type = passwordField.type === "password" ? "text" : "password";
      this.classList.toggle("typcn-eye-outline");
      this.classList.toggle("typcn-eye");
    });

    document.getElementById("toggleConfirmPassword").addEventListener("click", function () {
      const confirmPasswordField = document.getElementById("confirmPassword");
      confirmPasswordField.type = confirmPasswordField.type === "password" ? "text" : "password";
      this.classList.toggle("typcn-eye-outline");
      this.classList.toggle("typcn-eye");
    });

    // Function to check if passwords match
    function confirmPasswordMatch() {
      const password = document.getElementById("password").value;
      const confirmPassword = document.getElementById("confirmPassword").value;
      const passwordError = document.getElementById("passwordError");

      if (password !== confirmPassword) {
        passwordError.textContent = "Passwords do not match!";
        return false; // Prevent form submission
      } else {
        passwordError.textContent = ""; // Clear any error message
        return true; // Allow form submission
      }
    }
  </script>
</body>
</html>
