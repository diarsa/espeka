@extends('layout.master2')

@section('title', 'Testimonials')

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
                          <li>Testimonials</li>
                      </ul>
                  </nav>
              </div>
          </div>
      </div>
  </section>

<br>

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
        <th width="15%"> Created at </th>
        <th width="25%"> Name </th>
        <th width="15%"> Country </th>
        <th width="50%"> Message </th>

      </tr>
    </thead>
    <tbody>
      @foreach($testimos as $testimo)
      <tr>
        <td>{{{ date('d F Y' , strtotime($testimo->created_at) )}}}</td>
        <td>{{{ $testimo->nama }}}</td>
        <td>{{{ $testimo->negara }}}</td>
        <td>{{{ $testimo->isi }}}</td>

      </tr>
      @endforeach
    </tbody>
  </table>

</div>

<form class="" action="{{url('/testi/create')}}">
  <input type="hidden" name="_method" value="create">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <input type="submit" class="btn btn-primary" value="Create">
</form>

{!! $testimos->links() !!}

@endsection
