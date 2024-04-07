<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="">
            <span class="align-middle">Teacher Panel</span>
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-item">
                <a class="sidebar-link" href="">
                    <i class="align-middle" data-feather="book"></i> <span class="align-middle">Dashboard</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('manager.student.index') }}">
                    <i class="align-middle" data-feather="book"></i> <span class="align-middle">Student</span>
                </a>
            </li>
            <ul class="sidebar-nav">
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('manager.task.index') }}">
                        <i class="align-middle" data-feather="book"></i> <span class="align-middle"> Task </span>
                    </a>
                </li>
                <ul class="sidebar-nav">
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('manager.atask.index') }}">
                            <i class="align-middle" data-feather="book"></i> <span class="align-middle">Assign Taskes</span>
                        </a>
                    </li>

    </div>
</nav>
