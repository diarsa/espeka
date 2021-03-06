<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js">
</script>

<script type="text/javascript">

$(document).ready(function(){
    $('#pilihan').on('change', function() {
      if ( this.value == 'vwisman')
      {
        $("#wisman").show();
        $("#wislok").hide();
      }
      else
      {
        $("#wisman").hide();
        $("#wislok").show();
      }
    });
});

</script>


@extends('petugas.lay')

@section('title', 'Tambah Data Wisatawan')

@section('conten')
  @parent

    <div class="">
      <ul class="breadcrumbs-alt">
          <li>
              <a href="{{URL('petugas')}}">Beranda</a>
          </li>
          <li>
              <a href="{{URL('petugas/wisatawan')}}">Wisatawan</a>
          </li>
          <li>
              <a href="" class="current">Tambah</a>
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

@elseif(Session::has('eror'))

  <div class="alert alert-block alert-danger fade in">
    <button data-dismiss="alert" class="close close-sm" type="button">
      <i class="fa fa-times">
      </i>
    </button>
    <strong>
      {{ Session::get('eror') }}
    </strong>
  </div>
@else

@endif

<div class="alert alert-info fade in">
  <i class="fa fa-info-circle "></i> 
  Silakan dibaca petunjuk pada masing-masing kolom dengan baik dan benar.
</div>

{{-- <form class="form-horizontal" id="validpetugas" role="form" action="../../petugas/mancanegara" method="post" > --}}
<form class="form-horizontal" id="signupForm" role="form" action="{{URL('petugas/wisatawan')}}" method="post" >


<div class="col-md-12">
    <div class="panel panel-info">

      <div class="well">
        <div class="panel-body">
          <div class="alert alert-info fade in">
            <i class="fa fa-info-circle "></i> 
            Pilih dahulu objek wisata, kemudian isi berapa orang total wisatawan yang akan diinputkan pada kolom jumlah. 
            <br>Kolom ini <b>dibutuhkan.</b>
          </div>
            <div class="form-group {{ $errors->has('objek') ? ' has-error' : '' }}">
                <label for="" class="col-lg-2 control-label">Objek Wisata *</label>
                <div class="col-lg-10">
                    <select class="form-control" name="objek" required="required">
                        <option value="">- Pilih Objek Wisata -</option>
                          @foreach($objeks as $objek)
                            <option value="{{$objek->id}}" @if(old('objek')&&old('objek') == $objek->id) selected="selected" @endif> {{$objek->nama_objek}} </option>
                          @endforeach
                    </select>
                    @if ($errors->has('objek'))
                        <p class="help-block">
                            <strong>{{ $errors->first('objek') }}</strong>
                        </p>
                    @endif

                    <hr>
                    <div class="col-md-10">
                      <label for="" class="col-lg-2 form-controlol-label">Jumlah *</label>
                      <div class="col-md-6">
                        <input type="number" class="form-control" name="jmlobjek" value="{{ old('jmlobjek') }}"> orang
                      </div>
                        
                    </div>

                </div>
            </div>

        </div>
      </div>
      
    </div>
</div>


