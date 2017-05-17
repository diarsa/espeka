<!--Sidebar Widget-->
<div class="col-xs-12 col-md-4 col-lg-4 col-sm-4">
	<div class="sidebar">
		<div class="widget widget_search">
			<div class="site-search-area">
				<form method="get" id="site-searchform" action="#">
					<div>
						<input class="input-text" name="s" id="s" placeholder="Enter Search keywords..." type="text" />
						<input id="searchsubmit" value="Search" type="submit" />
					</div>
				</form>
			</div><!-- end site search -->
		</div>

      <div class="widget widget_tab">
          <div class="velocity-tab sidebar-tab">
              <ul  class="nav nav-tabs">
                  <li class="active"><a href="#Popular" data-toggle="tab">Popular</a></li>
                  <li class=""><a href="#Recent" data-toggle="tab">Recent</a></li>
                  <li class="last-tab"><a href="#Comment" data-toggle="tab"><i class="fa fa-comments-o"></i></a></li>
              </ul>

              <div  class="tab-content clearfix">
                  <div class="tab-pane fade active in" id="Popular">
                      <ul class="recent_tab_list">
                        @foreach($pberitas as $pberita)
                          <li>
                              <span><a href="{{url('/berita', $pberita->slug)}}"><img src="{{asset(('assets/images/content/recent_1.png'))}}" alt="" /></a></span>
                              <a href="{{url('/berita', $pberita->slug)}}">{{$pberita->title}}</a>
                              <i>{{ date('d F Y' , strtotime($pberita->created_at) )}}</i>
                          </li>
                        @endforeach
                      </ul>
                  </div>
                  <div class="tab-pane fade" id="Recent">
                      <ul class="recent_tab_list">

                        @foreach($rberitas as $rberita)
                          <li>
                              <span><a href="{{url('/berita', $rberita->slug)}}"><img src="{{asset(('assets/images/content/recent_4.png'))}}" alt="" /></a></span>
                              <a href="{{url('/berita', $rberita->slug)}}">{{$rberita->title}}</a>
                              <i>{{ date('d F Y' , strtotime($rberita->created_at) )}}</i>
                          </li>
                        @endforeach

                      </ul>
                  </div>
                  <div class="tab-pane fade">
                      <ul class="comments">
                          <li class="comments_list clearfix">
                              <a class="post-thumbnail" href="#"><img width="60" height="60" src="{{asset(('assets/images/content/recent_3.png'))}}" alt="#"></a>
                              <p><strong><a href="#">Prambose</a> <i>says: </i> </strong> Morbi augue velit, tempus mattis dignissim nec, porta sed risus. Donec eget magna eu lorem tristique pellentesque eget eu dui. Fusce lacinia tempor malesuada.</p>
                          </li>
                          <li class="comments_list clearfix">
                              <a class="post-thumbnail" href="#"><img width="60" height="60" src="{{asset(('assets/images/content/recent_1.png'))}}" alt="#"></a>
                              <p><strong><a href="#">Makaroni</a> <i>says: </i> </strong> Tempus mattis dignissim nec, porta sed risus. Donec eget magna eu lorem tristique pellentesque eget eu dui. Fusce lacinia tempor malesuada.</p>
                          </li>
                          <li class="comments_list clearfix">
                              <a class="post-thumbnail" href="#"><img width="60" height="60" src="{{asset(('assets/images/content/recent_2.png'))}}" alt="#"></a>
                              <p><strong><a href="#">Prambanan</a> <i>says: </i> </strong> Donec convallis, metus nec tempus aliquet, nunc metus adipiscing leo, a lobortis nisi dui ut odio. Nullam ultrices, eros accumsan vulputate faucibus, turpis tortor.</p>
                          </li>
                      </ul>
                  </div>
              </div>
          </div>
      </div>

		<div class="widget widget_archives">
			<div class="widget_title">
				<h4><span>Archives</span></h4>
			</div>
			<ul class="archives_list list_style">
				<li><a href="#"> November 2015</a></li>
				<li><a href="#"> October 2015</a></li>
				<li><a href="#"> September 2015</a></li>
				<li><a href="#"> August 2015</a></li>
				<li><a href="#"> July 2015</a></li>
				<li><a href="#"> June 2015</a></li>
				<li><a href="#"> May 2015</a></li>
			</ul>
		</div>
	</div>
</div>