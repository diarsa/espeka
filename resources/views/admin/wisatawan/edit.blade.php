@extends('admin.layout.master')

@section('title', 'Ubah Wisatawan')

@section('header')
  @parent

  <div class="">
    <ul class="breadcrumbs-alt">
        <li>
            <a href="{{URL('dashboard')}}">Beranda</a>
        </li>
        <li>
            <a href="{{URL('wisata')}}" class="current">Wisatawan</a>
        </li>
        <li>
            <a href="#" class="current">Ubah</a>
        </li>
    </ul>
  </div>

<br>
<form class="" action="../../wisata/{{$wisata->id}}" method="post">
<label> Nama </label>
  <div class="form-group{{ $errors->has('nama') ? ' has-error' : '' }}">
  <input class="form-control" type="text" name="nama" value="{{$wisata->nama}}" placeholder="Nama ..."><br><br>
  @if ($errors->has('nama'))
      <p class="help-block">
          <strong>{{ $errors->first('nama') }}</strong>
      </p>
  @endif
  </div>

  <label> Negara </label>
  <div class="form-group{{ $errors->has('negara') ? ' has-error' : '' }}">
    <input class="form-control" type="text" name="negara" value="{{$wisata->negara}}" placeholder="Negara ..."><br><br>
    @if ($errors->has('negara'))
        <p class="help-block">
            <strong>{{ $errors->first('negara') }}</strong>
        </p>
    @endif
  </div>

  <label> Umur </label>
  <div class="form-group{{ $errors->has('umur') ? ' has-error' : '' }}">
    <input class="form-control" type="text" name="umur" value="{{$wisata->umur}}" placeholder="Umur ..."><br><br>
    @if ($errors->has('umur'))
        <p class="help-block">
            <strong>{{ $errors->first('umur') }}</strong>
        </p>
    @endif
  </div>

  <label> Jenis Kelamin </label>
  <br>
  <div class="form-group{{ $errors->has('jk') ? ' has-error' : '' }}">
    <input type="radio" name="jk" value="Laki-laki" checked="">Laki-laki<br>
    <input type="radio" name="jk" value="Perempuan" checked="">Perempuan<br><br>
    @if ($errors->has('jk'))
        <p class="help-block">
            <strong>{{ $errors->first('jk') }}</strong>
        </p>
    @endif
  </div>

  <label> Tujuan </label><br>
  <div class="form-group{{ $errors->has('tujuan') ? ' has-error' : '' }}">
    <input type="radio" name="tujuan" value="Berlibur" checked=""> Berlibur <br>
    <input type="radio" name="tujuan" value="Penelitian" checked=""> Penelitian <br>
    <input type="radio" name="tujuan" value="Mengunjungi Kerabat" checked=""> Mengunjungi Kerabat <br>
    <input type="radio" name="tujuan" value="Yang lain" checked=""> Yang lain <br><hr>
    @if ($errors->has('tujuan'))
        <p class="help-block">
            <strong>{{ $errors->first('tujuan') }}</strong>
        </p>
    @endif
  </div>

  <input type="hidden" name="_method" value="put">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <input type="submit" class="btn btn-primary" value="Edit">
</form>


@endsection

@section('footer')
@endsection
