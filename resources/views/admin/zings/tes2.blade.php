<div class="col-md-6">
<canvas id="chartPenulis" width="400" height="400"></canvas>
<br> {{json_encode($objekcs)}} <br>
<br> {{json_encode($hits)}}
</div>


<!--UNTUK CHARTs-->
<script src="{{url('/js/Chart.min.js')}}"></script>
<script>
var data = {
labels: {!! json_encode($objekcs) !!},
datasets: [{
  label: 'Jumlah buku',
  data: {!! json_encode($hits) !!},
  backgroundColor: "rgba(151,187,205,0.5)",
  borderColor: "rgba(151,187,205,0.8)",
}]
};

var options = {
scales: {
  yAxes: [{
    ticks: {
      beginAtZero:true,
      stepSize: 1
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
