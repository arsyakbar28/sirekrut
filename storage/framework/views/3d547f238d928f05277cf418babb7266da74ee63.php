<?php if($section_visibility['profile_image'] == 'yes'): ?>
    <div class="row b-b">
        <div class="col-md-8 offset-md-4">
            <div class="form-group">
                <h6>
                    <strong>
                        Foto
                    </strong>
                </h6>
                <input class="select-file" accept=".png,.jpg,.jpeg" type="file" name="photo"><br>
                <span>Tipe File Foto</span>
            </div>
            <?php if(!empty($application) && !is_null($application->photo)): ?>
                <p>
                    <a target="_blank" href="<?php echo e(asset('user-uploads/candidate-photos/'.$application->photo)); ?>" class="btn btn-sm btn-primary">Tampilkan</a>
                </p>
            <?php endif; ?>
        </div>
    </div>
<?php endif; ?>

<div class="row b-b">
    <?php if($section_visibility['resume'] == 'yes'): ?>
        <div class="col-md-4 pl-4 pr-4 pb-4 pt-4 b-b">
            <h5>Resume</h5>
        </div>
        
        
        <div class="col-md-8 pb-4 pt-4 b-b">
            <div class="form-group">
                <input class="select-file" accept=".png,.jpg,.jpeg,.pdf,.doc,.docx,.xls,.xlsx,.rtf" type="file"
                    name="resume"><br>
                <span>Tipe File Resume</span>
            </div>
            <?php if(!empty($application) && $application->resume_url): ?>
                <p>
                    <a target="_blank" href="<?php echo e($application->resume_url); ?>" class="btn btn-sm btn-primary">
                        Tampilkan
                    </a>
                </p>
            <?php endif; ?>
        </div>
    <?php endif; ?>
    <?php if($section_visibility['cover_letter'] == 'yes'): ?>
        <div class="col-md-4 pl-4 pr-4 pt-4 b-b">
            <h5>Sampul Surat</h5>
        </div>
        
        
        <div class="col-md-8 pt-4 b-b">
        
            <div class="form-group">
                <textarea class="form-control" name="cover_letter" rows="4"><?php echo e(!empty($application) ? $application->city : ''); ?></textarea>
            </div>
        </div>
    <?php endif; ?>
</div><?php /**PATH D:\kuliah\Belajar\web\laravel\SiRekrutV1\resources\views/admin/job-applications/required-sections.blade.php ENDPATH**/ ?>