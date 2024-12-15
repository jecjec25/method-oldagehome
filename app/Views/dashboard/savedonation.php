<!DOCTYPE html>
<html lang="en">

<head>
  <title>Insert Donation</title>
  <link rel="icon" type="image/png" href="/LogoHapagAruga.png/">
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
            <h4 class="mb-0">Insert Donation</h4>
          </li>
          <li class="nav-item">
            <div class="d-flex align-items-baseline">
              <p class="mb-0">Home</p>
              <i class="typcn typcn-chevron-right"></i>
              <p class="mb-0">Donation</p>
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
                  <h4 class="card-title">Insert Donation</h4>
                  <p class="card-description">
                    Insert Cash Donation to Hapag Aruga
                  </p>
                  <?= form_open_multipart('saveDonation') ?>
                  <div class="card-text">
                  <input type="hidden" name="adminId" value="<?= session()->get('userID') ?>">
                  <div class="form-group">
                    <label for="establishment">Name of Establishment</label>
                    <input id="establishment" name="establishment" type="text" class="form-control short-input"  value="<?= isset($d['establishment']) ? $d['establishment'] : '' ?>">
                  </div>
                  <div class="form-group">
                    <label for="lastname">Last Name</label>
                    <input id="lastname" name="lastname" type="text" class="form-control short-input"  value="<?= isset($d['lastname']) ? $d['lastname'] : '' ?>">
                  </div>
                  <div class="form-group">
                    <label for="firstname">First Name</label>
                    <input id="firstname" name="firstname" type="text" class="form-control short-input"  value="<?= isset($d['firstname']) ? $d['firstname'] : '' ?>">
                  </div>
                  <div class="form-group">
                    <label for="middlename">Middle Name</label>
                    <input id="middlename" name="middlename" type="text" class="form-control short-input"  value="<?= isset($d['nickname']) ? $d['nickname'] : '' ?>">
                  </div>
                  <div class="form-group">
                    <label for="ContNum">Contact Number</label>
                    <input id="ContNum" name="ContNum" type="text" pattern="(\+?63|0)9\d{9}" maxlength="13" class="form-control short-input" required="true" value="<?= isset($d['ContNum']) ? $d['ContNum'] : '' ?>">
                  </div>
                  <div class="form-group">
                    <label for="receiptnum">Receipt Number</label>
                    <input id="receiptnum" name="receiptnum" type="text" class="form-control short-input" required="true" value="<?= isset($d['receiptnum']) ? $d['receiptnum'] : '' ?>">
                  </div>
                  <div class="form-group">
                    <label for="cashdonation">Cash Donation</label>
                    <input id="cashdonation" name="cashdonation" type="text" class="form-control short-input"  value="<?= isset($d['cashdonation']) ? $d['cashdonation'] : '' ?>">
                  </div>
                  <div class="form-group">
                    <label for="cashcheck">Cash Check</label>
                    <input id="cashcheck" name="cashcheck" type="text" class="form-control short-input"  value="<?= isset($d['cashcheck']) ? $d['cashcheck'] : '' ?>">
                  </div>
                  <div class="form-group">
                <label for="picture">Upload Picture</label>
                <input type="file" name="picture" id="picture" class="form-control-file" accept="image/*" onchange="previewImage(event)">
                </div>
                <div class="form-group">
                <label>Image Preview</label>
                <img id="imagePreview" alt="Image Preview" class="img-fluid mt-2" style="max-height: 200px; display: none;">
                </div>

                <div class="form-group">
                    <label for="message">Message</label>
                    <input name="message" id="message" type="text" placeholder="Message" class="form-control short-input">
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
  

  <script>
  function previewImage(event) {
    const input = event.target;
    const preview = document.getElementById('imagePreview');
    
    if (input.files && input.files[0]) {
      const reader = new FileReader();
      reader.onload = function(e) {
        preview.src = e.target.result;
        preview.style.display = 'block'; // Make the preview visible
      };
      reader.readAsDataURL(input.files[0]);
    } else {
      preview.src = '';
      preview.style.display = 'none'; // Hide the preview if no file is selected
    }
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
