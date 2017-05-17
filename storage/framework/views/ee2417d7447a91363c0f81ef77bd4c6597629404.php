<?php $__env->startSection('title', 'Buat Wisatawan'); ?>

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
            <a href="#" class="current">Buat</a>
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
  Silakan isi data sesuai dengan kolom yang tersedia. Tanda * berarti data harus diisi. 
</div>

<div class="position-left">
<form class="form-horizontal" id="signupForm" role="form" action="../wisatawan" method="post" align="" enctype="multipart/form-data">

  <div class="form-group <?php echo e($errors->has('nama') ? ' has-error' : ''); ?>">
      <label for="" class="col-lg-2 control-label">Nama Wisatawan</label>
      <div class="col-lg-10">
          <input class="form-control" type="text" name="nama" value="" placeholder="Masukkan nama wisatawan di sini" required="required">
          <?php if($errors->has('nama')): ?>
              <p class="help-block">
                  <strong><?php echo e($errors->first('nama')); ?></strong>
              </p>
          <?php endif; ?>
      </div>
  </div><hr>

  <div class="form-group<?php echo e($errors->has('negara') ? ' has-error' : ''); ?>">
      <label for="" class="col-lg-2 control-label">Negara</label>
      <div class="col-lg-10">
        <select id="e1" class="populate" style="width:100%" name="negara" required="required">
          <option value="">- Pilih Negara -</option>
          <?php foreach($negaras as $negara): ?>
            <option value="<?php echo e($negara->kode); ?>"> <?php echo e($negara -> nama_kriteria_sub); ?></option>
          <?php endforeach; ?>
        </select>
          <?php if($errors->has('negara')): ?>
              <p class="help-block">
                  <strong><?php echo e($errors->first('negara')); ?></strong>
              </p>
          <?php endif; ?>
      </div>
  </div><hr>

  <div class="form-group<?php echo e($errors->has('jk') ? ' has-error' : ''); ?>">
      <label for="" class="col-lg-2 control-label">Jenis Kelamin</label>
      <div class="col-lg-10">
        <select id="" class="form-control populate" style="" name="jk" required="required">
          <option value="">- Pilih Jenis Kelamin -</option>
          <?php foreach($jks as $jk): ?>
            <option value="<?php echo e($jk->kode); ?>"> <?php echo e($jk -> nama_kriteria_sub); ?></option>
          <?php endforeach; ?>
        </select>
          <?php if($errors->has('jk')): ?>
              <p class="help-block">
                  <strong><?php echo e($errors->first('jk')); ?></strong>
              </p>
          <?php endif; ?>
      </div>
  </div><hr>

  <div class="form-group<?php echo e($errors->has('tujuan') ? ' has-error' : ''); ?>">
      <label for="" class="col-lg-2 control-label">Tujuan</label>
      <div class="col-lg-10">
        <select id="" class="form-control populate" style="" name="tujuan" required="required">
          <option value="">- Pilih Tujuan -</option>
          <?php foreach($tujuans as $tujuan): ?>
            <option value="<?php echo e($tujuan->kode); ?>"> <?php echo e($tujuan -> nama_kriteria_sub); ?></option>
          <?php endforeach; ?>
        </select>
          <?php if($errors->has('tujuan')): ?>
              <p class="help-block">
                  <strong><?php echo e($errors->first('tujuan')); ?></strong>
              </p>
          <?php endif; ?>
      </div>
  </div><hr>

  <div class="form-group<?php echo e($errors->has('umur') ? ' has-error' : ''); ?>">
      <label for="" class="col-lg-2 control-label">Umur</label>
      <div class="col-lg-10">
        <select id="" class="form-control populate" style="" name="umur" required="required">
          <option value="">- Pilih Umur -</option>
          <?php for($i=1; $i <= 100; $i++): ?>
            <option value="<?php echo e($i); ?>"> <?php echo e($i); ?></option>
          <?php endfor; ?>
        </select>
          <?php if($errors->has('umur')): ?>
              <p class="help-block">
                  <strong><?php echo e($errors->first('umur')); ?></strong>
              </p>
          <?php endif; ?>
      </div>
  </div><hr>

  <div class="form-group<?php echo e($errors->has('kunjungan') ? ' has-error' : ''); ?>">
      <label for="" class="col-lg-2 control-label">Kunjungan</label>
      <div class="col-lg-10">
        <select id="" class="form-control populate" style="" name="kunjungan" required="required">
          <option value="">- Pilih Kunjungan ke -</option>
          <?php for($ik=1; $ik <= 50; $ik++): ?>
            <option value="<?php echo e($ik); ?>"> <?php echo e($ik); ?></option>
          <?php endfor; ?>
        </select>
          <?php if($errors->has('kunjungan')): ?>
              <p class="help-block">
                  <strong><?php echo e($errors->first('kunjungan')); ?></strong>
              </p>
          <?php endif; ?>
      </div>
  </div><hr>

  <div class="form-group<?php echo e($errors->has('objeks') ? ' has-error' : ''); ?>">
      <label for="" class="col-lg-2 control-label">Objek Wisata</label>
      <div class="col-lg-10" >

        <select class="multi-select" multiple="" id="my_multi_select3" name="objeks[]" required="required">

          <?php foreach($objeksss as $objeks): ?>
            <option value="<?php echo e($objeks->id); ?>"> <?php echo e($objeks -> nama_objek); ?></option>
          <?php endforeach; ?>
        </select>
        <?php /*}}
        <select multiple name="objeks" id="e9" style="width:300px" class="populate" placeholder="Ketik nama objek wisata di sini ...">
            <optgroup label="Pilih Objek Wisata">
              <?php foreach($objekss as $objeks): ?>
                <option value="<?php echo e($objeks->id); ?>"><?php echo e($objeks->nama_objek); ?></option>
              <?php endforeach; ?>
            </optgroup>
        </select>
          <?php if($errors->has('objeks')): ?>
              <p class="help-block">
                  <strong><?php echo e($errors->first('objeks')); ?></strong>
              </p>
          <?php endif; ?>
        */ ?>
      </div>
  </div><hr>

  <div class="form-group">
      <div class="col-lg-offset-2 col-lg-10">
        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
        <button type="submit" class="btn btn-primary"><i class="fa fa-lg fa-check-square-o"></i> Proses</button>
      </div>
  </div>


</form>
</div>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.master2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>