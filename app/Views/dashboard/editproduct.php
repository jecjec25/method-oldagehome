
<!DOCTYPE html>
<html lang="en">

<head>
  
  <title>Senior Care Management System || Update Product Details</title>
  <!-- base:css -->
  <link rel="stylesheet" href="../login/vendors/typicons/typicons.css">
  <link rel="stylesheet" href="../login/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="../login/css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
</head>
    <body>
    <div class="container-scroller">
    <?php include_once('includes/header.php');?>

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
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
     
    <?php include_once('includes/sidebar.php');?>
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
  
      <!-- partial -->
      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Update Product Details</h4>
                  <p class="card-description">
                    Update Product Details of senior care!!!
                  </p>
                  <form class="forms-sample"  action="<?= base_url('updateprod/' .$prod['Id'])?>"method="post">
                                  <div class="form-group">
                       <label for="exampleInputUsername1">Product Name</label>
                      <input id="ProdName" name="ProdName" type="text" class="form-control" required="true" value="<?= $prod['ProdName'];?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Quantity</label>
                     <input id="Quantity" name="Quantity" type="text" class="form-control" required="true" max="1970-01-01" value="<?= $prod['Quantity']; ?>">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Product's Price</label>
                     <input id="contnum" name="ProdPrice" type="text" pattern="[0-9]+" maxlength="10" class="form-control" required="true" value="<?= $prod['ProdPrice'];?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Product Description</label>
                     <input class="form-control" id="commadd" name="ProdDescription" rows="5" value ="<?= $prod['ProdDescription']; ?>" >
                     
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Product Picture</label>
                     
                    <p> <input type="file" name="ProdPic" > </p>
                    </div>
              
                    <button type="submit" class="btn btn-primary mr-2" name="submit">Submit</button>
                  </form>
                </div>
              </div>
            </div>
     
          </div>
        </div>
        <!-- content-wrapper ends -->
        <?php include_once('includes/footer.php');?>
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- base:js -->
    <script src="vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- inject:js -->
    <script src="js/off-canvas.js"></script>
    <script src="js/hoverable-collapse.js"></script>
    <script src="js/template.js"></script>
    <script src="js/settings.js"></script>
    <script src="js/todolist.js"></script>
    <!-- endinject -->
    <!-- plugin js for this page -->
    <script src="vendors/typeahead.js/typeahead.bundle.min.js"></script>
    <script src="vendors/select2/select2.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- Custom js for this page-->
    <script src="js/file-upload.js"></script>
    <script src="js/typeahead.js"></script>
    <script src="js/select2.js"></script>
    <!-- End custom js for this page-->
</body>

</html>
