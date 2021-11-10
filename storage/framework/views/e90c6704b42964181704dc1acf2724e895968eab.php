<link rel="stylesheet" href="<?php echo e(asset('assets/node_modules/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('assets/node_modules/html5-editor/bootstrap-wysihtml5.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('assets/node_modules/multiselect/css/multi-select.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('assets/plugins/iCheck/all.css')); ?>">
<div class="modal-header">
<h4 class="modal-title"><i class="icon-plus"></i> <?php echo app('translator')->get('modules.interviewSchedule.interviewSchedule'); ?></h4>
<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
</div>
<div class="modal-body">
    <form id="updateSchedule" class="ajax-form" method="put">
        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
        <div class="form-body">
            <div class="row">
                <div class="col-md-6  col-xs-12">
                    <div class="form-group">
                        <label class="d-block"><?php echo app('translator')->get('modules.interviewSchedule.candidate'); ?></label>
                        <select disabled class="select2 m-b-10 form-control"
                                data-placeholder="<?php echo app('translator')->get('modules.interviewSchedule.chooseCandidate'); ?>">
                            <?php $__currentLoopData = $candidates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $candidate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option <?php if($schedule->job_application_id == $candidate->id): ?> selected <?php endif; ?> value="<?php echo e($candidate->id); ?>"><?php echo e(ucwords($candidate->full_name)); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <input type="hidden" name="candidate_id" value="<?php echo e($schedule->job_application_id); ?>">
                    </div>
                </div>
                <div class="col-md-6 col-xs-12">
                    <div class="form-group">
                        <label class="d-block"><?php echo app('translator')->get('modules.interviewSchedule.employee'); ?></label>
                        <select class="select2 m-b-10 form-control select2-multiple " multiple="multiple"
                                data-placeholder="<?php echo app('translator')->get('modules.interviewSchedule.chooseEmployee'); ?>" name="employee[]" id="employee">
                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $emp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option  value="<?php echo e($emp->id); ?>"><?php echo e(ucwords($emp->name)); ?> <?php if($emp->id == $user->id): ?>
                                        (<?php echo app('translator')->get('app.you'); ?>) <?php endif; ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-6 col-md-4 ">
                    <div class="form-group">
                        <label><?php echo app('translator')->get('modules.interviewSchedule.scheduleDate'); ?></label>
                        <input type="text" name="scheduleDate" id="scheduleDate" value="<?php echo e($schedule->schedule_date->format('Y-m-d')); ?>" class="form-control">
                    </div>
                </div>

                <div class="col-xs-5 col-md-4">
                    <div class="form-group chooseCandidate bootstrap-timepicker timepicker">
                        <label><?php echo app('translator')->get('modules.interviewSchedule.scheduleTime'); ?></label>
                        <input type="text" name="scheduleTime" id="scheduleTime" value="<?php echo e($schedule->schedule_date->format('H:i')); ?>" class="form-control">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 col-md-12 ">
                    <div class="form-group">
                        <label><?php echo app('translator')->get('modules.interviewSchedule.comment'); ?></label>
                        <textarea type="text" name="comment" id="comment" class="form-control"><?php echo e($comment->comment ?? ''); ?></textarea>
                    </div>
                </div>
            </div>
        </div>
    </form>

</div>
<div class="modal-footer">
    <button type="button" class="btn dark btn-outline" data-dismiss="modal"><?php echo app('translator')->get('app.close'); ?></button>
    <button type="button" class="btn btn-success update-schedule"><?php echo app('translator')->get('app.update'); ?></button>
</div>

<script src="<?php echo e(asset('assets/node_modules/moment/moment.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('assets/node_modules/multiselect/js/jquery.multi-select.js')); ?>"></script>
<script src="<?php echo e(asset('assets/node_modules/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js')); ?>" type="text/javascript"></script>

<script>

    // Select 2 Init
    $(".select2").select2({
        formatNoMatches: function () {
            return "<?php echo e(__('messages.noRecordFound')); ?>";
        }
    });

    $('#employee').val(<?php echo e($employeeList); ?>).change();

    // Datepicker Set
    $('#scheduleDate').bootstrapMaterialDatePicker
    ({
        time: false,
        clearButton: true,
    });

    // Timepicker Set
    $('#scheduleTime').bootstrapMaterialDatePicker
    ({
        date: false,
        shortTime: true,   // look it
        format: 'HH:mm',
        switchOnClick: true
    });

    // Update Schedule
    $('.update-schedule').click(function () {
        $.easyAjax({
            url: '<?php echo e(route('admin.interview-schedule.update', $schedule->id)); ?>',
            container: '#updateSchedule',
            type: "PUT",
            data: $('#updateSchedule').serialize(),
            success: function (response) {
                if(response.status == 'success'){
                    window.location.reload();
                }
            }
        })
    })
</script>
<?php /**PATH D:\kuliah\Belajar\web\laravel\SiRekrutV1\resources\views/admin/interview-schedule/edit.blade.php ENDPATH**/ ?>