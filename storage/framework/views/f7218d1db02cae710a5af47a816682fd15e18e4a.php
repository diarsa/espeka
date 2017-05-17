<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js">
</script>

<script type="text/javascript">

$(document).ready(function(){
    $('#pilihan').on('change', function() {
      if ( this.value == 'vwisman')
      {
        $("#wisman").show();
        $("#wislok").hide();
      }
      else
      {
        $("#wisman").hide();
        $("#wislok").show();
      }
    });
});

</script>




<?php $__env->startSection('title', 'Tambah Data Wisatawan'); ?>

<?php $__env->startSection('conten'); ?>
  @parent

    <div class="">
      <ul class="breadcrumbs-alt">
          <li>
              <a href="<?php echo e(URL('petugas')); ?>">Beranda</a>
          </li>
          <li>
              <a href="<?php echo e(URL('petugas/wisatawan')); ?>">Wisatawan</a>
          </li>
          <li>
              <a href="" class="current">Tambah</a>
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

<?php elseif(Session::has('eror')): ?>

  <div class="alert alert-block alert-danger fade in">
    <button data-dismiss="alert" class="close close-sm" type="button">
      <i class="fa fa-times">
      </i>
    </button>
    <strong>
      <?php echo e(Session::get('eror')); ?>

    </strong>
  </div>
<?php else: ?>

<?php endif; ?>

<div class="alert alert-info fade in">
  <i class="fa fa-info-circle "></i> 
  Silakan dibaca petunjuk pada masing-masing kolom dengan baik dan benar.
</div>

<?php /* <form class="form-horizontal" id="validpetugas" role="form" action="../../petugas/mancanegara" method="post" > */ ?>
<form class="form-horizontal" id="signupForm" role="form" action="<?php echo e(URL('petugas/wisatawan')); ?>" method="post" >


<div class="col-md-12">
    <div class="panel panel-info">

      <div class="well">
        <div class="panel-body">
          <div class="alert alert-info fade in">
            <i class="fa fa-info-circle "></i> 
            Pilih dahulu objek wisata, kemudian isi berapa orang total wisatawan yang akan diinputkan pada kolom jumlah. 
            <br>Kolom ini <b>dibutuhkan.</b>
          </div>
            <div class="form-group <?php echo e($errors->has('objek') ? ' has-error' : ''); ?>">
                <label for="" class="col-lg-2 control-label">Objek Wisata *</label>
                <div class="col-lg-10">
                    <select class="form-control" name="objek" required="required">
                        <option value="">- Pilih Objek Wisata -</option>
                          <?php foreach($objeks as $objek): ?>
                            <option value="<?php echo e($objek->id); ?>" <?php if(old('objek')&&old('objek') == $objek->id): ?> selected="selected" <?php endif; ?>> <?php echo e($objek->nama_objek); ?> </option>
                          <?php endforeach; ?>
                    </select>
                    <?php if($errors->has('objek')): ?>
                        <p class="help-block">
                            <strong><?php echo e($errors->first('objek')); ?></strong>
                        </p>
                    <?php endif; ?>

                    <hr>
                    <div class="col-md-10">
                      <label for="" class="col-lg-2 form-controlol-label">Jumlah *</label>
                      <div class="col-md-6">
                        <input type="number" class="form-control" name="jmlobjek" value="<?php echo e(old('jmlobjek')); ?>"> orang
                      </div>
                        
                    </div>

                </div>
            </div>

        </div>
      </div>
      
    </div>
</div>


