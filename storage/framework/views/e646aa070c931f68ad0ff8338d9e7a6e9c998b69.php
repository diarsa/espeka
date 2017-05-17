<?php $__env->startSection('title', 'Detail Recommendation'); ?>

<?php $__env->startSection('header'); ?>
  @parent

<div class="page-header">
  <h3><b>
    <?php echo e($wisatawan->nama); ?>

  </b></h3>
  Created at <?php echo e(date('d F Y' , strtotime($wisatawan->created_at) )); ?>

</div>

<div class="col-md-6">
<blockquote class="default">
  <p>
    <?php echo e($wisatawan->user); ?>

  </p>

  <table class="table">    
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
  
</blockquote>
</div>


<div class="col-md-6">
<blockquote class="default">
	<h4>Recommendations</h4>

	<div class="alert alert-info fade in">
	    <button data-dismiss="alert" class="close close-sm" type="button">
	      <i class="fa fa-times">
	      </i>
	    </button>
	    Click name for more information.
  	</div>

  	<?php $nilai = 0; ?>
    	<?php if(isset($temps[0]->nilai)): ?>
        	<?php $nilai = number_format(($temps[0]->nilai)* 100, 2); ?>
        	<b> Percentage = <?php echo e($nilai); ?>% </b>
        <?php else: ?> 
        	No data available 
        <?php endif; ?>

  	<?php foreach($robjeks as $rItem): ?>
  	<?php /* <hr> */ ?>
	<?php foreach($rItem as $robjek): ?>
		<div>
			<b>
				<a href="#" method="get" data-toggle="modal" data-target="#lihat<?php echo e($robjek->slug); ?>" onclick="javascript: <?php echo e(url('/objek/'.$robjek->slug)); ?>"><?php echo e($robjek->nama_objek); ?></a>
			</b>
		</div>

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

	            <h2> <?php echo $__env->make('laravelLikeComment::like', ['like_item_id' => $robjek->id], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> </h2> 

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
	<hr>
	<?php endforeach; ?>

</blockquote>
</div>



<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.master2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>