<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Favicon icon -->
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

    <title><?php echo app('translator')->get('app.adminPanel'); ?> | <?php echo e($pageTitle); ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

    <!-- Simple line icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.css">

    <!-- Themify icons -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/icons/themify-icons/themify-icons.css')); ?>">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->

    <link href="<?php echo e(asset('froiden-helper/helper.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('assets/node_modules/toast-master/css/jquery.toast.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('assets/node_modules/sweetalert/sweetalert.css')); ?>" rel="stylesheet">
    <link rel='stylesheet prefetch' href='https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.0/dist/css/bootstrap-select.min.css'>

    <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/datatables/dataTables.bootstrap4.css')); ?>">
    <link href="<?php echo e(asset('assets/node_modules/select2/dist/css/select2.min.css')); ?>" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="<?php echo e(asset('assets/node_modules/bootstrap-select/bootstrap-select.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/dist/css/adminlte.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/node_modules/Magnific-Popup-master/dist/magnific-popup.css')); ?>">

    <?php echo $__env->yieldPushContent('head-script'); ?>

    <link rel='stylesheet prefetch'
          href='//cdnjs.cloudflare.com/ajax/libs/flag-icon-css/0.8.2/css/flag-icon.min.css'>

    <link href="<?php echo e(asset('css/custom.css')); ?>" rel="stylesheet">
    <style>
        :root {
            --main-color: <?php echo e($adminTheme->primary_color); ?>;
        }
        .well, pre {
            background: #fff;
            border-radius: 0;
        }

        .btn-group-xs > .btn, .btn-xs {
            padding  : .25rem .4rem;
            font-size  : .875rem;
            line-height  : .5;
            border-radius : .2rem;
        }

        .btn-circle {
            width: 30px;
            height: 30px;
            padding: 6px 0;
            border-radius: 15px;
            text-align: center;
            font-size: 12px;
            line-height: 1.428571429;
        }
        .well {
            min-height: 20px;
            padding: 19px;
            margin-bottom: 20px;
            background-color: #f5f5f5;
            border: 1px solid #e3e3e3;
            border-radius: 4px;
            -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.05);
            box-shadow: inset 0 1px 1px rgba(0,0,0,.05);
            font-size: 12px;
        }
        .text-truncate-notify{
            white-space: pre-wrap !important;
        }

        .image-container {
            display: flex;
            align-items: center;
        }

        .image-container .image {
            display: inline-block;
            position: relative;
            width: 32px;
            height: 32px;
            overflow: hidden;
            border-radius: 50%;
            margin-right: 10px;
        }

        .image-container .image img {
            width: auto;
            height: 100%;
        }

        #top-notification-dropdown>a {
            position: relative;
        }

        #top-notification-dropdown>a span {
            position: absolute;
            right: 10%;
            top: 10%;
        }

        #top-notification-dropdown>a span.badge {
            padding: 2px 5px;
        }

        .scrollable {
            max-height: 250px;
            overflow-y: scroll;
        }
    </style>

    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
            </li>
        </ul>
        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                    <a class="image-container nav-link waves-effect waves-light"
                    <?php if(!$user->is_superadmin): ?>
                        href="<?php echo e(route('admin.profile.index')); ?>"
                    <?php else: ?>
                        href="<?php echo e(route('superadmin.profile.index')); ?>"
                    <?php endif; ?>
                    >
                        <div class="image">
                            <img src="<?php echo e($user->profile_image_url); ?>" alt="User Image">
                        </div>
                        <span><?php echo e(ucwords($user->name)); ?></span>
                    </a>
    
                </li>

            <!-- Notifications Dropdown Menu -->
            <li class="nav-item dropdown" id="top-notification-dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="fa fa-bell-o"></i>
                    <?php if(count($user->unreadNotifications) > 0): ?>
                        <span class="badge badge-warning navbar-badge "><?php echo e(count($user->unreadNotifications)); ?></span>
                    <?php endif; ?>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <div class="scrollable">
                        <?php $__currentLoopData = $user->unreadNotifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php echo $__env->make('notifications.'.snake_case(class_basename($notification->type)), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <?php if(count($user->unreadNotifications) > 0): ?>
                        <a id="mark-notification-read" href="javascript:void(0);" class="dropdown-item dropdown-footer"><?php echo app('translator')->get('app.markNotificationRead'); ?> <i class="fa fa-check"></i></a>
                    <?php else: ?>
                        <a  href="javascript:void(0);" class="dropdown-item dropdown-footer"><?php echo app('translator')->get('messages.notificationNotFound'); ?> </a>
                    <?php endif; ?>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link  waves-effect waves-light" href="<?php echo e(route('logout')); ?>" title="Logout" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();"
                ><i class="fa fa-power-off"></i>
                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                        <?php echo e(csrf_field()); ?>

                    </form>
                </a>

            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <?php echo $__env->make('sections.left-sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <?php echo $__env->make('sections.breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <!-- Main content -->
        <section class="content">

            <?php echo $__env->yieldContent('content'); ?>

        </section>
        <!-- /.content -->
    </div>

    
    <div class="modal fade bs-modal-lg in" id="application-lg-modal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable" id="modal-data-application">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <span class="caption-subject font-red-sunglo bold uppercase" id="modelHeading"></span>
                </div>
                <div class="modal-body">
                    Loading...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> <?php echo app('translator')->get('app.cancel'); ?></button>
                    <button type="button" class="btn btn-success"><i class="fa fa-check"></i> <?php echo app('translator')->get('app.save'); ?></button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    

    
    <div class="modal fade bs-modal-md in" id="application-md-modal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md" id="modal-data-application">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <span class="caption-subject font-red-sunglo bold uppercase" id="modelHeading"></span>
                </div>
                <div class="modal-body">
                    Loading...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> <?php echo app('translator')->get('app.cancel'); ?></button>
                    <button type="button" class="btn btn-success"><i class="fa fa-check"></i> <?php echo app('translator')->get('app.save'); ?></button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    


    <footer class="main-footer">
        &copy; <?php echo e(\Carbon\Carbon::today()->year); ?> <?php echo app('translator')->get('app.by'); ?> <?php echo e($companyName); ?>

    </footer>

    <?php echo $__env->make('sections.right-sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?php echo e(asset('assets/plugins/jquery/jquery.min.js')); ?>"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo e(asset('assets/node_modules/popper/popper.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/datatables/jquery.dataTables.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/datatables/dataTables.bootstrap4.js')); ?>"></script>

<!-- SlimScroll -->
<script src="<?php echo e(asset('assets/plugins/slimScroll/jquery.slimscroll.min.js')); ?>"></script>
<!-- FastClick -->
<script src="<?php echo e(asset('assets/plugins/fastclick/fastclick.js')); ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo e(asset('assets/dist/js/adminlte.min.js')); ?>"></script>

<script src='https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.0/dist/js/bootstrap-select.min.js'></script>
<script src="<?php echo e(asset('assets/node_modules/sweetalert/sweetalert.min.js')); ?>"></script>

<script src="<?php echo e(asset('froiden-helper/helper.js')); ?>"></script>
<script src="<?php echo e(asset('assets/node_modules/toast-master/js/jquery.toast.js')); ?>"></script>
<script src="<?php echo e(asset('js/cbpFWTabs.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/icheck/icheck.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/icheck/icheck.init.js')); ?>"></script>
<script src="<?php echo e(asset('assets/node_modules/Magnific-Popup-master/dist/jquery.magnific-popup.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/node_modules/Magnific-Popup-master/dist/jquery.magnific-popup-init.js')); ?>"></script>

<script>
    $('body').on('click', '.right-side-toggle', function () {
        $("body").removeClass("control-sidebar-slide-open");
    })

    $(function () {
        $('.selectpicker').selectpicker({
            style: 'btn-info',
            size: 4
        });
    });

    function languageOptions() {
        return {
            processing:     "<?php echo app('translator')->get('modules.datatables.processing'); ?>",
            search:         "<?php echo app('translator')->get('modules.datatables.search'); ?>",
            lengthMenu:    "<?php echo app('translator')->get('modules.datatables.lengthMenu'); ?>",
            info:           "<?php echo app('translator')->get('modules.datatables.info'); ?>",
            infoEmpty:      "<?php echo app('translator')->get('modules.datatables.infoEmpty'); ?>",
            infoFiltered:   "<?php echo app('translator')->get('modules.datatables.infoFiltered'); ?>",
            infoPostFix:    "<?php echo app('translator')->get('modules.datatables.infoPostFix'); ?>",
            loadingRecords: "<?php echo app('translator')->get('modules.datatables.loadingRecords'); ?>",
            zeroRecords:    "<?php echo app('translator')->get('modules.datatables.zeroRecords'); ?>",
            emptyTable:     "<?php echo app('translator')->get('modules.datatables.emptyTable'); ?>",
            paginate: {
                first:      "<?php echo app('translator')->get('modules.datatables.paginate.first'); ?>",
                previous:   "<?php echo app('translator')->get('modules.datatables.paginate.previous'); ?>",
                next:       "<?php echo app('translator')->get('modules.datatables.paginate.next'); ?>",
                last:       "<?php echo app('translator')->get('modules.datatables.paginate.last'); ?>",
            },
            aria: {
                sortAscending:  "<?php echo app('translator')->get('modules.datatables.aria.sortAscending'); ?>",
                sortDescending: "<?php echo app('translator')->get('modules.datatables.aria.sortDescending'); ?>",
            },
        }
    }

    $('.language-switcher').change(function () {
        var lang = $(this).val();
        $.easyAjax({
            url: '<?php echo e(route("admin.language-settings.change-language")); ?>',
            data: {'lang': lang},
            success: function (data) {
                if (data.status == 'success') {
                    window.location.reload();
                }
            }
        });
    });

    $('#mark-notification-read').click(function () {
        var token = '<?php echo e(csrf_token()); ?>';
        $.easyAjax({
            type: 'POST',
            url: '<?php echo e(route("mark-notification-read")); ?>',
            data: {'_token': token},
            success: function (data) {
                if (data.status == 'success') {
                    $('.top-notifications').remove();
                    $('#top-notification-dropdown .notify').remove();
                    window.location.reload();
                }
            }
        });

    });

</script>

<?php echo $__env->yieldPushContent('footer-script'); ?>

</body>
</html>
<?php /**PATH D:\kuliah\Belajar\web\laravel\SiRekrutV1\resources\views/layouts/app.blade.php ENDPATH**/ ?>