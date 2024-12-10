<!DOCTYPE html>
<html lang="en">
<head>
    <title>Update Elder</title>
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
        .table { width: 100%; margin-bottom: 20px; }
        .table-striped tbody>tr:nth-child(odd)>td, .table-striped tbody>tr:nth-child(odd)>th { background-color: #f9f9f9; }
        .modal { display: none; position: fixed; z-index: 1000; padding-top: 60px; left: 0; top: 0; width: 100%; height: 100%; overflow: auto; background-color: rgba(0, 0, 0, 0.8); }
        .modal-content { margin: auto; display: block; width: 80%; max-width: 700px; }
        .modal-content img { width: 100%; height: auto; }
        .close { position: absolute; top: 30px; right: 35px; color: white; font-size: 40px; font-weight: bold; cursor: pointer; }
        @media print { #PrintButton, #DatePrepared { display: none; } }
        @page { size: auto; margin: 0; }
        @media only screen and (max-width: 412px) {
            .navbar-breadcrumb { flex-direction: column; align-items: flex-start; padding: 10px; }
            .navbar-menu-wrapper { justify-content: flex-start; padding: 10px; }
            .navbar-nav { display: flex; flex-direction: column; align-items: flex-start; }
            .card { margin: 0 10px; padding: 10px; }
            .table-responsive { overflow-x: auto; }
            .table thead, .table tbody { display: block; }
            .table tbody tr { display: block; margin-bottom: 10px; }
            .table td, .table th { display: block; width: 100%; text-align: left; }
            .table td img { width: 100%; height: auto; }
        }
    </style>
</head>
<body>
    <div class="container-scroller">
        <?php include_once('includes/header.php');?>
        <nav class="navbar-breadcrumb col-xl-12 col-12 d-flex flex-row p-0">
            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end" align="right">
                <ul class="navbar-nav mr-lg-2">
                    <li class="nav-item ml-0"><h4 class="mb-0">Update Elder</h4></li>
                    <li class="nav-item">
                        <div class="d-flex align-items-baseline">
                            <p class="mb-0">Home</p>
                            <i class="typcn typcn-chevron-right"></i>
                            <p class="mb-0"><a href="adddetails" style="color: white;">Register Elder</a></p>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="container-fluid page-body-wrapper">
            <?php include_once('includes/sidebar.php'); ?>
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <h4 class="card-title" style="padding-left: 20px; padding-top: 20px;">Update Elder</h4>
                                <p class="card-description" style="padding-left: 20px;">Update an Elder to Aruga Kapatid</p>
                                <div style="padding-left: 20px; margin-bottom: 10px;">
                                    <label for="sortOption">Sort by:</label>
                                    <select id="sortOption">
                                        <option value="az" <?= isset($sortOption) && $sortOption == 'az' ? 'selected' : '' ?>>A-Z by Last Name</option>
                                        <option value="za" <?= isset($sortOption) && $sortOption == 'za' ? 'selected' : '' ?>>Z-A by Last Name</option>
                                        <option value="date_asc" <?= isset($sortOption) && $sortOption == 'date_asc' ? 'selected' : '' ?>>By Date (Ascending)</option>
                                        <option value="date_desc" <?= isset($sortOption) && $sortOption == 'date_desc' ? 'selected' : '' ?>>By Date (Descending)</option>
                                    </select>
                                </div>

                                <form action="searchdets" method="get">
                                    <input name="searchsc" type="text">
                                    <button type="submit"><i class="typcn typcn-zoom menu-icon"></i></button>
                                </form>
                                <div class="table-responsive pt-3">
                                    <?php if (session()->getFlashdata('error')): ?>
                                        <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
                                    <?php endif; ?>
                                    <?php if (session()->getFlashdata('success')): ?>
                                        <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
                                    <?php endif; ?>
                                    <table class="table table-striped project-orders-table" id="tblscdetails">
                                        <thead>
                                            <tr>
                                                <th>Last Name</th>
                                                <th>First Name</th>
                                                <th>Middle Name</th>
                                                <th>Nickname</th>
                                                <th>Date of Birth</th>
                                                <th>Age</th>
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
                                            <?php foreach ($main as $k): ?>
                                                <tr>
                                                    <td><?= $k['lastname'] ?></td>
                                                    <td><?= $k['firstname'] ?></td>
                                                    <td><?= $k['middlename'] ?></td>
                                                    <td><?= $k['nickname'] ?></td>
                                                    <td><?= $k['DateBirth'] ?></td>
                                                    <td><?= $k['age'] ?></td>
                                                    <td><?= $k['gender'] ?></td>
                                                    <td><?= $k['marital_stat'] ?></td>
                                                    <td><?= $k['ContNum'] ?></td>
                                                    <td><img src="<?= "upload/seniors/" . $k['ProfPic'] ?>" alt="Senior Image" style="width: 90px;height: 90px; cursor: pointer;" onclick="openModal(this)"></td>
                                                    <td><?= $k['ComAdd'] ?></td>
                                                    <td><?= $k['EmergencyAdd'] ?></td>
                                                    <td><?= $k['EmergencyContNum'] ?></td>
                                                    <td><?= $k['RegDate'] ?></td>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <a href="<?= base_url('admissionwithdata/') . $k['Id'] ?>" class="btn btn-primary btn-sm btn-icon-text mr-3">SLIP <i class="typcn typcn-edit btn-icon-append"></i></a>
                                                            <a href="<?= base_url('edit/') . $k['Id'] ?>" class="btn btn-success btn-sm btn-icon-text mr-3">Edit <i class="typcn typcn-edit btn-icon-append"></i></a>
                                                            <form action="<?= base_url('Archive') ?>" method="post">
                                                                <input type="hidden" name="update" value="<?= $k['Id'] ?>">
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
                                <ul class="pagination" id="paginationControls"> </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <?php include_once('includes/footer.php'); ?>
            </div>
        </div>
    </div>
    <div id="imageModal" class="modal">
        <span class="close" onclick="closeModal()" style="font-size:90px;">&times;</span>
        <div class="modal-content">
            <img id="modalImage" src="" alt="Large Profile Picture">
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
    <script src="https://code.jquery.com//jquery-3.7.1.js" integrity="sha256-eKHayi8LEQwp4NKxN+3qOVUtJn3QNZ0ciWLP4=" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function (){
            const rowsPerPage = 7;
            const rows = $('#tblscdetails tbody tr');
            const rowsCount = rows.length;
            const pageCount = Math.ceil(rowsCount / rowsPerPage);

            for (let i = 1; i <= pageCount; i++) {
                $('#paginationControls').append(`<li class="page-item"> <a href="#" class="page-link">${i}</a> </li>`);
            }
        
            displayPage(1);

            $('#paginationControls').on('click', '.page-link', function (e) {
                e.preventDefault();
                const page = parseInt($(this).text());
                displayPage(page);
            });

            function displayPage(page) {
                const start = (page - 1) * rowsPerPage;
                const end = start + rowsPerPage;

                rows.hide();
                rows.slice(start, end).show();

                $('#paginationControls .page-item').removeClass('active');
                $(`#paginationControls .page-item:eq(${page - 1})`).addClass('active');
            }
        });

        document.getElementById('sortOption').addEventListener('change', function () {
            const selectedSort = this.value;
            window.location.href = `?sort=${selectedSort}`;
        });

        function openModal(img) {
            document.getElementById("modalImage").src = img.src;
            document.getElementById("imageModal").style.display = "block";
        }

        function closeModal() {
            document.getElementById("imageModal").style.display = "none";
        }
    </script>
</body>
</html>
