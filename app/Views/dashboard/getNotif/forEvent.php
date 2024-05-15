<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin Calendar</title>
  <link rel="stylesheet" href="login/vendors/typicons/typicons.css">
  <link rel="stylesheet" href="login/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="login/css/vertical-layout-light/style.css">
</head>
<body>
  
  <div class="container-scroller">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <h4 class="card-title" style="padding-left: 20px; padding-top: 20px;">Event Calendar</h4>
                <div class="table-responsive pt-3">
                <form action="<?= base_url('fundamental/accept') ?>" method="post">
                  <table class="table table-striped project-orders-table" id="userbooking">
                    <?php if (isset($calen['bookingId'])) { ?>
                      <input type="hidden" name="bookingId" value="<?=$calen['bookingId']?>">
                    <?php } ?>
                    <thead>
                        <tr>
                          <th>Last Name</th>
                          <th>First Name</th>
                          <th>Middle Name</th>
                          <th>Contact Number</th>
                          <th>Event</th>
                          <th>Preffered Date</th>
                          <th>Time</th>
                          <th>Equipment</th>
                          <th>Comments</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php if (!empty($even)) { ?>
                        <tr>
                          <td><?=$even['lastname'] ?></td>
                          <td><?=$even['firstname'] ?></td>
                          <td><?=$even['middlename'] ?></td>
                          <td><?=$even['contactnum'] ?></td>
                          <td><?=$even['event']?></td>
                          <td><?=$even['prefferdate'] ?></td>
                          <td><?=$even['Time'] ?></td>
                          <td><?=$even['equipment'] ?></td>
                          <td><?=$even['comments'] ?></td>
                          <td>
                              <div class="d-flex align-items-center">
                                <form action="<?= base_url('fundamental/accept')?>" method="post">
                                <input type="hidden" name="accept" value="<?= $even['bookingId']?>">
                                <button type="submit" class="btn btn-success btn-sm btn-icon-text mr-3" onclick="return confirm('Are you sure you want to accept the event?')">Accept<i class="typcn typcn-tick btn-icon-append"></i></button>
                                </form>
                                <!-- Decline Button -->
                                <form action="<?= base_url('fullcalendar/decline')?>" method="post">
                                <input type="hidden" name="decline" value="<?= $even['bookingId']?>">
                                <button type="submit" class="btn btn-danger btn-sm btn-icon-text" onclick="return confirm('Are you sure you want to decline the event?')">Decline<i class="typcn typcn-times btn-icon-append"></i></button>
                                </form>  
                              </div>
                          </td>
                        </tr>
                      <?php } else { ?>
                        <tr>
                          <td colspan="9">No event found</td>
                        </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </form>
                </div>
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
</body>
</html>
