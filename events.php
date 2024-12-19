<?php
require 'admin/pages/connection.php';

// $query = "SELECT * FROM events where status = 1 ORDER BY date_published DESC LIMIT 6";
// $result = mysqli_query($conn, $query);

// Fetch upcoming events
$now = date('Y-m-d H:i:s');
$upcoming_query = "SELECT * FROM events WHERE CONCAT(date_of_event_organize, ' ', events_time_duration) > '$now' AND status = 1 ORDER BY date_of_event_organize ASC LIMIT 6";
$upcoming_events = mysqli_query($conn, $upcoming_query);

// Fetch finished events
$finished_query = "SELECT * FROM events WHERE CONCAT(date_of_event_organize, ' ', events_time_duration) <= '$now' AND status = 1 ORDER BY date_of_event_organize DESC LIMIT 6";
$finished_events = mysqli_query($conn, $finished_query);

// $query1 = "SELECT * FROM posts ORDER BY date_published DESC LIMIT 3";
// $result1 = mysqli_query($conn, $query1);
?>

<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from html.commonsupport.xyz/2019/loveus/events.php by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 11 Aug 2024 10:18:19 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->

<head>
  <meta charset="utf-8">
  <title>Event</title>

  <style>
    .inner-box {
      position: relative;
    }

    .overlay {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.6);
      /* Black color with 60% opacity */
      z-index: 1;
      color: white;
      font-size: 20px;
      display: flex;
      justify-content: center;
      align-items: center;
    }
  </style>

  <!-- Stylesheets -->
  <link href="css/bootstrap.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <!-- Responsive File -->
  <link href="css/responsive.css" rel="stylesheet">
  <!-- Color File -->
  <link href="css/color.css" rel="stylesheet">

  <link rel="shortcut icon" href="images/iwsf-img/heart_iwsf_-_Copy__2_-removebg-preview (1).png" type="image/x-icon">
  <link rel="icon" href="images/iwsf-img/heart_iwsf_-_Copy__2_-removebg-preview (1).png" type="image/x-icon">

  <!-- Responsive -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
  <!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->
  <!--[if lt IE 9]><script src="js/respond.js"></script><![endif]-->
</head>

