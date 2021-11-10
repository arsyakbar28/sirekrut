<?php $__env->startPush('head-script'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/node_modules/html5-editor/bootstrap-wysihtml5.css')); ?>">
    <link rel="stylesheet"
          href="<?php echo e(asset('assets/node_modules/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/node_modules/multiselect/css/multi-select.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/iCheck/all.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <?php
        $required_columns = [
            'gender' => false,
            'dob' => false,
            'country' => false
        ];
        $requiredColumns = [
            'gender' => __('modules.front.gender'),
            'dob' => __('modules.front.dob'),
            'country' => __('modules.front.country')
        ];
        $section_visibility = [
            'profile_image' => 'yes',
            'resume' => 'yes',
            'cover_letter' => 'yes',
            'terms_and_conditions' => 'yes'
        ];
        $sectionVisibility = [
            'profile_image' => __('modules.jobs.profileImage'),
            'resume' => __('modules.jobs.resume'),
            'cover_letter' => __('modules.jobs.coverLetter'),
            'terms_and_conditions' => __('modules.jobs.termsAndConditions')
        ];
    ?>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Buat Baru</h4>
                    <?php if(count($locations) == 0): ?>
                        <div class="alert alert-danger alert-dismissible fade show">
                            <h4 class="alert-heading"><i class="fa fa-warning"></i> Job Location Empty!</h4>
                            <p>You do not have any Location created. You need to create the Job location first to add
                                the job .
                                <a href="<?php echo e(route('admin.locations.create')); ?>" class="btn btn-info btn-sm m-l-15"
                                   style="text-decoration: none;"><i
                                            class="fa fa-plus-circle"></i> Buat Lokasi Baru
                                </a>
                            </p>
                        </div>
                    <?php elseif(count($categories) == 0): ?>
                        <div class="alert alert-danger alert-dismissible fade show">
                            <h4 class="alert-heading"><i class="fa fa-warning"></i> Job Category Empty!</h4>
                            <p>You do not have any Job Category created. You need to create the Job location first to add
                                the job .
                                <a href="<?php echo e(route('admin.job-categories.create')); ?>" class="btn btn-info btn-sm m-l-15"
                                   style="text-decoration: none;"><i
                                            class="fa fa-plus-circle"></i> Buat Kategori Pekerjaan Baru
                                </a>
                            </p>
                        </div>
                    <?php else: ?>
                        <form class="ajax-form" method="POST" id="createForm">
                            <?php echo csrf_field(); ?>

                            <div class="row">
                                <div class="col-md-12">

                                    <div class="form-group">
                                        <label for="address">Perusahaan</label>
                                        <select name="company" class="form-control">
                                            <option value="">--</option>
                                            <?php $__currentLoopData = $companies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($comp->id); ?>"><?php echo e(ucwords($comp->company_name)); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>

                                </div>
                                <div class="col-md-12">

                                    <div class="form-group">
                                        <label for="address">Nama Pekerjaan</label>
                                        <input type="text" class="form-control" name="title">
                                    </div>

                                </div>
                                <div class="col-md-12">

                                    <div class="form-group">
                                        <label for="address">Deskripsi Pekerjaan</label>
                                        <textarea class="form-control" id="job_description" name="job_description"
                                                  rows="15" placeholder="Masukkan teks ..."></textarea>
                                    </div>

                                </div>
                                <div class="col-md-12">

                                    <div class="form-group">
                                        <label for="address">Persyaratan Pekerjaan</label>
                                        <textarea class="form-control" id="job_requirement" name="job_requirement"
                                                  rows="15" placeholder="Masukkan teks ..."></textarea>
                                    </div>

                                </div>

                                <div class="col-md-12">

                                    <div class="form-group">
                                        <label for="address">Lokasi Pekerjaan</label>
                                        <select name="location_id" id="location_id"
                                                class="form-control select2 custom-select">
                                            <?php $__currentLoopData = $locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $location): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($location->id); ?>"><?php echo e(ucfirst($location->location). ' ('.$location->country->country_code.')'); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>

                                </div>

                                <div class="col-md-12">

                                    <div class="form-group">
                                        <label for="address">Kategori Pekerjaan</label>
                                        <select name="category_id" id="category_id"
                                                class="form-control">
                                            <option value="">Pilih Kategori Pekerjaan</option>
                                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($category->id); ?>"><?php echo e(ucfirst($category->name)); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>

                                </div>

                                <div class="col-md-12">

                                    <div class="form-group">
                                        <label>Keahlian</label>
                                        <select class="select2 m-b-10 select2-multiple" id="job_skills"
                                                style="width: 100%; " multiple="multiple"
                                                data-placeholder="Tambah Keahlian"
                                                name="skill_id[]">
                                        </select>
                                    </div>


                                </div>

                                <div class="col-md-12">

                                    <div class="form-group">
                                        <label for="address">Total Posisi</label>
                                        <input type="number" class="form-control" name="total_positions"
                                               id="total_positions">
                                    </div>

                                </div>

                                <div class="col-md-12">

                                    <div class="form-group">
                                        <label for="address">Tanggal Dimulai</label>
                                        <input type="text" class="form-control" id="date-start"
                                               value="<?php echo e(\Carbon\Carbon::now()->format('Y-m-d')); ?>" name="start_date">
                                    </div>

                                </div>

                                <div class="col-md-12">

                                    <div class="form-group">
                                        <label for="address">Tanggal Berakhir</label>
                                        <input type="text" class="form-control" id="date-end" name="end_date"
                                               value="<?php echo e(\Carbon\Carbon::now()->addMonth(1)->format('Y-m-d')); ?>">
                                    </div>

                                </div>

                                <div class="col-md-12">

                                    <div class="form-group">
                                        <label for="address">Status</label>
                                        <select name="status" id="status" class="form-control">
                                            <option value="active">Aktif</option>
                                            <option value="inactive">Tidak Aktif</option>
                                        </select>
                                    </div>

                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="meta-title">Judul Meta</label>
                                        <input type="text" id="meta-title" class="form-control" name="meta_title">
                                    </div>
                                </div>
                                
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="meta-description">Deskripsi Meta</label>
                                        <textarea id="meta-description" class="form-control" name="meta_description" rows="3"></textarea>
                                    </div>
                                </div>

                                <hr>

                                <div class="col-md-12">
                                    <?php if(count($questions) > 0): ?>
                                    <h4 class="m-b-0 m-l-10 box-title">Questions</h4>
                                    <?php endif; ?>
                                    <?php $__empty_1 = true; $__currentLoopData = $questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <div class="form-group col-md-6">
                                            <label class="">
                                                <div class="icheckbox_flat-green" aria-checked="false"
                                                     aria-disabled="false" style="position: relative;">
                                                    <input type="checkbox" value="<?php echo e($question->id); ?>" name="question[]"
                                                           class="flat-red" style="position: absolute; opacity: 0;">
                                                    <ins class="iCheck-helper"
                                                         style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                                </div>
                                                <?php echo e(ucfirst($question->question)); ?> <?php if($question->required == 'yes'): ?>
                                                    (Dibutuhkan)<?php endif; ?>
                                            </label>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <?php endif; ?>
                                </div>

                                <div class="col-md-12">
                                    <div id="columns">
                                        <label>Minta Pelamar Untuk</label>
                                        <div class="form-group form-group-inline">
                                            <?php $__currentLoopData = $required_columns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <label class="mr-4">
                                                    <div class="icheckbox_flat-green" aria-checked="false" aria-disabled="false" style="position: relative;">
                                                        <input  <?php if($value): ?> checked <?php endif; ?> type="checkbox" value="<?php echo e($key); ?>" name="<?php echo e($key); ?>" class="flat-red"  style="position: absolute; opacity: 0;">
                                                        <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                                    </div>
                                                    <?php echo e(ucfirst(__($requiredColumns[$key]))); ?>

                                                </label>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    </div>        
                                </div>

                                <div class="col-md-12">
                                    <div id="columns">
                                        <label>Visibilitas Bagian</label>
                                        <div class="form-group form-group-inline">
                                            <?php $__currentLoopData = $section_visibility; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <label class="mr-4">
                                                    <div class="icheckbox_flat-green" aria-checked="false" aria-disabled="false" style="position: relative;">
                                                        <input  <?php if($value == 'yes'): ?> checked <?php endif; ?> type="checkbox" value="yes" name="<?php echo e($key); ?>" class="flat-red"  style="position: absolute; opacity: 0;">
                                                        <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                                    </div>
                                                    <?php echo e(ucfirst(__($sectionVisibility[$key]))); ?>

                                                </label>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    </div>        
                                </div>
                            </div>

                            <button type="button" id="save-form" class="btn btn-success"><i
                                        class="fa fa-check"></i> Simpan</button>

                        </form>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('footer-script'); ?>
    <script src="<?php echo e(asset('assets/node_modules/select2/dist/js/select2.full.min.js')); ?>"
            type="text/javascript"></script>
    <script src="<?php echo e(asset('assets/node_modules/bootstrap-select/bootstrap-select.min.js')); ?>"
            type="text/javascript"></script>
    <script src="<?php echo e(asset('assets/node_modules/html5-editor/wysihtml5-0.3.0.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('assets/node_modules/html5-editor/bootstrap-wysihtml5.js')); ?>"
            type="text/javascript"></script>
    <script src="<?php echo e(asset('assets/node_modules/moment/moment.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('assets/node_modules/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js')); ?>"
            type="text/javascript"></script>
    <script src="<?php echo e(asset('assets/node_modules/multiselect/js/jquery.multi-select.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/plugins/iCheck/icheck.min.js')); ?>"></script>

    <script>
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red').iCheck({
            checkboxClass: 'icheckbox_flat-blue',
        })

        // For select 2
        $(".select2").select2();

        $('#date-end').bootstrapMaterialDatePicker({weekStart: 0, time: false});
        $('#date-start').bootstrapMaterialDatePicker({weekStart: 0, time: false}).on('change', function (e, date) {
            $('#date-end').bootstrapMaterialDatePicker('setMinDate', date);
            $('#date-end').val(moment(date).add(1, 'month').format('YYYY-MM-DD'));
        });

        var jobDescription = $('#job_description').wysihtml5({
            "font-styles": true, //Font styling, e.g. h1, h2, etc. Default true
            "emphasis": true, //Italics, bold, etc. Default true
            "lists": true, //(Un)ordered lists, e.g. Bullets, Numbers. Default true
            "html": true, //Button which allows you to edit the generated HTML. Default false
            "link": true, //Button to insert a link. Default true
            "image": true, //Button to insert an image. Default true,
            "color": true, //Button to change color of font
            stylesheets: ["<?php echo e(asset('assets/node_modules/html5-editor/wysiwyg-color.css')); ?>"], // (path_to_project/lib/css/wysiwyg-color.css)
        });

        $('#job_requirement').wysihtml5({
            "font-styles": true, //Font styling, e.g. h1, h2, etc. Default true
            "emphasis": true, //Italics, bold, etc. Default true
            "lists": true, //(Un)ordered lists, e.g. Bullets, Numbers. Default true
            "html": true, //Button which allows you to edit the generated HTML. Default false
            "link": true, //Button to insert a link. Default true
            "image": true, //Button to insert an image. Default true,
            "color": true, //Button to change color of font
            stylesheets: ["<?php echo e(asset('assets/node_modules/html5-editor/wysiwyg-color.css')); ?>"], // (path_to_project/lib/css/wysiwyg-color.css)

        });

        $('#category_id').change(function () {

            var id = $(this).val();

            var url = "<?php echo e(route('admin.job-categories.getSkills', ':id')); ?>";
            url = url.replace(':id', id);

            $.easyAjax({
                url: url,
                success: function (response) {
                    $('#job_skills').html(response.data);
                    $(".select2").select2();
                }
            })
        });


        $('#save-form').click(function () {

            $.easyAjax({
                url: '<?php echo e(route('admin.jobs.store')); ?>',
                container: '#createForm',
                type: "POST",
                redirect: true,
                data: $('#createForm').serialize()
            })
        });


    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\kuliah\Belajar\web\laravel\SiRekrutV1\resources\views/admin/jobs/create.blade.php ENDPATH**/ ?>