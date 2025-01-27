<?php $__env->startSection('plugins_css'); ?>
<link rel="stylesheet" href="<?php echo e(asset('themes/plugins/datatables.net-bs/css/dataTables.bootstrap.min.css')); ?>">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.1.0/css/responsive.bootstrap.min.css" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<div class="row">
    <div class="col-md-12">
        <div class="box box-solid">
            <div class="box-header with-border">
                <h4>History Kepengurusan</h4>
            </div>
            <div class="box-body">
              <div class="container">
              <div class="col-md-2">
                <label class="control-label">Periode</label> <br>
                <select id="periodeawal">
                  <option value="" disabled selected>Pilih Periode</option>
                  <?php $__currentLoopData = $penguruss->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pengurus): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                  <option value="<?php echo e($pengurus->periode); ?>"><?php echo e($pengurus->periode); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                </select>
              </div>
              </div>
              <br>
              <p id="entah"></p>
                <table id="datatables" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <!-- <th>No</th> -->
                      <th>Nama</th>
                      <th>Jabatan</th>
                      <th>Periode</th>
                      <th>Tanggal Pengangkatan</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php $__currentLoopData = $peng->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $peng): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                  <tr>
                    <td><?php echo e($peng->nama); ?></td>
                    <td><?php echo e($peng->jabatan); ?></td>
                    <td><?php echo e($peng->periode); ?></td>
                    <td><?php echo e($peng->tgldiangkat); ?></td>
                  </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                  </tbody>
                </table>
              </div>
          </div>
    </div>
</div>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('plugins_js'); ?>
<script type="text/javascript" src="<?php echo e(asset('themes/plugins/datatables.net/js/jquery.dataTables.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('themes/plugins/datatables.net-bs/js/dataTables.bootstrap.min.js')); ?>"></script>
<!-- <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.1.0/js/dataTables.responsive.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.1.0/js/responsive.bootstrap.min.js"></script> -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentjs'); ?>
<script type="text/javascript">

$('#periodeawal').change(function(){
  var fa = $(this).val();

  var table = $('#datatables').dataTable({
    "processing": true,
    "serverSide": true,
    "retrieve"  : true,
    "paging"    : false,
    "ajax": {
      "url": "<?php echo e(url('Pengurus/gdata')); ?>",
      "data": {
          "tgl": fa
      }
    },
    // fnCreatedRow: function (row, data, index) {
    //   $('td', row).eq(0).html(index + 1);
    //   },
    "columns"         : [
        // { data: 'No'},
        { data: 'nama'},
        { data: 'jabatan' },
        { data: 'periode'},
        { data: 'tgldiangkat'}
    ]
  } );
    $('#datatables').DataTable().destroy();
  // $('#datatables').DataTable().ajax.reload();
});

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>