<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie ie8" class="no-js" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html class="no-js" lang="en"> <!--<![endif]-->

<?php $__env->startSection('footer'); ?>
	<!--start footer-->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="widget_title">
                        <h4><span>About</span></h4>
                    </div>
                    <div class="widget_content">
                      <?php foreach($fdes as $fdess): ?>
                        <p><?php echo strip_tags($fdess->isi); ?></p>
                      <?php endforeach; ?>
                        <ul class="contact-details-alt">
                          <?php foreach($ftentangs as $ftentang): ?>
                            <li><i class="fa <?php echo e($ftentang->fa); ?>"></i> <p><strong><?php echo $ftentang->nama; ?></strong>: <?php echo $ftentang->isi; ?></p>
                            </li>
                          <?php endforeach; ?>
                    </div>
                </div>
                <?php /* <div class="col-sm-6 col-md-3 col-lg-3 ">
                    <div class="widget_title">
                        <h4><span>News</span></h4>
                    </div>
                    <div class="widget_content">
                       <ul class="links">
                        <?php foreach($fberitas as $fberita): ?>
                          <li><a href="<?php echo e(url('/berita', $fberita->slug)); ?>"><?php echo e($fberita->title); ?><span><?php echo e(date('d M Y' , strtotime($fberita->created_at) )); ?></span></a></li>
                        <?php endforeach; ?>
                        </ul>
                    </div>
                </div> */ ?>
                <div class="col-sm-4">
                    <div class="widget_title">
                        <h4><span>Popular Attractions</span></h4>
                    </div>
                    <div class="widget_content">
                       <ul class="links">
                        <?php foreach($fobjeks as $fobjek): ?>
                          <li><a href="<?php echo e(url('/objek', $fobjek->slug)); ?>"><?php echo e($fobjek->nama_objek); ?><span><?php echo e($fobjek->alamat); ?></span></a></li>
                        <?php endforeach; ?>
                        </ul>
                    </div>
                    <div class="widget_content">
                        <div class="tweet_go"></div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3 col-lg-3 " id="language">
                    <div class="widget_title">
                        <h4><span>Languages</span></h4>
                    </div>
                    <div class="widget_content">
                    <?php /* Google Translate Start */ ?>

                      <?php /* <div id="google_translate_element"></div>
                      <script type="text/javascript">
                        function googleTranslateElementInit() {
                          new google.translate.TranslateElement({pageLanguage: 'id', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
                        }
                      </script>
                      <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script> */ ?>

                      <div id="google_translate_element"></div>
                      <script type="text/javascript">
                        function googleTranslateElementInit() {
                          new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE, multilanguagePage: true}, 'google_translate_element');
                        }
                      </script>
                      <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

                    <?php /* Google Translate End */ ?>
                    

                    </div>
                </div>

                <div class="col-sm-6 col-md-3 col-lg-3 " id="">
                    <div class="widget_title">
                        <h4><span>Views</span></h4>
                    </div>
                    <div class="widget_content">
                      <h2>
                        Total Views <?php echo e(Counter::allHits()); ?> <i class="fa fa-eye"></i>

                        <?php /*Menghitung hit halaman dashboard*/ ?>
                        <?php echo e(Counter::count('dashboard')); ?> 
                        <?php echo e(Counter::count('/')); ?> 
                      </h2>
                    </div>
                </div>

            </div>
        </div>
    </footer>
	<!--end footer-->

	<section class="footer_bottom" >
		<div class="container">
			<div class="row wow">
            <div class="col-sm-8 wow fadeInUp">
            

              <p class="copyright">&copy; 
                <?php if(date('Y')==2017): ?> 2017
                <?php else: ?> 2017 - <?php echo e(date('Y')); ?> 
                <?php endif; ?>
                <a href="http://www.disbudpar.banglikab.go.id/" target="_blank"> Disbudpar Bangli </a> | Designed & Developed by <a href="http://www.facebook.com/bdiarsa" target="_blank"> Bayu Diarsa </a> 
                <?php /* | Powered by <a href="http://www.jqueryrain.com/" target="_blank"> jQuery Rain </a> */ ?>
              </p>
            </div>

            <div class="col-sm-4 wow fadeInDown">
                <div class="footer_social">
                    <ul class="footbot_social">
                        <li><a class="fb" href="http://facebook.com/pemkabbangli" target="_blank" data-placement="top" data-toggle="tooltip" title="Facebook"><i class="fa fa-facebook-official"></i></a></li>
                        <li><a class="twtr" href="http://twitter.com/pemkabbangli" target="_blank" data-placement="top" data-toggle="tooltip" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                        <li><a class="dribbble" href="http://youtube.com/channel/UCkT0GNviWfilgNvXiCIXF3g" target="_blank" data-placement="top" data-toggle="tooltip" title="Youtube"><i class="fa fa-youtube-play"></i></a></li>
                        <li><a class="rss" href="#." data-placement="top" data-toggle="tooltip" title="RSS"><i class="fa fa-rss"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
		</div>
	</section>


