@extends('app')

@section('plugins_css')
<link rel="stylesheet" href="{{ asset('themes/plugins/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="box box-solid">
            <div class="box-header with-border">
                <h4>Polling</h4>
                @if(Entrust::can('user_create'))
                <div class="box-tools pull-right">
                    <a class="btn btn-primary" href="{{ url('polling/create') }}"><i class="fa fa-plus"></i> New</a>
                </div>
                @endif
            </div>
            <div class="box-body">
                <table id="datatable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th style="width:40px">No&nbsp;</th>
                            <th>Question</th>
                            <th style="width:200px">Active</th>
                            <th style="width:60px">Action&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
                <!-- <a href="{{url('polling/user')}}"><button type="button" name="button" >Login</button></a> -->
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
$(function(){
  $('#datatable').DataTable({
    processing      : true,
    serverSide      : true,
    ajax            : '{{ url('polling/gdata') }}',
    // url pada ajax ditambah variable tmp
    fnCreatedRow: function (row, data, index) {
      $('td', row).eq(0).html(index + 1);
      },
    columns         : [
        { data: 'No'},
        { data: 'question'},
        { data: 'active' },
        { data: 'action', name: 'action', orderable: false, searchable: false }
    ]
  });

});
</script>
@endsection
