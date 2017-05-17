@extends('admin.layout.master2')

@section('title', 'Buat Wisatawan')

@section('header')
  @parent

  <div class="">
    <ul class="breadcrumbs-alt">
        <li>
            <a href="{{URL('admin/dashboard')}}">Beranda</a>
        </li>
        <li>
            <a href="{{URL('admin/wisatawan')}}">Wisatawan</a>
        </li>
        <li>
            <a href="#" class="current">Buat</a>
        </li>
    </ul>
  </div>

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
  Silakan isi data sesuai dengan kolom yang tersedia. Tanda * berarti data harus diisi. 
</div>

<div class="position-left">
<form class="form-horizontal" id="signupForm" role="form" action="../wisatawan" method="post" align="" enctype="multipart/form-data">

  <div class="form-group {{ $errors->has('nama') ? ' has-error' : '' }}">
      <label for="" class="col-lg-2 control-label">Nama Wisatawan</label>
      <div class="col-lg-10">
          <input class="form-control" type="text" name="nama" value="" placeholder="Masukkan nama wisatawan di sini" required="required">
          @if ($errors->has('nama'))
              <p class="help-block">
                  <strong>{{ $errors->first('nama') }}</strong>
              </p>
          @endif
      </div>
  </div><hr>

  <div class="form-group{{ $errors->has('negara') ? ' has-error' : '' }}">
      <label for="" class="col-lg-2 control-label">Negara</label>
      <div class="col-lg-10">
        <select id="e1" class="populate" style="width:100%" name="negara" required="required">
          <option value="">- Pilih Negara -</option>
          @foreach($negaras as $negara)
            <option value="{{ $negara->kode }}"> {{ $negara -> nama_kriteria_sub }}</option>
          @endforeach
        </select>
          @if ($errors->has('negara'))
              <p class="help-block">
                  <strong>{{ $errors->first('negara') }}</strong>
              </p>
          @endif
      </div>
  </div><hr>

  <div class="form-group{{ $errors->has('jk') ? ' has-error' : '' }}">
      <label for="" class="col-lg-2 control-label">Jenis Kelamin</label>
      <div class="col-lg-10">
        <select id="" class="form-control populate" style="" name="jk" required="required">
          <option value="">- Pilih Jenis Kelamin -</option>
          @foreach($jks as $jk)
            <option value="{{ $jk->kode }}"> {{ $jk -> nama_kriteria_sub }}</option>
          @endforeach
        </select>
          @if ($errors->has('jk'))
              <p class="help-block">
                  <strong>{{ $errors->first('jk') }}</strong>
              </p>
          @endif
      </div>
  </div><hr>

  <div class="form-group{{ $errors->has('tujuan') ? ' has-error' : '' }}">
      <label for="" class="col-lg-2 control-label">Tujuan</label>
      <div class="col-lg-10">
        <select id="" class="form-control populate" style="" name="tujuan" required="required">
          <option value="">- Pilih Tujuan -</option>
          @foreach($tujuans as $tujuan)
            <option value="{{ $tujuan->kode }}"> {{ $tujuan -> nama_kriteria_sub }}</option>
          @endforeach
        </select>
          @if ($errors->has('tujuan'))
              <p class="help-block">
                  <strong>{{ $errors->first('tujuan') }}</strong>
              </p>
          @endif
      </div>
  </div><hr>

  <div class="form-group{{ $errors->has('umur') ? ' has-error' : '' }}">
      <label for="" class="col-lg-2 control-label">Umur</label>
      <div class="col-lg-10">
        <select id="" class="form-control populate" style="" name="umur" required="required">
          <option value="">- Pilih Umur -</option>
          @for($i=1; $i <= 100; $i++)
            <option value="{{ $i }}"> {{ $i }}</option>
          @endfor
        </select>
          @if ($errors->has('umur'))
              <p class="help-block">
                  <strong>{{ $errors->first('umur') }}</strong>
              </p>
          @endif
      </div>
  </div><hr>

  <div class="form-group{{ $errors->has('kunjungan') ? ' has-error' : '' }}">
      <label for="" class="col-lg-2 control-label">Kunjungan</label>
      <div class="col-lg-10">
        <select id="" class="form-control populate" style="" name="kunjungan" required="required">
          <option value="">- Pilih Kunjungan ke -</option>
          @for($ik=1; $ik <= 50; $ik++)
            <option value="{{ $ik }}"> {{ $ik }}</option>
          @endfor
        </select>
          @if ($errors->has('kunjungan'))
              <p class="help-block">
                  <strong>{{ $errors->first('kunjungan') }}</strong>
              </p>
          @endif
      </div>
  </div><hr>

  <div class="form-group{{ $errors->has('objeks') ? ' has-error' : '' }}">
      <label for="" class="col-lg-2 control-label">Objek Wisata</label>
      <div class="col-lg-10" >

        <select class="multi-select" multiple="" id="my_multi_select3" name="objeks[]" required="required">

          @foreach($objeksss as $objeks)
            <option value="{{ $objeks->id  }}"> {{ $objeks -> nama_objek }}</option>
          @endforeach
        </select>
        {{--}}
        <select multiple name="objeks" id="e9" style="width:300px" class="populate" placeholder="Ketik nama objek wisata di sini ...">
            <optgroup label="Pilih Objek Wisata">
              @foreach($objekss as $objeks)
                <option value="{{ $objeks->id  }}">{{ $objeks->nama_objek  }}</option>
              @endforeach
            </optgroup>
        </select>
          @if ($errors->has('objeks'))
              <p class="help-block">
                  <strong>{{ $errors->first('objeks') }}</strong>
              </p>
          @endif
        --}}
      </div>
  </div><hr>

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
