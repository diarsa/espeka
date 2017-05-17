<?php $__env->startSection('title', 'Result '); ?>

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
                          <li><a href="<?php echo e(URL('objek')); ?>">Attractions</a>/</li>
                          <li>Result</li>
                      </ul>
                  </nav>
              </div>
          </div>
      </div>
  </section>


<div class="">
  <br>
</div>

<div class="" align="center">

</div>

<div class="">
  <br>
</div>

      <div class=" col-lg-12">

        <?php if(Session::has('message')): ?>

          <div class="alert alert-success fade in">
            <button data-dismiss="alert" class="close close-sm" type="button">
              <i class="fa fa-times">
              </i>
            </button>
            <strong>
              <?php echo e(Session::get('message')); ?>

            </strong>
            And this is the recommendations who match with your characteristic
          </div>
        <?php else: ?>

        <?php endif; ?>

      <div class="col-md-6">
          <div class="alert alert-success fade in">
            <button data-dismiss="alert" class="close close-sm" type="button">
              <i class="fa fa-times">
              </i>
            </button>
            <strong>
              Success!
            </strong>
            And this is the recommendations who match with your characteristic
          </div>

        <blockquote class="default">
          Please click <b>Like</b> or <b>Unlike</b> button if you Like or Unlike the result of recommendation.
        </blockquote>



      </div>

      <div class="col-md-6">
        <blockquote class="default">
        
        <div class="">
          
          <table class="table">
           
            <?php foreach($idne as $idn): ?>
              <tr>
                  <td>Name</td>
                  <td>:</td>
                  <td><?php echo e($idn->nama); ?> 
                    <?php /* || ID : <?php echo e($idn->id); ?> */ ?>
                  </td>
              </tr>
            <?php endforeach; ?>
            
            <?php foreach($wisat as $wi): ?>
              <tr>
                  <td>Country</td>
                  <td>:</td>
                  <td><?php echo e($wi->country); ?></td>
              </tr>
              
              <tr>
                  <td>Gender</td>
                  <td>:</td>
                  <td><?php echo e($wi->gender); ?></td>
              </tr>
              <tr>
                  <td>Purpose</td>
                  <td>:</td>
                  <td><?php echo e($wi->purpose); ?></td>
              </tr>
              <tr>
                  <td>Age</td>
                  <td>:</td>
                  <td><?php echo e($wi->umur); ?> years old</td>
              </tr>
              <tr>
                  <td>Frequency</td>
                  <td>:</td>
                  <td><?php echo e($wi->frekuensi); ?></td>
              </tr>
            <?php endforeach; ?>
            
          </table>
          
        </div>

        
        </blockquote>
      </div>
      

      
      <div class="col-md-12" align="center">
        <h3>
          <?php $nilai = 0; ?>

          <?php if(isset($temps[0]->hasil)): ?>
            <?php $nilai = number_format(($temps[0]->nilai)* 100, 2); ?>
            Based on the characteristics that your enter, we recommended <?php echo e($nilai); ?>% to visit this attractions.
          <?php else: ?> 
            There are no recommendation, because you are just input one characteristic or your data is not available in database. But you can chose this another attractions
          <?php endif; ?>
          <?php /* Based on the characteristics that your enter, we recommended <?php echo e($nilai); ?>% to visit this attractions. */ ?>
        </h3>
      <hr>
      </div>

      <div class="col-lg-12">

      <?php foreach($robjeks as $rItem): ?> 
        <div class="row">
          <?php foreach($rItem as $robjek): ?>
            <div class="col-md-4">
              <div class="recent-item box">
                      <figure class="touching ">
                          <img src="<?php echo e(asset ("assets/images/img1/$robjek->img1")); ?>" onerror="this.src='<?php echo e(asset ("assets/images/error/900x500.png")); ?>'"/>
                          <div class="option inner">
                            <div>
                            <?php /* <?php echo e($robjek->id); ?> */ ?>
                                <h5><?php echo e($robjek->nama_objek); ?></h5>
                                <?php /* <a href="<?php echo e(asset ("assets/images/img1/$robjek->img1")); ?>" class="fa fa-search mfp-image"></a> */ ?>
                                <a href="<?php echo e(url('/objek', $robjek->slug)); ?>" target="" class="fa fa-link"></a>
                                

                            </div>
                          </div>
                      </figure>
                      <?php /* <div class="" align="center">
                        <b> <?php echo e($robjek->nama_objek); ?> </b>
                      </div> */ ?>
                  </div>

                  
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

                    <button class="btn btn-info mfp-image" name="button" title="<?php echo e($robjek->nama_objek); ?>" href="<?php echo e(asset ("assets/images/img1/$robjek->img1")); ?>") }}"> <i class="fa fa-picture-o fa-lg"></i> </button>

                    <h2> <?php echo $__env->make('laravelLikeComment::like', ['like_item_id' => $robjek->id], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> </h2> 
                    
                    <?php /* <a href="<?php echo e(asset ("assets/images/img1/$robjek->img1")); ?>" class="fa fa-search mfp-image fa-lg"></a> */ ?>

                  </div>
                    <hr>
                  </div>
            </div>
          <?php endforeach; ?>
        </div> 
        
<?php /* <hr> */ ?>

      <?php endforeach; ?>
      </div>
        <?php /* <div class="" align="center">
          <?php echo $robjeks->links(); ?>

        </div> */ ?>

      <div class="col-md-12" align="center">
        <h3>
          <?php if($nilai != 0): ?>
            Or you can chose another attraction if you do not agree with the recommendation.
          <?php else: ?> 
            
          <?php endif; ?>
          
        </h3>
      <hr>
      </div>

      

        <div class="row sub_content">
          <div class="col-md-12">
            <div class="dividerHeading">
                <h4><span><a href="<?php echo e(URL('objek')); ?>">Another Attractions</a></span></h4>
            </div>
            <div id="recent-work-slider" class="owl-carousel">
              <?php foreach($obj_lain as $dobjek): ?>
                <div class="recent-item box">
                  <figure class="touching ">
                      <img src="<?php echo e(asset ("assets/images/img1/$dobjek->img1")); ?>" onerror="this.src='<?php echo e(asset ("assets/images/error/530x400.png")); ?>'" width="" height=""/>

                      <div class="option inner">
                          <div>
                              <h5><?php echo e($dobjek->nama_objek); ?></h5>

                              <button class="btn btn-info" name="button" title="Detail" method="get" data-toggle="modal" data-target="#lihat<?php echo e($dobjek->slug); ?>" onclick="javascript: <?php echo e(url('/objek/'.$dobjek->slug)); ?>"> <i class="fa fa-info-circle fa-lg"></i> </button>

                              <button class="btn btn-info mfp-image" name="button" title="<?php echo e($dobjek->nama_objek); ?>" href="<?php echo e(asset ("assets/images/img1/$dobjek->img1")); ?>") }}"> <i class="fa fa-picture-o fa-lg"></i> </button>

                          </div>
                      </div>
                  </figure>
                  <div class="" align="center">
                      <b> 
                          <?php echo e($dobjek->nama_objek); ?>

                      </b>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>
          </div>
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
              <h2> <?php echo $__env->make('laravelLikeComment::like', ['like_item_id' => $robjek->id], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> </h2> 
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



<?php /* MODAL Objek Lain NE */ ?>
<?php foreach($obj_lain as $dobjek): ?>

    <div class="modal fade" id="lihat<?php echo e($dobjek->slug); ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="exampleModalLabel">Detail Attraction</h4>
          </div>
          <div class="modal-body">

            <img src="<?php echo e(asset ("assets/images/img1/$dobjek->img1")); ?>" onerror="this.src='<?php echo e(asset ("assets/images/error/900x500.png")); ?>'" width="" height="140"/>

              <table class="">

              <h2> <?php echo $__env->make('laravelLikeComment::like', ['like_item_id' => $dobjek->id], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> </h2> 

                <tbody>
                  <tr>
                    <td><b>Name</b></td>
                    <td> : </td>
                    <td> <?php echo e($dobjek->nama_objek); ?> </td>
                  </tr>
                  <tr>
                    <td><b>Address</b></td>
                    <td> : </td>
                    <td> <?php echo e($dobjek->alamat); ?> </td>
                  </tr>
                  <tr>
                    <td><b>Description</b></td>
                    <td> : </td>
                    <td>  </td>
                  </tr>
                </tbody>
              </table>
              
              <div style="text-align:justify">
                <?php echo substr($dobjek->keterangan,0,400).""; ?> <a href="<?php echo e(url('/objek', $dobjek->slug)); ?>">read more.</a>
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

<?php endforeach; ?>
<?php /* MODAL Objek Lain NE */ ?>










<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.master2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>