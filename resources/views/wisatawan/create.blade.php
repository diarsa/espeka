@extends('layout.master2')

@section('title', 'Create Recommendation')

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

{{-- <div class="col-md-6">
  <div class="dividerHeading">
      <h4><span>Keterangan</span></h4>
  </div>
  <blockquote class="default">Silakan masuk atau login dahulu untuk dapat mengetahui rekomendasi objek wisata.</blockquote>
  <blockquote class="default">Jika belum mempunyai akun, silakan untuk mendaftar dahulu melalui halaman <a href="{{url('register')}}" class="">Daftar</a> </blockquote>
  <blockquote class="default">Satu akun dapat menyimpan banyak rekomendasi objek wisata. </blockquote>
</div> --}}

<div class="col-md-6 column">

{{-- <form class="col-md-12 column" id="signupForm" action="{{URL('/wisatawan')}}" method="post" align="">
  <label for="nama"> Name </label>
  <div class="form-group{{ $errors->has('nama') ? ' has-error' : '' }}">
    <input class="form-control" type="text" name="nama" value="" placeholder="Place name in here ..." id="nama" value="{{ old('nama') }}">
    @if ($errors->has('nama'))
        <p class="help-block">
            <strong>{{ $errors->first('nama') }}</strong>
        </p>
    @endif
  </div><hr>

  <label for="negara"> Country </label> <br>
  <div class="form-group{{ $errors->has('negara') ? ' has-error' : '' }}">
    <select id="e2" class="populate" style="width:100%" name="negara" required="required">
      <option value="">- Choice Country -</option>
      @foreach($negaras as $negara)
        <option value="{{ $negara->nama_kriteria_sub }}"> {{ $negara -> nama_kriteria_sub }}</option>
      @endforeach
    </select>
    @if ($errors->has('negara'))
        <p class="help-block">
            <strong>{{ $errors->first('negara') }}</strong>
        </p>
    @endif
  </div><hr>

  <label for="jk"> Sex </label> <br>
  <div class="form-group{{ $errors->has('jk') ? ' has-error' : '' }}">
    <input type="radio" name="jk" value="Laki-laki" checked="checked"> Male <br>
    <input type="radio" name="jk" value="Perempuan"> Female <br>
    @if ($errors->has('jk'))
        <p class="help-block">
            <strong>{{ $errors->first('jk') }}</strong>
        </p>
    @endif
  </div><hr>

  <label for="tujuan"> Tujuan </label> <br>
  <div class="form-group{{ $errors->has('tujuan') ? ' has-error' : '' }}">
    <select id="e4" class="form-control populate" style="" name="tujuan" required="required">
      <option value="">- Choice Tujuan -</option>
      @foreach($tujuans as $tujuan)
        <option value="{{ $tujuan->nama_kriteria_sub }}"> {{ $tujuan -> nama_kriteria_sub }}</option>
      @endforeach
    </select>
    @if ($errors->has('tujuan'))
        <p class="help-block">
            <strong>{{ $errors->first('tujuan') }}</strong>
        </p>
    @endif
  </div><hr>

  <label for="umur"> Age </label>
  <div class="form-group{{ $errors->has('umur') ? ' has-error' : '' }}">
    <select id="e1" class="populate" style="width:100%" name="umur" required="required">
      <option value="">- Choice Age -</option>
      @for($i=1; $i <= 100; $i++)
        <option value="{{ $i }}"> {{ $i }}</option>
      @endfor
    </select>
    @if ($errors->has('umur'))
        <p class="help-block">
            <strong>{{ $errors->first('umur') }}</strong>
        </p>
    @endif
  </div><hr>

  <label for="kunjungan"> Frecuency </label> <br>
  <div class="form-group{{ $errors->has('kunjungan') ? ' has-error' : '' }}">
    <select id="e3" class="populate" style="width:100%" name="kunjungan" required="required">
      <option value="">- Choice Frecuency -</option>
      @for($ik=1; $ik <= 100; $ik++)
        <option value="{{ $ik }}"> {{ $ik }}</option>
      @endfor
    </select>
    @if ($errors->has('kunjungan'))
        <p class="help-block">
            <strong>{{ $errors->first('kunjungan') }}</strong>
        </p>
    @endif
  </div><hr>





  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <input type="submit" class="btn btn-primary" name="name" value="Proses">
</form> --}}

</div>


<div class="col-md-12">

