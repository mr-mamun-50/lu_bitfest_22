<aside class="main-sidebar elevation-2 sidebar-primary bg-white">
    <!-- Brand Logo -->
    <a href="{{ route('admin.dashboard') }}" class="brand-link navbar-primary">
        <img src="{{ asset('images/logos/uni_logo.png') }}" alt="LU Bus" class="brand-image">
        <span class="brand-text font-weight-ligh text-white">LU Bus</span>
    </a>


    <!-- Sidebar -->
    <div class="sidebar">

        {{-- <a href="{{ route('alloocateBus') }}">print</a> --}}

        <!-- SidebarSearch Form -->
        <div class="form-inline mt-2">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2 pb-5">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
                <li class="nav-header">core</li>

                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}"
                        class="nav-link @if ($menu == 'Dashboard') active @endif">
                        <i class="nav-icon fas fa-chart-area"></i>
                        <p> Dashboard </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('routes.index') }}"
                        class="nav-link @if ($menu == 'Routes') active @endif">
                        <i class="nav-icon fas fa-road"></i>
                        <p> Routes </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('busses.index') }}"
                        class="nav-link @if ($menu == 'Busses') active @endif">
                        <i class="nav-icon fas fa-bus-alt"></i>
                        <p> Busses </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('schedule.index') }}"
                        class="nav-link @if ($menu == 'schedules') active @endif">
                        <i class="nav-icon fas fa-clock"></i>
                        <p> Schedules </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('route-stopages.index') }}"
                        class="nav-link @if ($menu == 'Route_stopages') active @endif">
                        <i class="nav-icon fas fa-route"></i>
                        <p> Route stopages </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('stopages.index') }}"
                        class="nav-link @if ($menu == 'Stopages') active @endif">
                        <i class="nav-icon fas fa-stop-circle"></i>
                        <p> Stopage list </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('drivers.index') }}"
                        class="nav-link @if ($menu == 'Drivers') active @endif">
                        <i class="nav-icon fas fa-person-booth"></i>
                        <p> Drivers </p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
