<?php $__env->startSection('title', 'Create Recommendation'); ?>

<?php $__env->startSection('header'); ?>
  @parent

<section class="page_head">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="page_title">
                    <h2><?php echo $__env->yieldContent('title'); ?></h2>
                </div>
                <nav id="breadcrumbs">
                    <ul>
                        <li><a href="<?php echo e(URL('dashboard')); ?>">Home</a>/</li>
                        <li>Tourist</li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</section>

<hr>

<?php /* <div class="col-md-6">
  <div class="dividerHeading">
      <h4><span>Keterangan</span></h4>
  </div>
  <blockquote class="default">Silakan masuk atau login dahulu untuk dapat mengetahui rekomendasi objek wisata.</blockquote>
  <blockquote class="default">Jika belum mempunyai akun, silakan untuk mendaftar dahulu melalui halaman <a href="<?php echo e(url('register')); ?>" class="">Daftar</a> </blockquote>
  <blockquote class="default">Satu akun dapat menyimpan banyak rekomendasi objek wisata. </blockquote>
</div> */ ?>

<div class="col-md-6 column">

<?php /* <form class="col-md-12 column" id="signupForm" action="<?php echo e(URL('/wisatawan')); ?>" method="post" align="">
  <label for="nama"> Name </label>
  <div class="form-group<?php echo e($errors->has('nama') ? ' has-error' : ''); ?>">
    <input class="form-control" type="text" name="nama" value="" placeholder="Place name in here ..." id="nama" value="<?php echo e(old('nama')); ?>">
    <?php if($errors->has('nama')): ?>
        <p class="help-block">
            <strong><?php echo e($errors->first('nama')); ?></strong>
        </p>
    <?php endif; ?>
  </div><hr>

  <label for="negara"> Country </label> <br>
  <div class="form-group<?php echo e($errors->has('negara') ? ' has-error' : ''); ?>">
    <select id="e2" class="populate" style="width:100%" name="negara" required="required">
      <option value="">- Choice Country -</option>
      <?php foreach($negaras as $negara): ?>
        <option value="<?php echo e($negara->nama_kriteria_sub); ?>"> <?php echo e($negara -> nama_kriteria_sub); ?></option>
      <?php endforeach; ?>
    </select>
    <?php if($errors->has('negara')): ?>
        <p class="help-block">
            <strong><?php echo e($errors->first('negara')); ?></strong>
        </p>
    <?php endif; ?>
  </div><hr>

  <label for="jk"> Sex </label> <br>
  <div class="form-group<?php echo e($errors->has('jk') ? ' has-error' : ''); ?>">
    <input type="radio" name="jk" value="Laki-laki" checked="checked"> Male <br>
    <input type="radio" name="jk" value="Perempuan"> Female <br>
    <?php if($errors->has('jk')): ?>
        <p class="help-block">
            <strong><?php echo e($errors->first('jk')); ?></strong>
        </p>
    <?php endif; ?>
  </div><hr>

  <label for="tujuan"> Tujuan </label> <br>
  <div class="form-group<?php echo e($errors->has('tujuan') ? ' has-error' : ''); ?>">
    <select id="e4" class="form-control populate" style="" name="tujuan" required="required">
      <option value="">- Choice Tujuan -</option>
      <?php foreach($tujuans as $tujuan): ?>
        <option value="<?php echo e($tujuan->nama_kriteria_sub); ?>"> <?php echo e($tujuan -> nama_kriteria_sub); ?></option>
      <?php endforeach; ?>
    </select>
    <?php if($errors->has('tujuan')): ?>
        <p class="help-block">
            <strong><?php echo e($errors->first('tujuan')); ?></strong>
        </p>
    <?php endif; ?>
  </div><hr>

  <label for="umur"> Age </label>
  <div class="form-group<?php echo e($errors->has('umur') ? ' has-error' : ''); ?>">
    <select id="e1" class="populate" style="width:100%" name="umur" required="required">
      <option value="">- Choice Age -</option>
      <?php for($i=1; $i <= 100; $i++): ?>
        <option value="<?php echo e($i); ?>"> <?php echo e($i); ?></option>
      <?php endfor; ?>
    </select>
    <?php if($errors->has('umur')): ?>
        <p class="help-block">
            <strong><?php echo e($errors->first('umur')); ?></strong>
        </p>
    <?php endif; ?>
  </div><hr>

  <label for="kunjungan"> Frecuency </label> <br>
  <div class="form-group<?php echo e($errors->has('kunjungan') ? ' has-error' : ''); ?>">
    <select id="e3" class="populate" style="width:100%" name="kunjungan" required="required">
      <option value="">- Choice Frecuency -</option>
      <?php for($ik=1; $ik <= 100; $ik++): ?>
        <option value="<?php echo e($ik); ?>"> <?php echo e($ik); ?></option>
      <?php endfor; ?>
    </select>
    <?php if($errors->has('kunjungan')): ?>
        <p class="help-block">
            <strong><?php echo e($errors->first('kunjungan')); ?></strong>
        </p>
    <?php endif; ?>
  </div><hr>





  <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
  <input type="submit" class="btn btn-primary" name="name" value="Proses">
</form> */ ?>

