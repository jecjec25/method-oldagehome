<!DOCTYPE html>
<html lang="en">

<head>
    <title>Update Elder</title>
    <link rel="icon" type="image/png" href="/picture.png">
    <link rel="stylesheet" href="login/vendors/typicons/typicons.css">
    <link rel="stylesheet" href="login/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href=login/vendors/select2/select2.min.css">
    <link rel="stylesheet" href="login/vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
    <link rel="stylesheet" href="login/css/vertical-layout-light/style.css">
    <script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
    <script type="text/javascript">
        bkLib.onDomLoaded(nicEditors.allTextAreas);
    </script>
    <style>
        .table {
            width: 100%;
            margin-bottom: 20px;
        }

        .table-striped tbody>tr:nth-child(odd)>td,
        .table-striped tbody>tr:nth-child(odd)>th {
            background-color: #f9f9f9;
        }

        @media print {
            #PrintButton,
            #DatePrepared {
                display: none;
            }
        }

        @page {
            size: auto;
            /* auto is the initial value */
            margin: 0;
            /* this affects the margin in the printer settings */
        }

        /* Responsive design for 412x915 */
        @media only screen and (max-width: 412px) {
            .navbar-breadcrumb {
                flex-direction: column;
                align-items: flex-start;
                padding: 10px;
            }

            .navbar-menu-wrapper {
                justify-content: flex-start;
                padding: 10px;
            }

            .navbar-nav {
                display: flex;
                flex-direction: column;
                align-items: flex-start;
            }

            .card {
                margin: 0 10px;
                padding: 10px;
            }

            .table-responsive {
                overflow-x: auto;
            }

            .table thead,
            .table tbody {
                display: block;
            }

            .table tbody tr {
                display: block;
                margin-bottom: 10px;
            }

            .table td,
            .table th {
                display: block;
                width: 100%;
                text-align: left;
            }

            .table td img {
                width: 100%;
                height: auto;
            }
        }
    </style>
</head>

<body>
    <div class="container-scroller">
        <?php include_once('includes/header.php');?>
        <nav class="navbar-breadcrumb col-xl-12 col-12 d-flex flex-row p-0">
            &nbsp;
            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end" align="right">
                <ul class="navbar-nav mr-lg-2">
                    <li class="nav-item ml-0">
                        <h4 class="mb-0">Update Elder</h4>
                    </li>
                    <li class="nav-item">
                        <div class="d-flex align-items-baseline">
                            <p class="mb-0">Home</p>
                            <i class="typcn typcn-chevron-right"></i>
                            <p class="mb-0">
                                <a href="adddetails" style="color: white;">Register Elder</a>
                            </p>
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
                                <h4 class="card-title" style="padding-left: 20px; padding-top: 20px;">Update Elder</h4>
                                <p class="card-description" style="padding-left: 20px;">
                                    Update an Elder to Aruga Kapatid
                                </p>
                                <form action="searchdets" method="get">
                                    <input name="searchsc" type="text">
                                    <button type="submit"><i class="typcn typcn-zoom menu-icon"></i></button>
                                </form>
                                <div class="table-responsive pt-3">
                                <?php if (session()->getFlashdata('error')): ?>
                                <div class="alert alert-danger">
                                    <?= session()->getFlashdata('error') ?>
                                    </div>
                                <?php endif; ?>

                                <?php if (session()->getFlashdata('success')): ?>
                                    <div class="alert alert-success">
                                        <?= session()->getFlashdata('success') ?>
                                    </div>
                                <?php endif; ?>
                                    <table class="table table-striped project-orders-table" id="tblscdetails">
                                        <?php if(isset($k['Id'])){?>
                                        <input type="hidden" name="Id" value="<?=$k['Id']?>">
                                        <?php }?>
                                        <thead>
                                            <tr>
                                                <th>Last Name</th>
                                                <th>First Name</th>
                                                <th>Middle Name</th>
                                                <th>Nickname</th>
                                                <th>Date of Birth</th>
                                                <th>Gender</th>
                                                <th>Marital Status</th>
                                                <th>Contact Number</th>
                                                <th>Profile Picture</th>
                                                <th>Communication Address</th>
                                                <th>Emergency Address</th>
                                                <th>Emergency Contact Number</th>
                                                <th>Registration Date</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($main as $k): ?>
                                            <tr>
                                                <td><?=$k['lastname'] ?></td>
                                                <td><?=$k['firstname'] ?></td>
                                                <td><?=$k['middlename'] ?></td>
                                                <td><?=$k['nickname'] ?></td>
                                                <td><?=$k['DateBirth'] ?></td>
                                                <td><?=$k['gender'] ?></td>
                                                <td><?=$k['marital_stat'] ?></td>
                                                <td><?=$k['ContNum'] ?></td>
                                                <td><img src="<?="upload/seniors/" .$k['ProfPic']?>" alt="Senior Image" style="width: 90px;height: 90px;"></td>
                                                <td><?=$k['ComAdd'] ?></td>
                                                <td><?=$k['EmergencyAdd'] ?></td>
                                                <td><?=$k['EmergencyContNum'] ?></td>
                                                <td><?=$k['RegDate'] ?></td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <a href="<?= base_url('edit/') .$k['Id']?>" class="btn btn-success btn-sm btn-icon-text mr-3">Edit <i class="typcn typcn-edit btn-icon-append"></i> </a>
                                                        <form action="<?= base_url('Archive')?>" method="post">
                                                            <input type="hidden" name="update" value="<?= $k['Id']?>">
                                                            <select name="status" id="">
                                                                <option selected disabled>Status</option>
                                                                <option value="Left">Left</option>
                                                                <option value="Deceased">Deceased</option>
                                                            </select>
                                                            <button class="btn btn-danger btn-sm btn-icon-text" onclick="return confirm('Are you sure you want to archive this form?')" type="submit">Archive <i class="typcn typcn-archive btn-icon-append"></i></button>
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
