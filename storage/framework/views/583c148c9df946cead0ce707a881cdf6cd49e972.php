<?php $__env->startSection('title', 'Edit Pengguna'); ?>

<?php $__env->startSection('header'); ?>
  @parent

<div class="">
  <ul class="breadcrumbs-alt">
      <li>
          <a href="<?php echo e(URL('admin/dashboard')); ?>">Beranda</a>
      </li>
      <li>
          <a href="<?php echo e(URL('admin/users')); ?>">User</a>
      </li>
      <li>
          <a href="#" class="current">Edit</a>
      </li>
  </ul>
</div>

<div class="alert alert-info fade in">
  <i class="fa fa-info-circle "></i> 
  Silakan isi data sesuai dengan kolom yang tersedia. Tanda * berarti data harus diisi. 
</div>

<div class="position-left">
    <form class="form-horizontal" id="signupForm" role="form" action="../../users/<?php echo e($user->id); ?>" method="post" enctype="multipart/form-data">
    <div class="form-group <?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
        <label for="name" class="col-lg-2 control-label">Nama Depan</label>
        <div class="col-lg-10">
            <input class="form-control" type="text" name="name" value="<?php echo e($user->name); ?>" placeholder="Nama ..." required="required" disabled="">
            <?php if($errors->has('name')): ?>
                <p class="help-block">
                    <strong><?php echo e($errors->first('name')); ?></strong>
                </p>
            <?php endif; ?>
        </div>
    </div>

    <div class="form-group <?php echo e($errors->has('lastname') ? ' has-error' : ''); ?>">
        <label for="lastname" class="col-lg-2 control-label">Nama Belakang</label>
        <div class="col-lg-10">
            <input class="form-control" type="text" name="lastname" value="<?php echo e($user->lastname); ?>" placeholder="" required="required" disabled="">
            <?php if($errors->has('lastname')): ?>
                <p class="help-block">
                    <strong><?php echo e($errors->first('lastname')); ?></strong>
                </p>
            <?php endif; ?>
        </div>
    </div>

    <div class="form-group <?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
        <label for="email" class="col-lg-2 control-label">Email</label>
        <div class="col-lg-10">
            <input class="form-control" type="text" name="email" value="<?php echo e($user->email); ?>" placeholder="" required="required" disabled="">
            <?php if($errors->has('email')): ?>
                <p class="help-block">
                    <strong><?php echo e($errors->first('email')); ?></strong>
                </p>
            <?php endif; ?>
        </div>
    </div>

    <div class="form-group<?php echo e($errors->has('role') ? ' has-error' : ''); ?>">
        <label for="role" class="col-lg-2 control-label">Status</label>
        <div class="col-lg-10">
          <select class="form-control" name="role" required="required" value="<?php echo e($user->role); ?>">
                <option value="admin" <?php if($user->role=="admin"): ?> selected="selected" <?php endif; ?>> Admin </option>
                <option value="petugas" <?php if($user->role=="petugas"): ?> selected="selected" <?php endif; ?>> Petugas </option>
                <option value="wisatawan" <?php if($user->role=="wisatawan"): ?> selected="selected" <?php endif; ?>> Wisatawan </option>
          </select>
            <?php if($errors->has('role')): ?>
                <p class="help-block">
                    <strong><?php echo e($errors->first('role')); ?></strong>
                </p>
            <?php endif; ?>
        </div>
    </div>

    <div class="form-group">
        <div class="col-lg-offset-2 col-lg-10">
          <input type="hidden" name="_method" value="put">
          <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
          <input type="submit" class="btn btn-warning" value="Ubah">
        </div>
    </div>
  </form>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>