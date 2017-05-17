<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="ThemeBucket">

    <title><?php echo $__env->yieldContent('title'); ?> - Petugas </title>
    <link rel="shortcut icon" href="<?php echo e(asset ("assets/admin/images/favicon.ico")); ?>">

    <!--Core CSS -->
    <link href="<?php echo e(asset("assets/admin/bs3/css/bootstrap.min.css")); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset("assets/admin/css/bootstrap-reset.css")); ?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo e(asset("assets/admin/font-awesome/css/font-awesome.css")); ?>" rel="stylesheet" type="text/css"/>

    <!--dynamic table-->
    <link href="<?php echo e(asset("assets/admin/js/advanced-datatable/css/demo_page.css")); ?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo e(asset("assets/admin/js/advanced-datatable/css/demo_table.css")); ?>" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="<?php echo e(asset("assets/admin/js/data-tables/DT_bootstrap.css")); ?>" type="text/css"/>

    <!-- Custom styles for this template -->
    <link href="<?php echo e(asset("assets/admin/css/style.css")); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo e(asset("assets/admin/css/style-responsive.css")); ?>" rel="stylesheet" type="text/css"/>

    <!--UNTUK MULTIPLE SELECT-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset("assets/admin/js/jquery-multi-select/css/multi-select.css")); ?>" />

    <!--UNTUK Tags Input-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset("assets/admin/js/jquery-tags-input/jquery.tagsinput.css")); ?>" />

    <!-- UNTUK SELECT2 Component -->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset("assets/admin/js/select2/select2.css")); ?>" />

    <?php /* UNTUK wysihtml MASIH GAGAL*/ ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset("assets/admin/js/bootstrap-wysihtml5/bootstrap-wysihtml5.css")); ?>" />

    <?php /* UNTUK AJAX */ ?>
    <script src="<?php echo e(asset("js/downloaded.ajax.jquery.min.js")); ?>"></script>


    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]>
    <script src="js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>

<body>
  <?php $__env->startSection('header'); ?>

<section id="container" >
<!--header start-->

<!--header end-->

<?php /* <?php echo $__env->make('admin.layout.menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> */ ?>



<header class="header fixed-top clearfix">
<!--logo start-->
<div class="brand">
    <a href="<?php echo e(URL::to('petugas')); ?>" class="logo">
        <img src="<?php echo e(asset("assets/admin/images/logo-disbudpar1.png")); ?>" >
    </a>
    <div class="sidebar-toggle-box">
        <div class="fa fa-bars"></div>
    </div>
</div>
<!--logo end-->

<div class="nav notify-row" id="top_menu">
    <!--  notification start -->
    <ul class="nav top-menu">
        <!-- settings start -->

        <!-- settings end -->
        <!-- inbox dropdown start-->

        <!-- inbox dropdown end -->
        <!-- notification dropdown start-->

        <!-- notification dropdown end -->
        <li>
            <div class="">
                <h5><b>Halaman Petugas</b></h5>
            </div>
        </li>
    </ul>
    <!--  notification end -->
</div>
<div class="top-nav clearfix">
    <!--search & user info start-->
    <ul class="nav pull-right top-menu">
        <li>
            <?php /* <input type="text" class="form-control search" placeholder=" Search"> */ ?>
        </li>
        <!-- user login dropdown start-->
        <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <img alt="" src="<?php echo e(asset("assets/images/users/userflat.png")); ?>">

                <span class="username"><?php echo e(Auth::user()->name); ?> </span>

                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu extended logout">

                <li><a href="<?php echo e(url('/logout')); ?>"><i class="fa fa-key"></i> Keluar</a></li>
            </ul>
        </li>
        <!-- user login dropdown end -->
        <li>
            <div class="toggle-right-box">
                <div class="fa fa-bars"></div>
            </div>
        </li>
    </ul>
    <!--search & user info end-->
</div>
</header>

<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->            <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
            <li>
                <a href="<?php echo e(URL::to('/petugas')); ?>" class="<?php echo e(Request::is('petugas') ? 'active' : ''); ?>">
                    <i class="fa fa-dashboard"></i>
                    <span>Petugas</span>
                </a>
            </li>
            <?php /* <li>
                <a href="<?php echo e(URL::to('/petugas/lokal/create')); ?>" class="<?php echo e(Request::is('petugas/lokal/create') ? 'active' : ''); ?>">
                    <i class="fa fa-users"></i>
                    <span>Wislok</span>
                </a>
            </li>
            <li>
                <a href="<?php echo e(URL::to('/petugas/mancanegara/create')); ?>" class="<?php echo e(Request::is('petugas/mancanegara/create') ? 'active' : ''); ?>">
                    <i class="fa fa-users"></i>
                    <span>Wisman</span>
                </a>
            </li> */ ?>
            <li>
                <a href="<?php echo e(URL::to('/petugas/wisatawan/create')); ?>" class="<?php echo e(Request::is('petugas/wisatawan/create') ? 'active' : ''); ?>">
                    <i class="fa fa-users"></i>
                    <span>Tambah Wisatawan</span>
                </a>
            </li>
            <li class="sub-menu">
                <a href="javascript:;" class="<?php echo e(Request::is('petugas/objek','petugas/objek/create') ? 'active' : ''); ?>">
                    <i class="fa fa-globe"></i>
                    <span>Objek Wisata</span>
                </a>
                <ul class="sub">
                    <li class="<?php echo e(Request::is('petugas/objek') ? 'active' : ''); ?>"><a href="<?php echo e(URL::to('petugas/objek')); ?>">Lihat Objek Wisata</a></li>
                    <li class="<?php echo e(Request::is('petugas/objek/create') ? 'active' : ''); ?>"><a href="<?php echo e(URL::to('petugas/objek/create')); ?>">Tambah Objek Wisata</a></li>
                </ul>
            </li>

            <li>
                <a href="<?php echo e(URL::to('/')); ?>" target="_blank">
                    <i class="fa fa-bullhorn"></i>
                    <span>Front Web</span>
                </a>
            </li>

        </ul></div>
