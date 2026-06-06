<x-layouts.admin>
    <form method="POST" action="#" class="w-full max-w-3xl mx-auto space-y-6">
        @csrf

        <div class="card bg-base-100 shadow-sm border border-base-300/80 overflow-hidden rounded-2xl">
            <!-- Card Header Section -->
            <div class="border-b border-base-200 px-6 py-5 bg-base-50/50">
                <h2 class="text-xs font-bold text-[#003D5B] uppercase tracking-wider">
                    1. Profile Core Identity Metadata
                </h2>
                <p class="text-xs text-neutral-400 mt-1 font-medium">
                    Establish a base regional configuration profile within the strategic matrix layer.
                </p>
            </div>

            <!-- Card Body Content Section -->
            <div class="p-6 divide-y divide-base-200/60">

                <!-- FIELD 1: Target Geography (Select) -->
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 py-4 first:pt-2">
                    <div class="flex-1 space-y-0.5">
                        <label for="name" class="text-sm font-bold text-neutral-700 block">
                            Target Geography
                        </label>
                        <span class="text-xs text-neutral-400 font-medium block">
                            Select the baseline operations sovereign node.
                        </span>
                    </div>
                    <div class="w-full sm:w-80">
                        <div class="relative flex items-center">
                            <span class="absolute left-4 text-neutral-400 pointer-events-none z-10">
                                <i class="fa-solid fa-earth-americas text-base"></i>
                            </span>
                            <select id="name" name="name" required
                                class="select select-bordered pl-11 pr-4 w-full h-12 bg-base-200/50 focus:bg-base-100 border-base-300 focus:border-[#25E2CC] focus:ring-2 focus:ring-[#25E2CC]/20 rounded-xl transition-all font-semibold text-sm text-neutral-700 focus:outline-none">
                                <option disabled selected hidden>Select a country...</option>
                                <option value="cr">Costa Rica (CR)</option>
                                <option value="co">Colombia (CO)</option>
                                <option value="mx">Mexico (MX)</option>
                                <option value="us">United States (US)</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- FIELD 2: Country Site / Region (Text Input) -->
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 py-4">
                    <div class="flex-1 space-y-0.5">
                        <label for="site_region" class="text-sm font-bold text-neutral-700 block">
                            Country Site / Region
                        </label>
                        <span class="text-xs text-neutral-400 font-medium block">
                            Specify the specific operational hub location.
                        </span>
                    </div>
                    <div class="w-full sm:w-80">
                        <div class="relative flex items-center">
                            <span class="absolute left-4 text-neutral-400 pointer-events-none z-10">
                                <i class="fa-solid fa-location-dot text-base"></i>
                            </span>
                            <input type="text" id="site_region" name="site_region" required
                                value="{{ old('site_region') }}" placeholder="e.g., San José Hub"
                                class="input input-bordered pl-11 pr-4 w-full h-12 bg-base-200/50 focus:bg-base-100 border-base-300 focus:border-[#25E2CC] focus:ring-2 focus:ring-[#25E2CC]/20 rounded-xl transition-all font-semibold text-sm text-neutral-700 focus:outline-none" />
                        </div>
                    </div>
                </div>

                <!-- FIELD 3: Country Leader's Name (Text Input) -->
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 py-4 last:pb-2">
                    <div class="flex-1 space-y-0.5">
                        <label for="leader_name" class="text-sm font-bold text-neutral-700 block">
                            Country Leader's Name
                        </label>
                        <span class="text-xs text-neutral-400 font-medium block">
                            Assign the primary directing regional executive.
                        </span>
                    </div>
                    <div class="w-full sm:w-80">
                        <div class="relative flex items-center">
                            <span class="absolute left-4 text-neutral-400 pointer-events-none z-10">
                                <i class="fa-solid fa-user-tie text-base"></i>
                            </span>
                            <input type="text" id="leader_name" name="leader_name" required
                                value="{{ old('leader_name') }}" placeholder="e.g., John Doe"
                                class="input input-bordered pl-11 pr-4 w-full h-12 bg-base-200/50 focus:bg-base-100 border-base-300 focus:border-[#25E2CC] focus:ring-2 focus:ring-[#25E2CC]/20 rounded-xl transition-all font-semibold text-sm text-neutral-700 focus:outline-none" />
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </form>
</x-layouts.admin>
