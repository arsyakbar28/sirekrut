<?php $__env->startComponent('mail::message'); ?>

# <?php echo $greeting; ?>


<?php echo app('translator')->get('email.newJobApplication.subject'); ?>

<?php $__env->startComponent('mail::text', ['text' => $content]); ?>

<?php echo $__env->renderComponent(); ?>
<?php if($buttonUrl): ?>
<?php $__env->startComponent('mail::extrabutton', ['buttonurl' => $buttonUrl]); ?>
    <?php echo $extraButtonText; ?>

<?php echo $__env->renderComponent(); ?>
<?php endif; ?>

<?php $__env->startComponent('mail::button', ['url' => $url]); ?>
    <?php echo $buttonText; ?>

<?php echo $__env->renderComponent(); ?>


<?php if(! empty($salutation)): ?>
<?php echo $salutation; ?>

<?php else: ?>
<?php echo app('translator')->get('Regards'); ?>,<br><?php echo e(config('app.name')); ?>

<?php endif; ?>


<?php if(isset($url)): ?>
<?php $__env->slot('subcopy'); ?>
<?php echo app('translator')->get(
"If you’re having trouble clicking the \":actionText\" button, copy and paste the URL below\n".
'into your web browser: [:actionURL](:actionURL)',
[
'actionText' => $buttonText,
'actionURL' => $url
]
); ?>
<?php $__env->endSlot(); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>

<?php /**PATH C:\xampp\htdocs\SiRekrutV1\resources\views/email/job-apply.blade.php ENDPATH**/ ?>