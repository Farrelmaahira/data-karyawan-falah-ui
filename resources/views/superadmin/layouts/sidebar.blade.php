
<nav id="sidebarMenu" class="col-md-2 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="/superadmin">
                    <span data-feather="home" class="align-text-bottom"></span>
                     Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="{{ route('sections.index') }}">
                    <span data-feather="layers" class="align-text-bottom"></span>
                     Position
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="{{ route('users.index') }}">
                    <span data-feather="users" class="align-text-bottom"></span>
                     Users
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="{{ route('superadmin.index') }}">
                    <span data-feather="user" class="align-text-bottom"></span>
                     Profile
                </a>
            </li>
        </ul>
    </div>
</nav>