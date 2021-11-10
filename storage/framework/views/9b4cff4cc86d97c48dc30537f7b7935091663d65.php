<?php $__env->startPush('head-script'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/node_modules/dropify/dist/css/dropify.min.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div id="verify-mobile">
                        <?php echo $__env->make('sections.admin_verify_phone', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <form id="editSettings" class="ajax-form">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>

                        <div class="form-group">
                            <label for="name"><?php echo app('translator')->get('app.name'); ?></label>
                            <input type="text" class="form-control" id="name" name="name"
                                   value="<?php echo e(ucwords($user->name)); ?>">
                        </div>
                        <div class="form-group">
                            <label for="email"><?php echo app('translator')->get('app.email'); ?></label>
                            <input type="email" class="form-control" id="email" name="email"
                                   value="<?php echo e($user->email); ?>">
                        </div>
                        <div class="form-group">
                            <label for="password"><?php echo app('translator')->get('app.password'); ?></label>
                            <input type="password" class="form-control" id="password" name="password">
                            <span class="help-block"> <?php echo app('translator')->get('messages.passwordNote'); ?></span>
                        </div>
                        <?php if($smsSettings->nexmo_status == 'deactive'): ?>
                            <!-- text input -->
                            <div class="form-group">
                                <label><?php echo app('translator')->get('app.mobile'); ?></label>
                                <div class="form-row">
                                    <div class="col-sm-3">
                                        <select name="calling_code" id="calling_code" class="form-control selectpicker" data-live-search="true" data-width="100%" >
                                            <?php $__currentLoopData = $calling_codes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $code => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($value['dial_code']); ?>"
                                                <?php if($user->calling_code): ?>
                                                    <?php echo e($user->calling_code == $value['dial_code'] ? 'selected' : ''); ?>

                                                <?php endif; ?>><?php echo e($value['dial_code'] . ' - ' . $value['name']); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="mobile" value="<?php echo e($user->mobile); ?>">
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                        <div class="form-group">
                            <label for="exampleInputPassword1"><?php echo app('translator')->get('app.image'); ?></label>
                            <div class="card">
                                <div class="card-body">
                                    <input type="file" id="input-file-now" name="image" accept=".png,.jpg,.jpeg" class="dropify"
                                           data-default-file="<?php echo e($user->profile_image_url); ?>"
                                    />
                                </div>
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
    <script src="<?php echo e(asset('assets/node_modules/dropify/dist/js/dropify.min.js')); ?>" type="text/javascript"></script>
    <script>
        $('.dropify').dropify({
            messages: {
                default: '<?php echo app('translator')->get("app.dragDrop"); ?>',
                replace: '<?php echo app('translator')->get("app.dragDropReplace"); ?>',
                remove: '<?php echo app('translator')->get("app.remove"); ?>',
                error: '<?php echo app('translator')->get('app.largeFile'); ?>'
            }
        });

        $('body').on('click', '#change-mobile', function () {
            $.easyAjax({
                url: "<?php echo e(route('changeMobile')); ?>",
                container: '#verify-mobile',
                type: "GET",
                success: function (response) {
                    $('#verify-mobile').html(response.view);
                    $('.selectpicker').selectpicker({
                        style: 'btn-info',
                        size: 4
                    });
                }
            })
        });

        $('#save-form').click(function () {
            $.easyAjax({
                url: '<?php echo e(route('admin.profile.update', $user->id)); ?>',
                container: '#editSettings',
                type: "POST",
                redirect: true,
                file: true
            })
        });
    </script>
    <script>
        var x = '';
        
        function clearLocalStorage() {
            localStorage.removeItem('otp_expiry');
            localStorage.removeItem('otp_attempts');
        }

        function checkSessionAndRemove() {
            $.easyAjax({
                url: '<?php echo e(route('removeSession')); ?>',
                type: 'GET',
                data: {'sessions': ['verify:request_id']}
            })
        }

        function startCounter(deadline) {
            x = setInterval(function() {
                var now = new Date().getTime();
                var t = deadline - now;

                var days = Math.floor(t / (1000 * 60 * 60 * 24));
                var hours = Math.floor((t%(1000 * 60 * 60 * 24))/(1000 * 60 * 60));
                var minutes = Math.floor((t % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((t % (1000 * 60)) / 1000);

                $('#demo').html('Time Left: '+minutes + ":" + seconds);
                $('.attempts_left').html(`${localStorage.getItem('otp_attempts')} attempts left`);

                if (t <= 0) {
                    clearInterval(x);
                    clearLocalStorage();
                    checkSessionAndRemove();
                    location.href = '<?php echo e(route('admin.profile.index')); ?>'
                }
            }, 1000);
        }

        if (localStorage.getItem('otp_expiry') !== null) {
            let localExpiryTime = localStorage.getItem('otp_expiry');
            let now = new Date().getTime();

            if (localExpiryTime - now < 0) {
                clearLocalStorage();
                checkSessionAndRemove();
            }
            else {
                $('#otp').focus().select();
                startCounter(localStorage.getItem('otp_expiry'));
            }
        }

        function sendOTPRequest() {
            $.easyAjax({
                url: '<?php echo e(route('sendOtpCode.account')); ?>',
                type: 'POST',
                container: '#request-otp-form',
                messagePosition: 'inline',
                data: $('#request-otp-form').serialize(),
                success: function (response) {
                    if (response.status == 'success') {
                        localStorage.setItem('otp_attempts', 3);

                        $('#verify-mobile').html(response.view);
                        $('.attempts_left').html(`3 attempts left`);

                        let html = `<div class="alert alert-info mb-0" role="alert">
                            <?php echo app('translator')->get('messages.info.verifyAlert'); ?>
                            <a href="<?php echo e(route('admin.profile.index')); ?>" class="btn btn-warning">
                                <?php echo app('translator')->get('menu.profile'); ?>
                            </a>
                        </div>`;

                        $('#verify-mobile-info').html(html);
                        $('#otp').focus();

                        var now = new Date().getTime();
                        var deadline = new Date(now + parseInt('<?php echo e(config('nexmo.settings.pin_expiry')); ?>')*1000).getTime();

                        localStorage.setItem('otp_expiry', deadline);
                        // intialize countdown
                        startCounter(deadline);
                    }
                    if (response.status == 'fail') {
                        $('#mobile').focus();
                    }
                }
            });
        }

        function sendVerifyRequest() {
            $.easyAjax({
                url: '<?php echo e(route('verifyOtpCode.account')); ?>',
                type: 'POST',
                container: '#verify-otp-form',
                messagePosition: 'inline',
                data: $('#verify-otp-form').serialize(),
                success: function (response) {
                    if (response.status == 'success') {
                        clearLocalStorage();

                        $('#verify-mobile').html(response.view);
                        $('#verify-mobile-info').html('');

                        // select2 reinitialize
                        $('.selectpicker').selectpicker({
                            style: 'btn-info',
                            size: 4
                        });
                    }
                    if (response.status == 'fail') {
                        // show number of attempts left
                        let currentAttempts = localStorage.getItem('otp_attempts');

                        if (currentAttempts == 1) {
                            clearLocalStorage();
                        }
                        else {
                            currentAttempts -= 1;

                            $('.attempts_left').html(`${currentAttempts} attempts left`);
                            $('#otp').focus().select();
                            localStorage.setItem('otp_attempts', currentAttempts);
                        }

                        if (Object.keys(response.data).length > 0) {
                            $('#verify-mobile').html(response.data.view);

                            // select2 reinitialize
                            $('.selectpicker').selectpicker({
                                style: 'btn-info',
                                size: 4
                            });

                            clearInterval(x);
                        }
                    }
                }
            });
        }

        $('body').on('submit', '#request-otp-form', function (e) {
            e.preventDefault();
            sendOTPRequest();
        })

        $('body').on('click', '#request-otp', function () {
            sendOTPRequest();
        })

        $('body').on('submit', '#verify-otp-form', function (e) {
            e.preventDefault();
            sendVerifyRequest();
        })

        $('body').on('click', '#verify-otp', function() {
            sendVerifyRequest();
        })
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\kuliah\Belajar\web\laravel\SiRekrutV1\resources\views/admin/profile/index.blade.php ENDPATH**/ ?>