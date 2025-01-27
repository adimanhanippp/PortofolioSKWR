<?php $__env->startSection('content'); ?>

<div class="row">
  <div class="col-md-12">
    <div class="box box-solid">
      <div class="box-header with-border">
          <h4> Pengurus</h4>
      </div>
          <div class="box-body">
            <!-- <table border="0" cellpadding="1" cellspacing="1" style="height:1266px; width:700px"> -->
            <style>
                  td{
                    padding: 10px;
                    vertical-align: top;
                    text-align: justify;
                  }
                  th{
                    padding: 10px;
                    text-align: center;
                  }
            </style>
            <table align="center" border="1" cellpadding="1" cellspacing="1" width="800px">
              <thead>
            		<tr>
                  <th>Foto</th>
                  <!-- <th>Nama</th>
                  <th>Jabatan</th> -->
                  <th>Profil</th>
                  <th>Tanggal Pengangkatan</th>

            		</tr>
            	</thead>
              <tbody>
              <?php $__currentLoopData = $pengurus->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $urus): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
              <tr>
                <td height="225px" width="175px" align="center">
                  <img src="<?php echo e(asset($urus->gambar)); ?>" height="200px" width="150px" class="img-responsive">
                </td>
                <td align="justify" style="white-space: pre-line"> <?php echo e($urus->nama); ?>

                  <?php echo e($urus->jabatan); ?> <br>
                  <?php echo e($urus->profil); ?> </td>
                <td ><?php echo e($urus->tgldiangkat); ?></td>
             </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
            </tbody>
            </table>
          </div>
    </div>
  </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>