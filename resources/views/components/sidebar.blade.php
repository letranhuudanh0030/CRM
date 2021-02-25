<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
        <img src="/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">{{ env("APP_NAME") }} Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ Avatar::create(auth()->user()->name)->toBase64() }}" class="img-circle elevation-2"
                    alt="User Image" />
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ auth()->user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="/" class="nav-link {{ request()->path("/") == "/" ? 'active' : ''}}">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Bảng điều khiển
                        </p>
                    </a>
                </li>
                @if (auth()->user()->permission_id == 1)
                @foreach (config('variables.menus') as $key => $menu)
                <li class="nav-item {{ $menu['submenu'] ? 'has-submenu' : '' }}">
                    <a href="{{ $menu['url'] }}"
                        class="nav-link {{ '/'.request()->path("/") ==  $menu['url'] ? 'active' : '' }} {{ $menu['submenu'] ? 'a-has-submenu' : '' }}">
                        <i class="nav-icon {{ $menu['icon'] }}"></i>
                        <p>
                            {{ $menu['name'] }}
                            @if ($menu['submenu'])
                            <i class="right fas fa-angle-left"></i>
                            @endif
                        </p>
                    </a>
                    @if ($menu['submenu'])
                    <ul class="nav nav-treeview">
                        @foreach ($menu['submenu'] as $item)
                        <li class="nav-item">
                            <a href="{{ $item['url'] }}"
                                class="nav-link {{ '/'.request()->path("/") ==  $item['url'] ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ $item['name'] }}</p>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                    @endif
                </li>
                @endforeach
                @endif
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>