<div class="col-md-12">
    <div class="panel panel-info">
          <b>Asal *</b>

      <div class="well">
        <div class="panel-body">
          <div class="alert alert-info fade in">
            <i class="fa fa-info-circle "></i> 
            Silakan pilih salah satu atau tidak boleh keduanya sesuai dengan jenis wisatawan. Jika wisatawan <b>lokal</b>, silakan pilih <b>provinsi</b>. Jika wisatawan <b>mancanegara</b>, silakan pilih <b>negara</b>. 
            <br>Kolom ini <b>dibutuhkan.</b>
          </div>

          <div class="form-group">
            <select class="form-control" name="pilihan" id="pilihan">
              <option value="vwislok" name="vwislok">Lokal</option>
              <option value="vwisman" name="vwisman">Mancanegara</option>
            </select>

            <hr>

            <div class="form-group <?php echo e($errors->has('pro') ? ' has-error' : ''); ?>" id="wislok">
                <label for="" class="col-lg-2 control-label">Provinsi </label>
                <div class="col-lg-10">
                    <select class="form-control" name="pro" >
                        <option value="">- Pilih Provinsi -</option>
                          <?php foreach($prov as $pro): ?>
                            <option value="<?php echo e($pro->kode); ?>" <?php if(old('pro')&&old('pro') == $pro->kode): ?> selected="selected" <?php endif; ?>> <?php echo e($pro->nama_kriteria_sub); ?> </option>
                          <?php endforeach; ?>
                    </select>
                    <?php if($errors->has('pro')): ?>
                        <p class="help-block">
                            <strong><?php echo e($errors->first('pro')); ?></strong>
                        </p>
                    <?php endif; ?>
                </div>
            </div>

            <div class="form-group <?php echo e($errors->has('negara') ? ' has-error' : ''); ?>" id="wisman">
                <label for="" class="col-lg-2 control-label">Negara </label>
                <div class="col-lg-10">
                    <select class="form-control" name="negara" >
                        <option value="">- Pilih Negara -</option>
                          <?php foreach($negaras as $negara): ?>
                            <option value="<?php echo e($negara->kode); ?>" <?php if(old('negara')&&old('negara') == $negara->kode): ?> selected="selected" <?php endif; ?>> <?php echo e($negara->nama_kriteria_sub); ?> </option>
                          <?php endforeach; ?>
                    </select>
                    <?php if($errors->has('negara')): ?>
                        <p class="help-block">
                            <strong><?php echo e($errors->first('negara')); ?></strong>
                        </p>
                    <?php endif; ?>
                </div>
            </div>

          </div>

        </div>
      </div>

    </div>
</div>


<div class="col-md-12">
    <div class="panel panel-info">

          <b>Jenis Kelamin </b>

      <div class="well">
        <div class="panel-body">
          <div class="alert alert-info fade in">
            <i class="fa fa-info-circle "></i> 
            Isi langsung berapa orang laki-laki atau perempuan dari total wisatawan yang telah ditentukan sebelumnya pada masing-masing kolom jumlah. 
          </div>
            <div class="form-group <?php echo e($errors->has('jk1') ? ' has-error' : ''); ?>">
                <label for="" class="col-lg-2 control-label">Jenis Kelamin </label>
                <div class="col-lg-10">
                    <select class="form-control" name="jk1" >
                          <?php foreach($jks as $jk1): ?>
                            <option value="<?php echo e($jk1->kode); ?>" <?php if($jk1->kode == '3k1'): ?> selected="selected" <?php endif; ?>> <?php echo e($jk1->nama_kriteria_sub); ?> </option>
                          <?php endforeach; ?>
                    </select>
                    <?php if($errors->has('jk1')): ?>
                        <p class="help-block">
                            <strong><?php echo e($errors->first('jk1')); ?></strong>
                        </p>
                    <?php endif; ?>

                    <hr>
                    <div class="col-md-10">
                      <label for="" class="col-lg-2 form-controlol-label">Jumlah *</label>
                      <div class="col-md-6">
                        <input type="number" class="form-control" name="jmljk1" value="<?php echo e(old('jmljk1')); ?>"> orang
                      </div>
                    </div>

                </div>
            </div>

            <hr>
            
            <div class="form-group <?php echo e($errors->has('jk2') ? ' has-error' : ''); ?>">
                <label for="" class="col-lg-2 control-label">Jenis Kelamin </label>
                <div class="col-lg-10">
                    <select class="form-control" name="jk2" >
                          <?php foreach($jks as $jk2): ?>
                            <option value="<?php echo e($jk2->kode); ?>" <?php if($jk2->kode == '3k2'): ?> selected="selected" <?php endif; ?>> <?php echo e($jk2->nama_kriteria_sub); ?> </option>
                          <?php endforeach; ?>
                    </select>
                    <?php if($errors->has('jk2')): ?>
                        <p class="help-block">
                            <strong><?php echo e($errors->first('jk2')); ?></strong>
                        </p>
                    <?php endif; ?>

                    <hr>
                    <div class="col-md-10">
                      <label for="" class="col-lg-2 form-controlol-label">Jumlah *</label>
                      <div class="col-md-6">
                        <input type="number" class="form-control" name="jmljk2" value="<?php echo e(old('jmljk2')); ?>"> orang
                      </div>
                    </div>

                </div>
            </div>

        </div>
      </div>

    </div>
</div>


