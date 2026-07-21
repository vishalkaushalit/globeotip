<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">
    @php($serviceAreaOpen = request()->routeIs('states.*', 'cities.*', 'neighbourhoods.*'))
    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('dashboard') ? '' : 'collapsed' }}"
                href="{{ route('dashboard') }}"
                @if(request()->routeIs('dashboard')) aria-current="page" @endif>
                <i class="bi bi-speedometer2"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li class="nav-heading">Account</li>

        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('profile.*') ? '' : 'collapsed' }}"
                href="{{ route('profile.edit') }}"
                @if(request()->routeIs('profile.*')) aria-current="page" @endif>
                <i class="bi bi-person"></i>
                <span>My Profile</span>
            </a>
        </li>

        @if (Auth::user()->canManageServiceAreas())
            <li class="nav-heading">{{ Auth::user()->isAdmin() ? 'Administration' : 'Content Management' }}</li>

            <li class="nav-item">
                <a class="nav-link {{ $serviceAreaOpen ? '' : 'collapsed' }}" data-bs-target="#service-area-nav"
                    data-bs-toggle="collapse" href="#" aria-expanded="{{ $serviceAreaOpen ? 'true' : 'false' }}">
                    <i class="bi bi-geo-alt"></i><span>Service Area</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="service-area-nav" class="nav-content collapse {{ $serviceAreaOpen ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
                    <li><a href="{{ route('states.index') }}" class="{{ request()->routeIs('states.*') ? 'active' : '' }}"><i class="bi bi-circle"></i><span>States</span></a></li>
                    <li><a href="{{ route('cities.index') }}" class="{{ request()->routeIs('cities.*') ? 'active' : '' }}"><i class="bi bi-circle"></i><span>Cities</span></a></li>
                    <li><a href="{{ route('neighbourhoods.index') }}" class="{{ request()->routeIs('neighbourhoods.*') ? 'active' : '' }}"><i class="bi bi-circle"></i><span>Neighbourhoods</span></a></li>
                </ul>
            </li>

            @if (Auth::user()->isAdmin())
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('users.*') ? '' : 'collapsed' }}"
                        href="{{ route('users.index') }}"
                        @if(request()->routeIs('users.*')) aria-current="page" @endif>
                        <i class="bi bi-people"></i>
                        <span>Users</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('activity-logs.*') ? '' : 'collapsed' }}"
                        href="{{ route('activity-logs.index') }}"
                        @if(request()->routeIs('activity-logs.*')) aria-current="page" @endif>
                        <i class="bi bi-clock-history"></i>
                        <span>Activity Log</span>
                    </a>
                </li>
            @endif
        @endif

        <li class="nav-heading">Website</li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('website.index') }}" target="_blank" rel="noopener">
                <i class="bi bi-box-arrow-up-right"></i>
                <span>View Website</span>
            </a>
        </li>
    </ul>
</aside>
<!-- End Sidebar -->
