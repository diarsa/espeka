@extends('admin.layout.dash')

@section('title', 'Administrator Dashboard')

@section('header')
  @parent

  <!--Morris Chart CSS -->
  {{-- <link rel="stylesheet" href="{{asset('assets/admin/js/morris-chart/morris.css')}}"> --}}

<div class="col-sm-6">
  <aside class="profile-nav alt">
      <section class="panel">
        <div class="user-heading alt gray-bg">
        <a href="{{URL::to('admin/users', Auth::user()->id ) }}"><img alt="" src="{{asset('assets/images/users/userflat.png')}}"></a>
          <h1>{{ Auth::user()->name }}</h1>
          <p>{{ Auth::user()->lastname }}</p>
        </div>

        {{-- <ul class="nav nav-pills nav-stacked">
          <li><a href="javascript:;"> <i class="fa fa-bell-o"></i>
            Pemberitahuan
          <span class="badge label-success pull-right r-activity">
            10
          </span></a></li>
        </ul> --}}
        <ul class="nav nav-pills nav-stacked">
          <li><a href="{{URL('admin/users')}}"> <i class="fa fa-users"></i>
            Pengguna
          <span class="badge label-success pull-right r-activity">
            {{ Auth::user()->count() }}
          </span></a></li>
        </ul>

        <ul class="nav nav-pills nav-stacked">
          <li><a href="{{URL('admin/wisatawans/lokal')}}"> <i class="fa fa-users"></i>
            Wisatawan Lokal
          <span class="badge label-warning pull-right r-activity">
            {{ $totlokal }}
          </span></a></li>
        </ul>

        <ul class="nav nav-pills nav-stacked">
          <li><a href="{{URL('admin/wisatawan')}}"> <i class="fa fa-users"></i>
            Wisatawan Mancanegara
          <span class="badge label-info pull-right r-activity">
            {{ $totmanca }}
          </span></a></li>
        </ul>

        {{-- <ul class="nav nav-pills nav-stacked">
          <li><a href="{{URL('admin/testi')}}"> <i class="fa fa-quote-left"></i>
            Testimoni
          <span class="badge label-success pull-right r-activity">
            {{ $testimo }}
          </span></a></li>
        </ul> --}}

      </section>
  </aside>

  <div class="alert alert-info fade in">
    <i class="fa fa-info-circle "></i> 
    <strong>
    Selamat datang di Halaman Administrator
    </strong>
    <br>
    Halaman untuk melakukan manajemen data seperti menambah, mencari, mengubah, mencetak, dan menghapus data. 
  </div>

  {{-- <div class="jumbotron">

  <h4> Selamat datang di Halaman Administrator </h4>
  <h4>
    Ini adalah halaman Administrator untuk melakukan manajemen data seperti memasukkan, mencari, mengubah, mencetak, dan menghapus data. <br> 

  </h4>

  <p>
    <a href="#" class="btn btn-primary btn-lg" role="button"> Tutorial » </a>
  </p>

  </div> --}}







{{--
  <div class="col-sm-6">
    @foreach($sliders as $slider)

      <div class="cycle-slideshow">
        <span class="cycle-prev">&#9001;</span> <!-- Untuk membuat tanda panah di kiri slider -->
        <span class="cycle-next">&#9002;</span> <!-- Untuk membuat tanda panah di kanan slider -->
        <span class="cycle-pager"></span>  <!-- Untuk membuat tanda bulat atau link pada slider -->
        <img src="{{ asset ("assets/images/img_slider/$slider->img_slider") }}" alt="{{{ $slider->nama_objek }}}">

      </div>

    @endforeach

  </div>
--}}

</div>




{{--
<div class="col-md-6">

  <section class="panel">
    <div class="panel-body">
        <div class="top-stats-panel">
            <h4 class="widget-h">Daily Sales</h4>
            <div class="bar-stats">
                <ul class="progress-stat-bar clearfix">
                    <li data-percent="50%"><span class="progress-stat-percent pink"></span></li>
                    <li data-percent="90%"><span class="progress-stat-percent"></span></li>
                    <li data-percent="70%"><span class="progress-stat-percent yellow-b"></span></li>
                </ul>
                <ul class="bar-legend">
                    <li><span class="bar-legend-pointer pink"></span> New York</li>
                    <li><span class="bar-legend-pointer green"></span> Los Angels</li>
                    <li><span class="bar-legend-pointer yellow-b"></span> Dallas</li>
                </ul>
                <div class="daily-sales-info">
                    <span class="sales-count">1200 </span> <span class="sales-label">Products Sold</span>
                </div>
            </div>
        </div>
    </div>
  </section>
</div> --}}


<div class="col-md-6 panel">

  <canvas id="chartPenulis" width="400" height="400"></canvas>

{{-- <form class="form-horizontal" id="signupForm" role="form" action="admin" method="post">
  <select class="" name="piltahun" id="piltahun">
    <option value="2016" name="tahun">2016</option>
    <option value="2017" name="tahun">2017</option>
  </select>

  <select class="" name="pilbulan" id="pilbulan">
    <option value="01" name="bulan">Januari</option>
    <option value="02" name="bulan">Februari</option>
  </select>

  <button class="btn btn-primary">Proses</button>
</form> --}}

</div>

<!--UNTUK CHARTs-->
<script src="{{url('/js/Chart.min.js')}}"></script>
<script>
var data = {
  labels: {!! json_encode($objekcs) !!},
  datasets: [{
    label: 'Jumlah Kunjungan',
    data: {!! json_encode($hits) !!},
    backgroundColor: "rgba(151,187,205,0.5)",
    borderColor: "rgba(151,187,205,0.8)",
  }]
};

var options = {
  scales: {
    yAxes: [{
      ticks: {
        beginAtZero:true
      }
    }]
  }
};

var ctx = document.getElementById("chartPenulis");
var chartPenulis = new Chart(ctx, {
  type: 'bar',
  data: data,
  options: options
});

</script>


@endsection

@section('footer')
@endsection






<!--Morris Charts-->
{{-- <script src="{{asset ('assets/admin/js/morris-chart/morris.js')}}"></script>
<script src="{{asset ('assets/admin/js/morris-chart/raphael-min.js')}}"></script> --}}
