<?php $__env->startPush('head-script'); ?>
    <link rel="stylesheet" href="//cdn.datatables.net/fixedheader/3.1.5/css/fixedHeader.bootstrap.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('create-button'); ?>
    <a href="javascript:showNewTodoForm();" class="btn btn-dark btn-sm m-l-15"><i class="fa fa-plus-circle"></i> Buat Baru</a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive m-t-40">
                        <table id="todo-table" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Judul</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('footer-script'); ?>
    <script src="//cdn.datatables.net/fixedheader/3.1.5/js/dataTables.fixedHeader.min.js"></script>
    <script src="//cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="//cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>

    <script>
        function showNewTodoForm() {
            let url = "<?php echo e(route('admin.todo-items.create')); ?>"

            $.ajaxModal('#application-md-modal', url);
        }

        function showUpdateTodoForm(id) {
            let url = "<?php echo e(route('admin.todo-items.edit', ':id')); ?>"
            url = url.replace(':id', id);

            $.ajaxModal('#application-md-modal', url);
        }

        function updateTodoStatus(id) {
            const title = $('#status-'+id).data('title');
            let url = "<?php echo e(route('admin.todo-items.update', ':id')); ?>"
            url = url.replace(':id', id);

            let data = {
                _token: '<?php echo e(csrf_token()); ?>',
                _method: 'PUT',
                id: id,
                status: $('#status-'+id).val(),
                title: title
            }

            $.easyAjax({
                url: url,
                container: '#todo-table',
                type: "POST",
                data: data,
                success: function (response) {
                    if(response.status == 'success'){
                        $.unblockUI();
                        todoTable._fnDraw();
                    }
                }
            })
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
                                $.unblockUI();
                                todoTable._fnDraw();
                            }
                        }
                    })
                }
            });
        }

        var todoTable = $('#todo-table').dataTable({
            responsive: true,
            // processing: true,
            serverSide: true,
            ajax: '<?php echo route('admin.todo-items.index'); ?>',
            language: languageOptions(),
            "fnDrawCallback": function( oSettings ) {
                $("body").tooltip({
                    selector: '[data-toggle="tooltip"]'
                });
            },
            order: [[0, 'DESC']],
            columns: [
                { data: 'DT_Row_Index', name: 'DT_Row_Index', orderable: false, searchable: false},
                { data: 'title', name: 'title' },
                { data: 'status', name: 'status' },
                { data: 'action', name: 'action', width: '20%' }
            ]
        });
        new $.fn.dataTable.FixedHeader( todoTable );

        $('body').on('click', '#create-todo-item', function () {

            $.easyAjax({
                url: "<?php echo e(route('admin.todo-items.store')); ?>",
                container: '#createTodoItem',
                type: "POST",
                data: $('#createTodoItem').serialize(),
                success: function (response) {
                    if(response.status == 'success'){
                        $.unblockUI();
                        todoTable._fnDraw();

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
                        $.unblockUI();
                        todoTable._fnDraw();

                        $('#application-md-modal').modal('hide');
                    }
                }
            })
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\kuliah\Belajar\web\laravel\SiRekrutV1\resources\views/admin/todo-list/index.blade.php ENDPATH**/ ?>