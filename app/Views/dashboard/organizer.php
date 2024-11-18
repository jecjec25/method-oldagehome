<!DOCTYPE html>
<html lang="en">
<head>
  <title>Received Monetary Donations</title>
  <link rel="icon" type="image/png" href="<?= base_url('picture.png') ?>">
  <link rel="stylesheet" href="<?= base_url('login/vendors/typicons/typicons.css') ?>">
  <link rel="stylesheet" href="<?= base_url('login/vendors/css/vendor.bundle.base.css') ?>">
  <link rel="stylesheet" href="<?= base_url('login/css/vertical-layout-light/style.css') ?>">
</head>
<body>
  <div class="container-scroller">
    <?php include_once('includes/header.php'); ?>
    <nav class="navbar-breadcrumb col-xl-12 col-12 d-flex flex-row p-0">
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <ul class="navbar-nav mr-lg-2">
          <li class="nav-item ml-0">
            <h4 class="mb-0">Received Monetary Donations</h4>
          </li>
          <li class="nav-item">
            <div class="d-flex align-items-baseline">
              <p class="mb-0">Home</p>
              <i class="typcn typcn-chevron-right"></i>
              <p class="mb-0"><a href="<?= base_url('userdonatedtable') ?>" style="color: white;">Donation</a></p>
            </div>
          </li>
        </ul>
      </div>
    </nav>
    
    <div class="container-fluid page-body-wrapper">
      <?php include_once('includes/sidebar.php'); ?>
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <h4 class="card-title" style="padding-left: 20px; padding-top: 20px;">Received Monetary Donations</h4>
                <p class="card-description" style="padding-left: 20px;"> 
                  Received Monetary Donations of Aruga-Kapatid Foundation Incorporated
                </p>
                <div class="table-responsive pt-3">
                  <form action="<?= base_url('fundamental/accept') ?>" method="post">
                    <?php if (isset($calen['bookingId'])) : ?>
                      <input type="hidden" name="bookingId" value="<?= $calen['bookingId'] ?>">
                    <?php endif; ?>
                  </form>
                  <table class="table table-striped project-orders-table" id="userbooking">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php if (!empty($org)) : ?>
                        <?php foreach ($org as $organizer) : ?>
                          <tr>
                            <td><?= htmlspecialchars($organizer['name'], ENT_QUOTES, 'UTF-8') ?></td>
                            <td><?= htmlspecialchars($organizer['position'], ENT_QUOTES, 'UTF-8') ?></td>
                            <td>
                              <a href="<?= base_url('editmember/' . $organizer['id']) ?>" class="btn btn-primary">
                                Edit <i class="typcn typcn-edit btn-icon-append"></i>
                              </a>
                              <a href="<?= base_url('HomeController/deleteOrganizer/' . $organizer['id']) ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this record?')">
                                Delete <i class="typcn typcn-trash btn-icon-append"></i>
                              </a>
                            </td>
                          </tr>
                        <?php endforeach; ?>
                      <?php else : ?>
                        <tr>
                          <td colspan="3" class="text-center">No Records Found</td>
                        </tr>
                      <?php endif; ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php include_once('includes/footer.php'); ?>
      </div>
    </div>
  </div>

  <script src="<?= base_url('login/vendors/js/vendor.bundle.base.js') ?>"></script>
  <script src="<?= base_url('login/vendors/chart.js/Chart.min.js') ?>"></script>
  <script src="<?= base_url('login/js/off-canvas.js') ?>"></script>
  <script src="<?= base_url('login/js/hoverable-collapse.js') ?>"></script>
  <script src="<?= base_url('login/js/template.js') ?>"></script>
  <script src="<?= base_url('login/js/settings.js') ?>"></script>
  <script src="<?= base_url('login/js/todolist.js') ?>"></script>
  <script src="<?= base_url('login/js/dashboard.js') ?>"></script>
</body>
</html>
