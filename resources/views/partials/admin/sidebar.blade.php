<nav id="admin-sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="">
            <span class="align-middle">Admin Panel</span>
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('admin.index') }}">
                    <i class="align-middle" data-feather="book"></i> <span class="align-middle">Dashboard</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('admin.task.index') }}">
                    <i class="align-middle" data-feather="book"></i> <span class="align-middle">Task</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('admin.manager.index') }}">
                    <i class="align-middle" data-feather="book"></i> <span class="align-middle">Managers</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('admin.student.index') }}">
                    <i class="align-middle" data-feather="book"></i> <span class="align-middle">Students</span>
                </a>
            </li>


            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('admin.astask.index') }}">
                    <i class="align-middle" data-feather="book"></i> <span class="align-middle">Assing Tasks</span>
                </a>
            </li>


        </ul>
    </div>
</nav>
