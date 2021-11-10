<style>
    .notify-button-show{
        /*width: 9em;*/
        height: 1.5em;
        font-size: 0.730rem !important;
        line-height: 0.5 !important;
    }

</style>
<link rel="stylesheet" href="<?php echo e(asset('assets/plugins/iCheck/all.css')); ?>">

<div class="modal-header">
    <h4 class="modal-title">Jadwal Interview</h4>
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
</div>
<div class="modal-body">
    <div class="portlet-body">
            <div class="row font-12">
                <div class="col-6">
                    <div class="row">
                        <div class="col-md-5">
                            <h4>Ubah Detail Jadwal</h4>
                        </div>
                        <div class="col-md-5">
                            <?php if($currentDateTimestamp <= $schedule->schedule_date->timestamp && $user->can('edit_schedule')): ?>
                                <button onclick="editSchedule()" class="btn btn-sm btn-info notify-button-show" title="Edit"> <i class="fa fa-pencil"></i> <?php echo app('translator')->get('app.edit'); ?></button>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <strong>Pekerjaan</strong><br>
                        <p class="text-muted"><?php echo e(ucwords($schedule->jobApplication->job->title).' ('.ucwords($schedule->jobApplication->job->location->location).')'); ?></p>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-6">
                            <strong>Karyawan Yang Ditugaskan</strong><br>
                        </div>
                        <div class="col-sm-6">
                            <strong>Respon Karyawan</strong><br>
                        </div>
                       <?php $__empty_1 = true; $__currentLoopData = $schedule->employee; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $emp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <div class="col-sm-6">
                            <p class="text-muted"><?php echo e(ucwords($emp->user->name)); ?></p>
                        </div>

                        <div class="col-sm-6">
                            <?php if($emp->user_accept_status == 'accept'): ?>
                                <label class="badge badge-success"><?php echo e(ucwords($emp->user_accept_status)); ?></label>
                            <?php elseif($emp->user_accept_status == 'refuse'): ?>
                                <label class="badge badge-danger"><?php echo e(ucwords($emp->user_accept_status)); ?></label>
                            <?php else: ?>
                                <label class="badge badge-warning"><?php echo e(ucwords($emp->user_accept_status)); ?></label>
                            <?php endif; ?>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <div class="col-sm-12 text-center text-muted">
                                <strong>Tidak Ada Karyawan Yang Ditugaskan</strong><br>
                            </div>
                        <?php endif; ?>
                    </div>

                </div>
                <div class="col-6">
                    <div class="row">
                        <div class="col-md-12">
                            <h4>Detail Calon</h4>
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <strong>Nama</strong><br>
                        <p class="text-muted"><?php echo e(ucwords($schedule->jobApplication->full_name)); ?></p>
                    </div>


                    <div class="col-sm-12">
                        <strong>Email</strong><br>
                        <p class="text-muted"><?php echo e($schedule->jobApplication->email); ?></p>
                    </div>

                    <div class="col-sm-12">
                        <strong>No. Telepon</strong><br>
                        <p class="text-muted"><?php echo e($schedule->jobApplication->phone); ?></p>
                    </div>

                    <div class="col-sm-12">
                        <p class="text-muted">
                            <a target="_blank" href="<?php echo e($schedule->jobApplication->resume_url); ?>" class="btn btn-sm btn-primary"><?php echo app('translator')->get('app.view'); ?> <?php echo app('translator')->get('modules.jobApplication.resume'); ?></a>
                        </p>
                    </div>

                </div>
                <?php if($schedule->jobApplication->schedule->comments == 'interview' && count($application->schedule->comments) > 0): ?>
                    <hr>

                    <h5>Komentar</h5>
                    <?php $__empty_1 = true; $__currentLoopData = $schedule->jobApplication->schedule->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <div class="row">
                            <div class="col-sm-6">
                                <p class="text-muted"><?php echo e($comment->user->name); ?></p>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <p class="text-muted"><?php echo e($comment->comment); ?></p>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <?php endif; ?>

                <?php endif; ?>

                <div class="col-6">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="rejected">
                                <div class="iradio_minimal-blue" aria-checked=""
                                    aria-disabled="false" style="position: relative;font-size: .7rem">
                                    <input id="rejected" type="radio" <?php if($schedule->status == 'rejected'): ?> checked <?php endif; ?> name="r1"
                                    class="minimal" style="position: absolute; opacity: 0;"><ins class="iCheck-helper"
                                        style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                </div>
                                Ditolak
                            </label>
                            <label for="hired">
                                <div class="iradio_minimal-blue" aria-checked=""
                                    aria-disabled="false" style="position: relative;margin-left: 10px;font-size: .7rem">
                                    <input id="hired" type="radio" <?php if($schedule->status == 'hired'): ?> checked <?php endif; ?> name="r1"
                                    class="minimal" style="position: absolute; opacity: 0;"><ins class="iCheck-helper"
                                        style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0; "></ins>
                                </div>
                                Diterima
                            </label>
                            <label for="pending">
                                <div class="iradio_minimal-blue" aria-checked=""
                                    aria-disabled="false" style="position: relative;margin-left: 10px;font-size: .7rem">
                                    <input id="pending" type="radio" <?php if($schedule->status == 'pending'): ?> checked <?php endif; ?> name="r1"
                                    class="minimal" style="position: absolute; opacity: 0;"><ins class="iCheck-helper"
                                        style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                </div>
                                Tertunda
                            </label>
                            <label for="canceled">
                                <div class="iradio_minimal-blue" aria-checked=""
                                    aria-disabled="false" style="position: relative;margin-left: 10px;font-size: .7rem">
                                    <input id="canceled" type="radio" <?php if($schedule->status == 'canceled'): ?> checked <?php endif; ?> name="r1"
                                    class="minimal" style="position: absolute; opacity: 0;"><ins class="iCheck-helper"
                                        style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0; "></ins>
                                </div>
                                Dibatalkan
                            </label>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn dark btn-outline" data-dismiss="modal">Tutup</button>
