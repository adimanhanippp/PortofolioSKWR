<?php $__env->startSection('plugins_css'); ?>
<link rel="stylesheet" href="<?php echo e(asset('themes/plugins/select2/dist/css/select2.min.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="row">
  <div class="col-md-12">
    <div class="box box-solid">
      <div class="box-header with-border">
        <h4>Form Create</h4>
        <?php if(Entrust::can('pengurus_create')): ?>
        <div class="box-tools pull-right">
            <a class="btn btn-primary" href="<?php echo e(url('Pengurus/createperiode')); ?>"><i class="fa fa-plus"></i> New Periode</a>
        </div>
        <?php endif; ?>
      </div>
      <div class="box-body">
        <form action="<?php echo e(url('Pengurus/save')); ?>" onsubmit="return validateForm()" id="form-input" class="form-horizontal" method="post" enctype="multipart/form-data">
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
                    <input type="text" class="form-control input-sm" id="nama" name="nama" placeholder="nama">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label"> periode <span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                      <select name="periode" id="periode">
                        <option value="" disabled selected>Select Periode</option>
                        <?php $__currentLoopData = $data->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $periode): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <option value="<?php echo e($periode->periode); ?>"><?php echo e($periode->periode); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                      </select>
                    </div>
                </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Tanggal Pengangkatan <span class="text-danger">*</span></label>
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

function validateForm() {
      var extension = $('#inputgambar').val().split('.').pop().toLowerCase();
      if ($.inArray(extension, ['jpg', 'png', 'jpeg', 'webp']) == -1) {
            alert("Please Select Valid File");
            return false;
        }
        return true;
}

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>