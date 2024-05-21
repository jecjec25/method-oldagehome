<!DOCTYPE html>
<html lang="en">

<head>
  <title>Update Announcement</title>
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
            <h4 class="mb-0">Update Announcement</h4>
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
                <h4 class="card-title" style="padding-left: 20px; padding-top: 20px;">Update Announcement</h4>
                  <p class="card-description" style="padding-left: 20px;"> 
                    Update Announcement of Aruga Kapatid
                  </p>
                  <form action="<?= base_url('searchannounce')?>" method="get">
                  <input  name="searchannounce" type="text">
                  <button type="submit"><i class="typcn typcn-zoom menu-icon"></i></button>
                  </form>  
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
                        <th>Status</th>
                        <th>Target Audience</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php foreach($main as $mannounce): ?>
                <tr>
                    <td><?=$mannounce['Title'] ?></td>
                    <td><?=$mannounce['Content'] ?></td>
                    <td><?=$mannounce['Author'] ?></td>
                    <td><?=$mannounce['Date_created'] ?></td>
                    <td><?=$mannounce['Date_modified'] ?></td>
                    <td><?=$mannounce['Start_date']?></td>
                    <td><?=$mannounce['End_date'] ?></td>
                    <td><?=$mannounce['Category'] ?></td>
                    <td><?=$mannounce['Priority'] ?></td>
                    <td><img src="<?="upload/announcement/" . $mannounce['Attachments'] ?>" alt=""></td>
                    <td><?=$mannounce['Status'] ?></td>
                    <td><?=$mannounce['Target_audience'] ?></td>
                    <td>
                          <div class="d-flex align-items-center">
                            <a href="<?= base_url('updateannouncement/') .$mannounce['AnnounceID']?>" class="btn btn-success btn-sm btn-icon-text mr-3">Edit <i class="typcn typcn-edit btn-icon-append"></i> </a> 
                            <form action="<?= base_url('archiveannounce')?>" method="post">
                            <input type="hidden" name="updateann" value="<?= $mannounce['AnnounceID']?>">
                            <button class="btn btn-danger btn-sm btn-icon-text" onclick="return confirm('Are you sure you want to archive this form?')" type="submit">Archive<i class="typcn typcn-archive btn-icon-append"></i></button>
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