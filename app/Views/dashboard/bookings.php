<!DOCTYPE html>
<html lang="en">
<head>
  <title>Event Accepted</title>
  <link rel="icon" type="image/png" href="/picture.png">
  <link rel="stylesheet" href="login/vendors/typicons/typicons.css">
  <link rel="stylesheet" href="login/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="login/css/vertical-layout-light/style.css">
  <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.css' rel='stylesheet' />
  <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.js'></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" />
  

  <script src="login/vendors/js/vendor.bundle.base.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

  <style>
    .btnv {
      display: inline-block;
      padding: 10px 20px;
      font-size: 16px;
      color: white;
      background-color: #007BFF;
      text-align: center;
      text-decoration: none;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }
    #calendars {
      width: 100%; 
      height:auto;
      transition: max-height 0.3s ease, opacity 0.3s ease; 
      overflow: hidden;
      max-height: 0; 
      opacity: 0; 
    }
    #calendars.show {
      max-height: 500px;
      opacity: 1; 
    }
    .main-content {
      padding: 20px;
    }
  </style>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendars');
    var events = <?php echo json_encode($events); ?>;

    function formatDate(dateStr) {
      var date = new Date(dateStr);
      return date.toLocaleDateString('en-US', {
        year: 'numeric',
        month: 'long',
        day: 'numeric'
      });
    }

    var calendar = new FullCalendar.Calendar(calendarEl, {
      initialView: 'dayGridMonth',
      events: events,
      dateClick: function(info) {
        var selectedDateEvents = events.filter(function(event) {
          return event.start === info.dateStr;
        });

        var modalBody = document.getElementById('event-details');
        modalBody.innerHTML = '';

        if (selectedDateEvents.length > 0) {
          selectedDateEvents.forEach(function(event) {
            modalBody.innerHTML += `
              <p><strong>Establishment:</strong> ${event.establishment}</p>
              <p><strong>Name:</strong> ${event.firstname} ${event.middlename} ${event.lastname}</p>
              <p><strong>Title:</strong> ${event.title}</p>
              <p><strong>Date:</strong> ${formatDate(event.start)}</p>
              <p><strong>Time:</strong> ${event.time ? event.time : 'N/A'}</p>
              <hr>
            `;
          });
        } else {
          modalBody.innerHTML = '<p>No events scheduled for this day.</p>';
        }

        var myModal = new bootstrap.Modal(document.getElementById('eventModal'));
        myModal.show();
      }
    });
    calendar.render();

    document.getElementById('openCalendarBtn').addEventListener('click', function() {
      calendarEl.classList.add('show'); 
    });

    document.getElementById('closeCalendarBtn').addEventListener('click', function() {
      calendarEl.classList.remove('show'); 
    });
  });
</script>
</head>

<body>
  <div class="container-scroller">
    <?php include_once('includes/header.php');?>

    <nav class="navbar-breadcrumb col-xl-12 col-12 d-flex flex-row p-0">
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <ul class="navbar-nav mr-lg-2">
          <li class="nav-item ml-0">
            <h4 class="mb-0">Accepted Event</h4>
          </li>
          <li class="nav-item">
            <div class="d-flex align-items-baseline">
              <p class="mb-0">Home</p>
              <i class="typcn typcn-chevron-right"></i>
              <p class="mb-0">
                <a href="ADbooking" style="color: white;">Event Calendar</a>
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
          <button id="openCalendarBtn" class="btnv">Open Calendar</button>
          <button id="closeCalendarBtn" class="btnv" style="background-color: #dc3545;">Close Calendar</button>

          <div id='calendars' class="main-content"></div>

          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <h4 class="card-title" style="padding-left: 20px; padding-top: 20px;">Accepted Event of Admin</h4>
                <p class="card-description" style="padding-left: 20px;">User event has been booked.</p>
                <div class="table-responsive pt-3">
                  <form action="<?= base_url('fundamental/accept') ?>" method="post">
                    <table class="table table-striped project-orders-table" id="userbooking">
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
                          <th>Description</th>
                          <th>Amount</th>
                          <th>Outcomes</th>
                          <th>Acknowledgement</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach($calen as $even): ?>
                          <tr>
                            <td><?=$even['establishment'] ?></td>
                            <td><?=$even['lastname'] ?></td>
                            <td><?=$even['firstname'] ?></td>
                            <td><?=$even['middlename'] ?></td>
                            <td><?=$even['contactnum'] ?></td>
                            <td><?=$even['event']?></td>
                            <td><?=$even['prefferdate'] ?></td>
                            <td><?=$even['Time'] ?></td>
                            <td><?=$even['equipment'] ?></td>
                            <td><?=$even['comments'] ?></td>
                            <td><?=$even['description'] ?></td>
                            <td><?=$even['amount_raised'] ?></td>
                            <td><?=$even['outcomes'] ?></td>
                            <td><?=$even['acknowledgement'] ?></td>
                            <td><?=$even['status']?></td>
                            <td>
                              <a href="<?= base_url('viewEvent/') . $even['id']?>" class="btnv">View Event</a>
                            </td>
                            <td>
                              <a href="<?= base_url("deleteAcceptedEvent/" . $even['id']); ?>" onClick="return confirm('Are you sure you want to delete?')" class="btn btn-danger btn-sm btn-icon-text">
                              Delete <i class="typcn typcn-delete-outline btn-icon-append"></i></a>
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

  <div class="modal fade" id="eventModal" tabindex="-1" aria-labelledby="eventModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="eventModalLabel">Event Details</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="event-details"></div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
