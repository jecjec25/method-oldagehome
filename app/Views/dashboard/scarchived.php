<!DOCTYPE html>
<html lang="en">

<head>
  
  <title>Senior Care Management System || Add Senior Details</title>
  <link rel="stylesheet" href="login/vendors/typicons/typicons.css">
  <link rel="stylesheet" href="login/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="login/vendors/select2/select2.min.css">
  <link rel="stylesheet" href="login/vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
  <link rel="stylesheet" href="login/css/vertical-layout-light/style.css">
  <script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
</head>

<body>
  <div class="container-scroller">
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="navbar-brand-wrapper d-flex justify-content-center">
        <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">
          <a class="navbar-brand brand-logo" href="index.html"><img src="login/login/images/logo.svg" alt="logo"/></a>
          <a class="navbar-brand brand-logo-mini" href="index.html"><img src="login/images/logo-mini.svg" alt="logo"/></a>
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="typcn typcn-th-menu"></span>
          </button>
        </div>
      </div>
      <?php include_once('includes/header.php');?>
    </nav>
    <div class="container-fluid page-body-wrapper">     
    <?php include_once('includes/sidebar.php');?>
          <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <h4 class="card-title" style="padding-left: 20px; padding-top: 20px;">Manage Senior Citizen Details</h4>
                  <p class="card-description" style="padding-left: 20px;"> 
                    Manage Senior Citizen Details in old age home!!!
                  </p>
                <div class="table-responsive pt-3">
                  
                  <table class="table table-striped project-orders-table" id="tblscdetails">
                  <?php if(isset($k['Id'])){?>
                      <input type="hidden" name="Id" value="<?=$k['Id']?>">
                    <?php }?>
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Date of Birth</th>
                        <th>Contact Number</th>
                        <th>Profile Picture</th>
                        <th>Communication Address</th>
                        <th>Emergency Address</th>
                        <th>Emergency Contact Number</th>
                        <th>Registration Date</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php foreach($main as $k): ?>
                <tr>
                  
                    <td><?=$k['Name'] ?></td>
                    <td><?=$k['DateBirth'] ?></td>
                    <td><?=$k['ContNum'] ?></td>
                    <td><img src="<?php base_url();?>/eldersimage/<?=$k['ProfPic'] ?>" alt="" style="width: 200px; height: 200px; border:box;"></td>
                    <td><?=$k['ComAdd'] ?></td>
                    <td><?=$k['EmergencyAdd'] ?></td>
                    <td><?=$k['EmergencyContNum'] ?></td>
                    <td><?=$k['RegDate'] ?></td>
                    <td>
                          <p>Archived</p>
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