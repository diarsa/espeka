@extends('admin.layout.master')

@section('title', 'Export Data Wisatawan')

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
            <a href="" class="current">Download</a>
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
  Silakan download atau unduh data wisatawan per tahun sesuai dengan kategorinya.
</div>

<div class="form-group col-md-12">
  {!! Form::open(['url' => route('wisatawan.export.postlokal'), 'method' => 'post', 'class'=>'form-horizontal']) !!}
    <div class="form-group">
      <div class="col-md-5 well">
      <b>Wisatawan Lokal</b>
        <select name="tahun" class="form-control" required="required">
          <option value="">Pilih Tahun</option>
          @for ($i=$tahun1; $i<=$tahunnow; $i++)
            <option value="{{$i}}">{{$i}}</option>
          @endfor
        </select> <br>

        <button type="submit" class="btn btn-primary"> 
          <i class="fa fa-cloud-download fa-lg"></i> 
          Download Wisatawan Lokal
        </button>
      </div>
    </div>
  {!! Form::close() !!}



  {!! Form::open(['url' => route('wisatawan.export.post'), 'method' => 'post', 'class'=>'form-horizontal']) !!}
    <div class="form-group">
      <div class="col-md-5 well">
      <b>Wisatawan Mancanegara</b>
        <select name="tahun" class="form-control" required="required">
          <option value="">Pilih Tahun</option>
          @for ($i=$tahun1; $i<=$tahunnow; $i++)
            <option value="{{$i}}">{{$i}}</option>
          @endfor
        </select> <br>

        <button type="submit" class="btn btn-primary"> 
          <i class="fa fa-cloud-download fa-lg"></i> 
          Download Wisatawan Mancanegara
        </button>
      </div>
    </div>
  {!! Form::close() !!}

</div>







@endsection

@section('footer')
@endsection
