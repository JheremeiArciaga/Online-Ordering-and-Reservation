<?php if (!isset($_SESSION['user_role'])) {
    redirect('admin/index', 'refresh');
} ?>

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
    <link href="https://colorlib.com/polygon/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo base_url();?>assets/admin/themes/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="<?php echo base_url();?>assets/admin/themes/iCheck/skins/flat/green.css" rel="stylesheet">

    <!-- bootstrap-progressbar -->
    <link href="<?php echo base_url();?>assets/admin/themes/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="<?php echo base_url();?>assets/admin/themes/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="<?php echo base_url();?>assets/admin/themes/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- alertify -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/alertify/css/alertify.core.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/alertify/css/alertify.bootstrap.css" id="toggleCSS" />

    <!-- P-Notify -->
    <link href="<?php echo base_url();?>assets/admin/themes/pnotify/dist/pnotify.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/admin/themes/pnotify/dist/pnotify.buttons.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/admin/themes/pnotify/dist/pnotify.nonblock.css" rel="stylesheet">

    <!-- Datatables -->
    <link href="<?php echo base_url();?>assets/admin/themes/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/admin/themes/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/admin/themes/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/admin/themes/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/admin/themes/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">


    <!-- Switchery -->
    <link href="<?php echo base_url();?>assets/admin/themes/switchery/dist/switchery.min.css" rel="stylesheet">

    <!-- select2 -->
    <link href="<?php echo base_url();?>assets/admin/themes/select2/select2.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/admin/themes/multi_select/multi_select.css" rel="stylesheet" type="text/css" />

    <!-- loading Progress -->
    <link href="<?php echo base_url();?>assets/admin/themes/loading_progress/loading_progress.css" rel="stylesheet" type="text/css" />

    <!-- Custom Theme Style -->
    <link href="<?php echo base_url();?>assets/admin/themes/build/css/custom.css" rel="stylesheet">



</head>


<body class="nav-md">

