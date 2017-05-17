@extends('admin.layout.master')

@section('title', 'Buat Berita')

@section('header')
  @parent

<div class="">
      <ul class="breadcrumbs-alt">
          <li>
              <a href="{{URL('admin/dashboard')}}">Beranda</a>
          </li>
          <li>
              <a href="{{URL('admin/berita')}}">Berita</a>
          </li>
          <li>
              <a href="#" class="current">Buat</a>
          </li>
      </ul>
  </div>

<div class="position-left">
  <form class="form-horizontal" id="signupForm" role="form" action="../../admin/berita" method="post" enctype="multipart/form-data">
    <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
        <label for="" class="col-lg-2 col-sm-2 control-label">Judul/title *</label>
        <div class="col-lg-10">
            <input class="form-control" type="text" name="title" value="{{ old('title') }}" placeholder="Masukkan judul/title di sini" required="required">
            @if ($errors->has('title'))
                <p class="help-block">
                    <strong>{{ $errors->first('title') }}</strong>
                </p>
            @endif
        </div>
    </div>

    <div class="form-group {{ $errors->has('subject') ? ' has-error' : '' }}">
        <label for="" class="col-lg-2 col-sm-2 control-label">Isi/content *</label>
        <div class="col-lg-10">
          <textarea id="messageArea" class="form-control ckeditor" name="subject" rows="7" placeholder="Isi/content ..." required="required" value="{{ old('subject') }}"></textarea>
          @if ($errors->has('subject'))
              <p class="help-block">
                  <strong>{{ $errors->first('subject') }}</strong>
              </p>
          @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
    <label for="image" class="col-lg-2 col-sm-2 control-label">Gambar *</label>
      <div class="col-lg-10">
        <input class="form-control" type="file" name="image" value="{{ old('image') }}">
        <p class="help-block">
          Ukuran 630x320 pixel
        </p>
          @if ($errors->has('image'))
              <p class="help-block">
                  <strong>{{ $errors->first('image') }}</strong>
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
