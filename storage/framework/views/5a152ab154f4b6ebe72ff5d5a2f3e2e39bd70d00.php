<?php $__env->startSection('title', 'Ubah Objek Wisata'); ?>

<?php $__env->startSection('header'); ?>
  @parent

<?php echo $__env->make('admin.layout.googlemap', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

  <div class="">
      <ul class="breadcrumbs-alt">
          <li>
              <a href="<?php echo e(URL('petugas')); ?>">Beranda</a>
          </li>
          <li>
              <a href="<?php echo e(URL('petugas/objek')); ?>">Objek Wisata</a>
          </li>
          <li>
              <a href="#" class="current">Ubah</a>
          </li>
      </ul>
  </div>

<div class="alert alert-info fade in">
  <i class="fa fa-info-circle "></i> 
  Silakan isi data sesuai dengan kolom yang tersedia. Tanda * berarti data harus diisi. 
</div>

<div class="position-left">
    <form class="form-horizontal" id="signupForm" role="form" action="../../objek/<?php echo e($objek->id); ?>" method="post" enctype="multipart/form-data">
    <div class="form-group <?php echo e($errors->has('nama_objek') ? ' has-error' : ''); ?>">
        <label for="" class="col-lg-2 control-label">Nama Objek Wisata</label>
        <div class="col-lg-10">
            <input class="form-control" type="text" name="nama_objek" value="<?php echo e($objek->nama_objek); ?>" placeholder="Nama Objek Wisata..." required="required">
            <?php if($errors->has('nama_objek')): ?>
                <p class="help-block">
                    <strong><?php echo e($errors->first('nama_objek')); ?></strong>
                </p>
            <?php endif; ?>
        </div>
    </div>

    <div class="form-group<?php echo e($errors->has('kategori') ? ' has-error' : ''); ?>">
        <label for="" class="col-lg-2 control-label">Kategori</label>
        <div class="col-lg-10">
          <select class="form-control" name="kategori" required="required" value="<?php echo e($objek->kategori); ?>">
              <?php foreach($kats as $kat): ?>
                <option value="<?php echo e($kat->id); ?>" <?php if($objek->kategori==$kat->id): ?> selected="selected" <?php endif; ?>> <?php echo e($kat->nama_kat); ?> </option>
              <?php endforeach; ?>
          </select>
            <?php if($errors->has('kategori')): ?>
                <p class="help-block">
                    <strong><?php echo e($errors->first('kategori')); ?></strong>
                </p>
            <?php endif; ?>
        </div>
    </div>

    <div class="form-group<?php echo e($errors->has('keterangan') ? ' has-error' : ''); ?>">
        <label for="" class="col-lg-2 control-label">Keterangan</label>
        <div class="col-lg-10" name="dibutuhkan">
            <textarea id="messageArea" class="form-control ckeditor" name="keterangan" rows="7" placeholder="Keterangan ..." required="required"> <?php echo e($objek->keterangan); ?> </textarea>
            <?php if($errors->has('keterangan')): ?>
                <p class="help-block">
                    <strong><?php echo e($errors->first('keterangan')); ?></strong>
                </p>
            <?php endif; ?>
        </div>
    </div>

    <div class="form-group<?php echo e($errors->has('status') ? ' has-error' : ''); ?>">
        <label for="" class="col-lg-2 control-label">Status</label>
        <div class="col-lg-10">
          <select class="form-control" name="status" value="<?php echo e($objek->status); ?>">
            <option value="Tampil" <?php if($objek->status=="Tampil"): ?> selected="selected" <?php endif; ?>> Tampil </option>
            <option value="Sembunyi" <?php if($objek->status=="Sembunyi"): ?>) selected="selected" <?php endif; ?>> Sembunyi </option>
          </select>
            <?php if($errors->has('status')): ?>
                <p class="help-block">
                    <strong><?php echo e($errors->first('status')); ?></strong>
                </p>
            <?php endif; ?>
        </div>
    </div>

    <div class="form-group<?php echo e($errors->has('nimage') ? ' has-error' : ''); ?>">
    <label for="image" class="col-lg-2 control-label">Gambar 1</label>
      <div class="col-lg-10">
        <input class="form-control" type="file" name="nimage" value="<?php echo e(old('nimage',$objek->img1)); ?>">
        <p class="help-block">
          Ukuran 900x500 pixel
        </p>
          <?php if($errors->has('nimage')): ?>
              <p class="help-block">
                  <strong><?php echo e($errors->first('nimage')); ?></strong>
              </p>
          <?php endif; ?>
          <img src="<?php echo e(asset("assets/images/img1/$objek->img1")); ?>" alt="" width="200" onerror="this.src='<?php echo e(asset ("assets/images/error/900x500.png")); ?>'"/>
      </div>
    </div>

    <div class="form-group<?php echo e($errors->has('nimage2') ? ' has-error' : ''); ?>">
    <label for="image" class="col-lg-2 control-label">Gambar 2</label>
      <div class="col-lg-10">
        <input class="form-control" type="file" name="nimage2" value="<?php echo e($objek->img2); ?>">
        <p class="help-block">
          Ukuran 900x500 pixel
        </p>
          <?php if($errors->has('nimage2')): ?>
              <p class="help-block">
                  <strong><?php echo e($errors->first('nimage2')); ?></strong>
              </p>
          <?php endif; ?>
          <img src="<?php echo e(asset("assets/images/img2/$objek->img2")); ?>" alt="" width="200" onerror="this.src='<?php echo e(asset ("assets/images/error/900x500.png")); ?>'"/>
      </div>
    </div>

    <div class="form-group<?php echo e($errors->has('nimage3') ? ' has-error' : ''); ?>">
    <label for="image" class="col-lg-2 control-label">Gambar 3</label>
      <div class="col-lg-10">
        <input class="form-control" type="file" name="nimage3" value="<?php echo e($objek->img3); ?>">
        <p class="help-block">
          Ukuran 900x500 pixel
        </p>
          <?php if($errors->has('nimage3')): ?>
              <p class="help-block">
                  <strong><?php echo e($errors->first('nimage3')); ?></strong>
              </p>
          <?php endif; ?>
          <img src="<?php echo e(asset("assets/images/img3/$objek->img3")); ?>" alt="" width="200" onerror="this.src='<?php echo e(asset ("assets/images/error/900x500.png")); ?>'"/>
      </div>
    </div>

    <div class="form-group<?php echo e($errors->has('img_slider') ? ' has-error' : ''); ?>">
    <label for="img_slider" class="col-lg-2 control-label">Slider Gambar</label>
      <div class="col-lg-10">
        <input class="form-control" type="file" name="img_slider" value="<?php echo e($objek->img_slider); ?>">
        <p class="help-block">
          Ukuran 1920x540 pixel
        </p>
          <?php if($errors->has('img_slider')): ?>
              <p class="help-block">
                  <strong><?php echo e($errors->first('img_slider')); ?></strong>
              </p>
          <?php endif; ?>
          <img src="<?php echo e(asset("assets/images/img_slider/$objek->img_slider")); ?>" alt="" width="200" onerror="this.src='<?php echo e(asset ("assets/images/error/900x500.png")); ?>'"/>
      </div>
    </div>

    <div class="form-group<?php echo e($errors->has('sumber_gambar') ? ' has-error' : ''); ?>">
        <label for="" class="col-lg-2 control-label">Sumber Gambar</label>
        <div class="col-lg-10">
            <input class="form-control" type="text" name="sumber_gambar" value="<?php echo e($objek->sumber_gambar); ?>" placeholder="Masukkan sumber gambar di sini ..." required="required">
            <?php if($errors->has('sumber_gambar')): ?>
                <p class="help-block">
                    <strong><?php echo e($errors->first('sumber_gambar')); ?></strong>
                </p>
            <?php endif; ?>
        </div>
    </div>

    <?php /* <div class="form-group<?php echo e($errors->has('map') ? ' has-error' : ''); ?>">
        <label for="map" class="col-lg-2 col-sm-2 control-label">Map</label>
        <div class="col-lg-10">
            <textarea id="messageArea" class="form-control" name="map" rows="3" placeholder="Masukkan embed map disini" required="required"><?php echo e($objek->map); ?></textarea>
            <?php if($errors->has('map')): ?>
                <p class="help-block">
                    <strong><?php echo e($errors->first('map')); ?></strong>
                </p>
            <?php endif; ?>
        </div>
    </div> */ ?>

    <div class="form-group<?php echo e($errors->has('map') ? ' has-error' : ''); ?>">
        <label for="" class="col-lg-2 control-label">Alamat</label>
        <div class="col-lg-10">
              <div class="col-sm-12">

                  <div class="form-group">
                    <input type="text" id="searchmap" class="form-control" name="alamat" value="<?php echo e($objek->alamat); ?>">
                    <div class="panel-body">
                      <div id="map-canvas"></div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="">Lat</label>
                    <input type="text" class="form-control input-sm" name="lat" id="lat" value="<?php echo e($objek->lat); ?>">
                  </div>

                  <div class="form-group">
                    <label for="">Lng</label>
                    <input type="text" class="form-control input-sm" name="lng" id="lng" value="<?php echo e($objek->lng); ?>">
                  </div>
              </div>

        </div>
    </div>

    <div class="form-group">
        <div class="col-lg-offset-2 col-lg-10">
          <input type="hidden" name="_method" value="put">
          <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
          <input type="submit" class="btn btn-warning" value="Ubah">
        </div>
    </div>
  </form>
