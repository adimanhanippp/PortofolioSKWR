@extends('app')
@section('content')

<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.3.0/Chart.bundle.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.3.0/Chart.min.js"></script>


<div class="row">
    <div class="col-md-12">
        <div class="box box-solid">
            <div class="box-header with-border">
                <h4>Polling</h4>
            </div>
            <div class="box-header with-border">
              <h5>Hasil Polling Sementara dengan Pertanyaan :</h5>
              <h5>{{$pol->question}}</h5>
              </div>
            <div class="box-body">
                <div class="col-md-6" style="width:400px; height:400px;">
                  <script src="https://codepen.io/anon/pen/aWapBE.js"></script>
                  <canvas id="myChart" width="400" height="400"></canvas>
                </div>
              </div>
        </div>
    </div>
</div>

@endsection

@section('contentjs')
<script type="text/javascript">
 var entah = [];
function callback(resp){
  entah = resp;
  coba(entah);
}

$.ajax({
  type: "POST",
  url: '{{url('polling/admin')}}',
 data: "",
 cache: false, // To unable request pages to be cached
 processData: false,
 success: function(response) {
   callback(response);
 },
 headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
  }
  });

  function coba(entah){
    console.log(entah);
    var ctx = document.getElementById("myChart");
    var myData = entah['var'];
    var myChart = new Chart(ctx, {
      type: 'bar',
      responsive: true,
      maintainAspectRatio: false,
      options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                    }
                  }]
                }
              },
      data: {
        labels: entah['isi'],
        datasets: [{
          label: '# of Votes',
          data: myData,
          backgroundColor: palette('tol', myData.length).map(function(hex) {
            return '#' + hex;
          })
        }]
      }
    });
  }
</script>
@endsection
