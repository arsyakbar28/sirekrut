<?php $__env->startPush('head-script'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/node_modules/dropify/dist/css/dropify.min.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $smtpSetting->set_smtp_message; ?>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Buat Baru</h4>

                    <form id="editSettings" class="ajax-form">
                        <?php echo csrf_field(); ?>

                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                        <div class="form-group">
                            <label>No. Handphone</label>
                            <div class="form-row">
                                <div class="col-sm-3">
                                    <select name="calling_code" id="calling_code" class="form-control selectpicker" data-live-search="true" data-width="100%" >
                                        <?php $__currentLoopData = $calling_codes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $code => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($value['dial_code']); ?>"><?php echo e($value['dial_code'] . ' - ' . $value['name']); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="mobile">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Gambar</label>
                            <div class="card">
                                <div class="card-body">
                                    <input type="file" id="input-file-now" name="image" accept=".png,.jpg,.jpeg"
                                           class="dropify"
                                           data-default-file="<?php echo e(asset('avatar.png')); ?>"
                                    />
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="company_phone">Nama Role</label>
                            <select class="form-control" name="role_id" id="role_id">
                                <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($role->id); ?>"><?php echo e($role->display_name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>

                        <button type="button" id="save-form"
                                class="btn btn-success waves-effect waves-light m-r-10">
                            Simpan
                        </button>
                        <button type="reset"
                                class="btn btn-inverse waves-effect waves-light">Atur Ulang</button>
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

        $('#save-form').click(function () {
            $.easyAjax({
                url: '<?php echo e(route('admin.team.store')); ?>',
                container: '#editSettings',
                type: "POST",
                redirect: true,
                file: true
            })
        });
    </script>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\kuliah\Belajar\web\laravel\SiRekrutV1\resources\views/admin/team/create.blade.php ENDPATH**/ ?>