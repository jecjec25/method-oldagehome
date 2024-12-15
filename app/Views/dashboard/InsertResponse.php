<!DOCTYPE html>
<html lang="en">

<head>
  <title>Insert Questions</title>
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
            <h4 class="mb-0">Add Chat Response</h4>
          </li>
          <li class="nav-item">
            <div class="d-flex align-items-baseline">
              <p class="mb-0">Home</p>
              <i class="typcn typcn-chevron-right"></i>
              <p class="mb-0">Chatbot</p>
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
                  <h4 class="card-title">Add Chat Reponse</h4>
                  <p class="card-description">
                    Add Chat Reponse for users to chat.
                  </p>
                  <form action="<?= base_url('saveResponse')?>" method="post">
                  <div class="card-text">
                  <div class="form-group">
                    <label for="Question">Question</label>
                    <input id="Question" name="Questions" type="text" class="form-control short-input"  value="<?= isset($d['answers']) ? $d['answers'] : '' ?>">
                  </div>
                  <div class="form-group">
                    <label for="Answers">Answers</label>
                    <input id="Answers" name="Answers" type="text" class="form-control short-input"  value="<?= isset($d['questions']) ? $d['questions'] : '' ?>">
                  </div>

                  <button type="submit" class="btn btn-primary mr-2" name="submit" onclick="return confirm('Are you sure you want to submit this form?')">Submit</button>
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
