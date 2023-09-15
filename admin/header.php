
  <!-- Bulma is included -->
  <link rel="stylesheet" href="css/main.min.css">

  <!-- Fonts -->
  <link rel="dns-prefetch" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

  <!-- DataTable Bulma -->
  <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
  <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bulma.min.js"></script>
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.9.95/css/materialdesignicons.min.css">
  
  <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
  <script src="../assets/js/vfs_fonts.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" id="theme-styles">

  <style>
    @import url('https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap');
    * {
      font-family: 'Kanit', sans-serif;
    }
    body::-webkit-scrollbar {
      width: 0px !important;
    }
	span {
		color:#c2c7d0 !important;
	}
  .dt-buttons > button {
    border: none !important;
    padding: 0.7%;
    
    
  }
  .buttons-pdf {
    background-color: #dc3545;
    color: #fff !important;
  }
  .buttons-copy {
    background-color:#00d1b2;
    color: #fff !important !important;
  }
  .buttons-csv {
    background-color:#0088b8;
  }
  .buttons-excel {
    background-color: #00d12d !important;
  }
  .buttons-print {
    background-color: #aab800 !important;
  }
  .dataTables_paginate {
    float:right !important;
  }
  .dataTables_filter >label {
    float: right !important;
    margin-bottom: 2% !important;
    display: flex !important;
  }
  </style>

<nav id="navbar-main" class="navbar is-fixed-top">
    <div class="navbar-brand">
      <a class="navbar-item is-hidden-desktop jb-aside-mobile-toggle">
        <span class="icon"><i class="mdi mdi-forwardburger mdi-24px"></i></span>
      </a>
    </div>
    <div class="navbar-brand is-right">
      <a class="navbar-item is-hidden-desktop jb-navbar-menu-toggle" data-target="navbar-menu">
        <span class="icon"><i class="mdi mdi-dots-vertical"></i></span>
      </a>
    </div>
    <div class="navbar-menu customheader fadeIn animated faster" id="navbar-menu" style="background:#17191e;">
      <div class="navbar-end">
        <div class="navbar-item has-dropdown has-dropdown-with-icons has-divider is-hoverable">
        </div>
        <div class="navbar-item has-dropdown customheader has-dropdown-with-icons has-divider has-user-avatar is-hoverable">
          <a class="navbar-link is-arrowless customheader">
            <div class="is-user-avatar">
              <img src="../assets/profile/<?php echo $_SESSION["profile"]; ?>" alt="Profile">
            </div>
            <div class="is-user-name"><h6 style="color:#fff;background:#17191e;border-radius:10px !important;padding:5px !important;"><?php echo $_SESSION["fullname"]; ?></h6></div>
            <span class="icon"><i class="mdi mdi-chevron-down"></i></span>
          </a>
          <div class="navbar-dropdown">
            <a href="profile.php" class="navbar-item">
              <span class="icon"><i class="mdi mdi-account"></i></span>
              <h6>โปรไฟล์</h6>
            </a>
          </div>
        </div>
        <a title="Log out" onclick="window.location.href = 'logout.php';" class="navbar-item is-desktop-icon-only">
          <span class="icon"><i class="mdi mdi-logout"></i></span>
          <span>ออกจากระบบ</span>
        </a>
      </div>
    </div>
  </nav>


  <aside class="aside is-placed-left is-expanded" style="background-color:#282c33 !important;">
    <div class="aside-tools">
      <div class="aside-tools-label">
        <span><b>สหกิจศึกษา v.1</b></span>
      </div>
    </div>
    <div class="menu is-menu-main">
      <ul class="menu-list">
        <li>
          <a href="index.php" class="router-link-active has-icon  is-active">
            <span class="icon"><i class="mdi mdi-desktop-mac" style="color:#000;"></i></span>
            <span class="menu-item-label"  style="color:#fff !important;">Home</span>
          </a>
        </li>
      </ul>
      <ul class="menu-list">
        <li>
          <a href="tables.php" class="has-icon">
            <span class="icon has-update-mark"><i class="mdi mdi-table"></i></span>
            <span class="menu-item-label">ตาราง</span>
          </a>
        </li>
        <li>
          <a href="profile.php" class="has-icon">
            <span class="icon"><i class="mdi mdi-account-circle"></i></span>
            <span class="menu-item-label">โปรไฟล์</span>
          </a>
        </li>
		<li>
          <a class="has-icon has-dropdown-icon">
            <span class="icon"><i class="mdi mdi-view-list"></i></span>
            <span class="menu-item-label">จัดการ</span>
            <div class="dropdown-icon">
              <span class="icon"><i class="mdi mdi-plus"></i></span>
            </div>
          </a>
          <ul>
            <li>
              <a href="users.php">
                <span>บัญชีผู้ใช้งาน</span>
              </a>
            </li>
            <li>
              <a href="controlers.php">
                <span>ผู้ควบคุม</span>
              </a>
            </li>
          </ul>
        </li>
        <li>
          <a href="logout.php" class="has-icon">
            <span class="icon"><i class="mdi mdi-logout"></i></span>
            <span class="menu-item-label">ออกจากระบบ</span>
          </a>
        </li>
      </ul>
    </div>
  </aside>