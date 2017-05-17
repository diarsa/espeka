@extends('admin.layout.master')

@section('title', 'Detail Wisatawan')

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
            <a href="#" class="current">Detail</a>
        </li>
    </ul>
  </div>

  <h4><b>
    {{ $wisata->nama }}
  </b></h4>
  {{ date('d F Y' , strtotime($wisata->created_at) )}}
  <br><br>

<div class="well">
      <p>
        Negara : {{ $wisata->negara }} <br>
        Umur : {{ $wisata->umur }} <br>
        Jenis Kelamin : {{ $wisata->jk }} <br>
        Tujuan : {{ $wisata->tujuan }} <br>
      </p>
</div>

@endsection

@section('footer')
@endsection
