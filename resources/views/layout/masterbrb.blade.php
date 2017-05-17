<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie ie8" class="no-js" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html class="no-js" lang="en"> <!--<![endif]-->

<body class="home">

{{-- Gooele Analytic --}}
@include('layout.analytics')
{{-- Gooele Analytic --}}

<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title>@yield('title') :: Department of Culture and Tourism Bangli Regency</title>
		<link rel="shortcut icon" href="{{ asset ("assets/images/favicon.ico")}}">
	<meta name="description" content="">

    <!-- CSS FILES -->
    <link rel="stylesheet" href="{{ asset ("assets/css/bootstrap.min.css") }}"/>
    <link rel="stylesheet" href="{{ asset ("assets/css/style.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset ("assets/css/style.css") }}" media="screen" data-name="skins">
    <link rel="stylesheet" href="{{ asset ("assets/css/layout/wide.css") }}" data-name="layout">

    <link rel="stylesheet" href="{{ asset ("assets/css/fractionslider.css") }}"/>
    <link rel="stylesheet" href="{{ asset ("assets/css/style-fraction.css") }}"/>
    <link rel="stylesheet" href="{{ asset ("assets/css/animate.css") }}"/>

    <link rel="stylesheet" type="text/css" href="{{ asset ("assets/css/switcher.css") }}" media="screen" />


	<!--TAMBAHAN-->
		<link rel="stylesheet" type="text/css" href="{{ asset("assets/js/select2/select2.css") }}" />

		<link rel="stylesheet" href="{{ asset("assets/css/jquery.steps.css?1") }}">
	<!--TAMBAHAN-->


</head>

    <!--End Header-->

	<!--start wrapper-->
    <section class="wrapper">

				<div class="">
					<br>
				</div>

				{{--	<div class="container wow fadeInUp"> --}}
					<div class="container ">
						@show
						@yield('content')
					</div>

    </section>
		<br><br>
	<!--end wrapper-->

