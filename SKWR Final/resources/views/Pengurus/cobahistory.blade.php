@extends('app')

@section('plugins_css')
<link rel="stylesheet" href="{{ asset('themes/plugins/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.1.0/css/responsive.bootstrap.min.css" />
@endsection
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="box box-solid">
            <div class="box-header with-border">
                <h4>History Kepengurusan</h4>
            </div>
            <div class="box-body">
              <div class="container">
              <div class="col-md-2">
                <label class="control-label">Periode</label> <br>
                <select id="periodeawal">
                  <option value="" disabled selected>Pilih Periode</option>
                  @foreach($penguruss->all() as $pengurus)
                  <option value="{{$pengurus->tgldiangkat}}">{{$pengurus->tgldiangkat}}</option>
                  @endforeach
                </select>
              </div>
              </div>
              <br>
              <p id="entah"></p>
                <table id="datatables" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <!-- <th>No</th> -->
                      <th>Nama</th>
                      <th>Jabatan</th>
                      <th>Tanggal Pengangkatan</th>
                    </tr>
                  </thead>
                  <tbody>
@foreach($peng->all() as $peng)
<tr>
  <td>{{$peng->name}}</td>
  <td>{{$peng->jabatan}}</td>
  <td>{{$peng->tgldiangat}}</td>
</tr>
@endforeach
                  </tbody>
                </table>
              </div>
          </div>
    </div>
</div>

@endsection


@section('plugins_js')
<script type="text/javascript" src="{{ asset('themes/plugins/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('themes/plugins/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<!-- <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.1.0/js/dataTables.responsive.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.1.0/js/responsive.bootstrap.min.js"></script> -->
@endsection

@section('contentjs')
<script type="text/javascript">

$('#periodeawal').change(function(){
  var fa = $(this).val();

  var table = $('#datatables').dataTable({
    "processing": true,
    "serverSide": true,
    "retrieve"  : true,
    "paging"    : false,
    "ajax": {
      "url": "{{url('Pengurus/gdata')}}",
      "data": {
          "tgl": fa
      }
    },
    // fnCreatedRow: function (row, data, index) {
    //   $('td', row).eq(0).html(index + 1);
    //   },
    "columns"         : [
        // { data: 'No'},
        { data: 'name'},
        { data: 'jabatan' },
        { data: 'tgldiangkat'}
    ]
  } );
    $('#datatables').DataTable().destroy();
  // $('#datatables').DataTable().ajax.reload();
});

</script>
@endsection
