<?php $__env->startSection('content'); ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.3.0/Chart.bundle.js"></script>

<div class="row">
    <div class="col-md-12">
        <div class="box box-solid">
            <div class="box-header with-border">
                <h4>Create New Polling</h4>
            </div>
            <div class="box-body">
              <form action="<?php echo e(url('polling/tambah')); ?>" id="tidaktaw" class="form-horizontal" enctype="multipart/form-data">
                  <?php echo e(csrf_field()); ?>

              <div class="box-body">
                <div class="col-md-6">
                  <div class="form-group">
                      <label class="control-label">Question <span class="text-danger">*</span></label>
                      <div class="col-sm-12">
                        <textarea rows="8" class="form-control input-sm required" id="question" name="question" placeholder="Question"></textarea>
                        <input type="hidden" name="id" id="id">
                        <input type="hidden" name="total" id="total" value="2">
                      </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                      <label class="control-label">Answer <span class="text-danger">*</span></label>
                      <div class="col-sm-12">
                        <div class="col-sm-6" id="quest">
                          <input type="text" class="form-control input-sm required" name="ans1" value=""> <br>
                          <input type="text" class="form-control input-sm required" name="ans2" value=""> <br>
                        </div>
                        <div class="col-sm-6">
                          <button type="button" onclick="lul()" class="btn btn-primary" name="addinput" id="addinput">+add</button>
                        </div>
                      </div>
                  </div>
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

<?php $__env->startSection('contentjs'); ?>
<script type="text/javascript">

$(function(){
  <?php if(isset($data)): ?>
  $('#kategori').val('<?php echo e($data->kategori); ?>');
  $('#id').val('<?php echo e($data->id); ?>')
  <?php endif; ?>
});
var itung = 3;
function lul(){
 document.getElementById('quest').innerHTML +='<input type="text" class="form-control input-sm required" name="ans'+itung+'" value=""> <br>';
 // $('#quest').append('<input type="text" class="form-control input-sm required" name="ans'+itung+'" value=""> <br>');
 $('#total').val(itung);
 itung +=1;
  // console.log(addans);
}
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>