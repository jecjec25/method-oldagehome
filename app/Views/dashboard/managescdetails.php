
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
                        <th class="ml-5">#</th>
                        <th>Name</th>
                        <th>Date of Birth</th>
                        <th>Contact Number</th>
                        <th>Communication Address</th>
                        <th>Emergency Contact Number</th>
                        <th>Emergency Contact Number</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php foreach($main as $k): ?>
                <tr>
                    <td><?=$k['Id']   ?></td>
                    <td><?=$k['Name'] ?></td>
                    <td><?=$k['DateBirth'] ?></td>
                    <td><?=$k['ContNum'] ?></td>
                    <td><?=$k['ComAdd'] ?></td>
                    <td><?=$k['EmergencyAdd'] ?></td>
                    <td><?=$k['EmergencyContNum'] ?></td>
                    <td>
                          <div class="d-flex align-items-center">
                            <a href="<?= base_url('edit/') .$k['Id']?>" class="btn btn-success btn-sm btn-icon-text mr-3">Edit <i class="typcn typcn-edit btn-icon-append"></i> </a> 
                            <a href="<?= base_url("delete/".$k['Id']); ?>" onClick="return confirm('Are you sure you want to delete?')" class="btn btn-danger btn-sm btn-icon-text">Delete <i class="typcn typcn-delete-outline btn-icon-append"></i></a>
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