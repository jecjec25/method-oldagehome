<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
  
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
      <h4>Welcome  <?= session()->get('Username')?> </h4>
        <ul class="navbar-nav mr-lg-2">
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link" href="#" data-toggle="dropdown" id="profileDropdown">
              <img src="../login/images/faces/face5.jpg" alt="profile"/>
              
              <span class="nav-profile-name"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item" href="/userprofile">
                <i class="typcn typcn-cog-outline text-primary"></i>
                Profile
              </a>
              <!-- <a class="dropdown-item" href="change-password.php">
                <i class="typcn typcn-cog-outline text-primary"></i>
                Change Password
              </a> -->
              <a class="dropdown-item" href="/usersignin">
                <i class="typcn typcn-eject text-primary"></i>
                Logouts
              </a>
              
            </div>
          </li>
        </ul>
        
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="typcn typcn-th-menu"></span>
        </button>
      </div>
    </nav><script type="text/javascript">
$(document).ready(function() {
 setInterval(runningTime, 1000);
});
function runningTime() {
  $.ajax({
    url: 'timeScript.php',
    success: function(data) {
       $('#runningTime').html(data);
     },
  });
}
</script>
