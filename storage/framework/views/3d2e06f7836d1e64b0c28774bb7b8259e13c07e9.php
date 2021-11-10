<link rel="stylesheet" href="<?php echo e(asset('assets/plugins/jquery-bar-rating-master/dist/themes/fontawesome-stars.css')); ?>">
<style>

    .right-panel-box {
        overflow-x: scroll;
        max-height: 34rem;
    }

    .resume-button {
        text-align: center;
        margin-top: 1rem
    }


</style>
<div class="rpanel-title"> <?php echo app('translator')->get('menu.jobApplications'); ?> <span><i class="ti-close right-side-toggle"></i></span></div>
<div class="r-panel-body p-3">

    <div class="row font-12">
        <div class="col-4">
            <img src="<?php echo e($application->photo_url); ?>" class="img-circle img-fluid">

            
            <p class="text-muted resume-button" id="resume-<?php echo e($application->id); ?>">
                <?php if($application->resume_url): ?>
                    <a target="_blank" href="<?php echo e($application->resume_url); ?>"
                    class="btn btn-sm btn-primary">
                        Tampilkan Resume
                    </a>
                <?php endif; ?>
            </p>
            
            <?php if($user->can('edit_job_applications')): ?>
                <div class="stars stars-example-fontawesome text-center">
                    <select id="example-fontawesome" name="rating" autocomplete="off">
                        <option value=""></option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>
            <?php endif; ?>
            <?php if($application->status->status == 'hired' && is_null($application->onboard)): ?>
                <p class="text-muted resume-button">
                    <a href="<?php echo e(route('admin.job-onboard.create')); ?>?id=<?php echo e($application->id); ?>"
                       class="btn btn-sm btn-success"><?php echo app('translator')->get('app.startOnboard'); ?></a>
                </p>
           <?php endif; ?>
           <?php if($user->can('delete_job_applications')): ?>
                <div class="text-muted resume-button">
                    <a href="javascript:archiveApplication(<?php echo e($application->id); ?>)" class="btn btn-sm btn-info">
                        Arsip pelamar
                    </a>
                </div>
                <div class="text-muted resume-button">
                    <a href="javascript:deleteApplication(<?php echo e($application->id); ?>)" class="btn btn-sm btn-danger">
                        Hapus pelamar
                    </a>
                </div>
           <?php endif; ?>
        </div>

        <div class="col-8 right-panel-box">
            <div class="col-sm-12">
                <strong>Nama</strong><br>
                <p class="text-muted"><?php echo e(ucwords($application->full_name)); ?></p>
            </div>

            <div class="col-sm-12">
                <strong>Melamar Untuk</strong><br>
                <p class="text-muted"><?php echo e(ucwords($application->job->title).' ('.ucwords($application->job->location->location).')'); ?></p>
            </div>

            <div class="col-sm-12">
                <strong>Email</strong><br>
                <p class="text-muted"><?php echo e($application->email); ?></p>
            </div>

            <div class="col-sm-12">
                <strong>No. Handphone</strong><br>
                <p class="text-muted"><?php echo e($application->phone); ?></p>
            </div>

            <div class="col-sm-12">
                <div class="row">
                    <?php if(!is_null($application->gender)): ?>
                        <div class="col-sm-12 col-md-4">
                            <strong>Jenis Kelamin</strong><br>
                            <p class="text-muted" id="gender-<?php echo e($application->id); ?>"><?php echo e(ucfirst($application->gender)); ?></p>
                        </div>
                    <?php endif; ?>
                    <?php if(!is_null($application->dob)): ?>
                        <div class="col-sm-12 col-md-4">
                            <strong><?php echo app('translator')->get('app.dob'); ?></strong><br>
                            <p class="text-muted" id="dob-<?php echo e($application->id); ?>"><?php echo e($application->dob->format('jS F, Y')); ?></p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <?php if(!is_null($application->country)): ?>
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col">
                            <strong>Negara</strong><br>
                            <p class="text-muted" id="country-<?php echo e($application->id); ?>"><?php echo e($application->country); ?></p>
                        </div>
                        <div class="col">
                            <strong>Provinsi</strong><br>
                            <p class="text-muted" id="state-<?php echo e($application->id); ?>"><?php echo e($application->state); ?></p>
                        </div>
                        <div class="col">
                            <strong>Kota</strong><br>
                            <p class="text-muted" id="city-<?php echo e($application->id); ?>"><?php echo e($application->city); ?></p>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <div class="col-sm-12">
                <strong>Melamar</strong><br>
                <p class="text-muted"><?php echo e($application->created_at->format('d M, Y H:i')); ?></p>
            </div>
            <div class="col-sm-12">
                <h4>Detail Tambahan</h4>
                <?php $__empty_1 = true; $__currentLoopData = $answers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $answer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <strong>
                        <?php echo e($answer->question->question); ?>

                    </strong><br>
                    <p class="text-muted"><?php echo e(ucfirst($answer->answer)); ?></p>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <?php endif; ?>
            </div>
            <?php if(!is_null($application->schedule)): ?>
                <hr>

                <h5>Detail Jadwal</h5>
                <div class="col-sm-12">
                    <strong>Tanggal Jadwal</strong><br>
                    <p class="text-muted"><?php echo e($application->schedule->schedule_date->format('d M, Y H:i')); ?></p>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <strong>Karyawan Yang Ditugaskan</strong><br>
                    </div>
                    <div class="col-sm-6">
                        <strong>Respon Karyawan</strong><br>
                    </div>
                    <?php $__empty_1 = true; $__currentLoopData = $application->schedule->employee; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $emp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <div class="col-sm-6">
                            <p class="text-muted"><?php echo e(ucwords($emp->user->name)); ?></p>
                        </div>

                        <div class="col-sm-6">
                            <?php if($emp->user_accept_status == 'accept'): ?>
                                <label class="badge badge-success"><?php echo e(ucwords($emp->user_accept_status)); ?></label>
                            <?php elseif($emp->user_accept_status == 'refuse'): ?>
                                <label class="badge badge-danger"><?php echo e(ucwords($emp->user_accept_status)); ?></label>
                            <?php else: ?>
                                <label class="badge badge-warning"><?php echo e(ucwords($emp->user_accept_status)); ?></label>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <?php endif; ?>
                </div>

            <?php endif; ?>

            <?php if(isset($application->schedule->comments) == 'interview' && count($application->schedule->comments) > 0): ?>
                <hr>

                <h5>Komentar</h5>
                <?php $__empty_1 = true; $__currentLoopData = $application->schedule->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                    <div class="col-sm-12">
                        <p class="text-muted"><b><?php echo e($comment->user->name); ?>:</b> <?php echo e($comment->comment); ?></p>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <?php endif; ?>

            <?php endif; ?>
            <div class="col-sm-12">
                <p class="text-muted">
                    <?php if(!is_null($application->skype_id)): ?>
                        <span class="skype-button rounded" data-contact-id="live:<?php echo e($application->skype_id); ?>"
                              data-text="Call"></span>
                    <?php endif; ?>
                </p>
            </div>
            <div class="row">
                <?php if($user->can('add_schedule') && $application->status->status == 'interview' && is_null($application->schedule)): ?>
                    <div class="col-sm-6">
                        <p class="text-muted">
                            <a onclick="createSchedule('<?php echo e($application->id); ?>')" href="javascript:;"
                               class="btn btn-sm btn-info">Jadwal Interview</a>
                        </p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <?php if($user->can('edit_job_applications')): ?>
            <div class="col-12" id="skills-container">
                <hr>
                <div class="col-sm-12 mb-3">
                    <h5>Keahlian</h5>
                </div>
                <div class="form-group mb-2">
                    <select name="skills[]" id="skills" class="form-control select2 custom-select" multiple>
                        <?php $__empty_1 = true; $__currentLoopData = $skills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <option <?php if(!is_null($application->skills) && in_array($skill->id, $application->skills)): ?> selected <?php endif; ?> value="<?php echo e($skill->id); ?>"><?php echo e($skill->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <?php endif; ?>
                    </select>
                </div>
                <a href="javascript:addSkills(<?php echo e($application->id); ?>);" id="add-skills" class="btn btn-sm btn-outline-success">
                    <?php if(!is_null($application->skills) && sizeof($application->skills) > 0): ?>
                        Ubah Keahlian
                    <?php else: ?>
                        Tambah Keahlian
                    <?php endif; ?>
                </a>
            </div>
        <?php endif; ?>
        <div class="col-12">
            <hr>
            <div class="col-sm-12 mb-3">
                <h5>Catatan Pelamar</h5>
            </div>

            <div id="applicant-notes" class="col-sm-12">
                <ul class="list-unstyled">
                    <?php $__currentLoopData = $application->notes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $notes): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="media mb-3" id="note-<?php echo e($notes->id); ?>">
                            <div class="media-body">
                                <h6 class="mt-0 mb-1"><?php echo e(ucwords($notes->user->name)); ?>

                                    <span class="pull-right font-italic font-weight-light"><small> <?php echo e($notes->created_at->diffForHumans()); ?> </small>
                                        <?php if($user->can('edit_job_applications')): ?>
                                            <a href="javascript:;" class="edit-note" data-note-id="<?php echo e($notes->id); ?>"><i class="fa fa-edit ml-2"></i></a>
                                            <a href="javascript:;" class="delete-note" data-note-id="<?php echo e($notes->id); ?>"><i class="fa fa-trash ml-1 text-danger"></i></a>
                                        <?php endif; ?>
                                </span>
                                </h6>
                                <small class="note-text"><?php echo e(ucfirst($notes->note_text)); ?></small>
                                <div class="note-textarea"></div>
                            </div>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>

            <?php if($user->can('edit_job_applications')): ?>
                <div class="col-sm-12">
                    <div class="form-group mb-2">
                        <textarea name="note" id="note_text" cols="30" rows="2" class="form-control"></textarea>
                    </div>
                    <a href="javascript:;" id="add-note" class="btn btn-sm btn-outline-primary">Tambahkan Catatan</a>
                </div>
            <?php endif; ?>

        </div>


    </div>

