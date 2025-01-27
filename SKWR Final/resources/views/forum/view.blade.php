@extends('app')

@section('plugins_css')
<link rel="stylesheet" href="{{ asset('themes/plugins/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="box box-solid">
            <div class="box-header with-border">
                <h4>Forum</h4>
                @if(Entrust::can('forum_create'))
                <div class="box-tools pull-right">
                    <a class="btn btn-primary" href="{{ url('forum/create/'.$item) }}"><i class="fa fa-plus"></i> New</a>
                </div>
                @endif
            </div>
            <div class="box-body">
              <table id="entah" class="table table-bordered table-striped">
                  <thead>
                      <tr>
                          <th>No</th>
                          <th>Judul</th>
                          <th>Isi</th>
                          <th style="width:60px">Action&nbsp;</th>
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
  // populate table with ajax
  $('#entah').DataTable({
    processing      : true,
    serverSide      : true,
    ajax            : '{{ url('forum/dataforum/'.$item) }}',
    // url pada ajax ditambah variable tmp
    fnCreatedRow: function (row, data, index) {
			$('td', row).eq(0).html(index + 1);
			},
    columns         : [
        { data: 'No'},
        { data: 'judul'},
        { data: 'isi' },
        { data: 'action', name: 'action', orderable: false, searchable: false }
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
