
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

    <script>
    document.addEventListener('DOMContentLoaded', function() {
      var calendarEl = document.getElementById('calendar');
      var events = <?php echo json_encode($events); ?>;

      var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        events: events,
        dateClick: function(info) {
          var title = prompt('Event Title:');
          if (title) {
            var eventData = {
              title: title,
              start: info.dateStr,
              end: info.dateStr
            };
            calendar.addEvent(eventData);
          }
        }
      });
      calendar.render();
    });
  </script>


  
</head>
<style>
  .btnv {
    display: inline-block;
    padding: 10px 20px;
    font-size: 16px;
    color: white;
    background-color: #007BFF; /* Blue background */
    text-align: center;
    text-decoration: none;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}
#calendar
{
  width: auto;
}


</style>

  
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
          <div id='calendar'></div> 
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <h4 class="card-title" style="padding-left: 20px; padding-top: 20px;">Accepted Event of Admin</h4>
                <p class="card-description" style="padding-left: 20px;"> 
                  User event has been booked.
                </p>
                <div class="table-responsive pt-3">
                  <form action="<?= base_url('fundamental/accept') ?>" method ="post">
                    <table class="table table-striped project-orders-table" id="userbooking">
                      <thead>
                        <tr>
                          <th>Establishment</th>
                          <th>Last Name</th>
                          <th>First Name</th>
                          <th>Middle Name</th>
                          <th>Contact Number</th>
                          <th>Event</th>
                          <th>Preffered Date</th>
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
                            <a href="<?= base_url("deleteAcceptedEvent/" .$even['id']); ?>" onClick="return confirm('Are you sure you want to delete?')" class="btn btn-danger btn-sm btn-icon-text">
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



  <script src="login/vendors/js/vendor.bundle.base.js"></script>
  <script src="login/vendors/chart.js/Chart.min.js"></script>
  <script src="login/js/off-canvas.js"></script>
  <script src="login/js/hoverable-collapse.js"></script>
  <script src="login/js/template.js"></script>
  <script src="login/js/settings.js"></script>
  <script src="login/js/todolist.js"></script>
  <script src="login/js/dashboard.js"></script>

  <!-- <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var events = <?php echo json_encode($events); ?>; // Pass PHP events to JavaScript

            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                events: events,
                dateClick: function(info) {
                    var title = prompt('Event Title:');
                    if (title) {
                        var eventData = {
                            title: title,
                            start: info.dateStr,
                            end: info.dateStr
                        };
                        alert('Event added (not saved): ' + eventData.title);
                        // Here you can add logic to display the new event in the calendar
                        calendar.addEvent(eventData); // Add event to the calendar view
                    }
                }
            });
            calendar.render();
        });
    </script> -->
</body>
</html>