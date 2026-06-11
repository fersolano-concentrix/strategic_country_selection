<x-layouts.admin>
    @if ($errors->any())
        <div
            class="alert alert-error bg-red-100 text-red-800 border border-red-200 mb-6 rounded-xl shadow-sm flex items-center gap-3 p-4">
            <i class="fa-solid fa-triangle-exclamation text-lg"></i>
            <div>
                <h3 class="font-bold">Validation Error</h3>
                <span class="text-sm">Please review the dimensions. Some required fields are missing or invalid.</span>
            </div>
        </div>
    @endif

    @if ($errors->any())
        <div class="bg-yellow-50 border border-yellow-200 rounded-xl p-4 mb-4 text-sm">
            <p class="font-bold text-yellow-800 mb-2">Fields failing validation:</p>
            <ul class="list-disc pl-4 text-yellow-700">
                @foreach ($errors->messages() as $field => $messages)
                    <li><strong>{{ $field }}</strong>: {{ implode(', ', $messages) }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('countries.update', $country->id) }}" class="w-full mx-auto space-y-6">
        @csrf
        @method('PUT')

        <x-cards.create-node title="1. Edit Profile Core Identity Metadata"
            description="Modify the baseline regional configuration profile within the strategic matrix.">

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
                        <select id="country" name="country"
                            class="select select-bordered pl-11 pr-4 w-full h-12 bg-base-200/50 focus:bg-base-100 border-base-300 focus:border-accent focus:ring-2 focus:ring-accent/20 rounded-xl transition-all font-semibold text-sm text-neutral-700 focus:outline-none {{ $errors->has('country') ? 'border-red-500' : '' }}"
                            onchange="document.getElementById('country_name_hidden').value = this.options[this.selectedIndex].dataset.name;">
                            <option selected value="{{ $country->iso_code }}" data-name="{{ $country->country_name }}">
                                {{ $country->country_name }} ({{ strtoupper($country->iso_code) }})</option>
                        </select>

                        <input type="hidden" id="country_name_hidden" name="country_name"
                            value="{{ old('country_name', $country->country_name) }}">
                    </div>
                    @error('country')
                        <span class="text-xs text-red-500 mt-1">{{ $message }}</span>
                    @enderror
                </div>
            </div>

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
                            value="{{ old('site_region', $country->site_region) }}" placeholder="e.g., San José Hub"
                            class="input input-bordered pl-11 pr-4 w-full h-12 bg-base-200/50 focus:bg-base-100 border-base-300 focus:border-accent focus:ring-2 focus:ring-accent/20 rounded-xl transition-all font-semibold text-sm text-neutral-700 focus:outline-none {{ $errors->has('site_region') ? 'border-red-500' : '' }}" />
                    </div>
                    @error('site_region')
                        <span class="text-xs text-red-500 mt-1">{{ $message }}</span>
                    @enderror
                </div>
            </div>

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
                            value="{{ old('leader_name', $country->leader_name) }}" placeholder="e.g., John Doe"
                            class="input input-bordered pl-11 pr-4 w-full h-12 bg-base-200/50 focus:bg-base-100 border-base-300 focus:border-accent focus:ring-2 focus:ring-accent/20 rounded-xl transition-all font-semibold text-sm text-neutral-700 focus:outline-none {{ $errors->has('leader_name') ? 'border-red-500' : '' }}" />
                    </div>
                    @error('leader_name')
                        <span class="text-xs text-red-500 mt-1">{{ $message }}</span>
                    @enderror
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
                            @click="currentStep = 1">D1 | Human Capital</li>
                        <li :class="currentStep >= 2 ? 'step step-primary text-primary' : 'step text-neutral'"
                            class="step text-xs font-semibold select-none cursor-pointer transition-all duration-200"
                            @click="currentStep = 2">D2 | Business Ecosystem</li>
                        <li :class="currentStep >= 3 ? 'step step-primary text-primary' : 'step text-neutral'"
                            class="step text-xs font-semibold select-none cursor-pointer transition-all duration-200"
                            @click="currentStep = 3">D3 | Operational Profile</li>
                        <li :class="currentStep >= 4 ? 'step step-primary text-primary' : 'step text-neutral'"
                            class="step text-xs font-semibold select-none cursor-pointer transition-all duration-200"
                            @click="currentStep = 4">D4 | Country Profile</li>
                        <li :class="currentStep >= 5 ? 'step step-primary text-primary' : 'step text-neutral'"
                            class="step text-xs font-semibold select-none cursor-pointer transition-all duration-200"
                            @click="currentStep = 5">D5 | Cost Sensitivity</li>
                    </ul>
                </div>

                <div class="mt-6 bg-base-100 rounded-xl min-h-[300px]">

                    <x-panels.dimensions title="D1 | Human Capital (Local Market)" step="1"
                        description="This dimension assesses the maturity and depth of the talent pool in each country, analyzing the availability of qualified profiles, their level of technical specialization, their command of strategic languages, and their cultural alignment with global markets.">
                        <x-forms.score title="1. Educational Level (Pipeline)" :model="$country"
                            description="Evaluate the educational penetration and availability of profiles according to their level of completed academic training in the local talent pool."
                            scores="Evaluation Criteria: 1 - Scarce / Limited Access | 2 - Emerging / Minority | 3 - Stable Meaning | 4 - Abundant / High Availability | 5 - Dominant / Surplus (Blue Ocean)"
                            idPrefix="create_hidden_" :metrics="[
                                '1A. High School / Secondary Education' => 'd1_high_school',
                                '1B. Technical / Vocational Degree' => 'd1_technical',
                                '1C. University Degree (Bachelors)' => 'd1_bachelors',
                                '1D. Postgraduate / Specialization' => 'd1_postgraduate',
                            ]" />

                        <x-forms.score title="2. Talent Specialization" minLabel='1 = Scarce' maxLabel='5 = Powerhouse'
                            :model="$country"
                            description="Evaluate the abundance, graduation rates, and recruitment ease of profiles within your city/country."
                            scores="Evaluation Criteria: 1 - Scarce | 2 - Emerging | 3 - Stable | 4 - Strong | 5 - Regional Powerhouse"
                            idPrefix="create_hidden_" :metrics="[
                                '2A. CX & Hospitality' => 'd1_cx_hospitality',
                                '2B. STEM & Digital' => 'd1_stem_digital',
                                '2C. Professional Services' => 'd1_professional_services',
                                '2D. Healthcare & Sciences' => 'd1_healthcare_sciences',
                                '2E. Business & Sales' => 'd1_business_sales',
                            ]" />

                        <x-forms.score title="3. Bilingualism Depth" minLabel='1 = Restricted'
                            maxLabel='5 = Extremely Easy' :model="$country"
                            description="Indicate the talent pool capability in this country for the following languages."
                            scores="Evaluation Criteria: 1 - Niche / Restricted | 2 - Challenging | 3 - Standard | 4 - Easy | 5 - Extremely Easy"
                            idPrefix="create_hidden_" :metrics="[
                                '3A. Spanish' => 'd1_lang_spanish',
                                '3B. English' => 'd1_lang_english',
                                '3C. Portuguese' => 'd1_lang_portuguese',
                                '3D. French' => 'd1_lang_french',
                                '3E. Italian' => 'd1_lang_italian',
                            ]">
                            <x-forms.input name="d1_lang_others_specify" title="3F. Other Language (Specify)"
                                :model="$country"
                                description="If you evaluated 'Other Language' in the previous metric, specify the language here." />
                        </x-forms.score>

                        <x-forms.score title="4. Global Readiness" minLabel="1 = Very Low" maxLabel="5 = Total"
                            :model="$country"
                            description="Evaluate how aligned the local talent is with the business etiquette and culture of the following global markets."
                            scores="Evaluation Criteria: 1 - Very Low | 2 - Low | 3 - Medium | 4 - High | 5 - Total"
                            idPrefix="create_hidden_" :metrics="[
                                '4A. North America (USA/CAN)' => 'd1_global_ready_na',
                                '4B. Europe (UK/EU)' => 'd1_global_ready_eu',
                                '4C. Spain' => 'd1_global_ready_spain',
                                '4D. LATAM (Cross-border)' => 'd1_global_ready_latam',
                                '4E. Asia / Pacific' => 'd1_global_ready_apac',
                            ]" />
                    </x-panels.dimensions>

                    <x-panels.dimensions title="D2 | Country's Business Ecosystem." step="2"
                        description="This dimension assesses the sophistication and maturity of the local business environment.">
                        <x-forms.score title="1. Presence of Multinationals" minLabel="1=Local"
                            maxLabel="5 = Global Hub" :model="$country"
                            description="How dense is the presence of global companies (Fortune 500) with operational hubs in the city/country?"
                            scores="Evaluation Criteria: 1 - Local | 2 - In Progress | 3 - Stable | 4 - Benchmark | 5 - Global Hub"
                            idPrefix="create_hidden_" :metrics="[
                                '1A. Multinational Corporation Presence' => 'd2_mnc_presence',
                            ]">
                            <x-forms.input name="d2_mnc_years" type="number"
                                title="1B. Years of Experience with Multinationals" :model="$country"
                                description="How many years of experience does the country have with multinational companies?" />
                        </x-forms.score>

                        <x-forms.score title="2. Regulated Industry Maturity" minLabel="1 = None/Basic"
                            maxLabel="5 = World-Class Hub" :model="$country"
                            description="How robust is the presence of advanced manufacturing or specialized services that generate an expert talent pipeline?"
                            scores="Evaluation Criteria: 1 - None/Basic | 2 - Indirect | 3 - Stable | 4 - Specialized | 5 - World-Class Hub"
                            idPrefix="create_hidden_" :metrics="[
                                '2A. Maturity in Strictly Regulated Industries' => 'd2_regulated_industry_maturity',
                            ]">
                            <x-forms.input name="d2_regulated_years" type="number"
                                title="2B. Years of Experience with Strict Regulations" :model="$country"
                                description="How many years of experience do you have in industries with strict regulations?" />
                        </x-forms.score>
                    </x-panels.dimensions>

                    <x-panels.dimensions title="D3 | Current Operational Profile of Concentrix in the Country"
                        step="3"
                        description="This dimension evaluates operational footprint and maturity level in the country.">
                        <x-forms.score title="1. Channel Readiness Matrix" minLabel="1 = No Capability"
                            maxLabel="5 = Specialist" :model="$country"
                            description="Evaluate the current capability, infrastructure, and experience of game changers to operate in each of the following channels."
                            scores="Evaluation Criteria: 1 - No Capability | 2 - Emerging | 3 - Operational | 4 - Advanced | 5 - Specialist"
                            idPrefix="create_hidden_" :metrics="[
                                '1A. Voice' => 'd3_channel_voice',
                                '1B. Chat & Real-Time Messaging' => 'd3_channel_chat',
                                '1C. Email' => 'd3_channel_email',
                                '1D. Back Office (Case Management)' => 'd3_channel_back_office',
                                '1E. Self-Service & AI Support' => 'd3_channel_self_service',
                                '1F. Video Chat' => 'd3_channel_video_chat',
                            ]" />

                        <x-forms.score title="2. Supported Languages" minLabel="0 = Not Supported"
                            maxLabel="5 = Native / Technical-Professional" :model="$country"
                            description="Indicate the scale of languages currently supported from this Location & the Capacity to Hire."
                            scores="Evaluation Criteria: 0 - Not Supported | 1 - Basic (A2) | 2 - Intermediate (B1) | 3 - Operational Fluency (B2) | 4 - Advanced (C1) | 5 - Native or technical-professional (C2)"
                            idPrefix="create_hidden_" :metrics="[
                                '2A. Spanish' => 'd3_lang_spanish',
                                '2B. English B1' => 'd3_lang_english_b1',
                                '2C. English B2' => 'd3_lang_english_b2',
                                '2D. English C1' => 'd3_lang_english_c1',
                                '2E. Portuguese B1' => 'd3_lang_portuguese_b1',
                                '2F. Portuguese B2' => 'd3_lang_portuguese_b2',
                                '2G. Portuguese C1' => 'd3_lang_portuguese_c1',
                            ]">
                            <x-forms.input name="d3_lang_others" title="2H. Others:" :model="$country"
                                description="Specify another language supported." />
                        </x-forms.score>

                        <x-forms.score title="3. Technical Support Maturity (Tech Tiering) / CX" minLabel="0 = None"
                            maxLabel="5 = Strategic (KPO)" :model="$country"
                            description="To what level of technical depth does the operation reach on a massive scale?"
                            scores="Evaluation Criteria: 0 - None | 1 - Minimum | 2 - Guided | 3 - Resolutive | 4 - Professionalized | 5 - Strategic (KPO)"
                            idPrefix="create_hidden_" :metrics="[
                                '3A. Customer Experience (CS)' => 'd3_tech_cx',
                                '3B. Sales' => 'd3_tech_sales',
                                '3C. Collections' => 'd3_tech_collections',
                                '3D. Tier 1 (Front Line)' => 'd3_tech_tier1',
                                '3E. Tier 2 (Troubleshooting)' => 'd3_tech_tier2',
                                '3F. Tier 3 (Expert/Engineering)' => 'd3_tech_tier3',
                                '3G. Back Office' => 'd3_tech_back_office',
                                '3H. Consulting' => 'd3_tech_consulting',
                            ]">
                            <x-forms.input name="d3_tech_years" type="number" title="3I. Years of Experience:"
                                :model="$country" description="Specify the number of years of experience." />
                        </x-forms.score>

                        <x-forms.score title="4. Retention and Stability (Attrition)" :model="$country"
                            description="What is the historical behavior of personnel turnover in this specific node?"
                            scores="If not handled, leave it blank. Enter the annualized attrition percentage for each area (with one decimal place)."
                            idPrefix="create_hidden_">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 pt-2">
                                <x-forms.input name="d3_attrition_cx" type="number" step="0.1"
                                    title="4A. Customer Experience (CS)" :model="$country"
                                    description="Specify the annualized attrition percentage." />
                                <x-forms.input name="d3_attrition_technical" type="number" step="0.1"
                                    title="4B. Technical" :model="$country"
                                    description="Specify the annualized attrition percentage." />
                                <x-forms.input name="d3_attrition_back_office" type="number" step="0.1"
                                    title="4C. Back Office" :model="$country"
                                    description="Specify the annualized attrition percentage." />
                                <x-forms.input name="d3_attrition_sales" type="number" step="0.1"
                                    title="4D. Sales" :model="$country"
                                    description="Specify the annualized attrition percentage." />
                                <x-forms.input name="d3_attrition_collections" type="number" step="0.1"
                                    title="4E. Collections" :model="$country"
                                    description="Specify the annualized attrition percentage." />
                                <x-forms.input name="d3_attrition_consulting" type="number" step="0.1"
                                    title="4F. Consulting" :model="$country"
                                    description="Specify the annualized attrition percentage." />
                            </div>
                        </x-forms.score>

                        <x-forms.score title="5. Supported Markets"
                            description="Indicate the markets currently served from this Country."
                            idPrefix="create_hidden_" :model="$country">
                            <div class="space-y-3 pt-2">
                                @foreach (['5A. North America' => 'd3_market_north_america', '5B. EMEA' => 'd3_market_emea', '5C. Latin America' => 'd3_market_latam', '5D. APAC' => 'd3_market_apac', '5E. Local Market' => 'd3_market_local'] as $label => $metric)
                                    <div
                                        class="flex items-center justify-between py-2 border-b border-base-200/60 last:border-0 hover:bg-base-200/20 px-2 rounded-lg transition-all duration-150">
                                        <span
                                            class="text-sm font-semibold text-base-content">{{ $label }}</span>
                                        <div class="form-control">
                                            <label class="label cursor-pointer gap-3">
                                                <span
                                                    class="text-xs font-bold uppercase tracking-widest text-base-content/40"
                                                    x-text="scores.{{ $metric }} ? 'Yes' : 'No'"></span>
                                                <input type="hidden" name="{{ $metric }}"
                                                    :value="scores.{{ $metric }} ? 1 : 0">
                                                <input type="checkbox" class="toggle toggle-accent toggle-md"
                                                    x-model="scores.{{ $metric }}"
                                                    {{ old($metric, isset($country) ? $country->$metric : false) ? 'checked' : '' }} />
                                            </label>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <x-forms.input name="d3_market_years" type="number" title="5F. Years of Experience:"
                                :model="$country"
                                description="Specify the number of years of experience in the country." />
                        </x-forms.score>

                        <x-forms.score title="6. Industry Experience Matrix" :model="$country"
                            description="Evaluate if the Country currently possesses operational experience and process knowledge in each of the following verticals."
                            idPrefix="create_hidden_">
                            <div class="space-y-3 pt-2">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 pt-2">
                                    @foreach (['6A. Automotive' => 'd3_vertical_automotive', '6B. BFSI' => 'd3_vertical_bfsi', '6C. Energy & Utilities' => 'd3_vertical_energy', '6D. Government & Public Sector' => 'd3_vertical_government', '6E. Healthcare' => 'd3_vertical_healthcare', '6F. Media & Communications' => 'd3_vertical_media', '6G. Retail & Ecommerce' => 'd3_vertical_retail', '6H. Tech & Consumer Electronics' => 'd3_vertical_tech', '6I. Travel, Transp. & Tourism' => 'd3_vertical_travel'] as $label => $metric)
                                        <div
                                            class="flex items-center justify-between py-2 border-b border-base-200/60 last:border-0 hover:bg-base-200/20 px-2 rounded-lg transition-all duration-150">
                                            <span
                                                class="text-sm font-semibold text-base-content">{{ $label }}</span>
                                            <div class="form-control">
                                                <label class="label cursor-pointer gap-3">
                                                    <span
                                                        class="text-xs font-bold uppercase tracking-widest text-base-content/40"
                                                        x-text="scores.{{ $metric }} ? 'Yes' : 'No'"></span>
                                                    <input type="hidden" name="{{ $metric }}"
                                                        :value="scores.{{ $metric }} ? 1 : 0">
                                                    <input type="checkbox" class="toggle toggle-accent toggle-md"
                                                        x-model="scores.{{ $metric }}"
                                                        {{ old($metric, isset($country) ? $country->$metric : false) ? 'checked' : '' }} />
                                                </label>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </x-forms.score>

                        <x-forms.score title="7. Industries: Years of Experience" :model="$country"
                            description="Specify the amount of years of operational experience in the previously mentioned industries."
                            idPrefix="create_hidden_">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 pt-2">
                                <x-forms.input name="d3_exp_years_automotive" type="number" min="0"
                                    step="1" title="7A. Automotive" :model="$country"
                                    value="{{ old('d3_exp_years_automotive', $country->d3_exp_years_automotive) }}" />
                                <x-forms.input name="d3_exp_years_bfsi" type="number" min="0" step="1"
                                    title="7B. BFSI" :model="$country"
                                    value="{{ old('d3_exp_years_bfsi', $country->d3_exp_years_bfsi) }}" />
                                <x-forms.input name="d3_exp_years_energy" type="number" min="0"
                                    step="1" title="7C. Energy & Utilities" :model="$country"
                                    value="{{ old('d3_exp_years_energy', $country->d3_exp_years_energy) }}" />
                                <x-forms.input name="d3_exp_years_government" type="number" min="0"
                                    step="1" title="7D. Government & Public Sector" :model="$country"
                                    value="{{ old('d3_exp_years_government', $country->d3_exp_years_government) }}" />
                                <x-forms.input name="d3_exp_years_healthcare" type="number" min="0"
                                    step="1" title="7E. Healthcare" :model="$country"
                                    value="{{ old('d3_exp_years_healthcare', $country->d3_exp_years_healthcare) }}" />
                                <x-forms.input name="d3_exp_years_media" type="number" min="0"
                                    step="1" title="7F. Media & Communications" :model="$country"
                                    value="{{ old('d3_exp_years_media', $country->d3_exp_years_media) }}" />
                                <x-forms.input name="d3_exp_years_retail" type="number" min="0"
                                    step="1" title="7G. Retail & Ecommerce" :model="$country"
                                    value="{{ old('d3_exp_years_retail', $country->d3_exp_years_retail) }}" />
                                <x-forms.input name="d3_exp_years_tech" type="number" min="0" step="1"
                                    title="7H. Tech & Consumer Electronics" :model="$country"
                                    value="{{ old('d3_exp_years_tech', $country->d3_exp_years_tech) }}" />
                                <x-forms.input name="d3_exp_years_travel" type="number" min="0"
                                    step="1" title="7I. Travel, Transp. & Tourism" :model="$country"
                                    value="{{ old('d3_exp_years_travel', $country->d3_exp_years_travel) }}" />
                            </div>
                        </x-forms.score>

                        <x-forms.score title="8. Infrastructure (Seat Capacity)" :model="$country"
                            description="Provide details regarding the physical operational capacity, seat metrics, and distribution centers for this location."
                            idPrefix="create_hidden_">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 pt-2">
                                <x-forms.input name="d3_total_installed_capacity" type="text"
                                    title="8A. Current Installed Capacity" :model="$country"
                                    value="{{ old('d3_total_installed_capacity', $country->d3_total_installed_capacity) }}" />
                                <x-forms.input name="d3_growth_availability" type="text"
                                    title="8B. Growth Availability" :model="$country"
                                    value="{{ old('d3_growth_availability', $country->d3_growth_availability) }}" />
                                <x-forms.input name="d3_sites_count" type="text" title="8C. Covered Sites Count"
                                    :model="$country"
                                    value="{{ old('d3_sites_count', $country->d3_sites_count) }}" />
                                <x-forms.input name="d3_site_locations" type="text"
                                    title="8D. Site Locations & Names" :model="$country"
                                    value="{{ old('d3_site_locations', $country->d3_site_locations) }}" />
                            </div>
                        </x-forms.score>

                    </x-panels.dimensions>

                    <x-panels.dimensions title="D4 | Country Level Risk Profile" step="4"
                        description="This dimension assesses the level of exposure and resilience of the national environment to external and internal factors.">

                        <x-forms.score title="1. Operational Stability & Country Risk" minLabel="1 = Critical"
                            maxLabel="5 = Very Secure" :model="$country"
                            description="Evaluate the level of security and business continuity provided by the environment for the operation."
                            scores="Evaluation Criteria: 1 - Critical | 2 - Unstable | 3 - Stable | 4 - Solid | 5 - Very Secure"
                            idPrefix="d4_risk_" :metrics="[
                                '1A. Political Stability: Evaluation of government changes, strikes, or disturbances affecting the site.' =>
                                    'd4_political_stability',
                                '1B. Legal Security: Respect for contracts, clear labor laws, and stable tax incentives.' =>
                                    'd4_legal_security',
                                '1C. Physical Security: Security level in the site area for employees and assets.' =>
                                    'd4_physical_security',
                                '1D. Economic Stability: Inflation control and volatility of the local currency against the dollar/euro.' =>
                                    'd4_economic_stability',
                            ]" />

                        <x-forms.score title="2. International Perception" :model="$country"
                            description="How is the country perceived by foreign investors in terms of reputation, country brand, and ease of doing business?"
                            scores="Evaluation Criteria: 1 - Unfavorable | 2 - Emerging | 3 - Reliable | 4 - Attractive | 5 - Top Tier"
                            idPrefix="create_hidden_" :metrics="[
                                '2A. International Perception' => 'd4_international_perception',
                            ]" />

                        <x-forms.score title="3. Compliance and Data Protection" :model="$country"
                            description="How aligned are local laws and site standards with international security regulations (GDPR, HIPAA, PCI)?"
                            scores="Evaluation Criteria: 1 - Incipient | 2 - Basic | 3 - Aligned | 4 - Certified | 5 - World-Class"
                            idPrefix="create_hidden_" :metrics="[
                                '3A. Compliance & Data Protection' => 'd4_compliance_data_protection',
                            ]" />
                    </x-panels.dimensions>

                    <x-panels.dimensions title="D5 | Price Sensitivity & Operating Cost" step="5"
                        description="This dimension assesses the financial competitiveness and cost efficiency of the location.">
                        <x-forms.score title="1. Total Labor Cost Index" :model="$country"
                            description="How would you evaluate the cost of operating a site for the client in this country?"
                            scores="Evaluation Criteria: 1 - Premium | 2 - Above Average | 3 - Standard LATAM | 4 - Competitive | 5 - Maximum Efficiency"
                            idPrefix="create_hidden_" :metrics="[
                                '1A. Total Labor Cost Index' => 'd5_labor_cost_index',
                            ]" />

                        <x-forms.score title="2. Currency Stability and Inflationary Risk" :model="$country"
                            description="How protected is the client's rate against devaluations or uncontrolled inflation in the country?"
                            scores="Evaluation Criteria: 1 - Critical Risk | 2 - Moderate Volatility | 3 - Stable | 4 - Solid | 5 - Armored"
                            idPrefix="create_hidden_" :metrics="[
                                '2B. Currency & Inflation Risk' => 'd5_currency_inflation_risk',
                            ]" />

                        <div class="card mt-6 bg-base-100 shadow-xl border border-base-200 overflow-hidden">
                            <div class="h-1 w-full bg-gradient-to-r from-primary via-accent to-secondary"></div>

                            <div class="card-body p-6 space-y-4">
                                <div class="flex flex-col gap-1.5 pb-3 border-b border-base-200">
                                    <h3 class="text-xs font-bold text-primary uppercase tracking-wider">
                                        3. Profile Qualitative Comments & Observations
                                    </h3>
                                    <p class="text-[11px] text-base-content/60">
                                        Provide any necessary descriptive annotations, operational contexts, or
                                        exceptional baseline matrix notes for this country profile node.
                                    </p>
                                </div>

                                <div class="flex flex-col gap-2 py-2">
                                    <div class="relative flex items-start">
                                        <span
                                            class="absolute left-4 top-3.5 text-neutral-400 pointer-events-none z-10">
                                            <i class="fa-solid fa-comment-dots text-base"></i>
                                        </span>
                                        <textarea id="leader_comments" name="leader_comments" rows="4"
                                            placeholder="Enter analytical overrides, geopolitical landscape remarks, or general profile configuration parameters..."
                                            class="textarea textarea-bordered pl-11 pr-4 w-full bg-base-200/50 focus:bg-base-100 border-base-300 focus:border-accent focus:ring-2 focus:ring-accent/20 rounded-xl transition-all font-semibold text-sm text-neutral-700 focus:outline-none placeholder:text-base-content/30 min-h-[120px]">{{ old('leader_comments', $country->leader_comments ?? '') }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </x-panels.dimensions>

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
                        class="btn bg-primary hover:bg-primary/90 text-white btn-sm rounded-lg font-semibold px-6 shadow-sm animate-fadeIn"
                        x-show="currentStep === maxSteps">
                        Update Profile Parameters
                    </button>
                </div>

            </div>
        </x-cards.create-node>
    </form>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const select = document.getElementById('country');
            const countryNameHidden = document.getElementById('country_name_hidden');

            if (select.value) {
                const selected = select.options[select.selectedIndex];
                if (selected && selected.dataset.name) {
                    countryNameHidden.value = selected.dataset.name;
                }
            }
        });
    </script>
</x-layouts.admin>
