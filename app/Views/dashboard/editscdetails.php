
<!DOCTYPE html>
<html lang="en">

<head>
  
  <title>Senior Care Management System || Update Senior Citizen Details</title>
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

    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="navbar-brand-wrapper d-flex justify-content-center">
        <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">
          <a class="navbar-brand brand-logo" href="index.html"><img src="images/logo.svg" alt="logo"/></a>
          <a class="navbar-brand brand-logo-mini" href="index.html"><img src="images/logo-mini.svg" alt="logo"/></a>
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="typcn typcn-th-menu"></span>
          </button>
        </div>
      </div>
      <?php include_once('includes/header.php');?>
    </nav>
    <div class="container-fluid page-body-wrapper">
     
    <?php include_once('includes/sidebar.php');?>
      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Update Senior Citizen Details</h4>
                  <p class="card-description">
                    Update Senior Citizen Details of senior care!!!
                  </p>
                 
                  <form class="forms-sample" action="<?= site_url('update') ?>" method="post">
                
                      <input type="hidden" name="Id" value="<?= $d['Id']?>">
                  
                    <div class="form-group">
                       <label for="exampleInputUsername1">Name of Senior Citizen</label>
                      <input id="Name" name="Name" type="text" class="form-control" required="true" value="<?= $d['Name'] ?>" />
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Contact Number</label>
                     <input id="ContNum" name="ContNum" type="text" pattern="[0-9]+" maxlength="10" class="form-control" required="true" value="<?= isset($d['ContNum']) ? $d['ContNum'] : '' ?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Communication Address</label>
                     <textarea class="form-control" id="ComAdd" name="ComAdd" value="<?= isset($d['ComAdd']) ? $d['ComAdd'] : '' ?>" rows="5"></textarea>
                     
                    </div>
                   
                    <div class="form-group">
                      <label for="exampleInputEmail1">Emergency Address</label>
                    
                     <textarea class="form-control" id="EmergencyAdd" name="EmergencyAdd" value="<?= isset($d['EmergencyAdd']) ? $d['EmergencyAdd'] : '' ?>" rows="5"></textarea>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Emergency Contact Number</label>
                     <input id="EmergencyContNum" name="EmergencyContNum" pattern="[0-9]+" maxlength="10" type="text" class="form-control" required="true" value="<?= isset($d['EmergencyContNum']); ?>">
                    </div>
                    
                    <button type="submit" class="btn btn-primary mr-2" name="submit" value="submit">Submit</button>
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