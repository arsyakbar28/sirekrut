<?php $__env->startPush('head-script'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/jQueryUI/jquery-ui.min.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <?php if(!$user->mobile_verified && $smsSettings->nexmo_status == 'active'): ?>
        <div id="verify-mobile-info" class="col-md-12">
            <div class="alert alert-info col-md-12" role="alert">
                <div class="row">
                    <div class="col-md-10 d-flex align-items-center">
                        <i class="fa fa-info fa-3x mr-2"></i>
                        <?php echo app('translator')->get('messages.info.verifyAlert'); ?>
                    </div>
                    <div class="col-md-2 d-flex align-items-center justify-content-end">
                        <a href="<?php echo e(route('admin.profile.index')); ?>" class="btn btn-warning">
                            Profile
                        </a>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <div class="row ">

        <div class="col">
            <div class="row">
                <!-- Column -->
                <div class="col-md-6">
                    <a href="<?php echo e(route('admin.company.index')); ?>" target="_blank">
                        <div class="card">
                            <div class="box bg-dark text-center rounded">
                                <h1 class="font-light text-white"><?php echo e($totalCompanies); ?></h1>
                                <h6 class="text-white">Total Perusahaan</h6>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- Column -->
                <div class="col-md-6">
                    <a href="<?php echo e(route('admin.jobs.index')); ?>" target="_blank">
                        <div class="card">
                            <div class="box bg-info text-center rounded">
                                <h1 class="font-light text-white"><?php echo e($totalOpenings); ?></h1>
                                <h6 class="text-white">Total Pekerjaan Tersedia</h6>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- Column -->
                <div class="col-md-6">
                    <a href="<?php echo e(route('admin.job-applications.index')); ?>" target="_blank">
                        <div class="card">
                            <div class="box bg-primary text-center rounded">
                                <h1 class="font-light text-white"><?php echo e($totalApplications); ?></h1>
                                <h6 class="text-white"><?php echo app('translator')->get('modules.dashboard.totalApplications'); ?></h6>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- Column -->
                <div class="col-md-6">
                    <a href="<?php echo e(route('admin.job-applications.index')); ?>" target="_blank">
                        <div class="card">
                            <div class="box bg-success text-center rounded">
                                <h1 class="font-light text-white"><?php echo e($totalHired); ?></h1>
                                <h6 class="text-white">Total Diterima</h6>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- Column -->
                <div class="col-md-6">
                    <a href="<?php echo e(route('admin.job-applications.index')); ?>" target="_blank">
                        <div class="card">
                            <div class="box bg-danger text-center rounded">
                                <h1 class="font-light text-white"><?php echo e($totalRejected); ?></h1>
                                <h6 class="text-white">Total Ditolak</h6>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- Column -->
                <div class="col-md-6">
                    <a href="<?php echo e(route('admin.job-applications.index')); ?>" target="_blank">
                        <div class="card">
                            <div class="box bg-dark text-center rounded">
                                <h1 class="font-light text-white"><?php echo e($newApplications); ?></h1>
                                <h6 class="text-white"><?php echo app('translator')->get('modules.dashboard.newApplications'); ?></h6>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- Column -->
                <div class="col-md-6">
                    <a href="<?php echo e(route('admin.job-applications.index')); ?>" target="_blank">
                        <div class="card">
                            <div class="box bg-warning text-center rounded">
                                <h1 class="font-light text-white"><?php echo e($shortlisted); ?></h1>
                                <h6 class="text-white"><?php echo app('translator')->get('modules.dashboard.shortlistedCandidates'); ?></h6>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- Column -->
                <div class="col-md-6">
                    <a href="<?php echo e(route('admin.interview-schedule.index')); ?>" target="_blank">
                        <div class="card">
                            <div class="box bg-primary text-center rounded">
                                <h1 class="font-light text-white"><?php echo e($totalTodayInterview); ?></h1>
                                <h6 class="text-white">Interview Hari ini</h6>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <?php if($user->roles->count() > 0): ?>
            <div class="col">
                <div class="row">
                    <div class="col-md-12" id="todo-items-list">

                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('footer-script'); ?>
    <script src="<?php echo e(asset('assets/plugins/jQueryUI/jquery-ui.min.js')); ?>"></script>

    <script>
        var updated = true;

        function showNewTodoForm() {
            let url = "<?php echo e(route('admin.todo-items.create')); ?>"

            $.ajaxModal('#application-md-modal', url);
        }

        function initSortable() {
            let updates = {'pending-tasks': false, 'completed-tasks': false};
            let completedFirstPosition = $('#completed-tasks').find('li.draggable').first().data('position');
            let pendingFirstPosition = $('#pending-tasks').find('li.draggable').first().data('position');

            $('#pending-tasks').sortable({
                connectWith: '#completed-tasks',
                cursor: 'move',
                handle: '.handle',
                stop: function (event, ui) {
                    const id = ui.item.data('id');
                    const oldPosition = ui.item.data('position');

                    if (updates['pending-tasks']===true && updates['completed-tasks']===true)
                    {
                        const inverseIndex =  completedFirstPosition > 0 ? completedFirstPosition - ui.item.index() + 1 : 1;
                        const newPosition = inverseIndex;

                        updateTodoItem(id, position={oldPosition, newPosition}, status='completed');

                    }
                    else if(updates['pending-tasks']===true && updates['completed-tasks']===false)
                    {
                        const newPosition = pendingFirstPosition - ui.item.index();

                        updateTodoItem(id, position={oldPosition, newPosition});
                    }

                    //finally, clear out the updates object
                    updates['pending-tasks']=false;
                    updates['completed-tasks']=false;
                },
                update: function (event, ui) {
                    updates[$(this).attr('id')] = true;
                }
            }).disableSelection();

            $('#completed-tasks').sortable({
                connectWith: '#pending-tasks',
                cursor: 'move',
                handle: '.handle',
                stop: function (event, ui) {
                    const id = ui.item.data('id');
                    const oldPosition = ui.item.data('position');

                    if (updates['pending-tasks']===true && updates['completed-tasks']===true)
                    {
                        const inverseIndex =  pendingFirstPosition > 0 ? pendingFirstPosition - ui.item.index() + 1 : 1;
                        const newPosition = inverseIndex;

                        updateTodoItem(id, position={oldPosition, newPosition}, status='pending');
                    }
                    else if(updates['pending-tasks']===false && updates['completed-tasks']===true)
                    {
                        const newPosition = completedFirstPosition - ui.item.index();

                        updateTodoItem(id, position={oldPosition, newPosition});
                    }

                    //finally, clear out the updates object
                    updates['pending-tasks']=false;
                    updates['completed-tasks']=false;
                },
                update: function (event, ui) {
                    updates[$(this).attr('id')] = true;
                }
            }).disableSelection();
        }

        function updateTodoItem(id, pos, status=null) {
            let data = {
                _token: '<?php echo e(csrf_token()); ?>',
                id: id,
                position: pos,
            };

            if (status) {
                data = {...data, status: status}
            }

            $.easyAjax({
                url: "<?php echo e(route('admin.todo-items.updateTodoItem')); ?>",
                type: 'POST',
                data: data,
                container: '#todo-items-list',
                success: function (response) {
                    $('#todo-items-list').html(response.view);
                    initSortable();
                }
            });
        }

        function showUpdateTodoForm(id) {
            let url = "<?php echo e(route('admin.todo-items.edit', ':id')); ?>"
            url = url.replace(':id', id);

            $.ajaxModal('#application-md-modal', url);
        }

        function deleteTodoItem(id) {
            swal({
                title: "<?php echo app('translator')->get('errors.areYouSure'); ?>",
                text: "<?php echo app('translator')->get('errors.deleteWarning'); ?>",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "<?php echo app('translator')->get('app.delete'); ?>",
                cancelButtonText: "<?php echo app('translator')->get('app.cancel'); ?>",
                closeOnConfirm: true,
                closeOnCancel: true
            }, function(isConfirm){
                if (isConfirm) {
                    let url = "<?php echo e(route('admin.todo-items.destroy', ':id')); ?>";
                    url = url.replace(':id', id);

                    let data = {
                        _token: '<?php echo e(csrf_token()); ?>',
                        _method: 'DELETE'
                    }

                    $.easyAjax({
                        url,
                        data,
                        type: 'POST',
                        container: '#roleMemberTable',
                        success: function (response) {
                            if (response.status == 'success') {
                                $('#todo-items-list').html(response.view);
                                initSortable();
                            }
                        }
                    })
                }
            });
        }

        <?php if($user->roles->count() > 0): ?>
            $('#todo-items-list').html(`<?php echo $todoItemsView; ?>`);
        <?php endif; ?>

        initSortable();

        $('body').on('click', '#create-todo-item', function () {
            $.easyAjax({
                url: "<?php echo e(route('admin.todo-items.store')); ?>",
                container: '#createTodoItem',
                type: "POST",
                data: $('#createTodoItem').serialize(),
                success: function (response) {
                    if(response.status == 'success'){
                        $('#todo-items-list').html(response.view);
                        initSortable();

                        $('#application-md-modal').modal('hide');
                    }
                }
            })
        });

        $('body').on('click', '#update-todo-item', function () {
            const id = $(this).data('id');
            let url = "<?php echo e(route('admin.todo-items.update', ':id')); ?>"
            url = url.replace(':id', id);

            $.easyAjax({
                url: url,
                container: '#editTodoItem',
                type: "POST",
                data: $('#editTodoItem').serialize(),
                success: function (response) {
                    if(response.status == 'success'){
                        $('#todo-items-list').html(response.view);
                        initSortable();

                        $('#application-md-modal').modal('hide');
                    }
                }
            })
        });

        $('body').on('change', '#todo-items-list input[name="status"]', function () {
            const id = $(this).data('id');
            let status = 'pending';

            if ($(this).is(':checked')) {
                status = 'completed';
            }

            updateTodoItem(id, null, status);
        })
    </script>
    <script>
        <?php if(\Froiden\Envato\Functions\EnvatoUpdate::showReview()): ?>
        $(document).ready(function () {
            $('#reviewModal').modal('show');
        })
        function hideReviewModal(type) {
            var url = "<?php echo e(route('hide-review-modal',':type')); ?>";
            url = url.replace(':type', type);

            $.easyAjax({
                url: url,
                type: "GET",
                container: "#reviewModal",
            });
        }
        <?php endif; ?>
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SiRekrutV1\resources\views/admin/dashboard/index.blade.php ENDPATH**/ ?>