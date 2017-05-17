@extends('layout.master2')

@section('title', 'Nothing Recommendations')

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
                          <li><a href="{{URL('objek')}}">Attractions</a>/</li>
                          <li>Result</li>
                      </ul>
                  </nav>
              </div>
          </div>
      </div>
  </section>


<div class="">
  <br>
</div>

<div class="" align="center">

</div>

<div class="">
  <br>
</div>

<div class=" col-lg-12">

      <div class="col-md-12" align="center">
        <h3>
            There are no recommendation, because you are just input one characteristic or your data is not available in database. But you can chose this another attractions.
        </h3>
        <blockquote class="default">
          Please click <b>Like</b> or <b>Unlike</b> button if you Like or Unlike the attractions.
        </blockquote>
      <hr>
      </div>

      <div class="col-lg-12">

      @foreach($nothings as $robjek) 
          
            <div class="col-md-4">
              <div class="recent-item box">
                      <figure class="touching ">
                          <img src="{{ asset ("assets/images/img1/$robjek->img1") }}" onerror="this.src='{{ asset ("assets/images/error/900x500.png") }}'"/>
                          <div class="option inner">
                            <div>
                                <h5>{{{ $robjek->nama_objek }}}</h5>
                                {{-- <a href="{{ asset ("assets/images/img1/$robjek->img1") }}" class="fa fa-search mfp-image"></a> --}}
                                <a href="{{url('/objek', $robjek->slug)}}" target="" class="fa fa-link"></a>
                                

                            </div>
                          </div>
                      </figure>
                      {{-- <div class="" align="center">
                        <b> {{{ $robjek->nama_objek }}} </b>
                      </div> --}}
                  </div>

                  
                  <div align="center">


                  <div class="" align="center">
                  <h4>
                    <a href="{{url('/objek', $robjek->slug)}}">
                      <b> {{{ $robjek->nama_objek }}} </b>
                    </a>
                  </h4>
                  </div>

                  <div class="">
                    <button class="btn btn-info" name="button" title="Detail" method="get" data-toggle="modal" data-target="#lihat{{$robjek->slug}}" onclick="javascript: {{url('/objek/'.$robjek->slug)}}"> <i class="fa fa-info-circle fa-lg"></i> </button>

                    <button class="btn btn-info mfp-image" name="button" title="{{ $robjek->nama_objek }}" href="{{ asset ("assets/images/img1/$robjek->img1") }}") }}"> <i class="fa fa-picture-o fa-lg"></i> </button>

                    <h2> @include('laravelLikeComment::like', ['like_item_id' => $robjek->id]) </h2> 
                    

                  </div>
                    <hr>
                  </div>
            </div>
          

{{-- MODAL NE --}}
    <div class="modal fade" id="lihat{{$robjek->slug}}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="exampleModalLabel">Detail Attraction</h4>
          </div>
          <div class="modal-body">

            <img src="{{ asset ("assets/images/img1/$robjek->img1") }}" onerror="this.src='{{ asset ("assets/images/error/900x500.png") }}'" width="" height="140"/>

              <table class="">
              <h2> @include('laravelLikeComment::like', ['like_item_id' => $robjek->id]) </h2> 
                <tbody>
                  <tr>
                    <td><b>Name</b></td>
                    <td> : </td>
                    <td> {{ $robjek->nama_objek }} </td>
                  </tr>
                  <tr>
                    <td><b>Address</b></td>
                    <td> : </td>
                    <td> {{ $robjek->alamat }} </td>
                  </tr>
                  <tr>
                    <td><b>Description</b></td>
                    <td> : </td>
                    <td>  </td>
                  </tr>
                </tbody>
              </table>
              
              <div style="text-align:justify">
                {!! substr($robjek->keterangan,0,400)."" !!} <a href="{{url('/objek', $robjek->slug)}}">read more.</a>
              </div>
          </div>
          <div class="modal-footer">
            <form class="" action="" method="post">
              <button class="btn btn-default" data-dismiss="modal"> Close </button>
            </form>
          </div>
        </div>
      </div>
    </div>

{{-- MODAL NE --}}

@endforeach
</div>   










@endsection

@section('footer')
@endsection
