<nav id="sidebarMenu" class="col-md-2 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="/user">
                    <span data-feather="home" class="align-text-bottom"></span>
                     Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="{{ route('profile.index') }}">
                    <span data-feather="user" class="align-text-bottom"></span>
                    Profile
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="{{ route('profile.edit', auth()->user()->id ) }}">
                    <span data-feather="edit" class="align-text-bottom"></span>
                   Edit
                </a>
            </li>
        </ul>
    </div>
</nav>
