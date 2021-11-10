<div class="modal-header">
    <h4 class="modal-title"><?php echo app('translator')->get('modules.roles.addRole'); ?></h4>
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
</div>
<div class="modal-body">
    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>Role</th>
                <th><?php echo app('translator')->get('app.action'); ?></th>
            </tr>
            </thead>
            <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr id="role-<?php echo e($role->id); ?>">
                    <td><?php echo e($key+1); ?></td>
                    <td><?php echo e(ucwords($role->name)); ?></td>
                    <td>
                        <a href="javascript:;" data-role-id="<?php echo e($role->id); ?>" class="btn btn-sm btn-info btn-rounded edit-category"><?php echo app('translator')->get("app.edit"); ?></a>
                        <?php if($role->id > 1): ?>
                            <a href="javascript:;" data-role-id="<?php echo e($role->id); ?>" class="btn btn-sm btn-danger btn-rounded delete-category"><?php echo app('translator')->get("app.remove"); ?></a>
                        <?php else: ?>
                            <span class="text-danger"><?php echo app('translator')->get('messages.defaultRoleCantDelete'); ?></span>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="3"><?php echo app('translator')->get('messages.noRoleFound'); ?></td>
                </tr>
            <?php endif; ?>
            </tbody>
        </table>
    </div>

    <hr>
    <form id="createProjectCategory" class="ajax-form" method="POST">
        <?php echo csrf_field(); ?>
        <div class="form-body">
            <div class="row">
                <div class="col-sm-12 ">
                    <div class="form-group">
                        <label><?php echo app('translator')->get('modules.permission.roleName'); ?></label>
                        <input type="text" name="name" id="name" class="form-control">
                    </div>
                </div>
            </div>
        </div>
        <div class="form-actions">
            <button type="button" id="save-category" class="btn btn-success"> <i class="fa fa-check"></i> <?php echo app('translator')->get('app.save'); ?></button>
        </div>
    </form></div>

<script>

    $('.delete-category').click(function () {
        var roleId = $(this).data('role-id');
        var url = "<?php echo e(route('admin.role-permission.deleteRole')); ?>";

        var token = "<?php echo e(csrf_token()); ?>";

        $.easyAjax({
            type: 'POST',
            url: url,
            data: {'_token': token, 'roleId': roleId},
            success: function (response) {
                if (response.status == "success") {
                    $.unblockUI();
//                                    swal("Deleted!", response.message, "success");
                    window.location.reload();
                }
            }
        });
    });

    $('#save-category').click(function () {
        $.easyAjax({
            url: '<?php echo e(route('admin.role-permission.storeRole')); ?>',
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

    $('.edit-category').click(function () {
        var id = $(this).data('role-id');
        var url = '<?php echo e(route("admin.role-permission.edit", ":id")); ?>';
        url = url.replace(':id', id);

        $('#modelHeading').html('Role Members');
        $.ajaxModal('#managePermissionModal', url);
    })
</script><?php /**PATH C:\xampp\htdocs\SiRekrutV1\resources\views/admin/role-permission/create.blade.php ENDPATH**/ ?>