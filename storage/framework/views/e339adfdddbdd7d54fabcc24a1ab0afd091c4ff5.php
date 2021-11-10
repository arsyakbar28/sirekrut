<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">

        <div class="row mb-2">
            <div class="col-md-5">
                <h1 class="mb-xs-2"><?php echo e($pageTitle); ?></h1>
            </div>
            <div class="col-md-7">
                <span class="float-sm-right"><?php echo $__env->yieldContent('create-button'); ?></span>
                <ol class="breadcrumb float-sm-right mr-2 mt-xs-2">
                    <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>"><i class="icon-home"></i></a></li>
                    <li class="breadcrumb-item active"><?php echo e($pageTitle); ?></li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section><?php /**PATH C:\xampp\htdocs\SiRekrutV1\resources\views/sections/breadcrumb.blade.php ENDPATH**/ ?>