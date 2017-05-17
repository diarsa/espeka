@extends('layout.master')

@section('title', 'Daftar Objek Wisata')

@section('header')
  @parent

<form class="" action="{{url('/objek/create')}}">
  <input type="hidden" name="_method" value="create">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <input type="submit" class="btn btn-primary" value="Buat">

  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Buat dengan Modal</button>

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
        <th width="10%"> Dibuat tanggal </th>
        <th width="20%"> Nama Objek Wisata</th>
        <th width="40%"> Alamat </th>
        <th width="10%"> Status </th>
        <th width="5%"> Detail </th>
        <th width="5%"> Ubah </th>
        <th width="5%"> Hapus </th>

      </tr>
    </thead>
    <tbody>
      @foreach($objeks as $objek)
      <tr>
        <td>{{{ date('d F Y' , strtotime($objek->created_at) )}}}</td>
        <td>{{{ $objek->nama_objek }}}</td>
        <td>{{{ $objek->alamat }}}</td>
        <td>{{{ $objek->status }}}</td>
        <td><form class="" action="{{url('/objek', $objek->id)}}" method="get">
            <input type="hidden" name="_method" value="detail">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <button type="sumbit" class="btn btn-info" name="button" title="Detail"><i class="fa fa-info-circle fa-lg"></i> </button>
        </form></td>
        <td><form class="" action="{{url('/objek', $objek->id)}}/edit" method="get">
          <input type="hidden" name="_method" value="edit">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <button type="submit" class="btn btn-warning" name="button" title="Ubah"><i class="fa fa-edit fa-lg"></i> </button>
        </form></td>
        <td><form class="" action="{{url('/objek', $objek->id)}}" method="post">
          <input type="hidden" name="_method" value="delete">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <button type="submit" class="btn btn-danger" name="button" title="Hapus"><i class="fa fa-trash-o fa-lg"></i> </button>
        </form></td>
        <td>
        <button type="submit" class="btn btn-primary" name="button" data-toggle="modal" title="Hapus dengan Modal" data-target="#deleteModal"><i class="fa fa-trash-o"></i> </button>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>

</div>

{!! $objeks->links() !!}


<div class="adv-table table-responsive">
<table  class="display table table-bordered table-striped" id="dynamic-table">
<thead>
<tr>
  <th width="10%"> Dibuat tanggal </th>
  <th width="20%"> Nama Objek Wisata</th>
  <th width="40%"> Alamat </th>
  <th width="10%"> Status </th>
  <th width="5%"> Detail </th>
  <th width="5%"> Ubah </th>
  <th width="5%"> Hapus </th>
</tr>
</thead>
<tbody>
@foreach($objeks as $objek)
<tr class="gradeX">
  <td>{{{ date('d F Y' , strtotime($objek->created_at) )}}}</td>
  <td>{{{ $objek->nama_objek }}}</td>
  <td>{{{ $objek->alamat }}}</td>
  <td>{{{ $objek->status }}}</td>
  <td>
    <form class="" action="{{url('/objek', $objek->id)}}" method="get">
      <input type="hidden" name="_method" value="detail">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <button type="sumbit" class="btn btn-info" name="button" title="Detail"><i class="fa fa-info-circle fa-lg"></i> </button>
    </form>
  </td>
  <td><form class="" action="{{url('/objek', $objek->id)}}/edit" method="get">
    <input type="hidden" name="_method" value="edit">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <button type="submit" class="btn btn-warning" name="button" title="Ubah"><i class="fa fa-edit fa-lg"></i> </button>
  </form></td>
  <td><form class="" action="{{url('/objek', $objek->id)}}" method="post">
    <input type="hidden" name="_method" value="delete">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <button type="submit" class="btn btn-danger" name="button" title="Hapus"><i class="fa fa-trash-o fa-lg"></i> </button>
  </form></td>
</tr>
@endforeach
</tbody>
<tfoot>
<tr>
<th width="10%"> Dibuat tanggal </th>
<th width="20%"> Nama Objek Wisata</th>
<th width="40%"> Alamat </th>
<th width="10%"> Status </th>
<th width="5%"> Detail </th>
<th width="5%"> Ubah </th>
<th width="5%"> Hapus </th>
</tr>
</tfoot>
</table>
</div>


















<!--MODAL ADD-->

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Buat Objek Wisata</h4>
      </div>
      <div class="modal-body">
        <form class="" action="objek" method="post">
          <div class="form-group{{ $errors->has('nama_objek') ? ' has-error' : '' }}">
          <label> Nama Objek Wisata </label>
            <input class="form-control" type="text" name="nama_objek" value="" placeholder="Nama Objek Wisata..." required="required">
            @if ($errors->has('nama_objek'))
                <p class="help-block">
                    <strong>{{ $errors->first('nama_objek') }}</strong>
                </p>
            @endif
          </div>

          <label> Alamat </label>
          <div class="form-group{{ $errors->has('alamat') ? ' has-error' : '' }}">
            <input class="form-control" type="text" name="alamat" value="" placeholder="Alamat Objek Wisata..." required="required">
            @if ($errors->has('alamat'))
                <p class="help-block">
                    <strong>{{ $errors->first('alamat') }}</strong>
                </p>
            @endif
          </div>

          <label> Keterangan </label>
          <div class="form-group{{ $errors->has('keterangan') ? ' has-error' : '' }}">
            <textarea  class="form-control" name="keterangan" rows="3" placeholder="Keterangan ..." required="required"></textarea>
            @if ($errors->has('keterangan'))
                <p class="help-block">
                    <strong>{{ $errors->first('keterangan') }}</strong>
                </p>
            @endif
          </div>

          <label> Status </label> <br>
          <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
            <select class="form-control" name="status" required="required">
              <option value="">- Pilih Status -</option>
                <option value="Tampil"> Tampil </option>
                <option value="Sembunyi"> Sembunyi </option>
            </select>
            @if ($errors->has('status'))
                <p class="help-block">
                    <strong>{{ $errors->first('status') }}</strong>
                </p>
            @endif
          </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="submit" class="btn btn-primary" name="name" value="Kirim">
      </div>

        </form>

    </div>
  </div>
</div>



<!--MODAL DELETE-->

<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Delete Objek Wisata</h4>
      </div>
      <div class="modal-body">

          <p>
            Hapus data objek wisata?
          </p>

      </div>
      <div class="modal-footer">
        <form class="" action="{{url('/objek', $objek->id)}}" method="post">

          <input type="button" class="btn btn-default" data-dismiss="modal" value="Tidak">

          <input type="hidden" name="_method" value="delete">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input type="submit" class="btn btn-danger" name="name" value="Delete">

        </form>
      </div>



    </div>
  </div>
</div>



@endsection

@section('footer')
@endsection
