<?php $__empty_1 = true; $__currentLoopData = $upComingSchedules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $upComingSchedule): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
    <div>
        <?php
            $date = \Carbon\Carbon::createFromFormat('Y-m-d', $key);
        ?>
        <h4><?php echo e($date->format('M d, Y')); ?></h4>


        <ul class="scheduleul">
            <?php $__empty_2 = true; $__currentLoopData = $upComingSchedule; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $dtData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_2 = false; ?>

                <li class="deco" id="schedule-<?php echo e($dtData->id); ?>" onclick="getScheduleDetail(event, <?php echo e($dtData->id); ?>) "
                    style="list-style: none;">
                    <h5 class="text-muted"
                        style="float: left"><?php echo e(ucfirst($dtData->jobApplication->job->title)); ?> </h5>
                    <div class="pull-right">
                        <?php if($user->can('edit_schedule')): ?>
                            <span style="margin-right: 15px;">
                                <button onclick="editUpcomingSchedule(event, '<?php echo e($dtData->id); ?>')"
                                        class="btn btn-sm btn-info notify-button editSchedule"
                                        title="Edit"> <i class="fa fa-pencil"></i></button>
                            </span>
                        <?php endif; ?>
                        <?php if($user->can('delete_schedule')): ?>
                            <span style="margin-right: 15px;">
                                <button data-schedule-id="<?php echo e($dtData->id); ?>"
                                        class="btn btn-sm btn-danger notify-button deleteSchedule"
                                        title="Delete"> <i class="fa fa-trash"></i></button>
                            </span>
                        <?php endif; ?>
                    </div>
                    <div class="clearfix"></div>
                    <div class="direct-chat-name"
                            style="font-size: 13px"><?php echo e(ucfirst($dtData->jobApplication->full_name)); ?></div>
                    <span class="direct-chat-timestamp"
                            style="font-size: 13px"><?php echo e($dtData->schedule_date->format('h:i a')); ?></span>

                    <?php if(in_array($user->id, $dtData->employee->pluck('user_id')->toArray())): ?>
                        <?php
                            $empData = $dtData->employeeData($user->id);
                        ?>

                        <?php if($empData->user_accept_status == 'accept'): ?>
                            <label class="badge badge-success float-right">Diterima</label>
                        <?php elseif($empData->user_accept_status == 'refuse'): ?>
                            <label class="badge badge-danger float-right">Ditolak</label>
                        <?php else: ?>
                            <span class="float-right">
                                <button onclick="employeeResponse(<?php echo e($empData->id); ?>, 'accept')"
                                        class="btn btn-sm btn-success notify-button responseButton">Terima</button>
                                <button onclick="employeeResponse(<?php echo e($empData->id); ?>, 'refuse')"
                                        class="btn btn-sm btn-danger notify-button responseButton">Tolak</button>
                            </span>
                        <?php endif; ?>
                    <?php endif; ?>
                </li>
                <?php if($key != (count($upComingSchedule)-1)): ?>
                    <hr>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_2): ?>

            <?php endif; ?>
        </ul>

    </div>
    <hr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
    <div>
        <p>Jadwal Yang Akan Datang Tidak Ditemukan</p>
    </div>
<?php endif; ?><?php /**PATH D:\kuliah\Belajar\web\laravel\SiRekrutV1\resources\views/admin/interview-schedule/upcoming-schedule.blade.php ENDPATH**/ ?>