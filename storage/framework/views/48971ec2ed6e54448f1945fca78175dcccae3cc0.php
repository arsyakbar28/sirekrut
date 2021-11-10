<?php if(count($jobQuestion) > 0): ?>
    <?php $__empty_1 = true; $__currentLoopData = $jobQuestion; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <div class="form-group">
            <label class="control-label" for="answer[<?php echo e($question->id); ?>]">
                <?php echo e($question->question); ?>

            </label>
            <input
                class="form-control"
                type="text"
                id="answer[<?php echo e($question->id); ?>]"
                name="answer[<?php echo e($question->id); ?>]"
                placeholder="Jawaban Anda"
                <?php if(count($question->answers) > 0): ?> value="<?php echo e($question->answers->first()->answer); ?>" <?php endif; ?>
            >
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
    <?php endif; ?>
<?php endif; ?><?php /**PATH D:\kuliah\Belajar\web\laravel\SiRekrutV1\resources\views/admin/job-applications/job-question.blade.php ENDPATH**/ ?>