<div class="col-md-12">
    <div class="panel panel-info">
      
          <b>Tujuan</b>
      
      <div class="well">
        <div class="panel-body">
          <div class="alert alert-info fade in">
            <i class="fa fa-info-circle "></i> 
            Isi langsung jumlah masing-masing tujuan dari total wisatawan yang telah ditentukan sebelumnya pada masing-masing kolom jumlah. 
          </div>
            <div class="form-group <?php echo e($errors->has('tujuan1') ? ' has-error' : ''); ?>">
                <label for="" class="col-lg-2 control-label">Tujuan </label>
                <div class="col-lg-10">
                    <select class="form-control" name="tujuan1" >
                          <?php foreach($tujuans as $tujuan1): ?>
                            <option value="<?php echo e($tujuan1->kode); ?>" <?php if($tujuan1->kode == '4k1'): ?> selected="selected" <?php endif; ?>> <?php echo e($tujuan1->nama_kriteria_sub); ?> </option>
                          <?php endforeach; ?>
                    </select>
                    <?php if($errors->has('tujuan1')): ?>
                        <p class="help-block">
                            <strong><?php echo e($errors->first('tujuan1')); ?></strong>
                        </p>
                    <?php endif; ?>

                    <hr>
                    <div class="col-md-10">
                      <label for="" class="col-lg-2 form-controlol-label">Jumlah *</label>
                      <div class="col-md-6">
                        <input type="number" class="form-control" name="jmltujuan1" value="<?php echo e(old('jmltujuan1')); ?>"> orang
                      </div>
                    </div>

                </div>
                
            </div>

            <hr>

            <div class="form-group <?php echo e($errors->has('tujuan2') ? ' has-error' : ''); ?>">
                <label for="" class="col-lg-2 control-label">Tujuan </label>
                <div class="col-lg-10">
                    <select class="form-control" name="tujuan2" >
                          <?php foreach($tujuans as $tujuan2): ?>
                            <option value="<?php echo e($tujuan2->kode); ?>" <?php if($tujuan2->kode == '4k2'): ?> selected="selected" <?php endif; ?>> <?php echo e($tujuan2->nama_kriteria_sub); ?> </option>
                          <?php endforeach; ?>
                    </select>
                    <?php if($errors->has('tujuan2')): ?>
                        <p class="help-block">
                            <strong><?php echo e($errors->first('tujuan2')); ?></strong>
                        </p>
                    <?php endif; ?>

                    <hr>
                    <div class="col-md-10">
                      <label for="" class="col-lg-2 form-controlol-label">Jumlah *</label>
                      <div class="col-md-6">
                        <input type="number" class="form-control" name="jmltujuan2" value="<?php echo e(old('jmltujuan2')); ?>"> orang
                      </div>
                    </div>

                </div>
                
            </div>

            <hr>

            <div class="form-group <?php echo e($errors->has('tujuan3') ? ' has-error' : ''); ?>">
                <label for="" class="col-lg-2 control-label">Tujuan </label>
                <div class="col-lg-10">
                    <select class="form-control" name="tujuan3" >
                          <?php foreach($tujuans as $tujuan3): ?>
                            <option value="<?php echo e($tujuan3->kode); ?>" <?php if($tujuan3->kode == '4k3'): ?> selected="selected" <?php endif; ?>> <?php echo e($tujuan3->nama_kriteria_sub); ?> </option>
                          <?php endforeach; ?>
                    </select>
                    <?php if($errors->has('tujuan3')): ?>
                        <p class="help-block">
                            <strong><?php echo e($errors->first('tujuan3')); ?></strong>
                        </p>
                    <?php endif; ?>

                    <hr>
                    <div class="col-md-10">
                      <label for="" class="col-lg-2 form-controlol-label">Jumlah *</label>
                      <div class="col-md-6">
                        <input type="number" class="form-control" name="jmltujuan3" value="<?php echo e(old('jmltujuan3')); ?>"> orang
                      </div>
                    </div>

                </div>
                
            </div>

            <hr>

            <div class="form-group <?php echo e($errors->has('tujuan4') ? ' has-error' : ''); ?>">
                <label for="" class="col-lg-2 control-label">Tujuan </label>
                <div class="col-lg-10">
                    <select class="form-control" name="tujuan4" >
                          <?php foreach($tujuans as $tujuan4): ?>
                            <option value="<?php echo e($tujuan4->kode); ?>" <?php if($tujuan4->kode == '4k4'): ?> selected="selected" <?php endif; ?>> <?php echo e($tujuan4->nama_kriteria_sub); ?> </option>
                          <?php endforeach; ?>
                    </select>
                    <?php if($errors->has('tujuan4')): ?>
                        <p class="help-block">
                            <strong><?php echo e($errors->first('tujuan4')); ?></strong>
                        </p>
                    <?php endif; ?>

                    <hr>
                    <div class="col-md-10">
                      <label for="" class="col-lg-2 form-controlol-label">Jumlah *</label>
                      <div class="col-md-6">
                        <input type="number" class="form-control" name="jmltujuan4" value="<?php echo e(old('jmltujuan4')); ?>"> orang
                      </div>
                    </div>

                </div>
                
            </div>

        </div>
      </div>

    </div>
