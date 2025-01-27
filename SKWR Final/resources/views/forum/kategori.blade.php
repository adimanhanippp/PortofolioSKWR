@extends('app')
@section('content')

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
                  <div class="form-group">
                      <label class="col-sm-2 control-label">Kategori <span class="text-danger">*</span></label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control input-sm required" id="kategori" name="kategori" placeholder="Kategori">
                        <input type="hidden" name="id" id="id">
                      </div>
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
</script>
@endsection
