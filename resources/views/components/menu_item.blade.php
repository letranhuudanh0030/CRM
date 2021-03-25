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