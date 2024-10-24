<!DOCTYPE html>
<html lang="en">

<head>
  <title>Published Events</title>
  <link rel="icon" type="image/png" href="/picture.png">
  <link rel="stylesheet" href="login/vendors/typicons/typicons.css">
  <link rel="stylesheet" href="login/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="login/vendors/select2/select2.min.css">
  <link rel="stylesheet" href="login/vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
  <link rel="stylesheet" href="login/css/vertical-layout-light/style.css">
  <script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
</head>

<body>
<div class="container-scroller">
<?php include_once('includes/header.php') ?>
  <nav class="navbar-breadcrumb col-xl-12 col-12 d-flex flex-row p-0">
&nbsp;
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end" align="right">
        <ul class="navbar-nav mr-lg-2">
          <li class="nav-item ml-0">
            <h4 class="mb-0">Published Events</h4>
          </li>
          <li class="nav-item">
            <div class="d-flex align-items-baseline">
              <p class="mb-0">Home</p>
              <i class="typcn typcn-chevron-right"></i>
              <p class="mb-0">
                <a href="adevents" style="color: white;">Events</a>
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
                <h4 class="card-title" style="padding-left: 20px; padding-top: 20px;">Published Events</h4>
                  <p class="card-description" style="padding-left: 20px;"> 
                    Published Events of Aruga Kapatid
                  </p>
                 <!-- <form action="searchevents" method="get">
                  <input  name="searchevents" type="text">

                  <button type="submit"><i class="typcn typcn-zoom menu-icon"></i></button>
                  </form>  -->
                <div class="table-responsive pt-3">
                  
                  <table class="table table-striped project-orders-table" id="events">
                    <thead>
                      <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Organizer</th>
                        <th>Start_date</th>
                        <th>End_date</th>
                        <th>Category</th>
                        <th>Attendees</th>
                        <th>Attachments</th>
                        <th>Status</th>
                        <th>Type</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php foreach($main as $events): ?>
                      <?php if($events['End_date'] >= $currentDate):?>
                      
                <tr>
                    <td><?=$events['Title'] ?></td>
                    <td><?=$events['Description'] ?></td>
                    <td><?=$events['Organizer'] ?></td>
                    <td><?=$events['Start_date'] ?></td>
                    <td><?=$events['End_date'] ?></td>
                    <td><?=$events['Category'] ?></td>
                    <td><?=$events['Atendees'] ?></td>
                    <td><img src="<?="/upload/events/" . $events['Attachments']?>" style="width:50px; height:50px; border:box;"></td>
                    <td><?=$events['Status'] ?></td>
                    <td><?=$events['type'] ?></td>
                    <td>
                          <div class="d-flex align-items-center">
                            <form action="<?= base_url('EventPubArc')?>" method="post">
                            <input type="hidden" name="updateEve" value="<?= $events['EventID']?>">
                            <button class="btn btn-danger btn-sm btn-icon-text" type="submit" onclick="return confirm('Are you sure you want to archive this form?')">Archive<i class="typcn typcn-archive btn-icon-append"></i></button>
                          </form>
                          </div>
                    </td>
                </tr>
                <?php endif;?>
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