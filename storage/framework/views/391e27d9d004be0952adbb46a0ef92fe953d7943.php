<?php $__env->startSection('title', 'Lihat Detail Objek Wisata'); ?>

<?php $__env->startSection('conten'); ?>
  @parent

    <div class="">
      <ul class="breadcrumbs-alt">
          <li>
              <a href="<?php echo e(URL('petugas')); ?>">Beranda</a>
          </li>
          <li>
              <a href="<?php echo e(URL('petugas/objek')); ?>">Objek Wisata</a>
          </li>
          <li>
              <a href="" class="current">Lihat</a>
          </li>
      </ul>
    </div>

<?php echo $__env->make('admin.layout.googlemap', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


  <h4><b>
    <?php echo e($objek->nama_objek); ?>

  </b></h4>
  <?php echo e(date('d F Y' , strtotime($objek->created_at) )); ?>

  <br><br>

<div class="well col-lg-12">
      <p>
        Alamat : <?php echo e($objek->alamat); ?>

      </p>
      <p>
        Keterangan : <?php echo $objek->keterangan; ?>

      </p>
      <p>
        Status : <?php echo e($objek->status); ?>

      </p>
      <p>
        Dikunjungi : <?php echo e($objek->hits); ?> orang
      </p>
      <div class="col-md-4">
        <img src="<?php echo e(asset("assets/images/img1/$objek->img1")); ?>" onerror="this.src='<?php echo e(asset ("assets/images/img1/900x500.png")); ?>'" alt="" width="300px" height="170px" />
      </div>
      <div class="col-md-4">
        <img src="<?php echo e(asset("assets/images/img2/$objek->img2")); ?>" onerror="this.src='<?php echo e(asset ("assets/images/img1/900x500.png")); ?>'" alt="" width="300px" height="170px" />
      </div>
      <div class="col-md-4">
        <img src="<?php echo e(asset("assets/images/img3/$objek->img3")); ?>" onerror="this.src='<?php echo e(asset ("assets/images/img1/900x500.png")); ?>'" alt="" width="300px" height="170px" />
      </div>
      
</div>



<?php $__env->stopSection(); ?>


<?php echo $__env->make('petugas.lay', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>