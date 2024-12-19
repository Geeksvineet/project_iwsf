<?php
session_start();

require 'pages/connection.php';

// Check if the admin is logged in, otherwise redirect to login page
if (!isset($_SESSION['admin_id'])) {
  header("Location: login.php");
  exit();
}

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


<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Admin Panel</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icons.min.css">
  <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="assets/vendors/font-awesome/css/font-awesome.min.css" />
  <link rel="stylesheet" href="assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <!-- endinject -->
  <!-- Layout styles -->
  <link rel="stylesheet" href="assets/css/vertical-light-layout/style.css">
  <!-- End layout styles -->
  <!-- <link rel="shortcut icon" href="assets/images/favicon.png" /> -->
  <link rel="shortcut icon" href="../images/iwsf-img/heart_iwsf_-_Copy__2_-removebg-preview (1).png" type="image/x-icon">

  <!-- for dashboard -->
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.php -->
    <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-xl-flex d-none align-items-center justify-content-center">
        <div class="brand-logo"><img style="width: 45px;" src="../images/iwsf-img/heart_iwsf-removebg-preview.png"></div>
        <div class=" brand-logo" style="padding-left: 4px; display: flex; flex-direction: column; gap: 0; align-items: start; font-size: 15px;">
          <div>Indore Social</div>
          <div>Welfare Foundation</div>
        </div>
      </div>

      <div class="text-center navbar-brand-wrapper d-xl-none d-flex align-items-center justify-content-center" style="background-color: white; padding-left: 50px;">
        <div class="brand-logo"><img style="width: 35px;" src="../images/iwsf-img/heart_iwsf-removebg-preview.png"></div>
        <div class=" brand-logo" style="padding-left: 4px; display: flex; flex-direction: column; gap: 0; align-items: start; font-size: 15px;">
          <div>IWSF</div>
        </div>
      </div>

      <div class="navbar-menu-wrapper d-flex align-items-stretch">
        <button class="navbar-toggler navbar-toggler align-self-center" style="font-size: x-large;" type="button" data-toggle="minimize">
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

        <!-- <div class="container mt-2">
          <div class="row">
            <div class="col-md-12">
              <form id="searchForm" class="form-inline">
                <div class="input-group mb-3">
                  <div class="search-container">
                    <input type="text" id="search" placeholder="Search..." class="form-control" autocomplete="off">
                  </div>

                </div>
              </form>
            </div>
          </div>
          <div id="search-results" class="list-group"></div>
        </div> -->


        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link" id="profileDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
              <!-- <div class="nav-profile-img">
                <img src="assets/images/faces/face28.png" alt="image">
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
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.php -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="index.php">
              <span class="icon-bg"><i class="mdi mdi-cube menu-icon"></i></span>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#forms" aria-expanded="false" aria-controls="forms">
              <span class="icon-bg"><i class="mdi mdi-format-list-bulleted menu-icon"></i></span>
              <span class="menu-title">Blogs</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="forms">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/blogs/see_all_blogs.php">See all Blogs</a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/blogs/add_blog.php">Add Blog</a></li>
                <!-- <li class="nav-item"> <a class="nav-link" href="pages/blogs/update_blog.php">Update Blog</a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/blogs/delete_blog.php">Delete Blog</a></li> -->
                <li class="nav-item"> <a class="nav-link" href="pages/blogs/status_of_blogs.php">Status of Blogs</a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/blogs/blogs_category_control.php">Blogs Category Control</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
              <span class="icon-bg"><i class="mdi mdi-table-large menu-icon"></i></span>
              <span class="menu-title">Events</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="tables">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/events/see_all_events.php">See all Events</a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/events/add_event.php">Add Event</a></li>
                <!-- <li class="nav-item"> <a class="nav-link" href="pages/events/update_event.php">Update Event</a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/events/delete_event.php">Delete Event</a></li> -->
                <li class="nav-item"> <a class="nav-link" href="pages/events/status_of_events.php">Status of Event</a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/events/events_category_control.php">Events Category Control</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
              <span class="icon-bg"><i class="mdi mdi-lock menu-icon"></i></span>
              <span class="menu-title">Causes</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/causes/see_all_causes.php">See all Causes</a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/causes/add_cause.php">Add Cause</a></li>
                <!-- <li class="nav-item"> <a class="nav-link" href="pages/causes/update_cause.php">Update Cause</a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/causes/delete_cause.php">Delete Cause</a></li> -->
                <li class="nav-item"> <a class="nav-link" href="pages/causes/status_of_causes.php">Status of Cause</a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/causes/causes_category_control.php">Causes Category Control</a></li>

              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#volunteers" aria-expanded="false" aria-controls="auth">
              <span class="icon-bg"><i class="mdi mdi-account menu-icon"></i></span>
              <span class="menu-title">Volunteers</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="volunteers">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/volunteers/see_all_volunteers.php">See all Volunteers</a></li>

              </ul>
            </div>
          </li>



          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#contact" aria-expanded="false" aria-controls="auth">
              <span class="icon-bg"><i class="mdi mdi-account menu-icon"></i></span>
              <span class="menu-title">Contact Us</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="contact">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/contact/see_all_contact.php">See all Contact</a></li>

              </ul>
            </div>
          </li>



          <li class="nav-item sidebar-user-actions">
            <div class="sidebar-user-menu">
              <a href="logout.php" class="nav-link"><i class="mdi mdi-logout menu-icon"></i>
                <span class="menu-title">Log Out</span></a>
            </div>
          </li>
        </ul>
      </nav>
      <!-- partial -->

      <div class="main-panel">
        <div class="content-wrapper">
          <!-- <div class="d-xl-flex justify-content-between align-items-start">
            <h2 class="text-dark font-weight-bold mb-2"> Overview dashboard </h2>
            <div class="d-sm-flex justify-content-xl-between align-items-center mb-2">
              <div class="btn-group bg-white p-3" role="group" aria-label="Basic example">
                <button type="button" class="btn btn-link text-light py-0 border-right">7 Days</button>
                <button type="button" class="btn btn-link text-dark py-0 border-right">1 Month</button>
                <button type="button" class="btn btn-link text-light py-0">3 Month</button>
              </div>
              <div class="dropdown ms-0 ml-md-4 mt-2 mt-lg-0">
                <button class="btn bg-white dropdown-toggle p-3 d-flex align-items-center" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="mdi mdi-calendar me-1"></i>24 Mar 2019 - 24 Mar 2019 </button>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton1">
                  <h6 class="dropdown-header">Select</h6>
                  <a class="dropdown-item" href="#">24 Mar 2019 - 24 Mar 2019 </a>
                  <a class="dropdown-item" href="#">24 Apr 2019 - 24 May 2019 </a>
                  <a class="dropdown-item" href="#">24 Jun 2019 - 24 Jul 2019 </a>
                </div>
              </div>
            </div>
          </div> -->

          <div class="card">
            <div class="card-body">
              <?php
              include("dashboard.php");
              ?>
            </div>
          </div>


        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.php -->
        <footer class="footer">
          <div class="footer-inner-wraper">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">© Copyright | By Indore Social Welfare Foundation</span>
              <!-- <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="mdi mdi-heart text-danger"></i></span> -->
            </div>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>

  <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function() {
      // Trigger search as the user types
      $('#search').on('keyup', function() {
        var query = $(this).val();
        var category = 'blogs'; // Set your default category or make it dynamic
        if (query != '') {
          $.ajax({
            url: "search.php",
            method: "POST",
            data: {
              query: query,
              category: category
            },
            success: function(data) {
              $('#search-results').fadeIn();
              $('#search-results').html(data);
            }
          });
        } else {
          $('#search-results').fadeOut();
        }
      });

      // Hide results when the page is scrolled
      $(window).on('scroll', function() {
        $('#search-results').fadeOut();
      });

      // Hide results when clicking outside the search results
      $(document).on('click', function(e) {
        if (!$(e.target).closest('#search-results, #search').length) {
          $('#search-results').fadeOut();
        }
      });
    });
  </script> -->

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const searchInput = document.getElementById('search');
      const searchResults = document.getElementById('search-results');

      searchInput.addEventListener('input', function() {
        const query = this.value.trim();

        if (query.length > 0) {
          fetchSearchResults(query);
        } else {
          searchResults.innerHTML = '';
        }
      });

      window.addEventListener('scroll', function() {
        searchResults.innerHTML = '';
      });

      function fetchSearchResults(query) {
        fetch('search.php', {
            method: 'POST',
            headers: {
              'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: 'query=' + encodeURIComponent(query)
          })
          .then(response => response.text())
          .then(data => {
            searchResults.innerHTML = data;
          });
      }
    });
  </script>

  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="assets/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="assets/vendors/chart.js/chart.umd.js"></script>
  <script src="assets/vendors/jquery-circle-progress/js/circle-progress.min.js"></script>
  <script src="assets/js/jquery.cookie.js"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="assets/js/off-canvas.js"></script>
  <script src="assets/js/hoverable-collapse.js"></script>
  <script src="assets/js/misc.js"></script>
  <script src="assets/js/settings.js"></script>
  <script src="assets/js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page -->
  <script src="assets/js/dashboard.js"></script>
  <!-- End custom js for this page -->
</body>

</html>