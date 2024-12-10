<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Senior Care Management System</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .notification-dropdown a {
    text-decoration: none; /* This removes the underline */
}

.notification-container {
    position: relative;
    display: inline-block;
}

.notification-button {
    background-color: #0056b3;
    color: white;
    padding: 10px 20px;
    border: none;
    cursor: pointer;
    font-size: 16px;
    border-radius: 5px;
    position: absolute;
    margin-top: 300px;
    margin-right: 130px;
}

.notification-button #notification-count {
    background-color: red;
    color: white;
    font-size: 20px;
    border-radius: 30px;
    position: absolute;
    top: -25px;
    right: -1px;
}

.notification-container {
    display: flex;
    justify-content: center;
    align-items: center;
}

.notification-dropdown {
    display: none;
    position: absolute;
    background-color: white;
    min-width: 200px;
    box-shadow: 0 8px 16px rgba(0,0,0,0.2);
    border-radius: 5px;
    overflow: hidden;
    z-index: 1;
    right: 0; /* Position the dropdown to the right */
    top: 50px; /* Adjust the distance from the top */
}

.notification-item {
    padding: 10px 16px;
    border-bottom: 1px solid #ddd;
}

.notification-item.highlight {
    background-color: #f1f1f1; /* Highlight color */
}

        .dropdown .helloDrop li a {
            color: black; /* Set the font color to black */
            align: left;
        }

        .top-nav ul li a:hover,
        .top-nav ul li.active a {
            color: black; /* Change to desired highlight color */
        }

        .top-nav ul {
            list-style: none;
        }

        .dropdown-menu {
            display: none;
            position: absolute;
            background-color: white;
            min-width: 160px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .dropdown-menu li {
            padding: 12px 16px;
        }

        .dropdown-menu li a {
            color: black;
            text-decoration: none;
        }

        .dropdown-menu li:hover {
            background-color: #f1f1f1;
        }

        b {
            font-size: .2em;
        }

        .dropdown.open .dropdown-menu {
            display: block;
        }

        /* Hamburger Menu Styles */
        #hamburger {
            cursor: pointer;
            display: none;
            flex-direction: column;
            justify-content: space-between;
            width: 30px; /* Width of the hamburger icon */
            height: 25px; /* Height of the hamburger icon */
            margin: 20px; /* Add some space around it */
        }

        .bar {
            height: 3px; /* Thickness of the hamburger bars */
            background-color: #333; /* Color of the bars */
            border-radius: 5px; /* Rounded corners */
            transition: all 0.3s; /* Smooth transition */
        }

        /* Responsive Styles */
        @media (max-width: 768px) {
            .top-nav ul {
                display: none; /* Hide the navigation items */
                flex-direction: column; /* Stack items vertically */
                width: 100%; /* Full width */
                background-color: #677beb;
                
            }
            .top-nav ul.active {
                display: flex; /* Show items when active */
                
            }

            #hamburger {
                display: flex; /* Show hamburger icon */
            }

            .notification-button {
                margin-top: 150px;
                margin-right: 65px;
                padding: 8px 16px;
                font-size: 14px;
            }

            .notification-button #notification-count {
                font-size: 18px;
            }

            .notification-dropdown {
                min-width: 160px;
                top: 40px;
            }

            .notification-item {
                padding: 8px 12px;
            }

            .top-nav ul li a {
                font-size: 14px;
            }

            .dropdown-menu {
                min-width: 140px;
            }

            .dropdown-menu li {
                padding: 10px 12px;
            }
        }

        @media (max-width: 480px) {
            .notification-button {
                margin-top: 100px;
                margin-right: 50px;
                padding: 6px 12px;
                font-size: 12px;
            }

            .notification-button #notification-count {
                font-size: 16px;
            }

            .notification-dropdown {
                min-width: 120px;
                top: 30px;
            }

            .notification-item {
                padding: 6px 8px;
            }

            .top-nav ul li a {
                font-size: 12px;
            }

            .dropdown-menu {
                min-width: 120px;
            }

            .dropdown-menu li {
                padding: 8px 10px;
            }
        }
    </style>
