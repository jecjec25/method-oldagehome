
<!DOCTYPE html>
<html lang="en">

<head>
  
  <title>Old Age Home Management System|| Manage Services</title>
  <!-- base:css -->
  <link rel="stylesheet" href="login/vendors/typicons/typicons.css">
  <link rel="stylesheet" href="login/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="login/css/vertical-layout-light/style.css">
  <!-- endinject -->
  
</head>
<body>
  
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <?php include_once('includes/header.php');?>
    <!-- partial -->
    <nav class="navbar-breadcrumb col-xl-12 col-12 d-flex flex-row p-0">
    &nbsp;
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <ul class="navbar-nav mr-lg-2">
          <li class="nav-item ml-0">
            <h4 class="mb-0">Manage Services</h4>
          </li>
          <li class="nav-item">
            <div class="d-flex align-items-baseline">
              <p class="mb-0">Home</p>
              <i class="typcn typcn-chevron-right"></i>
              <p class="mb-0">Manage Services</p>
            </div>
          </li>
        </ul>
       
      </div>
    </nav>
    <div class="container-fluid page-body-wrapper">
  
      <!-- partial:partials/_sidebar.html -->
     <?php include_once('includes/sidebar.php');?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">


          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <h4 class="card-title" style="padding-left: 20px; padding-top: 20px;">Manage Services</h4>
                  <p class="card-description" style="padding-left: 20px;"> 
                    Manage services in old age home!!!
                  </p>
                <div class="table-responsive pt-3">
                  
                  <table class="table table-striped project-orders-table">
                    <thead>
                      <tr>
                        <th class="ml-5">#</th>
                        <th>Service Title</th>
                        <th>Creation Date</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                                       <tr>

                        <td></td>
                        <td> </td>
                        <td></td>
                      
                        
                        <td>
                          <div class="d-flex align-items-center">
                            <a href="edit-services.php?id=" class="btn btn-success btn-sm btn-icon-text mr-3">Edit <i class="typcn typcn-edit btn-icon-append"></i> </a> 
                                            <a href="/manageservices?id=&del=delete" onClick="return confirm('Are you sure you want to delete?')" class="btn btn-danger btn-sm btn-icon-text">Delete <i class="typcn typcn-delete-outline btn-icon-append"></i></a>
                          </div>
                        </td>
                      </tr>
                      
                    </tbody>
                  </table>


                </div>
                
              </div>
            </div>
          </div>

        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <?php include_once('includes/footer.php');?>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- base:js -->
  <script src="login/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="login/vendors/chart.js/Chart.min.js"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="login/js/off-canvas.js"></script>
  <script src="login/js/hoverable-collapse.js"></script>
  <script src="login/js/template.js"></script>
  <script src="login/js/settings.js"></script>
  <script src="login/js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="login/js/dashboard.js"></script>
  <!-- End custom js for this page-->
</body>

</html>