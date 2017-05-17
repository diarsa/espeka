@extends('petugas.lay')

@section('title', 'Tambah Objek Wisata')

@section('conten')
  @parent

@include('admin.layout.googlemap')

    <div class="">
      <ul class="breadcrumbs-alt">
          <li>
              <a href="{{URL('petugas')}}">Beranda</a>
          </li>
          <li>
              <a href="{{URL('petugas/objek')}}">Objek Wisata</a>
          </li>
          <li>
              <a href="" class="current">Tambah</a>
          </li>
      </ul>
    </div>


<div class="alert alert-info fade in">
  <i class="fa fa-info-circle "></i> 
  Silakan isi data sesuai dengan kolom yang tersedia. Tanda * berarti data harus diisi. 
</div>

<div class="position-left">
  <form class="form-horizontal" id="signupForm" role="form" action="../objek" method="post" enctype="multipart/form-data">
    <div class="form-group {{ $errors->has('nama_objek') ? ' has-error' : '' }}">
        <label for="" class="col-lg-2 control-label">Nama Objek Wisata *</label>
        <div class="col-lg-10">
            <input class="form-control" type="text" name="nama_objek" value="{{ old('nama_objek') }}" placeholder="Masukkan nama objek wisata di sini" required="required">
            @if ($errors->has('nama_objek'))
                <p class="help-block">
                    <strong>{{ $errors->first('nama_objek') }}</strong>
                </p>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('kategori') ? ' has-error' : '' }}">
        <label for="" class="col-lg-2 control-label">Kategori *</label>
        <div class="col-lg-10">
          <select class="form-control" name="kategori" required="required">
            <option value="">- Pilih Kategori -</option>
              @foreach($kats as $kat)
                <option value="{{$kat->id}}" @if(old('kategori')&&old('kategori') == $kat->id) selected="selected" @endif> {{$kat->nama_kat}} </option>
              @endforeach
          </select>
            @if ($errors->has('kategori'))
                <p class="help-block">
                    <strong>{{ $errors->first('kategori') }}</strong>
                </p>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('keterangan') ? ' has-error' : '' }}">
        <label for="" class="col-lg-2 control-label">Deskripsi Singkat *</label>
        <div class="col-lg-10">
            <textarea id="messageArea" class="form-control ckeditor" name="keterangan" rows="7" placeholder="Masukkan deskripsi singkat di sini" required="required">{{ old('keterangan') }}</textarea>
            @if ($errors->has('keterangan'))
                <p class="help-block">
                    <strong>{{ $errors->first('keterangan') }}</strong>
                </p>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
        <label for="" class="col-lg-2 control-label">Status *</label>
        <div class="col-lg-10">
          <select class="form-control" name="status" required="required">
            <option value="">- Pilih Status -</option>
              <option value="Tampil" @if(old('status')&&old('status')=='Tampil') selected="selected" @endif> Tampil </option>
              <option value="Sembunyi" @if(old('status')&&old('status')=='Sembunyi') selected="selected" @endif> Sembunyi </option>
          </select>
            @if ($errors->has('status'))
                <p class="help-block">
                    <strong>{{ $errors->first('status') }}</strong>
                </p>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
    <label for="image" class="col-lg-2 control-label">Gambar 1 *</label>
      <div class="col-lg-10">
        <input class="form-control" type="file" name="image" value="{{ old('image') }}">
        <p class="help-block">
          Ukuran 900x500 pixel
        </p>
          @if ($errors->has('image'))
              <p class="help-block">
                  <strong>{{ $errors->first('image') }}</strong>
              </p>
          @endif
      </div>
    </div>

    <div class="form-group{{ $errors->has('image2') ? ' has-error' : '' }}">
    <label for="image2" class="col-lg-2 control-label">Gambar 2 *</label>
      <div class="col-lg-10">
        <input class="form-control" type="file" name="image2" required="required" value="{{ old('image2') }}">
        <p class="help-block">
          Ukuran 900x500 pixel
        </p>
          @if ($errors->has('image2'))
              <p class="help-block">
                  <strong>{{ $errors->first('image2') }}</strong>
              </p>
          @endif
      </div>
    </div>

    <div class="form-group{{ $errors->has('image3') ? ' has-error' : '' }}">
    <label for="image3" class="col-lg-2 control-label">Gambar 3 *</label>
      <div class="col-lg-10">
        <input class="form-control" type="file" name="image3" required="required" value="{{ old('image3') }}">
        <p class="help-block">
          Ukuran 900x500 pixel
        </p>
          @if ($errors->has('image3'))
              <p class="help-block">
                  <strong>{{ $errors->first('image3') }}</strong>
              </p>
          @endif
      </div>
    </div>

    <div class="form-group{{ $errors->has('img_slider') ? ' has-error' : '' }}">
    <label for="img_slider" class="col-lg-2 control-label">Slider Gambar</label>
      <div class="col-lg-10">
        <input class="form-control" type="file" name="img_slider" value="{{ old('img_slider') }}">
        <p class="help-block">
          <i><b> Boleh diisi boleh tidak (silakan diisi jika ingin menampilkan objek wisata ini pada slider) </b></i> <br>
          Ukuran 1920x540 pixel
        </p>
          @if ($errors->has('img_slider'))
              <p class="help-block">
                  <strong>{{ $errors->first('img_slider') }}</strong>
              </p>
          @endif
      </div>
    </div>

    <div class="form-group{{ $errors->has('sumber_gambar') ? ' has-error' : '' }}">
        <label for="" class="col-lg-2 control-label">Sumber Gambar *</label>
        <div class="col-lg-10">
            <input class="form-control" type="text" name="sumber_gambar" value="{{ old('sumber_gambar') }}" placeholder="Masukkan sumber gambar di sini" required="required">
            @if ($errors->has('sumber_gambar'))
                <p class="help-block">
                    <strong>{{ $errors->first('sumber_gambar') }}</strong>
                </p>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('map') ? ' has-error' : '' }}">
        <label for="map" class="col-lg-2 control-label">Map *</label>
        <div class="col-lg-10">
              <div class="col-sm-12">

                  <div class="form-group">
                    <input type="text" name="alamat" id="searchmap" class="form-control" required="" value="{{ old('alamat') }}">
                    <div class="panel-body">
                      <div id="map-canvas"></div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="">Lat *</label>
                    <input type="text" class="form-control input-sm" name="lat" id="lat" required="required">
                  </div>

                  <div class="form-group">
                    <label for="">Lng *</label>
                    <input type="text" class="form-control input-sm" name="lng" id="lng" required="required">
                  </div>
              </div>

        </div>
    </div>

    <div class="form-group">
        <div class="col-lg-offset-2 col-lg-10">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <button type="submit" class="btn btn-primary"><i class="fa fa-lg fa-check-square-o"></i> Proses</button>
        </div>
    </div>
</form>
</div>


<script>
  var map = new google.maps.Map(document.getElementById('map-canvas'),{
    center:{
      lat: -8.297588400000002,
      lng: 115.35487130000001
    },
    zoom:15
  });
  var marker = new google.maps.Marker({
    position: {
      lat: -8.297588400000002,
      lng: 115.35487130000001
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


@endsection
