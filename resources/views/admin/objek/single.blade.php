@extends('admin.layout.master')

@section('title', 'Detail Objek Wisata')

@section('header')
  @parent

  <div class="">
      <ul class="breadcrumbs-alt">
          <li>
              <a href="{{URL('admin/dashboard')}}">Beranda</a>
          </li>
          <li>
              <a href="{{URL('admin/objek')}}">Objek Wisata</a>
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

<div class="well col-lg-12">
      <p>
        Alamat : {{ $objek->alamat }}
      </p>
      <p>
        Keterangan : {!! $objek->keterangan !!}
      </p>
      <p>
        Status : {{ $objek->status }}
      </p>
      <p>
        Dikunjungi : {{ $objek->hits }} orang
      </p>
      {{-- <div class="col-md-4">
        <img src="{{asset("assets/images/img1/$objek->img1")}}" onerror="this.src='{{ asset ("assets/images/img1/900x500.png") }}'" alt="" width="300px" height="170px" />
      </div>
      <div class="col-md-4">
        <img src="{{asset("assets/images/img2/$objek->img2")}}" onerror="this.src='{{ asset ("assets/images/img1/900x500.png") }}'" alt="" width="300px" height="170px" />
      </div>
      <div class="col-md-4">
        <img src="{{asset("assets/images/img3/$objek->img3")}}" onerror="this.src='{{ asset ("assets/images/img1/900x500.png") }}'" alt="" width="300px" height="170px" />
      </div> --}}

      <div class="col-md-4">
        <img src="{{asset("assets/images/img1/$objek->img1")}}" onerror="this.src='{{ asset ("assets/images/img1/900x500.png") }}'" alt="" width="300px" height="" />
      </div>
      <div class="col-md-4">
        <img src="{{asset("assets/images/img2/$objek->img2")}}" onerror="this.src='{{ asset ("assets/images/img1/900x500.png") }}'" alt="" width="300px" height="" />
      </div>
      <div class="col-md-4">
        <img src="{{asset("assets/images/img3/$objek->img3")}}" onerror="this.src='{{ asset ("assets/images/img1/900x500.png") }}'" alt="" width="300px" height="" />
      </div>
      
</div>

@endsection

@section('footer')
@endsection
