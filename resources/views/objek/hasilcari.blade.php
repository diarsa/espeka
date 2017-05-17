{{ Session::get('message') }}

@extends('layout.master2')

@section('title', 'Result Attractions')

@section('header')
  @parent

  <section class="page_head">
      <div class="container">
          <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12">
                  <div class="page_title">
                      <h2>
                        @if (count($hasilc))
                          @foreach($nama_kats as $nama_kat)
                            Category of {{$nama_kat->nama_kat}}
                          @endforeach
                        @else
                          @foreach($nama_kats as $nama_kat)
                            Category of {{$nama_kat->nama_kat}}
                          @endforeach
                        @endif
                      </h2>
                  </div>
                  <nav id="breadcrumbs">
                      <ul>
                          <li><a href="{{URL('dashboard')}}">Home</a>/</li>
                          <li><a href="{{URL('objek')}}">Attractions</a>/</li>
                          <li>Category</li>
                      </ul>
                  </nav>
              </div>
          </div>
      </div>
  </section>

<div class="">
  <br>
</div>


	<div class="container">
		<div class="row">

  @if (count($hasilc))

    <nav class="clearfix">
      <div class="isotope col-lg-12">

        <ul id="list" class="portfolio_list clearfix">
            <!--begin List Item -->
            @foreach($hasilc as $data)
            <li class="list_item col-lg-4 col-md-6 col-sm-6 {{$data->kategori}}">
                <div class="recent-item box">
                    <figure class="touching ">
                        <img src="{{ asset ("assets/images/img1/$data->img1") }}" onerror="this.src='{{ asset ("assets/images/error/900x500.png") }}'"/>
                        <div class="option inner">
                          <div>
                              <h5>{{{ $data->nama_objek }}}</h5>
                              {{-- <a href="{{ asset ("assets/images/img1/$data->img1") }}" class="fa fa-search mfp-image"></a> --}}
                              <a href="{{url('/objek', $data->slug)}}" class="fa fa-link"></a>
                          </div>
                        </div>
                    </figure>
                    <div class="" align="center">
                      <b> {{{ $data->nama_objek }}} </b>
                    </div>
                </div>

                <br>
                <div align="center">
                  <button class="btn btn-info" name="button" title="Detail" method="get" data-toggle="modal" data-target="#lihat{{$data->slug}}" onclick="javascript: {{url('/objek/'.$data->slug)}}"> <i class="fa fa-info-circle fa-lg"></i> </button>

                  <button class="btn btn-info mfp-image" name="button" title="{{ $data->nama_objek }}" href="{{ asset ("assets/images/img1/$data->img1") }}") }}"> <i class="fa fa-picture-o fa-lg"></i> </button>

                  <a href="{{url('/objek/'.$data->slug)}}">
                    <button class="btn btn-info" name="button" title="Link" > <i class="fa fa-link fa-lg"></i> </button>
                  </a>
                </div>
                <hr>

            </li>
            @endforeach
            <!--end List Item -->
        </ul> <!--end portfolio_list -->

        <div class="" align="center">
          {!! $hasilc->links() !!}
        </div>
      </div>
    </nav>

  @else
    <h1> <i class="fa fa-frown-o"></i> Not Found </h1>

  @endif

    </div>
  </div>



@foreach($hasilc as $objek)

{{-- MODAL NE --}}

    <div class="modal fade" id="lihat{{$objek->slug}}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="exampleModalLabel">Detail Attraction</h4>
          </div>
          <div class="modal-body">

            <img src="{{ asset ("assets/images/img1/$objek->img1") }}" onerror="this.src='{{ asset ("assets/images/error/900x500.png") }}'" width="" height="140"/>

              {{-- {{$objek->lat}} --}}
            <div id="map-canvas{{$objek->id}}">

            </div>

            <h2> @include('laravelLikeComment::like', ['like_item_id' => $objek->id]) </h2>
              @if(Auth::guest())
                <i>Please <a href="{{url('login')}}">Login</a> for like or unlike this attraction</i> <hr>
              @else
                
              @endif

            {{-- <div class="col-lg-3">
              Name
            </div>
            <div class="col-lg-9">
              {{$objek->nama_objek}}
            </div> --}}

              <table class="">
                <tbody>
                  <tr>
                    <td><b>Name</b></td>
                    <td> : </td>
                    <td> {{ $objek->nama_objek }} </td>
                  </tr>
                  <tr>
                    <td><b>Address</b></td>
                    <td> : </td>
                    <td> {{ $objek->alamat }} </td>
                  </tr>
                  <tr>
                    <td><b>Description</b></td>
                    <td> : </td>
                    <td>  </td>
                  </tr>
                </tbody>
              </table>
              
              <div style="text-align:justify">
                {!! substr($objek->keterangan,0,400)."" !!} <a href="{{url('/objek', $objek->slug)}}">read more.</a>
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






@endsection

@section('footer')
@endsection
