<?php $__env->startSection('content'); ?>
    <style>
        .dashboard-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .sensor-card,
        .device-status,
        .activity-log {
            padding: 20px;
            border-radius: 8px;
            background: #f9f9f9;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .sensor-card {
            flex: 1 1 200px;
            text-align: center;
        }

        .sensor-card h3 {
            margin: 0;
            font-size: 1.2em;
        }

        .sensor-card p {
            margin: 10px 0 0;
            font-size: 2em;
        }

        .device-status,
        .activity-log {
            flex: 1 1 100%;
        }

        .device-status p,
        .activity-log p {
            margin: 0;
            font-size: 1.2em;
        }

        .chart-container {
            width: 100%;
            margin-top: 20px;
        }

        .activity-log ul {
            list-style: none;
            padding: 0;
        }

        .activity-log li {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        .activity-log h2 {
            margin-top: 0;
        }
    </style>

    <h1>Dashboard</h1>

    <div>
        <label for="device">Pilih Perangkat:</label>
        <select name="device" id="device">
            <option value="">Semua Perangkat</option>
            <?php $__currentLoopData = $devices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $device): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($device->id); ?>"><?php echo e($device->name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>

    <div class="dashboard-container">
        <div class="sensor-card">
            <h3>Temperature</h3>
            <p><?php echo e($latestData->temperature ?? 'N/A'); ?> °C</p>
        </div>
        <div class="sensor-card">
            <h3>Humidity</h3>
            <p><?php echo e($latestData->humidity ?? 'N/A'); ?> %</p>
        </div>
        <div class="sensor-card">
            <h3>Light Intensity</h3>
            <p><?php echo e($latestData->light_intensity ?? 'N/A'); ?> lux</p>
        </div>
        <div class="device-status">
            <h2>Device Statuses</h2>
            <?php if(isset($configHeater, $configLamp)): ?>
                <p>Heater: <?php echo e($isAboveMaxTemp ? 'On' : 'Off'); ?></p>
                <p>Lamp: <?php echo e($isTimeOn ? 'On' : 'Off'); ?></p>
            <?php else: ?>
                <p>Device configurations not available</p>
            <?php endif; ?>
        </div>
        <div class="activity-log">
            <h2>Activity Logs</h2>
            <ul>
                <?php $__currentLoopData = $activityLogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $log): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li>
                        <strong><?php echo e($log->created_at); ?></strong> - <?php echo e($log->log_name); ?>: <?php echo e($log->properties); ?>

                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    </div>

    <div class="chart-container">
        <h2>Sensor Statistics</h2>
        <canvas id="sensorChart"></canvas>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const deviceSelect = document.getElementById('device');

            deviceSelect.addEventListener('change', function() {
                const deviceId = this.value;
                fetchData(deviceId);
            });

            function fetchData(deviceId) {
                // Send AJAX request to server with selected deviceId
                // Server should return data for the specified device
                // Update dashboard and chart based on the received data
            }

            // Example chart setup
            const ctx = document.getElementById('sensorChart').getContext('2d');
            const sensorChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: [], // Add your labels here
                    datasets: [{
                            label: 'Temperature',
                            data: [], // Add your data here
                            borderColor: 'rgba(255, 99, 132, 1)',
                            backgroundColor: 'rgba(255, 99, 132, 0.2)',
                            fill: false,
                        },
                        {
                            label: 'Humidity',
                            data: [], // Add your data here
                            borderColor: 'rgba(54, 162, 235, 1)',
                            backgroundColor: 'rgba(54, 162, 235, 0.2)',
                            fill: false,
                        },
                        {
                            label: 'Light Intensity',
                            data: [], // Add your data here
                            borderColor: 'rgba(75, 192, 192, 1)',
                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                            fill: false,
                        }
                    ]
                },
                options: {
                    responsive: true,
                    scales: {
                        x: {
                            display: true,
                            title: {
                                display: true,
                                text: 'Time'
                            }
                        },
                        y: {
                            display: true,
                            title: {
                                display: true,
                                text: 'Value'
                            }
                        }
                    }
                }
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\ppp\iotp\resources\views/dashboard.blade.php ENDPATH**/ ?>