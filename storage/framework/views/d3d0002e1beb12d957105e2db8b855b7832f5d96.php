<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-3 p-5">
        </div>
        <div class="col-9 pt-5">
            <div class="d-flex justify-content-between align-items-baseline">
                <div id="fo-bu" class="d-flex align-items-center pb-3">
                    <div class="h4"><?php echo e($user->name, false); ?></div>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->denies('view', $user->profile)): ?>
                    <follow-button user-id="<?php echo e($user->id, false); ?>" follows="<?php echo e($follows, false); ?>"></follow-button>
                    <?php endif; ?>
                </div>
            </div>
            <a class="btn-primary" href="/profile/<?php echo e($user->id, false); ?>" role="button">个人资料</a>

            <div class="pt-4 font-weight-bold"><?php echo e($user->profile->title, false); ?></div>
            <div><?php echo e($user->profile->description, false); ?></div>
            <test></test>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/laravel_login/resources/views/home.blade.php ENDPATH**/ ?>