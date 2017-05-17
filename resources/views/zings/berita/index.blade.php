@extends('layout.master2')

@section('title', 'News')

@section('header')
  @parent

<section class="wrapper">
      <section class="page_head">
          <div class="container">
              <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12">
                      <div class="page_title">
                          <h2>News</h2>
                      </div>
                      <nav id="breadcrumbs">
                          <ul>
                              <li><a href="{{url('dashboard')}}">Home</a>/</li>
                              <li>Newss</li>
                          </ul>
                      </nav>
                  </div>
              </div>
          </div>
      </section>

      <section class="content blog">
  			<div class="container">
  				<div class="row">
  					<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
              <div class="blog_medium">
                @foreach($beritas as $berita)
  							<article class="post">
  								<div class="post_date">
  									<span class="day">{{ date('d' , strtotime($berita->created_at) )}}</span>
  									<span class="month">{{ date('M' , strtotime($berita->created_at) )}}</span>
  								</div>
  								<figure class="post_img">
  									<a href="{{url('/berita', $berita->slug)}}">
  										<img src="{{asset("assets/images/berita/$berita->img")}}" onerror="this.src='{{ asset ("assets/images/error/900x500.png") }}'" alt="{{$berita->title}}">
  									</a>
  								</figure>
  								<div class="post_content">
  									<div class="post_meta">
  										<h2>
  											<a href="{{url('/berita', $berita->slug)}}">{{ $berita->title }}</a>
  										</h2>
  										<div class="metaInfo">
  											<span><i class="fa fa-user"></i> By <a href="#">Louis</a> </span>
  											<span><i class="fa fa-comments"></i> <a href="{{URL('/berita', $berita->slug)}}#disqus_thread" class="disqus-comment-count" data-disqus-url="{{URL('/berita', $berita->slug)}}">Comments</a></span>

  										</div>
  									</div>
  									<p>{!! $berita->subject !!}</p>
  									<a class="btn btn-small btn-default" href="{{url('/berita', $berita->slug)}}">Read More</a>

  								</div>
  							</article>
                @endforeach
  						</div>

              <!--TONGOS LINK-->
              <div class="">
                {!! $beritas->links() !!}
              </div>

  				    </div>


{{-- Sidebar Widget --}}
@include('berita.sidebar')


  				</div><!--/.row-->
  			</div> <!--/.container-->
  		</section>
  </section>
<!--END Sidebar Widget-->

@endsection

@section('footer')
@endsection
