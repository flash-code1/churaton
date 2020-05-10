<?php $page = "contact"; $title = "Contact Us"; ?>
<?php
include("header.php");
?>

<!-- Hero Area Section Begin -->
<div class="hero-area set-bg other-page" data-setbg="img/pillow.jpg">
    </div>
    <!-- Hero Area Section End -->

    <!-- Search Filter Section Begin -->
    <?php include("check.php") ?>
    <!-- Search Filter Section End -->

      <!-- Contact Section Begin -->
      <section class="contact-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="contact-title">
                        <div class="section-title">
                            <span>Contact us</span>
                            <h2>Located in <br />FCT Abuja</h2>
                        </div>
                        <a href="#" class="primary-btn">Get Directions</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <form action="#" class="contact-form">
                        <div class="row">
                            <div class="col-lg-6">
                                <input type="text" placeholder="Your name" required>
                            </div>
                            <div class="col-lg-6">
                                <input type="email" placeholder="Your email" required>
                            </div>
                            <div class="col-lg-12">
                                <input type="text" class="subject" placeholder="Subject" required>
                                <textarea placeholder="Message"></textarea>
                                <button type="submit">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-4">
                    <div class="info-box">
                        <img src="img/contact-logo.png" alt="">
                        <!-- company logo -->
                        <ul>
                            <li>No. Something Somewhere, <br />Abuja, Nigeria</li>
                            <li>+(234)535-4592</li>
                            <li>info@churaton.com</li>
                            <li>Everyday: 06:00 -22:00</li>
                        </ul>
                        <div class="social-links">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-linkedin"></i></a>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-youtube-play"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->

     <!-- Map Section Begin -->
     <div class="map">
        <iframe
            src="https://maps.google.com/maps?q=abuja&t=&z=13&ie=UTF8&iwloc=&output=embed"
            height="910" style="border:0;" allowfullscreen=""></iframe>
    </div>
    <!-- Map Section End -->

    <!-- End for Count -->
<?php
include("footer.php");
?>