@extends('admin.layout.master')

@section('title', 'Daftar Testimoni')

@section('header')
  @parent

    <div class="">
      <ul class="breadcrumbs-alt">
          <li>
              <a href="{{URL('admin/dashboard')}}">Beranda</a>
          </li>
          <li>
              <a href="#" class="current">Testimoni</a>
          </li>
      </ul>
    </div>

<div class="" align="right">
  {{-- <form class="" action="{{url('/admin/testi/create')}}">
    <button type="submit" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Buat Testimoni</button>
  </form> --}}
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
  <th width="15%"> Created at </th>
  <th width="20%"> Nama </th>
  <th width="20%"> Negara </th>
  <th width="30%"> Pesan </th>
  <th width="10%"> Status </th>
  <th width="5%"> Ubah </th>
  <th width="5%"> Hapus </th>
</tr>
</thead>
<tbody>
@foreach($testimos as $testimo)
<tr class="gradeX">
  <td>{{{ date('d F Y' , strtotime($testimo->created_at) )}}}</td>
  <td>{{{ $testimo->nama }}}</td>
  <td>{{{ $testimo->negara }}}</td>
  <td>{!! substr($testimo->isi,0,150)." " !!}</td>
  <td>{{{ $testimo->status }}}</td>
  <td><form class="" action="{{url('/admin/testi', $testimo->id)}}/edit" method="get">
    <input type="hidden" name="_method" value="edit">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <button type="submit" class="btn btn-warning" name="button" title="Ubah"><i class="fa fa-edit fa-lg"></i> </button>
  </form></td>
  <td>
    <button class="btn btn-danger" name="button" title="Hapus" method="get" data-toggle="modal" data-target="#deleteModal{{$testimo->id}}" onclick="javascript: {{url('/admin/testi/'.$testimo->id)}}"><i class="fa fa-trash-o fa-lg"></i>
    </button>

    <div class="modal fade" id="deleteModal{{$testimo->id}}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="exampleModalLabel">Hapus Testimoni</h4>
          </div>
          <div class="modal-body">
              <p>
                Hapus data testimoni dengan nama {{$testimo->nama}}?
              </p>
          </div>
          <div class="modal-footer">
            <form class="" action="{{url('/admin/testi', $testimo->id)}}" method="post">
              <input type="button" class="btn btn-default" data-dismiss="modal" value="Tidak">
              <input type="hidden" name="_method" value="delete">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="submit" class="btn btn-danger" name="" value="Hapus">
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
    <th width="15%"> Created at </th>
    <th width="20%"> Nama </th>
    <th width="20%"> Negara </th>
    <th width="30%"> Pesan </th>
    <th width="10%"> Status </th>
    <th width="5%"> Ubah </th>
    <th width="5%"> Hapus </th>
  </tr>
</tfoot>
</table>
</div>




{{--
{!! $testimos->links() !!}
--}}

@endsection

@section('footer')
@endsection
