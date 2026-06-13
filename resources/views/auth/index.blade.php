<x-layouts.admin>
    {{-- Success message --}}
    @if (session('success'))
        <div x-data="{ show: true }" x-show="show" x-transition
            x-init="setTimeout(() => show = false, 4000)"
            class="alert bg-success/10 border border-success/30 text-success rounded-xl shadow-sm flex items-center gap-3 p-4">
            <i class="fa-solid fa-circle-check text-lg"></i>
            <div class="flex-1">
                <span class="text-sm font-semibold">{{ session('success') }}</span>
            </div>
            <button @click="show = false" class="btn btn-ghost btn-xs btn-circle">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>
    @endif

        {{-- Error message --}}
    @if (session('error'))
        <div x-data="{ show: true }" x-show="show" x-transition
            x-init="setTimeout(() => show = false, 4000)"
            class="alert bg-error/10 border border-error/30 text-error rounded-xl shadow-sm flex items-center gap-3 p-4">
            <i class="fa-solid fa-circle-exclamation text-lg"></i>
            <div class="flex-1">
                <span class="text-sm font-semibold">{{ session('error') }}</span>
            </div>
            <button @click="show = false" class="btn btn-ghost btn-xs btn-circle">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>
    @endif

    {{-- Hero --}}
    <x-cards.hero
        title="Welcome, {{ auth()->user()->name }}!"
        subtitle="Strategic Selection Engine admin panel will provide you with comprehensive oversight and control over all strategic nodes." />

    {{-- Stats cards --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-5">
        <x-cards.admin-cards title="Active Nodes" subtitle="{{ $countries->count() }} {{ $countries->count() === 1 ? 'Country' : 'Countries' }}" />
    </div>

    {{-- Table --}}
    <div class="overflow-x-auto rounded-xl border border-base-200 bg-base-100 shadow-sm">
        <table class="table w-full">
            <thead>
                <tr class="border-b border-base-200">
                    <th class="py-3 px-6 text-left text-xs font-semibold text-base-content/50 uppercase tracking-wide">Country</th>
                    <th class="py-3 px-6 text-left text-xs font-semibold text-base-content/50 uppercase tracking-wide">Region</th>
                    <th class="py-3 px-6 text-left text-xs font-semibold text-base-content/50 uppercase tracking-wide">Score</th>
                    <th class="py-3 px-6 text-left text-xs font-semibold text-base-content/50 uppercase tracking-wide">Status</th>
                    <th class="py-3 px-6 text-right text-xs font-semibold text-base-content/50 uppercase tracking-wide"></th>
                </tr>
            </thead>
            <tbody class="divide-y divide-base-200">
                @forelse ($countries as $country)
                <tr class="group hover:bg-base-200/40 transition-colors duration-200">

                    {{-- Country --}}
                    <td class="py-4 px-6 text-left relative overflow-hidden whitespace-nowrap align-middle">
                        <div class="absolute -left-4 -top-2 w-24 opacity-[0.07] z-0 transform -rotate-12 group-hover:scale-110 transition-transform duration-300">
                            <img src="https://flagcdn.com/w160/{{ strtolower($country->iso_code) }}.png" alt="" aria-hidden="true" class="w-full h-auto object-contain">
                        </div>
                        <div class="flex items-center gap-3 relative z-10">
                            <img src="https://flagcdn.com/w40/{{ strtolower($country->iso_code) }}.png"
                                class="w-6 h-auto rounded shadow-sm border border-base-300/60 flex-shrink-0"
                                alt="{{ $country->country_name ?? $country->country }}">
                            <span class="font-extrabold text-neutral text-base leading-tight">
                                {{ $country->country_name ?? $country->country }}
                            </span>
                        </div>
                    </td>

                    {{-- Region --}}
                    <td class="py-4 px-6 align-middle text-base-content/70 font-medium">
                        {{ $country->site_region }}
                    </td>

                    {{-- Score --}}
                    <td class="py-4 px-6 align-middle">
                        <span class="font-bold text-sm text-amber-700 bg-amber-50 px-2.5 py-0.5 rounded-md border border-amber-200/60">
                            {{ $country->average_score ?? 'N/A' }}
                        </span>
                    </td>

                    {{-- Status --}}
                    <td class="py-4 px-6 align-middle">
                        <div class="inline-flex items-center gap-2 bg-success/10 text-success text-xs font-bold px-2.5 py-1 rounded-full border border-success/20">
                            <span class="w-1.5 h-1.5 rounded-full bg-success inline-block"></span>
                            Operational
                        </div>
                    </td>

                    {{-- Action --}}
                    <td class="py-4 px-6 text-right align-middle">
                        <a href="{{ route('countries.show', $country) }}" class="btn btn-ghost btn-square btn-sm">
                            <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </td>

                </tr>
                @empty
                <tr>
                    <td colspan="5" class="py-16 text-center">
                        <div class="flex flex-col items-center gap-3 text-base-content/30">
                            <i class="fa-solid fa-earth-americas text-4xl"></i>
                            <p class="text-sm font-medium">No strategic nodes registered yet.</p>
                            <a href="{{ route('countries.create') }}" class="btn btn-primary btn-sm mt-1">
                                <i class="fa-solid fa-plus"></i> Add First Node
                            </a>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    {{-- ./table --}}

</x-layouts.admin>