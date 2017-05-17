<?php $__env->startSection('title', 'Objek Wisata'); ?>

<?php $__env->startSection('header'); ?>
  @parent

    <div class="">
      <ul class="breadcrumbs-alt">
          <li>
              <a href="<?php echo e(URL('admin/dashboard')); ?>">Beranda</a>
          </li>
          <li>
              <a href="<?php echo e(URL('admin/objek')); ?>" class="current">Objek Wisata</a>
          </li>
      </ul>
    </div>

<div class="" align="right">
  <form class="" action="<?php echo e(url('/admin/objek/create')); ?>">
    <button type="submit" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Buat Objek Wisata</button>
<?php /*
    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#exampleModal">Buat dengan Modal</button>
*/ ?>

  </form>
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
<table  class="display table table-bordered table-striped" id="dynamic-table">
<thead>
<tr>
  <th width="15%"> Dibuat tanggal </th>
  <th width="30%"> Nama Objek Wisata</th>
  <th width="40%"> Alamat </th>
  <th width="10%"> Status </th>
  <th width="5%"> Dikunjungi </th>
  <th width="5%"> Detail </th>
  <th width="5%"> Ubah </th>
  <th width="5%"> Hapus </th>
</tr>
</thead>
<tbody>
<?php foreach($objeks as $objek): ?>
<tr class="gradeX">
  <td><?php echo e(date('d F Y' , strtotime($objek->created_at) )); ?></td>
  <td><?php echo e($objek->nama_objek); ?></td>
  <td><?php echo e($objek->alamat); ?></td>
  <td><?php echo e($objek->status); ?></td>
  <td><?php echo e($objek->hits); ?> orang</td>
  <?php /* <td><?php echo e(Counter::showAndCount($objek->slug)); ?></td> */ ?>
  <td>
    <form class="" action="<?php echo e(url('/admin/objek', $objek->id)); ?>" method="get">
      <input type="hidden" name="_method" value="detail">
      <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
      <button type="sumbit" class="btn btn-info" name="button" title="Detail"><i class="fa fa-info-circle fa-lg"></i> </button>
    </form>
  </td>
  <td>
    <form class="" action="<?php echo e(url('/admin/objek', $objek->id)); ?>/edit" method="get">
      <input type="hidden" name="_method" value="edit">
      <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
      <button type="submit" class="btn btn-warning" name="button" title="Ubah"><i class="fa fa-edit fa-lg"></i> </button>
    </form>
  </td>
  <td>
    <button class="btn btn-danger" name="button" title="Hapus" method="get" data-toggle="modal" data-target="#deleteModal<?php echo e($objek->id); ?>" onclick="javascript: <?php echo e(url('/admin/objek/'.$objek->id)); ?>"><i class="fa fa-trash-o fa-lg"></i>
    </button>
    <div class="modal fade" id="deleteModal<?php echo e($objek->id); ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="exampleModalLabel">Hapus Objek Wisata</h4>
          </div>
          <div class="modal-body">
            <p>
             Hapus data objek wisata dengan nama <?php echo e($objek->nama_objek); ?>?
            </p>
          </div>
          <div class="modal-footer">
            <form class="" action="<?php echo e(url('/admin/objek', $objek->id)); ?>" method="post">
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
  <th width="15%"> Dibuat tanggal </th>
  <th width="30%"> Nama Objek Wisata</th>
  <th width="40%"> Alamat </th>
  <th width="10%"> Status </th>
  <th width="5%"> Dikunjungi </th>
  <th width="5%"> Detail </th>
  <th width="5%"> Ubah </th>
  <th width="5%"> Hapus </th>
</tr>
</tfoot>
</table>
</div>







<!--MODAL ADD-->

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Buat Objek Wisata</h4>
      </div>
      <div class="modal-body">
        <form class="" action="objek" method="post">
          <div class="form-group<?php echo e($errors->has('nama_objek') ? ' has-error' : ''); ?>">
          <label> Nama Objek Wisata </label>
            <input class="form-control" type="text" name="nama_objek" value="" placeholder="Nama Objek Wisata..." required="required">
            <?php if($errors->has('nama_objek')): ?>
                <p class="help-block">
                    <strong><?php echo e($errors->first('nama_objek')); ?></strong>
                </p>
            <?php endif; ?>
          </div>

          <label> Alamat </label>
          <div class="form-group<?php echo e($errors->has('alamat') ? ' has-error' : ''); ?>">
            <input class="form-control" type="text" name="alamat" value="" placeholder="Alamat Objek Wisata..." required="required">
            <?php if($errors->has('alamat')): ?>
                <p class="help-block">
                    <strong><?php echo e($errors->first('alamat')); ?></strong>
                </p>
            <?php endif; ?>
          </div>

          <label> Keterangan </label>
          <div class="form-group<?php echo e($errors->has('keterangan') ? ' has-error' : ''); ?>">
            <textarea  class="form-control" name="keterangan" rows="3" placeholder="Keterangan ..." required="required"></textarea>
            <?php if($errors->has('keterangan')): ?>
                <p class="help-block">
                    <strong><?php echo e($errors->first('keterangan')); ?></strong>
                </p>
            <?php endif; ?>
          </div>

          <label> Status </label> <br>
          <div class="form-group<?php echo e($errors->has('status') ? ' has-error' : ''); ?>">
            <select class="form-control" name="status" required="required">
              <option value="">- Pilih Status -</option>
                <option value="Tampil"> Tampil </option>
                <option value="Sembunyi"> Sembunyi </option>
            </select>
            <?php if($errors->has('status')): ?>
                <p class="help-block">
                    <strong><?php echo e($errors->first('status')); ?></strong>
                </p>
            <?php endif; ?>
          </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
        <input type="submit" class="btn btn-primary" name="name" value="Kirim">
      </div>

        </form>

    </div>
  </div>
</div>



<!--MODAL DELETE-->

<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Delete Objek Wisata</h4>
      </div>
      <div class="modal-body">

          <p>
            Hapus data objek wisata?
          </p>

      </div>
      <div class="modal-footer">
        <form class="" action="<?php echo e(url('/admin/objek', $objek->id)); ?>" method="post">

          <input type="button" class="btn btn-default" data-dismiss="modal" value="Tidak">

          <input type="hidden" name="_method" value="delete">
          <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
          <input type="submit" class="btn btn-danger" name="name" value="Delete">

        </form>
      </div>



    </div>
  </div>
</div>



<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>