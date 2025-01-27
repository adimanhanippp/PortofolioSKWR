@extends('app')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="box box-solid">
            <div class="box-header with-border">
                <h4>Create New Subject</h4>
            </div>
            <div class="box-body">
              <form action="{{ url('forum/addisi') }}" id="tidaktaw" class="form-horizontal" enctype="multipart/form-data">
                  {{ csrf_field() }}
              <div class="box-body">
                  <div class="form-group">
                      <label class="col-sm-2 control-label">Kategori <span class="text-danger">*</span></label>
                      <div class="col-sm-10">
                          <input type="text" class="form-control input-sm required" id="kategori" name="kategori" value="" readonly="readonly">
                          <input type="hidden" class="form-control input-sm required" id="id" name="id" value="">
                          <input type="hidden" class="form-control input-sm required" id="id_kategori" name="id_kategori" value="">
                          <input type="hidden" class="form-control input-sm required" id="id_acc" name="id_acc" value="{{ Auth::user()->id }}">
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="col-sm-2 control-label">Judul <span class="text-danger">*</span></label>
                      <div class="col-sm-10">
                          <input type="text" class="form-control input-sm required" id="judul" name="judul" placeholder="Judul">
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="col-sm-2 control-label">Isi <span class="text-danger">*</span></label>
                      <div class="col-sm-10">
                        <textarea rows="10" class="form-control input-sm required" id="isi" name="isi" placeholder="Isi Berita"></textarea>
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
  @if(isset($item))
  $('#id_kategori').val('{{$item[0]->id}}');
  $('#kategori').val('{{$item[0]->kategori}}');
  @endif

  @if(isset($data))
  $('#id').val('{{$data->id}}');
  $('#id_kategori').val('{{$data->id_kategori}}');
  $('#kategori').val('{{$kate->kategori}}');
  $('#judul').val('{{$data->judul}}');
  $('#isi').val('{{$data->isi}}');
  @endif
</script>
@endsection
