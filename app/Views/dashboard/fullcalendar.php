<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin Calendar</title>
  <link rel="icon" type="image/png" href="/picture.png">
  <link rel="stylesheet" href="login/vendors/typicons/typicons.css">
  <link rel="stylesheet" href="login/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="login/css/vertical-layout-light/style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
  <div class="container-scroller">
    <?php include_once('includes/header.php');?>       
    <nav class="navbar-breadcrumb col-xl-12 col-12 d-flex flex-row p-0">
      &nbsp;
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <ul class="navbar-nav mr-lg-2">
          <li class="nav-item ml-0">
            <h4 class="mb-0">Event Calendar</h4>
          </li>
          <li class="nav-item">
            <div class="d-flex align-items-baseline">
              <p class="mb-0">Home</p>
              <i class="typcn typcn-chevron-right"></i>
              <p class="mb-0">Event Calendar</p>
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
                <h4 class="card-title" style="padding-left: 20px; padding-top: 20px;">Event Calendar</h4>
                <p class="card-description" style="padding-left: 20px;">User event booking has been received</p>
                <div class="table-responsive pt-3">
                  <form action="<?= base_url('fundamental/accept') ?>" method="post">
                    <table class="table table-striped project-orders-table" id="userbooking">
                      <?php if(isset($calen['bookingId'])) { ?>
                        <input type="hidden" name="bookingId" value="<?= $calen['bookingId'] ?>">
                      <?php } ?>
                      <thead>
                        <tr>
                          <th>Establishment</th>
                          <th>Last Name</th>
                          <th>First Name</th>
                          <th>Middle Name</th>
                          <th>Contact Number</th>
                          <th>Event</th>
                          <th>Preferred Date</th>
                          <th>Time</th>
                          <th>Equipment</th>
                          <th>Comments</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach($calen as $even): ?>
                        <tr>
                          <td><?= $even['establishment'] ?></td>
                          <td><?= $even['lastname'] ?></td>
                          <td><?= $even['firstname'] ?></td>
                          <td><?= $even['middlename'] ?></td>
                          <td><?= $even['contactnum'] ?></td>
                          <td><?= $even['event'] ?></td>
                          <td><?= $even['prefferdate'] ?></td>
                          <td><?= $even['Time'] ?></td>
                          <td><?= $even['equipment'] ?></td>
                          <td><?= $even['comments'] ?></td>
                          <td>
                            <div class="d-flex align-items-center">
                              <!-- Accept Button -->
                              <form action="<?= base_url('fundamental/accept') ?>" method="post">
                                <input type="hidden" name="accept" value="<?= $even['bookingId'] ?>">
                                <button type="submit" class="btn btn-success btn-sm btn-icon-text mr-3" onclick="return confirm('Are you sure you want to accept the event?')">
                                  Accept <i class="typcn typcn-tick btn-icon-append"></i>
                                </button>
                              </form>
                              <!-- Decline Button -->
                              <button type="button" class="btn btn-danger btn-sm btn-icon-text" 
                                      data-toggle="modal" 
                                      data-target="#declineModal" 
                                      data-booking-id="<?= $even['bookingId'] ?>">
                                Decline <i class="typcn typcn-times btn-icon-append"></i>
                              </button>
                            </div>
                          </td>
                        </tr>
                        <?php endforeach; ?>
                      </tbody>
                    </table>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php include_once('includes/footer.php');?>
      </div>
    </div>
  </div>

  <!-- Modal for Declining Event -->
  <div class="modal fade" id="declineModal" tabindex="-1" role="dialog" aria-labelledby="declineModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="declineModalLabel">Decline Event</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="<?= base_url('fullcalendar/decline') ?>" method="post">
          <div class="modal-body">
            <input type="hidden" name="decline" id="declineBookingId">
            <div class="form-group">
              <label for="declineReason">Reason for Declining</label>
              <textarea class="form-control" id="declineReason" maxlength="60" name="declineReason" rows="4" required></textarea>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-danger">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Scripts -->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="login/vendors/js/vendor.bundle.base.js"></script>
  <script src="login/vendors/chart.js/Chart.min.js"></script>
  <script src="login/js/off-canvas.js"></script>
  <script src="login/js/hoverable-collapse.js"></script>
  <script src="login/js/template.js"></script>
  <script src="login/js/settings.js"></script>
  <script src="login/js/todolist.js"></script>
  <script src="login/js/dashboard.js"></script>

  <!-- Modal Script -->
  <script>
    $('#declineModal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget); // Button that triggered the modal
      var bookingId = button.data('booking-id'); // Extract info from data-* attributes
      var modal = $(this);
      modal.find('#declineBookingId').val(bookingId); // Insert booking ID into hidden input
    });
  </script>
</body>
</html>
