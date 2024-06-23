<!DOCTYPE html>
<html lang="en">

<head>
    <title>Table Report of Events</title>
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
            float: right;
            margin-right: 20px;
        }

        .button-print a {
            background-color: #007bff;
            color: #fff;
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
        }

        .button-print a:hover {
            background-color: #0056b3;
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

        .btn {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            color: white;
            background-color: #007BFF;
            /* Blue background */
            text-align: center;
            text-decoration: none;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #0056b3;
            /* Darker blue on hover */
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
                        <h4 class="mb-0">Table Report of Events</h4>
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
                                <div class="card-body">
                                    <h4 class="card-title">Table Report of Events</h4>
                                    <p class="card-description">
                                        Table Report of Events of Aruga-Kapatid Foundation Incorporated
                                    </p>
                                    <div class="button-print">
                                        <a href="<?= base_url('/previewEvent/' . $regdate . '/' . $todate) ?>" id="PrintButton">Preview</a>
                                    </div>
                                    <div class="table-responsive pt-3">
                                        <table class="table table-striped project-orders-table" id="acceptbooking">
                                            <thead>
                                                <tr>
                                                    <th>Last Name</th>
                                                    <th>First Name</th>
                                                    <th>Middle Name</th>
                                                    <th>Contact Number</th>
                                                    <th>Event</th>
                                                    <th>Preffer Date</th>
                                                    <th>Time</th>
                                                    <th>Equipment</th>
                                                    <th>Comments</th>
                                                    <th>Status</th>
                                                    <th>Description</th>
                                                    <th>Amount Raised</th>
                                                    <th>Outcomes</th>
                                                    <th>Acknowledgement</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach($acceptev as $acceptev): ?>
                                                <tr>
                                                    <td><?=$acceptev['lastname'] ?></td>
                                                    <td><?=$acceptev['firstname'] ?></td>
                                                    <td><?=$acceptev['middlename'] ?></td>
                                                    <td><?=$acceptev['contactnum'] ?></td>
                                                    <td><?=$acceptev['event'] ?></td>
                                                    <td><?=$acceptev['prefferdate'] ?></td>
                                                    <td><?=$acceptev['Time'] ?></td>
                                                    <td><?=$acceptev['equipment'] ?></td>
                                                    <td><?=$acceptev['comments'] ?></td>
                                                    <td><?=$acceptev['status'] ?></td>
                                                    <td><?=$acceptev['description'] ?></td>
                                                    <td><?=$acceptev['amount_raised'] ?></td>
                                                    <td><?=$acceptev['outcomes'] ?></td>
                                                    <td><?=$acceptev['acknowledgement'] ?></td>
                                                    <td>
                                                        <a href="<?= base_url('viewEvent/') . $acceptev['id']?>" class="btn">View Event</a>
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
                    <div class="col-md-12">
                        <a href="/reportevent" class="btn btn-secondary">Back</a>
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
