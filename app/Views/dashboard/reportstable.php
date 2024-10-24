<!DOCTYPE html>
<html lang="en">

<head>
    <title>Table Report of Elders</title>
    <link rel="icon" type="image/png" href="/picture.png">
    <link rel="stylesheet" href="login/vendors/typicons/typicons.css">
    <link rel="stylesheet" href="login/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="login/vendors/select2/select2.min.css">
    <link rel="stylesheet" href="login/vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
    <link rel="stylesheet" href="login/css/vertical-layout-light/style.css">
    <script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
    <script type="text/javascript">
    bkLib.onDomLoaded(nicEditors.allTextAreas);
    </script>
    <style>
    .button-print {
        float: left;
    }

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
        .navbar-breadcrumb,
        .sidebar,
        .header {
            display: none !important;
        }

        .content-wrapper {
            width: auto !important;
            margin: 0 !important;
            padding: 0 !important;
        }

        .main-panel {
            width: 100% !important;
        }
    }

    @page {
        size: auto;
        /* auto is the initial value */
        margin: 0;
        /* this affects the margin in the printer settings */


    }

    .button-print {
        text-align: right;

    }

    .button-print button {
        background-color: #007bff;
        color: #fff;
        padding: 8px 16px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }
    </style>
</head>

<body>

    <div class="container-scroller">
    <?php include_once('includes/header.php') ?>
        <nav class="navbar-breadcrumb col-xl-12 col-12 d-flex flex-row p-0">
            &nbsp;
            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end" align="right">
                <ul class="navbar-nav mr-lg-2">
                    <li class="nav-item ml-0">
                        <h4 class="mb-0">Table Report of Elders</h4>
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
                        <div class="col-md-12">
                            <div class="card">
                                <h4 class="card-title" style="padding-left: 20px; padding-top: 20px;">Table Report of Elders</h4>
                                <p class="card-description" style="padding-left: 20px;">
                                    Table Report of Elders in Aruga-Kapatid Foundation Incorporated
                                </p>
                                <div class="button-print"><a class="btn btn-primary text-decoration-none"
                                        href="<?= base_url('/previewElders/'.$searchParams['todate']) ?>"
                                        id="PrintButton">Preview</a></div>


                                <div class="table-responsive pt-3">
                                    <table class="table table-striped project-orders-table" id="tblscdetails">
                                        <table class="table table-striped project-orders-table" id="tblscdetails">
                                            <?php if(isset($reg['Id'])){?>
                                            <input type="hidden" name="Id" value="<?=$reg['Id']?>">
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
                                                <?php foreach($reg as $reg): ?>
                                                <tr>
                                                    <td><?=$reg['lastname'] ?></td>
                                                    <td><?=$reg['firstname'] ?></td>
                                                    <td><?=$reg['middlename'] ?></td>
                                                    <td><?=$reg['nickname'] ?></td>
                                                    <td><?=$reg['DateBirth'] ?></td>
                                                    <td><?=$reg['gender'] ?></td>
                                                    <td><?=$reg['marital_stat'] ?></td>
                                                    <td><?=$reg['ContNum'] ?></td>
                                                    <td><img src="<?="upload/seniors/" .$reg['ProfPic']?>" alt="Senior Image" style="width: 90px;height: 90px;"></td>
                                                    <td><?=$reg['ComAdd'] ?></td>
                                                    <td><?=$reg['EmergencyAdd'] ?></td>
                                                    <td><?=$reg['EmergencyContNum'] ?></td>
                                                    <td><?=$reg['RegDate'] ?></td>
                                                    <td>
                                                    <div class="d-flex align-items-center">
                                                        <a href="<?= base_url('edit/') .$reg['Id']?>" class="btn btn-success btn-sm btn-icon-text mr-3">Edit <i class="typcn typcn-edit btn-icon-append"></i> </a>
                                                        <form action="<?= base_url('Archive')?>" method="post">
                                                        <input type="hidden" name="update" value="<?= $reg['Id']?>">
                                                        <select name="status" id="">
                                                        <option  selected disabled>Status</option>
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
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <a href="/reports" class="btn btn-secondary">Back</a>
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