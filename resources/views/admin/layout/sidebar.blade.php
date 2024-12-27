<div class="sidebar-menu">
    <ul class="menu flex-column mb-auto">
        <li class="sidebar-title">Menu</li>

        <li class="sidebar-item {{ Request::routeIs('admin.index') ? 'active' : '' }} ">
            <a href="{{ route('admin.index') }}" class="sidebar-link">
                <i class="bi bi-grid-fill"></i>
                <span>Bosh sahifa</span>
            </a>
        </li>
        <li class="sidebar-item {{ Request::is('admin/questions*') ? 'active' : '' }}">
            <a href="{{ route('questions.index') }}" class="sidebar-link">
                <i class="bi bi-question-square-fill"></i>
                <span>Savollar</span>
            </a>
        </li>
        <li class="sidebar-item {{ Request::is('admin/answers*') ? 'active' : '' }}">
            <a href="{{ route('answers.index') }}" class="sidebar-link">
                <i class="bi bi-check-square-fill"></i>
                <span>Javoblar</span>
            </a>
        </li>
    </ul>
    <hr>
    <div class="dropdown position-fixed bottom-0 start-0 p-3">
        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="{{ asset('storage/images/profile/images.png') }}" alt="" width="48" height="48"
                 class="rounded-circle me-3">
            <strong>{{ auth()->user()->name }}</strong>
        </a>
        <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1" style="">
            <li><a class="dropdown-item" href="{{ route('home') }}" target="_blank">Loyiha vebsaytiga o'tish</a></li>
            <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Profil</a></li>
            <li><hr class="dropdown-divider"></li>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                                this.closest('form').submit();">
                    Chiqish
                </a>
            </form>
        </ul>
    </div>
</div>
