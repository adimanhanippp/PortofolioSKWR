<?php $__env->startSection('content'); ?>

<div class="row">
  <div class="col-md-12">
    <div class="box box-solid">
      <div class="box-header with-border">
        <h4>Create periode</h4>
      </div>
      <form action="<?php echo e(url('Pengurus/saveperiode')); ?>" id="form-input" class="form-horizontal" method="post">
        <?php echo e(csrf_field()); ?>

        <input type="hidden" id="id" name="id"/>
      <div class="box-body">
        <div class="form-group">
            <label class="col-sm-2 control-label">Periode Awal <span class="text-danger">*</span></label>
            <div class="col-sm-10">
                <input type="text" class="form-control input-sm required" id="periodeawal" name="periodeawal" placeholder="Periode Awal (Tahun)">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Periode Akhir <span class="text-danger">*</span></label>
            <div class="col-sm-10">
                <input type="text" class="form-control input-sm required" id="periodeakhir" name="periodeakhir" placeholder="Periode Akhir (Tahun)">
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

<?php $__env->stopSection(); ?>

<?php echo $__env->make('app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>