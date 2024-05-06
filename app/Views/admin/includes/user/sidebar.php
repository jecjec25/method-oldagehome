  <style>
    .profile{
      margin-right:2000px;
    }
    .nav-list {
    
}

.nav-list li {
    display: inline; /* Display list items inline */
    margin-right: 10px; /* Add some spacing between list items */
      }
  </style>
  <div class="strip"> </div>
    <div class="header-top" id="home">
      <div class="container">
        <div class="head-section">
          <div class="logo-content">

                <div class="logo">
                    <img src="images/Alogo1.jpg"  alt="" style=" width: 100px; height: 100px;"/>
                    <img src="images/Alogo.jpg"  alt="" style=" width: 160px; height: 140px;"/>
                    <h4 style="color: orange;">Senior Care Management System</h4>
                </div>
                <div class="top-log">
                    <div class="clearfix"> </div> 
                </div>  
        
                <div class="clearfix">
                                  
                  <ul class="nav-list">
                  <li><h4>Welcome  <?= session()->get('Username')?> </h4></li> 
                  <li>     <a class="dropdown-item" href="/userprofile">
                      <h4>Profile</h4>
                  </a></li>
                  <li>  <a class="dropdown-item" href="/usersignin"></li>
                  <h4>Logout</h4>
                  </a>
            
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
                  
                    <li><a class="fb" href="#"><span> </span></a></li>
                    <li><a class="gp" href="https://mail.google.com/mail/u/0/?fs=1&tf=cm&source=mail&to=aruga.kapatid@gmail.com"><span> </span></a></li>
                    <li><a class="tw" href="#"><span> </span></a></li>
                    <li><a class="you" href="#"><span> </span></a></li>
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
                  <li class="active"><a href="booking">Event Reservation</a></li>
                  <li><a href="/userIdonate">Donate to our Elders</a></li>
                  <li><a href="/userdonation">Donation</a></li>
                  <li><a href="/userproduct">Products</a></li>
                  <li><a href="/usereventpost">Post an Event</a></li>
                  <li><a href="/userViewpost">View Events</a></li>
                  <div class="clearfix"> </div>
                </ul>
                <a href="#" id="pull"><h6>MENU</h6><img src="images/menu-icon.png" title="menu" /></a>
              </nav>
            <script>
              $(function() {
                var pull    = $('#pull');
                  menu    = $('nav ul');
                  menuHeight  = menu.height();
                $(pull).on('click', function(e) {
                  e.preventDefault();
                  menu.slideToggle();
                });
                $(window).resize(function(){
                      var w = $(window).width();
                      if(w > 320 && menu.is(':hidden')) {
                        menu.removeAttr('style');
                      }
                  });
              });
            </script>

          <script>
            $(document).ready(function(){
              $("span.menu").click(function(){
                $(".top-nav ul").slideToggle(200);
              });
            });
          </script>
        <div class="clearfix"> </div>
      </div>
