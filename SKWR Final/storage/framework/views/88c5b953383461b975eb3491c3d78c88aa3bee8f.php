<!-- extends('app') -->

<?php $__env->startSection('plugins_css'); ?>
<link rel="stylesheet" href="<?php echo e(asset('themes/plugins/datatables.net-bs/css/dataTables.bootstrap.min.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="row">
    <div class="col-md-12">
        <div class="box box-solid">
            <div class="box-header with-border">
                <h4 class="box-title">List: User</h4>
                <?php if(Entrust::can('user_create')): ?>
                <div class="box-tools pull-right">
                    <a class="btn btn-primary" href="<?php echo e(url('news/create')); ?>"><i class="fa fa-plus"></i> New</a>
                </div>
                <?php endif; ?>
            </div>
            <div class="box-body">
                <table id="entah" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Author</th>
                            <th>Post at</th>
                            <th>Description</th>
                            <th>Isi</th>
                            <th>Gambar</th>
                            <th style="width:60px">&nbsp;</th>
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
  // populate table with ajax
  $('#entah').DataTable({
    processing      : true,
    serverSide      : true,
    ajax            : '<?php echo e(url('news/dat')); ?>',
    fnCreatedRow: function (row, data, index) {
			$('td', row).eq(0).html(index + 1);
			},
    columns         : [
        { data: 'No'},
        { data: 'Title'},
        { data: 'Author' },
        { data: 'updated_at'},
        { data: 'Description' },
        { data: 'Isi' },
        { data: 'Gambar' },
        { data: 'action', name: 'action', orderable: false, searchable: false }
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