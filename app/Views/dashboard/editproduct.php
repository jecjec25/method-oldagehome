
<!DOCTYPE html>
<html lang="en">

<head>
  
  <title>Edit Product</title>
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
    
    <nav class="navbar-breadcrumb col-xl-12 col-12 d-flex flex-row p-0">
   &nbsp;
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <ul class="navbar-nav mr-lg-2">
          <li class="nav-item ml-0">
            <h4 class="mb-0">Edit Product</h4>
          </li>
          <li class="nav-item">
            <div class="d-flex align-items-baseline">
              <p class="mb-0">Home</p>
              <i class="typcn typcn-chevron-right"></i>
              <p class="mb-0">Update product</p>
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
                  <br>
                <h4 class="card-title">Edit Product</h4>
                  <p class="card-description">
                    Edit a Product to Aruga Kapatid
                  </p>

                  <form class="forms-sample"  action="<?= base_url('updateprod/' .$prod['Id'])?>"method="post">
                                  <div class="form-group">
                       <label for="exampleInputUsername1">Product Name</label>
                      <input id="ProdName" name="ProdName" type="text" class="form-control" required="true" value="<?= $prod['ProdName'];?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Number of Stock</label>
                     <input id="Quantity" name="Quantity" disabled type="text" class="form-control" required="true"  value="<?= $prod['Quantity']; ?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Add Stock</label>
                     <input id="Quantity" name="addQuantity" type="text" class="form-control" required="true" >
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Product's Price</label>
                     <input id="ProdPrice" name="ProdPrice" type="text" pattern="[0-9]+" maxlength="10" class="form-control" required="true" value="<?= $prod['ProdPrice'];?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Product Description</label>
                     <input class="form-control" id="ProdDescription" name="ProdDescription" rows="5" value ="<?= $prod['ProdDescription']; ?>" >
                     
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Product Picture</label>
                    <p> <input type="file" name="ProdPic" > </p>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2" name="submit" onclick="return confirm('Are you sure you want to save changes?')">Submit</button>
                    <div class="row mt-3">
                    <div class="col-md-12">
                    <a href="/show" class="btn btn-secondary">Back</a>
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
