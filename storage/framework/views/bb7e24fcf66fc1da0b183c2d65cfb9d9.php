

<?php $__env->startSection('title', 'Edit Perangkat'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container">
        <h2>Edit Perangkat</h2>
        <form action="<?php echo e(route('devices.update', $device->id)); ?>" method="POST" class="needs-validation" novalidate>
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <div class="mb-3">
                <label for="name" class="form-label">Nama:</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo e($device->name); ?>" required>
                <div class="invalid-feedback">
                    Masukkan nama perangkat.
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\ppp\iotp\resources\views/devices/edit.blade.php ENDPATH**/ ?>