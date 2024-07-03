<!DOCTYPE html>
<html>

<head>
<title>Report of Events</title>
<link rel="icon" type="image/png" href="/picture2.png">
  <link rel="stylesheet" href="login/vendors/typicons/typicons.css">
  <link rel="stylesheet" href="login/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="login/vendors/select2/select2.min.css">
  <link rel="stylesheet" href="login/vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
  <link rel="stylesheet" href="login/css/vertical-layout-light/style.css">
  <script src="login/vendors/js/vendor.bundle.base.js"></script>

  <link href="http://code.jquery.com/ui/1.9.2/themes/smoothness/jquery-ui.css" rel="stylesheet" />
    <script src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
    <script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
  <link href="http://code.jquery.com/ui/1.9.2/themes/smoothness/jquery-ui.css" rel="stylesheet" />
    <script src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
    <script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
    
    
    <style type="text/css">
        .containers {
            border-radius: 5px;
            padding: 50px 20px;
            margin: 30px auto;
            width: 40%;
            border: 2px solid #bbb;
            text-align: center;
        }
        
        input {
            padding: 5px;
            background-color: #eeeeee;
        }
        
        h2 {
            text-align: center;
            margin-top: 100px;
            font-weight: 600;
        }
    </style>

  
  <script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
      </head>
<body>
  <div class="container-scroller">
<?php include_once('includes/header.php') ?>

  <nav class="navbar-breadcrumb col-xl-12 col-12 d-flex flex-row p-0">
&nbsp;
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end" align="right">
        <ul class="navbar-nav mr-lg-2">
          <li class="nav-item ml-0">
            <h4 class="mb-0">Report of Events</h4>
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
                  <h4 class="card-title">Report of Events</h4>
                  <p class="card-description">
                    Report of Events of Aruga-Kapatid Foundation Incorporated
                  </p>
                  <form class="forms-sample" method="get" action="<?= base_url('eventpermonth')?>">
                    
                    <div class="form-group">
                      <label for="exampleInputUsername1">From Dates</label>
                        <input required="true" id="from" name="fromdate" type="text" class="from">
                       </div>
                       
                    <div class="form-group">
                      <label for="exampleInputUsername1">To Dates</label>
                        <input required="true" id="to" name="todate" type="text" class="to">
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
</body>

<script type="text/javascript">
    var array = [];

    $("input.from").datepicker({
        beforeShowDay: function(date) {
            var string = jQuery.datepicker.formatDate('dd-mm-yy', date);
            return [array.indexOf(string) == -1]
        }
    });

    $("input.to").datepicker({
        beforeShowDay: function(date) {
            var string = jQuery.datepicker.formatDate('dd-mm-yy', date);
            return [array.indexOf(string) == -1]
        }
    });
</script>
</html>