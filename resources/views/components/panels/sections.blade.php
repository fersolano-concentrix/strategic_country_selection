@props([
    'title' => 'Section Title',
    'description' => null,
])

<div class="card mt-4 bg-base-100 shadow-xl border border-base-200 overflow-hidden">

    <div class="h-1 w-full bg-gradient-to-r from-primary via-accent to-secondary"></div>

    <div class="card-body p-6 space-y-4">

        <div class="flex flex-col gap-1.5 pb-3 border-b border-base-200">
            <h3 class="text-xs font-bold text-primary uppercase tracking-widest">
                {{ $title }}
            </h3>
            @if ($description)
                <p class="text-xs text-base-content/70 leading-relaxed">
                    {{ $description }}
                </p>
            @endif
        </div>

        {{ $slot }}

    </div>
</div>