
<!DOCTYPE html>
<html lang="en">

<head>
  
  <title>Register Elder</title>
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
            <h4 class="mb-0">Register Elder</h4>
          </li>
          <li class="nav-item">
            <div class="d-flex align-items-baseline">
              <p class="mb-0">Home</p>
              <i class="typcn typcn-chevron-right"></i>
              <p class="mb-0">Register Elder</p>
            </div>
          </li>
        </ul>
        <?php include('includes/header.php') ?>
      </div>
    </nav>
    <div class="container-fluid page-body-wrapper">     
    <?php include_once('includes/sidebar.php');?>
      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Register Elder</h4>
                  <p class="card-description">
                    Register an Elder to Aruga Kapatid
                  </p>
                  <form action="<?= base_url("save") ?>" method="post">

                    <input type="hidden" name="adminId" value="<?=session()->get('userID')?>">
                    <div class="form-group">
                       <label for="exampleInputUsername1">Last Name</label>
                      <input id="lastname" name="lastname" type="text" class="form-control" required="true" value="<?= isset($d['lastname']) ? $d['lastname'] : '' ?>">
                    </div>
                    <div class="form-group">
                       <label for="exampleInputUsername1">First Name</label>
                      <input id="firstname" name="firstname" type="text" class="form-control" required="true" value="<?= isset($d['firstname']) ? $d['firstname'] : '' ?>">
                    </div>
                    <div class="form-group">
                       <label for="exampleInputUsername1">Middle Name</label>
                      <input id="middlename" name="middlename" type="text" class="form-control" required="true" value="<?= isset($d['middlename']) ? $d['middlename'] : '' ?>">
                    </div>
                    <div class="form-group">
                       <label for="exampleInputUsername1">Nickname</label>
                      <input id="nickname" name="nickname" type="text" class="form-control" required="true" value="<?= isset($d['nickname']) ? $d['nickname'] : '' ?>">
                    </div>
                  <div class="form-group">
                      <label for="exampleInputEmail1">Date of Birth</label>
                     <input id="DateBirth" name="DateBirth" type="date" class="form-control" required="true" value="<?= isset($d['DateBirth']) ? $d['DateBirth'] : '' ?>" max="1970-01-01">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputGender">Gender</label>
                      <select id="gender" name="gender" class="form-control" required="true">
                          <option value="" selected Disabled>Select Gender</option>
                          <option value="Male">Male</option>
                          <option value="Female">Female</option>
                      </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputMaritalStatus">Marital Status</label>
                        <select id="marital_stat" name="marital_stat" class="form-control" required="true">
                            <option value="">Select Marital Status</option>
                            <option value="single" <?= isset($d['marital_stat']) && $d['marital_stat'] === 'single' ? 'selected' : '' ?>>Single</option>
                            <option value="married" <?= isset($d['marital_stat']) && $d['marital_stat'] === 'married' ? 'selected' : '' ?>>Married</option>
                            <option value="divorced" <?= isset($d['marital_stat']) && $d['marital_stat'] === 'divorced' ? 'selected' : '' ?>>Divorced</option>
                            <option value="widowed" <?= isset($d['marital_stat']) && $d['marital_stat'] === 'widowed' ? 'selected' : '' ?>>Widowed</option>
                        </select>
                    </div>
                    <div class="form-group">
                    <label for="ContNum">Contact Number</label>
                    <input id="ContNum" name="ContNum" type="text" pattern="(\+?63|0)9\d{9}" maxlength="13" id="ContNum" class="form-control" required="true" value="<?= isset($d['ContNum']) ? $d['ContNum'] : '' ?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Communication Address</label>
                     <textarea class="form-control" id="ComAdd" name="ComAdd" rows="5" value="<?= isset($d['ComAdd']) ? $d['ComAdd'] : '' ?>"></textarea>
                     
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Profile Pic</label>
                     <input id="ProfPic" name="ProfPic" type="file" class="form-control" required="true" value="<?= isset($d['Profpic']) ? $d['Profpic'] : '' ?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Emergency Address</label>
                     <textarea class="form-control" id="EmergencyAdd" name="EmergencyAdd" rows="5" value="<?= isset($d['EmergencyAdd']) ? $d['EmergencyAdd'] : '' ?>"></textarea>
                    </div>
                    <div class="form-group">
                    <label for="EmergencyContNum">Emergency Contact Number</label>
                    <input id="EmergencyContNum" name="EmergencyContNum" type="text" pattern="(\+?63|0)9\d{9}" maxlength="13" id="EmergencyContNum" class="form-control" required="true" value="<?= isset($d['EmergencyContNum']) ? $d['EmergencyContNum'] : '' ?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Registration Date</label>
                     <input id="RegDate" name="RegDate" type="date" class="form-control" required="true" value="<?= isset($d['RegDate']) ? $d['RegDate'] : '' ?>">
                    </div>
                    <button type="submit" class="btn btn-primary mr-2" name="submit" onclick="return confirm('Are you sure you want to submit this form?')">Submit</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
       <?php include_once('includes/footer.php');?>
      </div>
    </div>
  </div>

  <script>
			var inputs = document.getElementById("ContNum");
        inputs.addEventListener("input", function(event) {
            this.value = this.value.replace(/[^0-9]/g, '');
        });
    </script>
    <script>
			var inputs = document.getElementById("EmergencyContNum");
        inputs.addEventListener("input", function(event) {
            this.value = this.value.replace(/[^0-9]/g, '');
        });
    </script>
  <script>
    if ($("#add_create").length > 0) {
      $("#add_create").validate({
        rules: {
          name: {
            required: true,
          },
          email: {
            required: true,
            maxlength: 60,
            email: true,
          },
        },
        messages: {
          name: {
            required: "Name is required.",
          },
          email: {
            required: "Email is required.",
            email: "It does not seem to be a valid email.",
            maxlength: "The email should be or equal to 60 chars.",
          },
        },
      })
    }
  </script>
 
  <script src="login/vendors/js/vendor.bundle.base.js"></script>

  <script src="login/js/off-canvas.js"></script>
  <script src="login/js/hoverable-collapse.js"></script>
  <script src="login/js/template.js"></script>
  <script src="login/js/settings.js"></script>
  <script src="login/js/todolist.js"></script>

  <script src="login/vendors/typeahead.js/typeahead.bundle.min.js"></script>
  <script src="login/vendors/select2/select2.min.js"></script>
 
  <script src="login/js/file-upload.js"></script>
  <script src="login/js/typeahead.js"></script>
  <script src="login/js/select2.js"></script>

</body>

</html>
<?php  ?>