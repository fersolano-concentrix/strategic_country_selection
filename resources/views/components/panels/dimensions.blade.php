@props([
    'title' => 'D0 | Dimension Title',
    'step' => 0,
    'description' => '',
])
<div x-show="currentStep === {{ $step }}" x-transition:enter="transition ease-out duration-200"
    x-transition:enter-start="opacity-0 translate-y-2">
    <div class="border-t-4 border-accent -mt-6 -mx-6 px-6 pt-4 pb-4 bg-base-50/50">
        <h2 class="text-xl font-bold text-primary">{{ $title }}</h2>
        @if($description)
            <p class="text-sm text-secondary mt-1">{{ $description }}</p>
        @endif
    </div>
    
    <div class="mt-4">
        {{ $slot }}
    </div>
</div>
