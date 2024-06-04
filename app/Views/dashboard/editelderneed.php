<!DOCTYPE html>
<html lang="en">
<head>
<title>Edit Elder Need</title>
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
            <h4 class="mb-0">Edit Elder Need</h4>
          </li>
          <li class="nav-item">
            <div class="d-flex align-items-baseline">
              <p class="mb-0">Home</p>
              <i class="typcn typcn-chevron-right"></i>
              <p class="mb-0">Update Elder Need</p>
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
                  <h4 class="card-title">Edit Elder Need</h4>
                  <p class="card-description">
                    Edit Elder Need to Aruga-Kapatid Foundation Incorporated
                  </p>
                 
                  <form class="forms-sample" action="<?= site_url('updateElneed/' .$viewneed['id']) ?>" method="post">
                
                <input type="hidden" name="id" value="<?= $viewneed['id']?>">
            
              <div class="form-group">
                 <label for="need">Need</label>
                <input id="need" name="need" type="text" class="form-control" required="true" value="<?= $viewneed['need'] ?>" />
              </div>
              <div class="form-group">
                 <label for="description">Description</label>
                <input id="description" name="description" type="text" class="form-control" required="true" value="<?= $viewneed['description'] ?>" />
              </div>
              <button type="submit" class="btn btn-primary mr-2" name="submit" onclick="return confirm('Are you sure you want to save changes?')">Submit</button>
              <div class="row mt-3">
              <div class="col-md-12">
                  <a href="/manageneed" class="btn btn-secondary">Back</a>
              </div>
              </form>
            </div>
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
  <script src="login/vendors/js/vendor.bundle.base.js"></script>
  <script src="login/vendors/chart.js/Chart.min.js"></script>
  <script src="login/js/off-canvas.js"></script>
  <script src="login/js/hoverable-collapse.js"></script>
  <script src="login/js/template.js"></script>
  <script src="login/js/settings.js"></script>
  <script src="login/js/todolist.js"></script>
  <script src="login/js/dashboard.js"></script>

</body>

</html>