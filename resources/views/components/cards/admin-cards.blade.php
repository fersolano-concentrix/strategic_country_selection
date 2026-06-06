@props([
    'title' => '',
    'subtitle' => '',
    ])
<div class="bg-base-100 p-5 rounded-2xl border border-base-300 shadow-sm flex items-center gap-4">
    <div class="h-12 w-12 bg-primary/10 rounded-xl flex items-center justify-center text-primary text-xl">
        <i class="fa-solid fa-earth-americas"></i>
    </div>
    <div>
        <span class="text-xs font-bold text-neutral-400 uppercase tracking-wider">{{ $title }}</span>
        <div class="text-2xl font-black text-base-content mt-0.5">{{ $subtitle }}</div>
    </div>
</div>
