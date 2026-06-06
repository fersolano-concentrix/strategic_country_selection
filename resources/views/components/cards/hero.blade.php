@props([
    'title' => '',
    'subtitle' => '',
    ])
<div class="hero bg-primary text-white py-2 rounded-2xl shadow-sm relative overflow-hidden">
    <div class="absolute -right-10 -bottom-10 text-white/5 pointer-events-none transform -rotate-12">
        <i class="fa-solid fa-gear text-[16rem]"></i>
    </div>
    <div class="hero-content text-center z-10">
        <div class="max-w-2xl">
            <h1 class="text-3xl font-bold">{{ $title }}</h1>
            <p class="text-sm py-6 text-accent">
                {{ $subtitle }}
            </p>
        </div>
    </div>
</div>
