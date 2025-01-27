@extends('app')
@section('content')

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.3.0/Chart.bundle.js"></script>

<div class="row">
    <div class="col-md-12">
        <div class="box box-solid">
            <div class="box-header with-border">
                <h4>Create New Subject</h4>
            </div>
            <div class="box-body">
              <form action="{{ url('forum/addkategori')}}" id="tidaktaw" class="form-horizontal" enctype="multipart/form-data">
                  {{ csrf_field() }}
              <div class="box-body">
                <div class="col-md-6">
                  <div class="form-group">
                      <label class="col-sm-2 control-label">Kategori <span class="text-danger">*</span></label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control input-sm required" id="kategori" name="kategori" placeholder="Kategori">
                        <input type="hidden" name="id" id="id">
                      </div>
                  </div>
                </div>
                <div class="col-md-6">

                </div>
                <div class="container">
                      <canvas id="myChart" width="100" height="100"></canvas>
                  </div>
              </div>
              <div class="box-footer">
                  <button type="submit" class="btn btn-primary pull-right" id="btn-submit">Submit</button>
              </div>

              </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('contentjs')
<script type="text/javascript">
$(function(){
  @if(isset($data))
  $('#kategori').val('{{ $data->kategori }}');
  $('#id').val('{{ $data->id }}')
  @endif
});

var ctx = document.getElementById("myChart");
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
                    datasets: [{
                            label: '# of Votes',
                            data: [12, 19, 3, 5, 2, 3],
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)'
                            ],
                            borderColor: [
                                'rgba(255,99,132,1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)'
                            ],
                            borderWidth: 1
                        }]
                },
                options: {
                    scales: {
                        yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                    }
                }
            });
</script>
@endsection
