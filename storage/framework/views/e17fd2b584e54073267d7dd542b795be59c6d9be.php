<?php if($job->required_columns['gender']): ?>
    <label class="control-label">Jenis Kelamin</label>
    <div class="form-group">
        <div class="form-inline">
            <?php $__currentLoopData = $gender; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="form-check form-check-inline">
                    <input <?php if(!empty($application) && $key == $application->gender): ?> checked <?php endif; ?> class="form-check-input" type="radio" name="gender" id="<?php echo e($key); ?>" value="<?php echo e($key); ?>">
                    <label class="form-check-label" for="<?php echo e($key); ?>"><?php echo e(ucFirst($value)); ?></label>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
<?php endif; ?>
<?php if($job->required_columns['dob']): ?>
    <div class="form-group">
        <label class="control-label"><?php echo app('translator')->get('modules.front.dob'); ?></label>
        <input class="form-control form-control-lg dob" type="text" name="dob"
            placeholder="<?php echo app('translator')->get('modules.front.dob'); ?>" autocomplete="none">
    </div>
<?php endif; ?>
<?php if($job->required_columns['country']): ?>
    <div class="row">
        <div class="col-md-12">
            <h6>
                <strong>
                    Negara
                </strong>
            </h6>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <select class="select2 countries" name="country" id="countryId">
                    <option value="0">Pilih Negara</option>
                </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <select class="select2 states" name="state" id="stateId">
                    <option value="0">Pilih Provinsi</option>
                </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <input class="form-control" type="text" name="city" id="cityId" placeholder="Pilih Kota" value="<?php echo e(!empty($application) ? $application->cover_letter : ''); ?>">
            </div>
        </div>
    </div>
<?php endif; ?><?php /**PATH D:\kuliah\Belajar\web\laravel\SiRekrutV1\resources\views/admin/job-applications/required-columns.blade.php ENDPATH**/ ?>