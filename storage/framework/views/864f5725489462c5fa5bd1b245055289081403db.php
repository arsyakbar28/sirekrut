<?php $__env->startSection('header-text'); ?>
    <h1 class="hidden-sm-down"><?php echo e(ucwords($job->title)); ?></h1>
    <h5 class="hidden-sm-down"><i class="icon-map-pin"></i> <?php echo e(ucwords($job->location->location)); ?></h5>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="container">
        <div class="row">


            <div class="col-md-12 fs-12 pt-50 pb-10 bb-1 mb-20">
                <a class="text-dark"
                   href="<?php echo e(route('jobs.jobOpenings')); ?>"><?php echo app('translator')->get('modules.front.jobOpenings'); ?></a> &raquo; <span
                        class="theme-color"><?php echo e(ucwords($job->title)); ?></span>
            </div>


            <div class="col-md-8">
                <div class="row gap-y">
                    <div class="col-md-12">
                        <h2><?php echo e(ucwords($job->title)); ?></h2>
                        <?php if($job->company->show_in_frontend == 'true'): ?>
                            <small class="company-title"><?php echo app('translator')->get('app.by'); ?> <?php echo e(ucwords($job->company->company_name)); ?></small>
                        <?php endif; ?>
                        <p><?php echo e(ucwords($job->category->name)); ?></p>

                        <?php if(count($job->skills) > 0): ?>
                            <h6><?php echo app('translator')->get('menu.skills'); ?></h6>
                            <div class="gap-multiline-items-1">
                                <?php $__currentLoopData = $job->skills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <span class="badge badge-secondary"><?php echo e($skill->skill->name); ?></span>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        <?php endif; ?>

                        <h4 class="theme-color mt-20">Deskripsi Pekerjaan</h4>

                        <div>
                            <?php echo $job->job_description; ?>

                        </div>

                        <h4 class="theme-color mt-20">Persyaratan</h4>

                        <div>
                            <?php echo $job->job_requirement; ?>

                        </div>

                        <div class="my-30 text-center">
                            <a class="btn btn-lg btn-primary theme-background"
                               href="<?php echo e(route('jobs.jobApply', $job->slug)); ?>">Lamar Pekerjaan</a>
                        </div>

                    </div>

                </div>

            </div>

            <div class="col-md-4 hidden-sm-down">
                <div class="sidebar">

                    <a class="btn btn-block btn-primary theme-background my-10"
                       href="<?php echo e(route('jobs.jobApply', $job->slug)); ?>">Lamar Pekerjaan</a>

                    <div class="b-1 border-light mt-20 text-center">
                        <span class="fs-12 fw-600">Bagikan Pekerjaan Ini</span>

                        <div class="social social-boxed social-colored social-cycling text-center my-10">
                            <a class="social-linkedin"
                            href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo e(route('jobs.jobDetail', [$job->slug])); ?>&title=<?php echo e(urlencode(ucwords($job->title))); ?>&source=LinkedIn"
                            ><i class="fa fa-linkedin"></i></a>
                            <a class="social-facebook"
                               href="https://www.facebook.com/sharer/sharer.php?u=<?php echo e(route('jobs.jobDetail', [$job->slug])); ?>"
                            ><i class="fa fa-facebook"></i></a>
                            <a class="social-twitter"
                               href="https://twitter.com/intent/tweet?status=<?php echo e(route('jobs.jobDetail', [$job->slug])); ?>"
                            ><i class="fa fa-twitter"></i></a>
                            <a class="social-gplus"
                               href="https://plus.google.com/share?url=<?php echo e(route('jobs.jobDetail', [$job->slug])); ?>"
                            ><i class="fa fa-google-plus"></i></a>
                        </div>
                    </div>
                    <?php if($linkedinGlobal->status == 'enable'): ?>
                        <a class="my-10 applyWithLinkedin btn btn-block btn-primary " href="<?php echo e(route('jobs.linkedinRedirect', 'linkedin')); ?>">
                            <i class="fa fa-linkedin-square"></i>
                            <?php echo app('translator')->get('modules.front.linkedinSignin'); ?>
                        </a>
                    <?php endif; ?>
                </div>
            </div>

        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SiRekrutV1\resources\views/front/job-detail.blade.php ENDPATH**/ ?>