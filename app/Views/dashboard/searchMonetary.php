
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Table Report of Monetary Donations</title>
  <link rel="icon" type="image/png" href="/picture.png">
  <link rel="stylesheet" href="login/vendors/typicons/typicons.css">
  <link rel="stylesheet" href="login/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="login/css/vertical-layout-light/style.css">
</head>
<style>
  .button-print {
    float: left;
}

.table {
    width: 100%;
    margin-bottom: 20px;
}

.table-striped tbody>tr:nth-child(odd)>td,
.table-striped tbody>tr:nth-child(odd)>th {
    background-color: #f9f9f9;
}

@media print {

    #PrintButton,
    .navbar-breadcrumb,
    .sidebar,
    .header {
        display: none !important;
    }

    .content-wrapper {
        width: auto !important;
        margin: 0 !important;
        padding: 0 !important;
    }

    .main-panel {
        width: 100% !important;
    }
}

@page {
    size: auto;
    /* auto is the initial value */
    margin: 0;
    /* this affects the margin in the printer settings */


}

.button-print {
    text-align: right;

}

.button-print button {
    background-color: #007bff;
    color: #fff;
    padding: 8px 16px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

.edit-button {
    background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 10px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
    border-radius: 4px;
}

.edit-button:hover {
    background-color: #45a049;
}
</style>
<body>
  
  <div class="container-scroller">
    <?php include_once('includes/header.php');?>       
    <nav class="navbar-breadcrumb col-xl-12 col-12 d-flex flex-row p-0">
&nbsp;
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <ul class="navbar-nav mr-lg-2">
          <li class="nav-item ml-0">
            <h4 class="mb-0">Table Report of Monetary Donations</h4>
          </li>
          <li class="nav-item">
            <div class="d-flex align-items-baseline">
              <p class="mb-0">Home</p>
              <i class="typcn typcn-chevron-right"></i>
              <p class="mb-0">Reporting</p>
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
                <h4 class="card-title" style="padding-left: 20px; padding-top: 20px;">Table Report of Monetary Donations</h4>
                  <p class="card-description" style="padding-left: 20px;"> 
                    Table Report of Monetary Donations of Aruga-Kapatid Foundation Incorporated
                  </p>
                  <div class="button-print">
                  <a class="btn btn-primary"
                    href="<?= base_url('previewMonetary/' .$fromdate. '/' . $todate ) ?>" id="PrintButton">Preview</a>
                  </div>
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
                          <th>Mumo sa Hapag</th>
                          <th>Message</th>
                          <th>Action</th>
                         
                        </tr> 
                    </thead>
                    <tbody>
                    <?php foreach($Monetary as $mntry): ?>
                    <tr>
                    <td><?=$mntry['Email'] ?></td>
                    <td>
                    <?php
                    $dateString = $mntry['donationdate'];
                    $date = new DateTime($dateString);
                    echo $date->format('F j, Y g:i A');
                    ?>
                </td>
                <td><?php if($mntry['establishment'] == null):?><p>No Establishment Inserted</p><?php else:?><?= $mntry['establishment']?><?php endif;?></td>
                      <td><?=$mntry['lastname'] ?></td>
                      <td><?=$mntry['firstname'] ?></td>
                      <td><?=$mntry['middlename'] ?></td>
                      <td><?=$mntry['contactnum'] ?></td>
                      <td><?=$mntry['referencenum'] ?></td>
                      <td><?php if($mntry['cashDonation'] == 0 || $mntry['cashDonation'] == NULL):?>
                        <p>No Cash Donation</p>
                        <?php else:?>
                      <?=$mntry['cashDonation'] ?> <?php endif;?></td>
                      <td><?php if($mntry['cashCheck'] == 0 || $mntry['cashCheck'] == NULL):?>
                        <p>No Cash Check</p>
                        <?php else:?>
                      <?=$mntry['cashCheck'] ?> <?php endif;?></td>
                      <td><?php if (!empty($mntry['picture'])): ?>
                            <img src="<?="upload/monetary/" .$mntry['picture']?>" alt="Donation Image" style="width: 90px; height: 90px;">

                        <?php else: ?>
                            No Image
                        <?php endif; ?></td>

                        <td>

                          <?php if($mntry['mumosahapag'] == 0):?>  
                            <p>Mumo sa hapag is Empty</p>
                            <?php else:?>
                        <?= '₱'. number_format($mntry['mumosahapag'],2  ) ?>
                        <?php endif; ?>
                          
                      </td>                      
                      <td><?=$mntry['message'] ?></td>
                <td>    <a href="<?= base_url('getToeditMonetary/' . $mntry['id'])?>" class="btn btn-primary">Edit</a></td>
                    </tr>
                    <?php endforeach; ?>
                    </tbody>
                  </table>
                  
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <a href="/reportMonetary" class="btn btn-secondary">Back</a>
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