<?php $__env->startSection('content'); ?>

<div class="row">
    <div class="col-md-12">
        <div class="box box-solid">
            <div class="box-header with-border">
                <h4>Create New Subject</h4>
            </div>
            <div class="box-body">
              <form action="<?php echo e(url('forum/addisi')); ?>" id="tidaktaw" class="form-horizontal" enctype="multipart/form-data">
                  <?php echo e(csrf_field()); ?>

              <div class="box-body">
                  <div class="form-group">
                      <label class="col-sm-2 control-label">Kategori <span class="text-danger">*</span></label>
                      <div class="col-sm-10">
                          <input type="text" class="form-control input-sm required" id="kategori" name="kategori" value="" readonly="readonly">
                          <input type="hidden" class="form-control input-sm required" id="id" name="id" value="">
                          <input type="hidden" class="form-control input-sm required" id="id_kategori" name="id_kategori" value="">
                          <input type="hidden" class="form-control input-sm required" id="id_acc" name="id_acc" value="<?php echo e(Auth::user()->id); ?>">
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

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentjs'); ?>
<script type="text/javascript">
  <?php if(isset($item)): ?>
  $('#id_kategori').val('<?php echo e($item[0]->id); ?>');
  $('#kategori').val('<?php echo e($item[0]->kategori); ?>');
  <?php endif; ?>

  <?php if(isset($data)): ?>
  $('#id').val('<?php echo e($data->id); ?>');
  $('#id_kategori').val('<?php echo e($data->id_kategori); ?>');
  $('#kategori').val('<?php echo e($kate->kategori); ?>');
  $('#judul').val('<?php echo e($data->judul); ?>');
  $('#isi').val('<?php echo e($data->isi); ?>');
  <?php endif; ?>
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>