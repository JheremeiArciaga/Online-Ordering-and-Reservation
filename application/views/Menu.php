<?php

if(!isset($_SESSION['web_session']))
{

    $new_web_session = uniqid();


    $arraydata = array(
        'web_session'  => $new_web_session
    );

    $this->session->set_userdata($arraydata);

}

?>

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
            <span class="b-shape-5"><img src="<?php echo base_url(); ?>assets/img/img/18.png" alt=""></span>
            <span class="b-shape-6 item-animateOne"><img src="<?php echo base_url(); ?>assets/img/img/7.png" alt=""></span>
        </div>
        <div class="container padding-top-120">
            <div class="row justify-content-center">
                <nav aria-label="breadcrumb">

                    <h2 class="page-title"><?php $replaceText = str_replace('%20', ' ', $category);  echo $replaceText; ?></h2>
                    
                </nav>
            </div>
        </div>
    </div>


    <!-- food area -->
    <section class="food-area  popular-dishes-area padding-top-110 padding-bottom-110">
        <div class="pshapes">
            <span class="ps-1"><img src="<?php echo base_url(); ?>assets/img/img/32.png" alt=""></span>
            <span class="ps-2 item-animateOne"><img src="<?php echo base_url(); ?>assets/img/img/12.png" alt=""></span>
            <span class="ps3 item-bounce"><img src="<?php echo base_url(); ?>assets/img/img/13.png" alt=""></span>
            <span class="ps-4"><img src="<?php echo base_url(); ?>assets/img/img/14.png" alt=""></span>
            <span class="ps-5"><img src="<?php echo base_url(); ?>assets/img/img/6.png" alt=""></span>
            <span class="ps-6"><img src="<?php echo base_url(); ?>assets/img/img/16.png" alt=""></span>
            <span class="ps-7 item-bounce"><img src="<?php echo base_url(); ?>assets/img/img/6.png" alt=""></span>
        </div>
        <div class="container">
            
            <!-- main-content -->
            <div class="tab-content" id="nav-tabContent-1">

                <!-- food 1 -->
                <div class="tab-pane fade show active" id="food1" role="tabpanel" aria-labelledby="food1">
                    <div class="row">


                        <?php foreach($cMenu as $menuRow){ ?>
                            <div class="col-xl-3 col-lg-3 col-md-6 wow fadeInUp" data-wow-delay=".2s">
                                <div class="single-dishes">
                                    <div class="dish-img">
                                        <img src="<?php echo base_url(); ?>assets/img/<?php echo $menuRow->i_image; ?>" style="width: 100%; height:170px;" alt="">
                                    </div>
                                    <div class="dish-content">
                                        <h5><a href="single-food.html"><?php echo $menuRow->i_name; ?>
                                            </a></h5>
                                        <p><?php echo $menuRow->i_description; ?></p>
                                        <span class="price">₱ <?php echo number_format($menuRow->i_price,2); ?></span>

                                    </div>
                                    <div class="cart-opt"> 
                                        <span>
                                            <a href="<?php echo base_url();?>home/add_to_cart_menu/<?php echo $menuRow->i_no; ?>/1/<?php echo number_format($menuRow->i_price,2);?>/<?php echo $mCategory; ?>"><i class="fas fa-shopping-basket"></i></a>
                                        </span>
                                    </div>
                                </div>
                            </div>

                        <?php } ?>

                        
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