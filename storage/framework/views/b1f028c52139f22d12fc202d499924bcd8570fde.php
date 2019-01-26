<?php $__env->startSection('title', 'Login'); ?>

<?php $__env->startSection('content'); ?>

  <section class="page_head">
      <div class="container">
          <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12">
                  <div class="page_title">
                      <h2>Login</h2>
                  </div>
                  <nav id="breadcrumbs">
                      <ul>
                          <li><a href="<?php echo e(url('dashboard')); ?>">Home</a>/</li>
                          <li>Login</li>
                      </ul>
                  </nav>
              </div>
          </div>
      </div>
  </section>

<br>

<div class="row sub_content">
    <div class="col-lg-6 col-sm-6">
        <div class="dividerHeading">
            <h4><span>Explanation</span></h4>
        </div>
        <blockquote class="default">Please login first to those who already have an account to be able to know the recommendation attractions.</blockquote>
        <blockquote class="default">If you do not already have an account, please feel free to register via the <a href="<?php echo e(url('register')); ?>" class=""><b>Register</b></a> page.</blockquote>
        <?php /* <blockquote class="default">Satu akun dapat menyimpan banyak rekomendasi objek wisata. </blockquote> */ ?>

    </div>
    <div class="col-lg-5 col-sm-5 ">
        <div class="dividerHeading">
            <h4><span>Login</span></h4>
        </div>
        <form id="loginform" role="form" method="post" name="loginform" action="<?php echo e(url('/login')); ?>">
          <?php echo e(csrf_field()); ?>

            <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-envelope fa-fw"></i></span>
                    <input id="email" type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>" placeholder="Email" required="email">
                    <?php if($errors->has('email')): ?>
                        <span class="help-block">
                            <strong><?php echo e($errors->first('email')); ?></strong>
                        </span>
                    <?php endif; ?>

                </div>
            </div>
            <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
                    <input id="password" type="password" class="form-control" name="password" placeholder="Password" value="<?php echo e(old('password')); ?>" required="password">
                    <?php if($errors->has('password')): ?>
                        <span class="help-block">
                            <strong><?php echo e($errors->first('password')); ?></strong>
                        </span>
                    <?php endif; ?>
                </div>
            </div>
            <div class="form-group">
                <div class="checkbox">
                    <label>
                        <input type="checkbox"> Remember me
                    </label>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-default btn-lg button"><i class="fa fa-btn fa-sign-in fa-lg "></i> Login </button>
                

                <?php /* <a class="btn btn-link" href="<?php echo e(url('/password/reset')); ?>">Forgot Your Password?</a> */ ?>

            </div>
            <div class="form-group" align="right">
              <a href="<?php echo e(URL('password/reset')); ?>">Forgot Your Password?</a>
            </div>
        </form>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.master2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>