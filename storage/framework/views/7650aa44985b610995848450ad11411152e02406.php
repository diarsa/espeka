<?php $__env->startSection('title', 'Register'); ?>

<?php $__env->startSection('content'); ?>


    <section class="page_head">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="page_title">
                        <h2>Register</h2>
                    </div>
                    <nav id="breadcrumbs">
                        <ul>
                            <li><a href="<?php echo e(url('dashboard')); ?>">Home</a>/</li>
                            <li>Register</li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </section>

  <br>


  <div class="col-lg-6 col-sm-6">
      <div class="dividerHeading">
          <h4><span>Explanation</span></h4>
      </div>
      <blockquote class="default">Fill in your personal data correctly and completely.</blockquote>
      <blockquote class="default">If you already have an account, please go to through the  <a href="<?php echo e(url('login')); ?>" class=""><b>Login</b></a> page.</blockquote>
      <?php /* <blockquote class="default">Satu akun dapat menyimpan banyak rekomendasi objek wisata. </blockquote> */ ?>

  </div>

  <div class="col-lg-5 col-sm-5 ">
      <div class="dividerHeading">
          <h4><span>Register</span></h4>
      </div>
      <form id="signupForm" role="form" method="post" name="registerform" action="<?php echo e(url('/register')); ?>">
        <?php echo e(csrf_field()); ?>


        <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
                <input id="name" type="text" class="form-control" name="name" value="<?php echo e(old('name')); ?>" placeholder="First name" required="required">
                <?php if($errors->has('name')): ?>
                    <span class="help-block">
                        <strong><?php echo e($errors->first('name')); ?></strong>
                    </span>
                <?php endif; ?>
            </div>
        </div>

        <div class="form-group<?php echo e($errors->has('lastname') ? ' has-error' : ''); ?>">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
                <input id="lastname" type="text" class="form-control" name="lastname" value="<?php echo e(old('lastname')); ?>" placeholder="Last name" >
                <?php if($errors->has('lastname')): ?>
                    <span class="help-block">
                        <strong><?php echo e($errors->first('lastname')); ?></strong>
                    </span>
                <?php endif; ?>
            </div>
        </div>

        <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-envelope fa-fw"></i></span>
                <input id="email" type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>" placeholder="Email address" required="email">
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
                  <input id="password" type="password" class="form-control" name="password" placeholder="Password 6 character minimum" value="<?php echo e(old('password')); ?>" required="required">
                  <?php if($errors->has('password')): ?>
                      <span class="help-block">
                          <strong><?php echo e($errors->first('password')); ?></strong>
                      </span>
                  <?php endif; ?>
              </div>
          </div>

          <div class="form-group<?php echo e($errors->has('password_confirmation') ? ' has-error' : ''); ?>">
              <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
                  <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" placeholder="Password confirmation " value="<?php echo e(old('password_confirmation')); ?>" required="required">
                  <?php if($errors->has('password_confirmation')): ?>
                      <span class="help-block">
                          <strong><?php echo e($errors->first('password_confirmation')); ?></strong>
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
              <button type="submit" class="btn btn-default btn-lg button"><i class="fa fa-btn fa-sign-in fa-lg "></i> Register</button>
  <!--
              <a class="btn btn-link" href="<?php echo e(url('/password/reset')); ?>">Forgot Your Password?</a>
  -->
          </div>
      </form>
  </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.master2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>