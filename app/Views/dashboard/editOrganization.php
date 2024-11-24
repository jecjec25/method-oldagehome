<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Elder Need</title>
  <link rel="icon" type="image/png" href="/picture.png">
  <link rel="stylesheet" href="../login/vendors/typicons/typicons.css">
  <link rel="stylesheet" href="../login/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="../login/vendors/select2/select2.min.css">
  <link rel="stylesheet" href="../login/vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
  <link rel="stylesheet" href="../login/css/vertical-layout-light/style.css">
  <script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
  <script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
</head>

<body>
  <div class="container-scroller">
    <?php include_once('includes/header.php') ?>
    <nav class="navbar-breadcrumb col-xl-12 col-12 d-flex flex-row p-0">
      &nbsp;
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end" align="right">
        <ul class="navbar-nav mr-lg-2">
          <li class="nav-item ml-0">
            <h4 class="mb-0">Elder Need</h4>
          </li>
          <li class="nav-item">
            <div class="d-flex align-items-baseline">
              <p class="mb-0">Home</p>
              <i class="typcn typcn-chevron-right"></i>
              <p class="mb-0">Elder Needs</p>
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
                  <h4 class="card-title">Elder Needs</h4>
                  <p class="card-description">
                    Elder Needs of Aruga-Kapatid Foundation Incorporated
                  </p>
                  <form action="<?= base_url("HomeController/updateOrganization/" . $organizer['id']) ?>" method="post" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="exampleInputUsername1">Profile</label>
                    <?php if (!empty($organizer['img'])): ?>
                      <!-- Show current image if it exists -->
                      <div>
                        <img id="current-img" src="<?= base_url('images/' . $organizer['img']) ?>" alt="Current Profile Image" style="max-width: 150px; display: block; margin-bottom: 10px;">
                      </div>
                      <!-- Hidden input to pass current image path -->
                      <input type="hidden" name="current_img" value="<?= $organizer['img'] ?>">
                    <?php endif; ?>
                    <!-- Preview selected image -->
                    <div>
                      <img id="preview-img" style="max-width: 150px; display: none; margin-bottom: 10px;">
                    </div>
                    <input name="img" type="file" accept="image/*" class="form-control" onchange="previewImage(event)">
                  </div>

                    <div class="form-group">
                      <label for="exampleInputUsername1">Name</label>
                      <input name="name" type="text" class="form-control" required="true" value="<?= $organizer['name'] ?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1">Position</label>
                      <input id="position" name="position" type="text" class="form-control" required="true" value="<?= $organizer['position'] ?>">
                    </div>
                    <button type="submit" class="btn btn-primary mr-2" name="submit" onclick="return confirmSubmit()">Submit</button>
                  </form>
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
    // Function to preview the selected image
    function previewImage(event) {
      const previewImg = document.getElementById('preview-img');
      const currentImg = document.getElementById('current-img');
      const file = event.target.files[0];

      if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
          previewImg.src = e.target.result;
          previewImg.style.display = 'block'; // Show the preview image
        };
        reader.readAsDataURL(file);

        // Hide the current image preview if available
        if (currentImg) {
          currentImg.style.display = 'none';
        }
      } else {
        // If no file is selected, reset the preview
        previewImg.src = '';
        previewImg.style.display = 'none';
        if (currentImg) {
          currentImg.style.display = 'block';
        }
      }
    }

    // Ensure only numeric values are input for "ContNum" and "EmergencyContNum"
    var contNumInput = document.getElementById("ContNum");
    if (contNumInput) {
      contNumInput.addEventListener("input", function(event) {
        this.value = this.value.replace(/[^0-9]/g, '');
      });
    }

    var emergencyContNumInput = document.getElementById("EmergencyContNum");
    if (emergencyContNumInput) {
      emergencyContNumInput.addEventListener("input", function(event) {
        this.value = this.value.replace(/[^0-9]/g, '');
      });
    }

    // Confirmation prompt before submitting the form
    function confirmSubmit() {
      return confirm('Are you sure you want to submit this form?');
    }
  </script>

  <script src="../login/vendors/js/vendor.bundle.base.js"></script>
  <script src="../login/js/off-canvas.js"></script>
  <script src="../login/js/hoverable-collapse.js"></script>
  <script src="../login/js/template.js"></script>
  <script src="../login/js/settings.js"></script>
  <script src="../login/js/todolist.js"></script>

  <script src="../login/vendors/typeahead.js/typeahead.bundle.min.js"></script>
  <script src="../login/vendors/select2/select2.min.js"></script>
  <script src="../login/js/file-upload.js"></script>
  <script src="../login/js/typeahead.js"></script>
  <script src="../login/js/select2.js"></script>

</body>

</html>
