<?php $__env->startPush('head-script'); ?>
<link rel="stylesheet" href="<?php echo e(asset('assets/node_modules/html5-editor/bootstrap-wysihtml5.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('assets/plugins/iCheck/all.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form id="editSettings" class="ajax-form">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                        <div class="col-md-12">
                            <h4 class="card-title mb-4 text-primary"><?php echo app('translator')->get('modules.applicationSetting.formSettings'); ?></h4>
                        </div>

                        <div class="col-md-12">

                            <div class="form-group">
                                <label for="address"><?php echo app('translator')->get('modules.applicationSetting.legalTermText'); ?></label>
                                <textarea class="form-control" id="legal_term" name="legal_term" rows="15" placeholder="Enter text ..."><?php echo $setting->legal_term; ?></textarea>
                            </div>

                        </div>
                        <hr>

                        <div class="col-md-12">
                            <h4 class="card-title mb-4 text-primary"><?php echo app('translator')->get('modules.applicationSetting.mailSettings'); ?></h4>
                        </div>

                        <div id="mail-setting" class="row">
                            <label style="margin-left: 10px">Send mail if candidate move to </label>
                            <?php $__empty_1 = true; $__currentLoopData = $setting->mail_setting; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $mailSetting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <div class="form-group" style="margin-left: 20px">
                                    <label class="">
                                        <div class="icheckbox_flat-green" aria-checked="false" aria-disabled="false" style="position: relative; margin-right: 5px">
                                            <input
                                                type="checkbox"
                                                <?php if($mailSetting['status']): ?> checked <?php endif; ?>
                                                value="<?php echo e($key); ?>"
                                                name="checkBoardColumn[]"
                                                class="flat-red columnCheck"
                                                style="position: absolute; opacity: 0;"
                                            >
                                            <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                        </div>
                                        <?php echo e(ucwords($mailSetting['name'])); ?>

                                    </label>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <?php endif; ?>
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
<script src="<?php echo e(asset('assets/node_modules/bootstrap-select/bootstrap-select.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('assets/node_modules/html5-editor/wysihtml5-0.3.0.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('assets/node_modules/html5-editor/bootstrap-wysihtml5.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('assets/plugins/iCheck/icheck.min.js')); ?>"></script>

<script>
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red').iCheck({
        checkboxClass: 'icheckbox_flat-blue',
    })

    var jobDescription = $('#legal_term').wysihtml5({
        "font-styles": true, //Font styling, e.g. h1, h2, etc. Default true
        "emphasis": true, //Italics, bold, etc. Default true
        "lists": true, //(Un)ordered lists, e.g. Bullets, Numbers. Default true
        "html": true, //Button which allows you to edit the generated HTML. Default false
        "link": true, //Button to insert a link. Default true
        "image": true, //Button to insert an image. Default true,
        "color": true, //Button to change color of font
        stylesheets: ["<?php echo e(asset('assets/node_modules/html5-editor/wysiwyg-color.css')); ?>"], // (path_to_project/lib/css/wysiwyg-color.css)
    });

    $('#save-form').click(function () {
        $.easyAjax({
            url: '<?php echo e(route('admin.application-setting.update', $global->id)); ?>',
            container: '#editSettings',
            type: "POST",
            redirect: true,
            file: true
        })
    });
</script>

  
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SiRekrutV1\resources\views/admin/application-setting/index.blade.php ENDPATH**/ ?>