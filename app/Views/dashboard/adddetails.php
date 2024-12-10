<!DOCTYPE html>
<html lang="en">

<head>
  <title>Register Elder</title>
  <link rel="icon" type="image/png" href="/picture.png">
  <link rel="stylesheet" href="login/vendors/typicons/typicons.css">
  <link rel="stylesheet" href="login/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="login/vendors/select2/select2.min.css">
  <link rel="stylesheet" href="login/vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
  <link rel="stylesheet" href="login/css/vertical-layout-light/style.css">
  <script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
  <script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>

  <style>

    
    .short-input {
      width: 50% !important; /* Adjust as needed, e.g., 300px or a smaller percentage */


    }
    
  </style>
</head>

<body>
  <div class="container-scroller">
    <?php include_once('includes/header.php'); ?>
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
      </div>
    </nav>
    <div class="container-fluid page-body-wrapper">
      <?php include_once('includes/sidebar.php'); ?>
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
                  <?= form_open_multipart('save') ?>
                  <div class="card-text">
                  <input type="hidden" name="adminId" value="<?= session()->get('userID') ?>">
                  <div class="form-group">
                    <label for="lastname">Last Name</label>
                    <input id="lastname" name="lastname" type="text" class="form-control short-input" required="true" value="<?= isset($d['lastname']) ? $d['lastname'] : '' ?>">
                  </div>
                  <div class="form-group">
                    <label for="firstname">First Name</label>
                    <input id="firstname" name="firstname" type="text" class="form-control short-input" required="true" value="<?= isset($d['firstname']) ? $d['firstname'] : '' ?>">
                  </div>
                  <div class="form-group">
                    <label for="middlename">Middle Name</label>
                    <input id="middlename" name="middlename" type="text" class="form-control short-input" required="true" value="<?= isset($d['middlename']) ? $d['middlename'] : '' ?>">
                  </div>
                  <div class="form-group">
                    <label for="nickname">Nickname</label>
                    <input id="nickname" name="nickname" type="text" class="form-control short-input" required="true" value="<?= isset($d['nickname']) ? $d['nickname'] : '' ?>">
                  </div>
                  <div class="form-group">
                    <label for="DateBirth">Date of Birth</label>
                    <input id="DateBirth" name="DateBirth" type="date" class="form-control short-input" required="true" value="<?= isset($d['DateBirth']) ? $d['DateBirth'] : '' ?>" max="1970-01-01">
                  </div>
                  <div class="form-group">
                    <label for="age">Age (Current Age)</label>
                    <input id="age" name="age" type="number" min="60" class="form-control short-input" required="true" value="<?= isset($d['age']) ? $d['age'] : '' ?>">
                  </div>
                  <div class="form-group">
                    <label for="gender">Gender</label>
                    <select id="gender" name="gender" class="form-control short-input" required="true">
                      <option value="" selected Disabled>Select Gender</option>
                      <option value="Male">Male</option>
                      <option value="Female">Female</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="marital_stat">Marital Status</label>
                    <select id="marital_stat" name="marital_stat" class="form-control short-input" required="true">
                      <option value="">Select Marital Status</option>
                      <option value="Single" <?= isset($d['marital_stat']) && $d['marital_stat'] === 'Single' ? 'selected' : '' ?>>Single</option>
                      <option value="Married" <?= isset($d['marital_stat']) && $d['marital_stat'] === 'Married' ? 'selected' : '' ?>>Married</option>
                      <option value="Divorced" <?= isset($d['marital_stat']) && $d['marital_stat'] === 'Divorced' ? 'selected' : '' ?>>Divorced</option>
                      <option value="Widowed" <?= isset($d['marital_stat']) && $d['marital_stat'] === 'Widowed' ? 'selected' : '' ?>>Widowed</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="ContNum">Contact Number</label>
                    <input id="ContNum" name="ContNum" type="text" pattern="(\+?63|0)9\d{9}" maxlength="13" class="form-control short-input" required="true" value="<?= isset($d['ContNum']) ? $d['ContNum'] : '' ?>">
                  </div>
                  <div class="form-group">
                    <label for="ComAdd">Communication Address</label>
                    <textarea class="form-control" id="ComAdd" name="ComAdd" rows="5"><?= isset($d['ComAdd']) ? $d['ComAdd'] : '' ?></textarea>
                  </div>
                  <div class="form-group">
                    <label for="ProfPic">Profile Pic</label>
                    <input id="ProfPic" name="ProfPic" type="file" class="form-control short-input" required="true">
                  </div>
                  <div class="form-group">
                    <label for="EmergencyAdd">Emergency Address</label>
                    <textarea class="form-control" id="EmergencyAdd" name="EmergencyAdd" rows="5"><?= isset($d['EmergencyAdd']) ? $d['EmergencyAdd'] : '' ?></textarea>
                  </div>
                  <div class="form-group">
                    <label for="EmergencyContNum">Emergency Contact Number</label>
                    <input id="EmergencyContNum" name="EmergencyContNum" type="text" pattern="(\+?63|0)9\d{9}" maxlength="13" class="form-control short-input" required="true" value="<?= isset($d['EmergencyContNum']) ? $d['EmergencyContNum'] : '' ?>">
                  </div>
                  <div class="form-group">
                    <label for="RegDate">Registration Date</label>
                    <input id="RegDate" name="RegDate" type="date" class="form-control short-input" required="true" value="<?= isset($d['RegDate']) ? $d['RegDate'] : '' ?>">
                  </div>
                  </div>
                  <button type="submit" class="btn btn-primary mr-2" name="submit" onclick="return confirm('Are you sure you want to submit this form?')">Submit</button>
                  <?= form_close() ?>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php include_once('includes/footer.php'); ?>
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
