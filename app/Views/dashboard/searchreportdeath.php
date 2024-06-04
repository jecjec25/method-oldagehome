
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Report of Deceased Elders</title>
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
<?php include_once('includes/header.php');?>
  <nav class="navbar-breadcrumb col-xl-12 col-12 d-flex flex-row p-0">
&nbsp;
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end" align="right">
        <ul class="navbar-nav mr-lg-2">
          <li class="nav-item ml-0">
            <h4 class="mb-0">Report of Deceased Elders</h4>
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
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Report of Deceased Elders</h4>
                  <p class="card-description">
                    Report of Deceased Elders of Aruga-Kapatid Foundation Incorporated
                  </p>
                  <form class="forms-sample" method="get" action="<?= base_url('viewSearchDeath')?>">
                     <div class="form-group">
                      <label for="exampleInputEmail1">From Dates</label>
                      <input class="form-control " id="fromdate" type="date" name="fromdate" required="true">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">To Dates</label>
                      <input class="form-control " id="todate" type="date" name="todate" required="true">
                    </div>
                    <button type="submit" class="btn btn-primary mr-2" name="submit">Submit</button>
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
