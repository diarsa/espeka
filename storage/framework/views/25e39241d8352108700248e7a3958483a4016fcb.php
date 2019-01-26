<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie ie8" class="no-js" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html class="no-js" lang="en"> <!--<![endif]-->
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title><?php echo $__env->yieldContent('title'); ?> :: Department of Culture and Tourism Bangli Regency</title>
		<link rel="shortcut icon" href="<?php echo e(asset ("assets/images/favicon.ico")); ?>">
	<meta name="description" content="">

    <!-- CSS FILES -->
    <link rel="stylesheet" href="<?php echo e(asset ("assets/css/bootstrap.min.css")); ?>"/>
    <link rel="stylesheet" href="<?php echo e(asset ("assets/css/style.css")); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset ("assets/css/style.css")); ?>" media="screen" data-name="skins">
    <link rel="stylesheet" href="<?php echo e(asset ("assets/css/layout/wide.css")); ?>" data-name="layout">

    <link rel="stylesheet" href="<?php echo e(asset ("assets/css/fractionslider.css")); ?>"/>
    <link rel="stylesheet" href="<?php echo e(asset ("assets/css/style-fraction.css")); ?>"/>
    <link rel="stylesheet" href="<?php echo e(asset ("assets/css/animate.css")); ?>"/>

    <link rel="stylesheet" type="text/css" href="<?php echo e(asset ("assets/css/switcher.css")); ?>" media="screen" />
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->


	<!--TAMBAHAN-->
		<link rel="stylesheet" type="text/css" href="<?php echo e(asset("assets/js/select2/select2.css")); ?>" />

		<link rel="stylesheet" href="<?php echo e(asset("assets/css/jquery.steps.css?1")); ?>">
	<!--TAMBAHAN-->

    <?php /* UNTUK TOMBOL LIKE */ ?>
    <?php /* <link rel="stylesheet" href="<?php echo e(asset("assets/css/bootstrap-switch.css")); ?>" /> */ ?>


<?php /* RISUL LARAVEL LIKE COMMENT */ ?>
    <link href="//cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.2/components/icon.min.css" rel="stylesheet">
    <link href="//cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.2/components/comment.min.css" rel="stylesheet">
    <link href="//cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.2/components/form.min.css" rel="stylesheet">
    <link href="//cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.2/components/button.min.css" rel="stylesheet">
    <link href="<?php echo e(asset('/vendor/laravelLikeComment/css/style.css')); ?>" rel="stylesheet">
<?php /* RISUL LARAVEL LIKE COMMENT */ ?>

</head>


<header id="header">
    <div id="top-bar">
        <div class="container">
            <div class="row">
                <div class="col-sm-5 top-info hidden-xs">
                    <?php foreach($htentangs as $htentang): ?>
                        <span><i class="fa <?php echo e($htentang->fa); ?>"></i><?php echo e($htentang->nama); ?>: <?php echo $htentang->isi; ?> </span>
                    <?php endforeach; ?>
                 </div>
                <div class="col-sm-7 top-info">
					<ul>
					    <li><a href="http://facebook.com/pemkabbangli" target="_blank" class="my-facebook" title="Facebook"><i class="fa fa-facebook-official"></i></a></li>
                        <li><a href="http://twitter.com/pemkabbangli" target="_blank" class="my-tweet" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="http://youtube.com/channel/UCkT0GNviWfilgNvXiCIXF3g" target="_blank" class="my-google" title="Youtube"><i class="fa fa-youtube-play"></i></a></li>
						<li><a href="#language" class="my-rss" title="Language"><i class="fa fa-globe fa-lg"></i></a></li>
                    </ul>
					<ul>
					<?php if(Auth::guest()): ?>
						<li><a href="<?php echo e(url('register')); ?>" class="my-google" title="Register"><i class="fa fa-users"></i></a></li>
						<li><a href="<?php echo e(url('login')); ?>" class="my-google" title="Login"><i class="fa fa-sign-in fa-lg"></i></a></li>
					<?php else: ?>
						<li class="wow flip">
							Welcome,
							<b> <?php echo e(Auth::user()->name); ?> 
								<a href="<?php echo e(url('logout')); ?>" class="my-google" title="Logout"> <i class="fa fa-sign-out fa-lg"></i> </a>
							</b>
						</li>

					<?php endif; ?>
					</ul>
                </div>
            </div>
        </div>
    </div>
    <div id="logo-bar">
        <div class="container">
            <div class="row">
                <!-- Logo / Mobile Menu -->
                <div  class="col-md-3">
                    <div id="logo">
                       <h1>
						<a href="<?php echo e(url('dashboard')); ?>"><img alt="logo" src="<?php echo e(asset ("assets/images/logo-disbudpar1.png")); ?>"/></a>
                        <?php /* <a href="<?php echo e(url('dashboard')); ?>"><img alt="logo" src="<?php echo e(asset ("assets/images/logobanglii.png")); ?>"/></a> */ ?>
						</h1>
                    </div>
                </div>
                <!-- Navigation -->
                <div class="col-lg-9 col-sm-12 col-sm-12">
                    <div class="navbar navbar-default navbar-static-top" role="navigation">
                        <!--  <div class="container">-->
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="navbar-collapse collapse">

                            <ul class="nav navbar-nav">
                                <li class="<?php echo e(Request::is('/','dashboard') ? 'active' : ''); ?>"><a href="<?php echo e(url('dashboard')); ?>">Home</a></li>

								<li class="<?php echo e(Request::is('objek') ? 'active' : ''); ?>"><a href="<?php echo e(url('objek')); ?>">Attractions</a></li>

                                <li class="<?php echo e(Request::is('wisatawan/create') ? 'active' : ''); ?>"><a href="<?php echo e(url('wisatawan/create')); ?>">Tourist</a></li>

                                <?php /* <li class="<?php echo e(Request::is('berita','testi') ? 'active' : ''); ?>"><a href="<?php echo e(url('berita')); ?>">Extras</a>

                                    <ul class="dropdown-menu">
                                        
                                        <li class="<?php echo e(Request::is('testi') ? 'active' : ''); ?>"><a href="<?php echo e(url('testi')); ?>">Testimonial</a></li>

                                        <li class="<?php echo e(Request::is('berita') ? 'active' : ''); ?>"><a href="<?php echo e(url('berita')); ?>">News</a></li>
                                            
                                    </ul>

                                </li> */ ?>
							<?php /*
							<li><a href="<?php echo e(url('admin')); ?>" target="_blank">Admin</a>
							*/ ?>

							<!--UNTUK USER-->
							<?php if(Auth::guest()): ?>
								<li><a href="#">User</a>
									<ul class="dropdown-menu">
										<li>
											<a href="<?php echo e(url('login')); ?>">Login</a>
										</li>
										<li>
											<a href="<?php echo e(url('register')); ?>">Register</a>
										</li>
									</ul>
                                </li>
							<?php else: ?>
								<li><a href="#"><?php echo e(Auth::user()->name); ?></a>
								<ul class="dropdown-menu">
                                  <li>
									<a href="<?php echo e(url('profile')); ?>">Your Profile</a>
								  </li>
                                  <li>
                                    <a href="<?php echo e(url('logout')); ?>">Logout</a>
                                  </li>
								</ul>
                                </li>
							<?php endif; ?>
                            </ul>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