</head>
<body>
    <div class="strip"></div>
    <div class="header-top" id="home">
        <div class="container">
            <div class="head-section">
                <div class="logo-content">
                    <div class="logo">
                        <img src="images/Alogo1.jpg" alt="" style="width: 100px; height: 100px;" />
                        <img src="images/LogoHapagAruga.png" alt="" style="width: 160px; height: 140px;" />
                        <h4 style="color: darkgreen;">ESENIORCARE</h4>
                    </div>
                    <div class="top-log">
                        <div class="clearfix"></div>
                        <ul class="nav-list">
                            <li><h4 class="b" style="font-size: 1.2em;">Welcome <?= session()->get('Username') ?> </h4></li>
                            <li><a class="dropdown-item" href="/userprofile"><h4>Profile</h4></a></li>
                            <li><a class="dropdown-item" href="/logout"><h4>Logout</h4></a></li>
                        </ul>
                    </div>

                    <div class="notification-container">
                        <button class="notification-button" onclick="toggleDropdown()">Notifications <span id="notification-count"><?= $getCount['notif'] ?></span></button>
                        <div id="notification-dropdown" class="notification-dropdown">
                            <?php if (!empty($notif)): ?>
                                <div class="notification-item"><small>Notifications</small></div>
                                <?php foreach($notif as $notif): ?>
                                    <div class="notification-item highlight"><a href="<?= base_url('getNotif/' . $notif['id']) ?>"><?= $notif['event'] ?> has <?= $notif['status'] ?></a></div>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <div class="notification-item"><small>No notifications</small></div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end profile"></div>
            <div class="social-content">
                <div class="top-icons">
                    <br><br><br>
                    <ul>
                        <li><a class="fb" href="https://www.facebook.com/profile.php?id=100068869003335&mibextid=ZbWKwL"><span> </span></a></li>
                        <li><a class="gp" href="https://mail.google.com/mail/u/0/?fs=1&tf=cm&source=mail&to=aruga.kapatid@gmail.com"><span> </span></a></li>
                        <li><a class="you" href="https://youtu.be/nkXEh7hicZs?si=bdyub5fL4ZF__WWv"><span> </span></a></li>
                        <div class="clearfix"></div>
                    </ul>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="sub-header">
            <nav class="top-nav">
                <div id="hamburger">
                    <div class="bar"></div>
                    <div class="bar"></div>
                    <div class="bar"></div>
                </div>
                <ul class="top-nav" >
        <li class="active"><a href="/userViewpost">View Event</a></li>
        <li><a href="/booking">Event Reservation</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle">Donate to our Elders</a>
          <ul class="dropdown-menu helloDrop">
            <li><a href="/donate-money">Monetary/Cash Donation</a></li>
            <li><a href="/donate-items">In-kind Donation</a></li>
          </ul>
        </li>
        <li><a href="/userdonation">How to Donate</a></li>
        <li><a href="/userproduct">Products</a></li>
        <li><a href="/usereventpost">Post an Event</a></li>
        <div class="clearfix"></div>
      </ul>
     

            </nav>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Handle dropdown menu toggles
            var dropdownToggles = document.querySelectorAll('.dropdown-toggle');
            dropdownToggles.forEach(function (toggle) {
                toggle.addEventListener('click', function (event) {
                    event.preventDefault();
                    var parent = this.parentElement;
                    if (parent.classList.contains('open')) {
                        parent.classList.remove('open');
                    } else {
                        // Close other open dropdowns
                        document.querySelectorAll('.dropdown').forEach(function (drop) {
                            drop.classList.remove('open');
                        });
                        parent.classList.add('open');
                    }
                });
            });

            // Handle hamburger menu toggle
            var hamburger = document.getElementById('hamburger');
            var navMenu = document.querySelector('.top-nav ul');
            hamburger.addEventListener('click', function (event) {
                event.preventDefault();
                navMenu.classList.toggle('active'); // Toggle the active class
            });

            // Highlight active link
            var currentPath = window.location.pathname;
            var foundActive = false;

            // Check for exact matches first
            document.querySelectorAll('.top-nav ul li a').forEach(function (link) {
                var linkPath = link.getAttribute('href');
                if (linkPath === currentPath) {
                    document.querySelectorAll('.top-nav ul li').forEach(function (li) {
                        li.classList.remove('active');
                    });
                    link.parentElement.classList.add('active');
                    foundActive = true;
                }
            });

            // If no exact match is found, check for partial matches (e.g., dropdown items)
            if (!foundActive) {
                document.querySelectorAll('.dropdown-menu li a').forEach(function (link) {
                    var linkPath = link.getAttribute('href');
                    if (currentPath.includes(linkPath)) {
                        document.querySelectorAll('.top-nav ul li').forEach(function (li) {
                            li.classList.remove('active');
                        });
                        link.closest('.dropdown').classList.add('active');
                    }
                });
            }
        });

        function toggleDropdown() {
            const dropdown = document.getElementById('notification-dropdown');
            dropdown.style.display = dropdown.style.display === 'block' ? 'none' : 'block';
        }

        // Close the dropdown if the user clicks outside of it
        window.onclick = function (event) {
            if (!event.target.matches('.notification-button')) {
                const dropdowns = document.getElementsByClassName('notification-dropdown');
                for (let i = 0; i < dropdowns.length; i++) {
                    const openDropdown = dropdowns[i];
                    if (openDropdown.style.display === 'block') {
                        openDropdown.style.display = 'none';
                    }
                }
            }
        }
    </script>
</body>
</html>