<body>

  <div class="page-wrapper">
    <!-- Preloader -->
    <div class="preloader">
      <div class="icon"></div>
    </div>

    <!-- Main Header -->
    <header class="main-header">
      <!-- Header Top -->
      <div class="header-top">
        <div class="auto-container">
          <div class="inner clearfix">
            <div class="top-left">
              <ul class="social-links clearfix">
                <li class="social-title">Follow Us:</li>
                <li>
                  <a href="#"><span class="fab fa-facebook-f"></span></a>
                </li>
                <li>
                  <a href="#"><span class="fab fa-instagram"></span></a>
                </li>
                <li>
                  <a href="#"><span class="fab fa-twitter"></span></a>
                </li>
              </ul>
            </div>

            <div class="top-right">
              <ul class="info clearfix">
                <li class="search-btn">
                  <button type="button" class="theme-btn search-toggler">
                    <span class="fa fa-search"></span>
                  </button>
                </li>
                <li>
                  <a href="tel:+918085722138"><span class="icon fa fa-phone-alt"></span> Call:
                    &nbsp;+91 8085722138</a>
                </li>
                <li>
                  <a href="mailto:neerajsankat143@gmail.com"><span class="icon fa fa-envelope"></span> Email:
                    &nbsp;neerajsankat143@gmail.com</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>

      <!-- Header Upper -->
      <div class="header-upper">
        <div class="auto-container">
          <div class="inner-container clearfix">
            <!--Logo-->
            <div class="logo-box">
              <a href="index.php">
                <div class="logo">
                  <img src="images/iwsf-img/heart_iwsf_-_Copy__2_-removebg-preview-removebg-preview.png" alt="Logo">
                  <div style="position: relative; color: white; font-weight: 600;">Indore Social <br> Welfare Foundation</div>
                </div>
              </a>
              <!-- <div class="logo">
                  <a href="index.php"
                    >
                    <img src="images/iwsf-img/Indore Social Welfare Foundation (2).png" alt="Logo"
                  /> 
                </a>
                </div> -->
            </div>

            <!--Nav Box-->
            <div class="nav-outer clearfix">
              <!--Mobile Navigation Toggler-->
              <div class="mobile-nav-toggler">
                <span class="icon flaticon-menu-1"></span>
              </div>

              <!-- Main Menu -->
              <nav class="main-menu navbar-expand-md navbar-light">
                <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                  <ul class="navigation clearfix">
                    <li class=""><a href="index.php">Home</a>
                    </li>
                    <li class="dropdown"><a href="about.php">About</a>
                      <ul>
                        <li><a href="about.php">About Us</a></li>
                        <li><a href="services.php">Our Services</a></li>
                        <li><a href="volunteers.php">Our Volunteers</a></li>
                      </ul>
                    </li>
                    <li class=""><a href="causes.php">Causes</a>
                    </li>
                    <li class="dropdown current"><a href="#">Pages</a>
                      <ul>
                        <li><a href="events.php">Events</a></li>
                        <li><a href="portfolio.php">Portfolio</a></li>
                        <li><a href="donate.php">Make Donation</a></li>
                      </ul>
                    </li>
                    <li class=""><a href="blog.php">Blog</a>
                    </li>
                    <li class=""><a href="contact.php">Contact</a>
                    </li>
                  </ul>
                </div>
              </nav>
              <!-- Main Menu End-->

              <div class="link-box clearfix">
                <div class="donate-link">
                  <a href="donate.php" class="theme-btn btn-style-one"><span class="btn-title">Donate Now</span></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--End Header Upper-->

      <!-- Sticky Header  -->
      <div class="sticky-header">
        <div class="auto-container clearfix">
          <!--Logo-->
          <div class="logo pull-left" style="display: flex;">
            <div><a href="index.php" title=""><img src="images/iwsf-img/heart_iwsf_-_Copy__2_-removebg-preview.png" width="80%" alt="" title=""></a></div>
            <div style="display: flex; flex-direction: column; gap: 0; font-size: medium; font-weight: 600;">
              <div>Indore Social</div>
              <div>Welfare Foundation</div>
            </div>
          </div>
          <!--Right Col-->
          <div class="pull-right">
            <!-- Main Menu -->
            <nav class="main-menu clearfix">
              <!--Keep This Empty / Menu will come through Javascript-->
            </nav>
            <!-- Main Menu End-->
          </div>
        </div>
      </div>
      <!-- End Sticky Menu -->

      <!-- Mobile Menu  -->
      <div class="mobile-menu">
        <div class="menu-backdrop"></div>
        <div class="close-btn">
          <span class="icon flaticon-cancel"></span>
        </div>

        <nav class="menu-box">
          <a href="index.php">
            <div class="nav-logo">
              <img src="images/iwsf-img/heart_iwsf_-_Copy__2_-removebg-preview.png" alt="Logo">
              <div style="position: relative; color: white; font-weight: 600;">Indore Social <br> Welfare Foundation</div>
            </div>
          </a>
          <div class="menu-outer">
            <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
          </div>
          <!--Social Links-->
          <div class="social-links">
            <ul class="clearfix">
              <li>
                <a href="#"><span class="fab fa-twitter"></span></a>
              </li>
              <li>
                <a href="#"><span class="fab fa-facebook-square"></span></a>
              </li>
              <li>
                <a href="#"><span class="fab fa-pinterest-p"></span></a>
              </li>
              <li>
                <a href="#"><span class="fab fa-instagram"></span></a>
              </li>
              <li>
                <a href="#"><span class="fab fa-youtube"></span></a>
              </li>
            </ul>
          </div>
        </nav>
      </div>
      <!-- End Mobile Menu -->
    </header>
    <!-- End Main Header -->

    <!--Search Popup-->
    <div id="search-popup" class="search-popup">
      <div class="close-search theme-btn">
        <span class="flaticon-cancel"></span>
      </div>
      <div class="popup-inner">
        <div class="overlay-layer"></div>
        <div class="search-form">
          <form
            method="post"
            action="http://html.commonsupport.xyz/2019/loveus/index.php">
            <div class="form-group">
              <fieldset>
                <input
                  type="search"
                  class="form-control"
                  name="search-input"
                  value=""
                  placeholder="Search Here"
                  required />
                <input type="submit" value="Search Now!" class="theme-btn" />
              </fieldset>
            </div>
          </form>

          <br />
          <h3>Recent Search Keywords</h3>
          <ul class="recent-searches">
            <li><a href="#">Blood Donation</a></li>
            <li><a href="#">Education</a></li>
            <li><a href="#">Environment</a></li>
            <li><a href="#">Traffic Mitra</a></li>
            <li><a href="#">Awareness</a></li>
            <li><a href="#">Sports</a></li>
          </ul>
        </div>
      </div>
    </div>


    <!-- Page Banner Section -->
    <section class="page-banner">
      <div class="image-layer lazy-image" data-bg="url('images/background/Group 5.jpg')"></div>
      <div class="bottom-rotten-curve"></div>

      <div class="auto-container">
        <h1>Our Events</h1>
        <ul class="bread-crumb clearfix">
          <li><a href="index.php">Home</a></li>
          <li class="active">Our Events</li>
        </ul>
      </div>

    </section>
    <!--End Banner Section -->

    <!--Events Section-->
    <section class="events-section">
      <div class="auto-container">

        <div class="row clearfix">

          <?php while ($event = mysqli_fetch_assoc($upcoming_events)) : ?>

            <!--Event Block-->
            <div class="event-block-three col-lg-4 col-md-6 col-sm-12">
              <div class="inner-box wow fadeInUp" style="height: 600px; display: flex; flex-direction: column; justify-content: space-between;" data-wow-delay="0ms">
                <div class="image-box">
                  <figure class="image"><a href="event-single.php?id=<?= $event['id'] ?>"><img class="lazy-image" src="admin/pages/events/<?= $event['img_path'] ?>" alt="events"></a></figure>
                  <!-- <div class="date">25 <span class="month">Aug</span></div> -->
                </div>
                <div style="padding: 0 35px 0;">
                <h3><a href="event-single.php?id=<?= $event['id'] ?>"><?= $event['title'] ?></a></h3>
                  <ul class="info clearfix">
                    <li>
                      <div class="date">Date of Event : <?= date("d", strtotime($event['date_published'])) ?><span class="month"><?= date(" M", strtotime($event['date_of_event_organize'])) ?></span class="month"><?= date(" Y", strtotime($event['date_of_event_organize'])) ?><span></span></div>
                    </li>
                    <li><span class="icon far fa-clock"></span> <?= $event['events_time_duration'] ?></li>
                    <li><span class="icon fa fa-map-marker-alt"></span> <?= $event['location'] ?></li>
                  </ul>
                </div>
                <div style="padding: 0 35px 30px;">
                  <div class="link-box"><a href="event-single.php?id=<?= $event['id'] ?>" class="theme-btn btn-style-two"><span class="btn-title">Read More</span></a></div>
                </div>
              </div>
            </div>

          <?php endwhile; ?>




          <?php while ($event = mysqli_fetch_assoc($finished_events)) : ?>

            <!--Event Block-->
            <div class="event-block-three col-lg-4 col-md-6 col-sm-12">
              <div class="inner-box wow fadeInUp" style="height: 600px; display: flex; flex-direction: column; justify-content: space-between;" data-wow-delay="0ms">
                <div class="image-box">
                  <figure class="image"><a href="event-single.php?id=<?= $event['id'] ?>"><img class="lazy-image" src="admin/pages/events/<?= $event['img_path'] ?>" alt="events"></a></figure>
                  <!-- <div class="date">25 <span class="month">Aug</span></div> -->
                </div>
                <div style="padding: 0 35px 0;">
                <h3><a href="event-single.php?id=<?= $event['id'] ?>"><?= $event['title'] ?></a></h3>
                  <ul class="info clearfix">
                    <li>
                      <div class="date">Date of Event : <?= date("d", strtotime($event['date_published'])) ?><span class="month"><?= date(" M", strtotime($event['date_of_event_organize'])) ?></span class="month"><?= date(" Y", strtotime($event['date_of_event_organize'])) ?><span></span></div>
                    </li>
                    <li><span class="icon far fa-clock"></span> <?= $event['events_time_duration'] ?></li>
                    <li><span class="icon fa fa-map-marker-alt"></span> <?= $event['location'] ?></li>
                  </ul>
                </div>
                <div style="padding: 0 35px 30px;">
                  <div class="link-box"><a href="event-single.php?id=<?= $event['id'] ?>" class="theme-btn btn-style-two"><span class="btn-title">Read More</span></a></div>
                </div>
                <div class="overlay">This Event Finished</div>
              </div>
            </div>

          <?php endwhile; ?>





        </div>

      </div>
    </section>



    <!-- Call To Action Section -->
    <section class="call-to-action-two">
      <div class="auto-container">
        <div class="inner clearfix">
          <div class="title-box">
            <h2>Become A Volunteer</h2>
          </div>
          <div class="link-box"><a href="contact.php" class="theme-btn btn-style-five"><span class="btn-title">Get Involved</span></a></div>
        </div>
      </div>
    </section>
    <!--End Gallery Section -->


    <!-- Main Footer -->
    <?php
    include("footer.php");
    ?>

  </div>
  <!--End pagewrapper-->

  <!--Scroll to top-->
  <div class="scroll-to-top scroll-to-target" data-target="html"><span class="flaticon-up-arrow"></span></div>

  <script src="js/jquery.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/jquery.fancybox.js"></script>
  <script src="js/owl.js"></script>
  <script src="js/appear.js"></script>
  <script src="js/wow.js"></script>
  <script src="js/lazyload.js"></script>
  <script src="js/scrollbar.js"></script>
  <script src="js/script.js"></script>

</body>

<!-- Mirrored from html.commonsupport.xyz/2019/loveus/events.php by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 11 Aug 2024 10:18:19 GMT -->

</html>