

<?php $__env->startSection('title', 'Detail Perangkat'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container">
        <h2>Detail Perangkat</h2>
        <p>ID: <?php echo e($device->id); ?></p>
        <p>User ID: <?php echo e($device->user_id); ?></p>
        <p>Nama: <?php echo e($device->name); ?></p>
        <a href="<?php echo e(route('devices.edit', $device->id)); ?>" class="btn btn-primary">Edit</a>
        <form action="<?php echo e(route('devices.destroy', $device->id)); ?>" method="POST" style="display: inline;">
            <?php echo csrf_field(); ?>
            <?php echo method_field('DELETE'); ?>
            <button type="submit" class="btn btn-danger">Hapus</button>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\ppp\iotp\resources\views/devices/show.blade.php ENDPATH**/ ?>