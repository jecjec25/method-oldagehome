<!DOCTYPE html>
<html lang="en">

<head>

    <title>Deceased Elder</title>
    <link rel="stylesheet" href="login/vendors/typicons/typicons.css">
    <link rel="stylesheet" href="login/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="login/vendors/select2/select2.min.css">
    <link rel="stylesheet" href="login/vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
    <link rel="stylesheet" href="login/css/vertical-layout-light/style.css">
    <script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
    <script type="text/javascript">
    bkLib.onDomLoaded(nicEditors.allTextAreas);
    </script>
</head>
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

.edit-button {
    background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 10px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
    border-radius: 4px;
}

.edit-button:hover {
    background-color: #45a049;
}
</style>

<body>
    <div class="container-scroller">
        <?php include_once('includes/header.php');?>
        <nav class="navbar-breadcrumb col-xl-12 col-12 d-flex flex-row p-0">
            &nbsp;
            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end" align="right">
                <ul class="navbar-nav mr-lg-2">
                    <li class="nav-item ml-0">
                        <h4 class="mb-0">Deceased Elder</h4>
                    </li>
                    <li class="nav-item">
                        <div class="d-flex align-items-baseline">
                            <p class="mb-0">Home</p>
                            <i class="typcn typcn-chevron-right"></i>
                            <p class="mb-0">Register Elder</p>
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
                                <h4 class="card-title" style="padding-left: 20px; padding-top: 20px;">Deceased Elder
                                </h4>
                                <p class="card-description" style="padding-left: 20px;">
                                    Deceased elders of Aruga-Kapatid Foundation Incorporated
                                </p>
                                <div class="button-print"><a class="btn btn-primary"
                                        href="<?= base_url('generateElderlyDeceased') ?>" id="PrintButton">Print</a>
                                </div>
                                <div class="table-responsive pt-3">
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
                                                <th>Date of Death</th>
                                                <th>Cause of Death</th>
                                                <th>Status</th>
                                                <th>Action</th>
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
                                                <td><?=$k['datedeath'] ?></td>
                                                <td><?=$k['causedeath'] ?></td>
                                                <td>
                                                    <?=$k['scstatus'] ?>
                                                    <td>
                                                    <a href="<?= base_url('/vieweditdeceased/') . $k['Id']?>">
                                                        <button class="edit-button">Edit</button>
                                                    </a>
                                                    <a href="<?= base_url("deletedeceasedElder/".$k['Id']); ?>" onClick="return confirm('Are you sure you want to delete?')" class="btn btn-danger btn-sm btn-icon-text">
                                                    Delete <i class="typcn typcn-delete-outline btn-icon-append"></i></a>
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