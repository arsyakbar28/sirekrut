<?php $__env->startSection('content'); ?>
    <form action="<?php echo e(route('login')); ?>" id="loginform" method="post">
        <?php echo csrf_field(); ?>

        <div class="form-group mb-3">
            <input type="email" name="email" class="form-control <?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>"
                   placeholder="<?php echo e(__('E-Mail Address')); ?>" value="<?php echo e(old('email')); ?>" required autofocus>
            <?php if($errors->has('email')): ?>
                <span class="invalid-feedback"><?php echo e($errors->first('email')); ?></span>
            <?php endif; ?>
        </div>
        <div class="form-group mb-3">
            <input id="password" type="password" placeholder="<?php echo e(__('Password')); ?>"
                   class="form-control<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" name="password" required>
            <?php if($errors->has('password')): ?>
                <span class="invalid-feedback">
                                        <strong><?php echo e($errors->first('password')); ?></strong>
                                    </span>
            <?php endif; ?>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="checkbox icheck">
                    <label>
                        <div class="icheckbox_flat-green" aria-checked="false" aria-disabled="false" style="position: relative;">
                            <input  type="checkbox" <?php echo e(old('remember') ? 'checked' : ''); ?>  name="remember_me" id="remember_me" class="flat-red"  style="position: absolute; opacity: 0;">
                            <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                        </div>
                        <?php echo e(__('Remember Me')); ?>

                    </label>
                </div>
            </div>
            <!-- /.col -->
            <div class="col-sm-12 mt-4">
                <button type="submit" class="btn btn-primary btn-block"><?php echo e(__('Login')); ?></button>
            </div>
            <!-- /.col -->
        </div>

        <p class="mb-1 mt-4">
            <a href="#" id="to-recover">I forgot my password</a>
        </p>
    </form>

    <form class="form-horizontal" method="post" id="recoverform" style="display: none"
          action="<?php echo e(route('password.email')); ?>">
        <?php echo e(csrf_field()); ?>


        <?php if(session('status')): ?>
            <div class="alert alert-success m-t-10">
                <?php echo e(session('status')); ?>

            </div>
        <?php endif; ?>

        <div class="form-group ">
            <div class="col-xs-12">
                <h3><?php echo app('translator')->get('app.recoverPassword'); ?></h3>
                <p class="text-muted"><?php echo app('translator')->get('app.enterEmailInstruction'); ?></p>
            </div>
        </div>
        <div class="form-group <?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
            <div class="col-xs-12">
                <input class="form-control" type="email" id="email" name="email" required=""
                       placeholder="<?php echo e(__('E-Mail Address')); ?>" value="<?php echo e(old('email')); ?>">
                <?php if($errors->has('email')): ?>
                    <span class="help-block">
                        <?php echo e($errors->first('email')); ?>

                    </span>
                <?php endif; ?>
            </div>
        </div>
        <div class="form-group text-center m-t-20">
            <div class="col-xs-12">
                <button class="btn btn-primary btn-lg btn-block text-uppercase waves-effect waves-light"
                        type="submit"><?php echo app('translator')->get('app.sendPasswordLink'); ?></button>
            </div>
        </div>

        <div class="form-group m-b-0">
            <div class="col-sm-12 text-center">
                <p><a href="<?php echo e(route('login')); ?>" class="text-primary m-l-5"><b><?php echo e(__('Login')); ?></b></a></p>
            </div>
        </div>

    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\kuliah\Belajar\web\laravel\SiRekrutV1\resources\views/auth/login.blade.php ENDPATH**/ ?>