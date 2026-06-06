@props([
    'route' => '',
    'name' => '',
    'icon' => 'fa-solid fa-question',
])
<li>
    <a href="{{ route($route) }}"
        @if (request()->routeIs($route)) class="active bg-white/10 text-accent font-bold rounded-xl py-3 px-4 flex items-center gap-3"
                            @else
                                class="hover:bg-white/5 hover:text-white rounded-xl py-3 px-4 flex items-center gap-3 transition-all text-white/80" @endif>
        <i class="{{ $icon }} text-lg"></i> {{ $name }}
    </a>
</li>
