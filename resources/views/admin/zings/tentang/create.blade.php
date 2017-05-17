@extends('layout.master')

@section('title', 'Buat Objek Wisata')

@section('header')
  @parent

  <div class="">
      <ul class="breadcrumbs-alt">
          <li>
              <a href="{{URL('dashboard')}}">Beranda</a>
          </li>
          <li>
              <a href="{{URL('objek')}}">Objek Wisata</a>
          </li>
          <li>
              <a href="#" class="current">Buat</a>
          </li>
      </ul>
  </div>

<div class="position-left">
    <form class="form-horizontal" role="form" action="../objek" method="post">
    <div class="form-group {{ $errors->has('nama_objek') ? ' has-error' : '' }}">
        <label for="" class="col-lg-2 col-sm-2 control-label">Nama Objek Wisata</label>
        <div class="col-lg-10">
            <input class="form-control" type="text" name="nama_objek" value="" placeholder="Nama Objek Wisata..." required="required">
            @if ($errors->has('nama_objek'))
                <p class="help-block">
                    <strong>{{ $errors->first('nama_objek') }}</strong>
                </p>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('alamat') ? ' has-error' : '' }}">
        <label for="" class="col-lg-2 col-sm-2 control-label">Alamat</label>
        <div class="col-lg-10">
            <input class="form-control" type="text" name="alamat" value="" placeholder="Alamat ..." required="required">
            @if ($errors->has('alamat'))
                <p class="help-block">
                    <strong>{{ $errors->first('alamat') }}</strong>
                </p>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('keterangan') ? ' has-error' : '' }}">
        <label for="" class="col-lg-2 col-sm-2 control-label">Keterangan</label>
        <div class="col-lg-10">
            <textarea id="messageArea" class="form-control ckeditor" name="keterangan" rows="7" placeholder="Keterangan ..." required="required"></textarea>
            @if ($errors->has('keterangan'))
                <p class="help-block">
                    <strong>{{ $errors->first('keterangan') }}</strong>
                </p>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
        <label for="" class="col-lg-2 col-sm-2 control-label">Status</label>
        <div class="col-lg-10">
          <select class="form-control" name="status" required="required">
            <option value="">- Pilih Status -</option>
              <option value="Tampil"> Tampil </option>
              <option value="Sembunyi"> Sembunyi </option>
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
          <button type="submit" class="btn btn-danger">Buat</button>
        </div>
    </div>
</form>
</div>





@endsection

@section('footer')
@endsection