<?php /* Untuk Tombol LIKE */ ?>
<?php /* Jika ini diisi, maka akan bentrok, sehingga tidak bisa muncul more attractions */ ?>
<?php /* <script src="<?php echo e(asset ("assets/admin/js/jquery-1.8.3.min.js")); ?>"></script>
<script src="<?php echo e(asset ("assets/admin/bs3/js/bootstrap.min.js")); ?>"></script>
<script src="<?php echo e(asset ("assets/admin/js/bootstrap-switch.js")); ?>"></script>
<script src="<?php echo e(asset ("assets/admin/js/select2/select2.js")); ?>"></script>
<script src="<?php echo e(asset ("assets/admin/js/toggle-init.js")); ?>"></script> */ ?>

  <script type="text/javascript" src="<?php echo e(asset ("assets/js/jquery-1.10.2.min.js")); ?>"></script>
  <script src="<?php echo e(asset ("assets/js/bootstrap.min.js")); ?>"></script>
  <script src="<?php echo e(asset ("assets/js/jquery.easing.1.3.js")); ?>"></script>
  <script src="<?php echo e(asset ("assets/js/retina-1.1.0.min.js")); ?>"></script>
  <script type="text/javascript" src="<?php echo e(asset ("assets/js/jquery.cookie.js")); ?>"></script> <!-- jQuery cookie -->
  <script type="text/javascript" src="<?php echo e(asset ("assets/js/styleswitch.js")); ?>"></script> <!-- Style Colors Switcher -->

  <script src="<?php echo e(asset ("assets/js/jquery.fractionslider.js")); ?>" type="text/javascript" charset="utf-8"></script>

  <script type="text/javascript" src="<?php echo e(asset ("assets/js/jquery.smartmenus.min.js")); ?>"></script>
  <script type="text/javascript" src="<?php echo e(asset ("assets/js/jquery.smartmenus.bootstrap.min.js")); ?>"></script>
  <script type="text/javascript" src="<?php echo e(asset ("assets/js/owl.carousel.min.js")); ?>"></script>
  <script type="text/javascript" src="<?php echo e(asset ("assets/js/jflickrfeed.js")); ?>"></script>
  <script type="text/javascript" src="<?php echo e(asset ("assets/js/jquery.magnific-popup.min.js")); ?>"></script>
  <script type="text/javascript" src="<?php echo e(asset ("assets/js/jquery.isotope.min.js")); ?>"></script>
  <script type="text/javascript" src="<?php echo e(asset ("assets/js/swipe.js")); ?>"></script>
  <script type="text/javascript" src="<?php echo e(asset ("assets/js/jquery-hoverdirection.min.js")); ?>"></script>
  <script type="text/javascript" src="<?php echo e(asset ("assets/js/jquery.matchHeight-min.js")); ?>"></script>
  <script type="text/javascript" src="<?php echo e(asset ("assets/js/jquery-scrolltofixed-min.js")); ?>"></script>

  <!--TAMBAHAN-->
  <script src="<?php echo e(asset("assets/js/select2/select2.js")); ?>"></script>
  <script src="<?php echo e(asset("assets/js/select-init.js")); ?>"></script>

  <script src="<?php echo e(asset("assets/js/jquery-steps/jquery.steps.js")); ?>"></script>


  <!--this page script validasi dari bucket admin-->
  <script type="text/javascript" src="<?php echo e(asset("assets/js/bucket/jquery.validate.min.js")); ?>"></script>
  <script src="<?php echo e(asset("assets/js/bucket/validation-init.js")); ?>"></script>
  <!--this page script validasi dari bucket admin-->

  <!--TAMBAHAN-->

