<?php $__env->startSection('plugins_css'); ?>
<link rel="stylesheet" href="<?php echo e(asset('themes/plugins/select2/dist/css/select2.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('themes/plugins/iCheck/all.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="row">
    <div class="col-md-12">
        <div class="box box-solid">
            <div class="box-header with-border">
                <h4>Form: Menu</h4>
            </div>

            <form action="javascript:" id="form-input" class="form-horizontal">
                <?php echo e(csrf_field()); ?>

                <input type="hidden" id="id" name="id"/>
                <input type="hidden" id="parent" name="parent"/>

            <div class="box-body">
                <div class="form-group">
                    <label class="col-sm-2 control-label">Name <span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control input-sm required" id="name" name="name" placeholder="Name">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Slug <span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control input-sm required" id="slug" name="slug" placeholder="Slug">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Icon</label>
                    <div class="col-sm-10">
                        <select class="form-control input-sm" id="icon" name="icon"></select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Order No. <span class="text-danger">*</span></label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control input-sm text-right required" id="order_no" name="order_no" placeholder="Order No.">
                    </div>
                    <label class="col-sm-1 control-label">&nbsp;</label>
                    <div class="col-sm-2">
                        <label style="padding-top: 5px">
                            <input type="checkbox" class="form-control input-sm" id="is_active" name="is_active" checked="checked">&nbsp;&nbsp;Active ?
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Permissions</label>
                    <div class="col-sm-10">
                        <select class="form-control input-sm" id="permissions" name="permissions[]" multiple="multiple"></select>
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
<script type="text/javascript" src="<?php echo e(asset('themes/js/icons.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('themes/plugins/autonumeric/autoNumeric.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('themes/plugins/iCheck/icheck.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentjs'); ?>
<script type="text/javascript">
$(function() {
    // init before plugins
    var opt = '<option value=""></option>';
    for(var iLoop=0; iLoop<icons.length; iLoop++) {
        opt += '<option value="'+ icons[iLoop] +'">'+ icons[iLoop] +'</option>'
    }
    $('#icon').html(opt);
    // init plugins
    $('#icon').select2({
        placeholder: 'Pick an Icon',
        allowClear: true,
        templateResult: function(item) {
            if(!item.id)
                return item.text;
            return $('<span><i class="'+ item.element.value +'"></i>&nbsp&nbsp;'+ item.text +'</span>');
        }
    });
    $('#permissions').select2({
        placeholder: 'Pick a Permission',
        tags: true
    });
    $('#order_no').autoNumeric('init', {
        aSep: '',
        mDec: 0
    });
    $('#is_active').iCheck({
        checkboxClass: 'icheckbox_minimal-blue'
    });
    // init data
    <?php if(isset($parent)): ?>
    $('#parent').val('<?php echo e($parent); ?>');
    $('#order_no').val('<?php echo e($order_no); ?>');
    <?php endif; ?>
    <?php if(isset($data)): ?>
    $('#id').val('<?php echo e($data->id); ?>');
    $('#parent').val('<?php echo e($data->parent); ?>');
    $('#name').val('<?php echo e($data->name); ?>');
    $('#slug').val('<?php echo e($data->slug); ?>');
    $('#icon').val('<?php echo e($data->icon); ?>').trigger('change');
    $('#order_no').val('<?php echo e($data->order_no); ?>');
    $('#is_active').iCheck('<?php echo e($data->is_active?'check':'uncheck'); ?>');
    $('#permissions').html('');
    var perms = '',
        arrPerms = [];
        <?php $__currentLoopData = $data->perms()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
    perms += '<option value="<?php echo e($val->name); ?>"><?php echo e($val->name); ?></option>';
    arrPerms.push('<?php echo e($val->name); ?>');
        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
    $('#permissions').html(perms);
    $('#permissions').val(arrPerms).trigger('change');
    <?php endif; ?>
    <?php if(old('name')): ?>
    $('#id').val('<?php echo e(old('id')); ?>');
    $('#parent').val('<?php echo e(old('parent')); ?>');
    $('#name').val('<?php echo e(old('name')); ?>');
    $('#slug').val('<?php echo e(old('slug')); ?>');
    $('#icon').val('<?php echo e(old('icon')); ?>').trigger('change');
    $('#order_no').val('<?php echo e(old('order_no')); ?>');
    $('#is_active').iCheck('<?php echo e(old('is_active')?'check':'uncheck'); ?>');
    <?php endif; ?>
    // event
    $('#btn-submit').click(function() {
        var isValid = true,
            form = $('#form-input');
        $.each($('.required'), function() {
            isValid &= $(this).val()!=='';
        });
        if(isValid) {
            form.attr('method', 'post');
            form.attr('action', '<?php echo e(isset($data) ? url('menus/update') : url('menus/save')); ?>');
            form.submit();
        } else {
            alert('Please check your input!');
        }
    });
});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>