</div>


<div class="col-md-12">
    <div class="panel panel-info">
      
          <b>Umur</b>
      
      <div class="well">
        <div class="panel-body">
          <div class="alert alert-info fade in">
            <i class="fa fa-info-circle "></i> 
            Isi langsung jumlah pada masing-masing umur dari total wisatawan yang telah ditentukan sebelumnya pada masing-masing kolom jumlah. 
          </div>
            <div class="form-group <?php echo e($errors->has('umur1') ? ' has-error' : ''); ?>">
                <label for="" class="col-lg-2 control-label">Umur </label>
                <div class="col-lg-10">
                    <select class="form-control" name="umur1" >
                        <option value="5k25" > Dewasa </option>
                    </select>
                    <?php if($errors->has('umur1')): ?>
                        <p class="help-block">
                            <strong><?php echo e($errors->first('umur1')); ?></strong>
                        </p>
                    <?php endif; ?>

                    <hr>
                    <div class="col-md-10">
                      <label for="" class="col-lg-2 form-controlol-label">Jumlah *</label>
                      <div class="col-md-6">
                        <input type="number" class="form-control" name="jmlumur1" value="<?php echo e(old('jmlumur1')); ?>"> orang
                      </div>
                    </div>

                </div>
                
            </div>

            <hr>

            <div class="form-group <?php echo e($errors->has('umur2') ? ' has-error' : ''); ?>">
                <label for="" class="col-lg-2 control-label">Umur </label>
                <div class="col-lg-10">
                    <select class="form-control" name="umur2" >
                        <option value="5k18" > Remaja </option>
                    </select>
                    <?php if($errors->has('umur2')): ?>
                        <p class="help-block">
                            <strong><?php echo e($errors->first('umur2')); ?></strong>
                        </p>
                    <?php endif; ?>

                    <hr>
                    <div class="col-md-10">
                      <label for="" class="col-lg-2 form-controlol-label">Jumlah *</label>
                      <div class="col-md-6">
                        <input type="number" class="form-control" name="jmlumur2" value="<?php echo e(old('jmlumur2')); ?>"> orang
                      </div>
                    </div>

                </div>
                
            </div>

            <hr>

            <div class="form-group <?php echo e($errors->has('umur3') ? ' has-error' : ''); ?>">
                <label for="" class="col-lg-2 control-label">Umur </label>
                <div class="col-lg-10">
                    <select class="form-control" name="umur3" >
                        <option value="5k10" > Anak-anak </option>
                    </select>
                    <?php if($errors->has('umur3')): ?>
                        <p class="help-block">
                            <strong><?php echo e($errors->first('umur3')); ?></strong>
                        </p>
                    <?php endif; ?>

                    <hr>
                    <div class="col-md-10">
                      <label for="" class="col-lg-2 form-controlol-label">Jumlah *</label>
                      <div class="col-md-6">
                        <input type="number" class="form-control" name="jmlumur3" value="<?php echo e(old('jmlumur3')); ?>"> orang
                      </div>
                    </div>

                </div>
                
            </div>

        </div>
      </div>

    </div>
</div>            



        <div class="panel-body">

            <div class="form-group">
                <div class="col-lg-offset-2 col-lg-10" >
                  <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                  <button type="submit" class="btn btn-primary"><i class="fa fa-lg fa-check-square-o"></i> Proses</button>
                </div>
            </div>

        </div>

          </form>


<script>

$(function() {
    $('#wisman').hide(); 
    $('#pilihan').change(function(){
        if($('#pilihan').val() == 'vwisman') {
            $('#wisman').show();
            // $('#wislok').hide();
        } else {
            // $('#wislok').show();
            $('#wisman').hide(); 
        } 
    });
});


// $('#pilihan').on('change', function(){
//   var value = $(this).val();
//   $('.form').find('div').addClass('hide');
// if(value === vwisman){
//  $('.form').find('.one').remove('hide')
//  $('.form').find('.one').addClass('show')
// }else{
//     $('.form').find('.two').remove('hide')
//  $('.form').find('.two').addClass('show')
// }
// });

</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('petugas.lay', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>