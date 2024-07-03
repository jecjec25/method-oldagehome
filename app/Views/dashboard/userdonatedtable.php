
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Monetary Donations</title>
  <link rel="icon" type="image/png" href="/picture2.png">
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
            <h4 class="mb-0">Monetary Donations</h4>
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
     <?php include_once('includes/sidebar.php');?>
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <h4 class="card-title" style="padding-left: 20px; padding-top: 20px;">Monetary Donations</h4>
                  <p class="card-description" style="padding-left: 20px;"> 
                    Monetary Donations of Aruga-Kapatid Foundation Incorporated
                  </p>
                <div class="table-responsive pt-3">
                <form action="<?= base_url('fundamental/accept') ?>" method ="post">
                  <table class="table table-striped project-orders-table" id="userbooking">
                    <?php if(isset($calen['bookingId'])){?>
                      <input type="hidden" name="bookingId" value="<?=$calen['bookingId']?>">
                    <?php }?>
              </form>
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
                            <img src="<?="upload/monetary/" .$dnt['picture']?>" alt="Donation Image" style="width: 90px; height: 90px;">

                        <?php else: ?>
                            No Image
                        <?php endif; ?></td>
                      
                      <td><?=$dnt['message'] ?></td>
                      <td>
    <div class="d-flex align-items-center">
        <input type="hidden" name="delete" value="<?= $dnt['id'] ?>">
        
        <!-- Received Form -->
        <form action="<?= base_url('ReceivedMonetary') ?>" method="post">
            <input type="hidden" name="update" value="<?= $dnt['id'] ?>">
            <button class="btn btn-primary btn-sm btn-icon-text" onclick="return confirm('Are you sure you want to archive this form?')" type="submit">
                Received <i class="typcn typcn-folder-open btn-icon-append"></i>
            </button>
        </form>
        
        <!-- Space between forms -->
        &nbsp;
        
        <!-- Postpone Form -->
        <form action="<?= base_url('PosponedMonetary') ?>" method="post" class="me-2">
            <input type="hidden" name="update" value="<?= $dnt['id'] ?>">
            <button class="btn btn-warning btn-sm btn-icon-text" onclick="return confirm('Are you sure you want to archive this form?')" type="submit">
                Postponed <i class="typcn typcn-archive btn-icon-append"></i>
            </button>
        </form>
        
        <!-- Space between forms -->
        &nbsp;
        
        <!-- Delete Button -->
        <a href="<?= base_url('deletedonate/' . $dnt['id']) ?>" class="btn btn-danger btn-sm btn-icon-text me-2" onclick="return confirm('Are you sure you want to delete this form?')">
            Delete <i class="typcn typcn-trash btn-icon-append"></i>
        </a>
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