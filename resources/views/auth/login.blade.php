<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="CNXTheme">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin Login - CNX LATAM Strategic Selection Engine</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-base-200 min-h-screen flex items-center justify-center p-4 sm:p-6 lg:p-8">

    <div class="w-full max-w-5xl bg-base-100 rounded-3xl shadow-xl border border-base-300 overflow-hidden grid grid-cols-1 lg:grid-cols-12 min-h-[600px]">
        
        <div class="hidden lg:flex lg:col-span-5 bg-primary p-12 flex-col justify-between relative overflow-hidden">
            <div class="absolute -right-10 -bottom-10 text-white/5 pointer-events-none transform -rotate-12">
                <i class="fa-solid fa-gear text-[20rem]"></i>
            </div>
            
            <div class="relative z-10">
                <div class="bg-white/10 backdrop-blur-md p-3 rounded-xl inline-block mb-6 border border-white/10">
                    <img src="{{ asset('img/cnx_logo_bw.png') }}" alt="CNX Logo" class="h-8 w-auto brightness-0 invert">
                </div>
                <h1 class="text-3xl font-black text-white tracking-tight leading-tight">
                    LATAM Strategic <br><span class="text-accent">Selection Engine</span>
                </h1>
                <p class="text-white/70 text-sm mt-4 font-medium max-w-xs">
                    Strategic framework for operational readiness and risk assessment.
                </p>
            </div>

            <div class="text-xs text-white/40 font-mono relative z-10">
                &copy; {{ date('Y') }} CNX LATAM Strategic Selection Engine. All rights reserved.
            </div>
        </div>

        <div class="col-span-1 lg:col-span-7 p-8 sm:p-12 lg:p-16 flex flex-col justify-center bg-base-100">
            
            <div class="lg:hidden mb-8 flex justify-center">
                <img src="{{ asset('img/cnx_logo_bw.png') }}" alt="CNX" class="h-10 w-auto object-contain">
            </div>

            <div class="mb-8 text-center lg:text-left">
                <h2 class="text-3xl font-extrabold text-primary tracking-tight">Administrator Login</h2>
                <p class="text-neutral-500 mt-2 text-sm font-medium">Sign in to access your administrative control panel portal.</p>
            </div>

            <form method="POST" action="{{ route('login.post') }}" class="space-y-5">
                @csrf

                @error('email')
                    <div class="alert alert-error text-sm rounded-xl py-3 shadow-sm mb-4 bg-error/10 text-error border border-error/20">
                        <i class="fa-solid fa-circle-exclamation"></i>
                        <span>{{ $message }}</span>
                    </div>
                @enderror

                <div class="form-control w-full">
                    <label for="email" class="label font-bold text-primary text-xs uppercase tracking-wider px-1">
                        Email Address
                    </label>
                    <div class="relative flex items-center">
                        <span class="absolute left-4 text-neutral-400">
                            <i class="fa-regular fa-envelope text-lg"></i>
                        </span>
                        <input id="email"
                            class="input input-bordered pl-12 pr-4 w-full h-12 bg-base-200/50 focus:bg-base-100 border-base-300 @error('email') border-error focus:border-error focus:ring-error/20 @else focus:border-[#25E2CC] focus:ring-[#25E2CC]/20 @enderror rounded-xl transition-all font-medium text-sm"
                            type="email" name="email" value="{{ old('email') }}" required autofocus
                            placeholder="admin@concentrix.com" />
                    </div>
                </div>

                <div class="form-control w-full">
                    <label for="password" class="label font-bold text-primary text-xs uppercase tracking-wider px-1">
                        Password
                    </label>
                    <div class="relative flex items-center">
                        <span class="absolute left-4 text-neutral-400">
                            <i class="fa-solid fa-lock text-lg"></i>
                        </span>
                        <input id="password"
                            class="input input-bordered pl-12 pr-4 w-full h-12 bg-base-200/50 focus:bg-base-100 border-base-300 @error('email') border-error focus:border-error focus:ring-error/20 @else focus:border-[#25E2CC] focus:ring-[#25E2CC]/20 @enderror rounded-xl transition-all font-medium text-sm"
                            type="password" name="password" required placeholder="••••••••" />
                    </div>
                </div>

                <div class="flex items-center justify-between pt-1">
                    <label class="cursor-pointer label p-0 gap-3">
                        <input type="checkbox" name="remember"
                            class="checkbox checkbox-sm checkbox-primary rounded-md [--chkbg:primary] [--chkfg:white]" />
                        <span class="label-text text-sm font-semibold text-neutral-500 hover:text-neutral-700 transition-colors">Remember my session</span>
                    </label>
                </div>

                <button type="submit"
                    class="btn w-full bg-primary hover:bg-primary/90 text-white border-none font-bold text-base h-12 shadow-md hover:shadow-lg transition-all rounded-xl mt-2 normal-case">
                    Sign In to Dashboard
                </button>
            </form>

            <div class="mt-8 flex flex-col sm:flex-row items-center justify-between gap-4 border-t border-base-200 pt-6">
                <a href="{{ route('index') }}" class="text-xs font-bold text-neutral-400 hover:text-primary flex items-center gap-2 transition-colors group">
                    <i class="fa-solid fa-arrow-left transition-transform group-hover:-translate-x-1"></i>
                    Return to Public Portal
                </a>
                
                <div class="hidden lg:block">
                    <img src="{{ asset('img/cnx_logo.png') }}" alt="CNX" class="h-6 w-auto object-contain opacity-60">
                </div>
            </div>

        </div>
    </div>

</body>

</html>