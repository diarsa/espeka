<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie ie8" class="no-js" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html class="no-js" lang="en"> <!--<![endif]-->

<body class="home">

<?php /* Gooele Analytic */ ?>
<?php /* <?php echo $__env->make('layout.analytics', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> */ ?>
<?php /* Gooele Analytic */ ?>

    <!--Start Header-->

      <?php echo $__env->make('layout.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <!--End Header-->

	<!--start wrapper-->
    <section class="wrapper">
        <!--Start Slider-->
        <div class="slider-wrapper">
            <div class="slider">
                <div class="fs_loader"></div>
              <?php foreach($sliders as $slider): ?>
                <div class="slide">

                    <img src="<?php echo e(asset ("assets/images/img_slider/$slider->img_slider")); ?>" width="1920" height="auto" data-in="fade" data-out="fade" />

                    <p class="slide-heading" data-position="20,230" data-in="top" data-out="top" data-ease-in="easeOutBounce" data-delay="1"><?php echo e($slider->nama_objek); ?></p>

                    <p class="sub-line" data-position="110,230" data-in="right" data-out="left" data-delay="1"><?php echo e($slider->alamat); ?></p>

                    <a href="<?php echo e(url('/objek', $slider->slug)); ?>"	class="btn btn-lg btn-default" data-position="350,230" data-in="bottom"  data-out="bottom" data-delay="2" data-ease-in="easeOutBounce">DETAIL</a>
                </div>
              <?php endforeach; ?>
            </div>
        </div>
        <!--End Slider-->
        <section class="promo_box wow bounceIn">
            <div class="container">
                <div class="row">
                    <div class="col-sm-9 col-md-9 col-lg-9">
                        <div class="promo_content">
                          <?php foreach($deskripsi_sistem as $des_sis): ?>
                            <h3><?php echo $des_sis->nama; ?></h3>
                            <p><?php echo $des_sis->isi; ?></p>
                          <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="col-sm-3 col-md-3 col-lg-3">
                        <div class="pb_action">
                            <a class="btn btn-lg btn-default" href="<?php echo e(URL('wisatawan/create')); ?>">
                                <i class="fa fa-user"></i>
                                Click here »
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--start info service-->
        <section class="info_service">
            <div class="container">

                <div class="row sub_content">
                    <div class="rs_box " data-wow-offset="200">
                        <div class="col-sm-4 ">
                            <div class="serviceBox_1">
                                <div class="service-icon">
                                    <i class="fa fa-star-o"></i>
                                </div>
                                <div class="service-content">
                                  <?php foreach($des1 as $des_1): ?>
                                    <h3><?php echo $des_1->nama; ?></h3>
                                    <p><?php echo $des_1->isi; ?></p>
                                  <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 ">
                            <div class="serviceBox_1">
                                <div class="service-icon">
                                    <i class="fa fa-comment-o"></i>
                                </div>
                                <div class="service-content">
                                  <?php foreach($des2 as $des_2): ?>
                                    <h3><?php echo $des_2->nama; ?></h3>
                                    <p><?php echo $des_2->isi; ?></p>
                                  <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 ">
                            <div class="serviceBox_1">
                                <div class="service-icon">
                                    <i class="fa fa-bell-o"></i>
                                </div>
                                <div class="service-content">
                                  <?php foreach($des3 as $des_3): ?>
                                    <h3><?php echo $des_3->nama; ?></h3>
                                    <p><?php echo $des_3->isi; ?></p>
                                  <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--end info service-->

        <section class="section3">
            <div class="dividerHeading text-center ">
                <h4><span>Populer in Bangli</span></h4>
            </div>
<?php /*
            <nav class="clearfix">
                <ul id="filter">
                    <li data-filter="*" class="selected"><a href="#">Daya Tarik Wisata Populer di Bangli</a></li>
                </ul>
            </nav>
*/ ?>
            <div class="portfolio-centered">
                <div class="recentitems portfolio ">

                  <?php foreach($objeks as $objek): ?>
                    <div class="portfolio-item">
                        <div class="box">
                            <img src="<?php echo e(asset ("assets/images/img1/$objek->img1")); ?>" alt="">
                            <div class="option inner">
                                <div>
                                    <h5><?php echo e($objek->nama_objek); ?></h5>
                                    <a href="<?php echo e(asset ("assets/images/img1/$objek->img1")); ?>" class="fa fa-search mfp-image"></a>
                                    <a href="<?php echo e(url('/objek', $objek->slug)); ?>" class="fa fa-link"></a>
                                </div>
                            </div>
                        </div><!-- box -->
                        <div class=" " align="center">
                            <b>
                                <a href="<?php echo e(url('/objek', $objek->slug)); ?>"> 
                                    <?php echo e($objek->nama_objek); ?> 
                                </a>
                            </b>
                        </div>
                    </div>
                  <?php endforeach; ?>

                </div><!-- portfolio -->
            </div><!-- portfolio container -->
        </section>

<!-- Grafik dan FA&Q Tanya Jawab -->
        <section class="progress-bar-acc">
            <div class="container">
                <div class="row super_sub_content">
                  <!-- Grafik Kunjungan -->
                    <div class="col-lg-6 col-lg-6 col-lg-6 ">
                        <div class="dividerHeading ">
                            <h4><span>Graph Visit</span></h4>
                        </div>
                        <div class="row ">
                            <div class="col-lg-12 ">
                                <ul class="progress-skill-bar mrg-0">
                                  <?php foreach($objeks as $objek): ?>
                                    <a href="<?php echo e(url('/objek', $objek->slug)); ?>"> <b> <?php echo e($objek->nama_objek); ?> </b> </a> 
                                    <li>
                                        <span class="lable">
                                        <?php /* <?php echo e($objek->hits); ?> */ ?>
                                        <?php echo e(number_format((($objek->hits/$persen)* 100))); ?> %
                                        </span>
                                        <div class="progress_skill">
                                            <div data-height="100" role="progressbar" data-value="<?php echo e(number_format((($objek->hits/$persen)* 120))); ?>" 

                                            class="bar">
                                                <?php /* <?php echo e($objek->nama_objek); ?> */ ?>
                                            </div>
                                        </div>
                                    </li>
                                  <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Tanya Jawab -->
                    <div class="col-lg-6 col-md-12 col-sm-12 ">
                        <div class="dividerHeading ">
                            <h4><span>FAQs</span></h4>
                        </div>
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

                          <?php
                            $heading = 1;
                            $collapse = 1;
                            $collapses = 1;
                            $tabpane = 1;
                            $headings = 1;
                          ?>

                          <?php foreach($tjs as $tj): ?>
                            <div class="panel panel-default">
                                <div class="panel-heading button_outer_rounded" role="tab" id="heading<?php echo e($heading++); ?>">
                                    <h4 class="panel-title">
                                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo e($collapse++); ?>" aria-expanded="false" aria-controls="collapseTwo">
                                            <?php echo $tj->nama; ?>

                                        </a>
                                    </h4>
                                </div>
                                <div id="collapse<?php echo e($collapses++); ?>" class="panel-collapse collapse" role="tabpane<?php echo e($tabpane++); ?>" aria-labelledby="heading<?php echo e($headings++); ?>">
                                    <div class="panel-body">
                                        <?php echo $tj->isi; ?>

                                    </div>
                                </div>
                            </div>
                          <?php endforeach; ?>

                        </div>

                        </div>
                    </div><!-- TESTIMONIALS END -->
                </div>
            </div>
        </section>




        <?php /* <section class="feature_bottom">
            <div class="container">
                <div class="row sub_content">
                    <div class="col-lg-8 col-md-8 col-sm-8 ">
                        <div class="dividerHeading ">
                            <h4><span>News</span></h4>
                        </div>
                        <!-- master.blade_back1-berita.php -->
                        <div class="row ">
                          <?php foreach($fberitas as $fberita): ?>
                            <div class="col-lg-6  rec_blog">
                                <div class="blogPic">
                                    <img alt="" src="<?php echo e(asset("assets/images/berita/$fberita->img")); ?>" onerror="this.src='<?php echo e(asset ("assets/images/error/900x500.png")); ?>'">
                                    <div class="blog-hover">
                                        <a href="<?php echo e(URL ('berita', $fberita->slug)); ?>">
                                            <span class="icon">
                                                <i class="fa fa-link"></i>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                                <div class="blogDetail">
                                    <div class="blogTitle">
                                        <a href="<?php echo e(URL ('berita', $fberita->slug)); ?>">
                                            <h2><?php echo e($fberita->title); ?></h2>
                                        </a>
                                        <span>
                                            <i class="fa fa-calendar"></i>
                                            <?php echo e(date('d F Y' , strtotime($fberita->created_at) )); ?>

                                        </span>
                                    </div>
                                    <div class="blogContent">
                                        <p>
                                          <?php echo substr($fberita->subject,0,100).".."; ?>

                                        </p>
                                    </div>
                                    <div class="blogMeta">
                                        <a href="#">
                                            <i class="fa fa-user"></i>
                                            Administrator
                                        </a>
                                        <!-- <a href="#">
                                            <i class="fa fa-comment"></i>
                                            1980
                                        </a> -->
                                    </div>
                                </div>
                            </div>
                          <?php endforeach; ?>
                        </div>

                    </div>

                    <!-- TESTIMONIALS -->
                    <div class="col-lg-4 col-md-4 col-sm-4 ">
                        <div class="dividerHeading ">
                            <h4><span>Testimonials</span></h4>
                        </div>
                        <div id="testimonial-carousel" class="testimonial carousel slide">
                            <div class="carousel-inner">

                              <?php foreach($dtestimos as $dtestimo): ?>
                                <div class="active item">
                                    <div class="testimonial-item">
                                        <div class="icon"><i class="fa fa-quote-right"></i></div>
                                        <blockquote>
                                            <p><?php echo $dtestimo->isi; ?> </p>
                                        </blockquote>
                                        <div class="icon-tr"></div>
                                        <div class="testimonial-review">
                                            <img src="<?php echo e(asset ("assets/images/user.jpg")); ?>" alt="testimoni">
                                            <h1><?php echo e($dtestimo->nama); ?>,
                                            <small><?php echo e($dtestimo->negara); ?></small>
                                            </h1>
                                        </div>
                                    </div>
                                </div>
                              <?php endforeach; ?>

                              <?php foreach($dtestimos1 as $dtestimo1): ?>
                              <div class="item">
                                <div class="testimonial-item">
                                    <div class="icon"><i class="fa fa-quote-right"></i></div>
                                    <blockquote>
                                        <p><?php echo $dtestimo1->isi; ?> </p>
                                    </blockquote>
                                    <div class="icon-tr"></div>
                                    <div class="testimonial-review">
                                        <img src="<?php echo e(asset ("assets/images/user.jpg")); ?>" alt="testimoni">
                                        <h1><?php echo e($dtestimo1->nama); ?>,
                                        <small><?php echo e($dtestimo1->negara); ?></small>
                                        </h1>
                                    </div>
                                </div>
                              </div>
                              <?php endforeach; ?>

                            </div>
                            <div class="testimonial-buttons"><a href="#testimonial-carousel" data-slide="prev"><i class="fa fa-chevron-left"></i></a>&#32;
                                <a href="#testimonial-carousel" data-slide="next"><i class="fa fa-chevron-right"></i></a></div>
                        </div>
                    </div><!-- TESTIMONIALS END -->
                </div>
            </div>
        </section> */ ?>

        <section class="clients">
            <div class="container">
                <div class="row sub_content">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="dividerHeading ">
                            <h4><span>Partner</span></h4>
                        </div>

                        <div class="our_clients ">
                            <ul class="client_items clearfix">
                                <li class="col-sm-3 col-md-3 col-lg-3"><a href="http://disbudpar.banglikab.go.id" target="_blank" data-placement="bottom" data-toggle="tooltip" title="Disbudpar Bangli"><img src="<?php echo e(asset ("assets/images/clients/logo bangli.png")); ?>" alt="" /></a></li>
                                <li class="col-sm-3 col-md-3 col-lg-3"><a href="http://undiksha.ac.id" target="_blank" data-placement="bottom" data-toggle="tooltip" title="Universitas Pendidikan Ganesha" ><img src="<?php echo e(asset ("assets/images/clients/undiksha.png")); ?>" alt="" /></a></li>
                                <li class="col-sm-3 col-md-3 col-lg-3"><a href="http://pti.undiksha.ac.id" target="_blank" data-placement="bottom" data-toggle="tooltip" title="Pendidikan Teknik Informatika" ><img src="<?php echo e(asset ("assets/images/clients/pti.png")); ?>" alt="" /></a></li>
                                <li class="col-sm-3 col-md-3 col-lg-3"><a href="http://pti.undiksha.ac.id" target="_blank" data-placement="bottom" data-toggle="tooltip" title="Laboratory of Cultural Informatics" ><img src="<?php echo e(asset ("assets/images/clients/pti_lci.png")); ?>" alt="" /></a></li>
                            </ul><!--/ .client_items-->
                        </div>
                    </div>
                </div>
            </div>
        </section>



    </section>
	<!--end wrapper-->

	<!--start footer-->
  <?php echo $__env->make('layout.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<!--end footer-->
