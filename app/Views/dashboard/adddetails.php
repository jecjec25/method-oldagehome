
<!DOCTYPE html>
<html lang="en">

<head>
  
  <title>Senior Care Management System || Add Senior Details</title>
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
          <a class="navbar-brand brand-logo" href="index.html"><img src="login/login/images/logo.svg" alt="logo"/></a>
          <a class="navbar-brand brand-logo-mini" href="index.html"><img src="login/images/logo-mini.svg" alt="logo"/></a>
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
                  <h4 class="card-title">Add Senior Citizen</h4>
                  <p class="card-description">
                    Add Senior Citizen Detail!!!
                  </p>
                  <form action="<?= base_url("save") ?>" method="post">
                    <?php if(isset($d['Id'])){?>
                      <input type="hidden" name="Id" value="<?=$d['Id']?>">
                    <?php }?>
                    <div class="form-group">
                       <label for="exampleInputUsername1">Name of Senior Citizen</label>
                      <input id="Name" name="Name" type="text" class="form-control" required="true" value="<?= isset($d['Name']) ? $d['Name'] : '' ?>">
                    </div>
                  <div class="form-group">
                      <label for="exampleInputEmail1">Date of Birth</label>
                     <input id="DateBirth" name="DateBirth" type="date" class="form-control" required="true" value="<?= isset($d['DateBirth']) ? $d['DateBirth'] : '' ?>" max="1970-01-01">
                    </div>

                    <div class="form-group">
                    <label for="ContNum">Contact Number (Philippines)</label>
                    <input id="ContNum" name="ContNum" type="text" pattern="(\+?63|0)9\d{9}" maxlength="13" class="form-control" required="true" value="<?= isset($d['ContNum']) ? $d['ContNum'] : '' ?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Communication Address</label>
                     <textarea class="form-control" id="ComAdd" name="ComAdd" rows="5" value="<?= isset($d['ComAdd']) ? $d['ComAdd'] : '' ?>"></textarea>
                     
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Profile Pic</label>
                     <input id="ProfPic" name="ProfPic" type="file" class="form-control" required="true" value="<?= isset($d['Profpic']) ? $d['Profpic'] : '' ?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Emergency Address</label>
                    
                     <textarea class="form-control" id="EmergencyAdd" name="EmergencyAdd" rows="5" value="<?= isset($d['EmergencyAdd']) ? $d['EmergencyAdd'] : '' ?>"></textarea>
                    </div>
                    <div class="form-group">
                    <label for="EmergencyContNum">Emergency Contact Number (Philippines)</label>
                    <input id="EmergencyContNum" name="EmergencyContNum" type="text" pattern="(\+?63|0)9\d{9}" maxlength="13" class="form-control" required="true" value="<?= isset($d['EmergencyContNum']) ? $d['EmergencyContNum'] : '' ?>">
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
  <script>
    if ($("#add_create").length > 0) {
      $("#add_create").validate({
        rules: {
          name: {
            required: true,
          },
          email: {
            required: true,
            maxlength: 60,
            email: true,
          },
        },
        messages: {
          name: {
            required: "Name is required.",
          },
          email: {
            required: "Email is required.",
            email: "It does not seem to be a valid email.",
            maxlength: "The email should be or equal to 60 chars.",
          },
        },
      })
    }
  </script>
 
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