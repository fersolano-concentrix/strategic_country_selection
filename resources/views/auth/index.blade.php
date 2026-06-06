<x-layouts.admin>
    <!-- hero -->
    <x-cards.hero title="Welcome, Admin"
        subtitle="Strategic Selection Engine admin panel will provide you with comprehensive oversight and control over all strategic nodes." />
    <!-- ./hero -->
    <!-- cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-5">

        <x-cards.admin-cards title="Active Nodes" subtitle="3 Countries" />

    </div>
    <!-- ./cards -->
    <!-- table -->
    <div class="bg-base-100 rounded-2xl border border-base-300 shadow-sm overflow-hidden">
        <div
            class="p-5 border-b border-base-300 flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-base-50/50">
            <div>
                <h3 class="font-bold text-lg text-secondary">Active Country Nodes</h3>
                <p class="text-xs text-neutral-400">Active countries in the strategic selection engine.</p>
            </div>
        </div>

        <div class="overflow-x-auto w-full rounded-2xl border border-base-300 shadow-sm bg-base-100">
            <table class="table w-full border-separate border-spacing-0">
                <!-- Table Header -->
                <thead>
                    <tr
                        class="bg-base-200/60 text-neutral-500 font-bold text-xs uppercase tracking-wider border-b border-base-300">
                        <th class="py-4 px-6 border-b border-base-300">Country</th>
                        <th class="py-4 px-6 border-b border-base-300">Primary Site</th>
                        <th class="py-4 px-6 border-b border-base-300">Score Average</th>
                        <th class="py-4 px-6 border-b border-base-300">Status</th>
                        <th class="py-4 px-6 text-right border-b border-base-300">Actions</th>
                    </tr>
                </thead>

                <!-- Table Body -->
                <tbody class="divide-y divide-base-200">
                    <!-- Row 1: Costa Rica -->
                    <tr class="group hover:bg-base-200/40 transition-colors duration-200">
                        <!-- Country Cell with Watermark Flag Background -->
                        <td class="py-4 px-6 text-left relative overflow-hidden whitespace-nowrap">
                            <!-- Dimmed Background Flag Watermark -->
                            <div
                                class="absolute -left-4 -top-2 w-24 opacity-[0.07] pointer-events-none select-none z-0 transform -rotate-12 group-hover:scale-110 transition-transform duration-300">
                                <img src="https://flagcdn.com/w160/cr.png" alt="CR Background"
                                    class="w-full h-auto object-contain">
                            </div>

                            <!-- Primary Content Layer -->
                            <div class="flex items-center gap-3 relative z-10">
                                <span class="flex-shrink-0" role="img" aria-label="Flag">
                                    <img src="https://flagcdn.com/w40/cr.png"
                                        class="w-6 h-auto rounded shadow-xs border border-base-300/60" alt="CR">
                                </span>
                                <div>
                                    <span class="font-extrabold text-neutral text-base block leading-tight">Costa
                                        Rica</span>
                                    <span class="text-[11px] text-neutral-400 block mt-0.5 font-medium">Updated by:
                                        Admin</span>
                                </div>
                            </div>
                        </td>

                        <!-- Site Cell -->
                        <td class="py-4 px-6 text-neutral-600 font-medium vertical-middle">
                            San José Hub
                        </td>

                        <!-- Score Average Cell -->
                        <td class="py-4 px-6 vertical-middle">
                            <div class="flex items-center gap-1.5">
                                <div class="rating rating-xs">
                                    <input type="radio" class="mask mask-star-2 bg-amber-400" disabled checked />
                                </div>
                                <span
                                    class="font-bold text-sm text-neutral-700 bg-amber-50 text-amber-700 px-2.5 py-0.5 rounded-md border border-amber-200/60">
                                    4.7
                                </span>
                            </div>
                        </td>

                        <!-- Status Cell -->
                        <td class="py-4 px-6 vertical-middle">
                            <div
                                class="inline-flex items-center gap-2 bg-success/10 text-success text-xs font-bold px-2.5 py-1 rounded-full border border-success/20">
                                <span class="h-1.5 w-1.5 rounded-full bg-success animate-pulse"></span>
                                Operational
                            </div>
                        </td>

                        <!-- Actions Cell -->
                        <td class="py-4 px-6 text-right vertical-middle">
                            <button
                                class="btn btn-ghost btn-square btn-sm text-neutral-400 hover:text-primary hover:bg-primary/10 rounded-xl transition-all duration-200">
                                <i
                                    class="fa-solid fa-arrow-right text-sm transform group-hover:translate-x-0.5 transition-transform"></i>
                            </button>
                        </td>
                    </tr>

                    <!-- Row 2: Colombia Placeholder for layout testing -->
                    <tr class="group hover:bg-base-200/40 transition-colors duration-200">
                        <td class="py-4 px-6 text-left relative overflow-hidden whitespace-nowrap">
                            <div
                                class="absolute -left-4 -top-2 w-24 opacity-[0.07] pointer-events-none select-none z-0 transform -rotate-12 group-hover:scale-110 transition-transform duration-300">
                                <img src="https://flagcdn.com/w160/co.png" alt="CO Background"
                                    class="w-full h-auto object-contain">
                            </div>
                            <div class="flex items-center gap-3 relative z-10">
                                <span class="flex-shrink-0" role="img" aria-label="Flag">
                                    <img src="https://flagcdn.com/w40/co.png"
                                        class="w-6 h-auto rounded shadow-xs border border-base-300/60" alt="CO">
                                </span>
                                <div>
                                    <span
                                        class="font-extrabold text-neutral text-base block leading-tight">Colombia</span>
                                    <span class="text-[11px] text-neutral-400 block mt-0.5 font-medium">Updated by:
                                        Admin</span>
                                </div>
                            </div>
                        </td>
                        <td class="py-4 px-6 text-neutral-600 font-medium vertical-middle">
                            Bogotá Hub
                        </td>
                        <td class="py-4 px-6 vertical-middle">
                            <div class="flex items-center gap-1.5">
                                <div class="rating rating-xs">
                                    <input type="radio" class="mask mask-star-2 bg-amber-400" disabled checked />
                                </div>
                                <span
                                    class="font-bold text-sm text-neutral-700 bg-amber-50 text-amber-700 px-2.5 py-0.5 rounded-md border border-amber-200/60">
                                    4.5
                                </span>
                            </div>
                        </td>
                        <td class="py-4 px-6 vertical-middle">
                            <div
                                class="inline-flex items-center gap-2 bg-success/10 text-success text-xs font-bold px-2.5 py-1 rounded-full border border-success/20">
                                <span class="h-1.5 w-1.5 rounded-full bg-success animate-pulse"></span>
                                Operational
                            </div>
                        </td>
                        <td class="py-4 px-6 text-right vertical-middle">
                            <button
                                class="btn btn-ghost btn-square btn-sm text-neutral-400 hover:text-primary hover:bg-primary/10 rounded-xl transition-all duration-200">
                                <i
                                    class="fa-solid fa-arrow-right text-sm transform group-hover:translate-x-0.5 transition-transform"></i>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <!-- ./table -->
</x-layouts.admin>
