<?php $__env->startSection('plugins_css'); ?>
<link rel="stylesheet" href="<?php echo e(asset('themes/plugins/fancytree/skin-win8/ui.fancytree.min.css')); ?>">
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
                    <label class="col-sm-2 control-label">Name <span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control input-sm required" id="name" name="name" placeholder="Name">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Description</label>
                    <div class="col-sm-10">
                        <textarea class="form-control input-sm" id="description" name="description" placeholder="Description" rows="3"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Access &amp; Permissions</label>
                    <div class="col-sm-10">
                        <div id="tree"></div>
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
<script type="text/javascript" src="<?php echo e(asset('themes/plugins/fancytree/jquery.fancytree-all.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentjs'); ?>
<script type="text/javascript">
$(function() {
    // init before plugins
    var menus = [];
    <?php if(isset($menus)): ?>
        <?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
    menus.push('<?php echo e($m->id); ?>');
        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
    <?php endif; ?>
    var perms = [];
    <?php if(isset($perms)): ?>
        <?php $__currentLoopData = $perms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
    perms.push('<?php echo e($p->id); ?>');
        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
    <?php endif; ?>
    // init plugins
    $('#tree').fancytree({
        clickFolderMode : 2,
        selectMode      : 3,
        checkbox        : true,
        source: {
            url: '<?php echo e(url('roles/tree')); ?>',
            cache: false
        },
        renderNode: function(event, data) {
            var node = data.node;
            var nodeSpan = $(node.span);
            if(!nodeSpan.data('rendered')) {
                if(node.data.perms!==undefined) {
                    // render inputs
                    var inputs = '';
                    $.each(node.data.perms, function(index, item) {
                        inputs += '<input type="checkbox" name="perms[]" value="'+ index +'" '+ ($.inArray(index,perms)>=0?'checked="checked"':'') +'/>&nbsp;'+
                            item +'&nbsp;&nbsp;&nbsp;&nbsp;';
                    });
                    // render Span
                    var spanBtn = $('<span class="fancytree-buttons pl20 fs11"></span>');
                    spanBtn.append(inputs);
                    // append elements
                    nodeSpan.append(spanBtn);
                }
                if($.inArray(node.key, menus)>=0) {
                    node.setSelected(true);
                }
                nodeSpan.data('rendered', true);
            }
        }
    });
    // init data
    <?php if(isset($data)): ?>
    $('#id').val('<?php echo e($data->id); ?>');
    $('#name').val('<?php echo e($data->name); ?>');
    $('#description').val('<?php echo e($data->description); ?>');
    <?php endif; ?>
    <?php if(old('name')): ?>
    $('#id').val('<?php echo e(old('id')); ?>');
    $('#name').val('<?php echo e(old('name')); ?>');
    $('#description').val('<?php echo e(old('description')); ?>');
    <?php endif; ?>
    // event
    $('#btn-submit').click(function() {
        var isValid = true,
            form = $('#form-input');
        $.each($('.required'), function() {
            isValid &= $(this).val()!=='';
        });
        if(isValid) {
            var treeData = $.map($('#tree').fancytree('getTree').getSelectedNodes(), function(node) {
                return node.key;
            });
            for(var iLoop=0; iLoop<treeData.length; iLoop++) {
                form.append(
                    '<input type="hidden" name="menus[]" value="'+ treeData[iLoop] +'"/>'
                );
            }
            form.attr('method', 'post');
            form.attr('action', '<?php echo e(isset($data) ? url('roles/update') : url('roles/save')); ?>');
            form.submit();
        } else {
            alert('Please check your input!');
        }
    });
});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>