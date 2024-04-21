
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Dashboard</title>
  <link rel="stylesheet" href="../login/vendors/typicons/typicons.css">
  <link rel="stylesheet" href="../login/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="../login/css/vertical-layout-light/style.css">
</head>
<body>
  
  <div class="container-scroller">
    <?php include_once('includes/header.php');?>
    <nav class="navbar-breadcrumb col-xl-12 col-12 d-flex flex-row p-0">
&nbsp;
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end" align="right">
        <ul class="navbar-nav mr-lg-2">
          <li class="nav-item ml-0">
            <h4 class="mb-0">Dashboard</h4>
          </li>
          <li class="nav-item">
            <div class="d-flex align-items-baseline">
              <p class="mb-0">Home</p>
              <i class="typcn typcn-chevron-right"></i>
              <p class="mb-0">Main Dashboard</p>
            </div>
          </li>
        </ul>
       
      </div>
    </nav>
    <div class="container-fluid page-body-wrapper">
  
     <?php include_once('includes/sidebar.php');?>
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex align-items-center justify-content-between justify-content-md-center justify-content-xl-between flex-wrap mb-4">
                    <div>
                      
                      <h5 class="mb-0" style="color: blue;">Elders of Aruga Kapatid</h5>
                      <h1 class="mb-0"></h1>
                    </div>
                    <i class="typcn typcn-user icon-xl text-secondary"></i>
                  </div>
                  <a href="test" class="small-box-footer">More info <i class="fas fa-users-circle-right"></i></a>
                </div>
              </div>
            </div>
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex align-items-center justify-content-between justify-content-md-center justify-content-xl-between flex-wrap mb-4">
                    <div>
                      
                      <h5 class="mb-0" style="color: blue;">Products of Aruga Kapatid</h5>
                      <h1 class="mb-0"></h1>
                    </div>
                    <i class="typcn typcn-shopping-bag icon-xl text-secondary"></i>
                  </div>
                  <a href="show" class="small-box-footer">More info <i class="fas fa-users-circle-right"></i></a>
                </div>
              </div>
            </div>
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex align-items-center justify-content-between justify-content-md-center justify-content-xl-between flex-wrap mb-4">
                    <div>
                     
                      <h5 class="mb-0" style="color: blue;">Unread Inquiry</h5>
                      <h1 class="mb-0"></h1>
                    </div>
                    <i class="typcn typcn-messages icon-xl text-secondary"></i>
                  </div>
                  <a href="contactu" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
            </div>
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex align-items-center justify-content-between justify-content-md-center justify-content-xl-between flex-wrap mb-4">
                    <div>
                      
                      <h5 class="mb-0" style="color: blue;">Read Inquiry</h5>
                      <h1 class="mb-0"></h1>
                    </div>
                    <i class="typcn typcn-clipboard icon-xl text-secondary"></i>
                  </div>
                   <a href="readenq" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
            </div>
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex align-items-center justify-content-between justify-content-md-center justify-content-xl-between flex-wrap mb-4">
                    <div>
                      <h5 class="mb-0" style="color: blue;">Events Calendar</h5>
                      <h1 class="mb-0"></h1>
                    </div>
                    <i class="typcn typcn-calendar menu-icon icon-xl text-secondary"></i>
                  </div>
                  <a href="calendar" class="small-box-footer">More info <i class="fas fa-users-circle-right"></i></a>
                </div>
              </div>
            </div>
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex align-items-center justify-content-between justify-content-md-center justify-content-xl-between flex-wrap mb-4">
                    <div>
                      
                      <h5 class="mb-0" style="color: blue;">Report of Donation</h5>
                      <h1 class="mb-0"></h1>
                    </div>
                    <i class="typcn typcn-document-text menu-icon icon-xl text-secondary"></i>
                  </div>
                  <a href="viewDonation" class="small-box-footer">More info <i class="fas fa-users-circle-right"></i></a>
                </div>
              </div>
            </div>
          </div>
          <?php include_once('dashboard.php');?>
        </div>
        <?php include_once('includes/footer.php');?>
      </div>
    </div>
  </div>
  <script src="../login/vendors/js/vendor.bundle.base.js"></script>
  <script src="../login/vendors/chart.js/Chart.min.js"></script>
  <script src="../login/js/off-canvas.js"></script>
  <script src="../login/js/hoverable-collapse.js"></script>
  <script src="../login/js/template.js"></script>
  <script src="../login/js/settings.js"></script>
  <script src="../login/js/todolist.js"></script>
  <script src="@/login/js/dashboard.js"></script>
</body>
</html>