<div class="col-md-12">
    <div class="panel panel-info">
          <b>Asal *</b>

      <div class="well">
        <div class="panel-body">
          <div class="alert alert-info fade in">
            <i class="fa fa-info-circle "></i> 
            Silakan pilih salah satu atau tidak boleh keduanya sesuai dengan jenis wisatawan. Jika wisatawan <b>lokal</b>, silakan pilih <b>provinsi</b>. Jika wisatawan <b>mancanegara</b>, silakan pilih <b>negara</b>. 
            <br>Kolom ini <b>dibutuhkan.</b>
          </div>

          <div class="form-group">
            <select class="form-control" name="pilihan" id="pilihan">
              <option value="vwislok" name="vwislok">Lokal</option>
              <option value="vwisman" name="vwisman">Mancanegara</option>
            </select>

            <hr>

            <div class="form-group {{ $errors->has('pro') ? ' has-error' : '' }}" id="wislok">
                <label for="" class="col-lg-2 control-label">Provinsi </label>
                <div class="col-lg-10">
                    <select class="form-control" name="pro" >
                        <option value="">- Pilih Provinsi -</option>
                          @foreach($prov as $pro)
                            <option value="{{$pro->kode}}" @if(old('pro')&&old('pro') == $pro->kode) selected="selected" @endif> {{$pro->nama_kriteria_sub}} </option>
                          @endforeach
                    </select>
                    @if ($errors->has('pro'))
                        <p class="help-block">
                            <strong>{{ $errors->first('pro') }}</strong>
                        </p>
                    @endif
                </div>
            </div>

            <div class="form-group {{ $errors->has('negara') ? ' has-error' : '' }}" id="wisman">
                <label for="" class="col-lg-2 control-label">Negara </label>
                <div class="col-lg-10">
                    <select class="form-control" name="negara" >
                        <option value="">- Pilih Negara -</option>
                          @foreach($negaras as $negara)
                            <option value="{{$negara->kode}}" @if(old('negara')&&old('negara') == $negara->kode) selected="selected" @endif> {{$negara->nama_kriteria_sub}} </option>
                          @endforeach
                    </select>
                    @if ($errors->has('negara'))
                        <p class="help-block">
                            <strong>{{ $errors->first('negara') }}</strong>
                        </p>
                    @endif
                </div>
            </div>

          </div>

        </div>
      </div>

    </div>
</div>


<div class="col-md-12">
    <div class="panel panel-info">

          <b>Jenis Kelamin </b>

      <div class="well">
        <div class="panel-body">
          <div class="alert alert-info fade in">
            <i class="fa fa-info-circle "></i> 
            Isi langsung berapa orang laki-laki atau perempuan dari total wisatawan yang telah ditentukan sebelumnya pada masing-masing kolom jumlah. 
          </div>
            <div class="form-group {{ $errors->has('jk1') ? ' has-error' : '' }}">
                <label for="" class="col-lg-2 control-label">Jenis Kelamin </label>
                <div class="col-lg-10">
                    <select class="form-control" name="jk1" >
                          {{-- @foreach($jks as $jk1)
                            <option value="{{$jk1->kode}}" @if($jk1->kode == '3k1') selected="selected" @endif> {{$jk1->nama_kriteria_sub}} </option>
                          @endforeach --}}
                          <option value="3k1" > Laki-laki </option>
                    </select>
                    @if ($errors->has('jk1'))
                        <p class="help-block">
                            <strong>{{ $errors->first('jk1') }}</strong>
                        </p>
                    @endif

                    <hr>
                    <div class="col-md-10">
                      <label for="" class="col-lg-2 form-controlol-label">Jumlah *</label>
                      <div class="col-md-6">
                        <input type="number" class="form-control" name="jmljk1" value="{{ old('jmljk1') }}"> orang
                      </div>
                    </div>

                </div>
            </div>

            <hr>
            
            <div class="form-group {{ $errors->has('jk2') ? ' has-error' : '' }}">
                <label for="" class="col-lg-2 control-label">Jenis Kelamin </label>
                <div class="col-lg-10">
                    <select class="form-control" name="jk2" >
                          {{-- @foreach($jks as $jk2)
                            <option value="{{$jk2->kode}}" @if($jk2->kode == '3k2') selected="selected" @endif> {{$jk2->nama_kriteria_sub}} </option>
                          @endforeach --}}
                          <option value="3k2" > Perempuan </option>
                    </select>
                    @if ($errors->has('jk2'))
                        <p class="help-block">
                            <strong>{{ $errors->first('jk2') }}</strong>
                        </p>
                    @endif

                    <hr>
                    <div class="col-md-10">
                      <label for="" class="col-lg-2 form-controlol-label">Jumlah *</label>
                      <div class="col-md-6">
                        <input type="number" class="form-control" name="jmljk2" value="{{ old('jmljk2') }}"> orang
                      </div>
                    </div>

                </div>
            </div>

        </div>
      </div>

    </div>
</div>


