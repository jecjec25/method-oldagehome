<!DOCTYPE html>
<html lang="en">

<head>
  <title>Published Announcement</title>
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
<?php include_once('includes/header.php') ?>
  <nav class="navbar-breadcrumb col-xl-12 col-12 d-flex flex-row p-0">
&nbsp;
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end" align="right">
        <ul class="navbar-nav mr-lg-2">
          <li class="nav-item ml-0">
            <h4 class="mb-0">Published Announcement</h4>
          </li>
          <li class="nav-item">
            <div class="d-flex align-items-baseline">
              <p class="mb-0">Home</p>
              <i class="typcn typcn-chevron-right"></i>
              <p class="mb-0">Announcement</p>
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
                <h4 class="card-title" style="padding-left: 20px; padding-top: 20px;">Published Announcement</h4>
                  <p class="card-description" style="padding-left: 20px;"> 
                    Published Announcement of Aruga Kapatid
                  </p>
                <div class="table-responsive pt-3">
                  
                  <table class="table table-striped project-orders-table" id="announcement">
                    <thead>
                      <tr>
                        <th>Title</th>
                        <th>Content</th>
                        <th>Author</th>
                        <th>Date Created</th>
                        <th>Date Modified</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Category</th>
                        <th>Priority</th>
                        <th>Attachments</th>
                        <th>Target Audience</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                   <?php foreach($announce as $pannounce): ?>
                <tr>
                    <td><?=$pannounce['Title'] ?></td>
                    <td><?=$pannounce['Content'] ?></td>
                    <td><?=$pannounce['Author'] ?></td>
                    <td><?=$pannounce['Date_created'] ?></td>
                    <td><?=$pannounce['Date_modified'] ?></td>
                    <td><?=$pannounce['Start_date']?></td>
                    <td><?=$pannounce['End_date'] ?></td>
                    <td><?=$pannounce['Category'] ?></td>
                    <td><?=$pannounce['Priority'] ?></td>
                    <td><img src="<?="/upload/announcement/".$pannounce['Attachments']?>" style="width:50px; height:50px; border:box;"></td>
                    <td><?=$pannounce['Target_audience'] ?></td>
                    <td><?=$pannounce['Status'] ?></td>
                    <td>
                          <div class="d-flex align-items-center">
                            <form action="<?= base_url('myAnnouncePubArch')?>" method="post">
                            <input type="hidden" name="updateAnn" value="<?= $pannounce['AnnounceID']?>">
                            <button class="btn btn-danger btn-sm btn-icon-text" type="submit" onclick="return confirm('Are you sure you want to archive this form?')">Archive<i class="typcn typcn-archive btn-icon-append"></i></button>
                          </form>
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