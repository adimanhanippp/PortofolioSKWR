@extends('app')

@section('plugins_css')
<link rel="stylesheet" href="{{ asset('themes/plugins/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="box box-solid">
            <div class="box-header with-border">
                <h4>Sharing</h4>
            </div>
                <form id="form-upload" onsubmit="return validateForm()" class="form-horizontal" action="{{ url('sharing/save')}}" method="post" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <div class="box-body">
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Judul <span class="text-danger">*</span></label>
                      <div class="col-sm-10">
                          <input type="text" class="form-control input-sm required" id="Judul" name="judul" placeholder="Judul" required> <br>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Deskripsi <span class="text-danger">*</span></label>
                      <div class="col-sm-10">
                          <input type="text" class="form-control input-sm required" id="deskripsi" name="deskripsi" placeholder="Deskripsi" required> <br>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">File <span class="text-danger">*</span></label>
                      <div class="col-sm-10">
                          <input type="file" class="form-control input-sm required validate" id="inputfile" name="file" placeholder="File"> <br>
                          maks file 2048KB
                      </div>
                  </div>
                  <div class="box-footer">
                      <button type="submit" class="btn btn-primary pull-right" id="btn-submit">Submit</button>
                  </div>
                </div>
              </form>
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

function validateForm() {
      var extension = $('#inputfile').val().split('.').pop().toLowerCase();
      if ($.inArray(extension, ['pptx', 'docx', 'pdf', 'ppt', 'doc','jpg', 'png', 'jpeg', 'webp']) == -1) {
            alert("Please Select Valid File");
            return false;
        }
        return true;
}

// $('#btn-submit').click(function(e){
//   e.preventDefault();
//   var alamat = null;
//   function callback(resp){
//     alamat = resp;
//     // console.log(alamat);
//     var aidi = {{ Auth::user()->id }};
//     // alert(aidi);
//     var dat = $('#form-upload').serialize();
//     dat = dat+'&file='+alamat+'&id='+aidi;
//     // alert(dat);
//     // pada ajax dilakukan penambahan data ke database
//       $.ajax({
//         type: "POST",
//         url: "{{ url('sharing/save') }}",
//        data: dat,
//        cache: false,
//        success: function(response) {
//          alert('data saved');
//          window.location = "{{ url('sharing') }}"
//        }
//       });
//   }
//
//   var extension = $('#inputfile').val().split('.').pop().toLowerCase();
//   if ($.inArray(extension, ['pptx', 'docx', 'pdf', 'ppt', 'doc','jpg', 'png', 'jpeg', 'webp']) == -1) {
//         alert("Please Select Valid File... ");
//     }else{
//       var file_data = $('#inputfile').prop('files')[0];
//       var form_data = new FormData();
//       form_data.append('file', file_data);
//       $.ajaxSetup({
//             headers: {
//                 'X-CSRF-Token': '{{ csrf_token() }}'
//             }
//         });
//
//       $.ajax({
//            url: "{{ url('sharing/savefile') }}", // point to server-side PHP script
//            data: form_data,
//            type: 'POST',
//            contentType: false, // The content type used when sending data to the server.
//            cache: false, // To unable request pages to be cached
//            processData: false,
//            success: function(response) {
//              // alert(response);
//              // alamat = response;
//              callback(response);
//            }
//            // error: function(data){
//            //   alert('{{ csrf_field() }}');
//            //   alert($('meta[name=_token]').attr('content'));
//            // }
//
//        });
//        // return alamat;
//        // alert(alamat)
//     }
// });

// $('#btn-submit').click(function(){
//   var dat = $('#tidaktaw').serialize();
//   $.ajax({
//     type: "POST",
//     url: "{{ url('news/save') }}",
//    data: dat,
//    cache: false,
//    success: function(response) {
//      alert('data saved');
//      window.location = "{{ url('news') }}"
//    }
//  });

// });
</script>
@endsection
