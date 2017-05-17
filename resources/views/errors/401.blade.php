@extends('layout.master2')

@section('title', "Unauthorized")

@section('header')
  @parent

        <section class="page_head">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="page_title">
                            <h2>401</h2>
                        </div>
                        <nav id="breadcrumbs">
                            <ul>
                                <li><a href="index.html">Home</a>/</li>
                                <li>401</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </section>

    <section class="content not_found">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-lg-12 col-md-12">
            <div class="page_404">
              <h1>401</h1>
              <p>Unauthorized</p>
              <a onclick="history.go(-1)" class="btn btn-default btn-lg">
                <i class="fa fa-arrow-circle-o-left"></i>
                Go back
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>

@endsection

@section('footer')
@endsection
