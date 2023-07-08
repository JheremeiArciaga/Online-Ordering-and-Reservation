<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" href="<?php echo base_url();?>/assets/front/images/favicon.png" type="image/x-icon" >

    <title>Aischi Grill House</title>
    <!-- Bootstrap -->
    <link href="<?php echo base_url();?>assets/admin/themes/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url();?>assets/admin/themes/font-awesome/css/font-awesome.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo base_url();?>assets/admin/themes/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="<?php echo base_url();?>assets/admin/themes/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?php echo base_url();?>assets/admin/themes/build/css/custom.css" rel="stylesheet">
</head>

<body class="login">
<div>
    <a class="hiddenanchor" id="signup"></a>
    <a class="hiddenanchor" id="signin"></a>

    <div class="login_wrapper">
        <div class="animate form login_form">

            <div id="notif_fade" class="col-md-12">
                <?php if(isset($_SESSION["error"])){echo '<div class="alert alert-danger">'.$_SESSION["error"].'</div>';}?>
                <?php if(isset($_SESSION["success"])){echo '<div class="alert alert-success">'.$_SESSION["success"].'</div>';}?>
                <?php echo validation_errors('<div class="alert alert-danger">','</div>');?>
            </div>

            <img style="width:380px" class="img-responsive" src="<?php echo base_url();?>assets/admin/img/logo.png"/>

            <section class="login_content">
                <form action="<?php echo base_url();?>admin/validate_login" method="post" data-toggle="validator" id="frm_validation" enctype="multipart/form-data">
                    <h1>User Access</h1>
                    <div>
                        <input id="username" name="username"  type="text" class="form-control" placeholder="Username" required="" />
                    </div>
                    <div>
                        <input id="password" name="password" type="password" class="form-control" placeholder="Password" required="" />
                    </div>
                    <div>
                        <button type="submit" class="btn btn-default submit">Login</button>
                    </div>

                    <div class="clearfix"></div>

                    <div class="separator">
                        <p class="change_link">
                            <a href="#signup" class="to_register"> Forgot Password? </a>
                        </p>

                        <div class="clearfix"></div>
                        <br />


                    </div>

                </form>
            </section>
        </div>

        <div id="register" class="animate form registration_form">

            <div id="notif_fade" class="col-md-12">
                <?php if(isset($_SESSION["error"])){echo '<div class="alert alert-danger">'.$_SESSION["error"].'</div>';}?>
                <?php if(isset($_SESSION["success"])){echo '<div class="alert alert-success">'.$_SESSION["success"].'</div>';}?>
                <?php echo validation_errors('<div class="alert alert-danger">','</div>');?>
            </div>

            <img src="<?php echo base_url();?>assets/admin/img/logo.png"/>

            <section class="login_content">

                <form action="<?php echo base_url();?>admin/recover_account" method="post" data-toggle="validator" id="frm_validation" enctype="multipart/form-data">
                    <h1>Recover Account</h1>
                    <div>
                        <input id="user_name" name="user_name" type="text" class="form-control" placeholder="Username" required="" />
                    </div>

                    <div>
                        <select id="user_sec_question" name="user_sec_question" class="form-control" style="margin-bottom: 20px ;">
                            <option selected hidden>Recovery Question</option>
                            <option>What is your year of birth?</option>
                            <option>What is your mothers maiden name?</option>
                            <option>What is your pet's name?</option>
                        </select>
                    </div>

                    <div>
                        <input id="user_sec_answer" name="user_sec_answer" type="text" class="form-control" placeholder="Answer" required="" />
                    </div>

                    <div>
                        <input id="user_pass" name="user_pass" type="password" class="form-control" placeholder="New Password" required="" />
                    </div>

                    <div>
                        <input id="user_pass_c" name="user_pass_c" type="password" class="form-control" placeholder="Confirm Password" required="" />
                    </div>

                    <div>
                        <button type="submit" class="btn btn-default submit">Recover Password</button>
                    </div>


                    <div class="clearfix"></div>

                    <div class="separator">
                        <p class="change_link">
                            <a href="#signin" class="to_register">Go back to Log in Form </a>
                        </p>

                        <div class="clearfix"></div>
                        <br />


                    </div>
                </form>
            </section>
        </div>

    </div>
</div>

<!-- jQuery -->
<script src="<?php echo base_url();?>assets/admin/themes/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?php echo base_url();?>assets/admin/themes/bootstrap/dist/js/bootstrap.min.js"></script>

<script type="text/javascript">

    $( document ).ready(function() {
        $("#notif_fade").fadeOut(5000);
    });


</script>


</body>
</html>
