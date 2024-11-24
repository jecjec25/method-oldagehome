<!DOCTYPE html>
<html lang="en">
<head>
  <title>Update Organization</title>
  <link rel="icon" type="image/png" href="<?= base_url('picture.png') ?>">
  <link rel="stylesheet" href="<?= base_url('login/vendors/typicons/typicons.css') ?>">
  <link rel="stylesheet" href="<?= base_url('login/vendors/css/vendor.bundle.base.css') ?>">
  <link rel="stylesheet" href="<?= base_url('login/css/vertical-layout-light/style.css') ?>">
  <style>
    /* Modal Styles */
    .modal {
      display: none; 
      position: fixed; 
      z-index: 1; 
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.8); 
      padding-top: 60px;
    }

    .modal-content {
      margin: auto;
      display: block;
      width: 80%;
      max-width: 700px;
    }

    .close {
      position: absolute;
      top: 15px;
      right: 35px;
      color: #f1f1f1;
      font-size: 40px;
      font-weight: bold;
      transition: 0.3s;
      cursor: pointer;
    }

    .close:hover,
    .close:focus {
      color: #bbb;
      text-decoration: none;
      cursor: pointer;
    }
  </style>
</head>
<body>
  <div class="container-scroller">
    <?php include_once('includes/header.php'); ?>
    <nav class="navbar-breadcrumb col-xl-12 col-12 d-flex flex-row p-0">
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <ul class="navbar-nav mr-lg-2">
          <li class="nav-item ml-0">
            <h4 class="mb-0">Update Member</h4>
          </li>
          <li class="nav-item">
            <div class="d-flex align-items-baseline">
              <p class="mb-0">Home</p>
              <i class="typcn typcn-chevron-right"></i>
              <p class="mb-0"><a href="<?= base_url('insertMember') ?>" style="color: white;">Organization</a></p>
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
                <h4 class="card-title" style="padding-left: 20px; padding-top: 20px;">Organizational Chart</h4>
                <p class="card-description" style="padding-left: 20px;"> 
                  Update members of the organization
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
                        <th>Image</th>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php if (!empty($org)) : ?>
                        <?php foreach ($org as $organizer) : ?>
                          <tr>
                            <td>
                              <!-- Image with an onclick event to open the modal -->
                              <img src="<?= base_url('images/' . htmlspecialchars($organizer['img'], ENT_QUOTES, 'UTF-8')) ?>" alt="Organizer Image" 
                                   style="width: 100px; height: 100px; border-radius: 10px; object-fit: cover;" 
                                   onclick="openModal('<?= base_url('images/' . htmlspecialchars($organizer['img'], ENT_QUOTES, 'UTF-8')) ?>')">
                            </td>
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

  <!-- Modal Structure -->
  <div id="imageModal" class="modal">
    <span class="close" onclick="closeModal()" style="font-size:90px;">&times;</span>
    <img class="modal-content" id="modalImage">
  </div>

  <script src="<?= base_url('login/vendors/js/vendor.bundle.base.js') ?>"></script>
  <script src="<?= base_url('login/vendors/chart.js/Chart.min.js') ?>"></script>
  <script src="<?= base_url('login/js/off-canvas.js') ?>"></script>
  <script src="<?= base_url('login/js/hoverable-collapse.js') ?>"></script>
  <script src="<?= base_url('login/js/template.js') ?>"></script>
  <script src="<?= base_url('login/js/settings.js') ?>"></script>
  <script src="<?= base_url('login/js/todolist.js') ?>"></script>
  <script src="<?= base_url('login/js/dashboard.js') ?>"></script>

  <script>
    // Function to open the modal with the clicked image
    function openModal(imageSrc) {
      var modal = document.getElementById("imageModal");
      var modalImage = document.getElementById("modalImage");
      modal.style.display = "block"; // Show the modal
      modalImage.src = imageSrc; // Set the image source to the clicked image
    }

    // Function to close the modal
    function closeModal() {
      var modal = document.getElementById("imageModal");
      modal.style.display = "none"; // Hide the modal
    }
  </script>
</body>
</html>
