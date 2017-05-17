@extends('admin.layout.master')

@section('title', 'Edit Pengguna')

@section('header')
  @parent

<div class="">
  <ul class="breadcrumbs-alt">
      <li>
          <a href="{{URL('admin/dashboard')}}">Beranda</a>
      </li>
      <li>
          <a href="{{URL('admin/users')}}">User</a>
      </li>
      <li>
          <a href="#" class="current">Edit</a>
      </li>
  </ul>
</div>

<div class="alert alert-info fade in">
  <i class="fa fa-info-circle "></i> 
  Silakan isi data sesuai dengan kolom yang tersedia. Tanda * berarti data harus diisi. 
</div>

<div class="position-left">
    <form class="form-horizontal" id="signupForm" role="form" action="../../users/{{$user->id}}" method="post" enctype="multipart/form-data">
    <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
        <label for="name" class="col-lg-2 control-label">Nama Depan</label>
        <div class="col-lg-10">
            <input class="form-control" type="text" name="name" value="{{$user->name}}" placeholder="Nama ..." required="required" disabled="">
            @if ($errors->has('name'))
                <p class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </p>
            @endif
        </div>
    </div>

    <div class="form-group {{ $errors->has('lastname') ? ' has-error' : '' }}">
        <label for="lastname" class="col-lg-2 control-label">Nama Belakang</label>
        <div class="col-lg-10">
            <input class="form-control" type="text" name="lastname" value="{{$user->lastname}}" placeholder="" required="required" disabled="">
            @if ($errors->has('lastname'))
                <p class="help-block">
                    <strong>{{ $errors->first('lastname') }}</strong>
                </p>
            @endif
        </div>
    </div>

    <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
        <label for="email" class="col-lg-2 control-label">Email</label>
        <div class="col-lg-10">
            <input class="form-control" type="text" name="email" value="{{$user->email}}" placeholder="" required="required" disabled="">
            @if ($errors->has('email'))
                <p class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </p>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
        <label for="role" class="col-lg-2 control-label">Status</label>
        <div class="col-lg-10">
          <select class="form-control" name="role" required="required" value="{{$user->role}}">
                <option value="admin" @if($user->role=="admin") selected="selected" @endif> Admin </option>
                <option value="petugas" @if($user->role=="petugas") selected="selected" @endif> Petugas </option>
                <option value="wisatawan" @if($user->role=="wisatawan") selected="selected" @endif> Wisatawan </option>
          </select>
            @if ($errors->has('role'))
                <p class="help-block">
                    <strong>{{ $errors->first('role') }}</strong>
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
