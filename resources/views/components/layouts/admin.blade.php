<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="CNXTheme">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin Dashboard - CNX LATAM SSE</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-base-300 min-h-screen">
    <!-- navbar -->
    <div class="drawer lg:drawer-open">
        <input id="dashboard-drawer" type="checkbox" class="drawer-toggle" />

        <div class="drawer-content flex flex-col min-h-screen">

            <div class="navbar bg-base-100 border-b border-base-300 px-4 gap-4 sticky top-0 z-30">
                <label for="dashboard-drawer" class="btn btn-square btn-ghost drawer-button lg:hidden">
                    <i class="fa-solid fa-bars text-xl"></i>
                </label>

                <div class="flex-1">
                    <h1 class="text-xl font-bold text-primary hidden sm:block">LATAM Strategic Selection Engine</h1>
                </div>

                <div class="flex-none gap-2">

                    <div class="dropdown dropdown-end">
                        <div tabindex="0" role="button" class="btn btn-ghost btn-circle avatar avatar-placeholder">
                            <div class="bg-primary text-neutral-content w-10 rounded-full">
                                <span class="text-xs font-bold text-white"><i class="fa-solid fa-user"></i></span>
                            </div>
                        </div>
                        <ul tabindex="0"
                            class="menu menu-sm dropdown-content bg-base-100 rounded-box z-[1] mt-3 w-52 p-2 shadow-xl border border-base-200">
                            <li><a href="{{ route('profile.password.edit') }}" class="justify-between">My Profile</a></li>
                            <div class="divider my-1"></div>
                            <li>
                                <form method="POST" action="{{ route('logout') }}" class="contents">
                                    @csrf
                                    <button type="submit" class="text-error font-medium">
                                        <i class="fa-solid fa-arrow-right-from-bracket"></i> Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <main class="flex-grow p-4 sm:p-6 lg:p-8 max-w-7xl w-full mx-auto space-y-8">
                {{ $slot }}
            </main>
        </div>

        <div class="drawer-side z-40 border-r border-base-300">
            <label for="dashboard-drawer" aria-label="close sidebar" class="drawer-overlay"></label>

            <div class="menu bg-primary text-white w-64 min-h-screen p-4 flex flex-col justify-between">
                <div>
                    <div class="flex justify-center py-4 mb-4 border-b border-white/10">
                        <img src="{{ asset('img/cnx_logo_bw.png') }}" alt="CNX" class="h-6 w-auto object-contain">
                    </div>

                    <ul class="space-y-1">
                        <x-nav.items route="dashboard" name="Dashboard" icon="fa-solid fa-chart-pie" />
                        <x-nav.items route="pipeline" name="Strategic Nodes" icon="fa-solid fa-earth-americas" />
                        <x-nav.items route="countries.create" name="Create Node" icon="fa-solid fa-plus" />
                    </ul>
                </div>

                <div
                    class="pt-4 border-t border-white/10 text-xs text-white/40 font-mono flex items-center justify-between px-2">
                    <p>© {{ date('Y') }} - CNX LATAM. All rights reserved.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- ./navbar -->

</body>

</html>
