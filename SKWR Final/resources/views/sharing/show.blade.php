@extends('app')
<!-- extends('app') -->

@section('plugins_css')
<link rel="stylesheet" href="{{ asset('themes/plugins/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="box box-solid">
            <div class="box-header with-border">
                <h4 class="box-title">List: User</h4>
                @if(Entrust::can('user_create'))
                <div class="box-tools pull-right">
                    <a class="btn btn-primary" href="{{ url('sharing/create') }}"><i class="fa fa-plus"></i> New</a>
                </div>
                @endif
            </div>
            <div class="box-body">
                <table id="entah" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Deskripsi</th>
                            <th>Post at</th>
                            <th>Download</th>
                            @if(Entrust::can('sharing_update'))
                            <th>Action</th>
                            @endif
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
  // console.log($(this).attr('data-url'));
  // populate table with ajax
  $('#entah').DataTable({
    "processing"      : true,
    "serverSide"      : true,
    "ajax"            : '{{ url('sharing/ldata') }}',
    fnCreatedRow: function (row, data, index) {
			$('td', row).eq(0).html(index + 1);
			},
    columns         : [
        { data: 'No', name: "No" },
        { data: 'judul', name: "judul" },
        { data: 'deskripsi' },
        { data: 'updated_at', name: "updated_at" },
        { data: 'Search', name: "Search" },
        @if(Entrust::can('sharing_update'))
        { data: 'action', name: 'action', orderable: false, searchable: false }
        @endif
    ]
});
    // console.log('{{csrf_token()}}')

    // event
    $('body').on('click', '.row-delete', function() {
        if(confirm('Attempting to delete data, are you sure?')) {
            location.href = $(this).attr('data-url');
            // console.log($(this).attr('data-url'));
        }
    });
});
</script>
@endsection
