<?php $__env->startSection('header-text'); ?>
    <h1 class="hidden-sm-down"><?php echo e(ucwords($job->title)); ?></h1>
    <h5 class="hidden-sm-down"><i class="icon-map-pin"></i> <?php echo e(ucwords($job->location->location)); ?></h5>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('header-css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/datepicker/datepicker3.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/select2/select2.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/node_modules/switchery/dist/switchery.min.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <?php
        $gender = [
            'male' => __('modules.front.male'),
            'female' => __('modules.front.female'),
            'others' => __('modules.front.others')
        ];
    ?>

    <form id="createForm" method="POST">
        <?php echo csrf_field(); ?>
        <input type="hidden" name="job_id" value="<?php echo e($job->id); ?>">

        <div class="container">
        <div class="row gap-y">
            <div class="col-md-12 fs-12 pt-50 pb-10 bb-1 mb-20">
                <a class="text-dark"
                   href="<?php echo e(route('jobs.jobOpenings')); ?>"><?php echo app('translator')->get('modules.front.jobOpenings'); ?></a> &raquo; <a
                        class="text-dark"
                        href="<?php echo e(route('jobs.jobDetail', $job->slug)); ?>"><?php echo e(ucwords($job->title)); ?></a> &raquo; <span
                        class="theme-color"><?php echo app('translator')->get('modules.front.applicationForm'); ?></span>
            </div>

            <div class="col-md-4 px-20 pb-30">
                <h5>Informasi Pribadi</h5>
            </div>


            <div class="col-md-8 pb-30">

                <div class="form-group">
                    <input class="form-control form-control-lg" type="text" name="full_name" placeholder="Nama Lengkap" value="<?php if($user): ?> <?php echo e($user->name); ?> <?php endif; ?>">
                </div>

                <div class="form-group">
                    <input class="form-control form-control-lg" type="email" name="email"
                            placeholder="Example@gmail.com" value="<?php if($user): ?> <?php echo e($user->email); ?> <?php endif; ?>">
                </div>

                <div class="form-group">
                    <input class="form-control form-control-lg" type="tel" name="phone"
                            placeholder="Nomor Telepon">
                </div>

                <?php if($job->required_columns['gender']): ?>
                    <label class="control-label">Jenis Kelamin</label>
                    <div class="form-group">
                        <div class="form-inline">
                            <?php $__currentLoopData = $gender; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="<?php echo e($key); ?>" value="<?php echo e($key); ?>">
                                    <label class="form-check-label" for="<?php echo e($key); ?>"><?php echo e(ucFirst($value)); ?></label>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if($job->required_columns['dob']): ?>
                    <div class="form-group">
                        <input class="form-control form-control-lg dob" type="text" name="dob"
                                placeholder="<?php echo app('translator')->get('modules.front.dob'); ?>" autocomplete="none">
                    </div>
                <?php endif; ?>
                <?php if($job->required_columns['country']): ?>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <select class="select2 countries" name="country" id="countryId">
                                    <option value="0"><?php echo app('translator')->get('modules.front.selectCountry'); ?></option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <select class="select2 states" name="state" id="stateId">
                                    <option value="0"><?php echo app('translator')->get('modules.front.selectState'); ?></option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <input class="form-control form-control-lg" type="text" name="city" id="cityId" placeholder="<?php echo app('translator')->get('modules.front.selectCity'); ?>">
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if($job->section_visibility['profile_image'] == 'yes'): ?>
                    <div class="form-group">
                        <h6>Foto</h6>
                        <img src="<?php if($user): ?> <?php echo e($user->avatar); ?> <?php endif; ?>">
                        <input type="hidden" name="linkedinPhoto" value="<?php if($user): ?> <?php echo e($user->avatar); ?> <?php endif; ?>">
                        <?php if($user): ?>
                            <input type="hidden" name="apply_type" value="linkedin">
                        <?php endif; ?>
                        <input class="select-file" accept=".png,.jpg,.jpeg" type="file" name="photo"><br>
                        <span>Kami Hanya Menerima File PNG, JPG, dan JPEG</span>
                    </div>
                <?php endif; ?>
            </div>

            <?php if($job->section_visibility['resume'] == 'yes'): ?>
                <div class="col-md-4 px-20 pb-30 bt-1">
                    <h5>CV atau Resume</h5>
                </div>
                <div class="col-md-8 py-30 bt-1">
                    <div class="form-group">
                        <input class="select-file" accept=".png,.jpg,.jpeg,.pdf,.doc,.docx,.xls,.xlsx,.rtf" type="file" name="resume"><br>
                        <span>Kami Hanya Menerima File JPEG, JPG, PNG, DOC, DOCX, RTF, XLS, XLSX and PDF</span>
                    </div>
                </div>
            <?php endif; ?>
            <?php if(count($jobQuestion) > 0): ?>
                <div class="col-md-4 px-20 pb-30 bt-1">
                    <h5><?php echo app('translator')->get('modules.front.additionalDetails'); ?></h5>
                </div>

                <div class="col-md-8 pb-30 bt-1">
                    <?php $__empty_1 = true; $__currentLoopData = $jobQuestion; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <div class="form-group">
                            <label class="control-label" for="answer[<?php echo e($question->id); ?>]"><?php echo e($question->question); ?></label>
                            <input class="form-control form-control-lg" type="text" id="answer[<?php echo e($question->id); ?>]" name="answer[<?php echo e($question->id); ?>]" placeholder="<?php echo app('translator')->get('modules.front.yourAnswer'); ?>">
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <?php if($job->section_visibility['cover_letter'] == 'yes'): ?>
                <div class="col-md-4 px-20 pb-30 bt-1">
                    <h5>Surat Lamaran</h5>
                </div>
                <div class="col-md-8 py-30 bt-1">
                    <div class="form-group">
                        <textarea class="form-control form-control-lg" name="cover_letter" rows="4"></textarea>
                    </div>
                </div>
            <?php endif; ?>

            <?php if($job->section_visibility['terms_and_conditions'] == 'yes'): ?>
                <div class="col-md-4 px-20 pb-30 bt-1">
                    <h5>Syarat Dan Ketentuan</h5>
                </div>
                <div class="col-md-8 py-30 bt-1">
                    <div class="form-group">
                        <div class="form-control form-control-lg legal-term">
                            <?php echo $applicationSetting->legal_term; ?>

                        </div>
                    </div>
                    <div class="form-group mt-30">
                            <label for="term_agreement" class="align-top" ><b>Saya menerima syarat dan ketentuan tersebut</b></label>
                            <div class="switchery-demo form-group ml-20 d-inline-block" >
                                <input type="checkbox" class="js-switch clearfix" id="agree_term"  value="yes"  data-size="small"  name="term_agreement"  data-color="#00c292" />
                            </div>
                    </div>
                </div>
            <?php endif; ?>
            <div class="col-md-12 pb-30">
                <div class="row">
                    <div class="col-md-8 offset-md-4">
                        <button class="btn btn-lg btn-primary btn-block theme-background" id="save-form" type="button">Lamar Pekerjaan</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('footer-script'); ?>
    <script src="<?php echo e(asset('assets/plugins/datepicker/bootstrap-datepicker.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/plugins/select2/select2.full.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/node_modules/switchery/dist/switchery.min.js')); ?>"></script>
    <script>
        // Switchery
        var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
        $('.js-switch').each(function() {
            new Switchery($(this)[0], $(this).data());
        });
    </script>
    <script>
        const fetchCountryState = "<?php echo e(route('jobs.fetchCountryState')); ?>";
        const csrfToken = "<?php echo e(csrf_token()); ?>";
        const selectCountry = "<?php echo app('translator')->get('modules.front.selectCountry'); ?>";
        const selectState = "<?php echo app('translator')->get('modules.front.selectState'); ?>";
        const selectCity = "<?php echo app('translator')->get('modules.front.selectCity'); ?>";
        const pleaseWait = "<?php echo app('translator')->get('modules.front.pleaseWait'); ?>";

        let country = "";
        let state = "";
    </script>
    <script src="<?php echo e(asset('front/assets/js/location.js')); ?>"></script>
    <script>
        $('.dob').datepicker({
            autoclose: true,
            format: 'yyyy-mm-dd',
            endDate: (new Date()).toDateString(),
        });

        
        $('.select2').select2({
            width: '100%'
        });
        
        $('.form-group span.select2.select2-container').addClass('form-control form-control-lg');

        $('#save-form').click(function () {
            $.easyAjax({
                url: '<?php echo e(route('jobs.saveApplication')); ?>',
                container: '#createForm',
                type: "POST",
                file:true,
                redirect: true,
                // data: $('#createForm').serialize(),
                success: function (response) {
                    if(response.status == 'success'){
                        var successMsg = '<div class="alert alert-success my-100" role="alert">' +
                            response.msg + ' <a class="" href="<?php echo e(route('jobs.jobOpenings')); ?>"><?php echo app('translator')->get("app.view"); ?> <?php echo app('translator')->get("modules.front.jobOpenings"); ?> <i class="fa fa-arrow-right"></i></a>'
                            '</div>';
                        $('.main-content .container').html(successMsg);
                    }
                },
                error: function (response) {
                   // console.log(response.responseText);
                    handleFails(response);
                }
            })
        });

        function handleFails(response) {
            if (typeof response.responseJSON.errors != "undefined") {
                var keys = Object.keys(response.responseJSON.errors);
                $('#createForm').find(".has-error").find(".help-block").remove();
                $('#createForm').find(".has-error").removeClass("has-error");

                for (var i = 0; i < keys.length; i++) {
                    // Escape dot that comes with error in array fields
                    var key = keys[i].replace(".", '\\.');
                    var formarray = keys[i];

                    // If the response has form array
                    if(formarray.indexOf('.') >0){
                        var array = formarray.split('.');
                        response.responseJSON.errors[keys[i]] = response.responseJSON.errors[keys[i]];
                        key = array[0]+'['+array[1]+']';
                    }

                    var ele = $('#createForm').find("[name='" + key + "']");

                    var grp = ele.closest(".form-group");
                    $(grp).find(".help-block").remove();

                    //check if wysihtml5 editor exist
                    var wys = $(grp).find(".wysihtml5-toolbar").length;

                    if(wys > 0){
                        var helpBlockContainer = $(grp);
                    }
                    else{
                        var helpBlockContainer = $(grp).find("div:first");
                    }
                    if($(ele).is(':radio')){
                        helpBlockContainer = $(grp);
                    }

                    if (helpBlockContainer.length == 0) {
                        helpBlockContainer = $(grp);
                    }

                    helpBlockContainer.append('<div class="help-block">' + response.responseJSON.errors[keys[i]] + '</div>');
                    $(grp).addClass("has-error");
                }

                if (keys.length > 0) {
                    var element = $("[name='" + keys[0] + "']");
                    if (element.length > 0) {
                        $("html, body").animate({scrollTop: element.offset().top - 150}, 200);
                    }
                }
            }
        }
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\kuliah\Belajar\web\laravel\SiRekrutV1\resources\views/front/job-apply.blade.php ENDPATH**/ ?>