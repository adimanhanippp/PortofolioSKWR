@extends('app')

@section('plugins_css')
<link rel="stylesheet" href="{{ asset('themes/plugins/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="box box-solid">
            <div class="box-header with-border">
                <h4 class="box-title" > Pengurus</h4>
                @if(Entrust::can('pengurus_create'))
                <div class="box-tools pull-right">
                    <a class="btn btn-primary" href="{{ url('Pengurus/create') }}"><i class="fa fa-plus"></i> New</a>
                </div>
                @endif
            </div>
            <div class="box-body">
              <br>
                <table id="datatables" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Jabatan</th>
                      <th>Nama</th>
                      <th>Profil</th>
                      <th>Periode</th>
                      <th>Tanggal Pengangkatan</th>
                      <!-- <th>Tanggal Diberhentikan</th> -->
                      <th>Foto</th>
                      <!-- <th>Action</th> -->
                    </tr>
                  </thead>
                  <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection

@section('plugins_js')
<script type="text/javascript" src="{{ asset('themes/plugins/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('themes/plugins/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
@endsection

@section('contentjs')
<script type="text/javascript">

$(function() {
    // init plugins
    $('#datatables').DataTable({
        processing      : true,
        serverSide      : true,
        ajax            : '{{url('Pengurus/dat')}}',
        fnCreatedRow: function (row, data, index) {
    			$('td', row).eq(0).html(index + 1);
    			},
        columns         : [
            { data: 'No'},
            { data: 'jabatan'},
            { data: 'nama'},
            { data: 'profil'},
            { data: 'periode'},
            { data: 'tgldiangkat'},
            // { data: 'tglberhenti'},
            // { data: 'gambar'},
            { data: 'gambar', function(gambar){
              return '<img src="'+gambar+'"/>';
            } }
            // { data: 'action', name: 'action', orderable: false, searchable: false }
        ]
      });
      $('body').on('click', '.row-delete', function() {
          if(confirm('Attempting to delete data, are you sure?')) {
              location.href = $(this).attr('data-url');

          }
      });
    });

</script>
@endsection
