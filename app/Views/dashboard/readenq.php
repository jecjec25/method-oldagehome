
<!DOCTYPE html>
<html lang="en">

<head>
  
  <title>Read Inquiry</title>
  <link rel="icon" type="image/png" href="/picture.png">
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
            <h4 class="mb-0">Read Inquiry</h4>
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
                <h4 class="card-title" style="padding-left: 20px; padding-top: 20px;">Read Inquiry</h4>
                  <p class="card-description" style="padding-left: 20px;"> 
                    Inquiry has been read
                  </p>
                <div class="table-responsive pt-3">
                  
                  <table class="table table-striped project-orders-table">
                    <thead>
                        <tr>
                          <th>Name</th>
                          <th>Message</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($cont as $f): ?>
                      <tr>
                        <td><?=$f['Name'] ?></td>
                        <td><?=$f['Message'] ?></td>
                        <td>Read</td>
                        <td>
                          <div class="d-flex align-items-center">
                            <form action="<?= base_url('updateToUnread') ?>" method="post">
                            <input type="hidden" name="update" value="<?=$f['Id']?>">
                            <button class="btn btn-danger btn-sm btn-icon-text mr-3">Mark as unread<i class="typcn typcn-edit btn-icon-append"></i></button>
                            <a href="<?= base_url("deletereadInq/".$f['Id']); ?>" onClick="return confirm('Are you sure you want to delete?')" class="btn btn-danger btn-sm btn-icon-text">
                            Delete <i class="typcn typcn-delete-outline btn-icon-append"></i></a>
                          </form>
                      
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
</html
