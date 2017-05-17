<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie ie8" class="no-js" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html class="no-js" lang="en"> <!--<![endif]-->

<body class="home">

<?php /* Gooele Analytic */ ?>
<?php /* <?php echo $__env->make('layout.analytics', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> */ ?>
<?php /* Gooele Analytic */ ?>

		<?php echo $__env->make('layout.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		<?php $__env->startSection('header'); ?>
    <!--End Header-->

	<!--start wrapper-->
    <section class="wrapper">

				<div class="">
					<br>
				</div>

				<?php /*	<div class="container wow fadeInUp"> */ ?>
					<div class="container ">
						<?php echo $__env->yieldSection(); ?>
						<?php echo $__env->yieldContent('content'); ?>
					</div>

    </section>
		<br><br>
	<!--end wrapper-->

<?php echo $__env->make('layout.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
