<?php $__env->startSection('plugins_css'); ?>
<link rel="stylesheet" href="<?php echo e(asset('themes/plugins/select2/dist/css/select2.min.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="row">
  <div class="col-md-12">
    <div class="box box-solid">
      <div class="box-header with-border">
        <h4>Form Create</h4>
      </div>
      <div class="box-body">
        <form action="javascript:" id="form-input" class="form-horizontal">
            <?php echo e(csrf_field()); ?>

            <div class="form-group">
                <label class="col-sm-2 control-label">Jabatan <span class="text-danger">*</span></label>
                <div class="col-sm-10">
                    <input type="text" class="form-control input-sm" id="jabatan" name="jabatan" placeholder="jabatan">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Nama <span class="text-danger">*</span></label>
                <div class="col-sm-10">
                    <input type="text" class="form-control input-sm" id="nama" name="name" placeholder="nama">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Tangga Pengangkatan <span class="text-danger">*</span></label>
                <div class="col-sm-10">
                    <input type="date" name="tgldiangkat" id="tgldiangkat"/>
                </div>
            </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Profil <span class="text-danger">*</span></label>
            <div class="col-sm-10">
              <textarea rows="10" class="form-control input-sm required" id="profil" name="profil" placeholder="Profil"></textarea>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Gambar <span class="text-danger">*</span></label>
            <div class="col-sm-10">
                <input type="file" class="form-control input-sm required validate" id="inputgambar" name="gambar" placeholder="gambar">
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

<?php $__env->stopSection(); ?>

<?php $__env->startSection('plugins_js'); ?>
<script type="text/javascript" src="<?php echo e(asset('themes/plugins/datatables.net/js/jquery.dataTables.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('themes/plugins/datatables.net-bs/js/dataTables.bootstrap.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentjs'); ?>
<script type="text/javascript">
$(function(){
<?php if(isset($data)): ?>
$('#id').val('<?php echo e($data->id); ?>');
$('#jabatan').val('<?php echo e($data->jabatan); ?>');
$('#name').val('<?php echo e($data->nama); ?>');
$('#tgldiangkat').val('<?php echo e($data->tgldiangkat); ?>');
$('#jabatan').val('<?php echo e($data->jabatan); ?>');
// $('#profil').val('<?php echo e($data->profil); ?>');
<?php endif; ?>


$('#btn-submit').click(function(e){
  e.preventDefault();
  var alamat = null;
  function callback(resp){
    alamat = resp;
    aform = $('#form-input').serialize();
    aform+='&gambar='+alamat;
    // console.log(aform);
    $.ajax({
      type: "POST",
      url: "<?php echo e(url('Pengurus/save')); ?>",
      data: aform,
      cache: false,
      success: function(response){
        // alert('data saved');
        alert(aform);
        // window.location = "<?php echo e(url('Pengurus')); ?>"
        }
      });
  }
  var extension = $('#inputgambar').val().split('.').pop().toLowerCase();
  if ($.inArray(extension, ['jpg', 'png', 'jpeg', 'webp']) == -1) {
        alert("Please Select Valid File... ");
    }else{
      var file_data = $('#inputgambar').prop('files')[0];
      var form_data = new FormData();
      form_data.append('file', file_data);
      $.ajaxSetup({
            headers: {
                'X-CSRF-Token': '<?php echo e(csrf_token()); ?>'
            }
        });
    $.ajax({
         url: "<?php echo e(url('Pengurus/saveimage')); ?>", // point to server-side PHP script
         data: form_data,
         type: 'POST',
         contentType: false, // The content type used when sending data to the server.
         cache: false, // To unable request pages to be cached
         processData: false,
         success: function(response) {
           // alert(response);
           callback(response);
         }
       });
    }
  });

});

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>