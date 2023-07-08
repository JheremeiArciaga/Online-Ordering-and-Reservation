
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
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

  

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

                    <div class="<?php if (isset($_SESSION['customer_id'])) { ?> col-lg-8 <?php } else { ?> col-lg-5 <?php }?> d-none d-lg-block">
                        <nav id="mobile-menu">
                            <ul class="main-menu main-menu2">
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
                    <div class="<?php if (isset($_SESSION['customer_id'])) { ?> col-lg-3 col-md-9 col-12 <?php } else { ?> col-lg-5 col-md-9 col-12  <?php }?>">
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
                <div class="mobile-menu home2"></div>
            </div>
        </div>
    </header>

  <!-- burger-promo-area -->
    <section class="delivery-area burger-promo-area padding-top-240 padding-bottom-135">
        
        <div class="del-shapes">
            <span class="ds-1"><img src="assets/img/40.png" alt=""></span>
            <span class="ds-2"><img src="assets/img/41.png" alt=""></span>
            <span class="ds-33"><img src="assets/img/5.png" alt=""></span>
            <span class="ds-4"><img src="assets/img/2.png" alt=""></span>
        </div>

        <div class="container">
            <div class="row flex-row-reverse align-items-center">
                <div class="col-lg-6 col-md-12 margin-bottom-20">
                    <div class="delivery-left">
                        <img class="mp" src="assets/img/ihaw.png" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="delivery-right">
                        <div class="common-title-area padding-bottom-40">
                            <h3>best in town</h3>
                            <h1>enjoy our <span>Inihaw</span> and Silog Meals</h1>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

  

  <!--popula-menu-area -->
  <section class="menu-area padding-bottom-120">
    <div class="container">
      <div class="common-title-area text-center padding-50 wow fadeInUp">
        <h3>food items</h3>
        <h2>popular <span>menu</span></h2>
      </div>
      <!-- menu-nav-wrapper -->
      <div class="menu-nav-wrapper">
        <div class="container">
          <div class="row">
            <nav>
              <div class="nav" id="nav-tab" role="tablist">
                <!-- menu-nav-1 -->
                <?php $counter = 1; foreach($categoryFMenu as $categoryRow) { ?>
                    <a class="nav-item nav-link <?php if($counter==1){echo 'active';} ?>" id="nav-menu-<?php echo $categoryRow->m_no; ?>" data-toggle="tab" href="#menu-<?php echo $categoryRow->m_no; ?>" role="tab"aria-controls="menu-<?php echo $categoryRow->m_no; ?>" aria-selected='<?php if($counter==1){echo "true";}else{echo "false";} ?>'>
                        <div class="single-menu-nav text-center">
                            <h6><?php echo $categoryRow->m_name; ?></h6>
                            <span class="g-s-4"><img src="<?php echo base_url(); ?>assets/img/shapes/13.png" alt="" /></span>
                            <span class="g-s-5"><img src="<?php echo base_url(); ?>assets/img/shapes/7.png" alt="" /></span>
                        </div>
                    </a>

                <?php $counter++; } ?>

              </div>
            </nav>
          </div>
        </div>
      </div>

      <!-- menu-items-wrapper -->
      <div class="tab-content" id="nav-tabContent">
        <!-- menu-items-1 -->
        <?php $counter = 1; foreach($categoryFMenu as $categoryRow) { ?>
            <div class="tab-pane fade show <?php if($counter==1){echo 'active';} ?>" id="menu-<?php echo $categoryRow->m_no; ?>" role="tabpanel" aria-labelledby="menu-<?php echo $categoryRow->m_no; ?>">
                <div class="menu-items-wrapper menu-custom-padding margin-top-50">
                    <div class="menu-i-shapes">
                    <span class="mis-1"><img src="<?php echo base_url(); ?>assets/img/shapes/2.png" alt="" /></span>
                    <span class="mis-2"><img src="<?php echo base_url(); ?>assets/img/shapes/12.png" alt="" /></span>
                    <span class="mis-3"><img src="<?php echo base_url(); ?>assets/img/shapes/7.png" alt="" /></span>
                    <span class="mis-4"><img src="<?php echo base_url(); ?>assets/img/shapes/13.png" alt="" /></span>
                    </div>

                    <div class="row">
                        <?php $count = 1; foreach($Menu as $mList){ if($mList->i_category==$categoryRow->m_name){ ?>
                            <div class="col-lg-4 col-md-4">
                                <div class="
                                    single-menu-item
                                    d-flex
                                    justify-content-between
                                    align-items-center
                                    h-100
                                    ">
                                    <div class="menu-img">
                                        <img src="<?php echo base_url(); ?>assets/img/<?php echo $mList->i_image;?>" alt="" />
                                    </div>
                                    <div class="menu-content">
                                        <h5><a href=""><?php echo $mList->i_name;?></a></h5>
                                        <p><?php echo $mList->i_description;?></p>
                                        <span>Price: ₱ <?php echo number_format($mList->i_price,2);?></span>
                                    </div>
                                </div>
                            </div>
                        <?php if($count == 3){break;} $count++; } } ?>
                    </div>


                    <div class="menu-btn text-center padding-top-60">
                    <a href="<?php echo base_url(); ?>home/menu/<?php echo $categoryRow->m_name; ?>" class="btn">order now</a>
                    </div>
                </div>
            </div>

        <?php $counter++; } ?>
 
        
      </div>
    </div>
  </section>

  <!-- popular-dishes -->
  <section class="popular-dishes-area padding-top-110 padding-bottom-110">
    <div class="pshapes">
      <span class="ps-1 item-animateTwo"><img src="<?php echo base_url(); ?>assets/img/shapes/11.png" alt="" /></span>
      <span class="ps-2 item-animateTwo"><img src="<?php echo base_url(); ?>assets/img/shapes/12.png" alt="" /></span>
      <span class="ps-3 item-bounce"><img src="<?php echo base_url(); ?>assets/img/shapes/13.png" alt="" /></span>
      <span class="ps-4 item-bounce"><img src="<?php echo base_url(); ?>assets/img/shapes/14.png" alt="" /></span>
      <span class="ps-5"><img src="<?php echo base_url(); ?>assets/img/shapes/15.png" alt="" /></span>
      <span class="ps-6"><img src="assets/images/shapes/16.png" alt="" /></span>
    </div>
    
    <div class="container">
      <nav class="
            popular-tab-nav
            d-flex
            flex-wrap
            justify-content-between
            align-items-center
          ">
        <div class="common-title-area padding-bottom-30 wow fadeInLeft">
          <h3>food items</h3>
          <h2>popular <span>dishes</span></h2>
        </div>
        <div class=" padding-bottom-30 fadeInRight"  >
        <a href="<?php echo base_url(); ?>home/menu/<?php echo $categoryRow->m_name; ?>" class="btn">All Items</a>
        </div>
      </nav>
      <!-- main-content -->
      <div class="tab-content" id="nav-tabContent-1">
        <!-- all items -->
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home">
          
        <div class="row">
          
            <?php foreach($featuredMenu as $fMenu){ ?>
              <div class="col-xl-3 col-lg-3 col-md-6 wow fadeInUp" data-wow-delay=".2s">
                <div class="single-dishes">
                  <div class="dish-img">
                    <img src="<?php echo base_url(); ?>assets/img/<?php echo $fMenu->i_image; ?>" style="width: inherit; height:170px" alt="" />
                  </div>
                  <div class="dish-content">
                    <h5><a href="single-dish.html"><?php echo $fMenu->i_name; ?></a></h5>
                    <p>
                      <?php echo $fMenu->i_description; ?>
                    </p>
                    <span class="price">Price: ₱ <?php echo number_format($fMenu->i_price,2);?></span>
                  </div>
                  
                  <div class="cart-opt">
                    <span>
                      <a href="<?php echo base_url();?>home/add_to_cart_home/<?php echo $fMenu->i_no; ?>/1/<?php echo number_format($mList->i_price,2);?>"><i class="fas fa-shopping-basket"></i></a>
                    </span>
                  </div>
                </div>
              </div>
            <?php }?>

          </div>
        </div>

        
      </div>
    </div>
  </section>

  

  <!-- footer area -->
  <footer class="padding-top-40 padding-bottom-40">
    <div class="fo-shapes">
      <span class="fs-1"><img src="<?php echo base_url(); ?>assets/img/gallery/26.png" alt="" /></span>
      <span class="fs-2 item-bounce"><img src="<?php echo base_url(); ?>assets/img/shapes/25.png" alt="" /></span>
      <span class="fs-3 item-bounce"><img src="<?php echo base_url(); ?>assets/img/shapes/26.png" alt="" /></span>
      <span class="fs-4 item-bounce"><img src="<?php echo base_url(); ?>assets/img/shapes/27.png" alt="" /></span>
      <span class="fs-5 item-animateTwo"><img src="<?php echo base_url(); ?>assets/img/shapes/3.png" alt="" /></span>
      <span class="fs-6"><img src="<?php echo base_url(); ?>assets/img/shapes/22.png" alt="" /></span>
      <span class="fs-7"><img src="<?php echo base_url(); ?>assets/img/shapes/30.png" alt="" /></span>
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
              <a href="index.html">
                <img src="assets/images/logo/logo.png" alt="" /></a>
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
                </p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12 margin-bottom-20">
              <div class="widget">
                <h6 class="mb-0 ">Social Media</h6>
                <div class="social-media" style="margin-top: 0;">
                <a href="https://github.com/JheremeiArciaga" target="_blank"> <i class='bx bxl-github'></i></a>
                <a href="https://mail.google.com/mail/u/0/?fs=1&to=jheremeiarciaga@gmail.com&tf=cm" target="_blank"><i
                        class='bx bxl-gmail'></i></a>
                <a href="https://www.instagram.com/jeremygatchion/" target="_blank"> <i
                        class='bx bxl-instagram-alt'></i></a>
                <a href="https://www.linkedin.com/in/jheremei-arciaga-013861238/" target="_blank"> <i
                        class='bx bxl-linkedin'></i></a>
            </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12 ">
              <div class="widget">
                <h6 ><a href="https://developer.moneris.com/More/Compliance/Sample%20Return%20Policy">Return Policy</a></h6>
                
              </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12 ">
              <div class="widget">
                <h6><a href="https://www.astartingpoint.com/static/privacy.html?gclid=Cj0KCQjwho-lBhC_ARIsAMpgMofsz7YXxYV_h0ZlwkHEapI2wUiiyc1yJQhoVwaIPWnIai7sBJuWa_MaAlVgEALw_wcB">Privacy Policy</a></h6>
               
              </div>
            </div>
            
            
          </div>
        </div>
      </div>
    <?php }?>
   
    <div class="copyright-area text-center ">
      <p class="font-size:0.5rem";>Copyright © 2022 <a href="index.html">AISCHI'S GRILL RESTAURANT</a></p>
    </div>
  </footer>

  <!-- ToTop Button -->
  <button class="scrollup"><i class="fas fa-angle-up"></i></button>

  <!-- Javascript Files -->
  <script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
  <script src="assets/js/vendor/bootstrap.min.js"></script>
  <script src="assets/js/vendor/jquery.meanmenu.min.js"></script>
  <script src="assets/js/vendor/jquery.magnific-popup.min.js"></script>
  <script src="assets/js/vendor/slick.min.js"></script>
  <script src="assets/js/vendor/counterup.min.js"></script>
  <script src="assets/js/vendor/countdown.js"></script>
  <script src="assets/js/vendor/waypoints.min.js"></script>
  <script src="assets/js/vendor/jquery-ui.js"></script>
  <script src="assets/js/vendor/isotope.pkgd.min.js"></script>
  <script src="assets/js/vendor/easing.min.js"></script>
  <script src="assets/js/vendor/wow.min.js"></script>
  <script src="assets/js/main.js"></script>
</body>

</html>