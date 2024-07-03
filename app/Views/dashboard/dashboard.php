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
                                    <canvas id="bookingsChart"></canvas>
                                    <div class="chart-description">Number of Bookings per Time Range</div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="col-md-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <canvas id="bookingsChart99"></canvas>
                                    <div class="chart-description">Number of Bookings per Month</div>
                                </div>
                            </div>
                        </div> -->
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
                                    <div class="chart-description">Number of In-Kind Donations by Establishment</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        fetch('bookings/by-month')
            .then(response => response.json())
            .then(data => {
                console.log('Fetched data:', data);
                var labels = data.map(item => {
                    if (item.year == null || item.month == null) {
                        console.error('Invalid data item:', item);
                        return 'Invalid Date';
                    }
                    return `${String(item.month).padStart(2, '0')}/${item.year}`;
                });
                var bookingCounts = data.map(item => parseInt(item.total_bookings) || 0);
                const ctx = document.getElementById('bookingsChart99').getContext('2d');
                var bookingsChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Number of Bookings per Month',
                            data: bookingCounts,
                            backgroundColor: 'rgba(54, 162, 235, 0.8)',
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
                console.log('Fetched data:', data);
                var labels = data.map(item => {
                    if (!item.time_range) {
                        console.error('Invalid data item:', item);
                        return 'Invalid Time Range';
                    }
                    return item.time_range;
                });

                var bookingCounts = data.map(item => parseInt(item.total_bookings) || 0);

                const ctx = document.getElementById('bookingsChart').getContext('2d');
                var bookingsChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Number of Bookings per Time Range',
                            data: bookingCounts,
                            backgroundColor: 'rgba(255, 159, 64, 0.8)',
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
        fetch('/products/quantities') // Make sure this is the correct API endpoint
            .then(response => response.json())
            .then(products => {
                const productNames = products.map(product => product.name);
                const productQuantities = products.map(product => parseInt(product.quantity, 10));

                const ctx = document.getElementById('quantityChart').getContext('2d');
                const quantityChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: productNames,
                        datasets: [{
                            label: 'Quantity',
                            data: productQuantities,
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.8)',
                                'rgba(54, 162, 235, 0.8)',
                                'rgba(255, 206, 86, 0.8)',
                                'rgba(75, 192, 192, 0.8)',
                                'rgba(153, 102, 255, 0.8)',
                                'rgba(255, 159, 64, 0.8)',
                                'rgba(255, 99, 132, 0.8)',
                                'rgba(54, 162, 235, 0.8)',
                                'rgba(255, 206, 86, 0.8)',
                                'rgba(75, 192, 192, 0.8)',
                                'rgba(153, 102, 255, 0.8)',
                                'rgba(255, 159, 64, 0.8)'
                            ],
                            borderColor: [
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)',
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
        fetch('/gender/distribution') // Adjust this URL to point to the method you set up
            .then(response => response.json())
            .then(data => {
                var labels = data.map(item => item.gender);
                var counts = data.map(item => item.count);

                var genderChart = new Chart(ctx, {
                    type: 'pie',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Gender Distribution',
                            data: counts,
                            borderColor: [
                                'rgba(75, 192, 192, 1)',
                                'rgba(255, 159, 64, 1)'
                            ],
                            backgroundColor: [
                                'rgba(75, 192, 192, 0.8)',
                                'rgba(255, 159, 64, 0.8)'
                            ],
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
        document.addEventListener('DOMContentLoaded', function() {
            fetch('/in-kind-donation/getInKindDonations')
                .then(response => response.json())
                .then(donations => {
                    // Prepare data for the bar chart
                    const donationCountsByDate = {};

                    donations.forEach(donation => {
                        const date = donation.donationdate;

                        if (!donationCountsByDate[date]) {
                            donationCountsByDate[date] = 0;
                        }
                        donationCountsByDate[date] += 1;
                    });

                    const dates = Object.keys(donationCountsByDate);
                    const donationCounts = Object.values(donationCountsByDate);

                    const ctx = document.getElementById('inKindDonationsChart').getContext('2d');
                    new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: dates,
                            datasets: [{
                                label: 'Number of In-Kind Donations (Received)',
                                data: donationCounts,
                                backgroundColor: 'rgba(75, 192, 192, 0.8)',
                                borderColor: 'rgba(75, 192, 192, 1)',
                                borderWidth: 1
                            }]
                        },
                        options: {
                            plugins: {
                                title: {
                                    display: true,
                                    text: 'In-Kind Donations by Date (Received)'
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
        });
    </script>
</body>

</html>