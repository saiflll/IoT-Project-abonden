

<?php $__env->startSection('title', 'Tambah Perangkat'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container">
        <h2>Tambah Perangkat</h2>
        <form action="<?php echo e(route('devices.store')); ?>" method="POST" class="needs-validation" novalidate>
            <?php echo csrf_field(); ?>
            <div class="mb-3">
                <label for="name" class="form-label">Nama:</label>
                <input type="text" class="form-control" id="name" name="name" required>
                <div class="invalid-feedback">
                    Masukkan nama perangkat.
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\ppp\iotp\resources\views/devices/create.blade.php ENDPATH**/ ?>