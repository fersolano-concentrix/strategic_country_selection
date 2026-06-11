@props([
    'title' => 'CNX LATAM Strategic Selection Engine',
])
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="cnxTheme">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    {{ $styles ?? '' }}

</head>

<body class="bg-base-300">
    <!-- navbar -->
    <nav class="navbar bg-primary bg-base-100 shadow-sm">
        <div class="navbar-start">
            <div class="dropdown">
                <div tabindex="0" role="button" class="btn btn-ghost p-4 lg:hidden">
                    <i class="fas fa-bars"></i>
                </div>
                <ul tabindex="-1"
                    class="menu menu-sm dropdown-content bg-base-100 rounded-box z-1 mt-3 w-52 p-2 shadow">
                    <li><a href="{{ route('countries.index') }}">Country Profile</a></li>
                    <li><a href="{{ route('countries.recommender') }}">Country Recommender</a></li>
                </ul>
            </div>
            <a class="px-4 h-auto min-h-12 py-2">
                <img src="{{ asset('img/cnx_logo_bw.png') }}" alt="CNX" class="h-8 w-auto object-contain">
            </a>
        </div>
        <div class="navbar-center hidden lg:flex">
            <div class="flex items-center flex-shrink-0 bg-cnxDeepBlue/50 border border-white/10 rounded-lg p-1">
                <a href="{{ route('countries.index') }}"
                    class="btn btn-sm border-none px-3 h-8 min-h-8 {{ request()->routeIs('countries.index') ? 'bg-base-100 text-primary hover:bg-white' : 'btn-ghost text-white/80 hover:text-white hover:bg-white/10' }}">
                    Country Profile
                </a>
                <a href="{{ route('countries.recommender') }}"
                    class="btn btn-sm border-none px-3 h-8 min-h-8 {{ request()->routeIs('countries.recommender') ? 'bg-base-100 text-primary hover:bg-white' : 'btn-ghost text-white/80 hover:text-white hover:bg-white/10' }}">
                    Country Recommender
                </a>
            </div>
        </div>
        <div class="navbar-end">
            <div x-data="{}" class="relative inline-block">
                <select @change="if($event.target.value) window.location.href = '/countries/' + $event.target.value"
                    class="select select-bordered select-sm w-40 bg-white/10 text-white border-white/20 rounded-lg focus:outline-none focus:ring-1 focus:ring-accent text-sm font-medium cursor-pointer h-8 min-h-8 px-2 pr-7">

                    <option value="" disabled selected class="text-neutral bg-white">Explore country...</option>

                    {{-- Dynamically loop over your live database records --}}
                    @foreach ($countries as $countryItem)
                        <option value="{{ $countryItem->id }}" class="text-neutral bg-white">
                            {{ $countryItem->country_name }}
                        </option>
                    @endforeach

                </select>
            </div>
        </div>
    </nav>
    <!-- ./navbar -->
    <!-- main -->
    <main class="max-w-7xl w-full mx-auto px-4 sm:px-6 lg:px-8 py-6 space-y-6 flex-grow">
        {{ $slot }}
    </main>
    <!-- ./main -->
    <!-- footer -->
    <footer class="footer footer-center p-4 bg-white text-neutral/50 text-xs border-t border-base-200 mt-auto">
        <aside class="flex flex-col sm:flex-row items-center justify-center gap-2 sm:gap-4 w-full">
            <p>© {{ date('Y') }} - CNX LATAM Strategic Selection Engine. All rights reserved.</p>
            <span class="hidden sm:inline text-neutral/20">|</span>

            @auth
                <a href="{{ route('dashboard') }}"
                    class="text-secondary hover:text-primary font-bold transition-colors flex items-center gap-1">
                    <i class="fas fa-user-cog"></i>
                    Admin Dashboard
                </a>
            @else
                <a href="{{ route('login') }}"
                    class="text-neutral/30 hover:text-primary transition-colors flex items-center gap-1 group"
                    title="System Login">
                    <i class="fas fa-user-lock"></i>
                    Admin Access
                </a>
            @endauth
        </aside>
    </footer>
    <!-- ./footer -->
    <!-- scripts -->
    {{ $scripts ?? '' }}
    <!-- ./scripts -->
</body>

</html>
