<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
        .sidebar {
            height: 100%;
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #fff;
            padding-top: 20px;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .sidebar-header {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
        }

        .sidebar-header h3 {
            margin: 0;
        }

        .sidebar ul.components {
            padding: 0;
            list-style: none;
        }

        .sidebar ul li {
            padding: 10px;
            text-align: left;
        }

        .sidebar ul li.active>a {
            color: #007bff;
        }

        .sidebar ul li a {
            text-decoration: none;
            color: #000;
            display: block;
        }

        .sidebar ul li a:hover {
            color: #007bff;
        }

        .sidebar .btn-close {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 20px;
            border: none;
            background: none;
        }

        .sidebar .btn-danger {
            width: 100%;
            margin-top: 20px;
        }

        .content {
            margin-left: 250px;
            padding: 20px;
        }

        .btn-show-sidebar {
            position: fixed;
            top: 10px;
            left: 10px;
            z-index: 999;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid tt">
            <button class="btn btn-show-sidebar" type="button" style="color: white;">
                <span>&#9776;</span> <!-- Icon hamburger -->
            </button>
            <h3>MONITOR</h3>
            <!-- Authentication Links -->
            @if (Auth::guest())
                <a href="{{ route('login') }}" class="btn btn-link" style="color: white;">Login</a>
            @endif
        </div>
    </nav>

    <div class="sidebar" id="sidebar">
        <button class="btn btn-close d-md-none tog" type="button" data-bs-toggle="collapse"
            data-bs-target="#sidebarCollapse" aria-expanded="false" aria-controls="sidebarCollapse">
            <span>&times;</span>
        </button>

        <div class="sidebar-header">
            <h3>Monitor</h3>
        </div>

        <ul class="list-unstyled components">
            <li class="active">
                <a href="{{ route('dashboard') }}" class="btn btn-link">Dashboard</a>
            </li>

            <li>
                <a href="{{ route('devices.index') }}" class="btn btn-link">Manage Devices</a>
            </li>
        </ul>

        @if (Auth::check())
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger">Logout</button>
            </form>
        @endif
    </div>

    <div class="content">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var btnShowSidebar = document.querySelector('.btn-show-sidebar');
            var sidebar = document.getElementById('sidebar');

            btnShowSidebar.addEventListener('click', function() {
                sidebar.classList.toggle('closed');
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</body>

</html>
