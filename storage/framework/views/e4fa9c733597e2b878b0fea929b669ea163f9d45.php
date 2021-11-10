<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title"><?php echo app('translator')->get('app.createNew'); ?></h4>

                    <form class="ajax-form" method="POST" id="createForm" onsubmit="return false;">
                        <?php echo csrf_field(); ?>

                    <div id="education_fields">
                        <div class="row">
                            <div class="col-sm-9 nopadding">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" name="name[]" class="form-control" placeholder="<?php echo app('translator')->get('menu.jobCategories'); ?> <?php echo app('translator')->get('app.name'); ?>">
                                        <div class="input-group-append">
                                            <button class="btn btn-success" type="button" id="add-more"><i class="fa fa-plus"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <button type="button" id="save-form" class="btn btn-success"><i class="fa fa-check"></i> <?php echo app('translator')->get('app.save'); ?></button>

                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('footer-script'); ?>
<script>
    var room = 1;

    $('#add-more').click(function(){
        room++;

        var divtest = `
            <div class="row removeclass${room}">
                <div class="col-sm-9 nopadding">
                    <div class="form-group">
                        <div class="input-group">
                            <input type="text" name="name[]" class="form-control" placeholder="<?php echo app('translator')->get('menu.jobCategories'); ?> <?php echo app('translator')->get('app.name'); ?>">
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
            url: '<?php echo e(route('admin.job-categories.store')); ?>',
            container: '#createForm',
            type: "POST",
            redirect: true,
            data: $('#createForm').serialize()
        })
    });
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\kuliah\Belajar\web\laravel\SiRekrutV1\resources\views/admin/job-category/create.blade.php ENDPATH**/ ?>