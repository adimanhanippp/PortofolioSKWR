<?php $__env->startSection('content'); ?>

<?php $__env->startSection('plugins_css'); ?>
<link rel="stylesheet" href="<?php echo e(asset('themes/plugins/datatables.net-bs/css/dataTables.bootstrap.min.css')); ?>">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.1.0/css/responsive.bootstrap.min.css" />
<?php $__env->stopSection(); ?>

<div class="row">
  <div class="col-md-12">
    <div class="box box-solid">
      <div class="box-header with-border">
        <h4>List Anggota</h4>
      </div>
      <div class="box-body">
        <table id="example" class="table table-bordered table-striped nowrap" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th>Nama Lengkap</th>
              <th>NIP</th>
              <th>Email</th>
              <th>Nomor HP</th>
              <th>Unit Kerja</th>
              <th>action</th>
            </tr>
          </thead>
          <tbody>
            <?php $__currentLoopData = $anggotas->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $anggota): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
            <tr>
              <td><?php echo e($anggota->namalengkap); ?></td>
              <td><?php echo e($anggota->nip); ?></td>
              <td><?php echo e($anggota->email); ?></td>
              <td><?php echo e($anggota->nomorhp); ?></td>
              <td><?php echo e($anggota->unitkerja); ?></td>
              <td>
                <button class="show-modal btn btn-success" data-nip="<?php echo e($anggota->nip); ?>"
                  data-namalengkap="<?php echo e($anggota->namalengkap); ?>"
                  data-email="<?php echo e($anggota->email); ?>"
                  data-nomorhp="<?php echo e($anggota->nomorhp); ?>"
                  data-alamat="<?php echo e($anggota->alamat); ?>"
                  data-jabatan="<?php echo e($anggota->jabatan); ?>"
                  data-unitkerja="<?php echo e($anggota->unitkerja); ?>">
                Lihat</button>
              </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
          </tbody>
        </table>
        <div id="showmodal" class="modal fade" role="dialog">
          <div class="modal-dialog">
            <!-- modal content -->
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title"></h4>
                <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
              </div>
              <div class="modal-body">
                <!-- <p>Some text in the modal.</p> -->
                <div class="form-group">
                    <label class="control-label col-sm-2" for="nip">NIP</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nip_show" disabled>
                    </div>
                </div>
                <br>
                <br>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="namalengkap">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="namalengkap_show" disabled>
                    </div>
                </div>
                <br>
                <br>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="email">Email</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="email_show" disabled>
                    </div>
                </div>
                <br>
                <br>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="nomorhp">Handphone</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nomorhp_show" disabled>
                    </div>
                </div>
                <br>
                <br>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="alamat">Alamat</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="alamat_show" disabled>
                    </div>
                </div>
                <br>
                <br>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="jabatan">Jabatan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="jabatan_show" disabled>
                    </div>
                </div>
                <br>
                <br>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="unitkerja">Unit Kerja</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="unitkerja_show" disabled>
                    </div>
                </div>
                <br>
                <br>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
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
<!-- <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.1.0/js/dataTables.responsive.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.1.0/js/responsive.bootstrap.min.js"></script> -->
<?php $__env->stopSection(); ?>


<?php $__env->startSection('contentjs'); ?>
<script type="text/javascript">
$(document).ready(function() {
	$('#example').DataTable( {

	} );
  $(document).on('click', '.show-modal', function() {
            $('.modal-title').text('Show');
            $('#nip_show').val($(this).data('nip'));
            $('#namalengkap_show').val($(this).data('namalengkap'));
            $('#email_show').val($(this).data('email'));
            $('#nomorhp_show').val($(this).data('nomorhp'));
            $('#alamat_show').val($(this).data('alamat'));
            $('#jabatan_show').val($(this).data('jabatan'));
            $('#unitkerja_show').val($(this).data('unitkerja'));
            $('#showmodal').modal('show');
        });
} );
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>