
<!DOCTYPE html>
<html lang="en">

<head>
  
  <title>Add Product</title>
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
            <h4 class="mb-0">Add Product</h4>
          </li>
          <li class="nav-item">
            <div class="d-flex align-items-baseline">
              <p class="mb-0">Home</p>
              <i class="typcn typcn-chevron-right"></i>
              <p class="mb-0">Handmade Product</p>
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
                  <h4 class="card-title">Add Product</h4>
                  <p class="card-description">
                    Add a product to Aruga Kapatid
                  </p>
                  <?= form_open_multipart('saved') ?>
                  <?php if(isset($a['Id'])){?>
                      <input type="hidden" name="Id" value="<?=$a['Id']?>">
                    <?php }?>
                    <div class="form-group">
                       <label for="exampleInputUsername1">Product Name</label>
                      <input id="ProdName" name="ProdName" type="text" class="form-control" required="true" value="<?= isset($a['Name']) ? $a['Name'] : '' ?>">
                    </div>
                  <div class="form-group">
                      <label for="exampleInputEmail1">Number of Stock</label>
                     <input id="Quantity" name="Quantity" type="text" class="form-control" required="true" max="1970-01-01" value="<?= isset($a['Quantity']) ? $a['Quantity'] : '' ?>">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Product's Price</label>
                     <input id="ProdPrice" name="ProdPrice" type="text" pattern="[0-9]+" maxlength="10" class="form-control" required="true" value="<?= isset($a['ProdPrice']) ? $a['ProdPrice'] : '' ?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Product Description</label>
                     <textarea class="form-control" id="ProdDescription" name="ProdDescription" rows="5" value="<?= isset($a['ProdDecription']) ? $a['ProdDecription'] : '' ?>"></textarea>
                     
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Product Picture</label>
                     <input id="ProdPic" name="ProdPic" type="file" class="form-control" required="true" value="<?= isset($a['ProdPic']) ? $a['ProdPic'] : '' ?>">
                    </div>
                    <button type="submit" class="btn btn-primary mr-2" name="submit" onclick="return confirm('Are you sure you want to submit this form?')">Submit</button>
                  </form>
                  <?=form_close()?>
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