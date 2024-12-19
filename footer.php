<?php
require 'admin/pages/connection.php';

$query = "SELECT * FROM posts where status = 1 ORDER BY date_published DESC LIMIT 2";
$result = mysqli_query($conn, $query);

$conn->close();

?>


<footer class="main-footer">
        <div class="auto-container">
          <!--Widgets Section-->
          <div class="widgets-section">
            <div class="row clearfix">
              <!--Column-->
              <div class="column col-lg-3 col-md-6 col-sm-12">
                <div class="footer-widget logo-widget">
                  <div class="widget-content">
                    <div class="footer-logo">
                      <a href="index.php"
                        ><img src="images/iwsf-img/heart_iwsf_-_Copy__2_-removebg-preview-removebg-preview.png" alt="Logo" ><div style="position: relative; color: white; font-weight: 600;">Indore Social <br> Welfare Foundation</div></a>
                    </div>
                    <div class="text">
                        Indore Social Welfare Foundation (ISWF) actively promotes health, education, environmental sustainability, road safety, community awareness, and sports to foster a better society for all.
                    </div>
                    <ul class="social-links clearfix">
                      <li>
                        <a href="#"><span class="fab fa-facebook-f"></span></a>
                      </li>
                      <li>
                        <a href="#"><span class="" style="font-weight: 900;">X</span></a>
                      </li>
                      <li>
                        <a href="#"><span class="fab fa-youtube"></span></a>
                      </li>
                      <li>
                        <a href="https://www.instagram.com/indoresocial_welfarefoundation?igsh=MTI5ZWFleHp3MzUyNA=="><span class="fab fa-instagram"></span></a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>

              <!--Column-->
              <div class="column col-lg-3 col-md-6 col-sm-12">
                <div class="footer-widget links-widget">
                  <div class="widget-content">
                    <h3>Services</h3>
                    <ul>
                      <li><a href="services.php">Blood Donation</a></li>
                      <li><a href="services.php">Education</a></li>
                      <li><a href="services.php">Environment</a></li>
                      <li><a href="services.php">Traffic Mitra</a></li>
                      <li><a href="services.php">Awareness</a></li>
                      <li><a href="services.php">Sports</a></li>
                    </ul>
                  </div>
                </div>
              </div>

              <!--Column-->
              <div class="column col-lg-3 col-md-6 col-sm-12">
                <div class="footer-widget info-widget">
                  <div class="widget-content">
                    <h3>Contacts</h3>
                    <ul class="contact-info">
                      <li>63, Mangal Nagar, Rajiv Gandhi Circle, Indore
                      </li>
                      <li>
                        <a href="tel:+918085722138">+91 8085722138</a>
                      </li>
                      <li>
                        <a href="mailto:neerajsankat143@gmail.com"
                          >neerajsankat143@gmail.com
                          </a
                        >
                      </li>
                    </ul>
                  </div>
                </div>
              </div>

              <!--Column-->
              <div class="column col-lg-3 col-md-6 col-sm-12">
                <div class="footer-widget news-widget">
                  <div class="widget-content">
                    <h3>Top News</h3>
                    <!--News Post-->

                    <?php while ($post = mysqli_fetch_assoc($result)) : ?>

                    <div class="news-post">
                      <div class="post-thumb">
                      <a href="blog-single.php?id=<?= $post['id'] ?>"><img class="lazy-image" src="admin/pages/blogs/<?= $post['img_path'] ?>" alt="don"></a>
                      </div>
                      <h5><a href="blog-single.php?id=<?= $post['id'] ?>"><?= $post['title'] ?></a></h5>
                      <div class="date"><?= date("d M, Y", strtotime($post['date_published'])) ?></div>
                    </div>

                    <?php endwhile; ?>

                  </div>
                </div>
              </div>
            </div>

            <!-- <div class="nav-box clearfix">
              <div class="inner clearfix">
                <ul class="footer-nav clearfix">
                  <li><a href="index.php">Home</a></li>
                  <li><a href="about.php">About</a></li>
                  <li><a href="causes.php">Causes</a></li>
                  <li><a href="events.php">Events</a></li>
                  <li><a href="blog.php">Blog</a></li>
                  <li><a href="contact.php">Contact</a></li>
                </ul>

                <div class="donate-link">
                  <a href="donate.php" class="theme-btn btn-style-one"
                    ><span class="btn-title">Donate Now</span></a
                  >
                </div>
              </div>
            </div> -->
          </div>
        </div>

        <!-- Footer Bottom -->
        <div class="footer-bottom">
          <div class="auto-container">
            <!--Scroll to top-->
            <div class="clearfix">
              <!-- <div class="copyright"><a href="https://sarovi.tech/">SAROVI</a> TECH &copy; 2024 All Right Reserved</div> -->
               <div class="copyright">© Copyright | By Indore Social Welfare Foundation</div>
              <ul class="bottom-links">
                <li><a href="#">Terms of Service</a></li>
                <li><a href="#">Privacy Policy</a></li>
              </ul>
            </div>
          </div>
        </div>
    </footer>