</div>
<?php if($user->can('edit_job_applications')): ?>
    <script src="<?php echo e(asset('assets/plugins/jquery-bar-rating-master/dist/jquery.barrating.min.js')); ?>"
            type="text/javascript"></script>
    <script>
        $('#example-fontawesome').barrating({
            theme: 'fontawesome-stars',
            showSelectedRating: false,
            onSelect: function (value, text, event) {
                if (event !== undefined && value !== '') {
                    var url = "<?php echo e(route('admin.job-applications.rating-save',':id')); ?>";
                    url = url.replace(':id', <?php echo e($application->id); ?>);
                    var token = '<?php echo e(csrf_token()); ?>';
                    var id = <?php echo e($application->id); ?>;
                    $.easyAjax({
                        type: 'Post',
                        url: url,
                        container: '#example-fontawesome',
                        data: {'rating': value, '_token': token},
                        success: function (response) {
                            $('#example-fontawesome_' + id).barrating('set', value);
                        }
                    });
                }

            }
        });
        <?php if($application->rating !== null): ?>
        $('#example-fontawesome').barrating('set', <?php echo e($application->rating); ?>);
        <?php endif; ?>

    </script>
<?php endif; ?>
<script>
    $('.select2#skills').select2();

    function addSkills(applicationId) {
        let url = "<?php echo e(route('admin.job-applications.addSkills', ':id')); ?>";
        url = url.replace(':id', applicationId);

        $.easyAjax({
            url: url,
            type: 'POST',
            container: '#skills-container',
            data: {
                _token: '<?php echo e(csrf_token()); ?>',
                skills: $('#skills').val()
            },
            success: function (response) {
                if (response.status === 'success') {
                    $("body").removeClass("control-sidebar-slide-open");
                    if (typeof table !== 'undefined') {
                        table._fnDraw();
                    }
                    else {
                        loadData();
                    }
                }
            }
        })

    }

    function deleteApplication(applicationId) {
        swal({
            title: "Apakah Anda Yakin?",
            text: "Peringatan Untuk Menghapus",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Hapus",
            cancelButtonText: "Batalkan",
            closeOnConfirm: true,
            closeOnCancel: true
        }, function(isConfirm){
            if (isConfirm) {

                var url = "<?php echo e(route('admin.job-applications.destroy', ':id')); ?>";
                url = url.replace(':id', applicationId);

                var token = '<?php echo e(csrf_token()); ?>';

                $.easyAjax({
                    type: 'POST',
                    url: url,
                    data: {'_token':token, '_method': 'DELETE'},
                    success: function (response) {
                        $("body").removeClass("control-sidebar-slide-open");
                        if (response.status === 'success') {
                            if (typeof table !== 'undefined') {
                                table._fnDraw();
                            }
                            else {
                                loadData();
                            }
                        }
                    }
                });
            }
        });
    }

    function archiveApplication(applicationId) {
        swal({
            title: "Apakah Anda Yakin",
            text: "Peringatan Pengarsipan",
            type: "info",
            showCancelButton: true,
            confirmButtonColor: "#28A745",
            confirmButtonText: "Ya",
            cancelButtonText: "Tidak",
            closeOnConfirm: true,
            closeOnCancel: true
        }, function(isConfirm){
            if (isConfirm) {

                var url = "<?php echo e(route('admin.job-applications.archiveJobApplication', ':id')); ?>";
                url = url.replace(':id', applicationId);

                var token = '<?php echo e(csrf_token()); ?>';

                $.easyAjax({
                    type: 'POST',
                    url: url,
                    data: {'_token':token},
                    success: function (response) {
                        $("body").removeClass("control-sidebar-slide-open");
                        if (response.status === 'success') {
                            if (typeof table !== 'undefined') {
                                table._fnDraw();
                            }
                            else {
                                loadData();
                            }
                        }
                    }
                });
            }
        });
    }

    $('#add-note').click(function () {
        var url = "<?php echo e(route('admin.applicant-note.store')); ?>";
        var id = <?php echo e($application->id); ?>;
        var note = $('#note_text').val();
        var token = '<?php echo e(csrf_token()); ?>';

        $.easyAjax({
            type: 'POST',
            url: url,
            data: {'_token':token, 'id':id, 'note': note},
            success: function (response) {
                if(response.status == 'success') {
                    $('#applicant-notes').html(response.view);
                    $('#note_text').val('');
                }
            }
        });
    });

    $('body').on('click', '.edit-note', function() {
        $(this).hide();
        let noteId = $(this).data('note-id');
        $('body').find('#note-'+noteId+' .note-text').hide();

        let noteText = $('body').find('#note-'+noteId+' .note-text').html();
        let textArea = '<textarea id="edit-note-text-'+noteId+'" class="form-control" row="4">'+noteText+'</textarea><a class="update-note" data-note-id="'+noteId+'" href="javascript:;"><i class="fa fa-check"></i> <?php echo app('translator')->get("app.save"); ?></a>';
        $('body').find('#note-'+noteId+' .note-textarea').html(textArea);
    });

    $('body').on('click', '.update-note', function () {
        let noteId = $(this).data('note-id');

        var url = "<?php echo e(route('admin.applicant-note.update', ':id')); ?>";
        url = url.replace(':id', noteId);

        var note = $('#edit-note-text-'+noteId).val();
        var token = '<?php echo e(csrf_token()); ?>';

        $.easyAjax({
            type: 'POST',
            url: url,
            data: {'_token':token, 'noteId':noteId, 'note': note, '_method': 'PUT'},
            success: function (response) {
                if(response.status == 'success') {
                    $('#applicant-notes').html(response.view);
                }
            }
        });
    });

    $('body').on('click', '.delete-note', function(){
        let noteId = $(this).data('note-id');
        swal({
            title: "Apakah Anda Yakin?",
            text: "Peringatan Untuk Menghapus",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Hapus",
            cancelButtonText: "Batalkan",
            closeOnConfirm: true,
            closeOnCancel: true
        }, function(isConfirm){
            if (isConfirm) {

                var url = "<?php echo e(route('admin.applicant-note.destroy', ':id')); ?>";
                url = url.replace(':id', noteId);

                var token = '<?php echo e(csrf_token()); ?>';

                $.easyAjax({
                    type: 'POST',
                    url: url,
                    data: {'_token':token, '_method': 'DELETE'},
                    success: function (response) {
                        if(response.status == 'success') {
                            $('#applicant-notes').html(response.view);
                        }
                    }
                });
            }
        });
    });
</script>
<?php if(!is_null($application->skype_id)): ?>
    <script src="https://swc.cdn.skype.com/sdk/v1/sdk.min.js"></script>
<?php endif; ?><?php /**PATH D:\kuliah\Belajar\web\laravel\SiRekrutV1\resources\views/admin/job-applications/show.blade.php ENDPATH**/ ?>