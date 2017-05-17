@extends('layout.masterbrb')

@section('title', "Not Found")

{{--
@section('header')
  @parent --}}

        <section class="page_head">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        {{-- <div class="page_title">
                            <h2>404</h2>
                        </div>
                        <nav id="breadcrumbs">
                            <ul>
                                <li><a href="{{URL('dashboard')}}">Home</a>/</li>
                                <li>404</li>
                            </ul>
                        </nav> --}}
                    </div>
                </div>
            </div>
        </section>

    <section class="content not_found">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-lg-12 col-md-12">
            <div class="page_404">
              <h1>404</h1>
              <p>Sorry, Page you're looking for is not found</p>
              <a onclick="history.go(-1)" class="btn btn-default btn-lg">
                <i class="fa fa-arrow-circle-o-left"></i>
                Go back
              </a>
              <a href="{{URL('/')}}" class="btn btn-default btn-lg">
                <i class="fa fa-home"></i>
                Home
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>

{{-- @endsection

@section('footer')
@endsection --}}
