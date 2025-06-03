<a href="{{ route($route) }}"
   class="navbar-item {{ Request::routeIs($route) ? "is-active" : "" }}">
    {{ $slot }}
</a>
