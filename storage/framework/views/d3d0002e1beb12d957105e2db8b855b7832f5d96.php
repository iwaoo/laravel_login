<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-3 p-5">

        </div>
        <div class="col-9 pt-5">
            <div class="d-flex justify-content-between align-items-baseline">
                <div class="d-flex align-items-center pb-3">
                    <div class="h4"><?php echo e($user->name); ?></div>

                </div>

            </div>


            <div class="pt-4 font-weight-bold"><?php echo e($user->profile->title); ?></div>
            <div><?php echo e($user->profile->description); ?></div>

        </div>
    </div>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/laravel_login/resources/views/home.blade.php ENDPATH**/ ?>