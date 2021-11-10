<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <form id="editSettings" class="ajax-form">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                        <div id="alert">
                            <?php if($smtpSetting->mail_driver =='smtp'): ?>
                                <?php if($smtpSetting->verified): ?>
                                    <div class="alert alert-success"><?php echo e(__('messages.smtpSuccess')); ?></div>
                                <?php else: ?>
                                    <div class="alert alert-danger"><?php echo e(__('messages.smtpError')); ?></div>
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>

                        <div class="form-group">
                            <label for="name"><?php echo app('translator')->get('app.mailDriver'); ?></label>
                            <div class="form-group">
                                <label class="radio-inline"><input type="radio"
                                                                   class="checkbox"
                                                                   onchange="getDriverValue(this);"
                                                                   value="mail"
                                                                   <?php if($smtpSetting->mail_driver == 'mail'): ?> checked
                                                                   <?php endif; ?> name="mail_driver">Mail</label>
                                <label class="radio-inline pl-lg-2"><input type="radio"
                                                                         onchange="getDriverValue(this);"
                                                                         value="smtp"
                                                                         <?php if($smtpSetting->mail_driver == 'smtp'): ?> checked
                                                                         <?php endif; ?> name="mail_driver">SMTP</label>


                            </div>
                        </div>
                        <div id="smtp_div">
                            <div class="form-group">
                                <label for="email"><?php echo app('translator')->get('app.mailHost'); ?></label>
                                <input type="email" class="form-control" id="mail_host" name="mail_host"
                                       value="<?php echo e($smtpSetting->mail_host); ?>">
                            </div>
                            <div class="form-group">
                                <label for="mail_port"><?php echo app('translator')->get('app.mailPort'); ?></label>
                                <input type="text" class="form-control" id="mail_port" name="mail_port"
                                       value="<?php echo e($smtpSetting->mail_port); ?>">
                            </div>
                            <div class="form-group">
                                <label for="mail_username"><?php echo app('translator')->get('app.mailUsername'); ?></label>
                                <input type="text" class="form-control" id="mail_username" name="mail_username"
                                       value="<?php echo e($smtpSetting->mail_username); ?>">
                            </div>
                            <div class="form-group">
                                <label for="mail_password"><?php echo app('translator')->get('app.mailPassword'); ?></label>
                                <input type="password" class="form-control" id="mail_password" name="mail_password"
                                       value="<?php echo e($smtpSetting->mail_password); ?>">
                            </div>
                            <div class="form-group">
                                <label for="mail_from_email"><?php echo app('translator')->get('app.mailEncryption'); ?></label>
                                <select class="form-control" name="mail_encryption"
                                        id="mail_encryption">
                                    <option value="tls" <?php if($smtpSetting->mail_encryption == 'tls'): ?> selected <?php endif; ?>>
                                        <?php echo app('translator')->get('app.tls'); ?>
                                    </option>
                                    <option value="ssl" <?php if($smtpSetting->mail_encryption == 'ssl'): ?> selected <?php endif; ?>>
                                        <?php echo app('translator')->get('app.ssl'); ?>
                                    </option>
                                    <option value="none" <?php if($smtpSetting->mail_encryption == null): ?> selected <?php endif; ?>>
                                        <?php echo app('translator')->get('app.none'); ?>
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="mail_from_name"><?php echo app('translator')->get('app.mailFromName'); ?></label>
                            <input type="text" class="form-control" id="mail_from_name" name="mail_from_name"
                                   value="<?php echo e($smtpSetting->mail_from_name); ?>">
                        </div>
                        <div class="form-group">
                            <label for="mail_from_email"><?php echo app('translator')->get('app.mailFromEmail'); ?></label>
                            <input type="email" class="form-control" id="mail_from_email" name="mail_from_email"
                                   value="<?php echo e($smtpSetting->mail_from_email); ?>">
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
    <script>
        // Update Mail Setting

        $('#save-form').click(function () {


            $.easyAjax({
                url: '<?php echo e(route('admin.smtp-settings.update', $smtpSetting->id)); ?>',
                type: "POST",
                container: '#editSettings',
                messagePosition: "inline",
                data: $('#editSettings').serialize(),
                success: function (response) {
                    if (response.status == 'error') {
                        $('#alert').prepend('<div class="alert alert-danger"><?php echo e(__('messages.smtpError')); ?></div>')
                    } else {
                        $('#alert').show();
                    }
                }
            })
        });

        $('#send-test-email').click(function () {
            $('#testMailModal').modal('show')
        });
        $('#send-test-email-submit').click(function () {
            $.easyAjax({
                url: '<?php echo e(route('admin.smtp-settings.sendTestEmail')); ?>',
                type: "GET",
                messagePosition: "inline",
                container: "#testEmail",
                data: $('#testEmail').serialize()

            })
        });


        function getDriverValue(sel) {
            if (sel.value == 'mail') {
                $('#smtp_div').hide();
                $('#alert').hide();
            } else {
                $('#smtp_div').show();
                $('#alert').show();
            }
        }

        <?php if($smtpSetting->mail_driver == 'mail'): ?>
        $('#smtp_div').hide();
        $('#alert').hide();
        <?php endif; ?>
    </script>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\kuliah\Belajar\web\laravel\SiRekrutV1\resources\views/admin/mail-setting/index.blade.php ENDPATH**/ ?>