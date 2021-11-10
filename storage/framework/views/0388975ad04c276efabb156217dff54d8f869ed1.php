<?php $__env->startPush('head-script'); ?>
    <link rel="stylesheet" href="//cdn.datatables.net/fixedheader/3.1.5/css/fixedHeader.bootstrap.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">    <link rel="stylesheet" href="<?php echo e(asset('assets/node_modules/html5-editor/bootstrap-wysihtml5.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/node_modules/bootstrap-datepicker/bootstrap-datepicker.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/node_modules/multiselect/css/multi-select.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/iCheck/all.css')); ?>">

    <style>
        .mb-20{
            margin-bottom: 20px
        }
        .datepicker{
            z-index: 9999 !important;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php if (\Entrust::can('add_job_applications')) : ?>
<?php $__env->startSection('create-button'); ?>
    <a href="<?php echo e(route('admin.job-applications.create')); ?>" class="btn btn-dark btn-sm m-l-15"><i class="fa fa-plus-circle"></i> Buat Baru</a>
<?php $__env->stopSection(); ?>
<?php endif; // Entrust::can ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row clearfix">
                        <div class="col-md-12 mb-20">
                            <a href="javascript:;" id="toggle-filter" class="btn btn-outline btn-success btn-sm toggle-filter"><i
                                        class="fa fa-sliders"></i> Hasil Filter</a>
                            <a href="<?php echo e(route('admin.job-applications.index')); ?>" class="btn btn-outline btn-primary btn-sm">
                                <i class="fa fa-columns"></i> Tampilan Tabel
                            </a>
                            <a href="<?php echo e(route('admin.application-setting.index').'#mail-setting'); ?>" class="btn btn-sm btn-info">
                                <i class="fa fa-envelope-o"></i>
                                Pengaturan Mail
                            </a>
                            <a class="pull-right" onclick="exportJobApplication()" ><button class="btn btn-sm btn-primary" type="button">
                                    <i class="fa fa-upload"></i>  Export
                                </button></a>
                        </div>
                    </div>
                    <div class="row b-b b-t mb-3" style="display: none; background: #fbfbfb;" id="ticket-filters">
                        <div class="col-md-12">
                            <h4 class="mt-2">Filter Berdasarkan <a href="javascript:;" class="pull-right toggle-filter"><i class="fa fa-times-circle-o"></i></a></h4>
                        </div>
                        <div class="col-md-12">
                            <form id="filter-form" class="row" >
                                <div class="col-md-4">
                                    <div class="example">
                                        <div class="input-daterange input-group" id="date-range">
                                            <input type="text" class="form-control" id="start-date" placeholder="Show Results From" value="" autocomplete="off" />
                                            <span class="input-group-addon bg-info b-0 text-white p-1"><?php echo app('translator')->get('app.to'); ?></span>
                                            <input type="text" class="form-control" id="end-date" placeholder="Show Results To" value="" autocomplete="off" />
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <select class="select2" name="status" id="status" data-style="form-control">
                                            <option value="all">Semua Status</option>
                                            <?php $__empty_1 = true; $__currentLoopData = $boardColumns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                <option value="<?php echo e($status->id); ?>"><?php echo e(ucfirst($status->status)); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                            <?php endif; ?>
                                        </select>
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
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <select class="select2" name="location" id="location" data-style="form-control">
                                            <option value="all">Semua Lokasi</option>
                                            <?php $__empty_1 = true; $__currentLoopData = $locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $location): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                <option value="<?php echo e($location->id); ?>"><?php echo e(ucfirst($location->location)); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                            <?php endif; ?>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <select class="select2" name="skill[]" data-placeholder="Select Skills" multiple="multiple" id="skill" data-style="form-control">
                                            <?php $__empty_1 = true; $__currentLoopData = $skills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                <option value="<?php echo e($skill->id); ?>"><?php echo e(ucfirst($skill->name)); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                            <?php endif; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <button type="button" id="apply-filters" class="btn btn-sm btn-success"><i class="fa fa-check"></i> Terapkan</button>
                                        <button type="button" id="reset-filters" class="btn btn-sm btn-dark"><i class="fa fa-refresh"></i> Atur Ulang</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="table-responsive m-t-40">
                        <table id="myTable" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Pelamar</th>
                                <th>Pekerjaan</th>
                                <th>Lokasi</th>
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
    <script src="<?php echo e(asset('assets/node_modules/select2/dist/js/select2.full.min.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('assets/node_modules/bootstrap-select/bootstrap-select.min.js')); ?>" type="text/javascript"></script>
    <script src="//cdn.datatables.net/fixedheader/3.1.5/js/dataTables.fixedHeader.min.js"></script>
    <script src="//cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="//cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
    <script src="<?php echo e(asset('assets/node_modules/moment/moment.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('assets/node_modules/multiselect/js/jquery.multi-select.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/plugins/iCheck/icheck.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/node_modules/bootstrap-datepicker/bootstrap-datepicker.min.js')); ?>" type="text/javascript"></script>

    <script>

        $('#start-date').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true
        })
        $('#end-date').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true
        })

        $('#start-date').datepicker().on('changeDate', function(e) {
            $('#end-date').datepicker('setStartDate', $(this).datepicker('getDate'));
        });

        $('#end-date').datepicker().on('changeDate', function(e) {
            $('#start-date').datepicker('setEndDate', $(this).datepicker('getDate'));
        });

        var table;
        tableLoad('load');
        // For select 2
        $(".select2").select2({
            width: '100%'
        });
        $('#reset-filters').click(function () {
            $('#filter-form')[0].reset();
            $('#filter-form').find('select').select2('render');
            tableLoad('load');
        })
        $('#apply-filters').click(function () {
            tableLoad('filter');
        });

        function tableLoad(type) {
            var status = $('#status').val();
            var jobs = $('#jobs').val();
            var location = $('#location').val();
            var   startDate = $('#start-date').val();
            var   endDate = $('#end-date').val();

            table = $('#myTable').dataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                destroy: true,
                ajax: '<?php echo route('admin.job-applications.data'); ?>?status='+status+'&location='+location+'&startDate='+startDate+'&endDate='+endDate+'&jobs='+jobs,
                language: languageOptions(),
                "fnDrawCallback": function (oSettings) {
                    $("body").tooltip({
                        selector: '[data-toggle="tooltip"]'
                    });
                },
                order: [['1', 'ASC']],
                columns: [
                    { data: 'DT_Row_Index', sortable:false, searchable: false },
                    {data: 'full_name', name: 'full_name', width: '17%'},
                    {data: 'title', name: 'title', width: '17%'},
                    {data: 'location', name: 'location'},
                    {data: 'status', name: 'status'},
                    {data: 'action', name: 'action', width: '15%', searchable : false}
                ]
            });
            new $.fn.dataTable.FixedHeader(table);
        }

        $('body').on('click', '.sa-params,.delete-document', function(){
            var id = $(this).data('row-id');
            const deleteDocClassPresent = $(this).hasClass('delete-document');
            const saParamsClassPresent = $(this).hasClass('sa-params');

            swal({
                title: "Apakah Anda Yakin?",
                text: "Peringatan Untuk Menghapus",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Hapus",
                cancelButtonText: "Batalkan",
                closeOnConfirm: true,
                closeOnCancel: true
            }, function(isConfirm){
                if (isConfirm) {
                    let url = '';

                    if (deleteDocClassPresent) {
                        url = "<?php echo e(route('admin.documents.destroy',':id')); ?>";
                    }
                    if (saParamsClassPresent) {
                        url = "<?php echo e(route('admin.job-applications.destroy',':id')); ?>";
                    }

                    url = url.replace(':id', id);
                    
                    var token = "<?php echo e(csrf_token()); ?>";

                    $.easyAjax({
                        type: 'POST',
                        url: url,
                        data: {'_token': token, '_method': 'DELETE'},
                        success: function (response) {
                            if (response.status == "success") {
                                $.unblockUI();
                                if (deleteDocClassPresent) {
                                    docTable._fnDraw();
                                }
                                if (saParamsClassPresent) {
                                    table._fnDraw();
                                }
                            }
                        }
                    });
                }
            });
        });

        table.on('click', '.show-detail', function () {
            $(".right-sidebar").slideDown(50).addClass("shw-rside");

            var id = $(this).data('row-id');
            var url = "<?php echo e(route('admin.job-applications.show',':id')); ?>";
            url = url.replace(':id', id);

            $.easyAjax({
                type: 'GET',
                url: url,
                success: function (response) {
                    if (response.status == "success") {
                        $('#right-sidebar-content').html(response.view);
                    }
                }
            });
        });

        $('.toggle-filter').click(function () {
            $('#ticket-filters').toggle('slide');
        });

        $('body').on('click', '.show-document', function() {
            const type = $(this).data('modal-name');
            const id = $(this).data('row-id');

            const url = "<?php echo e(route('admin.documents.index')); ?>?documentable_type="+type+"&documentable_id="+id;

            $.ajaxModal('#application-lg-modal', url);
        })

        function exportJobApplication(){
            var startDate;
            var endDate;
            var status = $('#status').val();
            var jobs = $('#jobs').val();
            var location = $('#location').val();

             startDate = $('#start-date').val();
             endDate = $('#end-date').val();

            if(startDate == '' || startDate == null){
                startDate = 0;
            }

            if(endDate == '' || endDate == null){
                endDate = 0;
            }

            var url = '<?php echo e(route('admin.job-applications.export', [':status',':location', ':startDate', ':endDate', ':jobs'])); ?>';
            url = url.replace(':status', status);
            url = url.replace(':location', location);
            url = url.replace(':startDate', startDate);
            url = url.replace(':endDate', endDate);
            url = url.replace(':jobs', jobs);

            window.location.href = url;
        }

    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\kuliah\Belajar\web\laravel\SiRekrutV1\resources\views/admin/job-applications/index.blade.php ENDPATH**/ ?>