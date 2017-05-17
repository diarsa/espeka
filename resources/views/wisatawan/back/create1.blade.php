@extends('layout.master2')

@section('title', 'Buat Wisatawan')

@section('header')
  @parent

<section class="page_head">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="page_title">
                    <h2>@yield('title')</h2>
                </div>
                <nav id="breadcrumbs">
                    <ul>
                        <li><a href="{{URL('dashboard')}}">Home</a>/</li>
                        <li><a href="{{URL('wisatawan')}}">Wisatawan</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</section>

<hr>

<div class="col-md-9 column">

<form class="col-md-9 column" action="{{URL('/wisatawan')}}" method="post" align="">
  <label> Nama </label>
  <div class="form-group{{ $errors->has('nama') ? ' has-error' : '' }}">
    <input class="form-control" type="text" name="nama" value="" placeholder="Nama ..." required="required">
    @if ($errors->has('nama'))
        <p class="help-block">
            <strong>{{ $errors->first('nama') }}</strong>
        </p>
    @endif
  </div><hr>

  <label> Umur </label>
  <div class="form-group{{ $errors->has('umur') ? ' has-error' : '' }}">
    <input class="form-control" type="text" name="umur" value="" placeholder="Umur ... " required="required">
    @if ($errors->has('umur'))
        <p class="help-block">
            <strong>{{ $errors->first('umur') }}</strong>
        </p>
    @endif
  </div><hr>

  <label> Negara </label> <br>
  <div class="form-group{{ $errors->has('negara') ? ' has-error' : '' }}">
    <select class="" name="negara" required="required">
      <option value="">- Pilih Negara -</option>
      @foreach($negaras as $negara)
        <option value="{{ $negara->nama_negara }}"> {{ $negara -> nama_negara }}</option>
      @endforeach
    </select>
    @if ($errors->has('negara'))
        <p class="help-block">
            <strong>{{ $errors->first('negara') }}</strong>
        </p>
    @endif
  </div><hr>

  <label> Jenis Kelamin </label> <br>
  <div class="form-group{{ $errors->has('jk') ? ' has-error' : '' }}">
    <input type="radio" name="jk" value="Laki-laki" checked="checked"> Laki-laki <br>
    <input type="radio" name="jk" value="Perempuan"> Perempuan <br>
    @if ($errors->has('jk'))
        <p class="help-block">
            <strong>{{ $errors->first('jk') }}</strong>
        </p>
    @endif
  </div><hr>

  <label> Tujuan </label><br>
  <div class="form-group{{ $errors->has('tujuan') ? ' has-error' : '' }}">
    <input type="radio" name="tujuan" value="Berlibur" checked="checked"> Berlibur <br>
    <input type="radio" name="tujuan" value="Penelitian"> Penelitian <br>
    <input type="radio" name="tujuan" value="Mengunjungi Kerabat"> Mengunjungi Kerabat <br>
    <input type="radio" name="tujuan" value="Yang lain"> Yang lain <br>
    @if ($errors->has('tujuan'))
        <p class="help-block">
            <strong>{{ $errors->first('tujuan') }}</strong>
        </p>
    @endif
  </div><hr>

  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <input type="submit" class="btn btn-primary" name="name" value="Proses">
</form>

</div>

@endsection
