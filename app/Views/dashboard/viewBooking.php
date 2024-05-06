
<!DOCTYPE html>
<html lang="en">

<head>
  
  <title>Update Event Booked</title>
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
            <h4 class="mb-0">Admin Calendar</h4>
          </li>
          <li class="nav-item">
            <div class="d-flex align-items-baseline">
              <p class="mb-0">Home</p>
              <i class="typcn typcn-chevron-right"></i>
              <p class="mb-0">Update Event Booked</p>
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
                  <h4 class="card-title">Update Event Booked</h4>
                  <p class="card-description">
                    Update Event Booked of User
                  </p>
                  <form class="forms-sample" action="<?= site_url('updateRecords/' .$reports['id']) ?>" method="post">
                
                <input type="hidden" name="id" value="<?= $reports['id']?>">
            
              <div class="form-group">
                 <label for="exampleInputUsername1">Description</label>
                <input id="description" name="description" type="text" class="form-control" required="true" value="<?= $reports['description'] ?>" />
              </div>
              <div class="form-group">
              <label for="exampleInputEmail1">Amount Raised</label>
              <input id="amount_raised" name="amount_raised" type="text" class="form-control" required="true" value="<?= $reports['amount_raised'] ?>">
              </div>
              <div class="form-group">
              <label for="outcomes">Outcomes</label>
              <input id="outcomes" name="outcomes" type="text" class="form-control" required="true" value="<?= $reports['outcomes']?>">
              </div>
                <label for="exampleInputEmail1">Acknowledgement</label>
               <input class="form-control" id="acknowledgement" type="text" name="acknowledgement" value="<?= $reports['acknowledgement']?>">                     
              </div>

              <div class="col-md-12">
                    <button type="submit" class="btn btn-primary mr-2" name="submit" onclick="return confirm('Are you sure you want to submit this form?')">Submit</button>
                </div>
                <br>
                    <div class="col-md-12">
                    <a href="/ADbooking" class="btn btn-secondary">Back</a>
                    </div>
                    <br>
                  </form>
                </div>
              </div>
            </div>
        </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <?php include_once('includes/footer.php');?>
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
