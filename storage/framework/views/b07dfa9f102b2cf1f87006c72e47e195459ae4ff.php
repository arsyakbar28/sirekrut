<?php $__env->startPush('head-script'); ?>
<link rel="stylesheet" href="<?php echo e(asset('assets/node_modules/switchery/dist/switchery.min.css')); ?>">
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4 text-primary"><?php echo app('translator')->get('app.sms.nexmoCredential'); ?></h4>
                    <form id="editSmsSettings" class="ajax-form">
                        <div id="alert"></div>
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                        <div class="form-group">
                            <label for="nexmo_status"><?php echo app('translator')->get('app.sms.nexmoStatus'); ?></label>

                            <div class="col-sm-4">
                                <div class="switchery-demo">
                                    <input id="nexmo_status" name="nexmo_status" type="checkbox"
                                           <?php if($credentials->nexmo_status == 'active'): ?> checked
                                           <?php endif; ?> value="active" class="js-switch change-language-setting"
                                           data-color="#99d683" data-size="small"
                                           data-setting-id="<?php echo e($credentials->id); ?>" onchange="toggle('#nexmo-credentials');"/>
                                </div>
                            </div>
                        </div>
                        <div id="nexmo-credentials">
                            <div class="form-group">
                                <label for="nexmo_key"><?php echo app('translator')->get("app.sms.nexmoKey"); ?></label>
                                <input type="text" name="nexmo_key" id="nexmo_key"
                                        class="form-control"
                                        value="<?php echo e($credentials->nexmo_key); ?>">
                            </div>

                            <div class="form-group">
                                <label for="nexmo_secret"><?php echo app('translator')->get("app.sms.nexmoSecret"); ?></label>
                                <input type="password" name="nexmo_secret" id="nexmo_secret"
                                        class="form-control"
                                        value="<?php echo e($credentials->nexmo_secret); ?>">
                            </div>

                            <div class="form-group">
                                <label for="nexmo_from"><?php echo app('translator')->get("app.sms.nexmoFrom"); ?></label>
                                <input type="text" name="nexmo_from" id="nexmo_from"
                                        class="form-control"
                                        value="<?php echo e($credentials->nexmo_from); ?>">
                            </div>
                        </div>

                        <button type="button" id="save-form"
                                class="btn btn-success waves-effect waves-light m-r-10">
                            <?php echo app('translator')->get('app.save'); ?>
                        </button>
                        <button type="reset"
                                class="btn btn-inverse waves-effect waves-light"><?php echo app('translator')->get('app.reset'); ?></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('footer-script'); ?>
<script src="<?php echo e(asset('assets/node_modules/switchery/dist/switchery.min.js')); ?>"></script>

    <script>
        function toggle(elementBox) {
            var elBox = $(elementBox);
            elBox.slideToggle();
        }

        $('#nexmo_status').is(':checked') ? $('#nexmo-credentials').show() : $('#nexmo-credentials').hide();

        // Switchery
        var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
        $('.js-switch').each(function () {
            new Switchery($(this)[0], $(this).data());

        });

        // Update Mail Setting
        $('#save-form').click(function () {
            $.easyAjax({
                url: '<?php echo e(route('admin.sms-settings.update', $credentials->id)); ?>',
                container: '#editSmsSettings',
                type: "POST",
                redirect: true,
                messagePosition: "inline",
                data: $('#editSmsSettings').serialize(),
              })
        });

    </script>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\kuliah\Belajar\web\laravel\SiRekrutV1\resources\views/admin/sms-setting/index.blade.php ENDPATH**/ ?>