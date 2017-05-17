<?php $__env->startSection('title', 'Reset Password'); ?>
<!-- Main Content -->
<?php $__env->startSection('content'); ?>

<section class="page_head">
      <div class="container">
          <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12">
                  <div class="page_title">
                      <h2>Reset Password</h2>
                  </div>
                  <nav id="breadcrumbs">
                      <ul>
                          <li><a href="<?php echo e(url('dashboard')); ?>">Home</a>/</li>
                          <li>Reset Password</li>
                      </ul>
                  </nav>
              </div>
          </div>
      </div>
  </section>


<br>
<div class="container">
    <div class="row">
        <div class="col-md-4">
        <div class="dividerHeading">
            <h4><span>Explanation</span></h4>
        </div>
          <blockquote class="default">
            Fill your email in email address field who used register in this system. Click button password reset. Then open your email and click the reset password link. 
          </blockquote>
        </div>

        <div class="col-md-7">
        <div class="dividerHeading">
            <h4><span>Reset Password</span></h4>
        </div>
            <div class="panel panel-default">
                
                <div class="panel-body">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>

                    <form class="form-horizontal" role="form" method="POST" action="<?php echo e(url('/password/email')); ?>">
                        <?php echo e(csrf_field()); ?>


                        <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>" required="">

                                <?php if($errors->has('email')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-btn fa-envelope"></i> Send Password Reset Link
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.master2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>