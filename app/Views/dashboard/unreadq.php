
<!DOCTYPE html>
<html lang="en">
<head>
  
  <title>Unread Inquiry</title>
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
            <h4 class="mb-0">Unread Inquiry</h4>
          </li>
          <li class="nav-item">
            <div class="d-flex align-items-baseline">
              <p class="mb-0">Home</p>
              <i class="typcn typcn-chevron-right"></i>
              <p class="mb-0">Inquiry</p>
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
                <h4 class="card-title" style="padding-left: 20px; padding-top: 20px;">Unread Inquiry</h4>
                  <p class="card-description" style="padding-left: 20px;"> 
                    Inquiry has been received
                  </p>
                <div class="table-responsive pt-3">
                  
                  <table class="table table-striped project-orders-table" id="tblcontact">
                    <?php if(isset($f['Id'])){?>
                      <input type="hidden" name="Id" value="<?=$f['Id']?>">
                    <?php }?>
                    <thead>
                        <tr>
                          <th>Name</th>
                          <th>Phone</th>
                          <th>Email</th>
                          <th>Enquiry Date</th>
                          <th>Message</th>
                          <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($cont as $f): ?>
                    <tr>
                      <td><?=$f['Name'] ?></td>
                      <td><?=$f['Phone'] ?></td>
                      <td><?=$f['Email'] ?></td>
                      <td><?=$f['Enquiry_Date'] ?></td>
                      <td><?=$f['Message'] ?></td>
                      <td>
                          <div class="d-flex align-items-center">
                            <form action="<?= base_url('updateToRead') ?>" method="post">
                            <input type="hidden" name="update" value="<?=$f['Id']?>">
                            <button class="btn btn-success btn-sm btn-icon-text mr-3">Read <i class="typcn typcn-edit btn-icon-append"></i></button>
                          </form>
                      
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