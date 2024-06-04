  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="/css/sidebar.css" rel='stylesheet' type='text/css' />
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"/>

  </head>
 
  <style>
body {
    font-family: Arial, sans-serif;
}

.notification-dropdown a {
    text-decoration: none; /* This removes the underline */
  }
  
.notification-container {
    position: relative;
    display: inline-block;
}

.notification-button {
    background-color:  #0056b3;
    color: white;
    padding: 10px 20px;
    border: none;
    cursor: pointer;
    font-size: 16px;
    border-radius: 5px;
    position: relative;
}

.notification-button #notification-count {
    background-color: red;
    color: white;
    padding: 2px 6px;
    border-radius: 50%;
    font-size: 12px;
    position: absolute;
    top: -10px;
    right: -10px;
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
}

.notification-item {
    padding: 12px 16px;
    border-bottom: 1px solid #ddd;
}

.notification-item:hover {
    background-color: #f1f1f1;
}
.dropdown  .helloDrop li a {
    color: black; /* Set the font color to black */

  align:left;
  }


  </style>
   <body>
    
  <div class="strip"> </div>
    <div class="header-top" id="home">
      <div class="container">
        <div class="head-section">
          <div class="logo-content">

                <div class="logo">
                    <img src="images/Alogo1.jpg"  alt="" style=" width: 100px; height: 100px;"/>
                    <img src="images/Alogo.jpg"  alt="" style=" width: 160px; height: 140px;"/>
                    <h4 style="color: darkgreen;">Senior Care Management System</h4>
                </div>
                <div class="top-log">
                    <div class="clearfix"> </div> 
                
                                  
                  <ul class="nav-list">
                  <li><h4>Welcome  <?= session()->get('Username')?> </h4> </li> 
                  <li>     <a class="dropdown-item" href="/userprofile">
                      <h4>Profile</h4>
                  </a></li>
                  <li>  <a class="dropdown-item" href="/logout">
                  <h4>Logout</h4>
                  </a></li>
                  </div> 
                  
                  <div class="notification-container">
                  <button class="notification-button" onclick="toggleDropdown()">Notifications <span id="notification-count"><?= $getCount['notif']?></span></button>
                  <div id="notification-dropdown" class="notification-dropdown">

                 
                  <div class="notification-item"><small>Notif </small></div>

                    <?php foreach($notif as $notif):?>

                      <div class="notification-item"><a href="<?= base_url('getNotif/' .$notif['id'])?>"><?= $notif['event']?> has <?= $notif['status']?></a></div>
                     <?php endforeach;?>
                  </div>
                 
              </div>
                      
                    </ul>
      
              </div> 
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end profile">
            </div>
            <div class="social-content">
          
                <div class="top-icons">
                    <br>
                    <br>
                
                    <br>
                    
                    <ul>
                    <li><a class="fb" href="https://www.facebook.com/profile.php?id=100068869003335&mibextid=ZbWKwL"><span> </span></a></li>
                    <li><a class="gp" href="https://mail.google.com/mail/u/0/?fs=1&tf=cm&source=mail&to=aruga.kapatid@gmail.com"><span> </span></a></li>
                    <li><a class="you" href="https://youtu.be/nkXEh7hicZs?si=bdyub5fL4ZF__WWv"><span> </span></a></li>
                    <div class="clearfix"> </div>
                  </ul>
                </div>
              </div>
            </div>
              <div class="clearfix"></div>
        </div>

          <div class="clearfix"></div>
      <div class="sub-header">

      <nav class="top-nav">
  <ul class="top-nav">
    <li class="active"><a href="userViewpost">View Event</a></li>
    <li><a href="/booking">Event Reservation</a></li>
    <li class="dropdown">
      <a class="dropdown-toggle" data-toggle="dropdown">Donate to our Elders</a>
      <ul class="dropdown-menu ">
        <!-- Add your dropdown items here -->
        <li><a href="/donate-money">Monetary/Cash Donation</a></li>
        <li><a href="/donate-items">In-kind Donation</a></li>
      </ul>
    </li>
    <li><a href="/userdonation">Donation</a></li>
    <li><a href="/userproduct">Products</a></li>
    <li><a href="/usereventpost">Post an Event</a></li>
    <div class="clearfix"></div>
  </ul>
  <a href="#" id="pull"><h6>MENU</h6><img src="images/menu-icon.png" title="menu" /></a>
</nav>

<script>
  // Add JavaScript to handle dropdown toggle
  document.addEventListener("DOMContentLoaded", function() {
    var dropdownToggle = document.querySelectorAll('.dropdown-toggle');
    for (var i = 0; i < dropdownToggle.length; i++) {
      dropdownToggle[i].addEventListener('click', function() {
        var parent = this.parentElement;
        
        if (parent.classList.contains('open')) {
          parent.classList.remove('open');
        } else {
          parent.classList.add('open');
        }
      });
    }
  });
</script>

                          <script>
                              $(document).ready(function() {
                // Get the current URL
                var currentUrl = window.location.href;

                // Loop through each navigation link
                $('.top-nav ul li a').each(function() {
                    var linkUrl = $(this).attr('href');

                    // Check if the link URL matches the current URL
                    if (currentUrl.indexOf(linkUrl) !== -1) {
                        $(this).parent().addClass('active'); // Add the 'active' class to the parent li
                    }
                });

                // Add 'active' class to the clicked button and remove it from others
                $('.top-nav ul li a').click(function() {
                    $('.top-nav ul li').removeClass('active');
                    $(this).parent().addClass('active');
                });
            });

                        </script>
                        <script>
                    function toggleDropdown() {
                const dropdown = document.getElementById('notification-dropdown');
                dropdown.style.display = dropdown.style.display === 'block' ? 'none' : 'block';
            }

            // Close the dropdown if the user clicks outside of it
            window.onclick = function(event) {
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
        <div class="clearfix"> </div>
      </div>
      </body>
  </html>