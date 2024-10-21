  <style>
      .top-nav ul li a:hover,
      .top-nav ul li.active a {
        color: black; /* Change to desired highlight color */
        /* Add any other styles you want for hover and active states */
      }
      .top-nav ul {
        list-style: none;
      }
    </style>
</head>
<body>
  <div class="strip"> </div>
  <div class="header-top" id="home">
    <div class="container">
      <div class="head-section">
        <div class="logo-content">
          <div class="logo">
            <img src="images/Alogo1.jpg" alt="" style="width: 100px; height: 100px;" />
            <img src="images/Alogo.jpg" alt="" style="width: 160px; height: 140px;" />
            <h4 style="color: darkgreen;">Senior Care Management System</h4>
          </div>
          <div class="top-log">
            <br>
            
            <ul>
              <li><a href="/signin">Login Here</a></li>
              <li><a href="/contact">Contact</a></li>
              <li><a href="/menu">Necessity</a></li>
            </ul>
            <div class="clearfix"> </div>
          </div>
          <div class="clearfix"> </div>
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
          <li class="active"><a href="/">Home</a></li>
          <li><a href="/about">About</a></li>
          <li><a href="/products">Product</a></li>
          <li><a href="/services">Services</a></li>
          <li><a href="/news">News&Events</a></li>
          <li><a href="/announcement">Announcement</a></li>
          <li><a href="/donation">How to Donate</a></li>
          <li><a href="/menu">Necessity</a></li>
          <div class="clearfix"> </div>
        </ul>
        <a href="#" id="pull"><h6>Menu</h6><img src="images/menu-icon.png" title="menu" /></a>
      </nav>
    </div>
    <div class="clearfix"> </div>
  </div>
  <script>
    $(document).ready(function() {
      // Get the current URL path
      var currentPath = window.location.pathname;

      // Loop through each navigation link
      $('.top-nav ul li a').each(function() {
        var linkPath = $(this).attr('href');

        // Check if the link path matches the current path
        if (linkPath === currentPath) {
          $('.top-nav ul li').removeClass('active'); // Remove 'active' class from all li
          $(this).parent().addClass('active'); // Add 'active' class to the parent li
        }
      });

      // Remove the 'active' class from the 'Home' button when another button is clicked
      $('.top-nav ul li a').on('click', function() {
        $('.top-nav ul li').removeClass('active');
        $(this).parent().addClass('active');
      });
    });

    $(function() {
      var pull = $('#pull');
      var menu = $('nav ul');
      $(pull).on('click', function(e) {
        e.preventDefault();
        menu.slideToggle();
      });
      $(window).resize(function() {
        var w = $(window).width();
        if (w > 320 && menu.is(':hidden')) {
          menu.removeAttr('style');
        }
      });
    });

    $(document).ready(function() {
      $("span.menu").click(function() {
        $(".top-nav ul").slideToggle(200);
      });
    });
  </script>
