@extends('layout.masterbrb')

@section('title', "Be right back")

        <section class="page_head">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        
                    </div>
                </div>
            </div>
        </section>

    <section class="content not_found">
      <div class="container wow fadeInUp">
        <div class="row">
          <div class="col-sm-12 col-lg-12 col-md-12">
            <div class="page_404">
              <h2><i class="fa fa-cog fa-spin fa-4x"></i></h2>
              <p>Sorry, be right back</p>
              <h3><i class="fa fa-smile-o fa-4x"></i></h3>
              <a onclick="history.go(-1)" class="btn btn-default btn-lg">
                <i class="fa fa-arrow-circle-o-left"></i>
                Go back
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>