<div class="col-md-12">
    <div class="panel panel-info">
      
          <b>Tujuan</b>
      
      <div class="well">
        <div class="panel-body">
          <div class="alert alert-info fade in">
            <i class="fa fa-info-circle "></i> 
            Isi langsung jumlah masing-masing tujuan dari total wisatawan yang telah ditentukan sebelumnya pada masing-masing kolom jumlah. 
          </div>
            <div class="form-group {{ $errors->has('tujuan1') ? ' has-error' : '' }}">
                <label for="" class="col-lg-2 control-label">Tujuan </label>
                <div class="col-lg-10">
                    <select class="form-control" name="tujuan1" >
                          {{-- @foreach($tujuans as $tujuan1)
                            <option value="{{$tujuan1->kode}}" @if($tujuan1->kode == '4k1') selected="selected" @endif> {{$tujuan1->nama_kriteria_sub}} </option>
                          @endforeach --}}
                          <option value="4k1" > Berlibur </option>
                    </select>
                    @if ($errors->has('tujuan1'))
                        <p class="help-block">
                            <strong>{{ $errors->first('tujuan1') }}</strong>
                        </p>
                    @endif

                    <hr>
                    <div class="col-md-10">
                      <label for="" class="col-lg-2 form-controlol-label">Jumlah *</label>
                      <div class="col-md-6">
                        <input type="number" class="form-control" name="jmltujuan1" value="{{ old('jmltujuan1') }}"> orang
                      </div>
                    </div>

                </div>
                
            </div>

            <hr>

            <div class="form-group {{ $errors->has('tujuan2') ? ' has-error' : '' }}">
                <label for="" class="col-lg-2 control-label">Tujuan </label>
                <div class="col-lg-10">
                    <select class="form-control" name="tujuan2" >
                          {{-- @foreach($tujuans as $tujuan2)
                            <option value="{{$tujuan2->kode}}" @if($tujuan2->kode == '4k2') selected="selected" @endif> {{$tujuan2->nama_kriteria_sub}} </option>
                          @endforeach --}}
                          <option value="4k2" > Penelitian </option>
                    </select>
                    @if ($errors->has('tujuan2'))
                        <p class="help-block">
                            <strong>{{ $errors->first('tujuan2') }}</strong>
                        </p>
                    @endif

                    <hr>
                    <div class="col-md-10">
                      <label for="" class="col-lg-2 form-controlol-label">Jumlah *</label>
                      <div class="col-md-6">
                        <input type="number" class="form-control" name="jmltujuan2" value="{{ old('jmltujuan2') }}"> orang
                      </div>
                    </div>

                </div>
                
            </div>

            <hr>

            <div class="form-group {{ $errors->has('tujuan3') ? ' has-error' : '' }}">
                <label for="" class="col-lg-2 control-label">Tujuan </label>
                <div class="col-lg-10">
                    <select class="form-control" name="tujuan3" >
                          {{-- @foreach($tujuans as $tujuan3)
                            <option value="{{$tujuan3->kode}}" @if($tujuan3->kode == '4k3') selected="selected" @endif> {{$tujuan3->nama_kriteria_sub}} </option>
                          @endforeach --}}
                          <option value="4k3" > Mengunjungi Kerabat </option>
                    </select>
                    @if ($errors->has('tujuan3'))
                        <p class="help-block">
                            <strong>{{ $errors->first('tujuan3') }}</strong>
                        </p>
                    @endif

                    <hr>
                    <div class="col-md-10">
                      <label for="" class="col-lg-2 form-controlol-label">Jumlah *</label>
                      <div class="col-md-6">
                        <input type="number" class="form-control" name="jmltujuan3" value="{{ old('jmltujuan3') }}"> orang
                      </div>
                    </div>

                </div>
                
            </div>

            <hr>

            <div class="form-group {{ $errors->has('tujuan4') ? ' has-error' : '' }}">
                <label for="" class="col-lg-2 control-label">Tujuan </label>
                <div class="col-lg-10">
                    <select class="form-control" name="tujuan4" >
                          {{-- @foreach($tujuans as $tujuan4)
                            <option value="{{$tujuan4->kode}}" @if($tujuan4->kode == '4k4') selected="selected" @endif> {{$tujuan4->nama_kriteria_sub}} </option>
                          @endforeach --}}
                          <option value="4k4" > Yang lain </option>
                    </select>
                    @if ($errors->has('tujuan4'))
                        <p class="help-block">
                            <strong>{{ $errors->first('tujuan4') }}</strong>
                        </p>
                    @endif

                    <hr>
                    <div class="col-md-10">
                      <label for="" class="col-lg-2 form-controlol-label">Jumlah *</label>
                      <div class="col-md-6">
                        <input type="number" class="form-control" name="jmltujuan4" value="{{ old('jmltujuan4') }}"> orang
                      </div>
                    </div>

                </div>
                
            </div>

        </div>
      </div>

    </div>
