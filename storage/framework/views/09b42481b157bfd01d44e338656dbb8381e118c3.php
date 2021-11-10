<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Ubah</h4>

                    <form class="ajax-form" method="POST" id="createForm">
                        <?php echo csrf_field(); ?>

                        <input name="_method" type="hidden" value="PUT">

                        <div class="row">
                            <div class="col-md-9">

                                <div class="form-group">
                                    <label for="address">Negara</label>
                                    <select name="country_id" id="country_id"
                                            class="form-control select2 custom-select">
                                        <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option <?php if($country->id == $location->country_id): ?> selected <?php endif; ?> value="<?php echo e($country->id); ?>"><?php echo e(ucfirst($country->country_name)); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>

                            </div>
                        </div>


                        <div id="education_fields"></div>
                        <div class="row">
                            <div class="col-sm-9 nopadding">
                                <div class="form-group">
                                        <input type="text" name="location" class="form-control" value="<?php echo e($location->location); ?>"
                                               placeholder="Nama Lokasi">
                                </div>
                            </div>
                        </div>

                        <button type="button" id="save-form" class="btn btn-success"><i
                                    class="fa fa-check"></i> Simpan</button>

                    </form>
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

    <script>
        // For select 2
        $(".select2").select2();

        $('#save-form').click(function () {
            $.easyAjax({
                url: '<?php echo e(route('admin.locations.update', $location->id)); ?>',
                container: '#createForm',
                type: "POST",
                redirect: true,
                data: $('#createForm').serialize()
            })
        });
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\kuliah\Belajar\web\laravel\SiRekrutV1\resources\views/admin/locations/edit.blade.php ENDPATH**/ ?>