<!DOCTYPE html>
<html lang="en">

<head>
    <title></title>
    <link rel="stylesheet" href="login/vendors/typicons/typicons.css">
    <link rel="stylesheet" href="login/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="login/vendors/select2/select2.min.css">
    <link rel="stylesheet" href="login/vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
    <link rel="stylesheet" href="login/css/vertical-layout-light/style.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
    <script type="text/javascript">
        bkLib.onDomLoaded(nicEditors.allTextAreas);
    </script>
</head>
<style>
    .space
    {
        width: 116%;
    }
</style>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper space">
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">

                                    <canvas id="bookingsChart"></canvas>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <canvas id="quantityChart"></canvas>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



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
    <script>
        var ctx = document.getElementById('bookingsChart').getContext('2d');
        fetch('/bookings/by-month') // Make sure this URL points to your CI4 controller method
            .then(response => response.json())
            .then(data => {
                var labels = data.map(item => `${new Date(item.year, item.month - 1).toLocaleString('default', { month: 'short' })} ${item.year}`);
                var bookingCounts = data.map(item => parseInt(item.total_bookings));

                var bookingsChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Number of Bookings per Month',
                            data: bookingCounts,
                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                            borderColor: 'rgba(75, 192, 192, 1)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            })
            .catch(error => console.error('Error fetching data:', error));
    </script>

    <script>
        fetch('/products/quantities') // Make sure this is the correct API endpoint
            .then(response => response.json())
            .then(products => {
                const productNames = products.map(product => product.ProdName);
                const productQuantities = products.map(product => parseInt(product.Quantity, 10));

                const ctx = document.getElementById('quantityChart').getContext('2d');
                const quantityChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: productNames,
                        datasets: [{
                            label: 'Quantity',
                            data: productQuantities,
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)'
                            ],
                            borderColor: [
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)'
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        },
                        plugins: {
                            legend: {
                                display: true,
                                position: 'top',
                                labels: {
                                    color: 'rgb(255, 99, 132)'
                                }
                            }
                        }
                    }
                });
            })
            .catch(error => console.error('Error fetching data:', error));
    </script>
</body>

</html>