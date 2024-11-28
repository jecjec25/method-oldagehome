<!DOCTYPE html>
<html lang="en">
<head>
  <title>Received Monetary Donations</title>
  <link rel="icon" type="image/png" href="/picture.png">
  <link rel="stylesheet" href="login/vendors/typicons/typicons.css">
  <link rel="stylesheet" href="login/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="login/css/vertical-layout-light/style.css">
  <style>
    .modal {
        display: none;
        position: fixed;
        z-index: 1000;
        padding-top: 60px;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0, 0, 0, 0.8);
    }
    .modal-content {
        margin: auto;
        display: block;
        width: 80%;
        max-width: 700px;
    }
    .modal-content img {
        width: 100%;
        height: auto;
    }
    .close {
        position: absolute;
        top: 30px;
        right: 35px;
        color: white;
        font-size: 40px;
        font-weight: bold;
        cursor: pointer;
    }
    .table-responsive {
        overflow-x: auto;
    }
    /* Pagination */
    .pagination {
        display: flex;
        justify-content: center;
        margin-top: 20px;
    }
    .pagination .page-item {
        margin: 0 5px;
    }
    .pagination .page-item a {
        color: #007bff;
        text-decoration: none;
    }
    .pagination .page-item.active a {
        font-weight: bold;
        color: #0056b3;
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
            <h4 class="mb-0">Received Monetary Donations</h4>
          </li>
          <li class="nav-item">
            <div class="d-flex align-items-baseline">
              <p class="mb-0">Home</p>
              <i class="typcn typcn-chevron-right"></i>
              <p class="mb-0">
                <a href="userdonatedtable" style="color: white;">Donation</a>
              </p>
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
                <h4 class="card-title" style="padding-left: 20px; padding-top: 20px;">Received Monetary Donations</h4>
                  <p class="card-description" style="padding-left: 20px;"> 
                    Received Monetary Donations of Aruga-Kapatid Foundation Incorporated
                  </p>
                <div class="table-responsive pt-3">
                  <form action="<?= base_url('fundamental/accept') ?>" method="post">
                    <?php if(isset($calen['bookingId'])){?>
                        <input type="hidden" name="bookingId" value="<?=$calen['bookingId']?>">
                    <?php }?>
                    <table class="table table-striped project-orders-table" id="userbooking">
                      <thead>
                        <tr>
                          <th>Gmail Account</th>
                          <th>Date</th>
                          <th>Establishment</th>
                          <th>Last Name</th>
                          <th>First Name</th>
                          <th>Middle Name</th>
                          <th>Contact Number</th>
                          <th>Receipt Number</th>
                          <th>Cash Donation</th>
                          <th>Cash Check</th>
                          <th>Image</th>
                          <th>Mumo sa Hapag</th>
                          <th>Message</th>
                          <th>Actions</th>
                        </tr> 
                      </thead>
                      <tbody>
                        <?php foreach($donate as $dnt): ?>
                        <tr>
                          <td><?=$dnt['Email'] ?></td>
                          <td>
                            <?php
                            $dateString = $dnt['donationdate'];
                            $date = new DateTime($dateString);
                            echo $date->format('F j, Y g:i A');
                            ?>
                          </td>
                          <td><?php if($dnt['establishment'] == null):?><p>No Establishment Inserted</p><?php else:?><?= $dnt['establishment']?><?php endif;?></td>
                          <td><?=$dnt['lastname'] ?></td>
                          <td><?=$dnt['firstname'] ?></td>
                          <td><?=$dnt['middlename'] ?></td>
                          <td><?=$dnt['contactnum'] ?></td>
                          <td><?=$dnt['referencenum'] ?></td>
                          <td><?php if($dnt['cashDonation'] == 0 || $dnt['cashDonation'] == NULL):?>
                            <p>No Cash Donation</p>
                            <?php else:?>
                          <?=$dnt['cashDonation'] ?> <?php endif;?></td>
                          <td><?php if($dnt['cashCheck'] == 0 || $dnt['cashCheck'] == NULL):?>
                            <p>No Cash Check</p>
                            <?php else:?>
                          <?=$dnt['cashCheck'] ?> <?php endif;?></td>
                          <td><?php if (!empty($dnt['picture'])): ?>
                                <img src="<?="upload/monetary/" .$dnt['picture']?>" alt="Donation Image" style="width: 90px; height: 90px;" onclick="openModal(this)">
                            <?php else: ?>
                                No Image
                            <?php endif; ?></td>
                          <td>
                            <?php if($dnt['mumosahapag'] == 0):?>  
                              <p>Mumo sa hapag is Empty</p>
                              <?php else:?>
                            <?= '₱'. number_format($dnt['mumosahapag'],2  ) ?>
                            <?php endif; ?>
                          </td>                       
                          <td><?=$dnt['message'] ?></td>
                          <td><a href="<?= base_url('getToeditMonetary/' . $dnt['id'])?>" class="btn btn-primary">Edit</a></td>
                          <td><a href="<?= base_url('deleteReceiveMonetary/' . $dnt['id']) ?>" class="btn btn-danger btn-sm btn-icon-text me-2" onclick="return confirm('Are you sure you want to delete this form?')">
                            Delete <i class="typcn typcn-trash btn-icon-append"></i>
                            </a></td>
                        </tr>
                        <?php endforeach; ?>
                      </tbody>
                    </table>
                  </form>
                  <ul class="pagination" id="paginationControls"> </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php include_once('includes/footer.php');?>
      </div>
    </div>
  </div>

  <div id="imageModal" class="modal">
      <span class="close" onclick="closeModal()" style="font-size:90px;">&times;</span>
      <div class="modal-content">
          <img id="modalImage" src="" alt="Large Profile Picture">
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
  <script src="https://code.jquery.com//jquery-3.7.1.js" integrity="sha256-eKHayi8LEQwp4NKxN+3qOVUtJn3QNZ0ciWLP4=" crossorigin="anonymous"></script>

  <script>
    $(document).ready(function () {
        const rowsPerPage = 7;
        const rows = $('#userbooking tbody tr');
        const rowsCount = rows.length;
        const pageCount = Math.ceil(rowsCount / rowsPerPage);

        for (let i = 1; i <= pageCount; i++) {
            $('#paginationControls').append(`<li class="page-item"> <a href="#" class="page-link">${i}</a> </li>`);
        }

        displayPage(1);

        $('#paginationControls').on('click', '.page-link', function (e) {
            e.preventDefault();
            const pageNum = $(this).text();
            displayPage(pageNum);
        });

        function displayPage(pageNum) {
            const start = (pageNum - 1) * rowsPerPage;
            const end = start + rowsPerPage;
            rows.hide().slice(start, end).show();
            $('#paginationControls li').removeClass('active');
            $('#paginationControls li').eq(pageNum - 1).addClass('active');
        }
    });

    function openModal(imgElement) {
        const modal = document.getElementById('imageModal');
        const modalImage = document.getElementById('modalImage');
        modal.style.display = 'block';
        modalImage.src = imgElement.src;
    }

    function closeModal() {
        const modal = document.getElementById('imageModal');
        modal.style.display = 'none';
    }
  </script>
</body>
</html>
