<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donations and Bookings Charts</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .space {
            width: 115%;
        }

        .chart-description {
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper space">
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-md-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <canvas id="bookingsChart99"></canvas>
                                    <div class="chart-description">Number of Bookings per Month</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <canvas id="quantityChart"></canvas>
                                    <div class="chart-description">Product Quantities</div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <canvas id="genderChart" style="height:50px"></canvas>
                                    <div class="chart-description">Gender Distribution</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <canvas id="inKindDonationsChart"></canvas>
                                    <div class="chart-description">Number of In-Kind Donations per Month</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                    <canvas id="donationsChart" width="800" height="400"></canvas>
                                    <div class="chart-description">Monthly Cash Donations</div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                    <canvas id="ageChart" width="800" height="400"></canvas>
                                    <div class="chart-description">AGE OF ADMISSION</div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                    <canvas id="ageDeathChart" width="800" height="400"></canvas>
                                    <div class="chart-description">AGE OF DEATH</div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            // Function to generate random colors
            function generateRandomColor() {
                var letters = '0123456789ABCDEF';
                var color = '#';
                for (var i = 0; i < 6; i++) {
                    color += letters[Math.floor(Math.random() * 16)];
                }
                return color;
            }
        </script>

        <script>
            fetch('ageDeath/distribution')
                .then(response => response.json())
                .then(data => {
                    if (Object.keys(data).length === 0) {
                        console.error('No data found for ages.');
                        return;
                    }

                    var labels = Object.keys(data); // Age groups (keys)
                    var counts = Object.values(data); // Number of users for each age group (values)

                    var backgroundColors = labels.map(() => generateRandomColor()); // Dynamic colors

                    const ctx = document.getElementById('ageDeathChart').getContext('2d');

                    new Chart(ctx, {
                        type: 'pie',
                        data: {
                            labels: labels,
                            datasets: [{
                                data: counts,
                                backgroundColor: backgroundColors, // Apply dynamic colors
                                hoverOffset: 4
                            }]
                        },
                        options: {
                            cutoutPercentage: 50,
                            plugins: {
                                title: {
                                    display: true,
                                    text: 'Age Group Distribution'
                                },
                                tooltip: {
                                    callbacks: {
                                        label: function(tooltipItem) {
                                            let label = tooltipItem.label || '';
                                            let value = tooltipItem.raw || 0;
                                            return `${label}: ${value} people`;
                                        }
                                    }
                                }
                            }
                        }
                    });
                })
                .catch(error => console.error('Error fetching age data:', error));
        </script>

        <script>
            fetch('/age/distribution')
                .then(response => response.json())
                .then(data => {
                    if (Object.keys(data).length === 0) {
                        console.error('No data found for ages.');
                        return;
                    }

                    var labels = Object.keys(data);
                    var counts = Object.values(data);

                    var backgroundColors = labels.map(() => generateRandomColor()); // Dynamic colors

                    const ctx = document.getElementById('ageChart').getContext('2d');

                    new Chart(ctx, {
                        type: 'pie',
                        data: {
                            labels: labels,
                            datasets: [{
                                data: counts,
                                backgroundColor: backgroundColors, // Apply dynamic colors
                                hoverOffset: 4
                            }]
                        },
                        options: {
                            cutoutPercentage: 50,
                            plugins: {
                                title: {
                                    display: true,
                                    text: 'Age Group Distribution'
                                },
                                tooltip: {
                                    callbacks: {
                                        label: function(tooltipItem) {
                                            let label = tooltipItem.label || '';
                                            let value = tooltipItem.raw || 0;
                                            return `${label}: ${value} people`;
                                        }
                                    }
                                }
                            }
                        }
                    });
                })
                .catch(error => console.error('Error fetching age data:', error));
        </script>

        <script>
            fetch('donations/by-month')
                .then(response => response.json())
                .then(data => {
                    if (data.length === 0) {
                        console.error('No data found for donations.');
                        return;
                    }

                    var labels = data.map(item => `${String(item.month).padStart(2, '0')}/${item.year}`);
                    var donationAmounts = data.map(item => parseFloat(item.total_donations) || 0);

                    var backgroundColors = donationAmounts.map(() => generateRandomColor()); // Dynamic colors

                    const ctx = document.getElementById('donationsChart').getContext('2d');

                    new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: labels,
                            datasets: [{
                                label: 'Total Donations (in PHP)',
                                data: donationAmounts,
                                backgroundColor: backgroundColors, // Apply dynamic colors
                                borderColor: 'rgba(75, 192, 192, 1)',
                                borderWidth: 1
                            }]
                        },
                        options: {
                            plugins: {
                                title: {
                                    display: true,
                                    text: 'Cash Donations by Month'
                                }
                            },
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });
                })
                .catch(error => console.error('Error fetching donation data:', error));
        </script>

        <script>
            fetch('bookings/by-month')
                .then(response => response.json())
                .then(data => {
                    var labels = data.map(item => `${String(item.month).padStart(2, '0')}/${item.year}`);
                    var bookingCounts = data.map(item => parseInt(item.total_bookings) || 0);

                    var backgroundColors = bookingCounts.map(() => generateRandomColor()); // Dynamic colors

                    const ctx = document.getElementById('bookingsChart99').getContext('2d');

                    new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: labels,
                            datasets: [{
                                label: 'Number of Bookings per Month',
                                data: bookingCounts,
                                backgroundColor: backgroundColors, // Apply dynamic colors
                                borderColor: 'rgba(54, 162, 235, 1)',
                                borderWidth: 1
                            }]
                        },
                        options: {
                            plugins: {
                                title: {
                                    display: true,
                                    text: 'Bookings by Month'
                                }
                            },
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
            fetch('bookings/by-time-range')
                .then(response => response.json())
                .then(data => {
                    var labels = data.map(item => item.time_range);
                    var bookingCounts = data.map(item => parseInt(item.total_bookings) || 0);

                    var backgroundColors = bookingCounts.map(() => generateRandomColor()); // Dynamic colors

                    const ctx = document.getElementById('bookingsChart').getContext('2d');

                    new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: labels,
                            datasets: [{
                                label: 'Number of Bookings per Time Range',
                                data: bookingCounts,
                                backgroundColor: backgroundColors, // Apply dynamic colors
                                borderColor: 'rgba(255, 159, 64, 1)',
                                borderWidth: 1
                            }]
                        },
                        options: {
                            plugins: {
                                title: {
                                    display: true,
                                    text: 'Bookings by Time Range'
                                }
                            },
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
            fetch('/products/quantities')
                .then(response => response.json())
                .then(products => {
                    const productNames = products.map(product => product.name);
                    const productQuantities = products.map(product => parseInt(product.quantity, 10));

                    var backgroundColors = productQuantities.map(() => generateRandomColor()); // Dynamic colors

                    const ctx = document.getElementById('quantityChart').getContext('2d');

                    new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: productNames,
                            datasets: [{
                                label: 'Quantity',
                                data: productQuantities,
                                backgroundColor: backgroundColors, // Apply dynamic colors
                                borderColor: 'rgba(153, 102, 255, 1)',
                                borderWidth: 1
                            }]
                        },
                        options: {
                            plugins: {
                                title: {
                                    display: true,
                                    text: 'Product Quantities'
                                }
                            },
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
            var ctx = document.getElementById('genderChart').getContext('2d');
            fetch('/gender/distribution')
                .then(response => response.json())
                .then(data => {
                    var labels = data.map(item => item.gender);
                    var counts = data.map(item => item.count);

                    var backgroundColors = counts.map(() => generateRandomColor()); // Dynamic colors

                    new Chart(ctx, {
                        type: 'pie',
                        data: {
                            labels: labels,
                            datasets: [{
                                label: 'Gender Distribution',
                                data: counts,
                                backgroundColor: backgroundColors, // Apply dynamic colors
                                borderWidth: 1
                            }]
                        },
                        options: {
                            responsive: true,
                            plugins: {
                                title: {
                                    display: true,
                                    text: 'Gender Distribution'
                                },
                                legend: {
                                    position: 'top',
                                },
                            }
                        }
                    });
                })
                .catch(error => console.error('Error fetching data:', error));
        </script>

        <script>
            fetch('in-kind-donation/getInKindDonations')
                .then(response => response.json())
                .then(data => {
                    var labels = data.map(item => `${String(item.month).padStart(2, '0')}/${item.year}`);
                    var donationCounts = data.map(item => parseInt(item.total_Inkinds) || 0);

                    var backgroundColors = donationCounts.map(() => generateRandomColor()); // Dynamic colors

                    const ctx = document.getElementById('inKindDonationsChart').getContext('2d');

                    new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: labels,
                            datasets: [{
                                label: 'Number of Inkind-Donation By Month',
                                data: donationCounts,
                                backgroundColor: backgroundColors, // Apply dynamic colors
                                borderColor: 'rgba(54, 162, 235, 1)',
                                borderWidth: 1
                            }]
                        },
                        options: {
                            plugins: {
                                title: {
                                    display: true,
                                    text: 'Bookings by Month'
                                }
                            },
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

    </body>

</html>