</div>



<script>
var lat = <?php echo e($objek->lat); ?>;
var lng = <?php echo e($objek->lng); ?>;

if(<?php echo e($objek->lat); ?> == '') {
  lat = 0;
} else {
  lat = <?php echo e($objek->lat); ?>;
}

if(<?php echo e($objek->lng); ?> == '') {
  lng = 0;
} else {
  lng = <?php echo e($objek->lng); ?>;
}

var map = new google.maps.Map(document.getElementById('map-canvas'),{
  center:{
    lat: lat,
    lng: lng
  },
  zoom:15
});
var marker = new google.maps.Marker({
  position: {
    lat: lat,
    lng: lng
  },
  map: map,
  draggable: true
});

  var searchBox = new google.maps.places.SearchBox(document.getElementById('searchmap'));
  google.maps.event.addListener(searchBox,'places_changed',function(){
    var places = searchBox.getPlaces();
    var bounds = new google.maps.LatLngBounds();
    var i, place;
    for(i=0; place=places[i];i++){
        bounds.extend(place.geometry.location);
        marker.setPosition(place.geometry.location); //set marker position new...
      }
      map.fitBounds(bounds);
      map.setZoom(15);
  });
  google.maps.event.addListener(marker,'position_changed',function(){
    var lat = marker.getPosition().lat();
    var lng = marker.getPosition().lng();
    $('#lat').val(lat);
    $('#lng').val(lng);
  });
</script>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('petugas.lay', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>