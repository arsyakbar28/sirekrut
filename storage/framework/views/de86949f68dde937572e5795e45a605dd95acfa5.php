<a href="<?php echo e(route('admin.job-applications.index')); ?>" class="dropdown-item text-sm">
    <i class="fa fa-users mr-2"></i>
    <span class="text-truncate-notify" style="overflow-y: hidden" title="full name"> <?php echo e(__('messages.notifications.newJobApplication', ['name' => $notification->data['data']['full_name'], 'job_title' => $notification->data['data']['job']['title']])); ?></span>
    <span class="float-right text-muted text-sm"><?php echo e(\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $notification->created_at)->diffForHumans()); ?></span>
    <div class="clearfix"></div>
</a><?php /**PATH C:\xampp\htdocs\SiRekrutV1\resources\views/notifications/new_job_application.blade.php ENDPATH**/ ?>