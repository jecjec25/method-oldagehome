<style>
    .space {
        width: 115%;
    }
</style>

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
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <canvas id="quantityChart"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                <canvas id="genderChart" style="height:50px"></canvas>
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
            let date = new Date(item.year, item.month - 1);
            let formattedDate = `${item.month}/${item.year}`;
            return formattedDate;
        });
        var bookingCounts = data.map(item => parseInt(item.total_bookings) || 0);
        const ctx = document.getElementById('bookingsChart').getContext('2d');
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
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)',
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
                               
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)'
                            ],
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.6)',
                                'rgba(54, 162, 235, 0.6)',
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                position: 'top',
                            },
                        }
                    }
                });
            })
            .catch(error => console.error('Error fetching data:', error));
    </script>
</body>
