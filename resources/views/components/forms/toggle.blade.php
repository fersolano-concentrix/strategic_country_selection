@props([
    'metricName' => '',
    'title' => 'Toggle Option',
    'model' => null,
    'readonly' => false,
    'hasDependentContent' => false, 
])

@php
    $initialValue = old($metricName, isset($model) ? (bool)$model->$metricName : false);
@endphp

<div x-data="{ isChecked: {{ $initialValue ? 'true' : 'false' }} }" class="w-full">
    
    <div class="flex items-center justify-between py-2.5 border-b border-base-200/60 last:border-0 hover:bg-base-200/20 px-2 rounded-lg transition-all duration-150">
        <span class="text-sm font-semibold text-base-content">{{ $title }}</span>
        
        <div class="form-control">
            <label class="label cursor-pointer gap-3 py-0">
                @if($readonly)
                    @if(isset($model) && $model->$metricName)
                        <span class="badge badge-success gap-1 text-xs font-bold py-2 px-3 text-white">
                            <i class="fa-solid fa-circle-check"></i> Yes
                        </span>
                    @else
                        <span class="badge badge-error gap-1 text-xs font-bold py-2 px-3 text-white">
                            <i class="fa-solid fa-circle-xmark"></i> No
                        </span>
                    @endif
                @else
                    <span 
                        class="text-xs font-bold uppercase tracking-widest text-base-content/40 w-8 text-right select-none"
                        x-text="isChecked ? 'Yes' : 'No'"
                    >
                        {{ $initialValue ? 'Yes' : 'No' }}
                    </span>

                    <input 
                        type="hidden" 
                        name="{{ $metricName }}" 
                        :id="'hidden_' + '{{ $metricName }}'"
                        :value="isChecked ? 1 : 0"
                        value="{{ $initialValue ? 1 : 0 }}"
                    />

                    <input 
                        type="checkbox" 
                        class="toggle toggle-accent toggle-md" 
                        x-model="isChecked"
                        {{ $initialValue ? 'checked' : '' }} 
                    />
                @endif
            </label>
        </div>
    </div>

    @if($hasDependentContent && isset($slot) && $slot->isNotEmpty())
        @if($readonly)
            @if(isset($model) && $model->$metricName)
                <div class="pl-6 pr-2 py-3 bg-base-200/20 border border-base-200 rounded-xl space-y-3 mt-2 mb-4 ml-2 animate-fadeIn">
                    {{ $slot }}
                </div>
            @endif
        @else
            <div 
                x-show="isChecked" 
                x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="opacity-0 -translate-y-2 scale-[0.99]"
                x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                x-transition:leave="transition ease-in duration-150"
                x-transition:leave-start="opacity-100 translate-y-0 scale-100"
                x-transition:leave-end="opacity-0 -translate-y-2 scale-[0.99]"
                class="pl-6 pr-2 py-3 bg-base-200/20 border border-base-200 rounded-xl space-y-4 mt-2 mb-4 ml-2"
                x-cloak
            >
                {{ $slot }}
            </div>
        @endif
    @endif
</div>