
<!DOCTYPE html>
<html lang="en">

<head>
  
  <title>Admin Events</title>
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
  <nav class="navbar-breadcrumb col-xl-12 col-12 d-flex flex-row p-0">
&nbsp;
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end" align="right">
        <ul class="navbar-nav mr-lg-2">
          <li class="nav-item ml-0">
            <h4 class="mb-0">Events</h4>
          </li>
          <li class="nav-item">
            <div class="d-flex align-items-baseline">
              <p class="mb-0">Home</p>
              <i class="typcn typcn-chevron-right"></i>
              <p class="mb-0">News and Events</p>
            </div>
          </li>
        </ul>
        <?php include('includes/header.php') ?>
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
                  <h4 class="card-title">Events</h4>
                  <p class="card-description">
                    Events of Aruga Kapatid
                  </p>
                  <?php if (session()->has('success')) : ?>
              <p><?= session('success') ?></p>
          <?php elseif (session()->has('error')) : ?>
              <p><?= session('error') ?></p>
          <?php endif; ?>
          <?= form_open_multipart('saveEvents') ?>
          <input type="hidden" name="adminId" value="<?=session()->get('userID')?>">
                    <div class="form-group">
                       <label for="Title">Title</label>
                      <input id="Title" name="Title" type="text" class="form-control" required="true" >
                    </div>
                    <div class="form-group">
                      <label for="Description">Description</label>
                      <input id="Description" name="Description" type="text" class="form-control" required="true" >
                    </div>
                    <div class="form-group">
                      <label for="Organizer">Organizer</label>
                     <input id="Organizer" name="Organizer" type="text" class="form-control" required="true">
                    </div>
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
                    <input type="checkbox" id="social" name="Category[]" value="Social">
                    <label for="social"> Social</label><br>
                    <input type="checkbox" id="recreational" name="Category[]" value="Recreational">
                    <label for="recreational"> Recreational</label><br>
                    <input type="checkbox" id="educational" name="Category[]" value="Educational">
                    <label for="educational"> Educational</label><br>
                    <input type="checkbox" id="health" name="Category[]" value="Health">
                    <label for="Health"> Health and Wellness</label><br>
                    <input type="checkbox" id="outreach" name="Category[]" value="Outreach">
                    <label for="Outreach"> Community Outreach</label><br>
                    <input type="checkbox" id="cultural" name="Category[]" value="Cultural">
                    <label for="Cultural"> Cultural</label><br>
                    <input type="checkbox" id="special" name="Category[]" value="Special">
                    <label for="Special"> Special</label><br>
                    </div>
                    <div class="form-group">
                      <label for="Atendees">Attendees</label>
                     <input id="Atendees" name="Atendees" type="text" class="form-control" required="true">
                    </div>
                    <div class="form-group">
                     <label for="Attachments">Attachments</label><br>
                    <input id="Attachments" name="Attachments" type="file" required="true" >
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