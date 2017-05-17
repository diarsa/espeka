@extends('admin.layout.master')

@section('title', 'Ubah Tentang')

@section('header')
  @parent

  <div class="">
      <ul class="breadcrumbs-alt">
          <li>
              <a href="{{URL('admin/dashboard')}}">Beranda</a>
          </li>
          <li>
              <a href="{{URL('admin/tentang')}}">Tentang</a>
          </li>
          <li>
              <a href="#" class="current">Ubah</a>
          </li>
      </ul>
  </div>

<div class="position-left">
    <form class="form-horizontal" role="form" action="../../tentang/{{$tentang->id}}" method="post">
    <div class="form-group {{ $errors->has('deskripsi') ? ' has-error' : '' }}">
        <label for="" class="col-lg-2 col-sm-2 control-label">Deskripsi</label>
        <div class="col-lg-10">
          <textarea id="messageArea" class="form-control ckeditor" name="deskripsi" rows="7" placeholder="Keterangan ..." required="required"> {{$tentang->deskripsi}}</textarea>
            @if ($errors->has('deskripsi'))
                <p class="help-block">
                    <strong>{{ $errors->first('deskripsi') }}</strong>
                </p>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('alamat') ? ' has-error' : '' }}">
        <label for="" class="col-lg-2 col-sm-2 control-label">Alamat</label>
        <div class="col-lg-10">
            <input class="form-control" type="text" name="alamat" value="{{$tentang->alamat}}" placeholder="Alamat ..." required="required">
            @if ($errors->has('alamat'))
                <p class="help-block">
                    <strong>{{ $errors->first('alamat') }}</strong>
                </p>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('telepon') ? ' has-error' : '' }}">
        <label for="" class="col-lg-2 col-sm-2 control-label">Telepon</label>
        <div class="col-lg-10">
            <input class="form-control" type="text" name="telepon" value="{{$tentang->telepon}}" placeholder="Telepon ..." required="required">
            @if ($errors->has('telepon'))
                <p class="help-block">
                    <strong>{{ $errors->first('telepon') }}</strong>
                </p>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <label for="" class="col-lg-2 col-sm-2 control-label">Email</label>
        <div class="col-lg-10">
            <input class="form-control" type="text" name="email" value="{{$tentang->email}}" placeholder="Email ..." required="required">
            @if ($errors->has('email'))
                <p class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </p>
            @endif
        </div>
    </div>

    <div class="form-group">
        <div class="col-lg-offset-2 col-lg-10">
          <input type="hidden" name="_method" value="put">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input type="submit" class="btn btn-warning" value="Ubah">
        </div>
    </div>
  </form>
</div>


@endsection

@section('footer')
@endsection
