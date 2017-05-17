@extends('layout.master2')

@section('title', 'Result ')

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

        @if(Session::has('message'))

          <div class="alert alert-success fade in">
            <button data-dismiss="alert" class="close close-sm" type="button">
              <i class="fa fa-times">
              </i>
            </button>
            <strong>
              {{ Session::get('message') }}
            </strong>
            And this is the recommendations who match with your characteristic
          </div>
        @else

        @endif

      <div class="col-md-6">
          <div class="alert alert-success fade in">
            <button data-dismiss="alert" class="close close-sm" type="button">
              <i class="fa fa-times">
              </i>
            </button>
            <strong>
              Success!
            </strong>
            And this is the recommendations who match with your characteristic
          </div>

        <blockquote class="default">
          Please click <b>Like</b> or <b>Unlike</b> button if you Like or Unlike the result of recommendation.
        </blockquote>



      </div>

      <div class="col-md-6">
        <blockquote class="default">
        
        <div class="">
          
          <table class="table">
           
            @foreach($idne as $idn)
              <tr>
                  <td>Name</td>
                  <td>:</td>
                  <td>{{$idn->nama}} 
                    {{-- || ID : {{$idn->id}} --}}
                  </td>
              </tr>
            @endforeach
            
            @foreach($wisat as $wi)
              <tr>
                  <td>Country</td>
                  <td>:</td>
                  <td>{{$wi->country}}</td>
              </tr>
              
              <tr>
                  <td>Gender</td>
                  <td>:</td>
                  <td>{{$wi->gender}}</td>
              </tr>
              <tr>
                  <td>Purpose</td>
                  <td>:</td>
                  <td>{{$wi->purpose}}</td>
              </tr>
              <tr>
                  <td>Age</td>
                  <td>:</td>
                  <td>{{$wi->umur}} years old</td>
              </tr>
              <tr>
                  <td>Frequency</td>
                  <td>:</td>
                  <td>{{$wi->frekuensi}}</td>
              </tr>
            @endforeach
            
          </table>
          
        </div>

        
        </blockquote>
      </div>
      

      
      <div class="col-md-12" align="center">
        <h3>
          <?php $nilai = 0; ?>

          @if(isset($temps[0]->hasil))
            <?php $nilai = number_format(($temps[0]->nilai)* 100, 2); ?>
            Based on the characteristics that your enter, we recommended {{ $nilai }}% to visit this attractions.
          @else 
            There are no recommendation, because you are just input one characteristic or your data is not available in database. But you can chose this another attractions
          @endif
          {{-- Based on the characteristics that your enter, we recommended {{ $nilai }}% to visit this attractions. --}}
        </h3>
      <hr>
      </div>

      <div class="col-lg-12">

      @foreach($robjeks as $rItem) 
        <div class="row">
          @foreach($rItem as $robjek)
            <div class="col-md-4">
              <div class="recent-item box">
                      <figure class="touching ">
                          <img src="{{ asset ("assets/images/img1/$robjek->img1") }}" onerror="this.src='{{ asset ("assets/images/error/900x500.png") }}'"/>
                          <div class="option inner">
                            <div>
                            {{-- {{ $robjek->id }} --}}
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
                    
                    {{-- <a href="{{ asset ("assets/images/img1/$robjek->img1") }}" class="fa fa-search mfp-image fa-lg"></a> --}}

                  </div>
                    <hr>
                  </div>
            </div>
          @endforeach
        </div> 
        
{{-- <hr> --}}

      @endforeach
      </div>
        {{-- <div class="" align="center">
          {!! $robjeks->links() !!}
        </div> --}}

      <div class="col-md-12" align="center">
        <h3>
          @if($nilai != 0)
            Or you can chose another attraction if you do not agree with the recommendation.
          @else 
            
          @endif
          
        </h3>
      <hr>
      </div>

      

        <div class="row sub_content">
          <div class="col-md-12">
            <div class="dividerHeading">
                <h4><span><a href="{{URL('objek')}}">Another Attractions</a></span></h4>
            </div>
            <div id="recent-work-slider" class="owl-carousel">
              @foreach($obj_lain as $dobjek)
                <div class="recent-item box">
                  <figure class="touching ">
                      <img src="{{ asset ("assets/images/img1/$dobjek->img1") }}" onerror="this.src='{{ asset ("assets/images/error/530x400.png") }}'" width="" height=""/>

                      <div class="option inner">
                          <div>
                              <h5>{{ $dobjek->nama_objek }}</h5>

                              <button class="btn btn-info" name="button" title="Detail" method="get" data-toggle="modal" data-target="#lihat{{$dobjek->slug}}" onclick="javascript: {{url('/objek/'.$dobjek->slug)}}"> <i class="fa fa-info-circle fa-lg"></i> </button>

                              <button class="btn btn-info mfp-image" name="button" title="{{ $dobjek->nama_objek }}" href="{{ asset ("assets/images/img1/$dobjek->img1") }}") }}"> <i class="fa fa-picture-o fa-lg"></i> </button>

                          </div>
                      </div>
                  </figure>
                  <div class="" align="center">
                      <b> 
                          {{{ $dobjek->nama_objek }}}
                      </b>
                  </div>
                </div>
              @endforeach
            </div>
          </div>
        </div>

      </div>


@foreach($robjeks as $rItem)
  @foreach($rItem as $robjek)
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
@endforeach



{{-- MODAL Objek Lain NE --}}
@foreach($obj_lain as $dobjek)

    <div class="modal fade" id="lihat{{$dobjek->slug}}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="exampleModalLabel">Detail Attraction</h4>
          </div>
          <div class="modal-body">

            <img src="{{ asset ("assets/images/img1/$dobjek->img1") }}" onerror="this.src='{{ asset ("assets/images/error/900x500.png") }}'" width="" height="140"/>

              <table class="">

              <h2> @include('laravelLikeComment::like', ['like_item_id' => $dobjek->id]) </h2> 

                <tbody>
                  <tr>
                    <td><b>Name</b></td>
                    <td> : </td>
                    <td> {{ $dobjek->nama_objek }} </td>
                  </tr>
                  <tr>
                    <td><b>Address</b></td>
                    <td> : </td>
                    <td> {{ $dobjek->alamat }} </td>
                  </tr>
                  <tr>
                    <td><b>Description</b></td>
                    <td> : </td>
                    <td>  </td>
                  </tr>
                </tbody>
              </table>
              
              <div style="text-align:justify">
                {!! substr($dobjek->keterangan,0,400)."" !!} <a href="{{url('/objek', $dobjek->slug)}}">read more.</a>
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

@endforeach
{{-- MODAL Objek Lain NE --}}










@endsection

@section('footer')
@endsection
