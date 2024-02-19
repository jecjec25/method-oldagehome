<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="../login/vendors/typicons/typicons.css">
  <link rel="stylesheet" href="../login/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="../login/css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
</head>
    <body>
    <div class="container-scroller">
    <?php include_once('includes/header.php');?>
    
    <nav class="navbar-breadcrumb col-xl-12 col-12 d-flex flex-row p-0">
   &nbsp;
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <ul class="navbar-nav mr-lg-2">
          <li class="nav-item ml-0">
            <h4 class="mb-0">Update Senior Citizen Details</h4>
          </li>
          <li class="nav-item">
            <div class="d-flex align-items-baseline">
              <p class="mb-0">Home</p>
              <i class="typcn typcn-chevron-right"></i>
              <p class="mb-0">Update Senior Citizen Details</p>
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
                  <h4 class="card-title">Update Senior Citizen Details</h4>
                  <p class="card-description">
                    Update Senior Citizen Details of senior care!!!
                  </p>
                 
                  <form class="forms-sample" action="<?= site_url('update/' .$d['Id']) ?>" method="post">
                
                <input type="hidden" name="Id" value="<?= $d['Id']?>">
            
              <div class="form-group">
                 <label for="exampleInputUsername1">Name of Senior Citizen</label>
                <input id="Name" name="Name" type="text" class="form-control" required="true" value="<?= $d['Name'] ?>" />
              </div>
              <div class="form-group">
              <label for="exampleInputEmail1">Date of Birth</label>
              <input id="DateBirth" name="DateBirth" type="date" class="form-control" required="true" value="<?= $d['DateBirth'] ?>" max="1970-01-01">
              </div>
              <div class="form-group">
              <label for="ContNum">Contact Numbers</label>
              <input id="ContNum" name="ContNum" maxlength="13" class="form-control" required="true" value="<?= $d['ContNum']?>" pattern="^(\+?63|0)9\d{9}$">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Communication Address</label>
               <input class="form-control" id="ComAdd" name="ComAdd" value="<?= $d['ComAdd']?>" rows="5">                     
              </div>
             
              <div class="form-group">
                <label for="exampleInputEmail1">Emergency Address</label>
              
               <input class="form-control" id="EmergencyAdd" name="EmergencyAdd" value="<?= $d['EmergencyAdd']?>">
              </div>
              <div class="form-group">
              <label for="EmergencyContNum">Emergency Contact Number</label>
              <input id="EmergencyContNum" name="EmergencyContNum" maxlength="13" class="form-control" required="true" value="<?= $d['EmergencyContNum']; ?>" pattern="^(\+?63|0)9\d{9}$">
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
  <script src="login/vendors/chart.js/Chart.min.js"></script>
  <script src="login/js/off-canvas.js"></script>
  <script src="login/js/hoverable-collapse.js"></script>
  <script src="login/js/template.js"></script>
  <script src="login/js/settings.js"></script>
  <script src="login/js/todolist.js"></script>
  <script src="login/js/dashboard.js"></script>

</body>

</html>