<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie ie8" class="no-js" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html class="no-js" lang="en"> <!--<![endif]-->

<body class="home">

{{-- Gooele Analytic --}}
{{-- @include('layout.analytics') --}}
{{-- Gooele Analytic --}}

		@include('layout.header')
		@section('header')
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

@include('layout.footer')
