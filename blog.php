<?php
require 'admin/pages/connection.php';

$query = "SELECT * FROM posts where status = 1 ORDER BY date_published DESC LIMIT 8";
$result = mysqli_query($conn, $query);

$query1 = "SELECT * FROM posts where status = 1 ORDER BY date_published DESC LIMIT 3";
$result1 = mysqli_query($conn, $query1);
?>

<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
  <meta charset="utf-8">
  <title>Blog</title>
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
                    <li class="dropdown"><a href="#">Pages</a>
                      <ul>
                        <li><a href="events.php">Events</a></li>
                        <li><a href="portfolio.php">Portfolio</a></li>
                        <li><a href="donate.php">Make Donation</a></li>
                      </ul>
                    </li>
                    <li class="current"><a href="blog.php">Blog</a>
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
            method="post">
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
      <div class="image-layer lazy-image" data-bg="url('images/background/istockphoto-920418816-612x612.jpg')"></div>
      <div class="bottom-rotten-curve"></div>

      <div class="auto-container">
        <h1>Blog Page</h1>
        <ul class="bread-crumb clearfix">
          <li><a href="index.php">Home</a></li>
          <li class="active">Blog Page</li>
        </ul>
      </div>

    </section>
    <!--End Banner Section -->


    <!--Sidebar Page Container-->
    <div class="sidebar-page-container">
      <div class="auto-container">
        <div class="row clearfix">

          <!--Content Side / Blog Sidebar-->
          <div class="content-side col-lg-8 col-md-12 col-sm-12">
            <!--Blog Posts-->
            <div class="blog-posts">
              <div class="row clearfix">
                <!--News Block-->
                <?php while ($post = mysqli_fetch_assoc($result)) : ?>

                  <?php

                  $post_id = $post['id'];

                  $result2 = "SELECT * FROM comments WHERE posts_id = $post_id";
                  $result3 = mysqli_query($conn, $result2);

                  $row_cnt = mysqli_num_rows($result3);

                  ?>

                  <div class="news-block col-lg-6 col-md-6 col-sm-12">
                    <div class="inner-box" style="height: 600px; display: flex; flex-direction: column; justify-content: space-between;">
                      <div class="image-box">
                        <figure class="image"><a href="blog-single.php?id=<?= $post['id'] ?>"><img class="lazy-image" src="admin/pages/blogs/<?= $post['img_path'] ?>" alt="don"></a></figure>
                        <div class="lower-content" style="padding: 0;">
                        <div class="date"><?= date("d", strtotime($post['date_published'])) ?><span class="month"><?= date("M", strtotime($post['date_published'])) ?></span></div>
                        </div>
                      </div>
                      <div style="padding: 0 35px 0;">
                      <h3><a href="blog-single.php?id=<?= $post['id'] ?>"><?= $post['title'] ?></a></h3>
                      <div class="text"><?= substr($post['description'], 0, 50) ?>...</div>
                      </div>
                      <div style="padding: 0 35px 30px;">
                        <div class="post-meta">
                          <ul class="clearfix">
                            <li><span class="fa fa-calendar-alt"></span> <?= date("M d, Y - H:i", strtotime($post['date_published'])) ?></li>
                            <li><a href="blog-single.php?id=<?= $post['id'] ?>#comments_area"><span class="icon fa fa-comments"><span style="margin-left: 6px;"><?php echo $row_cnt; ?> Comment</span></span></a></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>

                <?php endwhile; ?>

              </div>
            </div>

          </div>

          <!--Sidebar Side-->
          <div class="sidebar-side col-lg-4 col-md-12 col-sm-12">
            <aside class="sidebar">

              <!-- Search -->
              <div class="sidebar-widget search-box">
                <h3 class="sidebar-title">Search</h3>
                <form action="search.php#blog-area" method="GET">
                  <div class="form-group">
                    <input type="search" name="search" placeholder="Search..." required>
                    <button type="submit" name="submit"><span class="icon flaticon-search-1"></span></button>
                  </div>
                </form>
              </div>

              <!-- Category Widget -->
              <div class="sidebar-widget categories">
                <h3 class="sidebar-title">Categories</h3>
                <?php
                $all_categories_query = "SELECT * FROM category_posts";
                $all_categories_result = mysqli_query($conn, $all_categories_query);

                ?>
                <div class="widget-content">
                  <?php while ($category = mysqli_fetch_assoc($all_categories_result)) : ?>
                    <ul>
                      <li><a href="category-posts.php?id=<?= $category['id'] ?>"><?= $category['name'] ?></a></li>
                    </ul>
                  <?php endwhile ?>
                </div>
              </div>

              <!-- Post Widget -->
              <div class="sidebar-widget popular-posts">
                <h3 class="sidebar-title">Latest Blogs</h3>
                <div class="widget-content">

                  <?php while ($post = mysqli_fetch_assoc($result1)) : ?>
                    <!--News Post-->
                    <div class="news-post">
                      <div class="post-thumb"><a href="blog-single.php?id=<?= $post['id'] ?>"><img class="lazy-image" src="admin/pages/blogs/<?= $post['img_path'] ?>" alt="img"></a></div>
                      <div class="date"><span class="fa fa-calendar-alt"></span> <?= date("M d, Y - H:i", strtotime($post['date_published'])) ?></div>
                      <h4><a href="blog-single.php?id=<?= $post['id'] ?>"><?= $post['title'] ?> </a></h4>
                    </div>
                  <?php endwhile; ?>

                </div>
              </div>

              <!-- Tags Widget -->
              <div class="sidebar-widget popular-tags">
                <h3 class="sidebar-title">Popular Tags</h3>
                <?php
                $all_categories_query = "SELECT * FROM category_posts ";
                $all_categories_result = mysqli_query($conn, $all_categories_query);

                ?>
                <div class="widget-content">
                  <ul class="clearfix">
                    <?php while ($category = mysqli_fetch_assoc($all_categories_result)) : ?>
                      <li><a href="category-posts.php?id=<?= $category['id'] ?>"><?= $category['name'] ?></a></li>
                    <?php endwhile ?>
                  </ul>

                </div>
              </div>

            </aside>
          </div>
        </div>
      </div>
    </div>
    <!-- End Sidebar Page Container -->



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

</html>