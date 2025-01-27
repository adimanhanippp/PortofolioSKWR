<?php $__env->startSection('content'); ?>

<div class="row">
  <div class="col-md-12">
    <div class="box box-solid">
      <div class="box-header with-border">
        <h4>Struktur Organisasi</h4>
      </div>
      <div class="box-body">
        <img src="<?php echo e(url('struktur.png')); ?>" alt="">
      </div>
    </div>

  </div>

</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>