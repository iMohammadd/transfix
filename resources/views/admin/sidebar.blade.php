<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard.index') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">{{ config('app.name') }} <sup>1</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('dashboard.index') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider" />



    <!-- Heading -->
    <div class="sidebar-heading">
        Project Management
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#projects" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-briefcase"></i>
            <span>Project Management</span>
        </a>
        <div id="projects" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                @can('manage')
                    <a class="collapse-item" href="{{ route('project.create') }}">Create Project</a>
                @endcan
                <a class="collapse-item" href="{{ route('todo.index') }}">My Todo</a>
            </div>
        </div>
    </li>

    <hr class="sidebar-divider" />

    @can('manage')
        <!-- Heading -->
            <div class="sidebar-heading">
                User Management
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#user" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-address-card"></i>
                    <span>User Manager</span>
                </a>
                <div id="user" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('user.index') }}">User List</a>
                        <a class="collapse-item" href="{{ route('register') }}">Add User</a>
                    </div>
                </div>
            </li>
    @endcan

</ul>