<?php $__env->startSection('title', 'Hasil '); ?>

<?php $__env->startSection('conten'); ?>
@parent

<div class="">
    <ul class="breadcrumbs-alt">
        <li>
            <a href="<?php echo e(URL('petugas')); ?>">Beranda</a>
        </li>
        <li>
            <a href="<?php echo e(URL('petugas/wisatawan')); ?>">Wisatawan</a>
        </li>
        <li>
            <a href="" class="current">Tambah</a>
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

<div class=" col-lg-12">

    <div class="col-md-12">
        <div class="alert alert-success fade in">
            <button data-dismiss="alert" class="close close-sm" type="button">
                <i class="fa fa-times">
                </i>
            </button>
            <strong>
                Success!
            </strong>
            Data berhasil ditambahkan.
        </div>

            <?php /* <blockquote class="default">
          Please click <b>Like</b> or <b>Unlike</b> button if you Like or Unlike the result of recommendation.
        </blockquote> */ ?>

      </div>
   
       
      <div class="col-md-12" align="center">
        <h4>
     

            <?php $nilai = 0; ?>

            <?php if(isset($temps[0]->hasil)): ?>
            <?php $nilai = number_format(($temps[0]->nilai) * 100, 2); ?>
            Berdasarkan karakteristik yang dimasukkan, <b> <?php echo e($nilai); ?>% </b> wisatawan dapat direkomendasikan ke objek wisata berikut ini.
            <?php else: ?> 
            Berdasarkan perhitungan sistem, tidak ada rekomendasi untuk karakteristik yang Anda masukkan, itu mungkin karena Anda hanya memasukkan satu karakteristik atau karakteristik tersebut belum ada dalam basis data. Tapi Anda dapat merekomendasikan wisatawan untuk berkunjung ke objek wisata berikut ini.
            <?php endif; ?>
        </h4>
        <hr>
    </div>

    <div class="col-lg-12">
        <?php foreach($robjeks as $rItem): ?>
        <?php foreach($rItem as $robjek): ?>
        <div class="col-md-4">
            <img src="<?php echo e(asset ("assets/images/img1/$robjek->img1")); ?>" width="100%" onerror="this.src='<?php echo e(asset ("assets/images/error/900x500.png")); ?>'"/>

            <div align="center">

                <div class="" align="center">
                    <h4>
                        <a href="<?php echo e(url('/objek', $robjek->slug)); ?>">
                            <b> <?php echo e($robjek->nama_objek); ?> </b>
                        </a>
                    </h4>
                </div>

                <div class="">
                    <button class="btn btn-info" name="button" title="Detail" method="get" data-toggle="modal" data-target="#lihat<?php echo e($robjek->slug); ?>" onclick="javascript: <?php echo e(url('/objek/'.$robjek->slug)); ?>"> <i class="fa fa-info-circle fa-lg"></i> </button>

                    <?php /* <button class="btn btn-info mfp-image" name="button" title="<?php echo e($robjek->nama_objek); ?>" href="<?php echo e(asset ("assets/images/img1/$robjek->img1")); ?>") }}"> <i class="fa fa-picture-o fa-lg"></i> </button> */ ?>

                    <?php /* <h2> <?php echo $__env->make('laravelLikeComment::like', ['like_item_id' => $robjek->id], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> </h2>  */ ?>

                </div>
                <hr>
            </div>
        </div>
        <?php endforeach; ?>
        <?php endforeach; ?>

    </div>



</div>


<?php foreach($robjeks as $rItem): ?>
<?php foreach($rItem as $robjek): ?>

<?php /* MODAL NE */ ?>

<div class="modal fade" id="lihat<?php echo e($robjek->slug); ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">Detail Attraction</h4>
            </div>
            <div class="modal-body">

                <img src="<?php echo e(asset ("assets/images/img1/$robjek->img1")); ?>" onerror="this.src='<?php echo e(asset ("assets/images/error/900x500.png")); ?>'" width="" height="140"/>


                <table class="">
                    <tbody>
                        <tr>
                            <td><b>Name</b></td>
                            <td> : </td>
                            <td> <?php echo e($robjek->nama_objek); ?> </td>
                        </tr>
                        <tr>
                            <td><b>Address</b></td>
                            <td> : </td>
                            <td> <?php echo e($robjek->alamat); ?> </td>
                        </tr>
                        <tr>
                            <td><b>Description</b></td>
                            <td> : </td>
                            <td>  </td>
                        </tr>
                    </tbody>
                </table>

                <div style="text-align:justify">
                    <?php echo substr($robjek->keterangan,0,400).""; ?> <a href="<?php echo e(url('/objek', $robjek->slug)); ?>">read more.</a>
                </div>
            </div>
            <div class="modal-footer">
                <form class="" action="" method="post">
                    <button class="btn btn-default" data-dismiss="modal"> Close </button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php /* MODAL NE */ ?>

<?php endforeach; ?>
<?php endforeach; ?>



<?php /* OBJEK LAIN */ ?>
<div class="col-lg-12">

    <h4>
        <?php if($nilai != 0): ?>
        Atau Anda juga dapat merekomendasikan wisatawan untuk berkunjung ke objek wisata berikut ini.
        <?php else: ?> 

        <?php endif; ?>

    </h4>

    <hr>
    <?php foreach($obj_lain as $lain): ?>
    <div class="col-md-4">
        <img src="<?php echo e(asset ("assets/images/img1/$lain->img1")); ?>" width="100%" onerror="this.src='<?php echo e(asset ("assets/images/error/900x500.png")); ?>'"/>

        <div align="center">

            <div class="" align="center">
                <h4>
                    <a href="<?php echo e(url('/objek', $lain->slug)); ?>">
                        <b> <?php echo e($lain->nama_objek); ?> </b>
                    </a>
                </h4>
            </div>

            <div class="">
                <button class="btn btn-info" name="button" title="Detail" method="get" data-toggle="modal" data-target="#lihat<?php echo e($lain->slug); ?>" onclick="javascript: <?php echo e(url('/objek/'.$lain->slug)); ?>"> <i class="fa fa-info-circle fa-lg"></i> </button>

            </div>
            <hr>
        </div>
    </div>



    <?php /* MODAL NE */ ?>

    <div class="modal fade" id="lihat<?php echo e($lain->slug); ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel">Detail Attraction</h4>
                </div>
                <div class="modal-body">

                    <img src="<?php echo e(asset ("assets/images/img1/$lain->img1")); ?>" onerror="this.src='<?php echo e(asset ("assets/images/error/900x500.png")); ?>'" width="" height="140"/>


                    <table class="">
                        <tbody>
                            <tr>
                                <td><b>Name</b></td>
                                <td> : </td>
                                <td> <?php echo e($lain->nama_objek); ?> </td>
                            </tr>
                            <tr>
                                <td><b>Address</b></td>
                                <td> : </td>
                                <td> <?php echo e($lain->alamat); ?> </td>
                            </tr>
                            <tr>
                                <td><b>Description</b></td>
                                <td> : </td>
                                <td>  </td>
                            </tr>
                        </tbody>
                    </table>

                    <div style="text-align:justify">
                        <?php echo substr($lain->keterangan,0,400).""; ?> <a href="<?php echo e(url('/objek', $lain->slug)); ?>">read more.</a>
                    </div>
                </div>
                <div class="modal-footer">
                    <form class="" action="" method="post">
                        <button class="btn btn-default" data-dismiss="modal"> Close </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php /* MODAL NE */ ?>

    <?php endforeach; ?>

</div>










<?php $__env->stopSection(); ?>

<?php echo $__env->make('petugas.lay', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>