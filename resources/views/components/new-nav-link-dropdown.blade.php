@props(['route', 'title', 'fa_icon' => null])

<li class="nav-item ">
    <a href="#" class="nav-link {{ request()->routeIs($route) ? 'active' : '' }}">
        @if ($fa_icon)
            <i class="nav-icon fas {{ $fa_icon }}"></i>
        @endif
        <p>
            {{ $title }}
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        {{ $slot }}
    </ul>
</li>
