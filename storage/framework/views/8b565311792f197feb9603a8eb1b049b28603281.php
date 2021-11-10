
<div class="card">
    <div class="card-header bg-secondary">

        <?php echo e(__('messages.installationWelcome')); ?>

        <div class="row">
            <div class="col-md-12 col-sm-10">
                <div class="progress progress-striped m-t-20 progress-lg">
                    <div role="progressbar" aria-valuenow="<?php echo e($progressPercent); ?>" aria-valuemin="0"
                         aria-valuemax="100"
                         class="progress-bar progress-bar-success progress-bar-striped"
                         style="width: <?php echo e($progressPercent); ?>%;"></div>


                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-12 c-white m-t-10"><strong><?php echo e(__('messages.installationProgress')); ?>

                    : </strong> <?php echo e($progressPercent); ?>%
            </div>
        </div>
    </div>

    <div class="card-body">

        <div class="row">
            <div class="info-box" style="width: 100%">
                <span class="info-box-icon bg-success"><i class="icon-check"></i></span>
                <div class="info-box-content">
                    <div class="info-box-number"><a href="#"><?php echo e(__('messages.installationStep1')); ?></a></div>
                    <h6 class="info-box-text"><?php echo e(__('messages.installationCongratulation')); ?></h6>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="info-box" style="width: 100%">
                <?php if(isset($progress['smtp_setting_completed'])): ?>
                    <span class="info-box-icon bg-success"><i class="icon-check"></i></span>
                <?php else: ?>
                    <span class="info-box-icon bg-danger"><i class="icon-close"></i></span>
                <?php endif; ?>
                <div class="info-box-content">
                    <div class="info-box-number"><a href="<?php echo e(route('admin.smtp-settings.index')); ?>"
                                                    class=""><?php echo e(__('messages.installationStep2')); ?></a>
                    </div>
                    <h6 class="info-box-text"><?php echo e(__('messages.installationSmtp')); ?></h6>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="info-box" style="width: 100%">
                <?php if(isset($progress['company_setting_completed'])): ?>
                    <span class="info-box-icon bg-success"><i class="icon-check"></i></span>
                <?php else: ?>
                    <span class="info-box-icon bg-danger"><i class="icon-close"></i></span>
                <?php endif; ?>
                <div class="info-box-content">
                    <div class="info-box-number"><a
                                href="<?php echo e(route('admin.settings.index')); ?>"><?php echo e(__('messages.installationStep3')); ?></a>
                    </div>
                    <h6 class="info-box-text"><?php echo e(__('messages.installationCompanySetting')); ?></h6>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="info-box" style="width: 100%">
                <?php if(isset($progress['profile_setting_completed'])): ?>
                    <span class="info-box-icon bg-success"><i class="icon-check"></i></span>
                <?php else: ?>
                    <span class="info-box-icon bg-danger"><i class="icon-close"></i></span>
                <?php endif; ?>
                <div class="info-box-content">
                    <div class="info-box-number"><a href="<?php echo e(route('admin.profile.index')); ?>"
                                                    class=""><?php echo e(__('messages.installationStep4')); ?></a>
                    </div>
                    <h6 class="info-box-text"><?php echo e(__('messages.installationProfileSetting')); ?></h6>
                </div>
            </div>

        </div>
    </div>
</div><?php /**PATH C:\xampp\htdocs\SiRekrutV1\resources\views/admin/dashboard/get_started.blade.php ENDPATH**/ ?>