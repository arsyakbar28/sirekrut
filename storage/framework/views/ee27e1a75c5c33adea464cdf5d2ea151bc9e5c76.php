 <?php $__env->startPush('head-script'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/node_modules/dropify/dist/css/dropify.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/node_modules/switchery/dist/switchery.min.css')); ?>">
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title"><?php echo app('translator')->get('app.edit'); ?> <?php echo app('translator')->get('menu.linkedInSettings'); ?></h4>

                    <form id="editSettings" class="ajax-form">
                        <?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?>
                        <div class="form-group">
                            <label class="control-label col-sm-8"><?php echo app('translator')->get('modules.linkedInSettings.status'); ?></label>
                            <div class="col-sm-4">
                                <div class="switchery-demo">
                                    <input id="status" type="checkbox" name="status"
                                           <?php if($linkedInSetting->status == 'enable'): ?> checked
                                           <?php endif; ?> value="enable" class="js-switch change-language-setting"
                                           data-color="#99d683" data-size="small" onchange="toggle('#linkedin-credentials');" />
                                </div>
                            </div>
                        </div>
                        <div id="linkedin-credentials">
                            <div class="form-group">
                                <label for="client_id"><?php echo app('translator')->get('modules.linkedInSettings.client_id'); ?></label>
                                <input type="text" class="form-control" id="client_id" name="client_id" value="<?php echo e($linkedInSetting->client_id); ?>">
                            </div>
                            <div class="form-group">
                                <label for="client_secret"><?php echo app('translator')->get('modules.linkedInSettings.client_secret'); ?></label>
                                <input type="password" class="form-control" id="client_secret" name="client_secret" value="<?php echo e($linkedInSetting->client_secret); ?>">
                            </div>
                            <div class="form-group">
                                <label for="company_phone"><?php echo app('translator')->get('modules.linkedInSettings.callback_url'); ?></label>
                                <input type="tel" class="form-control" readonly id="callback_url" name="callback_url" value="<?php echo e($linkedInSetting->callback_url); ?>">
                            </div>
                        </div>
                        <button type="button" id="save-form" class="btn btn-success waves-effect waves-light m-r-10">
                            <?php echo app('translator')->get('app.save'); ?>
                        </button>
                        <button type="reset" class="btn btn-inverse waves-effect waves-light"><?php echo app('translator')->get('app.reset'); ?></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('footer-script'); ?>
    <script src="<?php echo e(asset('assets/node_modules/select2/dist/js/select2.full.min.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('assets/node_modules/bootstrap-select/bootstrap-select.min.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('assets/node_modules/dropify/dist/js/dropify.min.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('assets/node_modules/switchery/dist/switchery.min.js')); ?>"></script>

    <script>
        function toggle(elementBox) {
            var elBox = $(elementBox);
            elBox.slideToggle();
        }

        $('#status').is(':checked') ? $('#linkedin-credentials').show() : $('#linkedin-credentials').hide();
        
        // Switchery
        var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
        $('.js-switch').each(function () {
            new Switchery($(this)[0], $(this).data());

        });

    </script>
    <script>
        $('#save-form').click(function () {
            $.easyAjax({
                url: '<?php echo e(route("admin.linkedin-settings.update", $linkedInSetting->id)); ?>',
                container: '#editSettings',
                type: "POST",
                redirect: true,
                messagePosition: 'inline',
                file: true
            })
        });
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\kuliah\Belajar\web\laravel\SiRekrutV1\resources\views/admin/linked-in-settings/edit.blade.php ENDPATH**/ ?>