<?php $__env->startSection('plugins_css'); ?>
<link rel="stylesheet" href="<?php echo e(asset('themes/plugins/select2/dist/css/select2.min.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="row">
    <div class="col-md-12">
        <div class="box box-solid">
            <div class="box-header with-border">
                <h4>Form: Role</h4>
            </div>

            <form action="javascript:" id="form-input" class="form-horizontal">
                <?php echo e(csrf_field()); ?>

                <input type="hidden" id="id" name="id"/>

            <div class="box-body">
                <div class="form-group">
                    <label class="col-sm-2 control-label">Username <span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control input-sm required" id="username" name="username" placeholder="Username">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Name <span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control input-sm required" id="name" name="name" placeholder="Name">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Email <span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control input-sm required" id="email" name="email" placeholder="Email">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Role <span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <select class="form-control input-sm required" id="role" name="role">
                            <option value=""></option>
                        <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                            <option value="<?php echo e($r->id); ?>"><?php echo e($r->name .' - '. $r->description); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                        </select>
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

<?php $__env->stopSection(); ?>

<?php $__env->startSection('plugins_js'); ?>
<script type="text/javascript" src="<?php echo e(asset('themes/plugins/select2/dist/js/select2.full.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentjs'); ?>
<script type="text/javascript">
$(function() {
    // init before plugins

    // init plugins
    $('#role').select2({
        placeholder: 'Pick a Role',
        allowClear: true
    });
    // init data
    <?php if(isset($data)): ?>
    $('#id').val('<?php echo e($data->id); ?>');
    $('#username').val('<?php echo e($data->username); ?>');
    $('#name').val('<?php echo e($data->name); ?>');
    $('#email').val('<?php echo e($data->email); ?>');
    $('#role').val('<?php echo e($data->roles()->first()->id); ?>').trigger('change');
    <?php endif; ?>
    <?php if(old('name')): ?>
    $('#id').val('<?php echo e(old('id')); ?>');
    $('#username').val('<?php echo e(old('username')); ?>');
    $('#name').val('<?php echo e(old('name')); ?>');
    $('#email').val('<?php echo e(old('email')); ?>');
    $('#role').val('<?php echo e(old('role')); ?>').trigger('change');
    <?php endif; ?>
    // event

    console.log('<?php echo e(old('name')); ?>');

    $('#btn-submit').click(function() {
        var isValid = true,
            form = $('#form-input');
        $.each($('.required'), function() {
            isValid &= $(this).val()!=='';
        });
        if(isValid) {
            form.attr('method', 'post');
            form.attr('action', '<?php echo e(isset($data) ? url('users/update') : url('users/save')); ?>');
            form.submit();
        } else {
            alert('Please check your input!');
        }
    });
});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>