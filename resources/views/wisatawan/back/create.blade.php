@extends('layout.master2')

@section('title', 'Create Tourist')

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
                        <li><a href="{{URL('wisatawan')}}">Tourist</a></li>
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
  <blockquote class="default">Silakan masuk atau login dahulu untuk dapat mengetahui rekomendasi objek wisata.</blockquote>
  <blockquote class="default">Jika belum mempunyai akun, silakan untuk mendaftar dahulu melalui halaman <a href="{{url('register')}}" class="">Daftar</a> </blockquote>
  <blockquote class="default">Satu akun dapat menyimpan banyak rekomendasi objek wisata. </blockquote>
</div>

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
  <hr><br><hr>
</div>

<div class="col-md-12">
<div id="wizard">
  <h2>First Step</h2>

  <section>
      <form class="form-horizontal">
              <div class="form-group">
                  <label class="col-lg-2 control-label">Full Name</label>
                  <div class="col-lg-8">
                      <input type="text" class="form-control" placeholder="Full Name" required="required">
                  </div>
              </div>

          </form>
  </section>

  <h2>Second Step</h2>
  <section>
      <form class="form-horizontal">
          <div class="form-group">
              <label class="col-lg-2 control-label">Country</label>
              <select id="e2" class="populate" style="width:100%" name="negara" required="required">
                <option value="">- Choice Country -</option>
                @foreach($negaras as $negara)
                  <option value="{{ $negara->nama_kriteria_sub }}"> {{ $negara -> nama_kriteria_sub }}</option>
                @endforeach
              </select>
          </div>

      </form>
  </section>

  <h2>Third Step</h2>
  <section>
      <form class="form-horizontal">
          <div class="form-group">
              <label class="col-lg-2 control-label">Bill Name 1</label>
              <div class="col-lg-8">
                  <input type="text" class="form-control" placeholder="Phone">
              </div>
          </div>

      </form>
  </section>

  <h2>Fourth Step</h2>
  <section>
      <p>Congratulations This is the Final Step</p>
  </section>

  <h2>Fifth Step</h2>
  <section>
      <p>Congratulations This is the Final Step</p>
  </section>

  <h2>Sixth Step</h2>
  <section>
      <p>Congratulations This is the Final Step</p>
  </section>

  <h2>Final Step</h2>
  <section>
      <p>Congratulations This is the Final Step</p>
  </section>

</div>
</div>
</div>











@endsection
