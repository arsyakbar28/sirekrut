<div class="modal-header">
    <h4 class="modal-title">
        <i class="icon-plus"></i> <?php echo app('translator')->get('modules.jobApplication.createStatus'); ?>
    </h4>
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
        <i class="fa fa-times"></i>
    </button>
</div>
<div class="modal-body">
    <form id="createStatus" class="ajax-form" method="post">
        <?php echo csrf_field(); ?>
        <div class="form-body">
            <div class="row">
                <div class="col-xs-12 col-md-6">
                    <div class="form-group">
                        <label class="d-block control-label">Nama Status</label>
                        <input type="text" id="status_name" name="status_name" class="form-control">
                    </div>
                </div>
                <div class="col-xs-12 col-md-6">
                    <label class="d-block control-label">Warna Status</label>
                    <div id="cp2" class="input-group">
                        <input type="text" class="form-control input-lg" name="status_color" value="#DD0F20"/>
                        <span class="input-group-append">
                            <span class="input-group-text colorpicker-input-addon"><i></i></span>
                        </span>
                    </div>
                </div>
                <div class="col-xs-12 col-md-6">
                    <label class="d-block control-label">Posisi Status</label>
                    <select name="status_position" id="status_position" class="select2 form-control">
                        <?php $__currentLoopData = $statuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($status->position); ?>"><?php echo e('After '.ucwords($status->status)); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>
        </div>
    </form>

</div>
<div class="modal-footer">
    <button type="button" class="btn dark btn-outline" data-dismiss="modal">Tutup</button>
    <button type="button" class="btn btn-success" onclick="javascript:saveStatus();">Kirim</button>
</div>

<script>
    $(function() {
        $('#cp2').colorpicker();
    });
</script>
<?php /**PATH D:\kuliah\Belajar\web\laravel\SiRekrutV1\resources\views/admin/job-applications/create-status.blade.php ENDPATH**/ ?>