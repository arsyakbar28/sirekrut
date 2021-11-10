<div class="modal-header">
    <h4 class="modal-title"><?php echo app('translator')->get('modules.roles.addRole'); ?></h4>
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
</div>
<div class="modal-body">
 
    <form id="createProjectCategory" class="ajax-form" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        <div class="form-body">
            <div class="row">
                <div class="col-sm-12 ">
                    <div class="form-group">
                        <label><?php echo app('translator')->get('modules.permission.roleName'); ?></label>
                    <input type="text" name="name" id="name" class="form-control" value="<?php echo e($role->name); ?>">
                    </div>
                </div>
            </div>
        </div>
        <div class="form-actions">
            <button type="button" id="save-category" class="btn btn-success"> <i class="fa fa-check"></i> <?php echo app('translator')->get('app.save'); ?></button>
        </div>
    </form></div>

<script>


    $('#save-category').click(function () {
        $.easyAjax({
            url: '<?php echo e(route("admin.role-permission.update", $role->id)); ?>',
            container: '#createProjectCategory',
            type: "POST",
            data: $('#createProjectCategory').serialize(),
            success: function (response) {
                if(response.status == 'success'){
                    window.location.reload();
                }
            }
        })
    });

</script><?php /**PATH D:\kuliah\Belajar\web\laravel\SiRekrutV1\resources\views/admin/role-permission/edit.blade.php ENDPATH**/ ?>