<!DOCTYPE html>
<html lang="en">

<head>
  
  <title>Update Donation Report</title>
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
  <nav class="navbar-breadcrumb col-xl-12 col-12 d-flex flex-row p-0">
&nbsp;
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end" align="right">
        <ul class="navbar-nav mr-lg-2">
          <li class="nav-item ml-0">
            <h4 class="mb-0">Update Donation Report</h4>
          </li>
          <li class="nav-item">
            <div class="d-flex align-items-baseline">
              <p class="mb-0">Home</p>
              <i class="typcn typcn-chevron-right"></i>
              <p class="mb-0">Report of Donation</p>
            </div>
          </li>
        </ul>
        <?php include('includes/header.php') ?>
      </div>
    </nav>
    <div class="container-fluid page-body-wrapper">     
    <?php include_once('includes/sidebar.php');?>
          <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <h4 class="card-title" style="padding-left: 20px; padding-top: 20px;">Update Donation Report</h4>
                  <p class="card-description" style="padding-left: 20px;"> 
                    Update Donation Report
                  </p>
                <div class="table-responsive pt-3">
                  
                  <table class="table table-striped project-orders-table" id="reportdonation">
                  <?php if(isset($dreport['donation_id'])){?>
                      <input type="hidden" name="donation_id" value="<?=$dreport['donation_id']?>">
                    <?php }?>
                    <thead>
                      <tr>
                        <th>Date</th>
                        <th>Name of Donor</th>
                        <th>Donation Type</th>
                        <th>Amount</th>
                        <th>Project Supported</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php foreach($main as $dreport): ?>
                <tr>
                    <td><?=$dreport['date']   ?></td>
                    <td><?=$dreport['donor_name'] ?></td>
                    <td><?=$dreport['donation_type'] ?></td>
                    <td><?=$dreport['amount'] ?></td>
                    <td><?=$dreport['project_supported'] ?></td>    
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