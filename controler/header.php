
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
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap');
    * {
      font-family: 'Kanit', sans-serif !important;
    }
    body::-webkit-scrollbar {
      width: 0px !important;
    }
    th,td {
      border: 2px solid #0101 !important;
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
    <div class="navbar-menu fadeIn animated faster" id="navbar-menu" style="background-color:#17191e !important;">
      <div class="navbar-end">
        <div class="navbar-item has-dropdown has-dropdown-with-icons has-divider is-hoverable">
        </div>
        <div class="navbar-item has-dropdown has-dropdown-with-icons has-divider has-user-avatar is-hoverable">
          <a class="navbar-link is-arrowless">
            <div class="is-user-avatar">
              <img src="../assets/profile/<?php echo $_SESSION["profile"]; ?>" alt="Profile">
            </div>
            <div class="is-user-name"><h5 style="color:#fff;"><?php echo $_SESSION["fullname"]; ?></h5></div>
            <span class="icon"><i class="mdi mdi-chevron-down"></i></span>
          </a>
          <div class="navbar-dropdown">
            <a href="profile.php" class="navbar-item">
              <span class="icon"><i class="mdi mdi-account"></i></span>
              <span>โปรไฟล์</span>
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


  <aside class="aside is-placed-left is-expanded">
    <div class="aside-tools">
      <div class="aside-tools-label">
        <span><b>สหกิจศึกษา</b></span>
      </div>
    </div>
    <div class="menu is-menu-main">
      <ul class="menu-list">
        <li>
          <a href="index.php" class="router-link-active has-icon">
            <span class="icon"><i class="mdi mdi-desktop-mac"></i></span>
            <span class="menu-item-label">Home</span>
          </a>
        </li>
      </ul>
      <ul class="menu-list">
        <li>
          <a href="profile.php" class="has-icon">
            <span class="icon"><i class="mdi mdi-account-circle"></i></span>
            <span class="menu-item-label">โปรไฟล์</span>
          </a>
        </li>
        <li>
          <a href="logout.php" class="has-icon is-active">
            <span class="icon"><i class="mdi mdi-logout"></i></span>
            <span class="menu-item-label">ออกจากระบบ</span>
          </a>
        </li>
      </ul>
    </div>
  </aside>