<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Book Detection</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">BD</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="{{ Request::routeIs('dashboard') ? 'active': '' }}">
                <a class="nav-link" href="{{route('dashboard')}}"><i class="fas fa-fire">
                    </i><span>Dashboard</span></a>
            </li>
            <li class="{{ Request::routeIs('manajemen-user.index') ? 'active': '' }}">
                <a class="nav-link" href="{{route('manajemen-user.index')}}"><i class="fas fa-fire">
                    </i><span>Manajemen User</span></a>
            </li>
            <li class="{{ Request::routeIs('manajemen-buku.index') ? 'active': '' }}">
                <a class="nav-link" href="{{route('manajemen-buku.index')}}"><i class="fas fa-fire">
                    </i><span>Manajemen Buku</span></a>
            </li>
            <li class="{{ Request::routeIs('manajemen-kategoribuku.index') ? 'active': '' }}">
                <a class="nav-link" href="{{route('manajemen-kategoribuku.index')}}"><i class="fas fa-fire">
                    </i><span>Kategori Buku</span></a>
            </li>
            <li class="">
                <a class="nav-link" href="peminjaman.html"><i class="fas fa-fire">
                    </i><span>Peminjaman</span></a>
            </li>
            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-jet-responsive-nav-link href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                               this.closest('form').submit();">
                        {{ __('Logout') }}
                    </x-jet-responsive-nav-link>
                </form>
                {{Auth::user()->name}}
            </li>
        </ul>
    </aside>
</div>