</div>
<script src="<?php echo e(asset('assets/plugins/iCheck/icheck.min.js')); ?>"></script>

<script>
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
        checkboxClass: 'icheckbox_minimal-blue',
        radioClass   : 'iradio_minimal-blue'
    })

    $('input[type="radio"].minimal').on('ifChecked', function(e) {
        statusChange($(this).prop('id'));
    })

    // Employee Response on schedule
    function statusChange(status) {
        var msg;

        swal({
            title: "<?php echo app('translator')->get('errors.askForCandidateEmail'); ?>",
            text: msg,
            type: "info",
            showCancelButton: true,
            confirmButtonColor: "#0c19dd",
            confirmButtonText: "<?php echo app('translator')->get('app.yes'); ?>",
            cancelButtonText: "<?php echo app('translator')->get('app.no'); ?>",
            closeOnConfirm: true,
            closeOnCancel: true
        }, function (isConfirm) {
            if (isConfirm) {
                statusChangeConfirm(status , 'yes')
            }
            else{
                statusChangeConfirm(status , 'no')
            }

        });
    }

    // change Schedule schedule
    function statusChangeConfirm(status, mailToCandidate) {
        var token = "<?php echo e(csrf_token()); ?>";
        var id = "<?php echo e($schedule->id); ?>";
        $.easyAjax({
            url: '<?php echo e(route('admin.interview-schedule.change-status')); ?>',
            container: '.modal-body',
            type: "POST",
            data: {'_token': token,'status': status,'id': id,'mailToCandidate': mailToCandidate},
            success: function (response) {
                <?php if($tableData): ?>
                    table._fnDraw();
                <?php else: ?>
                    reloadSchedule();
                <?php endif; ?>
                $('#scheduleDetailModal').modal('hide');
            }
        })
    }
    function editSchedule() {
        var url = "<?php echo e(route('admin.interview-schedule.edit', $schedule->id)); ?>";
        $('#modelHeading').html('Schedule');
        $('#scheduleEditModal').modal('hide');
        $.ajaxModal('#scheduleEditModal', url);
    }

</script>

<?php /**PATH D:\kuliah\Belajar\web\laravel\SiRekrutV1\resources\views/admin/interview-schedule/show.blade.php ENDPATH**/ ?>