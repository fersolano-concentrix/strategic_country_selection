@props([
    'number' => '0',
    'name' => 'Rubric/s name',
    'description' => 'Description of the rubrics.',
    'min' => false,
    'max' => false,
])
<div>
    <span
        class="badge badge-sm btn-accent !text-accent-content font-bold shrink-0 mt-0.5 px-1.5 h-5 min-w-[20px] rounded-full">
        {{ $number }}
    </span>
    <strong class="text-base-content font-semibold text-xs">{{ $name }}:</strong>
    <span class="text-base-content/70 text-xs leading-tight">{{ $description }}</span>
</div>

