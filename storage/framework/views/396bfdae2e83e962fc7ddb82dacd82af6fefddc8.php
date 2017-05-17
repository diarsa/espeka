<?php $__env->startSection('title', 'Detail Pengguna'); ?>

<?php $__env->startSection('header'); ?>
  @parent

  <div class="">
      <ul class="breadcrumbs-alt">
          <li>
              <a href="<?php echo e(URL('/admin')); ?>">Beranda</a>
          </li>
          <li>
              <a href="<?php echo e(URL('admin/users')); ?>">Users</a>
          </li>
          <li>
              <a href="#" class="current">Detail</a>
          </li>
      </ul>
  </div>

  <h4><b>
    <?php echo e($user->name); ?> <?php echo e($user->lastname); ?>

  </b></h4>
  Dibuat tanggal <?php echo e(date('d F Y' , strtotime($user->created_at) )); ?>

  <br><br>

<div class="col-lg-2">
  <img src="<?php echo e(asset("assets/images/users/$user->img")); ?>" onerror="this.src='<?php echo e(asset ("assets/images/users/green.jpg")); ?>'" alt="" width="100%"/>
</div>

<div class="col-lg-8">
<div class="position-left">
  <form class="form-horizontal">
    <div class="form-group">
        <label for="" class="col-lg-4 control-label">Nama Depan</label>
        <div class="col-lg-8">
          <input class="form-control" type="text" name="" id="disabledInput" value="" placeholder="<?php echo e($user->name); ?>" disabled>
        </div>
    </div>
    <div class="form-group">
        <label for="" class="col-lg-4 control-label">Nama Belakang</label>
        <div class="col-lg-8">
          <input class="form-control" type="text" name="" id="disabledInput" value="" placeholder="<?php echo e($user->lastname); ?>" disabled>
        </div>
    </div>
    <div class="form-group">
        <label for="" class="col-lg-4 control-label">Email</label>
        <div class="col-lg-8">
          <input class="form-control" type="text" name="" id="disabledInput" value="" placeholder="<?php echo e($user->email); ?>" disabled>
        </div>
    </div>
    <div class="form-group">
        <label for="" class="col-lg-4 control-label">Status</label>
        <div class="col-lg-8">
            <input class="form-control" type="text" name="" id="disabledInput" value="" placeholder="<?php echo e($user->role); ?>" disabled>
        </div>
    </div>
  </form>
</div>
</div>



<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>