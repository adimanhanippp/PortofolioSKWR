<?php $__env->startSection('plugins_css'); ?>
<link rel="stylesheet" href="<?php echo e(asset('themes/plugins/datatables.net-bs/css/dataTables.bootstrap.min.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="row">
    <div class="col-md-12">
        <div class="box box-solid">
            <div class="box-header with-border">
                <h4>Approve</h4>
            </div>
            <div class="box-body">
              <table id="datatables" class="table table-bordered table-striped">
                  <thead>
                      <tr>
                        <th>No</th>
                        <th>NIP</th>
                        <!-- <th>Password</th> -->
                        <th>Nama Lengkap</th>
                        <th>Email</th>
                        <th>Nomor Anggota</th>
                        <th>Action</th>
                        <th>Approve</th>
                      </tr>
                  </thead>
                  <tbody>
                  </tbody>
              </table>
              <div id="myModal" class="modal fade" role="dialog" onsubmit="return validateForm()">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form method="post" id="form-input">
                            <div class="modal-header">
                               <h4>Approve</h4>
                            </div>
                            <div class="modal-body">
                                <?php echo e(csrf_field()); ?>

                                <span id="form_output"></span>
                                <div class="form-group">
                                    <label>No Anggota</label>
                                    <input type="text" name="noanggota" id="noanggota" class="form-control" />
                                </div>
                            </div>
                            <div class="modal-footer">
                                <input type="hidden" name="register_nip" id="register_nip" value="" />
                                <input type="hidden" name="button_action" id="button_action" value="insert" />
                                <input type="submit" name="submit" id="action" value="Add" class="btn btn-info" />
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
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

$(document).ready(function() {
  // console.log($(this).attr('data-url'));
  // populate table with ajax

  $('#datatables').DataTable({
    processing      : true,
    serverSide      : true,
    ajax            : '<?php echo e(url('approve/dat')); ?>',
    fnCreatedRow: function (row, data, index) {
			$('td', row).eq(0).html(index + 1);
			},
    columns         : [
        { data: 'No'},
        { data: 'nip'},
        // { data: 'password'},
        { data: 'namalengkap' },
        { data: 'email'},
        { data: 'noanggota' },
        { data: 'action', name: 'action', orderable: false, searchable: false },
        { data: 'approve', name: 'approve', orderable: false, searchable: false }
    ]
});
    // console.log('<?php echo e(csrf_token()); ?>')

            // event
    $('body').on('click', '.row-delete', function() {
        if(confirm('Attempting to delete data, are you sure?')) {
            location.href = $(this).attr('data-url');
        }
    });

    // $('body').on('click', '.row-edit', function() {
    //     $('#myModal').modal('show');
    //     $('#button_action').val('update');
    //
    // });
});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>