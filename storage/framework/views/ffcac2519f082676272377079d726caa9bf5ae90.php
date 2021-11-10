<?php if (\Entrust::can('add_job_applications')) : ?>
<?php $__env->startSection('create-button'); ?>
    <a href="<?php echo e(route('admin.job-applications.create')); ?>" class="btn btn-dark btn-sm m-l-15"><i
                class="fa fa-plus-circle"></i> Buat Baru</a>
<?php $__env->stopSection(); ?>
<?php endif; // Entrust::can ?>

<?php $__env->startPush('head-script'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/jQueryUI/jquery-ui.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/lobipanel/dist/css/lobipanel.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/node_modules/bootstrap-datepicker/bootstrap-datepicker.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/node_modules/multiselect/css/multi-select.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/jquery-bar-rating-master/dist/themes/fontawesome-stars.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/node_modules/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/colorpicker/bootstrap-colorpicker.min.css')); ?>">

    <style>
        .board-column{
            /* max-width: 21%; */
        }

        .board-column .card{
            box-shadow: none;
        }
        .notify-button{
            /*width: 9em;*/
            height: 1.5em;
            font-size: 0.730rem !important;
            line-height: 0.5 !important;
        }
        .panel-scroll{
            height: calc(100vh - 330px); overflow-y: scroll
        }
        .mb-20{
            margin-bottom: 20px
        }
        .datepicker{
            z-index: 9999 !important;
        }
        .d-block{
            display: block;
        }
        .upcomingdata {
            height: 37.5rem;
            overflow-x: scroll;
        }
        .notify-button{
            height: 1.5em;
            font-size: 0.730rem !important;
            line-height: 0.5 !important;
        }
        .scheduleul
        {
            padding: 0 15px 0 11px;
        }
        .searchInput
        {
            width: 50%; display: inline
        }
        .searchButton
        {
            margin-bottom: 4px;margin-left: 3px;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

    <div class="row mb-2">
        <div class="col-sm-6">
            <a href="javascript:;" id="toggle-filter" class="btn btn-outline btn-success btn-sm toggle-filter">
                <i class="fa fa-sliders"></i> Hasil Filter
            </a>
            <a href="<?php echo e(route('admin.job-applications.table')); ?>" class="btn btn-sm btn-primary">
                <i class="fa fa-table"></i> Tampilan Tabel
            </a>
            <a href="<?php echo e(route('admin.application-setting.index').'#mail-setting'); ?>" class="btn btn-sm btn-info">
                <i class="fa fa-envelope-o"></i>
                Pengaturan Mail
            </a>
            <a href="javascript:createApplicationStatus();" class="btn btn-sm btn-success">
                <i class="fa fa-bookmark-o"></i>
                Status Baru
            </a>
        </div>
        <div class="col-sm-6">
            <div id="search-container" class="form-group pull-right">
                <input id="search" class="form-control" type="text" name="search" placeholder="Masukkan Nama">
                <a href="javascript:;" class="d-none">
                    <i class="fa fa-times-circle-o"></i>
                </a>
            </div>
        </div>
    </div>

    <div class="container-scroll">
        <div class="card" id="ticket-filters">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <h4>Filter Berdasarkan
                            <a href="javascript:;" class="pull-right mt-2 mr-2 toggle-filter">
                                <i class="fa fa-times-circle-o"></i>
                            </a>
                        </h4>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="input-daterange input-group">
                                <input type="text" class="form-control" id="date-start" value="<?php echo e($startDate); ?>" name="start_date">
                                <span class="input-group-addon bg-info b-0 text-white p-1"><?php echo app('translator')->get('app.to'); ?></span>
                                <input type="text" class="form-control" id="date-end" name="end_date" value="<?php echo e($endDate); ?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <select class="select2" name="jobs" id="jobs" data-style="form-control">
                                <option value="all">Semua Pekerjaan</option>
                                <?php $__empty_1 = true; $__currentLoopData = $jobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <option title="<?php echo e(ucfirst($job->title)); ?>" value="<?php echo e($job->id); ?>"><?php echo e(ucfirst($job->title)); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <?php endif; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <button type="button" id="apply-filters" class="btn btn-success btn-sm"><i class="fa fa-check"></i> Terapkan</button>
                            <button type="button" id="reset-filters" class="btn btn-info btn-sm"><i class="fa fa-refresh"></i> Atur Ulang</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row container-row">
        </div>
    </div>

    
    <div class="modal fade bs-modal-md in" id="scheduleDetailModal" role="dialog" aria-labelledby="myModalLabel"
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
                    <button type="button" class="btn default" data-dismiss="modal">Tutup</button>
                    <button type="button" class="btn blue">Simpan Perubahan</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    
<?php $__env->stopSection(); ?>

<?php $__env->startPush('footer-script'); ?>
    <script src="<?php echo e(asset('assets/plugins/jQueryUI/jquery-ui.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/lobipanel/dist/js/lobipanel.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/node_modules/moment/moment.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('assets/node_modules/multiselect/js/jquery.multi-select.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/node_modules/bootstrap-datepicker/bootstrap-datepicker.min.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('assets/node_modules/select2/dist/js/select2.full.min.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('assets/node_modules/bootstrap-select/bootstrap-select.min.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('assets/plugins/jquery-bar-rating-master/dist/jquery.barrating.min.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('assets/node_modules/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('assets/plugins/colorpicker/bootstrap-colorpicker.min.js')); ?>"></script>

    <script>
        $(".select2").select2({
            width: '100%'
        });
        loadData();

        $('#apply-filters').click(function () {
            loadData();
        });

        $('#reset-filters').click(function () {
            $('#date-start').val('<?php echo e($startDate); ?>');
            $('#date-end').val('<?php echo e($endDate); ?>');
            $('#jobs').val('all').trigger('change');

            loadData();
        })
        $('#applySearch').click(function () {
            var search = $('#search').val();
            if(search !== undefined && search !== null && search !== ""){
                loadData();
            }
        })

        $('#date-end').bootstrapMaterialDatePicker({ weekStart : 0, time: false });
        $('#date-start').bootstrapMaterialDatePicker({ weekStart : 0, time: false }).on('change', function(e, date)
        {
            $('#date-end').bootstrapMaterialDatePicker('setMinDate', date);
        });
        
        // Schedule create modal view
        function createSchedule (id) {
            var url = "<?php echo e(route('admin.job-applications.create-schedule',':id')); ?>";
            url = url.replace(':id', id);
            $('#modelHeading').html('Schedule');
            $.ajaxModal('#scheduleDetailModal', url);
        }

        // Create application status modal view
        function createApplicationStatus () {
            var url = "<?php echo e(route('admin.application-status.create')); ?>";

            $('#modelHeading').html('Application Status');
            $.ajaxModal('#scheduleDetailModal', url);
        }

        function deleteStatus(id) {
            const panels = $('.board-column[data-column-id="' + id + '"').find('.lobipanel.show-detail');
            let applicationIds = [];
            panels.each((ind, element) => {
                applicationIds.push($(element).data('application-id'));
            });

            swal({
                title: "Apakah Anda Yakin?",
                text: "Hapus Status Peringatan",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Hapus",
                cancelButtonText: "Batalkan",
                closeOnConfirm: true,
                closeOnCancel: true
            }, function(isConfirm){
                if (isConfirm) {
                    let url = "<?php echo e(route('admin.application-status.destroy', ':id')); ?>";
                    url = url.replace(':id', id);

                    let data = {
                        _token: '<?php echo e(csrf_token()); ?>',
                        _method: 'DELETE',
                        applicationIds: applicationIds
                    }

                    $.easyAjax({
                        url,
                        data,
                        type: 'POST',
                        container: '.container-row',
                        success: function (response) {
                            if (response.status == 'success') {
                                loadData();
                            }
                        }
                    })
                }
            });
        }

        function editStatus(id) {
            var url = "<?php echo e(route('admin.application-status.edit', ':id')); ?>";
            url = url.replace(':id', id);

            $('#modelHeading').html('Application Status');
            $.ajaxModal('#scheduleDetailModal', url);
        }

        function saveStatus() {
            $.easyAjax({
                url: "<?php echo e(route('admin.application-status.store')); ?>",
                container: '#createStatus',
                type: "POST",
                data: $('#createStatus').serialize(),
                success: function (response) {
                    $('#scheduleDetailModal').modal('hide');
                    loadData();
                }
            });
        }

        function updateStatus(id) {
            let url = "<?php echo e(route('admin.application-status.update', ':id')); ?>";
            url = url.replace(':id', id);

            $.easyAjax({
                url: url,
                container: '#updateStatus',
                type: "POST",
                data: $('#updateStatus').serialize(),
                success: function (response) {
                    $('#scheduleDetailModal').modal('hide');
                    loadData();
                }
            });
        }

        function loadData () {
            var startDate = $('#date-start').val();
            var jobs = $('#jobs').val();
            var search = $('#search').val();

            if (startDate == '') {
                startDate = null;
            }

            var endDate = $('#date-end').val();

            if (endDate == '') {
                endDate = null;
            }

            var url = '<?php echo e(route('admin.job-applications.index')); ?>?startDate=' + startDate + '&endDate=' + endDate + '&jobs=' + jobs + '&search=' + search;

            $.easyAjax({
                url: url,
                container: '.container-row',
                type: "GET",
                success: function (response) {
                    $('.container-row').html(response.view);
                }

            })
        }

        search($('#search'), 500, 'data');

        $('.toggle-filter').click(function () {
            $('#ticket-filters').toggle('slide');
        });
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\kuliah\Belajar\web\laravel\SiRekrutV1\resources\views/admin/job-applications/board.blade.php ENDPATH**/ ?>