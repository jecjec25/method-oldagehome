<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reset Password</title>
  <link rel="icon" type="image/png" href="/LogoHapagAruga.png">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css">
  <link rel="stylesheet" href="login/vendors/typicons/typicons.css">
  <link rel="stylesheet" href="login/css/vertical-layout-light/style.css">
  <style>
    body {
      background-color: #f8f9fa;
    }
    .container-scroller {
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }
    .auth-form-light {
      background: white;
      padding: 2rem;
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    .auth-form-light h3, .auth-form-light h4, .auth-form-light h6 {
      color: #333;
    }
    .btn-info {
      background-color: #007bff;
      border: none;
    }
    .btn-info:hover {
      background-color: #0056b3;
    }
    .alert {
      font-size: 0.9rem;
    }
  </style>
</head>

<body>
  <div class="container-scroller">
    <div class="auth-form-light text-center py-5 px-4 px-sm-5">
      <h3>Senior Care</h3>
      <h4>Hello! Let's get started</h4>
      <h6 class="font-weight-light">Reset by Email</h6>

      <!-- Display message if set -->
      <?php if (session()->get('msg')): ?>
        <div class="alert alert-warning mt-3">
          <?= session()->get('msg') ?>
        </div>
      <?php endif; ?>

      <form class="pt-3" action="<?= base_url('emailAuth'); ?>" method="post" id="tbladmin">
        <div class="form-group mb-3">
          <label for="Email">Email</label>
          <input type="email" class="form-control" id="Email" placeholder="Enter your email" name="email" required>
        </div>
        <button type="submit" class="btn btn-info btn-lg w-100 mt-3">Reset</button>
      </form>

      <div class="mt-3">
        <p>Remember account? <a href="/signin" class="text-decoration-none">Login here</a>.</p>
      </div>
      <div class="mt-3">
        <a href="../index.php" class="text-decoration-none text-black">Home Page</a>
      </div>
    </div>
  </div>
</body>
</html>