<!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->










    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
        <!-- page start-->

        <section class="panel">

        <header class="panel-heading">
          <?php echo $__env->yieldContent('title'); ?>
          <span class="tools pull-right">
            <a href="javascript:;" class="fa fa-chevron-down"></a>
          </span>
        </header>
          <div class="panel-body" style="">
            <section id="flip-scroll">
              <?php echo $__env->yieldSection(); ?>
              <?php echo $__env->yieldContent('conten'); ?>
            </section>
          </div>
        </section>

        </section>
        <!-- page end-->
        <?php /* </section> */ ?>
    </section>












    <!--main content end-->

<?php echo $__env->make('admin.layout.rightside', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

</section>

<!-- Placed js at the end of the document so the pages load faster -->

<!--Core js-->

<!--Core js-->
<script src="<?php echo e(asset ('assets/admin/js/jquery.js')); ?>"></script>
<script src="<?php echo e(asset ('assets/admin/js/jquery-1.8.3.min.js')); ?>"></script>
<script src="<?php echo e(asset ('assets/admin/bs3/js/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(asset ('assets/admin/js/jquery-ui-1.9.2.custom.min.js')); ?>"></script>
<script class="include" type="text/javascript" src="<?php echo e(asset ('assets/admin/js/jquery.dcjqaccordion.2.7.js')); ?>"></script>
<script src="<?php echo e(asset ('assets/admin/js/jquery.scrollTo.min.js')); ?>"></script>
<script src="<?php echo e(asset ('assets/admin/js/easypiechart/jquery.easypiechart.js')); ?>"></script>
<script src="<?php echo e(asset ('assets/admin/js/jQuery-slimScroll-1.3.0/jquery.slimscroll.js')); ?>"></script>
<script src="<?php echo e(asset ('assets/admin/js/jquery.nicescroll.js')); ?>"></script>
<script src="<?php echo e(asset ('assets/admin/js/jquery.nicescroll.js')); ?>"></script>

<script src="<?php echo e(asset ('assets/admin/js/bootstrap-switch.js')); ?>"></script>




<!--dynamic table-->
<script type="text/javascript" language="javascript" src="<?php echo e(asset("assets/admin/js/advanced-datatable/js/jquery.dataTables.js")); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset("assets/admin/js/data-tables/DT_bootstrap.js")); ?>"></script>
<!--common script init for all pages-->
<script src="<?php echo e(asset("assets/admin/js/scripts.js")); ?>"></script>

<script src="<?php echo e(asset ('assets/admin/js/toggle-init.js')); ?>"></script>
<script src="<?php echo e(asset ('assets/admin/js/advanced-form.js')); ?>"></script>

<!--dynamic table initialization -->
<script src="<?php echo e(asset("assets/admin/js/dynamic_table_init.js")); ?>"></script>

<script src="<?php echo e(asset("assets/admin/js/ckeditor/ckeditor.js")); ?>"></script>

<script src="<?php echo e(asset("assets/admin/js/ckeditor/ckeditor.js")); ?>"></script>

<?php /*<script src="//cdn.ckeditor.com/4.5.11/full/ckeditor.js"></script>*/ ?>


<?php /*this page script validasi dari bucket admin*/ ?>
  <script type="text/javascript" src="<?php echo e(asset("assets/admin/js/jquery.validate.min.js")); ?>"></script>
  <script src="<?php echo e(asset("assets/admin/js/validation-init.js")); ?>"></script>
<?php /*this page script validasi dari bucket admin*/ ?>


<?php /* untuk editor wysihtml GAGAL*/ ?>
<script type="text/javascript" src="<?php echo e(asset("assets/admin/js/bootstrap-wysihtml5/wysihtml5-0.3.0.js")); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset("assets/admin/js/bootstrap-wysihtml5/bootstrap-wysihtml5.js")); ?>"></script>
<?php /* untuk editor wysihtml */ ?>


<?php /* Untuk SPINNER GAGAL*/ ?>
<script type="text/javascript" src="<?php echo e(asset("assets/admin/js/fuelux/js/spinner.min.js")); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset("assets/admin/js/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js")); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset("assets/admin/js/bootstrap-colorpicker/js/bootstrap-colorpicker.js")); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset("assets/admin/js/bootstrap-timepicker/js/bootstrap-timepicker.js")); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset("assets/admin/js/jquery-multi-select/js/jquery.multi-select.js")); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset("assets/admin/js/jquery-multi-select/js/jquery.quicksearch.js")); ?>"></script>
<?php /* Untuk SPINNER */ ?>


</body>
</html>
