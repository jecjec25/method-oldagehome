<!DOCTYPE html>
<html lang="en">

<head>
  
  <title>Update User Profile</title>
  <link rel="stylesheet" href="login/vendors/typicons/typicons.css">
  <link rel="stylesheet" href="login/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="login/vendors/select2/select2.min.css">
  <link rel="stylesheet" href="login/vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
  <link rel="stylesheet" href="login/css/vertical-layout-light/style.css">
  <script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
</head>

<body>
    <div class="container-fluid page-body-wrapper">     
    <?php include('header.php')?>


    <!-- partial -->
      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">User Profile</h4>
                  <p class="card-description">
                    Update user profile.
                  </p>
                  <form action="<?= base_url('updateUserProfile/') . session()->get('id')?>" class="forms-sample" method="post">
                    <div class="form-group">
                      <p><?= session()->get('userID')?></p>
                       <label for="exampleInputUsername1">Last Name</label>
                      <input type="text" class="form-control" name="LastName" id="adminname" value="<?= session()->get('LastName')?>" required='true' />
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">First Name</label>
                      <input type="text" class="form-control" name="FirstName" id="username" value="<?= session()->get('FirstName')?>" required="true" />
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
                    <button type="submit" class="btn btn-primary mr-2" name="submit">Submit</button>
                    <div class="row mt-3">
                    <div class="col-md-12">
                    <a href="/booking" class="btn btn-secondary">Back</a>
                    </div>
                  </form>
                </div>
              </div>
            </div>
     
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- base:js -->
  <!-- container-scroller -->
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
</body>

</html>
