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

    <div class="bg-white rounded-xl shadow-sm border border-base-300 overflow-hidden">

        {{-- Header --}}
        <div
            class="p-5 border-b border-base-200 bg-base-50/50 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2">
            <h3 class="font-bold text-base text-primary">Active Country Matrices Pipeline</h3>
            <span class="text-xs text-neutral/50 font-medium">
                Showing {{ $countries->count() }} active
                {{ $countries->count() === 1 ? 'country node' : 'country nodes' }} in records.
            </span>
        </div>

        <div class="overflow-x-auto w-full" x-data="{ activeId: null, activeName: '' }">
            <table class="table w-full border-separate border-spacing-0">
                <thead>
                    <tr class="bg-base-200/60 text-secondary text-xs uppercase font-bold tracking-wider">
                        <th class="py-4 px-6 text-left border-b border-base-300">Country</th>
                        <th class="py-4 px-4 text-center border-b border-base-300">D1 Capital</th>
                        <th class="py-4 px-4 text-center border-b border-base-300">D2 Eco</th>
                        <th class="py-4 px-4 text-center border-b border-base-300">D3 Oper</th>
                        <th class="py-4 px-4 text-center border-b border-base-300">D4 Risk</th>
                        <th class="py-4 px-4 text-center border-b border-base-300">D5 Cost</th>
                        <th class="py-4 px-6 text-right border-b border-base-300">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-base-200 text-sm">
                    @forelse ($countries as $country)
                        <tr class="group hover:bg-base-200/30 transition-colors duration-200">

                            {{-- Country identity --}}
                            <td class="py-4 px-6 text-left relative overflow-hidden whitespace-nowrap align-middle">
                                <div
                                    class="absolute -left-4 -top-2 w-24 opacity-[0.07] pointer-events-none select-none z-0 transform -rotate-12 group-hover:scale-110 transition-transform duration-300">
                                    <img src="https://flagcdn.com/w160/{{ strtolower($country->iso_code) }}.png"
                                        alt="" aria-hidden="true" class="w-full h-auto object-contain">
                                </div>
                                <div class="flex items-center gap-3 relative z-10">
                                    <img src="https://flagcdn.com/w40/{{ strtolower($country->iso_code) }}.png"
                                        class="w-6 h-auto rounded shadow-xs border border-base-300/60 flex-shrink-0"
                                        alt="{{ $country->country_name ?? $country->country }}">
                                    <div>
                                        <div class="flex items-center gap-2">
                                            <span class="font-extrabold text-neutral text-base leading-tight">
                                                {{ $country->country_name ?? $country->country }}
                                            </span>
                                            <span
                                                class="badge badge-success badge-xs text-white font-bold px-1.5 py-2">Live</span>
                                        </div>
                                        <span
                                            class="text-neutral-600 font-semibold text-xs">{{ $country->site_region }}</span>
                                        <span class="text-[11px] text-neutral-400 block mt-0.5 font-medium">
                                            Updated by: {{ $country->updatedBy?->name ?? 'Admin' }}
                                        </span>
                                    </div>
                                </div>
                            </td>

                            {{-- D1 --}}
                            <td class="py-4 px-4 text-center align-middle">
                                <span
                                    class="badge bg-primary/10 text-primary border-none font-black font-mono px-2.5 py-1 rounded-md text-xs">
                                    {{ $country->d1_score ?? '—' }}
                                </span>
                            </td>

                            {{-- D2 --}}
                            <td class="py-4 px-4 text-center align-middle">
                                <span
                                    class="badge bg-secondary/10 text-secondary border-none font-black font-mono px-2.5 py-1 rounded-md text-xs">
                                    {{ $country->d2_score ?? '—' }}
                                </span>
                            </td>

                            {{-- D3 --}}
                            <td class="py-4 px-4 text-center align-middle">
                                <span
                                    class="badge bg-warning/10 text-amber-700 border-none font-black font-mono px-2.5 py-1 rounded-md text-xs">
                                    {{ $country->d3_score ?? '—' }}
                                </span>
                            </td>

                            {{-- D4 --}}
                            <td class="py-4 px-4 text-center align-middle">
                                <span
                                    class="badge bg-error/10 text-error border-none font-black font-mono px-2.5 py-1 rounded-md text-xs">
                                    {{ $country->d4_score ?? '—' }}
                                </span>
                            </td>

                            {{-- D5 --}}
                            <td class="py-4 px-4 text-center align-middle">
                                <span
                                    class="badge bg-accent/10 text-secondary border-none font-black font-mono px-2.5 py-1 rounded-md text-xs">
                                    {{ $country->d5_score ?? '—' }}
                                </span>
                            </td>

                            {{-- Actions --}}
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('countries.edit', $country) }}"
                                        class="btn btn-xs btn-square btn-ghost text-neutral-400 hover:text-primary hover:bg-primary/10 rounded-lg h-8 w-8 min-h-8 transition-all flex items-center justify-center">
                                        <i class="fa-solid fa-pen-to-square text-sm"></i>
                                    </a>

                                    <button type="button" class="btn btn-ghost btn-xs text-error font-bold"
                                        @click="$dispatch('open-delete-modal', { id: '{{ $country->id }}', name: '{{ addslashes($country->country) }}' })">
                                        <i class="fa-solid fa-trash-can"></i> Delete
                                    </button>
                                </div>
                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="py-16 text-center">
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
    </div>
    <dialog id="secure_delete_modal" class="modal modal-bottom sm:modal-middle" x-data="{ activeId: window.deleteActiveId || null, activeName: window.deleteActiveName || '' }"
        @open-delete-modal.window="activeId = $event.detail.id; activeName = $event.detail.name; document.getElementById('secure_delete_modal').showModal()">

        <div class="modal-box bg-white max-w-md p-6 rounded-2xl border border-base-200 shadow-xl">

            <div class="flex items-center gap-3 mb-4 text-error">
                <div class="p-3 bg-error/10 rounded-xl">
                    <i class="fa-solid fa-triangle-exclamation text-xl"></i>
                </div>
                <div>
                    <h3 class="text-lg font-bold text-neutral-800">Confirm Node Deletion</h3>
                    <p class="text-xs text-neutral-500 font-medium">This administrative purge action cannot be undone.
                    </p>
                </div>
            </div>

            <form :action="'/countries/' + activeId" method="POST" class="space-y-4">
                @csrf
                @method('DELETE')

                <div class="space-y-2 bg-neutral-50 border border-base-200 rounded-xl p-4">
                    <label for="admin_password_confirmation"
                        class="block text-xs font-bold text-neutral-600 uppercase tracking-wider">
                        Administrator Password
                    </label>
                    <p class="text-[11px] text-neutral-500 leading-relaxed mb-2">
                        Please verify your security credentials to confirm the removal of <span
                            class="font-bold text-neutral-700" x-text="activeName"></span> from the live platform
                        registry context.
                    </p>
                    <div class="relative flex items-center">
                        <span class="absolute left-4 text-neutral-400 pointer-events-none z-10">
                            <i class="fa-solid fa-lock text-sm"></i>
                        </span>
                        <input type="password" id="admin_password_confirmation" name="password" required
                            placeholder="Enter your security credentials..."
                            class="input input-bordered input-sm pl-11 pr-4 w-full h-11 bg-base-200/50 focus:bg-base-100 border-base-300 focus:border-error focus:ring-2 focus:ring-error/20 rounded-xl transition-all font-semibold text-sm text-neutral-700 focus:outline-none" />
                    </div>
                </div>

                <div class="flex justify-end gap-2 pt-4 border-t border-base-200">
                    <button type="button" class="btn btn-sm btn-ghost rounded-lg px-4 text-xs font-semibold"
                        onclick="document.getElementById('secure_delete_modal').close()">
                        Cancel
                    </button>
                    <button type="submit"
                        class="btn btn-sm btn-error text-white rounded-lg px-5 text-xs font-bold shadow-sm">
                        <i class="fa-solid fa-shield-halved mr-1"></i> Verify & Delete Node
                    </button>
                </div>
            </form>
        </div>

        <form method="dialog" class="modal-backdrop bg-neutral-900/40 backdrop-blur-xs">
            <button>close</button>
        </form>
    </dialog>
</x-layouts.admin>
