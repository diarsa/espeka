@extends('layout.master')

@section('title', 'Page Lists Wisatawan')

@section('header')
  @parent

<form class="" action="{{url('/wisata/create')}}">
  <input type="hidden" name="_method" value="create">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <input type="submit" class="btn btn-primary" value="Create">
</form>

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

<div class="table-responsive">
  <table class="table table-bordered table-hover table-striped">
    <thead>
      <tr>
        <th width="10%"> Created at </th>
        <th width="20%"> Nama </th>
        <th width="10%"> Negara </th>
        <th width="10%"> Umur </th>
        <th width="10%"> JK </th>
        <th width="20%"> Tujuan </th>
        <th width="5%"> Info </th>
        <th width="5%"> Hapus </th>

      </tr>
    </thead>
    <tbody>
      @foreach($wisatas as $wisata)
      <tr>
        <td>{{{ date('d F Y' , strtotime($wisata->created_at) )}}}</td>
        <td>{{{ $wisata->nama }}}</td>
        <td>{{{ $wisata->negara }}}</td>
        <td>{{{ $wisata->umur }}}</td>
        <td>{{{ $wisata->jk }}}</td>
        <td>{{{ $wisata->tujuan }}}</td>
        <td><form class="" action="{{url('/wisata', $wisata->id)}}" method="get">
            <input type="hidden" name="_method" value="detail">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <button type="submit" class="btn btn-info" name="button" title="Detail"><i class="fa fa-info-circle fa-lg"></i> </button>
        </form></td>

        <td><form class="" action="{{url('/wisata', $wisata->id)}}" method="post">
          <input type="hidden" name="_method" value="delete">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <button type="submit" class="btn btn-danger" name="button" title="Hapus"><i class="fa fa-trash-o fa-lg"></i> </button>
        </form></td>

      </tr>
      @endforeach
    </tbody>
  </table>

</div>


{!! $wisatas->links() !!}




<div class="adv-table table-responsive">
<table  class="display table table-bordered table-striped" id="dynamic-table">
<thead>
<tr>
  <th width="10%"> Created at </th>
  <th width="20%"> Nama </th>
  <th width="10%"> Negara </th>
  <th width="10%"> Umur </th>
  <th width="10%"> JK </th>
  <th width="20%"> Tujuan </th>
  <th width="5%"> Info </th>
  <th width="5%"> Hapus </th>
</tr>
</thead>
<tbody>
@foreach($wisatas as $wisata)
<tr class="gradeX">
  <td>{{{ date('d F Y' , strtotime($wisata->created_at) )}}}</td>
  <td>{{{ $wisata->nama }}}</td>
  <td>{{{ $wisata->negara }}}</td>
  <td>{{{ $wisata->umur }}}</td>
  <td>{{{ $wisata->jk }}}</td>
  <td>{{{ $wisata->tujuan }}}</td>
  <td><form class="" action="{{url('/wisata', $wisata->id)}}" method="get">
      <input type="hidden" name="_method" value="detail">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <button type="submit" class="btn btn-info" name="button" title="Detail"><i class="fa fa-info-circle fa-lg"></i> </button>
  </form></td>

  <td><form class="" action="{{url('/wisata', $wisata->id)}}" method="post">
    <input type="hidden" name="_method" value="delete">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <button type="submit" class="btn btn-danger" name="button" title="Hapus"><i class="fa fa-trash-o fa-lg"></i> </button>
  </form></td>
</tr>
@endforeach
</tbody>
<tfoot>
<tr>
  <th width="10%"> Created at </th>
  <th width="20%"> Nama </th>
  <th width="10%"> Negara </th>
  <th width="10%"> Umur </th>
  <th width="10%"> JK </th>
  <th width="20%"> Tujuan </th>
  <th width="5%"> Info </th>
  <th width="5%"> Hapus </th>
</tr>
</tfoot>
</table>
</div>



@endsection

@section('footer')
@endsection
