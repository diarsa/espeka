@extends('layout.master2')

@section('title', 'Create Tourist Recomend')

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
                        <li>Tourist</li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</section>

<hr>

<div class="col-md-6">
  <div class="dividerHeading">
      <h4><span>Keterangan</span></h4>
  </div>
  <blockquote class="default">
    Please enter your full name for you.
  </blockquote>
</div>

<div class="col-md-6 column">
<div class="well well-sm">Step 2 of 6 </div>

<form class="col-md-12 column" id="signupForm" action="{{URL('/wisatawans/page2')}}" method="post" align="">
  <div class="dividerHeading">
      <h4><span>Country</span></h4>
  </div>

  <div class="form-group{{ $errors->has('negara') ? ' has-error' : '' }}">
    <select id="e1" class="populate" style="width:100%" name="negara">
      <option value="">- Choice Country -</option>
      @foreach($pages2 as $negara)
        <option value="{{ $negara->nama_kriteria_sub }}"> {{ $negara -> nama_kriteria_sub }}</option>
      @endforeach
    </select>
    @if ($errors->has('negara'))
        <p class="help-block">
            <strong>{{ $errors->first('negara') }}</strong>
        </p>
    @endif
  </div><hr>

  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <button type="submit" name="name" class="btn btn-success"><i class="fa fa-check-circle"></i> Proses</button>

</form>

<form class="col-md-12" align="right" action="{{URL('/wisatawans/page3')}}">
  <button type="button" class="btn btn-primary" name="button" onclick="history.go(-1)"><i class="fa fa-arrow-circle-left"></i>
    Back</button>
  <button type="submit" class="btn btn-primary">
    Next <i class="fa fa-arrow-circle-right"></i>
  </button>
</form>

</div>





@endsection
