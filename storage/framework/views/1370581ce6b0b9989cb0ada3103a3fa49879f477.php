<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-3 p-5">
        </div>
        <div class="col-9 pt-5">
            <div class="d-flex justify-content-between align-items-baseline">
                <div id="fo-bu" class="d-flex align-items-center pb-3">
                    <div class="h4"><?php echo e($user->name); ?></div>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->denies('view', $user->profile)): ?>
                    <follow-button user-id="<?php echo e($user->id); ?>" follows="<?php echo e($follows); ?>"></follow-button>
                    <?php endif; ?>
                </div>
            </div>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $user->profile)): ?>
                <a class="btn-primary" href="/profile/<?php echo e($user->id); ?>/edit" role="button">编辑个人资料</a>
                <button class="btn" type="submit"></button>
            <?php endif; ?>

            <div class="d-flex">
                <followers usernoid="<?php echo e($user->id); ?>" followers_count="<?php echo e($followersCount); ?>"></followers>
                <following usernoid="<?php echo e($user->id); ?>" following_count="<?php echo e($followingCount); ?>"></following>
            </div>

            <div class="pt-4 font-weight-bold"><?php echo e($user->profile->title); ?></div>
            <div><?php echo e($user->profile->description); ?></div>
            <div class="d-flex justify-content-between align-items-baseline">
                <div id="fo-bu" class="d-flex align-items-center pb-3">
                  <ul class="list-unstyled">
                    <?php foreach ($talks as $talk): ?>
                        <p>问话：<?php echo e($talk->listen); ?></p>
                        <p><?php echo e($talk->name); ?>：<?php echo e($talk->talk); ?></p>
                    <?php endforeach; ?>

                  </ul>

                </div>
            </div>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/laravel_login/resources/views/profiles/index.blade.php ENDPATH**/ ?>