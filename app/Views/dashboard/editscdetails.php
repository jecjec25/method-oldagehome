<!DOCTYPE html>
<html lang="en">
<head>
<title>Edit Elder</title>
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
            <h4 class="mb-0">Edit Elder</h4>
          </li>
          <li class="nav-item">
            <div class="d-flex align-items-baseline">
              <p class="mb-0">Home</p>
              <i class="typcn typcn-chevron-right"></i>
              <p class="mb-0">Update Elder</p>
            </div>
          </li>
        </ul>
       
      </div>
    </nav>
    <div class="container-fluid page-body-wrapper">
    
           <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Edit Elder</h4>
                  <p class="card-description">
                    Edit an Elder to Aruga Kapatid
                  </p>
                  <?= form_open_multipart('update/'.$d['Id']) ?>
                  <form class="forms-sample" action="<?= site_url('update/' .$d['Id']) ?>" method="post">
                
                <input type="hidden" name="Id" value="<?= $d['Id']?>">
            
              <div class="form-group">
                 <label for="exampleInputUsername1">Last Name</label>
                <input id="lastname" name="lastname" type="text" class="form-control" required="true" value="<?= $d['lastname'] ?>" />
              </div>
              <div class="form-group">
                 <label for="exampleInputUsername1">First Name</label>
                <input id="firstname" name="firstname" type="text" class="form-control" required="true" value="<?= $d['firstname'] ?>" />
              </div>
              <div class="form-group">
                 <label for="exampleInputUsername1">Middle Name</label>
                <input id="middlename" name="middlename" type="text" class="form-control" required="true" value="<?= $d['middlename'] ?>" />
              </div>
              <div class="form-group">
                 <label for="exampleInputUsername1">Nickname</label>
                <input id="nickname" name="nickname" type="text" class="form-control" required="true" value="<?= $d['nickname'] ?>" />
              </div>
              <div class="form-group">
              <label for="exampleInputEmail1">Date of Birth</label>
              <input id="DateBirth" name="DateBirth" type="date" class="form-control" required="true" value="<?= $d['DateBirth'] ?>" max="1970-01-01">
              </div>
              <div class="form-group">
                <label for="exampleInputGender">Gender</label>
                <select id="gender" name="gender" class="form-control" required="true">
                    <option value="" selected Disabled>Select Gender</option>
                    <option value="Male" <?= isset($d['gender']) && $d['gender'] === 'Male' ? 'selected' : '' ?>>Male</option>
                    <option value="Female" <?= isset($d['gender']) && $d['gender'] === 'Female' ? 'selected' : '' ?>>Female</option>
                </select>
            </div>
              <div class="form-group">
                  <label for="exampleInputMaritalStatus">Marital Status</label>
                  <select id="marital_stat" name="marital_stat" class="form-control" required="true">
                      <option value="" selected Disabled>Select Marital Status</option>
                      <option value="Single" <?= isset($d['marital_stat']) && $d['marital_stat'] === 'Single' ? 'selected' : '' ?>>Single</option>
                      <option value="Married" <?= isset($d['marital_stat']) && $d['marital_stat'] === 'Married' ? 'selected' : '' ?>>Married</option>
                      <option value="Divorced" <?= isset($d['marital_stat']) && $d['marital_stat'] === 'Divorced' ? 'selected' : '' ?>>Divorced</option>
                      <option value="Widowed" <?= isset($d['marital_stat']) && $d['marital_stat'] === 'Widowed' ? 'selected' : '' ?>>Widowed</option>
                  </select>
              </div>
              <div class="form-group">
              <label for="ContNum">Contact Numbers</label>
              <input id="ContNum" name="ContNum" maxlength="13" class="form-control" id="ContNum" required="true" value="<?= $d['ContNum']?>" pattern="^(\+?63|0)9\d{9}$">
              </div>
              <div class="form-group">
                      <label for="exampleInputEmail1">Elder Picture</label>
                    <p> <input type="file" name="ProfPic" > </p>
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
              <input id="EmergencyContNum" name="EmergencyContNum" maxlength="13" class="form-control" id="EmergencyContNum" required="true" value="<?= $d['EmergencyContNum']; ?>" pattern="^(\+?63|0)9\d{9}$">
              </div>
              <div class="form-group">
              <label for="exampleInputEmail1">Registration Date</label>
              <input id="RegDate" name="RegDate" type="date" class="form-control" required="true" value="<?= $d['RegDate'] ?>">
              </div>
              <button type="submit" class="btn btn-primary mr-2" name="submit" onclick="return confirm('Are you sure you want to save changes?')">Submit</button>
              <div class="row mt-3">
              <div class="col-md-12">
                  <a href="/test" class="btn btn-secondary">Back</a>
              </div>
              </form>
              <?=form_close()?>
            </div>
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
			var inputs = document.getElementById("ContNum");
        inputs.addEventListener("input", function(event) {
            this.value = this.value.replace(/[^0-9]/g, '');
        });
    </script>
    <script>
			var inputs = document.getElementById("EmergencyContNum");
        inputs.addEventListener("input", function(event) {
            this.value = this.value.replace(/[^0-9]/g, '');
        });
    </script>
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