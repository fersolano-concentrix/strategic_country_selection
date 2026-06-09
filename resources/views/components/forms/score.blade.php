@props([
    'title',
    'description' => null,
    'scores' => null,
    'metrics' => [],
    'model' => null,
    'minLabel' => '1 = Scarce',
    'maxLabel' => '5 = Dominant',
])

@php
    $initialState = [];
    foreach ($metrics as $metricLabel => $metricName) {
        $initialState[$metricName] = (int) old($metricName, $model ? $model->$metricName : 3);
    }

    // Safely extract integers from text boundaries using regex instead of generic type casting
    preg_match('/\d+/', $minLabel, $minMatch);
    preg_match('/\d+/', $maxLabel, $maxMatch);
    $start = isset($minMatch[0]) ? (int)$minMatch[0] : 1;
    $end = isset($maxMatch[0]) ? (int)$maxMatch[0] : 5;
@endphp

<div {{ $attributes->merge(['class' => 'card mt-4 bg-base-100 shadow-xl border border-base-200 overflow-hidden']) }}
    x-data="{ scores: {{ json_encode($initialState) }} }">

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

        @if ($scores)
            <div class="collapse collapse-plus bg-base-200/50 rounded-xl border border-base-200/60 text-xs">
                <input type="checkbox" class="peer min-h-0 py-2" />
                <div class="collapse-title min-h-0 py-2.5 px-4 font-semibold text-primary/80 flex items-center gap-2 peer-checked:text-primary">
                    <i class="fa-solid fa-info-circle"></i>
                    View Score Evaluation Rubric
                </div>
                <div class="collapse-content px-4 pb-4 text-base-content/80 leading-relaxed">
                    <div class="pt-2 border-t border-base-300/40 space-y-2">
                        @php
                            $cleanScores = str_replace('Evaluation Criteria:', '', $scores);

                            // Upgraded Regex: Matches digits followed by either a colon OR dash, allows subheadings like (C2)
                            preg_match_all('/(\d)\s*[:|-]\s*([^:]+?)(?::\s*(.+?))?(?=\s*\d\s*[:|-]|$)/s', $cleanScores, $matches);
                        @endphp

                        @if (!empty($matches[0]))
                            <div class="grid gap-2">
                                @foreach ($matches[0] as $index => $fullMatch)
                                    @php
                                        $number = trim($matches[1][$index]);
                                        // If there is no detailed sub-description, treat the entire string segment as the title definition
                                        $hasDesc = !empty($matches[3][$index]);
                                        $displayTitle = trim($matches[2][$index]);
                                        $displayDesc = $hasDesc ? trim($matches[3][$index]) : null;
                                    @endphp
                                    <div class="flex items-start gap-2 bg-base-100 p-2 rounded-lg border border-base-200/40 shadow-sm">
                                        <span class="badge badge-sm btn-accent !text-accent-content font-bold shrink-0 mt-0.5 px-1.5 h-5 min-w-[20px] rounded-full">
                                            {{ $number }}
                                        </span>
                                        <div>
                                            @if($displayDesc)
                                                <strong class="text-base-content font-semibold text-xs">{{ $displayTitle }}:</strong>
                                                <span class="text-base-content/70 text-xs leading-tight">{{ $displayDesc }}</span>
                                            @else
                                                <span class="text-base-content font-medium text-xs leading-tight">{{ $displayTitle }}</span>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <p class="text-xs whitespace-pre-line">{{ $scores }}</p>
                        @endif
                    </div>
                </div>
            </div>
        @endif

        <div class="divide-y divide-base-200/60">
            @foreach ($metrics as $metricLabel => $metricName)
                <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4 py-4 first:pt-1 last:pb-1 group hover:bg-base-200/20 px-2 -mx-2 rounded-xl transition-all duration-150">

                    <div class="flex-1">
                        <p class="text-sm font-semibold text-base-content group-hover:text-primary transition-colors">
                            {{ $metricLabel }}
                        </p>
                    </div>

                    <input type="hidden" name="{{ $metricName }}" x-model="scores.{{ $metricName }}">

                    <div class="flex flex-col gap-1 items-end shrink-0">
                        <div class="flex items-center gap-1.5 score-group">
                            @for ($i = $start; $i <= $end; $i++)
                                <button type="button" @click="scores.{{ $metricName }} = {{ $i }}"
                                    class="w-10 h-10 rounded-full font-semibold text-sm transition-all duration-200 flex items-center justify-center cursor-pointer"
                                    :class="scores.{{ $metricName }} === {{ $i }} ?
                                        'bg-accent text-primary scale-105 ring-2 ring-secondary/30 font-bold shadow-md' :
                                        'bg-base-200 text-base-content hover:bg-base-300'">
                                    <span class="w-full text-center pointer-events-none">{{ $i }}</span>
                                </button>
                            @endfor
                        </div>

                        <div class="flex justify-between w-full max-w-[220px] text-[9px] uppercase font-bold tracking-widest text-base-content/40 px-1 mt-0.5">
                            <span>{{ $minLabel }}</span>
                            <span>{{ $maxLabel }}</span>
                        </div>
                    </div>

                </div>
            @endforeach
        </div>

        {{ $slot }}

    </div>
</div>