@props([
    'metricName' => '',
    'title' => 'Input Title',
    'description' => 'Input description goes here.',
    'type' => 'text',
    'model' => null,
    'readonly' => false,
])

<div
    class="flex flex-col sm:flex-row sm:items-center gap-4 py-3 px-4 bg-base-200/30 rounded-xl border border-base-200/60 text-xs mt-[-8px]">
    
    <div class="flex-1">
        <label @if(!$readonly) for="{{ $metricName }}" @endif class="font-semibold text-base-content/80 block mb-1 sm:mb-0">
            @if(!$readonly)
                <i class="fa-solid fa-pen-to-square text-primary mr-1"></i>
            @else
                <i class="fa-solid fa-circle-info text-neutral/50 mr-1"></i>
            @endif
            {{ $title }}
        </label>
        @if($description)
            <p class="text-[11px] text-base-content/50">{{ $description }}</p>
        @endif
    </div>

    <div class="w-full sm:w-72">
        @if($readonly)
            <div class="w-full px-3 py-2 bg-base-100 rounded-lg border border-base-200 shadow-sm text-xs text-base-content font-medium min-h-[2rem] flex items-center break-all">
                {{ $model->$metricName ?? 'Not Specified' }}
            </div>
        @else
            <input 
                type="{{ $type }}" 
                name="{{ $metricName }}" 
                id="{{ $metricName }}"
                value="{{ old($metricName, $model->$metricName ?? '') }}"
                class="input input-bordered input-sm w-full bg-base-100 text-xs focus:outline-none focus:border-primary rounded-lg shadow-sm transition-all placeholder:text-base-content/30" 
            />
        @endif
    </div>
</div>