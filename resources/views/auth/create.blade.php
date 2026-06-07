<x-layouts.admin>
    <form method="POST" action="#" class="w-full mx-auto space-y-6">
        @csrf

        <x-cards.create-node title="1. Profile Core Identity Metadata"
            description="Establish a base regional configuration profile within the strategic matrix.">

            <!-- FIELD 1: Target Geography (Select) -->
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 py-4 first:pt-2">
                <div class="flex-1 space-y-0.5">
                    <label for="country" class="text-sm font-bold text-neutral-700 block">
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
                        <select id="country" name="country" required
                            class="select select-bordered pl-11 pr-4 w-full h-12 bg-base-200/50 focus:bg-base-100 border-base-300 focus:border-[#25E2CC] focus:ring-2 focus:ring-[#25E2CC]/20 rounded-xl transition-all font-semibold text-sm text-neutral-700 focus:outline-none">
                            <option disabled selected hidden>Select a country...</option>
                            <option value="ar">Argentina (AR)</option>
                            <option value="bo">Bolivia (BO)</option>
                            <option value="br">Brazil (BR)</option>
                            <option value="cl">Chile (CL)</option>
                            <option value="co">Colombia (CO)</option>
                            <option value="cr">Costa Rica (CR)</option>
                            <option value="cu">Cuba (CU)</option>
                            <option value="do">Dominican Republic (DO)</option>
                            <option value="ec">Ecuador (EC)</option>
                            <option value="sv">El Salvador (SV)</option>
                            <option value="gt">Guatemala (GT)</option>
                            <option value="hn">Honduras (HN)</option>
                            <option value="mx">Mexico (MX)</option>
                            <option value="ni">Nicaragua (NI)</option>
                            <option value="pa">Panama (PA)</option>
                            <option value="py">Paraguay (PY)</option>
                            <option value="pe">Peru (PE)</option>
                            <option value="pr">Puerto Rico (PR)</option>
                            <option value="uy">Uruguay (UY)</option>
                            <option value="ve">Venezuela (VE)</option>
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
        </x-cards.create-node>
        <x-cards.create-node title="2. Profile Operational Parameters"
            description="Define the core operational parameters and strategic focus areas for the regional profile.">
            <div x-data="{ currentStep: 1, maxSteps: 5 }" class="w-full">

                <div class="w-full overflow-x-auto pb-4">
                    <ul class="steps w-full min-w-[700px]">

                        <li :class="currentStep >= 1 ? 'step step-primary text-primary' : 'step text-neutral'"
                            class="step text-xs font-semibold select-none cursor-pointer transition-all duration-200"
                            @click="currentStep = 1">
                            D1 | Human Capital
                        </li>

                        <li :class="currentStep >= 2 ? 'step step-primary text-primary' : 'step text-neutral'"
                            class="step text-xs font-semibold select-none cursor-pointer transition-all duration-200"
                            @click="currentStep = 2">
                            D2 | Business Ecosystem
                        </li>

                        <li :class="currentStep >= 3 ? 'step step-primary text-primary' : 'step text-neutral'"
                            class="step text-xs font-semibold select-none cursor-pointer transition-all duration-200"
                            @click="currentStep = 3">
                            D3 | Operational Profile
                        </li>

                        <li :class="currentStep >= 4 ? 'step step-primary text-primary' : 'step text-neutral'"
                            class="step text-xs font-semibold select-none cursor-pointer transition-all duration-200"
                            @click="currentStep = 4">
                            D4 | Country Profile
                        </li>

                        <li :class="currentStep >= 5 ? 'step step-primary text-primary' : 'step text-neutral'"
                            class="step text-xs font-semibold select-none cursor-pointer transition-all duration-200"
                            @click="currentStep = 5">
                            D5 | Verticals & Cost
                        </li>

                    </ul>
                </div>

                <div class="mt-6 bg-base-100 rounded-xl min-h-[300px]">

                    <div x-show="currentStep === 1" x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 translate-y-2">
                        <p class="text-sm text-neutral-500">Human Capital metric fields context...</p>
                    </div>

                    <div x-show="currentStep === 2" x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 translate-y-2" x-cloak>
                        <p class="text-sm text-neutral-500">Business Ecosystem metric fields context...</p>
                    </div>

                    <div x-show="currentStep === 3" x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 translate-y-2" x-cloak>
                        <p class="text-sm text-neutral-500">Operational Profile metric fields context...</p>
                    </div>

                    <div x-show="currentStep === 4" x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 translate-y-2" x-cloak>
                        <p class="text-sm text-neutral-500">Country Risk Profile metric fields context...</p>
                    </div>

                    <div x-show="currentStep === 5" x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 translate-y-2" x-cloak>
                        <p class="text-sm text-neutral-500">Vertical Expertise & Financial Efficiency metrics...</p>
                    </div>

                </div>

                <div class="flex justify-between items-center border-t border-base-200 pt-6 mt-8">

                    <button type="button" class="btn btn-outline btn-sm rounded-lg font-medium"
                        :disabled="currentStep === 1" @click="currentStep--">
                        Previous Step
                    </button>

                    <span class="text-xs font-semibold text-neutral/60 select-none">
                        Step <span x-text="currentStep" class="text-primary font-bold"></span> of <span
                            x-text="maxSteps"></span>
                    </span>

                    <button type="button" class="btn btn-primary btn-sm rounded-lg font-semibold text-white px-6"
                        x-show="currentStep < maxSteps" @click="currentStep++">
                        Next Step
                    </button>

                    <button type="submit"
                        class="btn bg-[#003D5B] hover:bg-[#003D5B]/90 text-white btn-sm rounded-lg font-semibold px-6 shadow-sm animate-fadeIn"
                        x-show="currentStep === maxSteps">
                        Save Profile Parameters
                    </button>

                </div>

            </div>
        </x-cards.create-node>
    </form>
</x-layouts.admin>
