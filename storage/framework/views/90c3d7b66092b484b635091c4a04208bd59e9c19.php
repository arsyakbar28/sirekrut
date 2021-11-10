<?php $__env->startSection('header-text'); ?>
    <h1 class="hidden-sm-down"> <?php echo e($pageTitle); ?></h1>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('style'); ?>
<style>
    .header {
        padding: 43px 100px !important;
    }
    .min-height-section{
        min-height: 400px;
    }
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <!--
    |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
    | Working at TheThemeio
    |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
    !-->
    <section class="section bg-gray py-40 min-height-section">
        <div class="container">
            <div class="row gap-y align-items-center">
                <div class="col-12">
                    <h3><?php if(!is_null($customPage->name)): ?> <?php echo e($customPage->name); ?>  <?php endif; ?></h3>
                    <p><?php if(!is_null($customPage->description)): ?> <?php echo $customPage->description; ?>  <?php endif; ?></p>
                </div>
            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\kuliah\Belajar\web\laravel\SiRekrutV1\resources\views/front/custom-page.blade.php ENDPATH**/ ?>