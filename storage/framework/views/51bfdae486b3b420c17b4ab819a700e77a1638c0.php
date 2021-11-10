 <?php $__env->startPush('head-script'); ?>
<link rel="stylesheet" href="<?php echo e(asset('assets/node_modules/dropify/dist/css/dropify.min.css')); ?>"> 
<?php $__env->stopPush(); ?> 
<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Buat Baru</h4>

                <form id="editSettings" class="ajax-form">
                    <?php echo csrf_field(); ?>

                    <div class="form-group">
                        <label for="company_name">Nama Perusahaan</label>
                        <input type="text" class="form-control" id="company_name" name="company_name">
                    </div>
                    <div class="form-group">
                        <label for="company_email">Email Perusahaan</label>
                        <input type="email" class="form-control" id="company_email" name="company_email">
                    </div>
                    <div class="form-group">
                        <label for="company_phone">Nomor telepon Perusahaan</label>
                        <input type="tel" class="form-control" id="company_phone" name="company_phone">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Website Perusahaan</label>
                        <input type="text" class="form-control" id="website" name="website">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Logo Perusahaan</label>
                        <div class="card">
                            <div class="card-body">
                                <input type="file" id="input-file-now" name="logo" class="dropify" data-default-file="<?php echo e(asset('logo-not-found.png')); ?>"
                                />
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="address">Alamat Perusahaan</label>
                        <textarea class="form-control" id="address" rows="5" name="address"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="address">Tampilkan Perusahaan?</label>
                        <select name="show_in_frontend" id="show_in_frontend" class="form-control">
                                    <option value="true">Iya</option>
                                    <option value="false">Tidak</option>
                                </select>
                    </div>

                    <button type="button" id="save-form" class="btn btn-success waves-effect waves-light m-r-10">
                            Simpan
                        </button>
                    <button type="reset" class="btn btn-inverse waves-effect waves-light">Atur Ulang</button>
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

<script>
    // For select 2
        $(".select2").select2();

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
                url: '<?php echo e(route("admin.company.store")); ?>',
                container: '#editSettings',
                type: "POST",
                redirect: true,
                file: true
            })
        });
</script>



<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\kuliah\Belajar\web\laravel\SiRekrutV1\resources\views/admin/company/create.blade.php ENDPATH**/ ?>