<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" >
                    <a href="#" class="site_title"> <span>Aischi Grill House</span></a>
                </div>

                <div class="clearfix"></div>

                <!-- menu profile quick info -->
                <div class="profile clearfix">
                    <div class="profile_pic">
                        <img src="<?php echo base_url();?>/assets/admin/img/<?php echo $this->session->user_image;?>" alt="..." class="img-circle profile_img">
                    </div>
                    <div class="profile_info">
                        <span>Welcome,</span>
                        <h2><?php echo $this->session->user_fn;?> <?php echo $this->session->user_ln;?></h2>
                    </div>
                </div>
                <!-- /menu profile quick info -->

                <br />

                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                    <div class="menu_section">
                        <h3>General</h3>
                        <ul class="nav side-menu">
                            <?php
                            if($index_user_roles){
                                foreach ($index_user_roles as $rs) {
                                    $arr_index_user_roles_main_menu[$rs->main_menu_id] = 1;
                                    $arr_index_user_roles_sub_menu[$rs->sub_menu_id] = 1;
                                }
                            }

                            if($main_menu){
                                foreach ($main_menu as $rs) {
                                    if(isset($arr_index_user_roles_main_menu[$rs->id]) && $arr_index_user_roles_main_menu[$rs->id]) {

                                        ?>
                                        <li><a><i class="fa <?php echo $rs->font_icon;?>"></i> <?php echo $rs->title;?> <span class="fa fa-chevron-down"></span></a>
                                            <ul class="nav child_menu">
                                                <?php
                                                if($sub_menu){
                                                    foreach ($sub_menu as $rs_sub) {
                                                        if($rs_sub->main_menu_id==$rs->id && isset($arr_index_user_roles_sub_menu[$rs_sub->id]) && $arr_index_user_roles_sub_menu[$rs_sub->id]){
                                                            ?>
                                                            <li><a href="<?php echo base_url().$rs_sub->url_link;?>"><?php echo $rs_sub->title;?></a></li>
                                                        <?php }}}?>
                                            </ul>
                                        </li>
                                    <?php }}}?>
                        </ul>
                    </div>

                </div>
                <!-- /sidebar menu -->

                <!-- /menu footer buttons -->
                <div class="sidebar-footer hidden-small">
                    <a data-toggle="tooltip" data-placement="top" title="Settings">
                        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                        <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="Lock">
                        <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="Logout" href="<?php echo base_url();?>admin/logout">
                        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                    </a>
                </div>
                <!-- /menu footer buttons -->
            </div>
        </div>


        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <nav>
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>

                    <ul class="nav navbar-nav navbar-right">
                        <li class="">
                            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <img src="<?php echo base_url();?>/assets/admin/img/<?php echo $this->session->user_image;?>" alt=""><?php echo $this->session->user_fn;?> <?php echo $this->session->user_ln;?>
                                <span class=" fa fa-angle-down"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-usermenu pull-right">
                                <li><a href="<?php echo base_url();?>admin/change_password"> Change Password</a></li>
                                <li><a href="<?php echo base_url();?>admin/logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                            </ul>
                        </li>


                    </ul>
                </nav>
            </div>
        </div>
        <!-- /top navigation -->


        <!-- page content -->
        <div class="right_col" role="main">

            <div id="notif_fade" class="col-md-12 col-sm-12 col-xs-12">
                <?php if(isset($_SESSION["error"])){echo '<div class="clearfix"></div><div class="alert alert-danger">'.$_SESSION["error"].'</div>';}?>
                <?php if(isset($_SESSION["success"])){echo '<div class="clearfix"></div><div class="alert alert-success">'.$_SESSION["success"].'</div>';}?>
                <?php echo validation_errors('<div class="clearfix"></div><div class="alert alert-danger">','</div>');?>
            </div>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Reservation <small> Table Reservation </small></h2>
                            <ul class="nav navbar-right panel_toolbox">

                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <p class="text-muted font-13 m-b-30">

                            </p>

                            <div class="element-tab">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="active"><a href="#PR" role="tab" data-toggle="tab">Pending Reservation</a></li>
                                    <li><a href="#AR" role="tab" data-toggle="tab">Accepted Reservation</a></li>
                                    <li><a href="#CR" role="tab" data-toggle="tab">Canceled Reservation</a></li>
                                </ul>
                            </div>

                            <div class="tab-content">

                                <div class="tab-pane fade active in" id="PR" style="padding: 20px 0 0">
                                    <table id="datatable" class="table table-striped table-bordered table-hover table-fixed">
                                        <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Reservation Date</th>
                                            <th>Reservation Time</th>
                                            <th>Guest</th>
                                            <th>Name </th>
                                            <th>Contact Number </th>
                                            <th>Email Number </th>
                                            <th>Option</th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        <?php
                                        if($lrt_Data){
                                            foreach ($lrt_Data as $rs) { if($rs->rt_status == 0) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $rs->rt_transdate;?></td>
                                                    <td><?php echo $rs->rt_date;?></td>
                                                    <td><?php echo $rs->rt_time;?></td>
                                                    <td><?php echo $rs->rt_count;?></td>
                                                    <td><?php echo $rs->rt_name;?></td>
                                                    <td><?php echo $rs->rt_contact;?></td>
                                                    <td><?php echo $rs->rt_email;?></td>
                                                    <th>
                                                        <a href="<?php echo base_url();?>admin/accept_table_reservation/<?php echo $rs->rt_no;?>"><i class="fa fa-check"></i> accept</a>
                                                        <br>
                                                        <a href="Javascript:Delete_Carousel(<?php echo $rs->rt_no;?>)"><i class="fa fa-trash-o"></i> remove</a>
                                                    </th>
                                                </tr>
                                            <?php } } }?>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="tab-pane fade in" id="AR" style="padding: 20px 0 0">
                                    <table id="datatable" class="table table-striped table-bordered table-hover table-fixed">
                                        <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Reservation Date</th>
                                            <th>Reservation Time</th>
                                            <th>Guest</th>
                                            <th>Name </th>
                                            <th>Contact Number </th>
                                            <th>Email Number </th>
                                            <th>Option</th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        <?php
                                        if($lrt_Data){
                                            foreach ($lrt_Data as $rs) { if($rs->rt_status == 1) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $rs->rt_transdate;?></td>
                                                    <td><?php echo $rs->rt_date;?></td>
                                                    <td><?php echo $rs->rt_time;?></td>
                                                    <td><?php echo $rs->rt_count;?></td>
                                                    <td><?php echo $rs->rt_name;?></td>
                                                    <td><?php echo $rs->rt_contact;?></td>
                                                    <td><?php echo $rs->rt_email;?></td>
                                                    <th>
                                                        <a href="<?php echo base_url();?>admin/cancel_table_reservation/<?php echo $rs->rt_no;?>"><i class="fa fa-trash"></i> cancel</a>

                                                    </th>
                                                </tr>
                                            <?php } } } ?>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="tab-pane fade in" id="CR" style="padding: 20px 0 0">
                                    <table id="datatable" class="table table-striped table-bordered table-hover table-fixed">
                                        <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Reservation Date</th>
                                            <th>Reservation Time</th>
                                            <th>Guest</th>
                                            <th>Name </th>
                                            <th>Contact Number </th>
                                            <th>Email Number </th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        <?php
                                        if($lrt_Data){
                                            foreach ($lrt_Data as $rs) { if($rs->rt_status == 2) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $rs->rt_transdate;?></td>
                                                    <td><?php echo $rs->rt_date;?></td>
                                                    <td><?php echo $rs->rt_time;?></td>
                                                    <td><?php echo $rs->rt_count;?></td>
                                                    <td><?php echo $rs->rt_name;?></td>
                                                    <td><?php echo $rs->rt_contact;?></td>
                                                    <td><?php echo $rs->rt_email;?></td>

                                                </tr>
                                            <?php } } } ?>
                                        </tbody>
                                    </table>
                                </div>

                            </div>




                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- footer content -->
        <footer>
            <div class="pull-right">

            </div>
            <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
    </div>
</div>



