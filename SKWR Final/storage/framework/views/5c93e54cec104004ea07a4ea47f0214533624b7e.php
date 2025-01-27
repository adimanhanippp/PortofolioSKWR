<?php $__env->startSection('content'); ?>

<?php $__env->startSection('plugins_css'); ?>
<link rel="stylesheet" href="<?php echo e(asset('themes/plugins/datatables.net-bs/css/dataTables.bootstrap.min.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="row">
    <div class="col-md-12">
        <div class="box box-solid">
            <div class="box-header with-border">
                <h4>Forum</h4>
                <?php if(Entrust::can('forum_update')): ?>
                <div class="box-tools pull-right">
                    <a class="btn btn-primary" href="<?php echo e(url('forum/createkategori')); ?>"><i class="fa fa-plus"></i> New</a>
                </div>
                <?php endif; ?>
            </div>
            <div class="box-body">
              <!-- <blockquote>
                  <p>Selamat Datang, <span class="text-primary"><?php echo e(Auth::user()->name); ?></span>!</p>
              </blockquote>

              <?php $__currentLoopData = $item; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                <?php echo e($item->kategori); ?>

              <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?> -->
              <table id="entah" class="table table-bordered table-striped">
                  <thead>
                      <tr>
                          <th>No</th>
                          <th>Kategori</th>
                          <th style="width:60px">Action&nbsp;</th>
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
    ajax            : '<?php echo e(url('forum/dat')); ?>',
    fnCreatedRow: function (row, data, index) {
			$('td', row).eq(0).html(index + 1);
			},
    columns         : [
        { data: 'No'},
        { data: 'kategori'},
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