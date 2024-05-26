<!DOCTYPE html>
<html lang="en">

<head>
  
  <title>Update Profile</title>
  <link rel="stylesheet" href="login/vendors/typicons/typicons.css">
  <link rel="stylesheet" href="login/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="login/vendors/select2/select2.min.css">
  <link rel="stylesheet" href="login/vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
  <link rel="stylesheet" href="login/css/vertical-layout-light/style.css">
  <script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
</head>

<body>
  <div class="container-scroller">
  <nav class="navbar-breadcrumb col-xl-12 col-12 d-flex flex-row p-0">
&nbsp;
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end" align="right">
        <ul class="navbar-nav mr-lg-2">
          <li class="nav-item ml-0">
            <h4 class="mb-0">Update Profile</h4>
          </li>
          <li class="nav-item">
            <div class="d-flex align-items-baseline">
              <p class="mb-0">Home</p>
              <i class="typcn typcn-chevron-right"></i>
              <p class="mb-0">Dashboard</p>
            </div>
          </li>
        </ul>
        <?php include('includes/header.php') ?>
      </div>
    </nav>
    <div class="container-fluid page-body-wrapper">     
    <?php include_once('includes/sidebar.php');?>
      <!-- partial:partials/_sidebar.html -->
  
      <!-- partial -->
      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Profile of Admin</h4>
                  <p class="card-description">
                    Update your information!!!
                  </p>
                  <?= form_open_multipart(base_url('updateProfile/'. session()->get('userID')))?>
                  <form action="<?= base_url('updateProfile/') . session()->get('userID')?>" class="forms-sample" method="post">
                    <div class="form-group">
                
                       <label for="exampleInputUsername1">Last Name</label>
                      <input type="text" class="form-control" name="LastName" id="adminname" value="<?= session()->get('LastName')?>" required='true' />
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">First Name</label>
                      <input type="text" class="form-control" name="FirstName" id="username" value="<?= session()->get('FirstName')?>" required="true" />
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Profile Image</label>
                      <input type="file" class="form-control" name="user_img" value="<?= session()->get('user_img')?>" id="user_img_input" accept=".jpg, .img, .png, .jpeg"  onchange="previewImage(event)" />
                      <?php if (session()->get('user_img')): ?>
                    <img id="profile_image_preview"src="<?="/upload/user_images/"  . session()->get('user_img') ?>" alt="Profile Image" style="max-width: 100px; max-height: 100px;" />
                      <?php else: ?>
                          <img id="profile_image_preview" src="<?="/upload/user_images/"  . session()->get('user_img') ?>" alt="Profile Image" style="max-width: 100px; max-height: 100px;" />
                      <?php endif; ?>
                
                  </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Contact Number</label>
                      <input type="text"  class="form-control" name="ContactNo" id="contactnumber" pattern="(\+?63|0)9\d{9}" maxlength="13" value="<?= session()->get('ContactNo')?>"/>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputConfirmPassword1">Username</label>
                      <input type="text" class="form-control" id="email" name="Username" class="form-control" value="<?= session()->get('Username')?>" />
                    </div>
                    <div class="form-group">
                      <label for="exampleInputConfirmPassword1">Email address</label>
                      <input type="email" class="form-control" id="email" name="Email" class="form-control" value="<?= session()->get('Email')?>" readonly='true' />
                    </div>
                    <div class="form-group">
                      <label for="exampleInputConfirmPassword1">Birthday</label>
                      <input type="date" class="form-control" id="email" name="birthday" class="form-control" value="<?= session()->get('birthday')?>" required='true' />
                    </div>
                    <div class="form-group">
                    <button type="submit" class="btn btn-primary mr-2" name="submit">Submit</button>
                    <div class="row mt-3">
                    <div class="col-md-12">
                    <a href="/dashboard" class="btn btn-secondary">Back</a>
                    </div>
                  <?= form_close()?>
                </div>
              </div>
            </div>
     
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- main-panel ends -->
      
     
    </div>
    <?php include_once('includes/footer.php');?>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- base:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <!-- endinject -->
  <!-- plugin js for this page -->
  <script src="vendors/typeahead.js/typeahead.bundle.min.js"></script>
  <script src="vendors/select2/select2.min.js"></script>
  <!-- End plugin js for this page -->
  <!-- Custom js for this page-->
  <script src="js/file-upload.js"></script>
  <script src="js/typeahead.js"></script>
  <script src="js/select2.js"></script>   
  
  <!-- End custom js for this page-->

  <script>
    function previewImage(event) {
        const input = event.target;
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function (e) {
                document.getElementById('profile_image_preview').src = e.target.result;
            };
            reader.readAsDataURL(input.files[0]);
        } else {
            // If no file is selected, keep the current profile image
            const currentImage = document.getElementById('profile_image_preview').getAttribute('data-current-src');
            document.getElementById('profile_image_preview').src = currentImage;
        }
    }
</script>


</body>

</html>
