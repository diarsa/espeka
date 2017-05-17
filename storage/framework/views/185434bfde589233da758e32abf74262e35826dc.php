<?php $__env->startSection('title', 'Export Data Wisatawan'); ?>

<?php $__env->startSection('header'); ?>
  @parent

  <div class="">
    <ul class="breadcrumbs-alt">
        <li>
            <a href="<?php echo e(URL('admin/dashboard')); ?>">Beranda</a>
        </li>
        <li>
            <a href="<?php echo e(URL('admin/wisatawan')); ?>">Wisatawan</a>
        </li>
        <li>
            <a href="" class="current">Download</a>
        </li>
    </ul>
  </div>




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
  Silakan download atau unduh data wisatawan per tahun sesuai dengan kategorinya.
</div>

<div class="form-group col-md-12">
  <?php echo Form::open(['url' => route('wisatawan.export.postlokal'), 'method' => 'post', 'class'=>'form-horizontal']); ?>

    <div class="form-group">
      <div class="col-md-5 well">
      <b>Wisatawan Lokal</b>
        <select name="tahun" class="form-control" required="required">
          <option value="">Pilih Tahun</option>
          <?php for($i=$tahun1; $i<=$tahunnow; $i++): ?>
            <option value="<?php echo e($i); ?>"><?php echo e($i); ?></option>
          <?php endfor; ?>
        </select> <br>

        <button type="submit" class="btn btn-primary"> 
          <i class="fa fa-cloud-download fa-lg"></i> 
          Download Wisatawan Lokal
        </button>
      </div>
    </div>
  <?php echo Form::close(); ?>




  <?php echo Form::open(['url' => route('wisatawan.export.post'), 'method' => 'post', 'class'=>'form-horizontal']); ?>

    <div class="form-group">
      <div class="col-md-5 well">
      <b>Wisatawan Mancanegara</b>
        <select name="tahun" class="form-control" required="required">
          <option value="">Pilih Tahun</option>
          <?php for($i=$tahun1; $i<=$tahunnow; $i++): ?>
            <option value="<?php echo e($i); ?>"><?php echo e($i); ?></option>
          <?php endfor; ?>
        </select> <br>

        <button type="submit" class="btn btn-primary"> 
          <i class="fa fa-cloud-download fa-lg"></i> 
          Download Wisatawan Mancanegara
        </button>
      </div>
    </div>
  <?php echo Form::close(); ?>


</div>







<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>