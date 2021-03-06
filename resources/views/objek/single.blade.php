@extends('layout.master2')

@section('title', "$objek->nama_objek")

@section('header')
  @parent

  <style>
  	#map-canvas{
  		width: 100%;
  		height: 250px;
  	}
  </style>

  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCyB6K1CFUQ1RwVJ-nyXxd6W0rfiIBe12Q&libraries=places&signed_in=true" type="text/javascript"></script>

{{-- Menghitung halaman --}}
{{ Counter::count(URL('/objek/'.$objek->slug)) }} 

<section class="wrapper">
      <section class="page_head">
          <div class="container">
              <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12">
                      <div class="page_title">
                          <h2>{{ $objek->nama_objek }}</h2>
                      </div>
                      <nav id="breadcrumbs">
                          <ul>
                              <li><a href="{{URL('dashboard')}}">Home</a>/</li>
                              <li>Attractions</li>
                          </ul>
                      </nav>
                  </div>
              </div>
          </div>
      </section>

  <section class="content portfolio_single">
    <div class="container">
      <div class="row sub_content">
        <div class="col-lg-8 col-md-8 col-sm-8">
          <!--Project Details Page-->
          <div id="slider" class="swipe">
            <ul class="swipe-wrap">
              <li><img src="{{ asset ("assets/images/img1/$objek->img1") }}" onerror="this.src='{{ asset ("assets/images/error/900x500.png") }}'"/></li>
              <li><img src="{{ asset ("assets/images/img2/$objek->img2") }}" onerror="this.src='{{ asset ("assets/images/error/900x500.png") }}'"/></li>
              <li><img src="{{ asset ("assets/images/img3/$objek->img3") }}" onerror="this.src='{{ asset ("assets/images/error/900x500.png") }}'"/></li>

            </ul>
            <div class="swipe-navi">
              <div class="swipe-left" onclick="mySwipe.prev()"><i class="fa fa-chevron-left"></i></div>
              <div class="swipe-right" onclick="mySwipe.next()"><i class="fa fa-chevron-right"></i></div>
            </div>
          </div>

          <p>
            <i>
            Source images : {{ $objek->sumber_gambar }}
            </i>
          </p>

          <div class="project_description">
            <div class="widget_title">
              <h4><span>Description</span></h4>
            </div>
{{-- komentar --}}
            <div class="" style="text-align:justify">
                {!! $objek->keterangan !!}
            </div>
          </div>

        </div>

        <div class="col-lg-4 col-md-4 col-sm-4">

          <div class="project_description">
            <div class="widget_title">
              <h4><span>Map</span></h4>
            </div>
            <div id="map-canvas">

            </div>
              {{-- <iframe src="{{$objek->map}}" width="300" height="300" frameborder="0" style="border:0" allowfullscreen></iframe> --}}
          </div>


          <div class="project_details">
            <div class="widget_title">
              <h4><span>Detail</span></h4>
            </div>
            <ul class="details">
              <li><span>Name </span> {{ $objek->nama_objek }} </li>
              @foreach($nama_kats as $kat)
                <li><span>Category </span> {{ $kat->nama_kat }} </li>
              @endforeach
              <li><span>Address </span> {{ $objek->alamat }} </li>
              {{-- <li><span>Views </span> {{ Counter::showAndCount($objek->slug) }} <i class="fa fa-eye"></i> </li> --}}

<!--
              <li><span>Tanggal </span> {{ date('d F Y' , strtotime($objek->created_at) )}} </li>
              <li><span>Project URL </span> <a href="#">www.bdiarsa.id</a></li>
-->
            </ul>

          </div>

          <div class="project_details">
            <div class="widget_title">
              <h4><span>Share this</span></h4>
            </div>

            <!-- Go to www.addthis.com/dashboard to customize your tools --> 
            <div class="addthis_inline_share_toolbox"></div>
          </div>

        </div>



{{-- <div class="col-md-8" style="width: 500px; height: 500px;">
    {!! Mapper::render() !!}
</div> --}}




<div class="col-md-8 project_description">
<hr>
<i>Like or Unlike this attraction</i>
  <h2> @include('laravelLikeComment::like', ['like_item_id' => $objek->id]) </h2>
  @if(Auth::guest())
    <i>Please <a href="{{url('login')}}">Login</a> for like or unlike this attraction</i> <hr>
  @else
    
  @endif
        {{-- @include('laravelLikeComment::comment', ['comment_item_id' => '22']) --}}

</div>

{{-- KOMENTAR DISQUS --}}

        {{-- <div class="col-md-8 project_description">
            <div id="disqus_thread"></div>
              <script>
              
              (function() { // DON'T EDIT BELOW THIS LINE
              var d = document, s = d.createElement('script');
                s.src = '//disbudpar-bangli.disqus.com/embed.js';
                s.setAttribute('data-timestamp', +new Date());
                (d.head || d.body).appendChild(s);
              })();
              
              </script>

              <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
          </div> --}}

{{-- KOMENTAR DISQUS --}}



{{-- KOMENTAR FACEBOOK --}}

          {{-- <div
            class="fb-like"
            data-share="true"
            data-width="450"
            data-show-faces="true">
          </div> --}}

          <div class="col-md-8">
            <div id="fb-root"></div>
            <script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script>
            <fb:comments href="{{URL('/objek', $objek->slug)}}" num_posts="10" width="100%"></fb:comments>
          </div>

{{-- KOMENTAR FACEBOOK --}}

      </div>

      <div class="row sub_content">
          <div class="col-md-12">
              <div class="dividerHeading">
                  <h4><span>More Attractions</span></h4>
              </div>
              <div id="recent-work-slider" class="owl-carousel">
                @foreach($obj_lain as $dobjek)
                  <div class="recent-item box">
                      <figure class="touching ">
                          {{-- <img src="{{ asset ("assets/images/img1/$dobjek->img1") }}" onerror="this.src='{{ asset ("assets/images/error/530x400.png") }}'" width="" height="140"/> --}}
                          <img src="{{ asset ("assets/images/img1/$dobjek->img1") }}" onerror="this.src='{{ asset ("assets/images/error/530x400.png") }}'" width="" height=""/>

                          <div class="option inner">
                              <div>
                                  <h5>{{ $dobjek->nama_objek }}</h5>
                                  <a href="{{ asset ("assets/images/img1/$dobjek->img1") }}" onerror="this.src='{{ asset ("assets/images/error/900x500.png") }}'" class="fa fa-search mfp-image"></a>
                                  <a href="{{url('/objek', $dobjek->slug)}}" class="fa fa-link"></a>

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
  </section>
</section>


<script>

var lat = {{ $objek->lat }};
var lng = {{ $objek->lng }};

var map = new google.maps.Map(document.getElementById('map-canvas'),{
  center:{
    lat: lat,
    lng: lng
  },
  zoom: 12
});

var marker = new google.maps.Marker({
  map: map,
    // Define the place with a location, and a query string.
    place: {
      location: {lat: lat, lng: lng},
      query: 'Google, Sydney, Australia'

    },

// Attributions help users find your site again.
  attribution: {
    source: 'Google Maps JavaScript API',
    webUrl: 'https://developers.google.com/maps/'
  }

});


// Construct a new InfoWindow.
  var infoWindow = new google.maps.InfoWindow({
    content: '{{$objek->nama_objek}}'
  });

// Opens the InfoWindow when marker is clicked.
  marker.addListener('click', function() {
    infoWindow.open(map, marker);
  });



</script>







@endsection

@section('footer')
@endsection
