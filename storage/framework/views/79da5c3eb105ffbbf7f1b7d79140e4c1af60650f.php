<?php ($updateVersionInfo = \Froiden\Envato\Functions\EnvatoUpdate::updateVersionInfo()); ?>
<?php ($envatoUpdateCompanySetting = \Froiden\Envato\Functions\EnvatoUpdate::companySetting()); ?>
<div class="table-responsive">

    <table class="table table-bordered">
        <thead>
        <th><?php echo app('translator')->get('modules.update.systemDetails'); ?></th>
        </thead>
        <tbody>
        <tr>
            <td>App Version <span
                        class="pull-right"><?php echo e($updateVersionInfo['appVersion']); ?></span></td>
        </tr>
        <tr>
            <td>Laravel Version <span
                        class="pull-right"><?php echo e($updateVersionInfo['laravelVersion']); ?></span></td>
        </tr>
        <tr>
            <td>PHP Version <span class="pull-right"><?php echo e(phpversion()); ?></span></td>
        </tr>
        <?php if(!is_null($envatoUpdateCompanySetting->purchase_code)): ?>
            <tr>
                <td>Envato Purchase code <span
                            class="pull-right"><?php echo e($envatoUpdateCompanySetting->purchase_code); ?></span>
                </td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>
</div><?php /**PATH C:\xampp\htdocs\SiRekrutV1\resources\views/vendor/froiden-envato/update/version_info.blade.php ENDPATH**/ ?>