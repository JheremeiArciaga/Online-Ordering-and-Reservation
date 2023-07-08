
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

                    <h2 class="page-title">Checkout</h2>
                    
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
            <form action="<?php echo base_url();?>Home/transact_online_order" method="POST" data-toggle="validator" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-lg-6  wow fadeInUp">
                        <div class="checkout-left">
                            <h4>Billing Details</h4>
                            <input name="first_name" type="text" placeholder="first name" value="<?php echo $this->session->customer_fn;?>" required >
                            <input name="last_name" type="text" placeholder="last name" value="<?php echo $this->session->customer_ln;?>" required>
                            <input name="complete_address" type="text" placeholder="address" value="<?php echo $this->session->customer_address;?>">
                            <input name="contact_num" type="tel" placeholder="contact number" value="<?php echo $this->session->customer_contact;?>" required>
                            <input name="email_add" type="email" placeholder="email address" value="<?php echo $this->session->customer_email;?>" required>
                            <input name="nearest_landmark" type="text" placeholder="nearest landmark(optional)">
                            <input name="order_notes" type="text" placeholder="order notes(optional)">
                        </div>
                    </div>

                    <div class="col-lg-6  wow fadeInUp ">
                        <div class="checkout-right">
                            <h4>Your Order</h4>
                            <div class="pricing-box">
                                <ul class="p-head">
                                    <li class="uppercase">product</li>
                                    <li class="uppercase">total</li>
                                </ul>
                                <div class="divider"></div>

                                <?php $total=0; foreach($cartData as $cData){ ?>
                                    <ul>
                                        <li><?php echo $cData->i_name;?></li>
                                        <li><?php echo number_format($cData->i_price * $cData->mnu_qty, 2);?></li>
                                    </ul>

                                <?php $total += $cData->i_price * $cData->mnu_qty; } ?>
                                
                                
                                <ul>
                                    <li class="uppercase"><b>subtotal</b></li>
                                    <li><b><?php echo number_format($total, 2); ?></b></li>
                                </ul>
                                
                                <ul class="bg-white">
                                    <li class="uppercase">total</li>
                                    <li class="total"><b><?php echo number_format($total, 2); ?></b></li>
                                </ul>
                            </div>
                            

                            <input type="radio" id="terms">
                            <label for="terms">I’ve read and accept the <a href="#">terms & conditions *</a></label>
                            <br>
                            <button type="submit" class="btn" style="width:100%">place order</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    
    
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