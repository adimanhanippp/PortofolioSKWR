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
            </div>
            <div class="box-body">
              <div class="col-xs-12">

                <div class="col-xs-2">
                  <b><?php echo e($entahlah->name); ?></b>
                </div>
                <div class="col-xs-10">
                  <div class="">
                    <b><?php echo e($entahlah->judul); ?></b>
                  </div>
                  <div class="">
                    <!-- posted at harusnya ditaruh sini -->
                  </div>
                  <div class="">
                    <?php echo e($entahlah->isi); ?> <hr>
                  </div>

                  <div class="">
                    <b>Comment</b> <br>
                    <?php $__currentLoopData = $comment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    <div class="col-xs-9">
                      <div class="col-xs-2">
                        <b><?php echo e($comment->username); ?></b>
                      </div>
                      <div class="col-xs-7">
                        <?php echo e($comment->isi); ?> <br>
                        <?php echo e($comment->created_at); ?>

                        <hr>
                      </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                    <!-- komentar masuk sini -->
                  </div>
                  <div class="col-lg-12">
                    <b>Your Comment</b> <br>
                    <form class="" action="<?php echo e(url('forum/addcomm')); ?>" method="post">
                      <?php echo e(csrf_field()); ?>

                      <textarea name="comment" rows="8" cols="80"></textarea>
                      <input type="hidden" name="id_user" value="<?php echo e(Auth::user()->id); ?>">
                      <input type="hidden" name="id_forum" value="<?php echo e($entahlah->id); ?>">
                      <div class="box-footer">
                          <button type="submit" class="btn btn-primary" id="btn-submit">Submit</button>
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
$(function() {
  var ant = <?php echo e($entahlah->judul); ?>;
  .('#entahlah').val = '';
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>