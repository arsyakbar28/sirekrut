<?php $__env->startPush('head-script'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/node_modules/switchery/dist/switchery.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/node_modules/icheck/skins/all.css')); ?>">
    <link href="<?php echo e(asset('assets/node_modules/select2/dist/css/select2.min.css')); ?>" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="<?php echo e(asset('assets/node_modules/bootstrap-select/bootstrap-select.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/node_modules/multiselect/css/multi-select.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="col-sm-12">
                        <a href="javascript:;" id="addRole" class="btn btn-success btn-sm btn-outline  waves-effect waves-light "><i class="fa fa-gear"></i> Tambahkan Peran</a>
                    </div>

                    <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-12 b-all mt-2">
                            <div class="row">
                                <div class="col-md-4 text-center p-2 bg-dark ">
                                    <h5 class="text-white mt-2 mb-2"><strong><?php echo e(ucwords($role->display_name)); ?></strong></h5>
                                </div>
                                <div class="col-md-4 text-center bg-dark role-members">
                                    
                                </div>
                                <div class="col-md-4 p-2 bg-dark" style="padding-bottom: 11px !important;">
                                    <button class="btn btn-default btn-sm btn-rounded pull-right toggle-permission" data-role-id="<?php echo e($role->id); ?>"><i class="fa fa-key"></i> Permissions</button>
                                </div>


                                <div class="col-md-12 b-t permission-section" style="display: none;" id="role-permission-<?php echo e($role->id); ?>" >
                                    <table class="table ">
                                        <thead>
                                        <tr class="bg-white">
                                            <th>
                                                <div class="form-group">
                                                    <input type="checkbox" value="<?php echo e($role->id); ?>" class=" select_all_permission" id="select_all_permission_<?php echo e($role->id); ?>"
                                                           <?php if(count($role->permissions) == $totalPermissions): ?> checked <?php endif; ?>
                                                    >
                                                    <label for="select_all_permission_<?php echo e($role->id); ?>"><?php echo app('translator')->get('modules.permission.selectAll'); ?></label>
                                                </div>
                                            </th>
                                            <th><?php echo app('translator')->get('app.add'); ?></th>
                                            <th><?php echo app('translator')->get('app.view'); ?></th>
                                            <th><?php echo app('translator')->get('app.update'); ?></th>
                                            <th><?php echo app('translator')->get('app.delete'); ?></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $__currentLoopData = $modules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $module): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e(ucwords($module->module_name)); ?>


                                                    <?php if($module->description != ''): ?>
                                                        <a class="mytooltip" href="javascript:void(0)"> <i class="fa fa-info-circle"></i><span class="tooltip-content5"><span class="tooltip-text3"><span class="tooltip-inner2"><?php echo e($module->description); ?></span></span></span></a>
                                                    <?php endif; ?>
                                                </td>

                                                <?php $__currentLoopData = $module->permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <td>
                                                        <div class="switchery-demo">
                                                            <input type="checkbox"
                                                                   <?php if($role->hasPermission([$permission->name])): ?>
                                                                   checked
                                                                   <?php endif; ?>
                                                                   class="js-switch assign-role-permission permission_<?php echo e($role->id); ?>" data-size="small" data-color="#00c292" data-permission-id="<?php echo e($permission->id); ?>" data-role-id="<?php echo e($role->id); ?>" />
                                                        </div>
                                                    </td>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                <?php if(count($module->permissions) < 4): ?>
                                                    <?php for($i=1; $i<=(4-count($module->permissions)); $i++): ?>
                                                        <td>&nbsp;</td>
                                                    <?php endfor; ?>
                                                <?php endif; ?>

                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
    
    <div class="modal fade bs-modal-md in" id="managePermissionModal" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" id="modal-data-application">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <span class="caption-subject font-red-sunglo bold uppercase" id="modelHeading"></span>
                </div>
                <div class="modal-body">
                    Loading...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn blue">Save changes</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    
<?php $__env->stopSection(); ?>

<?php $__env->startPush('footer-script'); ?>
    <script src="<?php echo e(asset('assets/node_modules/switchery/dist/switchery.min.js')); ?>"></script>
    <script>
        $(function () {
            $('.assign-role-permission').on('change', assignRollPermission);
        });

        $('.toggle-permission').click(function () {
            var roleId = $(this).data('role-id');
            $('#role-permission-'+roleId).toggle();
        })

        // Switchery
        var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
        $('.js-switch').each(function() {
            new Switchery($(this)[0], $(this).data());
        });

        // Initialize multiple switches
        var animating = false;
        var masteranimate = false;

        var assignRollPermission = function () {

            var roleId = $(this).data('role-id');
            var permissionId = $(this).data('permission-id');

            if($(this).is(':checked'))
                var assignPermission = 'yes';
            else
                var assignPermission = 'no';

            var url = '<?php echo e(route('admin.role-permission.store')); ?>';

            $.easyAjax({
                url: url,
                type: "POST",
                data: { 'roleId': roleId, 'permissionId': permissionId, 'assignPermission': assignPermission, '_token': '<?php echo e(csrf_token()); ?>' }
            })
        };

        $('.assign-role-permission').change(assignRollPermission());

        $('.select_all_permission').change(function () {
            if($(this).is(':checked')){
                var roleId = $(this).val();
                var url = '<?php echo e(route('admin.role-permission.assignAllPermission')); ?>';

                $.easyAjax({
                    url: url,
                    type: "POST",
                    data: { 'roleId': roleId, '_token': '<?php echo e(csrf_token()); ?>' },
                    success: function () {
                        masteranimate = true;
                        if (!animating){
                            var masterStatus = true;
                            $('.assign-role-permission').off('change');
                            $('input.permission_'+roleId).each(function(index){
                                var switchStatus = $('input.permission_'+roleId)[index].checked;
                                if(switchStatus != masterStatus){
                                    $(this).trigger('click');
                                }
                            });
                            $('.assign-role-permission').on('change', assignRollPermission);
                        }
                        masteranimate = false;
                    }
                })
            }
            else{
                var roleId = $(this).val();
                var url = '<?php echo e(route('admin.role-permission.removeAllPermission')); ?>';

                $.easyAjax({
                    url: url,
                    type: "POST",
                    data: { 'roleId': roleId, '_token': '<?php echo e(csrf_token()); ?>' },
                    success: function () {
                        masteranimate = true;
                        if (!animating){
                            var masterStatus = false;
                            $('.assign-role-permission').off('change');
                            $('input.permission_'+roleId).each(function(index){
                                var switchStatus = $('input.permission_'+roleId)[index].checked;
                                if(switchStatus != masterStatus){
                                    $(this).trigger('click');
                                }
                            });
                            $('.assign-role-permission').on('change', assignRollPermission);
                        }
                        masteranimate = false;
                    }
                })
            }
        })

        $('.show-members').click(function () {
            var id = $(this).data('role-id');
            var url = '<?php echo e(route('admin.role-permission.showMembers', ':id')); ?>';
            url = url.replace(':id', id);

            $('#modelHeading').html('Role Members');
            $.ajaxModal('#managePermissionModal', url);
        })

        $('#addRole').click(function () {
            var url = '<?php echo e(route('admin.role-permission.create')); ?>';

            $('#modelHeading').html('Role Members');
            $.ajaxModal('#managePermissionModal', url);
        })
    </script>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\kuliah\Belajar\web\laravel\SiRekrutV1\resources\views/admin/role-permission/index.blade.php ENDPATH**/ ?>