<nav class="navbar" role="navigation" aria-label="dropdown navigation">
    <div class="navbar-item has-dropdown">
        <a class="navbar-link">
            {{ $title }}
        </a>

        <div class="navbar-dropdown">
            {{ $slot }}
        </div>
    </div>
</nav>