<!-- GOOGLE MAPS-->
  <?php /* <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyCyB6K1CFUQ1RwVJ-nyXxd6W0rfiIBe12Q&libraries=places"></script> */ ?>

  <script src="<?php echo e(asset ("assets/js/main.js")); ?>"></script>


<!-- MAVIGATOR-->
  <script src="<?php echo e(asset ('assets/js/mavigator.min.js')); ?>"></script>

  <!-- Start Style Switcher -->
  <!--
    <div class="switcher"></div>
  -->
  <!-- End Style Switcher -->

  <!-- Portfolio -->
  <script>

      (function($) {
          "use strict";
          var $container = $('.portfolio'),
                  $items = $container.find('.portfolio-item'),
                  portfolioLayout = 'fitRows';

          if( $container.hasClass('portfolio-centered') ) {
              portfolioLayout = 'masonry';
          }

          $container.isotope({
              filter: '*',
              animationEngine: 'best-available',
              layoutMode: portfolioLayout,
              animationOptions: {
                  duration: 750,
                  easing: 'linear',
                  queue: false
              },
              masonry: {
              }
          }, refreshWaypoints());

          function refreshWaypoints() {
              setTimeout(function() {
              }, 1000);
          }

          $('ul#filter li').on('click', function() {
              var selector = $(this).attr('data-filter');
              $container.isotope({ filter: selector }, refreshWaypoints());
              $('ul#filter li').removeClass('selected');
              $(this).addClass('selected');
              return false;
          });

          function getColumnNumber() {
              var winWidth = $(window).width(),
                      columnNumber = 1;

              if (winWidth > 1200) {
                  columnNumber = 5;
              } else if (winWidth > 950) {
                  columnNumber = 4;
              } else if (winWidth > 600) {
                  columnNumber = 3;
              } else if (winWidth > 400) {
                  columnNumber = 2;
              } else if (winWidth > 250) {
                  columnNumber = 1;
              }
              return columnNumber;
          }

          function setColumns() {
              var winWidth = $(window).width(),
                      columnNumber = getColumnNumber(),
                      itemWidth = Math.floor(winWidth / columnNumber);

              $container.find('.portfolio-item').each(function() {
                  $(this).css( {
                      width : itemWidth + 'px'
                  });
              });
          }

          function setPortfolio() {
              setColumns();
              $container.isotope('reLayout');
          }

          $container.imagesLoaded(function () {
              setPortfolio();
          });

          $(window).on('resize', function () {
              setPortfolio();
          });
      })(jQuery);
  </script>

  <script>
      $(function ()
      {
          $("#wizard").steps({
              headerTag: "h2",
              bodyTag: "section",
              transitionEffect: "slideLeft"
          });

          $("#wizard-vertical").steps({
              headerTag: "h2",
              bodyTag: "section",
              transitionEffect: "slideLeft",
              stepsOrientation: "vertical"
          });
      });
  </script>

  <!-- WARNING: Wow.js doesn't work in IE 9 or less -->
  <!--[if gte IE 9 | !IE ]><!-->
      <script type="text/javascript" src="<?php echo e(asset ("assets/js/wow.min.js")); ?>"></script>
      <script>
          // WOW Animation
          new WOW().init();
      </script>
  <![endif]-->


  <?php /* UNTUK DISQUS */ ?>
    
    <script id="dsq-count-scr" src="http://disbudpar-bangli.disqus.com/count.js" async="async" ></script>
  
  <?php /* UNTUK DISQUS */ ?>


  <?php /* Gooele Analytic */ ?>
  <?php echo $__env->make('layout.analytics', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <?php /* Gooele Analytic */ ?>


<?php /* RISUL LARAVEL LIKE COMMENT */ ?>
  <?php /* <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script> */ ?>
  <script src="<?php echo e(asset('/vendor/laravelLikeComment/js/script.js')); ?>" type="text/javascript"></script>
<?php /* RISUL LARAVEL LIKE COMMENT */ ?>


<?php /* ADD THIS Plug In */ ?>
<!-- Go to www.addthis.com/dashboard to customize your tools --> 
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-58a30605aa422444"></script> 
<?php /* ADD THIS Plug In */ ?>




</body>
</html>
