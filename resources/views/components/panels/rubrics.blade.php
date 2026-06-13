@props([
    'title' => 'View Score Evaluation Rubric',
])
<div class="collapse collapse-plus bg-base-200/50 rounded-xl border border-base-200/60 text-xs">
    <input type="checkbox" class="peer min-h-0 py-2" />
    <div
        class="collapse-title min-h-0 py-2.5 px-4 font-semibold text-primary/80 flex items-center gap-2 peer-checked:text-primary">
        <i class="fa-solid fa-info-circle"></i>
        {{ $title }}
    </div>
    <div class="collapse-content px-4 pb-4 text-base-content/80 leading-relaxed">
        <div class="pt-2 border-t border-base-300/40">
            <div class="grid grid-cols-1 gap-2">
                {{ $slot }}
            </div>
        </div>
    </div>
</div>
