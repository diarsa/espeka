<?php $__env->startSection('title', "Not Found"); ?>

<?php /*
<?php $__env->startSection('header'); ?>
  @parent  */ ?>

        <section class="page_head">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <?php /* <div class="page_title">
                            <h2>404</h2>
                        </div>
                        <nav id="breadcrumbs">
                            <ul>
                                <li><a href="<?php echo e(URL('dashboard')); ?>">Home</a>/</li>
                                <li>404</li>
                            </ul>
                        </nav> */ ?>
                    </div>
                </div>
            </div>
        </section>

    <section class="content not_found">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-lg-12 col-md-12">
            <div class="page_404">
              <h1>404</h1>
              <p>Sorry, Page you're looking for is not found</p>
              <a onclick="history.go(-1)" class="btn btn-default btn-lg">
                <i class="fa fa-arrow-circle-o-left"></i>
                Go back
              </a>
              <a href="<?php echo e(URL('/')); ?>" class="btn btn-default btn-lg">
                <i class="fa fa-home"></i>
                Home
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>

<?php /* <?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
<?php $__env->stopSection(); ?> */ ?>

<?php echo $__env->make('layout.masterbrb', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>