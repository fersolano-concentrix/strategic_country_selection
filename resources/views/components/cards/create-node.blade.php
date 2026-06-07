@props([
    'title' => 'Lorem Ipsum Sit Amet',
    'description' => 'Quisque iaculis accumsan eleifend. Sed venenatis, eros at elementum facilisis.',
])
<div class="card bg-base-100 shadow-sm border border-base-300/80 overflow-hidden rounded-2xl">
    <!-- Card Header Section -->
    <div class="border-b border-base-200 px-6 py-5 bg-base-50/50">
        <h2 class="text-xs font-bold text-primary uppercase tracking-wider">
            {{ $title }}
        </h2>
        <p class="text-xs text-secondary font-medium">
            {{ $description }}
        </p>
    </div>

    <!-- Card Body Content Section -->
    <div class="p-6 divide-y divide-base-200/60">
        {{ $slot }}
    </div>
</div>
