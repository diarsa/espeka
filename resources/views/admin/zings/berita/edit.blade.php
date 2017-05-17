@extends('admin.layout.master')

@section('title', 'Edit Berita')

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
              <a href="#" class="current">Ubah</a>
          </li>
      </ul>
  </div>

<div class="position-left">
  <form class="form-horizontal" id="signupForm" role="form" action="../../berita/{{$berita->id}}" method="post" enctype="multipart/form-data">
    <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
        <label for="" class="col-lg-2 col-sm-2 control-label">Judul/title *</label>
        <div class="col-lg-10">
            <input class="form-control" type="text" name="title" value="{{$berita->title}}" placeholder="Masukkan judul/title di sini" required="required">
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
          <textarea id="messageArea" class="form-control ckeditor" name="subject" rows="7" placeholder="Isi/content ..." required="required" value="{{ old('subject') }}"> {{$berita->subject}} </textarea>
          @if ($errors->has('subject'))
              <p class="help-block">
                  <strong>{{ $errors->first('subject') }}</strong>
              </p>
          @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('imgb') ? ' has-error' : '' }}">
    <label for="imgb" class="col-lg-2 col-sm-2 control-label">Gambar *</label>
      <div class="col-lg-10">
        <input class="form-control" type="file" name="imgb" value="{{ old('imgb') }}">
        <p class="help-block">
          Ukuran 630x320 pixel
        </p>
        <img src="">
          @if ($errors->has('imgb'))
              <p class="help-block">
                  <strong>{{ $errors->first('imgb') }}</strong>
              </p>
          @endif

          <img src="{{asset("assets/images/berita/$berita->img")}}" alt="" width="200" onerror="this.src='{{ asset ("assets/images/error/blog_1.png") }}'"/>
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
