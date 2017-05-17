{{--
  Untuk tampilan:
    - create wisatawan
--}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="ThemeBucket">

    <title>@yield('title') - Dinas Kebudayaan dan Pariwisata Kabupaten Bangli </title>
    <link rel="shortcut icon" href="{{ asset ("assets/admin/images/favicon.ico")}}">

    <!--Core CSS -->
    <link href="{{ asset ('assets/admin/bs3/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset ('assets/admin/css/bootstrap-reset.css') }}" rel="stylesheet">
    <link href="{{ asset ('assets/admin/font-awesome/css/font-awesome.css') }}" rel="stylesheet" />

    <!--UNTUK SWITCH-->
    <link rel="stylesheet" href="{{ asset ('assets/admin/css/bootstrap-switch.css') }}" />

    <!--UNTUK MULTIPLE SELECT-->
    <link rel="stylesheet" type="text/css" href="{{ asset ('assets/admin/js/jquery-multi-select/css/multi-select.css') }}" />

    <!--UNTUK Tags Input-->
    <link rel="stylesheet" type="text/css" href="{{ asset ('assets/admin/js/jquery-tags-input/jquery.tagsinput.css') }}" />

    <!-- UNTUK SELECT2 Component -->
    <link rel="stylesheet" type="text/css" href="{{ asset ('assets/admin/js/select2/select2.css') }}" />


    <!-- Custom styles for this template -->
    <link href="{{ asset ('assets/admin/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset ('assets/admin/css/style-responsive.css') }}" rel="stylesheet" />

    <!--dynamic table-->
    <link href="{{ asset("assets/admin/js/advanced-datatable/css/demo_page.css") }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset("assets/admin/js/advanced-datatable/css/demo_table.css") }}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="{{ asset("assets/admin/js/data-tables/DT_bootstrap.css") }}" type="text/css"/>

@include('admin.layout.totop')


</head>

<body>
  @section('header')

{{-- Manggil Button Back To TOP --}}
{{-- <a href="javascript:void(0);" id="scroll" title="Scroll to Top" style="display: none;">Top<span></span></a> --}}
{{-- Manggil Button Back To TOP --}}


<section id="container" >
<!--header start-->

<!--header end-->

@include('admin.layout.menu')


    <!--main content start-->
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
        <!-- page start-->

        <section class="panel">

        <header class="panel-heading">
          @yield('title')
          <span class="tools pull-right">
            <a href="javascript:;" class="fa fa-chevron-down"></a>
          </span>
        </header>
          <div class="panel-body" style="">
            <section id="flip-scroll">
              @show
              @yield('conten')
            </section>
          </div>
        </section>

        </section>
        <!-- page end-->
        </section>

    <!--main content end-->

<!--right sidebar end-->
@include('admin.layout.rightside')



</section>

<!-- Placed js at the end of the document so the pages load faster -->

<script type="text/javascript">
  $(window).scrollPress();
</script>

<link href="{{ asset ('src/scrollPress.css') }}" rel="stylesheet">
<script src="//code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="{{ asset ('src/scrollPress.js') }}"></script>


<!--Core js-->
<script src="{{ asset ('assets/admin/js/jquery.js') }}"></script>
<script src="{{ asset ('assets/admin/js/jquery-1.8.3.min.js') }}"></script>
<script src="{{ asset ('assets/admin/bs3/js/bootstrap.min.js') }}"></script>
<script src="{{ asset ('assets/admin/js/jquery-ui-1.9.2.custom.min.js') }}"></script>
<script class="include" type="text/javascript" src="{{ asset ('assets/admin/js/jquery.dcjqaccordion.2.7.js') }}"></script>
<script src="{{ asset ('assets/admin/js/jquery.scrollTo.min.js') }}"></script>
<script src="{{ asset ('assets/admin/js/easypiechart/jquery.easypiechart.js') }}"></script>
<script src="{{ asset ('assets/admin/js/jQuery-slimScroll-1.3.0/jquery.slimscroll.js') }}"></script>
<script src="{{ asset ('assets/admin/js/jquery.nicescroll.js') }}"></script>
<script src="{{ asset ('assets/admin/js/jquery.nicescroll.js') }}"></script>

<script src="{{ asset ('assets/admin/js/bootstrap-switch.js') }}"></script>

<!--Untuk JQuery Multi Select-->
<script type="text/javascript" src="{{ asset ('assets/admin/js/bootstrap-wysihtml5/bootstrap-wysihtml5.js') }}"></script>
<script type="text/javascript" src="{{ asset ('assets/admin/js/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js') }}"></script>
<script type="text/javascript" src="{{ asset ('assets/admin/js/bootstrap-colorpicker/js/bootstrap-colorpicker.js') }}"></script>
<script type="text/javascript" src="{{ asset ('assets/admin/js/bootstrap-timepicker/js/bootstrap-timepicker.js') }}"></script>
<script type="text/javascript" src="{{ asset ('assets/admin/js/jquery-multi-select/js/jquery.multi-select.js') }}"></script>
<script type="text/javascript" src="{{ asset ('assets/admin/js/jquery-multi-select/js/jquery.quicksearch.js') }}"></script>
<script src="{{ asset ('assets/admin/js/jquery-tags-input/jquery.tagsinput.js') }}"></script>
<script src="{{ asset ('assets/admin/js/select2/select2.js') }}"></script>
<script src="{{ asset ('assets/admin/js/select-init.js') }}"></script>


<!--common script init for all pages-->
<script src="{{ asset ('assets/admin/js/scripts.js') }}"></script>

<script src="{{ asset ('assets/admin/js/toggle-init.js') }}"></script>

<script src="{{ asset ('assets/admin/js/advanced-form.js') }}"></script>

{{--this page script validasi dari bucket admin--}}
  <script type="text/javascript" src="{{ asset("assets/admin/js/jquery.validate.min.js") }}"></script>
  <script src="{{ asset("assets/admin/js/validation-init.js") }}"></script>
{{--this page script validasi dari bucket admin--}}


</body>
</html>
