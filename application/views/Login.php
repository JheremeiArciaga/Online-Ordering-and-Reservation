

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required Meta Tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Page Title -->
    <title> Aischi Grill House</title>

    <!-- Favicon Icon -->
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/img/logo.png">

    <!-- CSS Files -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/animate.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/meanmenu.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awsome-all.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/magnific-popup.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/slick.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery-ui.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
</head>

<body>
    <!-- Preloader Starts -->
    <div class="preloader" id="preloader">
        <div class="preloader-inner">
            <div class="spinner">
                <div class="bounce1"></div>
                <div class="bounce2"></div>
                <div class="bounce3"></div>
            </div>
        </div>
    </div>
    <!-- header -->
    <header>
        
        <!-- header-bottom -->
        <div class="header-bottom margin-top-20">
            <div class="container position-relative">
                <div class="row d-flex align-items-center">
                <div class="col-lg-2 col-md-2 col-sm-2 col-6 margin-bottom-20">
                        <div class="logo">
                            <a href="<?php echo base_url(); ?>"> <img src="<?php echo base_url(); ?>assets/img/logo.png" alt="logo"></a>
                        </div>
                    </div>

                    <div class="col-lg-5 d-none d-lg-block">
                        <nav id="mobile-menu">
                            <ul class="main-menu">
                                <li><a href="<?php echo base_url(); ?>">Home</a></li>
                                <li><a href="#">Menu <span><i class="fas fa-angle-down"></i></span></a>
                                    <ul class="submenu">
                                         <?php foreach($categoryMenu as $categoryRow) { ?>
                                            <li><a href="<?php echo base_url(); ?>home/menu/<?php echo $categoryRow->m_name; ?>"><?php echo $categoryRow->m_name; ?></a></li>
                                        <?php } ?>
                                    </ul>
                                </li>
                                <li><a href="<?php echo base_url(); ?>home/reservation">reservation</a></li>
                                <li><a href="<?php echo base_url(); ?>home/gallery">gallery</a></li>
                                <li><a href="<?php echo base_url(); ?>home/about">about</a></li>
                                <li><a href="<?php echo base_url(); ?>home/contact">contact</a></li>
                            </ul>
                        </nav>
                    </div>

                    <div class="col-lg-5 col-md-9 col-12">
                        <div class="customer-area2 d-flex align-items-center justify-content-between">
                            
                            <span class="order-img d-none d-md-block"><img src="<?php echo base_url(); ?>assets/img/1.png"
                                    alt=""></span>
                            <div class="order-content">
                                <span class="span-1">delivery order</span> <span class="span-2">+63956 465 0194</span>
                            </div>
                            <a href="#" class="btn">login</a>

                        </div>
                    </div>
                </div>
                <!-- mobile-menu -->
                <div class="mobile-menu"></div>
            </div>
        </div>
    </header>

   <!-- breadcrumb-area -->
   <div class="banner-area breadcrumb-area padding-top-120 padding-bottom-90">
        <div class="bread-shapes">
            <span class="b-shape-1 item-bounce"><img src="<?php echo base_url(); ?>assets/img/img/5.png" alt=""></span>
            <span class="b-shape-2"><img src="<?php echo base_url(); ?>assets/img/img/6.png" alt=""></span>
            <span class="b-shape-3"><img src="<?php echo base_url(); ?>assets/img/img/7.png" alt=""></span>
            <span class="b-shape-4"><img src="<?php echo base_url(); ?>assets/img/img/9.png" alt=""></span>
            <span class="b-shape-5"><img src="vimg/18.png" alt=""></span>
            <span class="b-shape-6 item-animateOne"><img src="<?php echo base_url(); ?>assets/img/img/7.png" alt=""></span>
        </div>
        <div class="container padding-top-120">
            <div class="row justify-content-center">
                <nav aria-label="breadcrumb">

                    <h2 class="page-title">Login Page</h2>
                    
                </nav>
            </div>
        </div>
    </div>

    <!-- contact-form-area -->
    <section class="about-area about-area2 writeto-us login-area padding-top-120 signup-area padding-bottom-60">
        <div class="form-shapes">
            <span class="fs1 item-animateOne"><img src="assets/images/shapes/1.png" alt=""></span>
            <span class="fs2 item-bounce"><img src="assets/images/shapes/12.png" alt=""></span>
            <span class="fs3"><img src="assets/images/shapes/13.png" alt=""></span>
            <span class="fs4 item-bounce"><img src="assets/images/shapes/26.png" alt=""></span>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12  wow fadeInUp">
                    <div class="about-left">
                        <div class="about-l-shapes">
                            <span class="als-1"><img src="<?php echo base_url(); ?>assets/img/shapes/2.png" alt=""></span>
                        </div>
                        <div class="row">
                            <div
                                class="col-lg-4 col-md-4 col-sm-4 col-4 d-flex align-items-end justify-content-end margin-bottom-20">
                                <div class="about-gallery-1">
                                    <img src="<?php echo base_url(); ?>assets/img/gallery/1.jpg" alt="">
                                </div>
                            </div>
                            <div class="col-lg-8 col-md-8 col-sm-8 col-8 margin-bottom-20">
                                <div class="about-gallery-2">
                                    <img src="<?php echo base_url(); ?>assets/img/gallery/2.jpg" alt="">

                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                <div class="about-gallery-3">
                                    <img src="<?php echo base_url(); ?>assets/img/gallery/3.jpg" alt="">
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-5 col-sm-5 col-5 d-flex align-items-stretch ">
                                <div class="about-gallery-5 text-center">
                                    <img src="<?php echo base_url(); ?>assets/img/gallery/5.jpg" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 wow fadeInUp">
                    <div class="contact-form-area login-form-area signup-form-area">
                        <h3>login to <span>your account</span></h3>
                        <form id="story-form" method="post" action="<?php echo base_url();?>home/validate_login" data-toggle="validator"  class="form-horizontal form-label-left" enctype="multipart/form-data">
                            
                            <input type="email" placeholder="email" name="username">
                            <input type="password" placeholder="password" name="password">
                            <div class="checkbox-area">
                                <div class="checkbox-part">
                                    <input type="checkbox" id="remember">
                                    <label for="remember">remember me</label>
                                </div>
                                <div class="forgot-pas">
                                    <a href="#">forgot password?</a>
                                </div>
                            </div>
                            <div class="login-btn">
                                <button type="submit" class="btn">login account</button>
                                <span>Don't have an account? <a href="signup.html">Signup here </a></span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>


   <!-- footer area -->
   <footer class="padding-top-40 padding-bottom-40 footer2">
        <div class="fo-shapes">
        
        <span class="fs-7"><img src="<?php echo base_url(); ?>assets/img/30.png" alt="" /></span>
        </div>
        <div class="footer-top d-none d-md-block">
        <div class="container">
            <div class="
                row
                align-items-center
                justify-content-between
                padding-bottom-25
                ">
            <div class="col-lg-3 col-md-3">
                <div class="f-logo">
                
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="f-title">
                <h4>Feel Hunger! Order Your<span> Like Food.</span></h4>
                </div>
            </div>
            <div class="col-lg-2 col-md-3">
                
            </div>
            </div>
            <hr />
        </div>
        </div>
        <?php foreach($contact as $rsc){ ?>
      <div class="footer-bottom padding-top-22 padding-bottom-30">
        <div class="container">
          <div class="row">
            <div class="col-lg-4 col-md-6 col-12 margin-bottom-20">
              <div class="widget">
                <h6>address</h6>
                <p><?php echo $rsc->c_address; ?></p>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12 margin-bottom-20">
              <div class="widget">
                <h6>Contact</h6>
                <p><span><?php echo $rsc->c_number; ?></span> <br /><span><?php echo $rsc->c_emailadd; ?></span>
                </p>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12 margin-bottom-20">
              <div class="widget">
                <h6>opening hours</h6>
                <p>
                  <span><?php echo $rsc->c_workingweekdays; ?></span> <br /><span><?php echo $rsc->c_workingweekends; ?></span>
              </div>
            </div>
            
          </div>
        </div>
      </div>
    <?php }?>
    
    </footer>

    <!-- ToTop Button -->
    <button class="scrollup"><i class="fas fa-angle-up"></i></button>

    <!-- Javascript Files -->
    <script src="<?php echo base_url(); ?>assets/js/vendor/jquery-2.2.4.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/vendor/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/vendor/jquery.meanmenu.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/vendor/jquery.magnific-popup.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/vendor/slick.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/vendor/counterup.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/vendor/countdown.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/vendor/waypoints.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/vendor/jquery-ui.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/vendor/isotope.pkgd.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/vendor/easing.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/vendor/wow.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/main.js"></script>

</body>

</html>