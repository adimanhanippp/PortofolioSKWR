@extends('app')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="box box-solid">
            <div class="box-header with-border">
                <h4>Profil</h4>
            </div>
            <div class="box-body">
              <form action="{{ url('profil/edit') }}" id="tidaktaw" class="form-horizontal" enctype="multipart/form-data">
                  {{ csrf_field() }}
              <div class="box-body">
                  <div class="form-group">
                      <label class="col-sm-2 control-label">Username <span class="text-danger">*</span></label>
                      <div class="col-sm-10">
                          <input type="text" class="form-control input-sm required" id="username" name="username" value="" readonly="readonly">
                          <!-- <input type="hidden" class="form-control input-sm required" id="id" name="id" value="">
                          <input type="hidden" class="form-control input-sm required" id="id_kategori" name="id_kategori" value=""> -->
                          <input type="hidden" class="form-control input-sm required" id="id_acc" name="id_acc" value="{{ Auth::user()->id }}">
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="col-sm-2 control-label">Nama <span class="text-danger">*</span></label>
                      <div class="col-sm-10">
                          <input type="text" class="form-control input-sm required" id="nama" name="nama" placeholder="Nama" required>
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="col-sm-2 control-label">Email <span class="text-danger">*</span></label>
                      <div class="col-sm-10">
                          <input type="text" class="form-control input-sm required" id="email" name="email" placeholder="Email" required>
                      </div>
                  </div>
                  @if(Entrust::can('user_index'))
                  <div class="form-group">
                      <label class="col-sm-2 control-label">No Hp <span class="text-danger">*</span></label>
                      <div class="col-sm-10">
                          <input type="text" class="form-control input-sm required" id="hp" name="hp" placeholder="No HP" >
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="col-sm-2 control-label">Alamat <span class="text-danger">*</span></label>
                      <div class="col-sm-10">
                          <input type="text" class="form-control input-sm required" id="alamat" name="alamat" placeholder="Alamat" >
                      </div>
                  </div>
                  @endif
                  <div class="form-group">
                      <label class="col-sm-2 control-label">New Password <span class="text-danger">*</span></label>
                      <div class="col-sm-10">
                          <input type="password" class="form-control input-sm required" id="password" name="password" placeholder="Password">
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

});
  // $lol = '{{Auth::user()->name}}';
  // console.log($lol);

  $('#username').val('{{Auth::user()->username}}');
  $('#id_acc').val('{{Auth::user()->id}}');
  $('#nama').val('{{Auth::user()->name}}');
  $('#email').val('{{Auth::user()->email}}');

  $fag = {{Auth::user()->id}};

  function callback(resp){
    // console.log(resp);
    coba(resp);
  }

  $.ajax({
    type: "POST",
    url: "{{url('profil/cek/'.Auth::user()->username)}}",
   data: "",
   cache: false, // To unable request pages to be cached
   processData: false,
   success: function(response) {
     callback(response);
     // console.log(response);
   },
   headers: {
              'X-CSRF-TOKEN': '{{ csrf_token() }}'
    }
    });

    function coba(resp){
      $('#alamat').val(resp['alamat']);
      $('#hp').val(resp['nomorhp']);

    }

  // console.log('halo');

  // @if(isset($item))
  // $('#id_kategori').val('{{$item[0]->id}}');
  // $('#kategori').val('{{$item[0]->kategori}}');
  // @endif
  //
  // @if(isset($data))
  // $('#id').val('{{$data->id}}');
  // $('#id_kategori').val('{{$data->id_kategori}}');
  // $('#kategori').val('{{$kate->kategori}}');
  // $('#judul').val('{{$data->judul}}');
  // $('#isi').val('{{$data->isi}}');
  // @endif
</script>
@endsection
