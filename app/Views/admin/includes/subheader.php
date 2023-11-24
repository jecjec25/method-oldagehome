<!--header-->
<div class="strip"> </div>
  <div class="header-top" id="home">
    <div class="container">
      <div class="head-section">
        <div class="logo-content">
          <!--top-logo-->
          
              <div class="logo">
                  <a href="index.php"><img src="images/logo.png"  alt="" width="180" height="100" /></a>
                  <h4 style="color: orange;">Old Age Home Management System</h4>
              </div>
              <div class="top-log">
                <ul>
                  <li><a href="#">Admin</a></li>
                  <li><a href="/contact">Contact</a></li>
                 <li><a href="/eligibility">Eligibility</a></li>
                <li><a href="/rules"> Rules </a></li>
                 <li><a href="#"> Search </a></li>
                </ul>
                  <div class="clearfix"> </div> 
              </div>  
              <div class="clearfix"> </div> 
          </div>
          <div class="social-content">
              <div class="top-icons">
                <ul>
                  <li><a class="fb" href="#"><span> </span></a></li>
                  <li><a class="gp" href="#"><span> </span></a></li>
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
    <!--start-top-nav-->
             <nav class="top-nav">
              <ul class="top-nav">
                <li class="active"><a href="/home">Home</a></li>
                <li><a href="/about">  About </a></li>
                <li><a href="/products">Products</a></li>
                <li><a href="/services">Services</a></li>
                <li><a href="/eligibility">Eligibility</a></li>
                <li><a href="/rules"> Rules </a></li>
                <li><a href=""> Search </a></li>
                <li><a href="/contact">Contact</a></li>
                  <div class="clearfix"> </div>
              </ul>
              <a href="#" id="pull"><h6>MENU</h6><img src="images/menu-icon.png" title="menu" /></a>

            </nav>
            <!--start-top-nav-script-->
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
  <!--//End-top-nav-script-->

      <!-- script-for-menu -->
        <script>
          $(document).ready(function(){
            $("span.menu").click(function(){
              $(".top-nav ul").slideToggle(200);
            });
          });
        </script>
      <div class="clearfix"> </div>
    </div>
    <!--/header-->