</div>


<div class="col-md-12">

</div>

<div class="col-md-12">
<form class="" id="" action="<?php echo e(URL('/wisatawan')); ?>" method="post">
  <blockquote class="default">
    Click <b>Next</b> for the next step. Or <b>Previous</b> for previous step. And click <b>Process</b> for know the result of recommend.
  </blockquote>
<div id="wizard" class="">
  <h2>First Step</h2>
  <section>
    <blockquote class="default">
      Please fill your full name to identify the recommendation or you can use anonymous name. <b>This field is required.</b> 
    </blockquote>
      <div class="form-group promo_box">
          <label class="col-lg-2 control-label">Full Name</label>
          <div class="col-lg-8">
              <input type="text" name="name" class="form-control" placeholder="Full Name" >
          </div>
      </div>
  </section>

  <h2>Second Step</h2>
  <section>
    <blockquote class="default">
      Select your country or region on the button select country. <b>This field is required.</b> 
    </blockquote>
      <div class="form-group promo_box">
          <label class="col-lg-2 control-label">Country</label>
          <div class="col-lg-8">
            <select id="" class="form-control" style="width:100%" name="country" >
              <option value="">- Select Country -</option>
              <?php foreach($negaras as $negara): ?>
                <option value="<?php echo e($negara->kode); ?>"> <?php echo e($negara -> nama_kriteria_sub); ?></option>
              <?php endforeach; ?>
            </select>
          </div>
      </div>
  </section>

  <h2>Third Step</h2>
  <section>
    <blockquote class="default">
      Select your gender on button select gender. <b>This field is required.</b>
    </blockquote>
      <div class="form-group promo_box">
          <label class="col-lg-2 control-label">Gendre</label>
          <div class="col-lg-8">
            <select id="" class="form-control" style="width:100%" name="gendre" >
              <option value="">- Select Gender -</option>
              <?php foreach($jks as $jk): ?>
                <option value="<?php echo e($jk->kode); ?>"> <?php echo e($jk -> nama_kriteria_sub); ?></option>
              <?php endforeach; ?>
            </select>
          </div>
      </div>
  </section>

  <h2>Fourth Step</h2>
  <section>
    <blockquote class="default">
      Select one of your porpuse visiting Bangli, Bali.
    </blockquote>
      <div class="form-group promo_box">
          <label class="col-lg-2 control-label">Purpose</label>
          <div class="col-lg-8">
            <select id="" class="form-control populate" style="" name="purpose">
              <option value="">- Select Purpose -</option>
              <?php foreach($tujuans as $tujuan): ?>
                <option value="<?php echo e($tujuan->kode); ?>"> <?php echo e($tujuan -> nama_kriteria_sub); ?></option>
              <?php endforeach; ?>
            </select>
          </div>
      </div>
  </section>

  <h2>Fifth Step</h2>
  <section>
    <blockquote class="default">
      Select how old you are. Example: "21 years old". So just select 21.
    </blockquote>
      <div class="form-group promo_box">
          <label class="col-lg-2 control-label">Age</label>
          <div class="col-lg-8">
            <select id="" class="form-control populate" style="" name="age" >
              <option value="">- Select Age -</option>
              <?php for($i=1; $i <= 100; $i++): ?>
                <option value="<?php echo e($i); ?>"> <?php echo e($i); ?></option>
              <?php endfor; ?>
            </select>
          </div>
      </div>
  </section>

  <h2>Sixth Step</h2>
  <section>
    <blockquote class="default">
      Select how many times you've been to Bangli, Bali. Example: "3 times". So just select 3.
    </blockquote>
      <div class="form-group promo_box">
          <label class="col-lg-2 control-label">Frequency</label>
          <div class="col-lg-8">
            <select id="" class="form-control populate" style="" name="frequency" >
              <option value="">- Select frequency visit -</option>
              <?php for($ik=1; $ik <= 50; $ik++): ?>
                <option value="<?php echo e($ik); ?>"> <?php echo e($ik); ?></option>
              <?php endfor; ?>
            </select>
          </div>
      </div>
  </section>

  <h2>Check data</h2>
  <section>
    <blockquote class="default">
      Ensure that all required data has been entered correctly. Buttons process will not work if there are still required data has not been filled in correctly. After that you can click button <b>Process</b> in final step for know the recommend.
    </blockquote>
  </section>

  <h2>Final Step</h2>
  <section>
      <div class="form-group promo_box">
          <div class="col-lg-12" align="right">
            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
            <button type="submit" class="btn btn-default"><i class="fa fa-lg fa-check-square-o"></i> Process</button>
          </div>
      </div>
  </section>

</div>



</form>
</div>
</div>











<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.master2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>