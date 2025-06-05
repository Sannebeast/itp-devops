<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>TaskITEasy</title>

    {{-- Compiled assets --}}
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    {{-- Render additional styles from subviews and/or components --}}
    @stack('styles')
</head>
<body>
{{-- Navigation bar --}}
<x-ui.navbar>
    <x:slot:brand>
        <a href="/" class="navbar-item">
            <i class="fa-solid fa-list-check"></i>&nbsp;TaskITEasy
        </a>
    </x:slot:brand>

    @foreach($navItems as $navItem)
        <x-ui.navbar-item :route="$navItem['route']">{{ $navItem['title'] }}</x-ui.navbar-item>
    @endforeach

    @auth
        <div class="navbar-item">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="has-text-white is-unstyled" style="background:none; border:none; padding:0; font: inherit; cursor: pointer;">
                    Logout
                </button>
            </form>
        </div>
    @endauth
</x-ui.navbar>

{{-- Content --}}
<section class="section">
    <div class="container">
        {{-- a very basic 'backwards' navigation --}}
        <a class="button is-primary mb-3" href="{{ url()->previous() }}">Back</a>
        <x-ui.notifications></x-ui.notifications>
        {{ $slot }}
    </div>
</section>

{{-- Footer --}}
<footer class="footer">
    <div class="container">
        <div class="columns is-multiline">

            <div class="column has-text-centered">
                <div>
                    <a href="/" class="link">Home</a>
                </div>
            </div>

            <div class="column has-text-centered">
                <div>
                    <a href="https://opensource.org/licenses/MIT" class="link">
                        <i class="fa fa-balance-scale" aria-hidden="true"></i> License: MIT
                    </a>
                </div>
            </div>

        </div>

        <div class="content is-small has-text-centered">
            <p class="">Theme built by <a href="https://www.csrhymes.com">C.S. Rhymes</a> | adapted by <a href="https://github.com/dwaard">BugSlayer</a></p>
            <p>TaskITEasy</p>
        </div>
    </div>
</footer>
{{-- Render additional scripts from subviews and/or components --}}
@stack('scripts')
</body>
</html>
