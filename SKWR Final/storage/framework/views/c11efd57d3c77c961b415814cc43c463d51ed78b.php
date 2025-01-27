<?php $__env->startSection('plugins_css'); ?>
<link rel="stylesheet" href="<?php echo e(asset('themes/plugins/datatables.net-bs/css/dataTables.bootstrap.min.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="row">
    <div class="col-md-12">
        <div class="box box-solid">
            <div class="box-header with-border">
                <h4>Sharing</h4>
            </div>
                <form id="form-upload" onsubmit="return validateForm()" class="form-horizontal" action="<?php echo e(url('sharing/save')); ?>" method="post" enctype="multipart/form-data">
                  <?php echo e(csrf_field()); ?>

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

<?php $__env->stopSection(); ?>

<?php $__env->startSection('plugins_js'); ?>
<script type="text/javascript" src="<?php echo e(asset('themes/plugins/datatables.net/js/jquery.dataTables.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('themes/plugins/datatables.net-bs/js/dataTables.bootstrap.min.js')); ?>"></script>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('contentjs'); ?>
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
//     var aidi = <?php echo e(Auth::user()->id); ?>;
//     // alert(aidi);
//     var dat = $('#form-upload').serialize();
//     dat = dat+'&file='+alamat+'&id='+aidi;
//     // alert(dat);
//     // pada ajax dilakukan penambahan data ke database
//       $.ajax({
//         type: "POST",
//         url: "<?php echo e(url('sharing/save')); ?>",
//        data: dat,
//        cache: false,
//        success: function(response) {
//          alert('data saved');
//          window.location = "<?php echo e(url('sharing')); ?>"
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
//                 'X-CSRF-Token': '<?php echo e(csrf_token()); ?>'
//             }
//         });
//
//       $.ajax({
//            url: "<?php echo e(url('sharing/savefile')); ?>", // point to server-side PHP script
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
//            //   alert('<?php echo e(csrf_field()); ?>');
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
//     url: "<?php echo e(url('news/save')); ?>",
//    data: dat,
//    cache: false,
//    success: function(response) {
//      alert('data saved');
//      window.location = "<?php echo e(url('news')); ?>"
//    }
//  });

// });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>