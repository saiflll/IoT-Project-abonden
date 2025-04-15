<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vanta.js Globe Animation (Full Screen)</title>
    <style>
        html,
        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            /* Set body height to 100vh for full screen */
            overflow: hidden;
            /* Prevent content overflow */
        }

        .vanta-container {
            width: 100%;
            /* Set container width to 100% for full screen */
            height: 100%;
            left: -30% !important;

            /* Set container height to 100% for full screen */
        }
    </style>
</head>

<body>
    @extends('layouts.app') @section('content')
        <div class="vanta-container" style=" "></div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r121/three.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/vanta@latest/dist/vanta.globe.min.js"></script>
        <script>
            window.addEventListener('DOMContentLoaded', () => {
                const vantaContainer = document.querySelector('.vanta-container');

                if (window.VANTA) {
                    window.VANTA.GLOBE({
                        el: vantaContainer,
                        mouseControls: true, // Enable mouse interaction
                        touchControls: true, // Enable touch interaction
                        gyroControls: false, // Disable gyro controls (optional)
                        minHeight: 900, // Minimum height for proper rendering
                        minWidth: 2000, // Minimum width for proper rendering
                        scale: 1.0, // Overall scale of the globe
                        scaleMobile: 1.0, // Scale adjustment for mobile devices
                        color: 0x3fd1ff, // Globe color (light blue)
                        size: 1.50, // Adjust globe size (optional)
                        // left: -30 vh,
                        backgroundColor: 0xffffff // Background color (white)
                    });
                } else {
                    console.error('Vanta.js library not found. Please include it in your project.');
                }
            });
        </script>
    @endsection
</body>

</html>
