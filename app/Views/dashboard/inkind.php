<!DOCTYPE html>
<html lang="en">
<head>
  <title>In-Kind Donations</title>
  <link rel="icon" type="image/png" href="/LogoHapagAruga.png/">
  <link rel="stylesheet" href="login/vendors/typicons/typicons.css">
  <link rel="stylesheet" href="login/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="login/css/vertical-layout-light/style.css">
  <!-- Bootstrap CSS for Modal -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    /* Add some custom styles for the pagination buttons */
    #paginationControls {
      margin-top: 20px;
      text-align: center;
    }

    .page-btn {
      margin: 0 5px;
      padding: 5px 10px;
      cursor: pointer;
      border: 1px solid #ddd;
      border-radius: 5px;
    }

    .page-btn.active {
      background-color: #007bff;
      color: white;
    }

    .page-btn:hover {
      background-color: #0056b3;
      color: white;
    }
  </style>
</head>
<body>
  <div class="container-scroller">
    <?php include_once('includes/header.php');?>       
    <nav class="navbar-breadcrumb col-xl-12 col-12 d-flex flex-row p-0">
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <ul class="navbar-nav mr-lg-2">
          <li class="nav-item ml-0">
            <h4 class="mb-0">In-Kind Donations</h4>
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
     <?php include_once('includes/sidebar.php'); ?>
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <h4 class="card-title" style="padding-left: 20px; padding-top: 20px;">In-Kind Donations</h4>
                <p class="card-description" style="padding-left: 20px;"> 
                  In-Kind Donations of Aruga-Kapatid Foundation Incorporated
                </p>
                <div class="table-responsive pt-3">
                  <table class="table table-striped project-orders-table" id="userbooking">
                    <thead>
                      <tr>
                        <th>Gmail Account</th>
                        <th>Establishment</th>
                        <th>Schedule Date</th>
                        <th>Last Name</th>
                        <th>First Name</th>
                        <th>Middle Name</th>
                        <th>Contact Number</th>
                        <th>Kind of Item to Donate</th>
                        <th>Image</th>
                        <th>Message</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php foreach($inkind as $item): ?>
                    <tr>
                      <td><?=$item['Email'] ?></td>
                      <td><?=$item['Establishment']?></td>
                      <td><?=$item['donationdate']?></td>
                      <td><?=$item['lastname'] ?></td>
                      <td><?=$item['firstname'] ?></td>
                      <td><?=$item['middlename'] ?></td>
                      <td><?=$item['contactnum'] ?></td>
                      <td><?=$item['inKindDonationItem'] ?></td>
                      <td><?php if (!empty($item['picture'])): ?>
                          <img src="<?="upload/inkind/" .$item['picture']?>" alt="Donation Image" style="width: 90px; height: 90px;" data-bs-toggle="modal" data-bs-target="#imageModal-<?= $item['id'] ?>">
                        <?php else: ?>
                          No Image
                        <?php endif; ?></td>
                      <td><?=$item['message'] ?></td>
                      <td>
                        <div class="d-flex align-items-center">
                          <form action="<?= base_url('ReceivedInkind') ?>" method="post">
                            <input type="hidden" name="update" value="<?= $item['id'] ?>">
                            <button class="btn btn-primary btn-sm btn-icon-text" onclick="return confirm('Are you sure you want to archive this form?')" type="submit">
                              Received <i class="typcn typcn-folder-open btn-icon-append"></i>
                            </button>
                          </form>
                          &nbsp;
                          <form action="<?= base_url('PostponedInkind') ?>" method="post" class="me-2">
                            <input type="hidden" name="update" value="<?= $item['id'] ?>">
                            <button class="btn btn-warning btn-sm btn-icon-text" onclick="return confirm('Are you sure you want to archive this form?')" type="submit">
                              Postponed <i class="typcn typcn-archive btn-icon-append"></i>
                            </button>
                          </form>
                          &nbsp;
                          <a href="<?= base_url('deleteinkind/' . $item['id']) ?>" class="btn btn-danger btn-sm btn-icon-text me-2" onclick="return confirm('Are you sure you want to submit this form?')">
                            Delete <i class="typcn typcn-trash btn-icon-append"></i>
                          </a>
                        </div>
                      </td>
                    </tr>

                    <!-- Image Modal -->
                    <div class="modal fade" id="imageModal-<?= $item['id'] ?>" tabindex="-1" aria-labelledby="imageModalLabel-<?= $item['id'] ?>" aria-hidden="true">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="imageModalLabel-<?= $item['id'] ?>">Donation Image</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <img src="<?="upload/inkind/" .$item['picture']?>" class="img-fluid" alt="Donation Image">
                          </div>
                        </div>
                      </div>
                    </div>
                    <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>

                <!-- Pagination Controls -->
                <div id="paginationControls"></div>
              </div>
            </div>
          </div>
        </div>
        <?php include_once('includes/footer.php'); ?>
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
  <!-- Bootstrap JS for Modal -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    $(document).ready(function () {
      const rowsPerPage = 5;
      const rows = $('#userbooking tbody tr');
      const totalPages = Math.ceil(rows.length / rowsPerPage);

      // Append pagination buttons
      for (let i = 1; i <= totalPages; i++) {
        $('#paginationControls').append(`<button class="page-btn" data-page="${i}">${i}</button>`);
      }

      function showPage(page) {
        rows.hide();
        const start = (page - 1) * rowsPerPage;
        const end = start + rowsPerPage;
        rows.slice(start, end).show();
      }

      $('#paginationControls').on('click', '.page-btn', function () {
        const page = $(this).data('page');
        showPage(page);
        $('.page-btn').removeClass('active');
        $(this).addClass('active');
      });

      showPage(1); // Show first page by default
    });
  </script>
</body>
</html>
