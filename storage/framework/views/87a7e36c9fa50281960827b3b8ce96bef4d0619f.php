<?php $__env->startSection('header-text'); ?>
    <h1 class="hidden-sm-down"><i class="icon-ribbon"></i> <?php echo app('translator')->get('modules.front.homeHeader'); ?> </h1>
    <h4 class="hidden-sm-up"><i class="icon-ribbon"></i> <?php echo app('translator')->get('modules.front.homeHeader'); ?> </h4>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <!--
    |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
    | Open positions
    |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
    !-->
    <section class="section">
        <div class="container">
            <header class="section-header">
                <h2>Search Jobs</h2>
                <hr>
            </header>


            <div data-provide="shuffle">
                <div class="text-center gap-multiline-items-2 job-filters" data-shuffle="filter">
                    <button class="btn btn-w-md btn-outline btn-round btn-primary active" data-shuffle="button">All
                    </button>
                    <?php $__currentLoopData = $locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $location): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <button class="btn  btn-outline btn-round btn-primary" data-shuffle="button"
                                data-group="<?php echo e($location->location); ?>"><?php echo e(ucwords($location->location)); ?></button>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <p>&nbsp;</p>
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <button class="btn btn-xs btn-outline btn-round btn-dark" data-shuffle="button"
                                data-group="<?php echo e($category->name); ?>"><?php echo e(ucwords($category->name)); ?></button>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

                <br><br>

                <div class="row gap-y" data-shuffle="list">

                    <?php $__currentLoopData = $jobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-12 col-md-6 col-lg-4 portfolio-2" data-shuffle="item" data-groups="<?php echo e($job->location->location.','.$job->category->name); ?>">
                            <a href="<?php echo e(route('jobs.jobDetail', [$job->slug])); ?>" class="job-opening-card">
                            <div class="card card-bordered">
                                <div class="card-block">
                                    <h5 class="card-title"><?php echo e(ucwords($job->title)); ?></h5>
                                    <?php if($job->company->show_in_frontend == 'true'): ?>
                                        <small class="company-title"><?php echo app('translator')->get('app.by'); ?> <?php echo e(ucwords($job->company->company_name)); ?></small>
                                    <?php endif; ?>
                                    <div class="d-flex flex-wrap justify-content-between">
                                        <span class="fw-600 fs-12 text-info"><?php echo e(ucwords($job->location->location).', '.ucwords($job->location->country->country_name)); ?></span>
                                        <span class="fw-600 fs-12 text-info"><?php echo e(ucwords($job->category->name)); ?></span>
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>

            </div>


        </div>
    </section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SiRekrutV1\resources\views/front/job-openings.blade.php ENDPATH**/ ?>