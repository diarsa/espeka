<?php $__env->startSection('title', 'Wisatawan Lokal'); ?>

<?php $__env->startSection('header'); ?>
  @parent

  <div class="">
    <ul class="breadcrumbs-alt">
        <li>
            <a href="<?php echo e(URL('admin/dashboard')); ?>">Beranda</a>
        </li>
        <li>
            <a href="<?php echo e(URL('admin/wisatawan/lokal')); ?>" class="current">Wisatawan Lokal</a>
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

<div class="adv-table table-responsive">
<?php /*
  <?php echo Form::open(['url' => 'admin/wisatawan', 'method'=>'get', 'class'=>'form-inline']); ?>

  <div class="form-group <?php echo $errors->has('q') ? 'has-error' : ''; ?>">
  <?php echo Form::text('q', isset($q) ? $q : null, ['class'=>'form-control', 'placeholder' => 'Type wisatawan..']); ?>

  <?php echo $errors->first('q', '<p class="help-block">:message</p>'); ?>

  </div>
  <?php echo Form::submit('Search', ['class'=>'btn btn-primary']); ?>

  <?php echo Form::close(); ?>

*/ ?>
<table  class="display table table-bordered table-striped" id="dynamic-table">
<thead>
<tr>
  <th width="10%"> Dibuat tanggal </th>
  <th width="15%"> Nama </th>
  <th width="10%"> Provinsi </th>
  <th width="10%"> JK </th>
  <th width="10%"> Tujuan </th>
  <th width="10%"> Umur </th>
  <th width="10%"> Kunjungan </th>
  <th width="5%"> Info </th>
  <th width="5%"> Hapus </th>
</tr>
</thead>
<tbody>
<?php foreach($wisatas as $wisata): ?>
<tr class="gradeX">
  <td><?php echo e(date('d M Y' , strtotime($wisata->created_at) )); ?></td>
  <td><?php echo e($wisata->nama); ?></td>
  <td><?php echo e($wisata->country); ?></td>
  <td><?php echo e($wisata->gender); ?></td>
  <td><?php echo e($wisata->purpose); ?></td>
  <td><?php echo e($wisata->umur); ?> tahun</td>
  <td><?php echo e($wisata->frekuensi); ?> kali</td>
<?php /*
  <td><form class="" action="<?php echo e(url('/admin/wisatawan', $wisata->id)); ?>" method="get">
      <input type="hidden" name="_method" value="detail">
      <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
      <button type="submit" class="btn btn-info" name="button" title="Detail"><i class="fa fa-info-circle fa-lg"></i> </button>
  </form></td>
*/ ?>


  <td>
    <button class="btn btn-info" name="button" title="Hapus" method="get" data-toggle="modal" data-target="#lihat<?php echo e($wisata->id); ?>" onclick="javascript: <?php echo e(url('/admin/wisatawan/'.$wisata->id)); ?>"><i class="fa fa-info-circle fa-lg"></i>
    </button>

    <div class="modal fade" id="lihat<?php echo e($wisata->id); ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="exampleModalLabel">Lihat Wisatawan</h4>
          </div>
          <div class="modal-body">
              <p>
                <table>
                  <tr>
                    <th>Kategori</th>
                    <th>  </th>
                    <th>Detail</th>
                  </tr>
                  <tbody>
                    <tr>
                      <td>Nama</td>
                      <td>:</td>
                      <td><?php echo e($wisata->nama); ?></td>
                    </tr>
                    <tr>
                      <td>Provinsi</td>
                      <td>:</td>
                      <td><?php echo e($wisata->country); ?></td>
                    </tr>
                    <tr>
                      <td>Jenis Kelamin</td>
                      <td>:</td>
                      <td><?php echo e($wisata->gender); ?></td>
                    </tr>
                    <tr>
                      <td>Tujuan</td>
                      <td>:</td>
                      <td><?php echo e($wisata->purpose); ?></td>
                    </tr>
                    <tr>
                      <td>Umur</td>
                      <td>:</td>
                      <td><?php echo e($wisata->umur); ?> tahun</td>
                    </tr>
                    <tr>
                      <td>Kunjungan</td>
                      <td>:</td>
                      <td><?php echo e($wisata->frekuensi); ?> kali</td>
                    </tr>
                  </tbody>
                </table>
              </p>
          </div>
          <div class="modal-footer">
            <form class="" action="" method="post">
              <input type="button" class="btn btn-default" data-dismiss="modal" value="Keluar">
            </form>
          </div>
        </div>
      </div>
    </div>
  </td>

  <td>
    <button class="btn btn-danger" name="button" title="Hapus" method="get" data-toggle="modal" data-target="#deleteModal<?php echo e($wisata->id); ?>" onclick="javascript: <?php echo e(url('/admin/wisatawan/'.$wisata->id)); ?>"><i class="fa fa-trash-o fa-lg"></i>
    </button>

    <div class="modal fade" id="deleteModal<?php echo e($wisata->id); ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="exampleModalLabel">Hapus Wisatawan</h4>
          </div>
          <div class="modal-body">
              <p>
                Hapus data wisatawan dengan nama <?php echo e($wisata->nama); ?>?
              </p>
          </div>
          <div class="modal-footer">
            <form class="" action="<?php echo e(url('/admin/wisatawan', $wisata->id)); ?>" method="post">
              <input type="button" class="btn btn-default" data-dismiss="modal" value="Tidak">
              <input type="hidden" name="_method" value="delete">
              <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
              <input type="submit" class="btn btn-danger" name="name" value="Hapus">
            </form>
          </div>
        </div>
      </div>
    </div>
  </td>

</tr>
<?php endforeach; ?>
</tbody>
<tfoot>
<tr>
  <th width="10%"> Dibuat tanggal </th>
  <th width="15%"> Nama </th>
  <th width="10%"> Provinsi </th>
  <th width="10%"> JK </th>
  <th width="10%"> Tujuan </th>
  <th width="10%"> Umur </th>
  <th width="10%"> Kunjungan </th>
  <th width="5%"> Info </th>
  <th width="5%"> Hapus </th>
</tr>
</tfoot>

<div class="" align="right">
  <form class="" action="<?php echo e(url('/admin/wisatawan/create')); ?>">
    <button type="submit" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Buat Wisatawan</button>
  </form>
</div>

</table>
</div>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>