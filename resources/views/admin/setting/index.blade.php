@extends('admin.layout.master')

@section('title', 'Pengaturan')

@section('header')
  @parent

    <div class="">
      <ul class="breadcrumbs-alt">
          <li>
              <a href="{{URL('admin/dashboard')}}">Beranda</a>
          </li>
          <li>
              <a href="#" class="current">Pengaturan</a>
          </li>
      </ul>
    </div>

<br>
@if(Session::has('message'))

  <div class="alert alert-success fade in">
    <button data-dismiss="alert" class="close close-sm" type="button">
      <i class="fa fa-times">
      </i>
    </button>
    <strong>
      {{ Session::get('message') }}
    </strong>
  </div>
@else

@endif

<div class="alert alert-info fade in">
  <i class="fa fa-info-circle "></i> 
  Silakan isi data sesuai dengan kolom yang tersedia. 
</div>

<div class="position-left">
  <form class="form-horizontal" id="signupForm" role="form" action="{{URL('admin/settings')}}" method="post" enctype="multipart/form-data">
    @foreach($settings as $setting)

    <div class="form-group">
        <label for="{{ $setting->setting}}" class="col-lg-2 control-label">{{ $setting->setting}}</label>
        <div class="col-lg-10">


            <input class="form-control" type="text" name="nama{{ $setting->id }}" value="{{ $setting->nama }}" placeholder="Masukkan nama setting di sini" required="required">

            <input class="form-control" type="text" name="isi{{ $setting->id }}" value="{{ $setting->isi }}" placeholder="Masukkan isi setting di sini" required="required">

              {{-- <textarea class="ckeditor form-control " name="isi{{ $setting->id }}" rows="3" placeholder="Masukkan isi di sini" required="required">
              {{ $setting->isi}}
              </textarea> --}}
        </div>
    </div>

    @endforeach

    <div class="form-group">
        <div class="col-lg-offset-2 col-lg-10">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <button type="submit" class="btn btn-primary"><i class="fa fa-lg fa-check-square-o"></i> Proses</button>
        </div>
    </div>
</form>










@endsection

@section('footer')
@endsection
