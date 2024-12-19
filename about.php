<?php
require 'admin/pages/connection.php';

$query = "SELECT * FROM causes where status = 1 ORDER BY date_published DESC LIMIT 3";
$result = mysqli_query($conn, $query);

$query4 = "SELECT * FROM volunteers LIMIT 6";
$result4 = mysqli_query($conn, $query4);

?>

<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from html.commonsupport.xyz/2019/loveus/about.php by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 11 Aug 2024 10:18:18 GMT -->
<!-- Added by HTTrack -->
<meta
  http-equiv="content-type"
  content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->

<head>
  <meta charset="utf-8" />
  <title>About-Us</title>
  <!-- Stylesheets -->
  <link href="css/bootstrap.css" rel="stylesheet" />
  <link href="css/style.css" rel="stylesheet" />
  <!-- Responsive File -->
  <link href="css/responsive.css" rel="stylesheet" />
  <!-- Color File -->
  <link href="css/color.css" rel="stylesheet" />

  <link rel="shortcut icon" href="images/iwsf-img/heart_iwsf_-_Copy__2_-removebg-preview (1).png" type="image/x-icon">
  <link rel="icon" href="images/iwsf-img/heart_iwsf_-_Copy__2_-removebg-preview (1).png" type="image/x-icon">

  <!-- Responsive -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta
    name="viewport"
    content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
  <!--[if lt IE 9
      ]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script
    ><![endif]-->
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
                    <li class="current dropdown"><a href="about.php">About</a>
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
      <div
        class="image-layer lazy-image"
        data-bg="url('images/background/Group 1.jpg')"></div>
      <div class="bottom-rotten-curve alternate"></div>

      <div class="auto-container">
        <h1>About Us</h1>
        <ul class="bread-crumb clearfix">
          <li><a href="index.php">Home</a></li>
          <li class="active">About Us</li>
        </ul>
      </div>
    </section>
    <!--End Banner Section -->

    <!--About Section-->
    <section class="about-section style-two alternate">
      <div class="circle-one"></div>
      <div class="circle-two"></div>
      <div class="auto-container">
                <div class="sec-title centered">
                    <div class="sub-title" style="display: flex; width: 100%; padding-bottom: 20px; justify-content: center; font-size: 50px;">About Us</div>
                </div>
                <div class="row clearfix">
                    <!--Left Column-->
                    <div class="left-column col-lg-6 col-md-12 col-sm-12">
                        <div class="inner" style="display: flex;">
                            <div class="sec-title">
                                <!-- <div class="sub-title" >About Us</div> -->
                                <h3>Join Us in Making a Difference!</h3>
                                <div class="text">
                                    At Indore Social Welfare Foundation, we are committed to
                                    transforming lives and building stronger communities
                                    through our dedicated efforts in education, healthcare, environmental sustainability, and more. Be a part of our journey to create a brighter, more inclusive future for all.</div>
                                <div class="link-box clearfix"><a href="causes.php" class="theme-btn btn-style-one"><span class="btn-title">Read More</span></a></div>
                            </div>
                        </div>
                    </div>
                    <!--Right Column-->
                    <div class="right-column col-lg-6 col-md-12 col-sm-12">
                        <div class="inner">
                            <div class="images clearfix">
                                <figure class="image wow fadeInUp" data-wow-delay="0ms"><img class="lazy-image" src="images/resource/1 (1).jpg" alt="img"></figure>
                                <figure class="image wow fadeInDown" data-wow-delay="0ms"><img class="lazy-image" src="images/resource/1 (2).jpg" alt="img"></figure>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>

    <!-- Funfacts Section -->
    <section class="facts-section">
      <div class="bottom-rotten-curve"></div>

      <div class="auto-container">
        <div class="inner-container">
          <!-- Fact Counter -->
          <div class="fact-counter">
            <div class="row clearfix">
              <!--Column-->
              <div class="column counter-column col-lg-3 col-md-6 col-sm-12">
                <div
                  class="inner wow fadeInLeft"
                  data-wow-delay="0ms"
                  data-wow-duration="1500ms">
                  <div class="content">
                    <div class="count-outer count-box">
                      <span
                        class="count-text"
                        data-speed="3000"
                        data-stop="90">0</span>
                    </div>
                    <div class="counter-title">Impactful Projects</div>
                  </div>
                </div>
              </div>

              <!--Column-->
              <div class="column counter-column col-lg-3 col-md-6 col-sm-12">
                <div
                  class="inner wow fadeInLeft"
                  data-wow-delay="300ms"
                  data-wow-duration="1500ms">
                  <div class="content">
                    <div class="count-outer count-box alternate">
                      <span
                        class="count-text"
                        data-speed="3000"
                        data-stop="216">0</span>
                    </div>
                    <div class="counter-title">Community Outreach</div>
                  </div>
                </div>
              </div>

              <!--Column-->
              <div class="column counter-column col-lg-3 col-md-6 col-sm-12">
                <div
                  class="inner wow fadeInLeft"
                  data-wow-delay="600ms"
                  data-wow-duration="1500ms">
                  <div class="content">
                    <div class="count-outer count-box">
                      <span
                        class="count-text"
                        data-speed="2000"
                        data-stop="35">0</span>
                    </div>
                    <div class="counter-title">Volunteer Engagement</div>
                  </div>
                </div>
              </div>

              <!--Column-->
              <div class="column counter-column col-lg-3 col-md-6 col-sm-12">
                <div
                  class="inner wow fadeInLeft"
                  data-wow-delay="900ms"
                  data-wow-duration="1500ms">
                  <div class="content">
                    <div class="count-outer count-box">
                      <span
                        class="count-text"
                        data-speed="2000"
                        data-stop="15">0</span>
                    </div>
                    <div class="counter-title">Partnerships & Collaborations</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End Funfacts Section -->

    <!--Causes Section-->
    <!-- <section class="causes-section">
      <div class="auto-container">

        <div class="sec-title centered">
          <div class="sub-title">Our Causes</div>
          <h2>Popular Causes</h2>
        </div>

        <div class="row clearfix">

          <?php while ($post = mysqli_fetch_assoc($result)) : ?>

            <div class="cause-block col-lg-4 col-md-6 col-sm-12">
              <div class="inner-box wow fadeInUp" style="height: 500px; display: flex; flex-direction: column; justify-content: space-between;" data-wow-delay="0ms">
                <div class="image-box">
                  <figure class="image"><a href="cause-single.php?id=<?= $post['id'] ?>"><img style="height: 220px;" loading="lazy" class="lazy-image" src="admin/pages/causes/<?= $post['img_path'] ?>" alt="don"></a></figure>
                </div>
                <div style="padding: 0 35px 0;">
                  <h3><a href="cause-single.php?id=<?= $post['id'] ?>"> <?= $post['title'] ?></a></h3>
                  <div class="text"><?= $post['description'] ?></div>
                </div>
                <div style="padding: 0 35px 30px;">
                  <div class="link-box"><a href="cause-single.php?id=<?= $post['id'] ?>" class="theme-btn btn-style-two"><span class="btn-title">Read More</span></a></div>
                </div>
              </div>
            </div>

          <?php endwhile; ?>

        </div>

      </div>
    </section> -->

    <!--What We Do Section / Style Two-->
    <section class="what-we-do style-two">
      <div class="image-layer lazy-image"></div>
      <div class="top-rotten-curve"></div>
      <div class="bottom-rotten-curve"></div>

      <div class="auto-container">
        <div class="row clearfix">
          <div class="title-column col-xl-6 col-lg-12 col-sm-12">
            <div class="inner">
              <div class="sec-title">
                <div class="sub-title">What We Do?</div>
                <h2>We are Worldwide Non-Profit & NGO Ogranization</h2>
                <!-- <div class="text">Cupidatat non proident sunt</div> -->
              </div>
            </div>
          </div>

          <div class="content-column col-xl-6 col-lg-12 col-sm-12">
            <div class="row clearfix">

              <!--Service Block-->
              <div class="service-block col-xl-6 col-lg-6 col-md-6 col-sm-12">
                <div class="inner-box">
                  <!-- <div class="icon-box"><span class="flaticon-water-bottle"></span></div> -->
                  <div class="icon-box"><span><img src="images/icons/image-1-col.png" width="50px" alt="img"></span></div>
                  <h3>Blood Donation</h3>
                  <div class="text">Indore Social Welfare Foundation organizes regular blood donation drives to support local hospitals and save lives.</div>
                </div>
              </div>

              <!--Service Block-->
              <div class="service-block col-xl-6 col-lg-6 col-md-6 col-sm-12">
                <div class="inner-box">
                  <!-- <div class="icon-box"><span class="flaticon-fruit"></span></div> -->
                  <div class="icon-box"><span><img src="images/icons/image-2-col.png" width="50px" alt="img"></span></div>
                  <h3>Education</h3>
                  <div class="text">Empowering underprivileged children through quality education and resources for a brighter future.</div>
                </div>
              </div>

              <!--Service Block-->
              <div class="service-block col-xl-6 col-lg-6 col-md-6 col-sm-12">
                <div class="inner-box">
                  <!-- <div class="icon-box"><span class="flaticon-medicine"></span></div> -->
                  <div class="icon-box"><span><img src="images/icons/image-3-col.png" width="50px" alt="img"></span></div>
                  <h3>Environment</h3>
                  <div class="text">We strive to promote environmental conservation through community-driven initiatives and awareness campaigns.</div>
                </div>
              </div>

              <!--Service Block-->
              <div class="service-block col-xl-6 col-lg-6 col-md-6 col-sm-12">
                <div class="inner-box">
                  <!-- <div class="icon-box"><span class="flaticon-reading"></span></div> -->
                  <div class="icon-box"><span><img src="images/icons/image-4-col.png" width="50px" alt="img"></span></div>
                  <h3>Traffic Mitra</h3>
                  <div class="text">Traffic Mitra: Promoting road safety and community engagement for enhanced traffic management in Indore.</div>
                </div>
              </div>

            </div>
          </div>
        </div>

      </div>
    </section>

    <!--Team Section-->
    <section class="team-section">
      <div class="bottom-rotten-curve"></div>

      <div class="auto-container">

                <div class="title-box clearfix">
                    <div class="sec-title" style="text-align: center;">
                        <div class="sub-title">Meet Our Team</div>
                        <h3>Our NGO Team</h3>
                    </div>

                </div>

                <!--Team Carousel-->
                <div class="team-carousel love-carousel owl-theme owl-carousel" data-options='{"loop": true, "margin": 30, "autoheight":true, "lazyload":true, "nav": true, "dots": true, "autoplay": true, "autoplayTimeout": 5000, "smartSpeed": 500, "responsive":{ "0" :{ "items": "1" },"600" :{ "items": "1" }, "800" :{ "items" : "2" }, "1024":{ "items" : "3" }, "1366":{ "items" : "3" }}}'>

                <?php while ($post = mysqli_fetch_assoc($result4)) : ?>

                    <div class="slide-item">
                        <!--Team Block-->
                        <div class="team-block">
                            <div class="inner-box">
                                <figure class="image-box"><a href="#"><img class="lazy-image" src="admin/pages/volunteers/<?= $post['image'] ?>" alt="volunteer" style="height: 300px; width: 400px; "></a></figure>
                                <div class="lower-box">
                                    <div class="content">
                                        <h3><a href="#"><?= $post['name'] ?></a></h3>
                                        <div class="designation"><?= $post['designation'] ?></div>
                                        <!-- <div class="social-links">
                                    <ul class="clearfix">
                                        <li><a href="#"><span class="fab fa-facebook-f"></span></a></li>
                                        <li><a href="#"><span class="fab fa-twitter"></span></a></li>
                                        <li><a href="#"><span class="fab fa-linkedin-in"></span></a></li>
                                    </ul>
                                </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php endwhile; ?>

                </div><!--End Team Carousel-->

            </div>
    </section>

    <!-- Call To Action Section -->
    <section class="call-to-action-two">
      <div class="auto-container">
        <div class="inner clearfix">
          <div class="title-box wow fadeInLeft" data-wow-delay="0ms">
            <h2>Become A Volunteer</h2>
          </div>
          <div class="link-box wow fadeInRight" data-wow-delay="0ms">
            <a href="contact.php" class="theme-btn btn-style-five"><span class="btn-title">Get Involved</span></a>
          </div>
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
  <div class="scroll-to-top scroll-to-target" data-target="html">
    <span class="flaticon-up-arrow"></span>
  </div>

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

<!-- Mirrored from html.commonsupport.xyz/2019/loveus/about.php by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 11 Aug 2024 10:18:19 GMT -->

</html>