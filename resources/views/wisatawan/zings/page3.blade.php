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
<div class="well well-sm">Step 3 of 6 </div>

<form class="col-md-12 column" id="signupForm" action="{{URL('/wisatawan')}}" method="post" align="">
  <div class="dividerHeading">
      <h4><span>Gendre</span></h4>
  </div>

  <div class="form-group{{ $errors->has('jk') ? ' has-error' : '' }}">
    <select id="e1" class="populate" style="width:100%" name="jk">
      <option value="">- Choice Gendre -</option>
      @foreach($pages3 as $jk)
        <option value="{{ $jk->nama_kriteria_sub }}"> {{ $jk -> nama_kriteria_sub }}</option>
      @endforeach
    </select>
    @if ($errors->has('jk'))
        <p class="help-block">
            <strong>{{ $errors->first('jk') }}</strong>
        </p>
    @endif
  </div><hr>

  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <button type="submit" name="name" class="btn btn-success"><i class="fa fa-check-circle"></i> Proses</button>

</form>

<form class="col-md-12" align="right" action="{{URL('/wisatawans/page4')}}">
  <button type="button" class="btn btn-primary" name="button" onclick="history.go(-1)"><i class="fa fa-arrow-circle-left"></i>
    Back</button>
  <button type="submit" class="btn btn-primary">
    Next <i class="fa fa-arrow-circle-right"></i>
  </button>
</form>

</div>





@endsection
