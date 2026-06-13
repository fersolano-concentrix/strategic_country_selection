@props([
    'metricLabel' => '1. Metric Label',
    'metricName',
    'start' => 1,
    'end' => 5,
    'minLabel' => 'Min',
    'maxLabel' => 'Max',
    'value' => 3,
    'readonly' => false,
    'input' => false,
    'description' => 'Input description',
    'inputName' => '',
    
])

<div x-data="{ score: {{ old($metricName, $value ?? $start) }} }"
    class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4 first:pt-1 last:pb-1 group px-2 -mx-2 rounded-xl transition-all duration-150 {{ $readonly ? '' : 'hover:bg-base-200/20' }}">

    <div class="flex-1">
        <p
            class="text-sm font-semibold text-base-content transition-colors {{ $readonly ? '' : 'group-hover:text-primary' }}">
            @if ($input)
                <div class="flex-1">
                    <label for="{{ $inputName }}" class="font-semibold text-base-content/80 block mb-1 sm:mb-0">
                        <i class="fa-solid fa-pen-to-square text-primary mr-1"></i>
                        {{ $metricLabel }}
                    </label>
                    <div class="w-full sm:w-72">
                    @if ($readonly)
                        <p class="px-3 py-2 bg-base-200 text-sm text-base-content/80 rounded-lg w-full sm:w-72 overflow-hidden text-ellipsis whitespace-nowrap">
                            {{ $inputName }}
                        </p>
                    @else    
                        <input type="text" name="{{ $inputName }}" id="{{ $inputName }}" value=""
                            class="input input-bordered input-sm w-full bg-base-100 text-xs focus:outline-none focus:border-primary rounded-lg shadow-sm transition-all placeholder:text-base-content/30" />
                    @endif
                        </div>
                    <p class="text-[11px] text-base-content/50">{{ $description }}</p>
                </div>
            @else
                {{ $metricLabel }}
            @endif
        </p>
    </div>

    @if (!$readonly)
        <input type="hidden" name="{{ $metricName }}" :value="score">
    @endif

    <div class="flex flex-col gap-1 items-end shrink-0">
        <div class="flex items-center gap-1.5 score-group">
            @for ($i = $start; $i <= $end; $i++)
                @if ($readonly)
                    <span
                        class="w-10 h-10 rounded-full font-semibold text-sm flex items-center justify-center transition-all duration-200"
                        :class="Number(score) === {{ $i }} ?
                            'bg-accent text-accent-content font-bold shadow-md scale-105' :
                            'bg-base-200 text-base-content/40'">
                        {{ $i }}
                    </span>
                @else
                    <button type="button" @click="score = {{ $i }}"
                        class="w-10 h-10 rounded-full font-semibold text-sm transition-all duration-200 flex items-center justify-center cursor-pointer"
                        :class="Number(score) === {{ $i }} ?
                            'bg-accent text-accent-content scale-105 ring-2 ring-accent/30 font-bold shadow-md' :
                            'bg-base-200 text-base-content hover:bg-base-300'">
                        <span class="w-full text-center pointer-events-none">{{ $i }}</span>
                    </button>
                @endif
            @endfor
        </div>

        <div
            class="flex justify-between w-full max-w text-[9px] uppercase font-bold tracking-widest text-base-content/40 px-1 mt-0.5">
            <span>{{ $start . ' = ' . $minLabel }}</span>
            <span>{{ $end . ' = ' . $maxLabel }}</span>
        </div>
    </div>
</div>