</div>

<div class="col-md-12">
<form class="" id="" action="{{URL('/wisatawan')}}" method="post">
  <blockquote class="default">
    Click <b>Next</b> for the next step. Or <b>Previous</b> for previous step. And click <b>Process</b> for know the result of recommend.
  </blockquote>
<div id="wizard" class="">
  <h2>First Step</h2>
  <section>
    <blockquote class="default">
      Please fill your full name to identify the recommendation or you can use anonymous name. <b>This field is required.</b> 
    </blockquote>
      <div class="form-group promo_box">
          <label class="col-lg-2 control-label">Full Name</label>
          <div class="col-lg-8">
              <input type="text" name="name" class="form-control" placeholder="Full Name" >
          </div>
      </div>
  </section>

  <h2>Second Step</h2>
  <section>
    <blockquote class="default">
      Select your country or region on the button select country. <b>This field is required.</b> 
    </blockquote>
      <div class="form-group promo_box">
          <label class="col-lg-2 control-label">Country</label>
          <div class="col-lg-8">
            <select id="" class="form-control" style="width:100%" name="country" >
              <option value="">- Select Country -</option>
              @foreach($negaras as $negara)
                <option value="{{ $negara->kode }}"> {{ $negara -> nama_kriteria_sub }}</option>
              @endforeach
            </select>
          </div>
      </div>
  </section>

  <h2>Third Step</h2>
  <section>
    <blockquote class="default">
      Select your gender on button select gender. <b>This field is required.</b>
    </blockquote>
      <div class="form-group promo_box">
          <label class="col-lg-2 control-label">Gendre</label>
          <div class="col-lg-8">
            <select id="" class="form-control" style="width:100%" name="gendre" >
              <option value="">- Select Gender -</option>
              @foreach($jks as $jk)
                <option value="{{ $jk->kode }}"> {{ $jk -> nama_kriteria_sub }}</option>
              @endforeach
            </select>
          </div>
      </div>
  </section>

  <h2>Fourth Step</h2>
  <section>
    <blockquote class="default">
      Select one of your porpuse visiting Bangli, Bali.
    </blockquote>
      <div class="form-group promo_box">
          <label class="col-lg-2 control-label">Purpose</label>
          <div class="col-lg-8">
            <select id="" class="form-control populate" style="" name="purpose">
              <option value="">- Select Purpose -</option>
              @foreach($tujuans as $tujuan)
                <option value="{{ $tujuan->kode }}"> {{ $tujuan -> nama_kriteria_sub }}</option>
              @endforeach
            </select>
          </div>
      </div>
  </section>

  <h2>Fifth Step</h2>
  <section>
    <blockquote class="default">
      Select how old you are. Example: "21 years old". So just select 21.
    </blockquote>
      <div class="form-group promo_box">
          <label class="col-lg-2 control-label">Age</label>
          <div class="col-lg-8">
            <select id="" class="form-control populate" style="" name="age" >
              <option value="">- Select Age -</option>
              @for($i=1; $i <= 100; $i++)
                <option value="{{ $i }}"> {{ $i }}</option>
              @endfor
            </select>
          </div>
      </div>
  </section>

  <h2>Sixth Step</h2>
  <section>
    <blockquote class="default">
      Select how many times you've been to Bangli, Bali. Example: "3 times". So just select 3.
    </blockquote>
      <div class="form-group promo_box">
          <label class="col-lg-2 control-label">Frequency</label>
          <div class="col-lg-8">
            <select id="" class="form-control populate" style="" name="frequency" >
              <option value="">- Select frequency visit -</option>
              @for($ik=1; $ik <= 50; $ik++)
                <option value="{{ $ik }}"> {{ $ik }}</option>
              @endfor
            </select>
          </div>
      </div>
  </section>

  <h2>Check data</h2>
  <section>
    <blockquote class="default">
      Ensure that all required data has been entered correctly. Buttons process will not work if there are still required data has not been filled in correctly. After that you can click button <b>Process</b> in final step for know the recommend.
    </blockquote>
  </section>

  <h2>Final Step</h2>
  <section>
      <div class="form-group promo_box">
          <div class="col-lg-12" align="right">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <button type="submit" class="btn btn-default"><i class="fa fa-lg fa-check-square-o"></i> Process</button>
          </div>
      </div>
  </section>

</div>



</form>
</div>
</div>











@endsection
