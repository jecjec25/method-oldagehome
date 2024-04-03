<!DOCTYPE html>
<html lang="en">
<head>
  
  <title>Senior Care Management System|| Admin Calendar</title>
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
            <h4 class="mb-0">Admin Calendar</h4>
          </li>
          <li class="nav-item">
            <div class="d-flex align-items-baseline">
              <p class="mb-0">Home</p>
              <i class="typcn typcn-chevron-right"></i>
              <p class="mb-0">Admin Calendar</p>
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
                <h4 class="card-title" style="padding-left: 20px; padding-top: 20px;">Admin declined event</h4>
                  <p class="card-description" style="padding-left: 20px;"> 
                    Users event has been declined!!!
                  </p>
                <div class="table-responsive pt-3">
                <form action="<?= base_url('fundamental/accept') ?>" method ="post">
                  <table class="table table-striped project-orders-table" id="userbooking">
                    <?php if(isset($calen['bookingId'])){?>
                      <input type="hidden" name="bookingId" value="<?=$calen['bookingId']?>">
                    <?php }?>
                    <thead>
                        <tr>
                          <th>Last Name</th>
                          <th>First Name</th>
                          <th>Middle Name</th>
                          <th>Contact Number</th>
                          <th>Event</th>
                          <th>Preffered Date</th>
                          <th>Alternate Date</th>
                          <th>Equipment</th>
                          <th>Comments</th>
                          <th>STATUS</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($calen as $even): ?>
                    <tr>
                      <td><?=$even['lastname'] ?></td>
                      <td><?=$even['firstname'] ?></td>
                      <td><?=$even['middlename'] ?></td>
                      <td><?=$even['contactnum'] ?></td>
                      <td><?=$even['event']?></td>
                      <td><?=$even['prefferdate'] ?></td>
                      <td><?=$even['alterdate'] ?></td>
                      <td><?=$even['equipment'] ?></td>
                      <td><?=$even['comments'] ?></td>
                      <td>
                        
                          <?= $even['status']?>
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