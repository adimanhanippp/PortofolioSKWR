<?php $__env->startSection('plugins_css'); ?>
<link rel="stylesheet" href="<?php echo e(asset('themes/plugins/datatables.net-bs/css/dataTables.bootstrap.min.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="box box-solid">
            <div class="box-header with-border">
                <h4 class="box-title" > Pengurus</h4>
                <?php if(Entrust::can('pengurus_create')): ?>
                <div class="box-tools pull-right">
                    <a class="btn btn-primary" href="<?php echo e(url('Pengurus/create')); ?>"><i class="fa fa-plus"></i> New</a>
                </div>
                <?php endif; ?>
            </div>
            <div class="box-body">
              <br>
                <table id="datatables" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Jabatan</th>
                      <th>Nama</th>
                      <th>Profil</th>
                      <th>Periode</th>
                      <th>Tanggal Pengangkatan</th>
                      <!-- <th>Tanggal Diberhentikan</th> -->
                      <th>Foto</th>
                      <!-- <th>Action</th> -->
                    </tr>
                  </thead>
                  <tbody></tbody>
                </table>
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

$(function() {
    // init plugins
    $('#datatables').DataTable({
        processing      : true,
        serverSide      : true,
        ajax            : '<?php echo e(url('Pengurus/dat')); ?>',
        fnCreatedRow: function (row, data, index) {
    			$('td', row).eq(0).html(index + 1);
    			},
        columns         : [
            { data: 'No'},
            { data: 'jabatan'},
            { data: 'nama'},
            { data: 'profil'},
            { data: 'periode'},
            { data: 'tgldiangkat'},
            // { data: 'tglberhenti'},
            // { data: 'gambar'},
            { data: 'gambar', function(gambar){
              return '<img src="'+gambar+'"/>';
            } }
            // { data: 'action', name: 'action', orderable: false, searchable: false }
        ]
      });
      $('body').on('click', '.row-delete', function() {
          if(confirm('Attempting to delete data, are you sure?')) {
              location.href = $(this).attr('data-url');

          }
      });
    });

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>