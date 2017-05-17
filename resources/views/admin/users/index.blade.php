@extends('admin.layout.master')

@section('title', 'Pengguna')

@section('header')
  @parent

    <div class="">
      <ul class="breadcrumbs-alt">
          <li>
              <a href="{{URL('admin/dashboard')}}">Beranda</a>
          </li>
          <li>
              <a href="#" class="current">User</a>
          </li>
      </ul>
    </div>

<div class="" align="right">

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
  <th width="20%"> Dibuat tanggal </th>
  <th width="30%"> Nama </th>
  <th width="30%"> Email </th>
  <th width="15%"> Status </th>
  <th width="5%"> Ubah </th>
  <th width="5%"> Hapus </th>
</tr>
</thead>
<tbody>
@foreach($users as $user)
<tr class="gradeX">
  <td>{!! date('d F Y' , strtotime($user->created_at) ) !!}</td>
  <td>{!! $user->name !!} {!! $user->lastname !!}</td>
  <td>{!! $user->email !!}</td>
  <td>{!! $user->role !!}</td>
  <td><form class="" action="{{url('/admin/users', $user->id)}}/edit" method="get">
    <input type="hidden" name="_method" value="edit">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <button type="submit" class="btn btn-warning" name="button" title="Ubah"><i class="fa fa-edit fa-lg"></i> </button>
  </form></td>
  <td>
    <button class="btn btn-danger" name="button" title="Hapus" method="get" data-toggle="modal" data-target="#deleteModal{{$user->id}}" onclick="javascript: {{url('/admin/users/'.$user->id)}}"><i class="fa fa-trash-o fa-lg"></i>
    </button>

    <div class="modal fade" id="deleteModal{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="exampleModalLabel">Hapus users</h4>
          </div>
          <div class="modal-body">
              <p>
                Hapus data users dengan nama {{$user->name}}?
              </p>
          </div>
          <div class="modal-footer">
            <form class="" action="{{url('/admin/users', $user->id)}}" method="post">
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
  <th width="20%"> Dibuat tanggal </th>
  <th width="30%"> Nama </th>
  <th width="30%"> Email </th>
  <th width="15%"> Status </th>
  <th width="5%"> Ubah </th>
  <th width="5%"> Hapus </th>
</tr>
</tfoot>
</table>
</div>


@endsection

@section('footer')
@endsection
