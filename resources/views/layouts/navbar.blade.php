<!-- Sidebar Menu -->
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
   with font-awesome or any other icon font library -->
        <li class="nav-item">
            <a href="{{ route('dashboard') }}" class="nav-link {{ setActive('dashboard') }}">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>Dashboard</p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('siswa.index') }}" class="nav-link {{ setActive('siswa.index') }}">
                <i class="nav-icon fas fa-graduation-cap"></i>
                <p>Siswa</p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('nilai_siswa.index') }}" class="nav-link {{ setActive('nilai_siswa.index') }}">
                <i class="nav-icon fa-solid fa-book"></i>
                <p>Nilai Siswa</p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('pembayaran_siswa.index') }}" class="nav-link {{ setActive('pembayaran_siswa.index') }}">
                <i class="nav-icon fa-solid fa-money-bill"></i>
                <p>Pembayaran Siswa</p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('pengajar.index') }}" class="nav-link {{ setActive('pengajar.index') }}">
                <i class="nav-icon fa-solid fa-chalkboard-user"></i>
                <p>Pengajar</p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('users.index') }}" class="nav-link {{ setActive('users.index') }}">
                <i class="nav-icon fa-solid fa-user"></i>
                <p>User</p>
            </a>
        </li>

        {{-- <li class="nav-item {{ setMenuOpen(['admin/tes1', 'admin/tes2']) }}">
            <a href="#" class="nav-link {{ setActive(['admin/tes1', 'admin/tes2']) }}">
                <i class="nav-icon fas fa-edit"></i>
                <p>
                    Treeview
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('admin/tes1') }}" class="nav-link {{ setActive('admin/tes1') }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Tes1</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin/tes2') }}" class="nav-link {{ setActive('admin/tes2') }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Tes2</p>
                    </a>
                </li>
            </ul>
        </li> --}}

        <li class="nav-item">
            <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
                <i class="nav-icon fas fa-power-off text-danger"></i>
                <p class="text">Logout</p>
            </a>
        </li>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </ul>
</nav>
<!-- /.sidebar-menu -->
