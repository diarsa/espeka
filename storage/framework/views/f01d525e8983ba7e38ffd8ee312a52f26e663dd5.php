<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="ThemeBucket">

    <title><?php echo $__env->yieldContent('title'); ?> - Dinas Kebudayaan dan Pariwisata Kabupaten Bangli </title>
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



    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]>
    <script src="js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

<?php echo $__env->make('admin.layout.totop', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

</head>

<body>
  <?php $__env->startSection('header'); ?>

<section id="container" >
<!--header start-->

<!--header end-->


<?php /* Manggil Button Back To TOP */ ?>
<?php /* <a href="javascript:void(0);" id="scroll" title="Scroll to Top" style="display: none;">Top<span></span></a> */ ?>
<?php /* Manggil Button Back To TOP */ ?>


<?php echo $__env->make('admin.layout.menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


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
        </section>
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



</body>
</html>
