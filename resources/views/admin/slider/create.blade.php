@extends('admin.layout.master')

@section('title', 'Buat Slider Objek Wisata')

@section('header')
  @parent

  <div class="">
      <ul class="breadcrumbs-alt">
          <li>
              <a href="{{URL('admin/dashboard')}}">Beranda</a>
          </li>
          <li>
              <a href="{{URL('admin/objek')}}">Slider Objek Wisata</a>
          </li>
          <li>
              <a href="#" class="current">Buat</a>
          </li>
      </ul>
  </div>

<div class="position-left">
  <form class="form-horizontal" id="signupForm" role="form" action="../slider" method="post" enctype="multipart/form-data">

    <div class="form-group{{ $errors->has('nama_objek') ? ' has-error' : '' }}">
        <label for="" class="col-lg-2 col-sm-2 control-label">Nama Objek</label>
        <div class="col-lg-10">
          <select class="form-control" name="nama_objek">
            <option value="">- Pilih Nama Objek -</option>
            @foreach($slider as $objeks)
              <option value="{{ $objeks->id  }}"> {{ $objeks -> nama_objek }}</option>
            @endforeach
          </select>

            @if ($errors->has('nama_objek'))
                <p class="help-block">
                    <strong>{{ $errors->first('nama_objek') }}</strong>
                </p>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
    <label for="image" class="col-lg-2 col-sm-2 control-label">Gambar Slider</label>
      <div class="col-lg-10">
        <input class="form-control" type="file" name="image" value="{{ old('image') }}">
        <p class="help-block">
          Ukuran 1920x540 pixel
        </p>
          @if ($errors->has('image'))
              <p class="help-block">
                  <strong>{{ $errors->first('image') }}</strong>
              </p>
          @endif
      </div>
    </div>

    <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
        <label for="" class="col-lg-2 col-sm-2 control-label">Status</label>
        <div class="col-lg-10">
          <select class="form-control" name="status">
            <option value="">- Pilih Status -</option>
            <option value="tampil"> Tampil </option>
            <option value="sembunyi"> Sembunyi </option>
          </select>

            @if ($errors->has('status'))
                <p class="help-block">
                    <strong>{{ $errors->first('status') }}</strong>
                </p>
            @endif
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


@endsection

@section('footer')
@endsection
