<?php $__env->startSection('title', 'Beranda'); ?>

<?php $__env->startSection('conten'); ?>
  @parent

    <div class="">
      <ul class="breadcrumbs-alt">
          <li>
              <a href="<?php echo e(URL('petugas')); ?>">Beranda</a>
          </li>
          <li>
              <a href="" class="current">Halaman Petugas</a>
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


  <?php /* <script>

    $(function(){
        var show_modal = "<?php echo e(session()->pull('show_modal')); ?>";

        if(typeof show_modal !== 'undefined' && show_modal) {
            $('#deleteModal1').modal('show');
            // This will open up the modal if the variable is present in session as true
            alert('Suksess');
        }
    });
  </script> */ ?>

  <?php /* <script type="text/javascript">alert("<?php echo e(Session::get('message')); ?>");</script> */ ?>


<?php else: ?>

<?php endif; ?>

<?php /* <div class="alert alert-info fade in">
  <i class="fa fa-info-circle "></i> 
  Silakan baca ini terlebih dahulu.
</div> */ ?>

  <div class="col-md-6">
      <div class="alert alert-info fade in">
      <i class="fa fa-info-circle "></i> 
          <?php /* <div class="panel-heading" align="center">Selamat Datang</div> */ ?>
          
              Selamat datang di halaman petugas objek wisata Dinas Kebudayaan dan Pariwisata Kabupaten Bangli. Silakan input data wisatawan berdasarkan jenis wisatawan.
            
      </div>
  </div>


  <?php /* <div class="col-md-6 ">
      <div class="well">
          <div class="" align="center"> <h5><b> Pilih Jenis Wisatawan </b></h5> </div>
          <div class="panel-body" align="center">
              
            <div class="col-md-4">
            <a href="<?php echo e(URL('petugas/lokal/create')); ?>">
              <!-- <i class="fa fa-users fa-5x"></i> -->
              <button type="button" class="btn btn-lg btn-warning"><i class="fa fa-plus-circle"></i> WISLOK</button>

            </a>
            </div>

            <div class="row col-md-4">
              <h1>&times;</h1>
            </div>

            <div class="col-md-4">
            <a href="<?php echo e(URL('petugas/mancanegara/create')); ?>">
              <button type="button" class="btn btn-lg btn-info"><i class="fa fa-plus-circle"></i> WISMAN</button>
            </a>
            </div>

          </div>
      </div>
  </div> */ ?>


  <div class="col-md-12">
  <div class="panel panel-default">
    <?php /* <div class="panel-heading" align="center">Total Wisatawan</div> */ ?>
    <div class="panel-body">


    <div class="col-md-4">
        <div class="mini-stat clearfix">
            <span class="mini-stat-icon orange"><i class="fa fa-users"></i></span>
            <div class="mini-stat-info">
                <span> <?php echo e($totlokal); ?> </span>
                Wisatawan lokal yang berkunjung ke Kabupaten Bangli
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="mini-stat clearfix">
            <span class="mini-stat-icon pink"><i class="fa fa-users"></i></span>
            <div class="mini-stat-info">
                <span> <?php echo e($totmanca); ?> </span>
                Wisatawan mancanegara yang berkunjung ke Kabupaten Bangli
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="mini-stat clearfix">
            <span class="mini-stat-icon green"><i class="fa fa-users"></i></span>
            <div class="mini-stat-info">
                <span> <?php echo e($totalwi); ?> </span>
                Total wisatawan yang berkunjung ke Kabupaten Bangli
            </div>
        </div>
    </div>


  </div>
  </div>






<?php $__env->stopSection(); ?>

<?php echo $__env->make('petugas.lay', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>