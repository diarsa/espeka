@extends('admin.layout.master')

@section('title', 'Detail Pengguna')

@section('header')
  @parent

  <div class="">
      <ul class="breadcrumbs-alt">
          <li>
              <a href="{{URL('/admin')}}">Beranda</a>
          </li>
          <li>
              <a href="{{URL('admin/users')}}">Users</a>
          </li>
          <li>
              <a href="#" class="current">Detail</a>
          </li>
      </ul>
  </div>

  <h4><b>
    {{ $user->name }} {{ $user->lastname }}
  </b></h4>
  Dibuat tanggal {{ date('d F Y' , strtotime($user->created_at) )}}
  <br><br>

<div class="col-lg-2">
  <img src="{{asset("assets/images/users/$user->img")}}" onerror="this.src='{{ asset ("assets/images/users/green.jpg") }}'" alt="" width="100%"/>
</div>

<div class="col-lg-8">
<div class="position-left">
  <form class="form-horizontal">
    <div class="form-group">
        <label for="" class="col-lg-4 control-label">Nama Depan</label>
        <div class="col-lg-8">
          <input class="form-control" type="text" name="" id="disabledInput" value="" placeholder="{{ $user->name }}" disabled>
        </div>
    </div>
    <div class="form-group">
        <label for="" class="col-lg-4 control-label">Nama Belakang</label>
        <div class="col-lg-8">
          <input class="form-control" type="text" name="" id="disabledInput" value="" placeholder="{{ $user->lastname }}" disabled>
        </div>
    </div>
    <div class="form-group">
        <label for="" class="col-lg-4 control-label">Email</label>
        <div class="col-lg-8">
          <input class="form-control" type="text" name="" id="disabledInput" value="" placeholder="{{ $user->email }}" disabled>
        </div>
    </div>
    <div class="form-group">
        <label for="" class="col-lg-4 control-label">Status</label>
        <div class="col-lg-8">
            <input class="form-control" type="text" name="" id="disabledInput" value="" placeholder="{{ $user->role }}" disabled>
        </div>
    </div>
  </form>
</div>
</div>



@endsection

@section('footer')
@endsection
