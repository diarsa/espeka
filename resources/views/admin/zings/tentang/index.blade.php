@extends('admin.layout.master')

@section('title', 'Tentang SPK')

@section('header')
  @parent

    <div class="">
      <ul class="breadcrumbs-alt">
          <li>
              <a href="{{URL('admin/dashboard')}}">Beranda</a>
          </li>
          <li>
              <a href="{{URL('admin/tentang')}}" class="current">Tentang</a>
          </li>
      </ul>
    </div>

<div class="" align="right">
<!--
  <form class="" action="{{url('/tentang/create')}}">
    <input type="hidden" name="_method" value="create">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="submit" class="btn btn-warning" value="Buat">

    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal">Buat dengan Modal</button>

  </form>
-->
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
@else

@endif

<div class="adv-table table-responsive">
<table  class="display table table-bordered table-striped" id="dynamic-table">
<thead>
<tr>
  <th width="30%"> Deskripsi</th>
  <th width="15%"> Alamat </th>
  <th width="10%"> Telepon </th>
  <th width="10%"> Email </th>
  <th width="5%"> Ubah </th>
</tr>
</thead>
<tbody>
@foreach($tentangs as $tentang)
<tr class="gradeX">
  <td>{!! $tentang->deskripsi !!}</td>
  <td>{!! $tentang->alamat !!}</td>
  <td>{!! $tentang->telepon !!}</td>
  <td>{!! $tentang->email !!}</td>
  <td><form class="" action="{{url('/admin/tentang', $tentang->id)}}/edit" method="get">
    <input type="hidden" name="_method" value="edit">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <button type="submit" class="btn btn-warning" name="button" title="Ubah"><i class="fa fa-edit fa-lg"></i> </button>
  </form></td>
</tr>
@endforeach
</tbody>
<tfoot>
<tr>
  <th width="30%"> Deskripsi</th>
  <th width="15%"> Alamat </th>
  <th width="10%"> Telepon </th>
  <th width="10%"> Email </th>
  <th width="5%"> Ubah </th>
</tr>
</tfoot>
</table>
</div>


@endsection

@section('footer')
@endsection
