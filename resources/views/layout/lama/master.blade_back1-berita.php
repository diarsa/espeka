<div class="row wow fadeInUp">
  @foreach($beritas as $berita)
    <div class="col-lg-6  rec_blog">
        <div class="blogPic">
            <img alt="" src="{{ asset ("assets/images/blog/blog_6.png") }}">
            <div class="blog-hover">
                <a href="{{URL ('berita', $berita->slug)}}">
                    <span class="icon">
                        <i class="fa fa-link"></i>
                    </span>
                </a>
            </div>
        </div>
        <div class="blogDetail">
            <div class="blogTitle">
                <a href="{{URL ('berita', $berita->slug)}}">
                    <h2>{{ $berita->title }}</h2>
                </a>
                <span>
                    <i class="fa fa-calendar"></i>
                    {{ date('d F Y' , strtotime($berita->created_at) )}}
                </span>
            </div>
            <div class="blogContent">
                <p>{{ $berita->subject }} </p>
            </div>
            <div class="blogMeta">
                <a href="#">
                    <i class="fa fa-user"></i>
                    Here Author Name
                </a>
                <a href="#">
                    <i class="fa fa-comment"></i>
                    1980
                </a>
            </div>
        </div>
    </div>
  @endforeach
</div>
