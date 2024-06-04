
<div class="theme-setting-wrapper">
        <div id="settings-trigger"><i class="typcn typcn-cog-outline"></i></div>
        <div id="theme-settings" class="settings-panel">
          <i class="settings-close typcn typcn-times"></i>
          <p class="settings-heading">SIDEBAR SKINS</p>
          <div class="sidebar-bg-options selected" id="sidebar-light-theme"><div class="img-ss rounded-circle bg-light border mr-3"></div>Light</div>
          <div class="sidebar-bg-options" id="sidebar-dark-theme"><div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark</div>
          <p class="settings-heading mt-2">HEADER SKINS</p>
          <div class="color-tiles mx-0 px-4">
            <div class="tiles success"></div>
            <div class="tiles warning"></div>
            <div class="tiles danger"></div>
            <div class="tiles info"></div>
            <div class="tiles dark"></div>
            <div class="tiles default"></div>
          </div>
        </div>
      </div>
 <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="/dashboard">
              <i class="typcn typcn-device-desktop menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
              <i class="typcn typcn-user menu-icon"></i>
              <span class="menu-title">Register Elder</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="charts">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="/adddetails">Register Elder</a></li>
                <li class="nav-item"> <a class="nav-link" href="/test">Update Elder</a></li>
                <li class="nav-item"> <a class="nav-link" href="/archives">Left Elder</a></li>
                <li class="nav-item"> <a class="nav-link" href="/archivesdeceased">Deceased Elder</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#product" aria-expanded="false" aria-controls="charts">
              <i class="typcn typcn-shopping-bag menu-icon"></i>
              <span class="menu-title">Handmade Product</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="product">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link <?= isset($page_title) && $page_title == 'POS' ? 'active' : '' ?>" href="<?= base_url('Main/pos') ?>">POS</a></li>
                <li class="nav-item"> <a class="nav-link" href="/addproduct">Add Product</a></li>
                <li class="nav-item"> <a class="nav-link" href="/show">Update Product</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#form-element" aria-expanded="false" aria-controls="form-elements">
              <i class="typcn typcn-film menu-icon"></i>
              <span class="menu-title">Inquiry</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="form-element">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="contactu">Unread Inquiry</a></li>
                <li class="nav-item"><a class="nav-link" href="/readenq">Read Inquiry</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
              <i class="typcn typcn-th-small-outline menu-icon"></i>
              <span class="menu-title">Reporting</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="tables">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="/reports">Report of Elders</a></li>
              </ul>
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="/viewreportleft">Report of Left Elders</a></li>
              </ul>
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="/viewreportdeath">Report of Deceased Elders</a></li>
              </ul>
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="/reportevent">Report of Events</a></li>
              </ul>
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="/reportMonetary">Report of Monetary Donations</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#calendar" aria-expanded="false" aria-controls="charts">
              <i class="typcn typcn-calendar menu-icon"></i>
              <span class="menu-title">Event Calendar</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="calendar">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="/calendar">Event Calendar</a></li>
                <li class="nav-item"> <a class="nav-link" href="/ADbooking">Accepted Event</a></li>
                <li class="nav-item"> <a class="nav-link" href="/Dbooking">Declined Event</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#reports" aria-expanded="false" aria-controls="charts">
              <i class="typcn typcn-document-text menu-icon"></i>
              <span class="menu-title">Report of Donation</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="reports">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="/donationReps ">Report of Donation</a></li>
                <li class="nav-item"> <a class="nav-link" href="/viewDonation">Update Donation Report</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#news" aria-expanded="false" aria-controls="charts">
              <i class="typcn typcn-news menu-icon"></i>
              <span class="menu-title">News and Events</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="news">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="/adnews">News</a></li>
                <li class="nav-item"> <a class="nav-link" href="/updatenews">Update News</a></li>
                <li class="nav-item"> <a class="nav-link" href="/newspublished">Published News</a></li>
                <li class="nav-item"> <a class="nav-link" href="/newsarchive">Archived News</a></li>
                <li class="nav-item"> <a class="nav-link" href="/adevents">Events</a></li>
                <li class="nav-item"> <a class="nav-link" href="Viewevents">Update Events</a></li>
                <li class="nav-item"> <a class="nav-link" href="/publishedevents  ">Published Events</a></li>
                <li class="nav-item"> <a class="nav-link" href="/eventsarchive ">Archived Events</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#Announcement" aria-expanded="false" aria-controls="charts">
              <i class="typcn typcn-microphone menu-icon"></i>
              <span class="menu-title">Announcement</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="Announcement">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="/Adannouncement">Announcement</a></li>
                <li class="nav-item"> <a class="nav-link" href="/updateannounce">Update Announcement</a></li>
                <li class="nav-item"> <a class="nav-link" href="/publishedannounce">Published Announcement</a></li>
                <li class="nav-item"> <a class="nav-link" href="/announceArchived">Archive Announcement</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#donation" aria-expanded="false" aria-controls="form-elements">
              <i class="typcn typcn-gift menu-icon"></i>
              <span class="menu-title">Donation</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="donation">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="userdonatedtable">Track Monetary Donation</a></li>
                <li class="nav-item"><a class="nav-link" href="viewReceiveMonetary">Received Monetary Donation</a></li>
                <li class="nav-item"><a class="nav-link" href="viewPostponedMonetary">Postponed Monetary Donation</a></li>
                <li class="nav-item"><a class="nav-link" href="tableindkind">Track In-kind Donation</a></li>
                <li class="nav-item"><a class="nav-link" href="viewReceiveInkind">Received Inkind Donation</a></li>
                <li class="nav-item"><a class="nav-link" href="viewPostponedInkind">Posponed Inkind Donation</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#Feedback" aria-expanded="false" aria-controls="form-elements">
              <i class="typcn typcn-messages menu-icon"></i>
              <span class="menu-title">Feedbacks</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="Feedback">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="eventfeedback">Event Feedbacks</a></li>
                <li class="nav-item"><a class="nav-link" href="announcefeedback">Announcement Feedbacks</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#elderneed" aria-expanded="false" aria-controls="form-elements">
              <i class="typcn typcn-folder-open menu-icon"></i>
              <span class="menu-title">Elder Needs</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="elderneed">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="viewelderneed">Elder Need</a></li>
                <li class="nav-item"><a class="nav-link" href="manageneed ">Update Elder Need</a></li>
                </ul>
            </div>
          </li>
          <?php if(session()->get('role') === 'MainAdmin'):?>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#user" aria-expanded="false" aria-controls="form-elements">
              <i class="typcn typcn-user-add-outline menu-icon"></i>
              <span class="menu-title">Users</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="user">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="viewAdminRegister">Add Admin Users</a></li>
                <li class="nav-item"><a class="nav-link" href="viewUsers">View Admin User</a></li>
                </ul>
            </div>
          </li>
          <?php endif;?>
                
      </nav>


