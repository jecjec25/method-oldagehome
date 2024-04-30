
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin Donation Tracking</title>
  <link rel="stylesheet" href="login/vendors/typicons/typicons.css">
  <link rel="stylesheet" href="login/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="login/css/vertical-layout-light/style.css">
</head>
<body>
  
  <div class="container-scroller">
    <?php include_once('includes/header.php');?>       
    <nav class="navbar-breadcrumb col-xl-12 col-12 d-flex flex-row p-0">
&nbsp;
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <ul class="navbar-nav mr-lg-2">
          <li class="nav-item ml-0">
            <h4 class="mb-0">Track Donation</h4>
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
     <?php include_once('includes/sidebar.php');?>
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <h4 class="card-title" style="padding-left: 20px; padding-top: 20px;">Donation for Elders</h4>
                  <p class="card-description" style="padding-left: 20px;"> 
                    User donation schedule has been received
                  </p>
                <div class="table-responsive pt-3">
                <form action="<?= base_url('fundamental/accept') ?>" method ="post">
                  <table class="table table-striped project-orders-table" id="userbooking">
                    <?php if(isset($calen['bookingId'])){?>
                      <input type="hidden" name="bookingId" value="<?=$calen['bookingId']?>">
                    <?php }?>
                    <thead>
                        <tr>
                          <th>Gmail Account</th>
                          <th>Last Name</th>
                          <th>First Name</th>
                          <th>Middle Name</th>
                          <th>Contact Number</th>
                          <th>Donation Date</th>
                          <th>Name of Donation</th>
                          <th>Picture</th>
                          <th>Reference Number</th>
                          <th>Message</th>
                          <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($donate as $dnt): ?>
                    <tr>
                    <td><?=$dnt['Email'] ?></td>
                      <td><?=$dnt['lastname'] ?></td>
                      <td><?=$dnt['firstname'] ?></td>
                      <td><?=$dnt['middlename'] ?></td>
                      <td><?=$dnt['contactnum'] ?></td>
                      <td><?=$dnt['donationdate']?></td>
                      <td><?=$dnt['nameofdonation'] ?></td>
                      <td><?=$dnt['picture'] ?></td>
                      <td><?=$dnt['referencenum'] ?></td>
                      <td><?=$dnt['message'] ?></td>
                      <td>
                          <div class="d-flex align-items-center">
                            <a href="<?= base_url('deletedonate/' . $dnt['id'])?>" class="btn btn-danger btn-sm btn-icon-text" onclick="return confirm('Are you sure you want to submit this form?')">Delete</a>
                          <input type="hidden" name="delete" value="<?= $dnt['id']?>">
                          </div>
                    </td>
                    </tr>
                    <?php endforeach; ?>
                    </tbody>
                  </table>
                  
                </div>
              </div>
            </div>
          </div>
                    </div>
         <?php include_once('includes/footer.php');?>
      </div>
    </div>
  </div>

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