<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Buat Baru</h4>

                    <form class="ajax-form" method="POST" id="createForm">
                        <?php echo csrf_field(); ?>

                        <div class="row">
                            <div class="col-md-9">

                                <div class="form-group">
                                    <label for="address">Negara</label>
                                    <select name="country_id" id="country_id"
                                            class="form-control select2 custom-select">
                                        <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($country->id); ?>"><?php echo e(ucfirst($country->country_name)); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>

                            </div>
                        </div>

                        <div id="education_fields">
                            <div class="row">
                                <div class="col-sm-9 nopadding">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="text" name="locations[]" class="form-control"
                                                    placeholder="Nama Lokasi">
                                            <div class="input-group-append">
                                                <button class="btn btn-success" type="button" id="add-more">
                                                    <i class="fa fa-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
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

        var room = 1;

        $('#add-more').click(function () {
            room++;

            var divtest = `
                <div class="row removeclass${room}">
                    <div class="col-sm-9 nopadding">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" name="locations[]" class="form-control" placeholder="Nama Lokasi">
                                <div class="input-group-append"> 
                                    <button class="btn btn-danger" type="button" onclick="remove_education_fields(${room});">
                                        <i class="fa fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>`;

            $('#education_fields').append(divtest);
            $(`.removeclass${room} input`).focus();
        })

        function remove_education_fields(rid) {
            $('.removeclass' + rid).remove();
        }

        $('#save-form').click(function () {
            $.easyAjax({
                url: '<?php echo e(route('admin.locations.store')); ?>',
                container: '#createForm',
                type: "POST",
                redirect: true,
                data: $('#createForm').serialize()
            })
        });
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SiRekrutV1\resources\views/admin/locations/create.blade.php ENDPATH**/ ?>