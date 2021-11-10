<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport"            content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description"         content="<?php echo e(!empty($metaDescription) ? $metaDescription : ''); ?>">

    <meta property="og:url"          content="<?php echo e(!empty($pageUrl) ? $pageUrl : ''); ?>" />
    <meta property="og:type"         content="website" />
    <meta property="og:title"        content="<?php echo e(!empty($metaTitle) ? $metaTitle : ''); ?>" />
    <meta property="og:description"  content="<?php echo e(!empty($metaDescription) ? $metaDescription : ''); ?>" />
    <meta property="og:image"        content="<?php echo e(!empty($metaImage) ? $metaImage : ''); ?>" />
    <meta property="og:image:width"  content="600" />
    <meta property="og:image:height" content="600" />

    <meta itemprop="name"            content="<?php echo e(!empty($metaTitle) ? $metaTitle : ''); ?>">
    <meta itemprop="description"     content="<?php echo e(!empty($metaDescription) ? $metaDescription : ''); ?>">
    <meta itemprop="image"           content="<?php echo e(!empty($metaImage) ? $metaImage : ''); ?>"> 
    
    <title><?php echo e($pageTitle); ?></title>

    <style>
        :root {
            --main-color: <?php echo e($frontTheme->primary_color); ?>;
        }

        <?php echo $frontTheme->front_custom_css; ?>

    </style>

    <!-- Styles -->
    <link href="<?php echo e(asset('froiden-helper/helper.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('assets/node_modules/toast-master/css/jquery.toast.css')); ?>" rel="stylesheet">

    <link href="<?php echo e(asset('front/assets/css/core.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('front/assets/css/thesaas.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('front/assets/css/style.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('front/assets/css/custom.css')); ?>" rel="stylesheet">
    <?php echo $__env->yieldPushContent('header-css'); ?>

    <!-- Favicons -->
    <link rel="apple-touch-icon" sizes="57x57" href="<?php echo e(asset('favicon/apple-icon-57x57.png')); ?>">
    <link rel="apple-touch-icon" sizes="60x60" href="<?php echo e(asset('favicon/apple-icon-60x60.png')); ?>">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo e(asset('favicon/apple-icon-72x72.png')); ?>">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo e(asset('favicon/apple-icon-76x76.png')); ?>">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo e(asset('favicon/apple-icon-114x114.png')); ?>">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo e(asset('favicon/apple-icon-120x120.png')); ?>">
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo e(asset('favicon/apple-icon-144x144.png')); ?>">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo e(asset('favicon/apple-icon-152x152.png')); ?>">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo e(asset('favicon/apple-icon-180x180.png')); ?>">
    <link rel="icon" type="image/png" sizes="192x192" href="<?php echo e(asset('favicon/android-icon-192x192.png')); ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo e(asset('favicon/favicon-32x32.png')); ?>">
    <link rel="icon" type="image/png" sizes="96x96" href="<?php echo e(asset('favicon/favicon-96x96.png')); ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo e(asset('favicon/favicon-16x16.png')); ?>">
    <link rel="manifest" href="<?php echo e(asset('favicon/manifest.json')); ?>">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?php echo e(asset('favicon/ms-icon-144x144.png')); ?>">
    <meta name="theme-color" content="#ffffff">
    <?php echo $__env->yieldPushContent('style'); ?>
</head>

<body>


<!-- Topbar -->
<nav class="topbar topbar-inverse topbar-expand-md">
    <div class="container">

        <div class="topbar-left">
            <a class="topbar-brand d-flex justify-content-center" href="<?php echo e(url('/')); ?>">
                <img src="<?php echo e($global->logo_url); ?>" width="300" class="logo-inverse" alt="home" />
            </a>
        </div>
    </div>
</nav>
<!-- END Topbar -->

<!-- Header -->
<header class="header header-inverse" style="background-image: url(<?php echo e($frontTheme->background_image_url); ?>)" data-overlay="8">
    <div class="container">

        <div class="row">
            <div class="col-12 col-lg-8 offset-lg-2">
                <h1>Making it easier <br> to find a job</h1>
            </div>
        </div>

    </div>
</header>
<!-- END Header -->

<!-- Main container -->
<main class="main-content">

    <?php echo $__env->yieldContent('content'); ?>

</main>
<!-- END Main container -->

<!-- Footer -->
<footer class="site-footer">
    <div class="container">
        <div class="row gap-y align-items-center">
            <div class="col-3 col-lg-3 text-center mr-auto">
                &copy; <?php echo e(\Carbon\Carbon::today()->year); ?> Schiene Tren

            </div>
        </div>
    </div>
</footer>
<!-- END Footer -->



<!-- Scripts -->
<script src="<?php echo e(asset('front/assets/js/core.min.js')); ?>"></script>
<script src="<?php echo e(asset('front/assets/js/thesaas.min.js')); ?>"></script>
<script src="<?php echo e(asset('front/assets/js/script.js')); ?>"></script>
<script src="<?php echo e(asset('froiden-helper/helper.js')); ?>"></script>
<script src="<?php echo e(asset('assets/node_modules/toast-master/js/jquery.toast.js')); ?>"></script>

<?php echo $__env->yieldPushContent('footer-script'); ?>

</body>
</html><?php /**PATH D:\kuliah\Belajar\web\laravel\SiRekrutV1\resources\views/layouts/front.blade.php ENDPATH**/ ?>