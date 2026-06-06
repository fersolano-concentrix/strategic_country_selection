<x-layouts.admin>
    <div class="bg-white rounded-xl shadow-sm border border-base-300 overflow-hidden">
        <div
            class="p-5 border-b border-base-200 bg-base-50/50 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2">
            <h3 class="font-bold text-base text-primary">Active Country Matrices Pipeline</h3>
            <span class="text-xs text-neutral/50 font-medium">Showing 3 active country nodes in
                records.</span>
        </div>
        <div class="overflow-x-auto w-full rounded-2xl border border-base-300 shadow-sm bg-base-100">
            <table class="table w-full border-separate border-spacing-0">
                <thead>
                    <tr
                        class="bg-base-200/60 text-secondary text-xs uppercase font-bold tracking-wider border-b border-base-300">
                        <th class="py-4 px-6 text-left border-b border-base-300">Country</th>
                        <th class="py-4 px-4 text-center border-b border-base-300">D1 Capital</th>
                        <th class="py-4 px-4 text-center border-b border-base-300">D2 Eco</th>
                        <th class="py-4 px-4 text-center border-b border-base-300">D3 Oper</th>
                        <th class="py-4 px-4 text-center border-b border-base-300">D4 Risk</th>
                        <th class="py-4 px-4 text-center border-b border-base-300">D5 Cost</th>
                        <th class="py-4 px-6 text-right border-b border-base-300">Actions Dashboard</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-base-200 text-sm">
                    <!-- Row: Active / Operational Example -->
                    <tr class="group hover:bg-base-200/30 transition-colors duration-200">
                        <td class="py-4 px-6 text-left relative overflow-hidden whitespace-nowrap">
                            <!-- Dimmed Flag Background Watermark -->
                            <div
                                class="absolute -left-4 -top-2 w-24 opacity-[0.07] pointer-events-none select-none z-0 transform -rotate-12 group-hover:scale-110 transition-transform duration-300">
                                <img src="https://flagcdn.com/w160/cr.png" alt="CR Background"
                                    class="w-full h-auto object-contain">
                            </div>

                            <!-- Content Container -->
                            <div class="flex items-center gap-3 relative z-10">
                                <span class="flex-shrink-0" role="img" aria-label="Flag">
                                    <img src="https://flagcdn.com/w40/cr.png"
                                        class="w-6 h-auto rounded shadow-xs border border-base-300/60" alt="CR">
                                </span>
                                <div>
                                    <div class="flex items-center gap-2">
                                        <span class="font-extrabold text-neutral text-base block leading-tight">Costa
                                            Rica</span>
                                        <span
                                            class="badge badge-success badge-xs text-white font-bold px-1.5 py-2">Live</span>
                                    </div>
                                    <span class="text-neutral-600 font-semibold">San José</span>
                                    <span class="text-[11px] text-neutral-400 block mt-0.5 font-medium">Updated by:
                                        Admin</span>
                                </div>
                            </div>
                        </td>
                        <td class="py-4 px-4 text-center vertical-middle">
                            <span
                                class="badge bg-primary/10 text-primary border-none font-black font-mono px-2.5 py-1 rounded-md text-xs">4.1</span>
                        </td>
                        <td class="py-4 px-4 text-center vertical-middle">
                            <span
                                class="badge bg-secondary/10 text-secondary border-none font-black font-mono px-2.5 py-1 rounded-md text-xs">3.8</span>
                        </td>
                        <td class="py-4 px-4 text-center vertical-middle">
                            <span
                                class="badge bg-warning/10 text-amber-700 border-none font-black font-mono px-2.5 py-1 rounded-md text-xs">4.1</span>
                        </td>
                        <td class="py-4 px-4 text-center vertical-middle">
                            <span
                                class="badge bg-error/10 text-error border-none font-black font-mono px-2.5 py-1 rounded-md text-xs">4.1</span>
                        </td>
                        <td class="py-4 px-4 text-center vertical-middle">
                            <span
                                class="badge bg-accent/10 text-[#007380] border-none font-black font-mono px-2.5 py-1 rounded-md text-xs">3.8</span>
                        </td>

                        <!-- Action Panel Cell -->
                        <td class="py-4 px-6 text-right vertical-middle">
                            <div class="flex items-center justify-end gap-2">

                                <!-- NEW STATUS ACTION BUTTON (Toggles Operational state) -->
                                <button type="button"
                                    class="btn btn-xs bg-success/10 hover:bg-success text-success hover:text-white border border-success/20 font-bold rounded-lg px-2.5 h-8 min-h-8 normal-case transition-all flex items-center gap-1.5 shadow-xs">
                                    <i class="fa-solid fa-circle-check text-[10px]"></i>
                                    <span>Operational</span>
                                </button>

                                <div class="w-px h-4 bg-base-300 mx-0.5"></div>

                                <a href="#"
                                    class="btn btn-xs btn-outline border-base-300 hover:bg-base-200/60 hover:text-[#003D5B] font-bold text-neutral-600 rounded-lg px-2.5 h-8 min-h-8 normal-case transition-all flex items-center gap-1.5">
                                    <i class="fa-solid fa-pen-to-square text-xs text-neutral-400"></i>
                                    Edit Score
                                </a>

                                <button type="button"
                                    class="btn btn-xs btn-square btn-ghost text-neutral-400 hover:text-error hover:bg-error/10 rounded-lg h-8 w-8 min-h-8 transition-all">
                                    <i class="fa-solid fa-trash text-sm"></i>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <!-- Alternate State Row Preview (Showing what Unpublishing looks like) -->
                    <tr class="group hover:bg-base-200/30 transition-colors duration-200 bg-base-50/30">
                        <td class="py-4 px-6 text-left relative overflow-hidden whitespace-nowrap">
                            <div
                                class="absolute -left-4 -top-2 w-24 opacity-[0.04] pointer-events-none select-none z-0 transform -rotate-12 group-hover:scale-110 transition-transform duration-300 grayscale">
                                <img src="https://flagcdn.com/w160/co.png" alt="CO Background"
                                    class="w-full h-auto object-contain">
                            </div>
                            <div class="flex items-center gap-3 relative z-10 opacity-70">
                                <span class="flex-shrink-0 grayscale" role="img" aria-label="Flag">
                                    <img src="https://flagcdn.com/w40/co.png"
                                        class="w-6 h-auto rounded shadow-xs border border-base-300/60" alt="CO">
                                </span>
                                <div>
                                    <div class="flex items-center gap-2">
                                        <span
                                            class="font-extrabold text-neutral text-base block leading-tight">Colombia</span>
                                        <span
                                            class="badge badge-neutral badge-xs text-white font-bold px-1.5 py-2">Draft</span>
                                    </div>
                                    <span class="text-neutral-600 font-semibold">Bogotá</span>
                                    <span class="text-[11px] text-neutral-400 block mt-0.5 font-medium">Updated by:
                                        Admin</span>
                                </div>
                            </div>
                        </td>
                        <td class="py-4 px-4 text-center vertical-middle opacity-60">
                            <span
                                class="badge bg-base-300 text-neutral-500 border-none font-black font-mono px-2.5 py-1 rounded-md text-xs">4.5</span>
                        </td>
                        <td class="py-4 px-4 text-center vertical-middle opacity-60">
                            <span
                                class="badge bg-base-300 text-neutral-500 border-none font-black font-mono px-2.5 py-1 rounded-md text-xs">4.0</span>
                        </td>
                        <td class="py-4 px-4 text-center vertical-middle opacity-60">
                            <span
                                class="badge bg-base-300 text-neutral-500 border-none font-black font-mono px-2.5 py-1 rounded-md text-xs">3.9</span>
                        </td>
                        <td class="py-4 px-4 text-center vertical-middle opacity-60">
                            <span
                                class="badge bg-base-300 text-neutral-500 border-none font-black font-mono px-2.5 py-1 rounded-md text-xs">4.2</span>
                        </td>
                        <td class="py-4 px-4 text-center vertical-middle opacity-60">
                            <span
                                class="badge bg-base-300 text-neutral-500 border-none font-black font-mono px-2.5 py-1 rounded-md text-xs">4.4</span>
                        </td>

                        <td class="py-4 px-6 text-right vertical-middle">
                            <div class="flex items-center justify-end gap-2">

                                <!-- UNPUBLISHED ALTERNATE BUTTON STATE -->
                                <button type="button"
                                    class="btn btn-xs bg-neutral/10 hover:bg-neutral text-neutral-600 hover:text-white border border-base-300 font-bold rounded-lg px-2.5 h-8 min-h-8 normal-case transition-all flex items-center gap-1.5 shadow-xs">
                                    <i class="fa-solid fa-eye-slash text-[10px]"></i>
                                    <span>Unpublished</span>
                                </button>

                                <div class="w-px h-4 bg-base-300 mx-0.5"></div>

                                <a href="#"
                                    class="btn btn-xs btn-outline border-base-300 hover:bg-base-200/60 hover:text-[#003D5B] font-bold text-neutral-600 rounded-lg px-2.5 h-8 min-h-8 normal-case transition-all flex items-center gap-1.5">
                                    <i class="fa-solid fa-pen-to-square text-xs text-neutral-400"></i>
                                    Edit Score
                                </a>

                                <button type="button"
                                    class="btn btn-xs btn-square btn-ghost text-neutral-400 hover:text-error hover:bg-error/10 rounded-lg h-8 w-8 min-h-8 transition-all">
                                    <i class="fa-solid fa-trash text-sm"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</x-layouts.admin>
