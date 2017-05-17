@extends('layout.master2')

@section('title', 'Daftar Wisatawan')

@section('header')
  @parent


  <section class="page_head">
      <div class="container">
          <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12">
                  <div class="page_title">
                      <h2>@yield('title')</h2>
                  </div>
                  <nav id="breadcrumbs">
                      <ul>
                          <li><a href="{{URL('dashboard')}}">Home</a>/</li>
                          <li><a href="{{URL('wisatawan')}}">Wisatawan</a></li>
                      </ul>
                  </nav>
              </div>
          </div>
      </div>
  </section>

<br>

<form class="" action="{{url('/wisatawan/create')}}">
  <input type="hidden" name="_method" value="create">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <input type="submit" class="btn btn-primary" value="Create">
</form>

<hr>

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
        <th width="15%"> Created </th>
        <th width="25%"> Nama </th>
        <th width="15%"> Negara </th>
        <th width="10%"> Umur </th>
        <th width="10%"> JK </th>
        <th width="50%"> Tujuan </th>

      </tr>
    </thead>
    <tbody>
      @foreach($wisatawans as $wisatawan)
      <tr>
        <td>{{{ date('d F Y' , strtotime($wisatawan->created_at) )}}}</td>
        <td>{{{ $wisatawan->nama }}}</td>
        <td>{{{ $wisatawan->negara }}}</td>
        <td>{{{ $wisatawan->umur }}}</td>
        <td>{{{ $wisatawan->jk }}}</td>
        <td>{{{ $wisatawan->tujuan }}}</td>
        <td><form class="" action="{{url('/wisatawan', $wisatawan->id)}}" method="get">
            <input type="hidden" name="_method" value="detail">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="submit" class="btn btn-info" name="name" value="Detail">
        </form></td>
        <td><form class="" action="{{url('/wisatawan', $wisatawan->id)}}/edit" method="get">
          <input type="hidden" name="_method" value="edit">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input type="submit" class="btn btn-warning" name="name" value="Edit">
        </form></td>
        <td><form class="" action="{{url('/blog', $wisatawan->id)}}" method="post">
          <input type="hidden" name="_method" value="delete">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input type="submit" class="btn btn-danger" name="name" value="Delete">
        </form></td>

      </tr>
      @endforeach
    </tbody>
  </table>

</div>


{!! $wisatawans->links() !!}

@endsection
