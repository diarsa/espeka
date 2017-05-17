<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login :: Decission Support System</title>
      <link rel="shortcut icon" href="{{ asset ("assets/admin/images/favicon.ico")}}">

    <!--Core CSS -->
    <link href="{{ asset("assets/admin/bs3/css/bootstrap.min.css")}}" rel="stylesheet">
    <link href="{{ asset("assets/admin/css/bootstrap-reset.css")}}" rel="stylesheet">
    <link href="{{ asset("assets/admin/font-awesome/css/font-awesome.css")}}" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="{{ asset("assets/admin/css/style.css")}}" rel="stylesheet">
    <link href="{{ asset("assets/admin/css/style-responsive.css")}}" rel="stylesheet" />
    <style>
        body {
            {{-- font-family: 'Lato'; --}}
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>
<body id="app-layout">
{{--
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                <!--
                <img src="{{ asset("assets/images/logo-disbudpar.png") }}">
                -->
                Sistem Pendukung Keputusan
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->

                <!--
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/home') }}">Home</a></li>
                </ul>
                -->

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())

                        <li><a href="{{ url('/login') }}">Masuk</a></li>

                        <li><a href="{{ url('/register') }}">Daftar</a></li>

                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Keluar</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
--}}

    <br>
    <div class="" align="center">
    <a href="{{URL('dashboard')}}">
      <img src="{{ asset("assets/admin/images/logo-disbudpar1.png") }}"> <br><br>
    </a>
    </div>
    <br>
    <div class="col-md-12">
        @yield('content')
    </div>
    


    <!-- Placed js at the end of the document so the pages load faster -->

    <!--Core js-->
    <script src="{{ asset("assets/admin/js/jquery.js")}}"></script>
    <script src="{{ asset("assets/admin/bs3/js/bootstrap.min.js")}}"></script>
</body>
</html>
