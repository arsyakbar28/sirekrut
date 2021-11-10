<?php $__currentLoopData = $boardColumns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$column): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div id="<?php echo e(snake_case($column->status)); ?>" class="board-column p-0" data-column-id="<?php echo e($column->id); ?>" data-position="<?php echo e($column->position); ?>">
        <div class="card" style="margin-bottom:0 !important;">
            <div class="card-body">
                <h4 class="card-title pt-1 pb-1">
                    <?php echo e(ucwords($column->status)); ?>

                    <span class="badge badge-pill badge-primary text-white ml-auto" style="background: <?php echo e($column->color); ?>;" id="columnCount_<?php echo e($column->id); ?>"> 
                        <?php echo e(count($column->applications)); ?>

                    </span>
                    <span class="pull-right">
                        <a data-toggle="dropdown" href="#">
                            <i class="fa fa-ellipsis-h"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="javascript:editStatus(<?php echo e($column->id); ?>);">
                                <i class="fa fa-edit"></i> Ubah
                            </a>
                            <?php if($column->id > 5): ?>
                            <a class="dropdown-item" href="javascript:deleteStatus(<?php echo e($column->id); ?>);">
                                <i class="fa fa-trash-o"></i> Hapus
                            </a>
                            <?php endif; ?>
                        </div>
                    </span>
                </h4>
                <div class="card-text">
                    <div class="panel-body">
                        <div class="row">
                            <div class="custom-column panel-scroll">
                                <?php $__currentLoopData = $column->applications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $application): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="panel panel-default lobipanel show-detail"
                                         data-widget="control-sidebar" data-slide="true"
                                         data-row-id="<?php echo e($application->id); ?>"
                                         data-application-id="<?php echo e($application->id); ?>"
                                         data-sortable="true"
                                         style="border-color: <?php echo e($column->color); ?>;">
                                        <div class="panel-body ">
                                            <h5>
                                                <img src="<?php echo e($application->photo_url); ?>" alt="user" class="img-circle"
                                                     width="25">
                                                <?php echo e(ucwords($application->full_name)); ?></h5>
                                            <div class="stars stars-example-fontawesome">
                                                <select id="example-fontawesome_<?php echo e($application->id); ?>"
                                                        data-value="<?php echo e($application->rating); ?>"
                                                        data-id="<?php echo e($application->id); ?>"
                                                        class="example-fontawesome bar-rating" name="rating"
                                                        autocomplete="off">
                                                    <option value=""></option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                </select>
                                            </div>
                                            <h6 class="text-muted"><?php echo e(ucwords($application->job->title)); ?></h6>
                                            <div class="pt-2 pb-2 mt-3">
                                                <span class="text-dark font-14">
                                                    <?php if(!is_null($application->schedule)  && $column->id == 3): ?>
                                                        <?php echo e($application->schedule->schedule_date->format('d M, Y')); ?>

                                                    <?php else: ?>
                                                        <?php echo e($application->created_at->format('d M, Y')); ?>

                                                    <?php endif; ?>
                                                </span>
                                                <?php if (\Entrust::can('add_schedule')) : ?>
                                                <span id="buttonBox<?php echo e($column->id); ?><?php echo e($application->id); ?>"
                                                    data-timestamp="<?php if(!is_null($application->schedule)): ?><?php echo e($application->schedule->schedule_date->timestamp); ?><?php endif; ?>">

                                                    <?php if(!is_null($application->schedule) && $column->id == 3 &&
                                                    $currentDate < $application->schedule->schedule_date->timestamp): ?>
                                                        <button onclick="sendReminder(<?php echo e($application->id); ?>, 'reminder')"
                                                            type="button"
                                                            class="btn btn-sm btn-info notify-button">Pengingat</button>
                                                    <?php endif; ?>
                                                    <?php if(in_array($column->status,  ['hired', 'rejected'])): ?>
                                                        <button onclick="sendReminder(<?php echo e($application->id); ?>, 'notify', '<?php echo e($column->status); ?>')" type="button" class="btn btn-sm btn-info notify-button">Notifikasi</button>
                                                    <?php endif; ?>
                                                </span>
                                                <?php endif; // Entrust::can ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <div class="panel panel-default lobipanel" data-sortable="true"></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<script>
    $('.example-fontawesome').barrating({
        theme: 'fontawesome-stars',
        showSelectedRating: false,
        readonly: true,

    });

    $(function () {
        $('.bar-rating').each(function () {
            const val = $(this).data('value');

            $(this).barrating('set', val ? val : '');
        });
    });

    $('.example-fontawesome').barrating('set', '');

    // Send Reminder and notification to Candidate
    function sendReminder(id, type, status) {
        var msg;
        
        if (type == 'notify') {
            if (status == 'hired') {
                msg = "Kirim Notifikasi Diterima";
            } else {
                msg = "Kirim Notifikasi Ditolak";
            }
        } else {
            msg = "Kirim Pengingat Interview";
        }
        swal({
            title: "Apakah Anda Yakin?",
            text: msg,
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Ya",
            cancelButtonText: "Batalkan",
            closeOnConfirm: true,
            closeOnCancel: true
        }, function (isConfirm) {
            if (isConfirm) {

                var url = "<?php echo e(route('admin.interview-schedule.notify',[':id',':type'])); ?>";
                url = url.replace(':id', id);
                url = url.replace(':type', type);

                // update values for all tasks
                $.easyAjax({
                    url: url,
                    type: 'GET',
                    success: function (response) {
                    }
                });
            }
        });
    }

    $(function () {
        // Getting Data of all colomn and applications
        boardStracture = JSON.parse('<?php echo $boardStracture; ?>');

        var oldParentId, currentParentId, oldElementIds = [], i = 1;

        let draggingTaskId = 0;
        let draggedTaskId = 0;
        let missingElementId = 0;
        let currentApplicationId = 0;

        $('.lobipanel').on('dragged.lobiPanel', function (e, lobiPanel) {
            var $parent = $(this).parent(),
                $children = $parent.children('.show-detail');
            var pr = $(this).closest('.board-column');

            if (draggingTaskId !== 0) {
                oldParentId = pr.data('column-id');
            }
            currentParentId = pr.data('column-id');

            var boardColumnIds = [];
            var applicationIds = [];
            var prioritys = [];

            $children.each(function (ind, el) {
                boardColumnIds.push($(el).closest('.board-column').data('column-id'));
                applicationIds.push($(el).data('application-id'));
                prioritys.push($(el).index());
            });

            if (draggingTaskId !== 0) {
                boardStracture[oldParentId] = [ ...applicationIds, currentApplicationId ];
            } 
            else {
                const result = boardStracture[oldParentId].filter(el => el !== currentApplicationId);
                boardStracture[oldParentId] = result;
                boardStracture[currentParentId] = applicationIds;
            }

            if (oldParentId == 3 && currentParentId == 4) {
                $('#buttonBox' + oldParentId + currentApplicationId).show();
                var button = '<button onclick="sendReminder(' + currentApplicationId + ', \'notify\')" type="button" class="btn btn-sm btn-info notify-button">Notifikasi</button>';
                $('#buttonBox' + oldParentId + currentApplicationId).html(button);
                $('#buttonBox' + oldParentId + currentApplicationId).attr('id', 'buttonBox' + currentParentId + currentApplicationId);

            } else if (oldParentId == 4 && currentParentId == 3) {
                var timeStamp = $('#buttonBox' + oldParentId + currentApplicationId).data('timestamp');
                var currentDate = <?php echo e($currentDate); ?>;
                if (currentDate < timeStamp) {
                    $('#buttonBox' + oldParentId + currentApplicationId).show();
                    var button = '<button onclick="sendReminder(' + currentApplicationId + ', \'reminder\')" type="button" class="btn btn-sm btn-info notify-button">Pengingat</button>';
                    $('#buttonBox' + oldParentId + currentApplicationId).html(button);
                }
                $('#buttonBox' + oldParentId + currentApplicationId).attr('id', 'buttonBox' + currentParentId + currentApplicationId);
            } else {
                $('#buttonBox' + oldParentId + currentApplicationId).hide();
                $('#buttonBox' + oldParentId + currentApplicationId).attr('id', 'buttonBox' + currentParentId + currentApplicationId);
            }

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
            // update values for all tasks
            $.easyAjax({
                url: '<?php echo e(route("admin.job-applications.updateIndex")); ?>',
                type: 'POST',
                container: '.container-row',
                data: {
                    boardColumnIds: boardColumnIds,
                    applicationIds: applicationIds,
                    prioritys: prioritys,
                    startDate: startDate,
                    jobs: jobs,
                    search: search,
                    endDate: endDate,
                    draggingTaskId: draggingTaskId,
                    draggedTaskId: draggedTaskId,
                    '_token': '<?php echo e(csrf_token()); ?>'
                },
                success: function (response) {
                    if (draggedTaskId !== 0) {
                        $.each( response.columnCountByIds, function( key, value ) {
                            $('#columnCount_' + value.id).html((value.status_count));
                            $('#columnCount_' + value.id).parents('.board-column').find('.lobipanel').css('border-color', value.color);
                        });
                    }
                }
            });
            if (draggingTaskId !== 0) {
                draggedTaskId = draggingTaskId;
                draggingTaskId = 0;
            }
        }).lobiPanel({
            sortable: true,
            reload: false,
            editTitle: false,
            close: false,
            minimize: false,
            unpin: false,
            expand: false,
        });

        var isDragging = 0;
        $('.lobipanel-parent-sortable').on('sortactivate', function(){
            $('.board-column > .panel-body').css('overflow-y', 'unset');
            isDragging = 1;
        });
        $('.lobipanel-parent-sortable').on('sortstop', function(e){
            $('.board-column > .panel-body').css('overflow-y', 'auto');
            isDragging = 0;
        });

        $('.show-detail').click(function (event) {
            if ($(event.target).hasClass('notify-button')) {
                return false;
            }
            var id = $(this).data('application-id');
            draggingTaskId = currentApplicationId = id;

            if (isDragging == 0) {
                $(".right-sidebar").slideDown(50).addClass("shw-rside");

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
            }
        })
    })

</script><?php /**PATH C:\xampp\htdocs\SiRekrutV1\resources\views/admin/job-applications/board-data.blade.php ENDPATH**/ ?>