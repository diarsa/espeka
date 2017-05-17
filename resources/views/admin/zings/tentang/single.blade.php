@extends('layout.master')

@section('title', 'Detail Objek Wisata')

@section('header')
  @parent

  <div class="">
      <ul class="breadcrumbs-alt">
          <li>
              <a href="{{URL('dashboard')}}">Beranda</a>
          </li>
          <li>
              <a href="{{URL('objek')}}">Objek Wisata</a>
          </li>
          <li>
              <a href="#" class="current">Detail</a>
          </li>
      </ul>
  </div>

  <h4><b>
    {{ $objek->nama_objek }}
  </b></h4>
  {{ date('d F Y' , strtotime($objek->created_at) )}}
  <br><br>

<div class="well">
      <p>
        Alamat : {{ $objek->alamat }}
      </p>
      <p>
        Keterangan : {{ $objek->keterangan }}
      </p>
      <p>
        Status : {{ $objek->status }}
      </p>
</div>

@endsection

@section('footer')
@endsection