</div>


<div class="col-md-12">
    <div class="panel panel-info">
      
          <b>Umur</b>
      
      <div class="well">
        <div class="panel-body">
          <div class="alert alert-info fade in">
            <i class="fa fa-info-circle "></i> 
            Isi langsung jumlah pada masing-masing umur dari total wisatawan yang telah ditentukan sebelumnya pada masing-masing kolom jumlah. 
          </div>
            <div class="form-group {{ $errors->has('umur1') ? ' has-error' : '' }}">
                <label for="" class="col-lg-2 control-label">Umur </label>
                <div class="col-lg-10">
                    <select class="form-control" name="umur1" >
                        <option value="5k25" > Dewasa </option>
                    </select>
                    @if ($errors->has('umur1'))
                        <p class="help-block">
                            <strong>{{ $errors->first('umur1') }}</strong>
                        </p>
                    @endif

                    <hr>
                    <div class="col-md-10">
                      <label for="" class="col-lg-2 form-controlol-label">Jumlah *</label>
                      <div class="col-md-6">
                        <input type="number" class="form-control" name="jmlumur1" value="{{ old('jmlumur1') }}"> orang
                      </div>
                    </div>

                </div>
                
            </div>

            <hr>

            <div class="form-group {{ $errors->has('umur2') ? ' has-error' : '' }}">
                <label for="" class="col-lg-2 control-label">Umur </label>
                <div class="col-lg-10">
                    <select class="form-control" name="umur2" >
                        <option value="5k18" > Remaja </option>
                    </select>
                    @if ($errors->has('umur2'))
                        <p class="help-block">
                            <strong>{{ $errors->first('umur2') }}</strong>
                        </p>
                    @endif

                    <hr>
                    <div class="col-md-10">
                      <label for="" class="col-lg-2 form-controlol-label">Jumlah *</label>
                      <div class="col-md-6">
                        <input type="number" class="form-control" name="jmlumur2" value="{{ old('jmlumur2') }}"> orang
                      </div>
                    </div>

                </div>
                
            </div>

            <hr>

            <div class="form-group {{ $errors->has('umur3') ? ' has-error' : '' }}">
                <label for="" class="col-lg-2 control-label">Umur </label>
                <div class="col-lg-10">
                    <select class="form-control" name="umur3" >
                        <option value="5k10" > Anak-anak </option>
                    </select>
                    @if ($errors->has('umur3'))
                        <p class="help-block">
                            <strong>{{ $errors->first('umur3') }}</strong>
                        </p>
                    @endif

                    <hr>
                    <div class="col-md-10">
                      <label for="" class="col-lg-2 form-controlol-label">Jumlah *</label>
                      <div class="col-md-6">
                        <input type="number" class="form-control" name="jmlumur3" value="{{ old('jmlumur3') }}"> orang
                      </div>
                    </div>

                </div>
                
            </div>

        </div>
      </div>

    </div>
</div>            



        <div class="panel-body">

            <div class="form-group">
                <div class="col-lg-offset-2 col-lg-10" >
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <button type="submit" class="btn btn-primary"><i class="fa fa-lg fa-check-square-o"></i> Proses</button>
                </div>
            </div>

        </div>

          </form>


<script>

$(function() {
    $('#wisman').hide(); 
    $('#pilihan').change(function(){
        if($('#pilihan').val() == 'vwisman') {
            $('#wisman').show();
            // $('#wislok').hide();
        } else {
            // $('#wislok').show();
            $('#wisman').hide(); 
        } 
    });
});


// $('#pilihan').on('change', function(){
//   var value = $(this).val();
//   $('.form').find('div').addClass('hide');
// if(value === vwisman){
//  $('.form').find('.one').remove('hide')
//  $('.form').find('.one').addClass('show')
// }else{
//     $('.form').find('.two').remove('hide')
//  $('.form').find('.two').addClass('show')
// }
// });

</script>

@endsection