<!-- jQuery -->
<script src="<?php echo base_url();?>assets/admin/themes/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?php echo base_url();?>assets/admin/themes/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url();?>assets/admin/themes/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="<?php echo base_url();?>assets/admin/themes/nprogress/nprogress.js"></script>

<!-- gauge.js -->
<script src="<?php echo base_url();?>assets/admin/themes/gauge.js/dist/gauge.min.js"></script>
<!-- bootstrap-progressbar -->
<script src="<?php echo base_url();?>assets/admin/themes/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
<!-- iCheck -->
<script src="<?php echo base_url();?>assets/admin/themes/iCheck/icheck.min.js"></script>
<!-- Skycons -->
<script src="<?php echo base_url();?>assets/admin/themes/skycons/skycons.js"></script>

<!-- Chart.js -->
<script src="<?php echo base_url();?>assets/admin/themes/Chart.js/dist/Chart.min.js"></script>
<!-- Flot -->
<script src="<?php echo base_url();?>assets/admin/themes/Flot/jquery.flot.js"></script>
<script src="<?php echo base_url();?>assets/admin/themes/Flot/jquery.flot.pie.js"></script>
<script src="<?php echo base_url();?>assets/admin/themes/Flot/jquery.flot.time.js"></script>
<script src="<?php echo base_url();?>assets/admin/themes/Flot/jquery.flot.stack.js"></script>
<script src="<?php echo base_url();?>assets/admin/themes/Flot/jquery.flot.resize.js"></script>
<!-- Flot plugins -->
<script src="<?php echo base_url();?>assets/admin/themes/flot.orderbars/js/jquery.flot.orderBars.js"></script>
<script src="<?php echo base_url();?>assets/admin/themes/flot-spline/js/jquery.flot.spline.min.js"></script>
<script src="<?php echo base_url();?>assets/admin/themes/flot.curvedlines/curvedLines.js"></script>

<!-- DateJS -->
<script src="<?php echo base_url();?>assets/admin/themes/DateJS/build/date.js"></script>
<!-- JQVMap -->
<script src="<?php echo base_url();?>assets/admin/themes/jqvmap/dist/jquery.vmap.js"></script>
<script src="<?php echo base_url();?>assets/admin/themes/jqvmap/dist/maps/jquery.vmap.world.js"></script>
<script src="<?php echo base_url();?>assets/admin/themes/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
<!-- bootstrap-daterangepicker -->
<script src="<?php echo base_url();?>assets/admin/themes/moment/min/moment.min.js"></script>
<script src="<?php echo base_url();?>assets/admin/themes/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- Alertify -->
<script src="<?php echo base_url();?>assets/admin/alertify/js/alertify.js"></script>


<!-- Datatables -->
<script src="<?php echo base_url();?>assets/admin/themes/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>assets/admin/themes/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url();?>assets/admin/themes/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url();?>assets/admin/themes/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
<script src="<?php echo base_url();?>assets/admin/themes/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="<?php echo base_url();?>assets/admin/themes/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url();?>assets/admin/themes/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo base_url();?>assets/admin/themes/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
<script src="<?php echo base_url();?>assets/admin/themes/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
<script src="<?php echo base_url();?>assets/admin/themes/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url();?>assets/admin/themes/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
<script src="<?php echo base_url();?>assets/admin/themes/datatables.net-scroller/js/dataTables.scroller.min.js"></script>


<!-- PNotify -->
<script src="<?php echo base_url();?>assets/admin/themes/pnotify/dist/pnotify.js"></script>
<script src="<?php echo base_url();?>assets/admin/themes/pnotify/dist/pnotify.buttons.js"></script>
<script src="<?php echo base_url();?>assets/admin/themes/pnotify/dist/pnotify.nonblock.js"></script>

<!-- Switchery -->
<script src="<?php echo base_url();?>assets/admin/themes/switchery/dist/switchery.min.js"></script>

<!-- select2 -->
<script src="<?php echo base_url();?>assets/admin/themes/select2/select2.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/admin/themes/multi_select/multi_select.js" type="text/javascript"></script>


<!-- Custom Theme Scripts -->
<script src="<?php echo base_url();?>assets/admin/themes/build/js/custom.js"></script>

<script type="text/javascript">

    function fileValidation_1(){
        var fileInput = document.getElementById('filen');
        var filePath = fileInput.value;
        var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
        if(!allowedExtensions.exec(filePath)){
            alert('Upload image file only.');
            fileInput.value = '';
            return false;
        }
    }



    function fileValidation_edit1(eid){
        var fileInput = document.getElementById('file_e1_'+eid);
        var filePath = fileInput.value;
        var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
        if(!allowedExtensions.exec(filePath)){
            alert('Upload image file only.');
            fileInput.value = '';
            return false;
        }
    }

 

    function Delete_Carousel(cid)
    {
        if (confirm("Delete Order Id : "+cid+"?"))
        {
            location.href = "<?php echo base_url();?>admin/online_order_delete/"+cid;
        }
    }


    $( document ).ready(function() {
        $("#notif_fade").fadeOut(5000);
    });


</script>



</body>
</html>