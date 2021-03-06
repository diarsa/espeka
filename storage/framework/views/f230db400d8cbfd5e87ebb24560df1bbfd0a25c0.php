<?php echo e(Session::get('message')); ?>




<?php $__env->startSection('title', 'Attractions'); ?>

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
                          <li>Attraction</li>
                      </ul>
                  </nav>
              </div>
          </div>
      </div>
  </section>

<?php /*
<div class="dividerHeading text-center">
  <h4><span>Lists Destination</span></h4>
</div>
<hr>
*/ ?>

<div class="">
  <br>
</div>

<div class="" align="center">
  <h3>
  <?php foreach($objekcats as $objekcat): ?>
    [ <a href="<?php echo e(URL ('/kategoriobjek', $objekcat->id)); ?>"><b><?php echo e($objekcat->nama_kat); ?></b></a> ]
  <?php endforeach; ?>
</h3>
</div>

<div class="">
  <br>
</div>

      <div class="isotope col-lg-12">

        <ul id="list" class="portfolio_list clearfix">
            <!--begin List Item -->
            <?php foreach($objeks as $objek): ?>
            <li class="list_item col-lg-4 col-md-6 col-sm-6 <?php echo e($objek->kategori); ?>">
                <div class="recent-item box">
                    <figure class="touching ">
                      <img src="<?php echo e(asset ("assets/images/img1/$objek->img1")); ?>" onerror="this.src='<?php echo e(asset ("assets/images/error/900x500.png")); ?>'"/>
                        <a href="<?php echo e(url('/objek', $objek->slug)); ?>" class="">
                          <div class="option inner">
                            <div>

                                <h5><?php echo e($objek->nama_objek); ?></h5>
                                
                                <?php /* <a href="<?php echo e(asset ("assets/images/img1/$objek->img1")); ?>" class="fa fa-search mfp-image"></a>
                                <a href="<?php echo e(url('/objek', $objek->slug)); ?>" class="fa fa-link"></a> */ ?>
                            </div>
                          </div> 
                        </a>
                    </figure>
                    <?php /* <div class="" align="center">
                      <b> <?php echo e($objek->nama_objek); ?> </b>
                    </div> */ ?>

                </div>

                <br>
                <div align="center">
                  <?php /* <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>"> */ ?>
                  <button class="btn btn-info" name="button" title="Detail" method="get" data-toggle="modal" data-target="#lihat<?php echo e($objek->slug); ?>" onclick="javascript: <?php echo e(url('/objek/'.$objek->slug)); ?>"> <i class="fa fa-info-circle fa-lg"></i> </button>

                  <button class="btn btn-info mfp-image" name="button" title="<?php echo e($objek->nama_objek); ?>" href="<?php echo e(asset ("assets/images/img1/$objek->img1")); ?>") }}"> <i class="fa fa-picture-o fa-lg"></i> </button>

                  <a href="<?php echo e(url('/objek/'.$objek->slug)); ?>">
                    <button class="btn btn-info" name="button" title="Link" > <i class="fa fa-link fa-lg"></i> </button>
                  </a>
                </div>
                <hr>
                
            </li>
            <?php endforeach; ?>
            <!--end List Item -->
        </ul> <!--end portfolio_list -->

        <div class="" align="center">
          <?php echo $objeks->links(); ?>

        </div>
      </div>



<?php foreach($objeks as $objek): ?>

<?php /* MODAL NE */ ?>

    <div class="modal fade" id="lihat<?php echo e($objek->slug); ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="exampleModalLabel">Detail Attraction</h4>
          </div>
          <div class="modal-body">

            <img src="<?php echo e(asset ("assets/images/img1/$objek->img1")); ?>" onerror="this.src='<?php echo e(asset ("assets/images/error/900x500.png")); ?>'" width="" height="140"/>

              <?php /* <?php echo e($objek->lat); ?> */ ?>
            <div id="map-canvas<?php echo e($objek->id); ?>">

            </div>

            <h2> <?php echo $__env->make('laravelLikeComment::like', ['like_item_id' => $objek->id], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> </h2>
              <?php if(Auth::guest()): ?>
                <i>Please <a href="<?php echo e(url('login')); ?>">Login</a> for like or unlike this attraction</i> <hr>
              <?php else: ?>
                
              <?php endif; ?>

            <?php /* <div class="col-lg-3">
              Name
            </div>
            <div class="col-lg-9">
              <?php echo e($objek->nama_objek); ?>

            </div> */ ?>

              <table class="">
                <tbody>
                  <tr>
                    <td><b>Name</b></td>
                    <td> : </td>
                    <td> <?php echo e($objek->nama_objek); ?> </td>
                  </tr>
                  <tr>
                    <td><b>Address</b></td>
                    <td> : </td>
                    <td> <?php echo e($objek->alamat); ?> </td>
                  </tr>
                  <tr>
                    <td><b>Description</b></td>
                    <td> : </td>
                    <td>  </td>
                  </tr>
                </tbody>
              </table>
              
              <div style="text-align:justify">
                <?php echo substr($objek->keterangan,0,400).""; ?> <a href="<?php echo e(url('/objek', $objek->slug)); ?>">read more.</a>
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





<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.master2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>