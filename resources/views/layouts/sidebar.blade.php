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
            <a href="{{ route('dashboard') }}" class="btn btn-link">Dashboard</a>
        </li>
        {{-- <li>
            <a href="{{ route('heater.index') }}" class="btn btn-link">Heater</a>
        </li>
        <li>
            <a href="{{ route('lamp.index') }}" class="btn btn-link">Lamp</a>
        </li> --}}
        {{-- <li>
            <a href="{{ route('users.index') }}" class="btn btn-link">Manage Users</a>
        </li> --}}
        <li>
            <a href="{{ route('devices.index') }}" class="btn btn-link">Manage Devices</a>
        </li>
    </ul>

    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-danger">Logout</button>
    </form>
</div>

<div class="content" style="margin-left: 260px; padding: 20px;">
    <!-- Your main content goes here -->
</div>
