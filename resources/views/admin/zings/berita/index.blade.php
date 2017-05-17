@extends('admin.layout.master')

@section('title', 'Lists berita')

@section('header')
  @parent

    <div class="">
      <ul class="breadcrumbs-alt">
          <li>
              <a href="{{URL('admin/dashboard')}}">Beranda</a>
          </li>
          <li>
              <a href="#" class="current">Berita</a>
          </li>
      </ul>
    </div>

<div class="" align="right">
  <form class="" action="{{url('/admin/berita/create')}}">
    <button type="submit" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Buat Berita</button>
  </form>
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
  <th width="10%"> Created at </th>
  <th width="20%"> Title </th>
  <th width="50%"> Subject </th>
  <th width="5%"> Dilihat </th>
  <th width="5%"> Detail </th>
  <th width="5%"> Ubah </th>
  <th width="5%"> Hapus </th>
</tr>
</thead>
<tbody>
@foreach($beritas as $berita)
<tr class="gradeX">
  <td>{{{ date('d F Y' , strtotime($berita->created_at) )}}}</td>
  <td>{{{ $berita->title }}}</td>
  <td>{!! substr($berita->subject,0,150)." " !!}</td>
  <td>{{ Counter::showAndCount($berita->slug) }}</td>
  <td>
    <form class="" action="{{url('/admin/berita', $berita->slug)}}" method="get">
      <input type="hidden" name="_method" value="detail">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <button type="sumbit" class="btn btn-info" name="button" title="Detail"><i class="fa fa-info-circle fa-lg"></i> </button>
    </form>
  </td>
  <td><form class="" action="{{url('/admin/berita', $berita->id)}}/edit" method="get">
    <input type="hidden" name="_method" value="edit">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <button type="submit" class="btn btn-warning" name="button" title="Ubah"><i class="fa fa-edit fa-lg"></i> </button>
  </form></td>
  <td>
    <button class="btn btn-danger" name="button" title="Hapus" method="get" data-toggle="modal" data-target="#deleteModal{{$berita->id}}" onclick="javascript: {{url('/admin/berita/'.$berita->id)}}"><i class="fa fa-trash-o fa-lg"></i>
    </button>

    <div class="modal fade" id="deleteModal{{$berita->id}}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="exampleModalLabel">Hapus Berita</h4>
          </div>
          <div class="modal-body">
              <p>
                Hapus data berita dengan nama {{$berita->title}}?
              </p>
          </div>
          <div class="modal-footer">
            <form class="" action="{{url('/admin/berita', $berita->id)}}" method="post">
              <input type="button" class="btn btn-default" data-dismiss="modal" value="Tidak">
              <input type="hidden" name="_method" value="delete">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="submit" class="btn btn-danger" name="name" value="Hapus">
            </form>
          </div>
        </div>
      </div>
    </div>
  </td>
</tr>
@endforeach
</tbody>
<tfoot>
  <tr>
    <th width="10%"> Created at </th>
    <th width="20%"> Title </th>
    <th width="50%"> Subject </th>
    <th width="5%"> Dilihat </th>
    <th width="5%"> Detail </th>
    <th width="5%"> Ubah </th>
    <th width="5%"> Hapus </th>
  </tr>
</tfoot>
</table>
</div>




{{--
{!! $beritas->links() !!}
--}}

@endsection

@section('footer')
@endsection
