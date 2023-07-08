
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

                    <div class="<?php if (isset($_SESSION['customer_id'])) { ?> col-lg-9 <?php } else { ?> col-lg-5 <?php }?> d-none d-lg-block">
                        <nav id="mobile-menu">
                            <ul class="main-menu main-menu30">
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

                                <?php if (isset($_SESSION['customer_id'])) { ?>
                                    <li><a href="#"><i class="customer-area fas fa-user"></i> <?php echo $this->session->customer_fn;?> <?php echo $this->session->customer_ln;?> <i class="fas fa-angle-down"></i></span></a>
                                        <ul class="submenu">
                                            <li><a href="<?php echo base_url(); ?>home/profile">Profile</a></li>
                                            <li><a href="<?php echo base_url(); ?>home/order">Orders</a></li>
                                            <li><a href="<?php echo base_url(); ?>home/message">Message</a></li>
                                            <li><a href="<?php echo base_url(); ?>home/logout">Logout</a></li>
                                        </ul>
                                    </li>

                                    <li><a href="<?php echo base_url(); ?>home/cart"><i class="fas fa-shopping-basket"></i> Cart</a></li>
                                <?php } ?>
                            </ul>
                        </nav>
                    </div>

                    <div class="col-lg-5 col-md-9 col-12">
                        <div class="customer-area2 d-flex align-items-center justify-content-between">
                            
                           <?php if (isset($_SESSION['customer_id'])) { ?>
                              
             
                            <?php } else { ?>

                              <span class="order-img d-none d-md-block"><img src="<?php echo base_url(); ?>assets/img/1.png"
                                    alt=""></span>
                              <div class="order-content">
                                  <span class="span-1">delivery order</span> <span class="span-2">+63956 465 0194</span>
                              </div>

                              <a href="<?php echo base_url(); ?>home/login" class="btn">Login</a>

                            <?php }?>


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

                    <h2 class="page-title">Table Reservation</h2>
                    
                </nav>
            </div>
        </div>
    </div>

    <!-- checkout-area -->
    <div class="checkout-area padding-top-120 padding-bottom-120">
        <div class="cshapes">
            <span class="cs-1"><img src="assets/images/img/6.png" alt=""></span>
            <span class="cs-2 item-bounce"><img src="assets/images/shapes/12.png" alt=""></span>
            <span class="cs-3"><img src="assets/images/shapes/13.png" alt=""></span>
            <span class="cs-4"><img src="assets/images/shapes/14.png" alt=""></span>
            <span class="cs-5"><img src="assets/images/img/32.png" alt=""></span>
            <span class="cs-6"><img src="assets/images/shapes/16.png" alt=""></span>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header wow fadeInDown">
                       
                    </div>
                </div>
            </div>
            <div class="reservation-form wow fadeInUp">
                <div class="widget">
                    <h3 class="padding-bottom-50">Book Your Table</h3>
                    <div class="newsletter newsletter-2">
                        <form action="<?php echo base_url();?>home/reserve_table" id="reservationform" method="POST">
                            <div class="row">
                                <div class="col-lg-6">
                                    <input type="text"  id="name" name="rt_name" placeholder="Full Name" title="Your Full Name please" required>
                                    <input type="email" id="email" name="rt_email" placeholder="Your Email ID" title="Please enter your email id" required>
                                    <input type="text"  id="phone" name="rt_contact" placeholder="Enter your Phone Number" title="Please enter your phone number" required>
                                </div>
                                <div class="col-lg-6">
                                    <select name="rt_count">
                                        <option value="2">2 people</option>
                                        <option value="3">3 people</option>
                                        <option value="4">4 people</option>
                                        <option value="5">5 people</option>
                                        <option value="6">6 people</option>
                                        <option value="7">7 people</option>
                                        <option value="8">8 people</option>
                                        <option value="9">9 people</option>
                                        <option value="10">10 people</option>
                                    </select>
                                    <input name="date" type="date">
                                    <select name="time">
                                        <option>10:30am</option>
                                        <option>11:00am</option>
                                        <option>11:30am</option>
                                        <option>12:00pm</option>
                                        <option>12:30pm</option>
                                        <option>1:00pm</option>
                                        <option>1:30pm</option>
                                        <option>2:00pm</option>
                                        <option>2:30pm</option>
                                        <option>3:00pm</option>
                                        <option>3:30pm</option>
                                        <option>4:00pm</option>
                                        <option>4:30pm</option>
                                        <option>5:00am</option>
                                        <option>5:30pm</option>
                                        <option>6:00pm</option>
                                        <option>6:30pm</option>
                                        <option>7:00am</option>
                                        <option>7:30pm</option>
                                    </select>
                                    
                                </div>
                                
                            </div>
                        
                            
                            
                           
                            
                      
                        
                    </div>

              
                </div>
            </div>
        </div>
        <div class="text-center">
        <input type="radio"  id="terms">
    <label for="terms">I accept the <a href="#">Terms of Use & Privacy Policy *</a></label>
    </div>
    <div class="row">
                                
          <div class="col-lg-12 padding-top-10  text-center">
              <button type="submit" class="btn">find table</button>
          </div>
      </div>
    </div>
    </form>
    
    
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