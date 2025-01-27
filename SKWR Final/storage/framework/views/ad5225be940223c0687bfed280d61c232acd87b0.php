<?php $__env->startSection('content'); ?>

<div class="row">
    <div class="col-md-12">
        <div class="box box-solid">
            <div class="box-header with-border">
                <h4>Input Nomor Anggota</h4>
            </div>
            <div class="box-body">
              <form action="<?php echo e(url('approve/saveupdate')); ?>" id="tidaktaw" class="form-horizontal" >
              <?php echo e(csrf_field()); ?>

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

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentjs'); ?>
<script type="text/javascript">
$(function(){
  <?php if(isset($data)): ?>
  $('#nip').val('<?php echo e($data->nip); ?>');
  $('#namalengkap').val('<?php echo e($data->namalengkap); ?>');
  $('#noanggota').val('<?php echo e($data->noanggota); ?>');
  $('#id').val('<?php echo e($data->id); ?>');
  <?php endif; ?>
});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>