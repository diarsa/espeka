<header class="header fixed-top clearfix">
<!--logo start-->
<div class="brand">
    <a href="<?php echo e(URL::to('admin/dashboard')); ?>" class="logo">
        <img src="<?php echo e(asset("assets/admin/images/logo-disbudpar1.png")); ?>" >
    </a>
    <div class="sidebar-toggle-box">
        <div class="fa fa-bars"></div>
    </div>
</div>
<!--logo end-->

<div class="nav notify-row" id="top_menu">
    <!--  notification start -->
    <ul class="nav top-menu">
        <!-- settings start -->

        <!-- settings end -->
        <!-- inbox dropdown start-->

        <!-- inbox dropdown end -->
        <!-- notification dropdown start-->

        <!-- notification dropdown end -->

        <li>
            <div class="">
                <h5><b>Halaman Administrator</b></h5>
            </div>
        </li>

    </ul>
    <!--  notification end -->
</div>
<div class="top-nav clearfix">
    <!--search & user info start-->
    <ul class="nav pull-right top-menu">
        <li>
            <?php /* <input type="text" class="form-control search" placeholder=" Search"> */ ?>
        </li>
        <!-- user login dropdown start-->
        <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <img alt="" src="<?php echo e(asset("assets/images/users/userflat.png")); ?>">

                <span class="username"><?php echo e(Auth::user()->name); ?> </span>

                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu extended logout">
                <li><a href="<?php echo e(URL::to('admin/users', Auth::user()->id )); ?>"><i class=" fa fa-suitcase"></i>Profile</a></li>

                <li><a href="<?php echo e(url('/admin/settings')); ?>"><i class="fa fa-cog"></i> Pengaturan</a></li>

                <li><a href="<?php echo e(url('/logout')); ?>"><i class="fa fa-key"></i> Keluar</a></li>
            </ul>
        </li>
        <!-- user login dropdown end -->
        <li>
            <div class="toggle-right-box">
                <div class="fa fa-bars"></div>
            </div>
        </li>
    </ul>
    <!--search & user info end-->
</div>
</header>

<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->            <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
            <li>
                <a href="<?php echo e(URL::to('admin/dashboard')); ?>" class="<?php echo e(Request::is('admin','admin/dashboard') ? 'active' : ''); ?>">
                    <i class="fa fa-dashboard"></i>
                    <span>Beranda</span>
                </a>
            </li>
            <li class="sub-menu">
                <a href="javascript:;" class="<?php echo e(Request::is('admin/objek','admin/objek/create') ? 'active' : ''); ?>">
                    <i class="fa fa-globe"></i>
                    <span>Objek Wisata</span>
                </a>
                <ul class="sub">
                    <li class="<?php echo e(Request::is('admin/objek') ? 'active' : ''); ?>"><a href="<?php echo e(URL::to('admin/objek')); ?>">Lihat Objek Wisata</a></li>
                    <li class="<?php echo e(Request::is('admin/objek/create') ? 'active' : ''); ?>"><a href="<?php echo e(URL::to('admin/objek/create')); ?>">Buat Objek Wisata</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a href="javascript:;" class="<?php echo e(Request::is('admin/wisatawan','admin/wisatawans/lokal','admin/wisatawan/create','admin/wisatawans/export') ? 'active' : ''); ?>">
                    <i class="fa fa-users"></i>
                    <span>Wisatawan</span>
                </a>
                <ul class="sub">
                    <li class="<?php echo e(Request::is('admin/wisatawans/lokal') ? 'active' : ''); ?>"><a href="<?php echo e(URL::to('admin/wisatawans/lokal')); ?>">Wisatawan Lokal</a></li>
                    <li class="<?php echo e(Request::is('admin/wisatawan') ? 'active' : ''); ?>"><a href="<?php echo e(URL::to('admin/wisatawan')); ?>">Wisatawan Mancanegara</a></li>
                    <li class="<?php echo e(Request::is('admin/wisatawan/create') ? 'active' : ''); ?>"><a href="<?php echo e(URL::to('admin/wisatawan/create')); ?>">Buat Wisatawan</a></li>
                    <li class="<?php echo e(Request::is('admin/wisatawans/export') ? 'active' : ''); ?>"><a href="<?php echo e(URL::to('admin/wisatawans/export')); ?>">Download Wisatawan</a></li>
                </ul>
            </li>
            <?php /* <li class="sub-menu">
                <a href="javascript:;" class="<?php echo e(Request::is('admin/testi') ? 'active' : ''); ?>">
                    <i class="fa fa-quote-left"></i>
                    <span>Testimoni</span>
                </a>
                <ul class="sub">
                    <li class="<?php echo e(Request::is('admin/testi') ? 'active' : ''); ?>"><a href="<?php echo e(URL::to('admin/testi')); ?>">Lihat Testimoni</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a href="javascript:;" class="<?php echo e(Request::is('admin/berita','admin/berita/create') ? 'active' : ''); ?>">
                    <i class="fa fa-tasks"></i>
                    <span>Berita</span>
                </a>
                <ul class="sub">
                    <li class="<?php echo e(Request::is('admin/berita') ? 'active' : ''); ?>"><a href="<?php echo e(URL::to('admin/berita')); ?>">Lihat Berita</a></li>
                    <li class="<?php echo e(Request::is('admin/berita/create') ? 'active' : ''); ?>"><a href="<?php echo e(URL::to('admin/berita/create')); ?>">Buat Berita</a></li>
                </ul>
            </li>   */ ?>          
            <li class="sub-menu">
                <a href="<?php echo e(URL::to('admin/users')); ?>" class="<?php echo e(Request::is('admin/users','admin/users/create') ? 'active' : ''); ?>">
                    <i class="fa fa-users"></i>
                    <span>Users</span>
                </a>
            </li>
            <li class="sub-menu">
                <a href="<?php echo e(URL::to('/admin/settings')); ?>" class="<?php echo e(Request::is('admin/settings') ? 'active' : ''); ?>">
                    <i class="fa fa-cogs"></i>
                    <span>Pengaturan</span>
                </a>
            </li>

            <?php /* <li>
                <a href="<?php echo e(URL::to('/petugas')); ?>" target="_blank">
                    <i class="fa fa-bullhorn"></i>
                    <span>Petugas</span>
                </a>
            </li> */ ?>

            <li>
                <a href="<?php echo e(URL::to('/')); ?>" target="_blank">
                    <i class="fa fa-bullhorn"></i>
                    <span>Front Web</span>
                </a>
            </li>

            <?php /* <li class="sub-menu">
                <a href="javascript:;">
                    <i class="fa fa-book"></i>
                    <span>UI Elements</span>
                </a>
                <ul class="sub">
                    <li><a href="general.html">General</a></li>
                    <li><a href="buttons.html">Buttons</a></li>
                </ul>
            </li> */ ?>

            <a href="#" class="scrollToTop">Scroll To Top</a>
            
        </ul></div>
<!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->

