@extends('admin.layout.master')

@section('title', 'Edit Testimoni')

@section('header')
  @parent

<div class="">
  <ul class="breadcrumbs-alt">
      <li>
          <a href="{{URL('admin/dashboard')}}">Beranda</a>
      </li>
      <li>
          <a href="{{URL('admin/testi')}}">Testimoni</a>
      </li>
      <li>
          <a href="#" class="current">Edit</a>
      </li>
  </ul>
</div>

<div class="position-left">
    <form class="form-horizontal" id="signupForm" role="form" action="../../testi/{{$testimo->id}}" method="post" enctype="multipart/form-data">
    <div class="form-group {{ $errors->has('nama') ? ' has-error' : '' }}">
        <label for="nama" class="col-lg-2 col-sm-2 control-label">Nama </label>
        <div class="col-lg-10">
            <input class="form-control" type="text" name="nama" value="{{$testimo->nama}}" placeholder="Nama ..." required="required" disabled="">
            @if ($errors->has('nama'))
                <p class="help-block">
                    <strong>{{ $errors->first('nama') }}</strong>
                </p>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('negara') ? ' has-error' : '' }}">
        <label for="negara" class="col-lg-2 col-sm-2 control-label">Negara</label>
        <div class="col-lg-10">
          <select class="form-control" name="negara" required="required" value="{{$testimo->negara}}" disabled="">
              @foreach($negaras as $negara)
                <option value="{{$negara->nama_kriteria_sub}}" @if($testimo->negara==$negara->nama_kriteria_sub) selected="selected" @endif> {{$negara->nama_kriteria_sub}} </option>
              @endforeach
          </select>
            @if ($errors->has('negara'))
                <p class="help-block">
                    <strong>{{ $errors->first('negara') }}</strong>
                </p>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('isi') ? ' has-error' : '' }}">
        <label for="isi" class="col-lg-2 col-sm-2 control-label">Isi</label>
        <div class="col-lg-10">
            <textarea id="messageArea" class="form-control" name="isi" rows="3" placeholder="Masukkan embed isi disini" required="required" disabled="">{{$testimo->isi}}</textarea>
            @if ($errors->has('isi'))
                <p class="help-block">
                    <strong>{{ $errors->first('isi') }}</strong>
                </p>
            @endif
        </div>
    </div>

    <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
        <label for="email" class="col-lg-2 col-sm-2 control-label">Email </label>
        <div class="col-lg-10">
            <input class="form-control" type="text" name="email" value="{{$testimo->email}}" placeholder="Nama ..." required="required" disabled="">
            @if ($errors->has('email'))
                <p class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </p>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
        <label for="status" class="col-lg-2 col-sm-2 control-label">Status</label>
        <div class="col-lg-10">
          <select class="form-control" name="status" required="required" value="{{$testimo->status}}">
                <option value="tampil" @if($testimo->status=="tampil") selected="selected" @endif> tampil </option>
                <option value="sembunyi" @if($testimo->status=="sembunyi") selected="selected" @endif> sembunyi </option>
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
