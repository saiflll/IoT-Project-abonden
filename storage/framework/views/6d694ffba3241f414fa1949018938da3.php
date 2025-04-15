

<?php $__env->startSection('title', 'Daftar Perangkat'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container">
        <h2>Daftar Perangkat</h2>
        <a class="btn btn-primary mb-3" href="<?php echo e(route('devices.create')); ?>">Tambah Perangkat Baru</a>
        <?php if(session('success')): ?>
            <div class="alert alert-success"><?php echo e(session('success')); ?></div>
        <?php endif; ?>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $devices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $device): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($device->id); ?></td>
                        <td><?php echo e($device->name); ?></td>
                        <td>
                            <a class="btn btn-info btn-sm" href="<?php echo e(route('devices.show', $device->id)); ?>">Lihat</a>
                            <a class="btn btn-warning btn-sm" href="<?php echo e(route('devices.edit', $device->id)); ?>">Edit</a>
                            <form action="<?php echo e(route('devices.destroy', $device->id)); ?>" method="POST"
                                style="display: inline;">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button class="btn btn-danger btn-sm" type="submit">Hapus</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\ppp\iotp\resources\views/devices/index.blade.php ENDPATH**/ ?>