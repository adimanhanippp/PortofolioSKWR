<?php $__env->startSection('content'); ?>

<div class="row">
    <div class="col-md-12">
        <div class="box box-solid">
            <?php $__currentLoopData = $anggotas->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $anggota): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
            <div class="box-header with-border">
                <h4>Profil <?php echo e($anggota->namalengkap); ?></h4>
            </div>
            <div class="container">

              <div class="">
                NIP  : <?php echo e($anggota->nip); ?>

              </div>
              <br>
              <div class="">
                Nama : <?php echo e($anggota->namalengkap); ?>

              </div>
              <br>
              <div class="">
                Email : <?php echo e($anggota->email); ?>

              </div>
              <br>
              <div class="">
                Nomor Handphone : <?php echo e($anggota->nomorhp); ?>

              </div>
              <br>
              <div class="">
                Alamat : <?php echo e($anggota->alamat); ?>

              </div>
              <br>
              <div class="">
                Jabatan : <?php echo e($anggota->jabatan); ?>

              </div>
              <br>
              <div class="">
                Unit kerja : <?php echo e($anggota->unitkerja); ?>

              </div>
              <br>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>