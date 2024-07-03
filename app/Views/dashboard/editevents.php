<!DOCTYPE html>
<html lang="en">

<head>
  <title>Edit News</title>
  <link rel="icon" type="image/png" href="/picture2.png">
  <!-- base:css -->
  <link rel="stylesheet" href="../login/vendors/typicons/typicons.css">
  <link rel="stylesheet" href="../login/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="../login/css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
</head>

<body>
  <div class="container-scroller">
    <?php include_once('includes/header.php');?>

    <nav class="navbar-breadcrumb col-xl-12 col-12 d-flex flex-row p-0">
      &nbsp;
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <ul class="navbar-nav mr-lg-2">
          <li class="nav-item ml-0">
            <h4 class="mb-0">Edit News</h4>
          </li>
          <li class="nav-item">
            <div class="d-flex align-items-baseline">
              <p class="mb-0">Home</p>
              <i class="typcn typcn-chevron-right"></i>
              <p class="mb-0">Update News</p>
            </div>
          </li>
        </ul>
      </div>
    </nav>
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <br>
                  <h4 class="card-title">Edit News</h4>
                  <p class="card-description">
                    Edit News to Aruga Kapatid
                  </p>
                  <?= form_open_multipart('editEvents/' . $main['EventID']) ?>
                  <div class="form-group">
                    <label for="Title">Title</label>
                    <input id="Title" name="Title" type="text" class="form-control" required="true" value="<?= $main['Title'] ?>">
                  </div>
                  <div class="form-group">
                    <label for="Description">Description</label>
                    <input id="Description" name="Description" type="text" class="form-control" required="true" value="<?= $main['Description'] ?>">
                  </div>
                  <div class="form-group">
                    <label for="Organizer">Organizer</label>
                    <input id="Organizer" name="Organizer" type="text" class="form-control" required="true" value="<?= $main['Organizer'] ?>">
                  </div>
                  <div class="form-group">
                    <label for="Start_date">Start Date</label>
                    <input id="Start_date" name="Start_date" type="date" class="form-control" required="true" value="<?= $main['Start_date'] ?>">
                  </div>
                  <div class="form-group">
                    <label for="End_date">End Date</label>
                    <input id="End_date" name="End_date" type="date" class="form-control" required="true" value="<?= $main['End_date'] ?>">
                  </div>
                  <div class="form-group">
                    <?php
                    $selectedCategories = explode(',', $main['Category']);
                    ?>
                    <label for="Category">Category</label><br>
                    <input type="checkbox" id="social" name="Category[]" value="Social" <?= in_array('Social', $selectedCategories) ? 'checked' : '' ?>>
                    <label for="social"> Social</label><br>
                    <input type="checkbox" id="recreational" name="Category[]" value="Recreational" <?= in_array('Recreational', $selectedCategories) ? 'checked' : '' ?>>
                    <label for="recreational"> Recreational</label><br>
                    <input type="checkbox" id="educational" name="Category[]" value="Educational" <?= in_array('Educational', $selectedCategories) ? 'checked' : '' ?>>
                    <label for="Educational"> Educational</label><br>
                    <input type="checkbox" id="health" name="Category[]" value="Health" <?= in_array('Health', $selectedCategories) ? 'checked' : '' ?>>
                    <label for="Health"> Health and Wellness</label><br>
                    <input type="checkbox" id="outreach" name="Category[]" value="Outreach" <?= in_array('Outreach', $selectedCategories) ? 'checked' : '' ?>>
                    <label for="Outreach"> Community Outreach</label><br>
                    <input type="checkbox" id="cultural" name="Category[]" value="Cultural" <?= in_array('Cultural', $selectedCategories) ? 'checked' : '' ?>>
                    <label for="Cultural"> Cultural</label><br>
                    <input type="checkbox" id="special" name="Category[]" value="Special" <?= in_array('Special', $selectedCategories) ? 'checked' : '' ?>>
                    <label for="Special"> Special</label><br>
                  </div>
                  <div class="form-group">
                    <label for="Status">Status</label>
                    <select name="Status" class="form-control">
                      <option value="<?= $main['Status'] ?>" selected><?= $main['Status'] ?></option>
                      <option value="Published">Published</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="Atendees">Atendees</label>
                    <input id="Atendees" name="Atendees" type="text" class="form-control" required="true" value="<?= $main['Atendees'] ?>">
                  </div>
                  <div class="form-group">
                    <label for="Attachments">Attachments</label><br>
                    <input id="Attachments" name="Attachments" type="file" class="form-control">
                    <?php if ($main['Attachments']): ?>
                        <p><?= $main['Attachments']?></p>
                    <img id="profile_image_preview"src="<?="/upload/events/"  . $main['Attachments'] ?>" alt="Profile Image" style="max-width: 100px; max-height: 100px;" />
                      <?php else: ?>
                          <img id="profile_image_preview" src="<?="/upload/events/"  . $main['Attachments'] ?>" alt="Profile Image" style="max-width: 100px; max-height: 100px;" />
                      <?php endif; ?>
                  </div>
                  <button type="submit" class="btn btn-primary mr-2" name="submit" onclick="return confirm('Are you sure you want to save changes?')">Submit</button>
                  <div class="row mt-3">
                    <div class="col-md-12">
                      <a href="/Viewevents" class="btn btn-secondary">Back</a>
                    </div>
                  </div>
                  <?= form_close() ?>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <?php include_once('includes/footer.php'); ?>
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- base:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
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

  <script src="/js/off-canvas.js"></script>
  <script src="/js/hoverable-collapse.js"></script>
  <script src="/js/template.js"></script>
  <script src="/js/settings.js"></script>
  <script src="/js/todolist.js"></script>
  <!-- endinject -->
  <!-- plugin js for this page -->
  <script src="/vendors/typeahead.js/typeahead.bundle.min.js"></script>
  <script src="/vendors/select2/select2.min.js"></script>
  <!-- End plugin js for this page -->
  <!-- Custom js for this page-->
  <script src="/js/file-upload.js"></script>
  <script src="/js/typeahead.js"></script>
  <script src="/js/select2.js"></script>
  <!-- End custom js for this page-->
</body>

</html>
