<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <!-- Common Links for Both Roles -->
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin') }}">
                <i class="ti-dashboard menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('profile.index') }}">
                <i class="ti-user menu-icon"></i>
                <span class="menu-title">Profile</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('trips.index') }}">
                <i class="ti-calendar menu-icon"></i>
                <span class="menu-title">Trips</span>
            </a>
        </li>

        <!-- Links for Admin Only -->
        @if (Auth::user()->role === 'admin')
            <li class="nav-item">
                <a class="nav-link" href="{{ route('users.index') }}">
                    <i class="ti-home menu-icon"></i>
                    <span class="menu-title">Users</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('categories.index') }}">
                    <i class="ti-tag menu-icon"></i>
                    <span class="menu-title">Categories</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/contacts') }}">
                    <i class="ti-tag menu-icon"></i>
                    <span class="menu-title">Contacts</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('subscribe.index') }}">
                    <i class="ti-calendar menu-icon"></i>
                    <span class="menu-title">Subscriptions</span>
                </a>
            </li>
        @endif
    </ul>
</nav>