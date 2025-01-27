<?php $__env->startSection('content'); ?>
<div class="row">
  <div class="col-md-12">
    <div class="box box-solid">
      <div class="box-header with-border">
        <h4>Submit register</h4>
      </div>
      <div class="box-body">
        <form action="<?php echo e(url('approve/submit')); ?>" id="tidaktaw" class="form-horizontal" enctype="multipart/form-data">

          <div class="form-group">
              <label class="col-sm-2 control-label">Username <span class="text-danger">*</span></label>
              <div class="col-sm-10">
                  <input type="text" class="form-control input-sm required" id="nip" name="NIP" value="" readonly="readonly">
                  <!-- <input type="hidden" class="form-control input-sm required" id="id" name="id" value="">
                  <input type="hidden" class="form-control input-sm required" id="id_kategori" name="id_kategori" value=""> -->
                  <input type="hidden" class="form-control input-sm required" id="id_acc" name="id_acc" value="nip">
              </div>
          </div>
          <div class="form-group">
              <label class="col-sm-2 control-label">Nama <span class="text-danger">*</span></label>
              <div class="col-sm-10">
                  <input type="text" class="form-control input-sm required" id="nama" name="nama" placeholder="Nama" >
              </div>
          </div>
          <div class="form-group">
              <label class="col-sm-2 control-label">Email <span class="text-danger">*</span></label>
              <div class="col-sm-10">
                  <input type="text" class="form-control input-sm required" id="email" name="email" placeholder="Email" >
              </div>
          </div>
          <div class="form-group">
              <label class="col-sm-2 control-label">Nomor Anggota <span class="text-danger">*</span></label>
              <div class="col-sm-10">
                  <input type="text" class="form-control input-sm required" id="noanggota" name="noanggota" placeholder="No Anggota" required>
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



</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>