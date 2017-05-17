<?php $__env->startSection('title', 'Home'); ?>

<?php $__env->startSection('header'); ?>
  @parent

<div class="jumbotron">


</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>