<?php $__env->startPush('head-script'); ?>
    <link rel="stylesheet" href="//cdn.datatables.net/fixedheader/3.1.5/css/fixedHeader.bootstrap.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('assets/node_modules/switchery/dist/switchery.min.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('create-button'); ?>
    <a href="javascript:;" id="create-language" class="btn btn-dark btn-sm m-l-15">
        <i class="fa fa-plus-circle"></i> 
        <?php echo app('translator')->get('app.createNew'); ?>
    </a>
    <a href="<?php echo e(url('/translations')); ?>" target="_blank" class="btn btn-warning btn-sm m-l-15">
        <i class="fa fa-cog"></i> 
        <?php echo app('translator')->get('app.translations'); ?>
    </a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive m-t-40">
                        <table id="langTable" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th><?php echo app('translator')->get('app.name'); ?></th>
                                <th><?php echo app('translator')->get('app.code'); ?></th>
                                <th><?php echo app('translator')->get('app.status'); ?></th>
                                <th><?php echo app('translator')->get('app.action'); ?></th>
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
    <script src="<?php echo e(asset('assets/node_modules/switchery/dist/switchery.min.js')); ?>"></script>

    <script>

        var langTable = $('#langTable').dataTable({
            responsive: true,
            // processing: true,
            serverSide: true,
            ajax: '<?php echo route('admin.language-settings.index'); ?>',
            language: languageOptions(),
            "fnDrawCallback": function( oSettings ) {
                // Switchery
                var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
                $('.js-switch').each(function () {
                    new Switchery($(this)[0], $(this).data());
                });

                $("body").tooltip({
                    selector: '[data-toggle="tooltip"]'
                });
            },
            order: [[1, 'ASC']],
            columns: [
                { data: 'DT_Row_Index'},
                { data: 'language_name', name: 'language_name' },
                { data: 'language_code', name: 'language_code' },
                { data: 'status', name: 'status' },
                { data: 'action', name: 'action' }
            ]
        });
        new $.fn.dataTable.FixedHeader( langTable );

        $('body').on('click', '.edit-language', function () {
            var id = $(this).data('row-id');
            var url = '<?php echo e(route('admin.language-settings.edit', ':id')); ?>';
            url = url.replace(':id', id);

            $('#modelHeading').html('<?php echo app('translator')->get('app.edit'); ?> <?php echo app('translator')->get('menu.language'); ?>');
            $.ajaxModal('#application-md-modal', url);
        });

        $('body').on('click', '#create-language', function () {
            var url = '<?php echo e(route('admin.language-settings.create')); ?>';

            $('#modelHeading').html('<?php echo app('translator')->get('app.createNew'); ?> <?php echo app('translator')->get('menu.language'); ?>');
            $.ajaxModal('#application-md-modal', url);
        });

        $('body').on('click', '.delete-language-row', function(){
            var id = $(this).data('row-id');

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
                    var url = "<?php echo e(route('admin.language-settings.destroy',':id')); ?>";
                    url = url.replace(':id', id);

                    var token = "<?php echo e(csrf_token()); ?>";

                    $.easyAjax({
                        type: 'POST',
                        url: url,
                        data: {'_token': token, '_method': 'DELETE'},
                        success: function (response) {
                            if (response.status == "success") {
                                $.unblockUI();
                                // swal("Deleted!", response.message, "success");
                                langTable._fnDraw();
                            }
                        }
                    });
                }
            });
        });

        $('body').on('change', '.change-language-setting', function () {
            var id = $(this).data('lang-id');

            if ($(this).is(':checked'))
                var status = 'enabled';
            else
                var status = 'disabled';

            var url = '<?php echo e(route('admin.language-settings.changeStatus', ':id')); ?>';
            url = url.replace(':id', id);
            $.easyAjax({
                url: url,
                type: "POST",
                data: {'id': id, 'status': status, '_method': 'PUT', '_token': '<?php echo e(csrf_token()); ?>'},
                success: function (response) {
                    if (response.status == 'success') {
                        langTable._fnDraw();
                    }
                }
            })
        });

    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SiRekrutV1\resources\views/admin/language-settings/index.blade.php ENDPATH**/ ?>