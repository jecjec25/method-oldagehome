<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
  <div class="navbar-brand-wrapper d-flex justify-content-center">
    <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">
      <a class="navbar-brand brand-logo d-none d-md-block" href="/dashboard">
        <strong style="color: white;">SENIORCARE</strong>
      </a>
      <a class="navbar-brand brand-logo-mini" href="/dashboard">
        <img src="../login/images/logo-mini.svg" alt="logo" />
      </a>
      <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
        <span class="typcn typcn-th-menu"></span>
      </button>
    </div>
  </div>

  <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
    <h4 class="d-none d-lg-block">Welcome <?= session()->get('Username') ?> </h4>
    <ul class="navbar-nav mr-lg-2">
      <li class="nav-item nav-profile dropdown">
        <a class="nav-link" href="#" data-toggle="dropdown" id="profileDropdown">
          <img src="<?="/upload/user_images/" . session()->get('user_img') ?>" alt="Profile Image" />
          <span class="nav-profile-name d-none d-md-inline-block"><?= session()->get('Username') ?></span>
        </a>
        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
          <a class="dropdown-item" href="/profile">
            <i class="typcn typcn-cog-outline text-primary"></i> Profile
          </a>
          <a class="dropdown-item" href="/logout">
            <i class="typcn typcn-eject text-primary"></i> Logout
          </a>
        </div>
      </li>
    </ul>

    <ul class="navbar-nav mr-lg-2">
      <li class="nav-item nav-profile dropdown">
        <a class="nav-link" href="#" data-toggle="dropdown" id="notificationDropdown">
          <span class="position-relative">
            <i class="typcn typcn-bell menu-icon" style="font-size: 30px;">
              <span <?php if($countNotifs > 0):?> id="notification-count" <?php endif;?>>
                <?php if($countNotifs > 0):?> <?= $countNotifs ?><?php endif; ?>
              </span>
            </i>
          </span>
        </a>
        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="notificationDropdown">
          <?php foreach($getnotif as $notif): ?>
            <a class="dropdown-item" href="<?= base_url('gettoAccept/' . $notif['bookingId']) ?>">
              <?= $notif['event'] ?> is <?= $notif['status'] ?>
            </a>
          <?php endforeach; ?>
        </div>
      </li>
    </ul>

    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
      <span class="typcn typcn-th-menu"></span>
    </button>
  </div>
</nav>

<script type="text/javascript">
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

<style>
  #notification-count {
    background-color: red;
    color: white;
    padding: 2px 6px;
    border-radius: 50%;
    font-size: 12px;
    position: absolute;
    top: 0;
    right: 0;
    transform: translate(50%, -50%);
  }

  /* Responsive Styles */
  @media (max-width: 768px) {
    #notification-count {
      font-size: 10px;
      padding: 1px 4px;
      top: -5px; /* Adjust position for mobile */
      right: -10px; /* Center over icon in mobile */
      transform: translate(0, 0);
    }
  }

  /* Additional responsive styling */
  @media (max-width: 576px) {
    #notification-count {
      font-size: 8px;
      top: -3px;
      right: -5px;
    }
  }
</style>
