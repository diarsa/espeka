@extends('layout.master2')

@section('title', 'Create Testimonial')

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
                          <li><a href="{{URL('testi')}}">Testimonials</a>/</li>
                          <li>Create</li>
                      </ul>
                  </nav>
              </div>
          </div>
      </div>
  </section>

<br>

<hr>

<form class="" action="../testi" method="post">
  <label> Name </label>
  <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    <input class="form-control" type="text" name="name" value="{{ old('name') }}" placeholder="Your name ..." required="required">
    @if ($errors->has('name'))
        <p class="help-block">
            <strong>{{ $errors->first('name') }}</strong>
        </p>
    @endif
  </div>

  <label> Country </label>
  <div class="form-group{{ $errors->has('country') ? ' has-error' : '' }}">
    <select class="form-control" name="country" required="required">
      <option value="">- Select Country -</option>
        @foreach($negaras as $negara)
          <option value="{{$negara->nama_kriteria_sub}}" @if(old('country')&&old('country') == $negara->nama_kriteria_sub) selected="selected" @endif> {{$negara->nama_kriteria_sub}} </option>
        @endforeach
    </select>
    @if ($errors->has('country'))
        <p class="help-block">
            <strong>{{ $errors->first('country') }}</strong>
        </p>
    @endif
  </div>

  <label> Message </label>
  <div class="form-group{{ $errors->has('message') ? ' has-error' : '' }}">
    <textarea id="messageArea" class="form-control ckeditor" name="message" rows="7" placeholder="Your message ..." required="required" value="{{ old('message') }}"></textarea>
    @if ($errors->has('message'))
        <p class="help-block">
            <strong>{{ $errors->first('message') }}</strong>
        </p>
    @endif
  </div>

  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <input type="submit" class="btn btn-primary" name="" value="Post">
</form>


@endsection

@section('footer')
@endsection
