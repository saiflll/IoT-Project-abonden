<div class="sidebar" id="sidebar">
    <button class="btn btn-close d-md-none tog" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarCollapse"
        aria-expanded="false" aria-controls="sidebarCollapse">
        <span>&times;</span>
    </button>

    <div class="sidebar-header">
        <h3>MatDash</h3>
    </div>

    <ul class="list-unstyled components">
        <li class="active">
            <a href="<?php echo e(route('dashboard')); ?>" class="btn btn-link">Dashboard</a>
        </li>
        
        
        <li>
            <a href="<?php echo e(route('devices.index')); ?>" class="btn btn-link">Manage Devices</a>
        </li>
    </ul>

    <form action="<?php echo e(route('logout')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <button type="submit" class="btn btn-danger">Logout</button>
    </form>
</div>

<div class="content" style="margin-left: 260px; padding: 20px;">
    <!-- Your main content goes here -->
</div>
<?php /**PATH D:\ppp\iotp\resources\views/layouts/sidebar.blade.php ENDPATH**/ ?>