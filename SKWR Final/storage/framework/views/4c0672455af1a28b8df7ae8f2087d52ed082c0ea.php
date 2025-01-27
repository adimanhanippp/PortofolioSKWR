<?php $__env->startSection('content'); ?>

<div class="row">
    <div class="col-md-12">
        <div class="box box-solid">
            <div class="box-header with-border">
                <h4>Profil</h4>
            </div>
            <div class="box-body">
              <form action="<?php echo e(url('profil/edit')); ?>" id="tidaktaw" class="form-horizontal" enctype="multipart/form-data">
                  <?php echo e(csrf_field()); ?>

              <div class="box-body">
                  <div class="form-group">
                      <label class="col-sm-2 control-label">Username <span class="text-danger">*</span></label>
                      <div class="col-sm-10">
                          <input type="text" class="form-control input-sm required" id="username" name="username" value="" readonly="readonly">
                          <!-- <input type="hidden" class="form-control input-sm required" id="id" name="id" value="">
                          <input type="hidden" class="form-control input-sm required" id="id_kategori" name="id_kategori" value=""> -->
                          <input type="hidden" class="form-control input-sm required" id="id_acc" name="id_acc" value="<?php echo e(Auth::user()->id); ?>">
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
                  <?php if(Entrust::can('user_index')): ?>
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
                  <?php endif; ?>
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

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentjs'); ?>
<script type="text/javascript">
$(function(){

});
  // $lol = '<?php echo e(Auth::user()->name); ?>';
  // console.log($lol);

  $('#username').val('<?php echo e(Auth::user()->username); ?>');
  $('#id_acc').val('<?php echo e(Auth::user()->id); ?>');
  $('#nama').val('<?php echo e(Auth::user()->name); ?>');
  $('#email').val('<?php echo e(Auth::user()->email); ?>');

  $fag = <?php echo e(Auth::user()->id); ?>;

  function callback(resp){
    // console.log(resp);
    coba(resp);
  }

  $.ajax({
    type: "POST",
    url: "<?php echo e(url('profil/cek/'.Auth::user()->username)); ?>",
   data: "",
   cache: false, // To unable request pages to be cached
   processData: false,
   success: function(response) {
     callback(response);
     // console.log(response);
   },
   headers: {
              'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
    }
    });

    function coba(resp){
      $('#alamat').val(resp['alamat']);
      $('#hp').val(resp['nomorhp']);

    }

  // console.log('halo');

  // <?php if(isset($item)): ?>
  // $('#id_kategori').val('<?php echo e($item[0]->id); ?>');
  // $('#kategori').val('<?php echo e($item[0]->kategori); ?>');
  // <?php endif; ?>
  //
  // <?php if(isset($data)): ?>
  // $('#id').val('<?php echo e($data->id); ?>');
  // $('#id_kategori').val('<?php echo e($data->id_kategori); ?>');
  // $('#kategori').val('<?php echo e($kate->kategori); ?>');
  // $('#judul').val('<?php echo e($data->judul); ?>');
  // $('#isi').val('<?php echo e($data->isi); ?>');
  // <?php endif; ?>
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>