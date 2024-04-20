<html>
<head>
  
  <title>Update Product</title>
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
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end" align="right">
        <ul class="navbar-nav mr-lg-2">
          <li class="nav-item ml-0">
            <h4 class="mb-0">Update Product</h4>
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
            <div class="col-md-12">
              <div class="card">
                <h4 class="card-title" style="padding-left: 20px; padding-top: 20px;">Update Product</h4>
                  <p class="card-description" style="padding-left: 20px;"> 
                    Update a product
                  </p>
                <div class="table-responsive pt-3">
                </p>
                <form action="searchpdets" method="get">
                    <input name="searchprod" id='name'type="text">
                    <button type="submit"><span class="material-symbols-outlined">Search</span></button>
                </form>
                <div class="table-responsive pt-3">
                  <table class="table table-striped project-orders-table" id="tblproduct">
                  <?php if(isset($a['Id'])){?>
                      <input type="hidden" name="Id" value="<?=$a['Id']?>">
                    <?php }?>
                    <thead>
                      <tr>
                        <th>Product Name</th>
                        <th>Stock</th>
                        <th>Product's Price</th>
                        <th>Product Description</th>
                        <th>Product Picture</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php foreach($product as $a): ?>
                      <tr>
                        <td><?=$a['ProdName']?></td>
                        <td><?=$a['Quantity']?></td>
                        <td><?=$a['ProdPrice']?></td>
                        <td><?=$a['ProdDescription']?></td>
                        <td><img src="<?php base_url();?>/productsimage/<?=$a['ProdPic'] ?>" alt="" style="width:50px; height:50px;"></td>
                        <td>
                          <div class="d-flex align-items-center">
                          <a href="<?= base_url('editproduct/') .$a['Id']?>" class="btn btn-success btn-sm btn-icon-text mr-3">Edit <i class="typcn typcn-edit btn-icon-append"></i> </a> 
                          <a href="<?= base_url("deleteproduct/".$a['Id']); ?>" onClick="return confirm('Are you sure you want to delete?')" class="btn btn-danger btn-sm btn-icon-text">Delete <i class="typcn typcn-delete-outline btn-icon-append"></i></a>
                          </div>
                        </td>
                      </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php include_once('includes/footer.php');?>
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