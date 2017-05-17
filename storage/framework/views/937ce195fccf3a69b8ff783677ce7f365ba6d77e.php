<?php $__env->startSection('title', 'Your Profile'); ?>

<?php $__env->startSection('header'); ?>
  @parent

  <section class="page_head">
      <div class="container">
          <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12">
                  <div class="page_title">
                      <h2><?php echo e(Auth::user()->name); ?></h2>
                  </div>
                  <nav id="breadcrumbs">
                      <ul>
                          <li><a href="<?php echo e(URL('dashboard')); ?>">Home</a>/</li>
                          <li>Profile</li>
                      </ul>
                  </nav>
              </div>
          </div>
      </div>
  </section>

<div class="">
  <br>
</div>

<div class="isotope col-lg-12">

<?php if(Session::has('message')): ?>
  <div class="alert alert-success fade in">
    <button data-dismiss="alert" class="close close-sm" type="button">
      <i class="fa fa-times">
      </i>
    </button>
    <strong>
      Success!
    </strong>
      <?php echo e(Session::get('message')); ?>

  </div>
<?php else: ?>

<?php endif; ?>

	<div class="col-md-2">
		<img alt="" src="<?php echo e(asset('assets/images/users/userflat.png')); ?>" width="150">
	</div>

	<div class="col-md-4">

		<?php echo e(Auth::user()->name); ?> <?php echo e(Auth::user()->lastname); ?> <br>
		<?php echo e(Auth::user()->email); ?> <br>
    Joined <?php echo e(date('d F Y' , strtotime(Auth::user()->created_at) )); ?> at <?php echo e(date('h:i A' , strtotime(Auth::user()->created_at) )); ?>

		
		<h4>Welcome to your profile</h4>
		
	</div>

<a href="<?php echo e(url('wisatawan/create')); ?>" class="my-google" title="Logout">
	<div class="col-md-3">
	    <div class="serviceBox_2 green">
	        <div class="service-icon">
	            <i class="fa fa-user fa-lg"></i>
	        </div>
	        <div class="service-content">
	            <h3>Create Recommend</h3>
	            <p> Click this button for create your recommendation.</p>
	        </div>
	    </div>
	</div>
</a>

<a href="<?php echo e(url('logout')); ?>" class="my-google" title="Logout">
	<div class="col-md-3">
	    <div class="serviceBox_2 red">
	        <div class="service-icon">
	            <i class="fa fa-sign-out fa-lg"></i>
	        </div>
	        <div class="service-content">
	            <h3>Logout</h3>
	            <p> Click this button for logout your account.</p>
	        </div>
	    </div>
	</div>
</a>

</div>


<div class="col-md-12">
<h3>History</h3>
<div class="table-responsive">
  <table class="table table-bordered table-hover table-striped">
    <thead>
      <tr>
        <th width="15%"> Created </th>
        <th width="25%"> Nama </th>
        <th width="15%"> Email </th>
        <th width="5%"> Detail </th>
        <th width="5%"> Delete </th>

      </tr>
    </thead>
    <tbody>
    <?php if(count($histo) >= 1): ?>

      <?php foreach($histo as $his): ?>
      <tr>
        <td><?php echo e(date('d M Y' , strtotime($his->created_at) )); ?> at <?php echo e(date('h:i A' , strtotime($his->created_at) )); ?></td>
        <td><?php echo e($his->nama); ?></td>
        <td><?php echo e($his->user); ?></td>
        <td>
          <form class="" action="<?php echo e(url('/wisatawan', $his->id)); ?>" method="get">
              <input type="hidden" name="_method" value="detail">
              <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
              <button type="submit" class="btn btn-info" name="name" title="Detail"><i class="fa fa-info-circle"></i> </button>
          </form>
        </td>
        <td>
            <button class="btn btn-danger" name="button" title="Delete" method="get" data-toggle="modal" data-target="#deleteModal<?php echo e($his->id); ?>" onclick="javascript: <?php echo e(url('/wisatawan'.$his->id)); ?>"><i class="fa fa-trash-o fa-lg"></i>
            </button>
            <div class="modal fade" id="deleteModal<?php echo e($his->id); ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel">Warning</h4>
                  </div>
                  <div class="modal-body">
                    <p>
                     Are you sure delete <b> <?php echo e($his->nama); ?> </b> data? <br>
                     Data created at <b><?php echo e(date('d F Y' , strtotime($his->created_at) )); ?></b>
                    </p>
                  </div>
                  <div class="modal-footer">
                    <form class="" action="<?php echo e(url('/wisatawan', $his->id)); ?>" method="post">
                      <input type="hidden" name="_method" value="delete">
                      <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                      <input type="submit" class="btn btn-danger" name="name" value="Yes, delete">
                      <input type="submit" class="btn btn-default" data-dismiss="modal" value="No, cancel">
                    </form>
                  </div>
                </div>
              </div>
            </div>
        </td>

      </tr>
      <?php endforeach; ?>

     <?php else: ?> 
     	<tr>
     		<td>Empty</td>
     		<td>Empty</td>
     		<td>Empty</td>
     		<td>Empty</td>
        <td>Empty</td>
     	</tr>
     <?php endif; ?>

    </tbody>
  </table>

<?php echo $histo->links(); ?>


</div>



</div>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.master2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>