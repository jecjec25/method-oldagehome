
<!DOCTYPE html>
<html lang="en">

<head>
  
  <title>Announcements</title>
  <link rel="icon" type="image/png" href="/picture2.png">
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
            <h4 class="mb-0">Announcement</h4>
          </li>
          <li class="nav-item">
            <div class="d-flex align-items-baseline">
              <p class="mb-0">Home</p>
              <i class="typcn typcn-chevron-right"></i>
              <p class="mb-0">Announcement</p>
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
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Announcement</h4>
                  <p class="card-description">
                    Announcement of Aruga Kapatid
                  </p>
                  <?php if (session()->has('success')) : ?>
              <p><?= session('success') ?></p>
          <?php elseif (session()->has('error')) : ?>
              <p><?= session('error') ?></p>
          <?php endif; ?>
          <?= form_open_multipart('saveannounce') ?>
          <input type="hidden" name="adminId" value="<?=session()->get('userID')?>">
                    <div class="form-group">
                       <label for="Title">Title</label>
                      <input id="Title" name="Title" type="text" class="form-control" required="true" >
                    </div>
                    <div class="form-group">
                      <label for="Content">Content</label>
                      <input id="Content" name="Content" type="text" class="form-control" required="true" >
                    </div>
                    <div class="form-group">
                      <label for="Author">Author</label>
                     <input id="Author" name="Author" type="text" class="form-control" required="true">
                    </div>
                    <!-- <div class="form-group">
                      <label for="Date_created">Date Created</label>
                     <input id="Date_created" name="Date_created" type="date" class="form-control" required="true">
                    </div>
                    <div class="form-group">
                      <label for="Date_modified">Date Modified</label>
                     <input id="Date_modified" name="Date_modified" type="date" class="form-control" required="true">
                    </div> -->
                    <div class="form-group">
                      <label for="Start_date">Start Date</label>
                     <input id="Start_date" name="Start_date" type="date" class="form-control" required="true">
                    </div>
                    <div class="form-group">
                      <label for="End_date">End Date</label>
                     <input id="End_date" name="End_date" type="date" class="form-control" required="true">
                    </div>
                    <div class="form-group">
                    <label for="Category">Category</label><br>
                    <input type="checkbox" id="events" name="Category[]" value="events">
                    <label for="events"> Events</label><br>
                    <input type="checkbox" id="activities" name="Category[]" value="activities">
                    <label for="activities"> Activities</label><br>
                    <input type="checkbox" id="healthtips" name="Category[]" value="healthtips">
                    <label for="healthtips"> Health Tips</label><br>
                    <input type="checkbox" id="facilityupd" name="Category[]" value="facilityupd">
                    <label for="facilityupd"> Facility Updates</label><br>
                    </div>
                    <div class="form-group">
                      <label for="Priority">Priority</label>
                     <input id="Priority" name="Priority" type="text" class="form-control" required="true">
                    </div>
                    <div class="form-group">
                     <label for="Attachments">Attachments</label><br>
                    <input id="Attachments" name="Attachments" type="file" required="true" >
                    </div>
                    <div class="form-group">
                    <label for="Target_audience">Target Audience</label><br>
                    <input type="checkbox" id="residents" name="Target_audience[]" value="residents">
                    <label for="residents"> Residents</label><br>
                    <input type="checkbox" id="family" name="Target_audience[]" value="family">
                    <label for="family"> Family Members</label><br>
                    <input type="checkbox" id="caregivers" name="Target_audience[]" value="caregivers">
                    <label for="caregivers"> Caregivers and Staff</label><br>
                    <input type="checkbox" id="volunteers" name="Target_audience[]" value="volunteers">
                    <label for="volunteers"> Volunteers</label><br>
                    <input type="checkbox" id="stakeholders" name="Target_audience[]" value="stakeholders">
                    <label for="stakeholders"> External Stakeholders</label><br>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2" name="submit" onclick="return confirm('Are you sure you want to submit this form?')">Submit</button>
                    <?= form_close() ?>
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

  <script src="login/js/off-canvas.js"></script>
  <script src="login/js/hoverable-collapse.js"></script>
  <script src="login/js/template.js"></script>
  <script src="login/js/settings.js"></script>
  <script src="login/js/todolist.js"></script>

  <script src="login/vendors/typeahead.js/typeahead.bundle.min.js"></script>
  <script src="login/vendors/select2/select2.min.js"></script>
 
  <script src="login/js/file-upload.js"></script>
  <script src="login/js/typeahead.js"></script>
  <script src="login/js/select2.js"></script>

</body>

</html>
<?php  ?>