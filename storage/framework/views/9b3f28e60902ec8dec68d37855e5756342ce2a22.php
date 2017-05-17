<?php $__env->startSection('title', 'Pengaturan'); ?>

<?php $__env->startSection('header'); ?>
  @parent

    <div class="">
      <ul class="breadcrumbs-alt">
          <li>
              <a href="<?php echo e(URL('admin/dashboard')); ?>">Beranda</a>
          </li>
          <li>
              <a href="#" class="current">Pengaturan</a>
          </li>
      </ul>
    </div>

<br>
<?php if(Session::has('message')): ?>

  <div class="alert alert-success fade in">
    <button data-dismiss="alert" class="close close-sm" type="button">
      <i class="fa fa-times">
      </i>
    </button>
    <strong>
      <?php echo e(Session::get('message')); ?>

    </strong>
  </div>
<?php else: ?>

<?php endif; ?>

<div class="alert alert-info fade in">
  <i class="fa fa-info-circle "></i> 
  Silakan isi data sesuai dengan kolom yang tersedia. 
</div>

<div class="position-left">
  <form class="form-horizontal" id="signupForm" role="form" action="<?php echo e(URL('admin/settings')); ?>" method="post" enctype="multipart/form-data">
    <?php foreach($settings as $setting): ?>

    <div class="form-group">
        <label for="<?php echo e($setting->setting); ?>" class="col-lg-2 control-label"><?php echo e($setting->setting); ?></label>
        <div class="col-lg-10">


            <input class="form-control" type="text" name="nama<?php echo e($setting->id); ?>" value="<?php echo e($setting->nama); ?>" placeholder="Masukkan nama setting di sini" required="required">

            <input class="form-control" type="text" name="isi<?php echo e($setting->id); ?>" value="<?php echo e($setting->isi); ?>" placeholder="Masukkan isi setting di sini" required="required">

              <?php /* <textarea class="ckeditor form-control " name="isi<?php echo e($setting->id); ?>" rows="3" placeholder="Masukkan isi di sini" required="required">
              <?php echo e($setting->isi); ?>

              </textarea> */ ?>
        </div>
    </div>

    <?php endforeach; ?>

    <div class="form-group">
        <div class="col-lg-offset-2 col-lg-10">
          <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
          <button type="submit" class="btn btn-primary"><i class="fa fa-lg fa-check-square-o"></i> Proses</button>
        </div>
    </div>
</form>










<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>