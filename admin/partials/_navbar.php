<?php

require '../connection.php';

// Assuming you have a valid database connection in $conn
$sql = "SELECT username FROM admin_users WHERE id = ?";
if ($stmt = $conn->prepare($sql)) {
  $stmt->bind_param("i", $_SESSION['admin_id']);
  $stmt->execute();
  $stmt->bind_result($username);
  $stmt->fetch();
  // echo $username;
  $stmt->close();
}

?>

<nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">

  <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
    <div class="brand-logo"><img style="width: 45px;" src="../../../images/iwsf-img/heart_iwsf-removebg-preview.png"></div>
    <div class=" brand-logo" style="padding-left: 4px; display: flex; flex-direction: column; gap: 0; align-items: start; font-size: 15px;">
      <div>Indore Social</div>
      <div>Welfare Foundation</div>
    </div>
  </div>

  <div class="navbar-menu-wrapper d-flex align-items-stretch">
    <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize" style="font-size: x-large;">
      <span class="mdi mdi-menu"></span>
    </button>
    <div class="search-field d-none d-xl-block">
      <form id="searchForm" class="d-flex align-items-center h-100" action="#">
        <div class="input-group">
          <div class="input-group-prepend bg-transparent">
            <i class="input-group-text border-0 mdi mdi-magnify"></i>
          </div>
          <input type="text" id="search" class="form-control bg-transparent border-0" placeholder="Search..." autocomplete="off">
        </div>
      </form>
      <div id="search-results" class="list-group"></div>
    </div>
    <ul class="navbar-nav navbar-nav-right">
      <li class="nav-item nav-profile dropdown">
        <a class="nav-link" id="profileDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
          <!-- <div class="nav-profile-img">
                <img src="../../assets/images/faces/face28.png" alt="image">
              </div> -->
          <div class="nav-profile-text">
            <!-- <p class="mb-1 text-black">Admin Username : <?php echo $username; ?></p> -->
            <p class="mb-1 text-black">Admin</p>
          </div>
        </a>
      </li>
    </ul>
    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
      <span class="mdi mdi-menu"></span>
    </button>
  </div>
</nav>