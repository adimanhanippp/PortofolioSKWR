@extends('app')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="box box-solid">
            <div class="box-header with-border">
                <h4>Input Nomor Anggota</h4>
            </div>
            <div class="box-body">
              <form action="{{ url('approve/saveupdate')}}" id="tidaktaw" class="form-horizontal" >
              {{ csrf_field() }}
              <div class="box-body">
                  <div class="form-group">
                      <label class="col-sm-2 control-label">NIP<span class="text-danger">*</span></label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control input-sm required" id="nip" name="nip" value="" readonly="readonly">
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="col-sm-2 control-label">Nama Lengkap<span class="text-danger">*</span></label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control input-sm required" id="namalengkap" name="namalengkap" value="" readonly="readonly">
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="col-sm-2 control-label">Nomor Anggota <span class="text-danger">*</span></label>
                      <div class="col-sm-10">
                          <input type="text" class="form-control input-sm required" id="noanggota" name="noanggota" placeholder="Nomor Anggota">
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
  $('#nip').val('{{ $data->nip }}');
  $('#namalengkap').val('{{ $data->namalengkap }}');
  $('#noanggota').val('{{ $data->noanggota }}');
  $('#id').val('{{ $data->id }}');
  @endif
});
</script>
@endsection
