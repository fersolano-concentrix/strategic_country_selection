@props([
    'name' => '',
    'title' => 'Input Title',
    'description' => 'Input description goes here.',
    'type' => 'text',
    'model' => null,
])

<div
    class="flex flex-col sm:flex-row sm:items-center gap-4 py-3 px-4 bg-base-200/30 rounded-xl border border-base-200/60 text-xs mt-[-8px]">
    <div class="flex-1">
        <label for="{{ $name }}" class="font-semibold text-base-content/80 block mb-1 sm:mb-0">
            <i class="fa-solid fa-pen-to-square text-primary mr-1"></i> {{ $title }}
        </label>
        <p class="text-[11px] text-base-content/50">{{ $description }}</p>
    </div>
    <div class="w-full sm:w-72">
        <input type="{{ $type }}" name="{{ $name }}" id="{{ $name }}"
            value="{{ old($name, $model->$name ?? '') }}"
            class="input input-bordered input-sm w-full bg-base-100 text-xs focus:outline-none focus:border-primary rounded-lg shadow-sm transition-all placeholder:text-base-content/30" />
    </div>
</div>
