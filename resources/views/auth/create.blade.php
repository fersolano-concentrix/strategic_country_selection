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
                            D5 | Cost Sensitivity
                        </li>

                    </ul>
                </div>

                <div class="mt-6 bg-base-100 rounded-xl min-h-[300px]">

                    <!-- DIMENSION 1: Human Capital -->
                    <x-panels.dimensions title="D1 | Human Capital (Local Market)" step="1"
                        description="This dimension assesses the maturity and depth of the talent pool in each country, analyzing the availability of qualified profiles, their level of technical specialization, their command of strategic languages, and their cultural alignment with global markets.">
                        <x-forms.score title="1. Educational Level (Pipeline)"
                            description="Evaluate the educational penetration and availability of profiles according to their level of completed academic training in the local talent pool."
                            scores="Evaluation Criteria: 1 - Scarce / Limited Access: Very few people reach this level. Recruiting profiles with this degree is a headhunting challenge. 2 - Emerging / Minority: There is a supply, but it is limited. Talent with this level is usually quickly absorbed by other local industries. 3 - Stable Meaning: There is a constant flow of graduates. It is the market standard; you can fill vacancies in normal timeframes (30 days). 4 - Abundant / High Availability: Most young people in the talent pool have this level. The market produces more graduates than the local industry can absorb. 5 - Dominant / Surplus (Blue Ocean): This is the minimum 'floor' of the market. There is a massive oversupply of profiles with this level."
                            idPrefix="create_hidden_" :metrics="[
                                '1A. High School / Secondary Education' => 'd1_high_school',
                                '1B. Technical / Vocational Degree' => 'd1_technical',
                                '1C. University Degree (Bachelors)' => 'd1_bachelors',
                                '1D. Postgraduate / Specialization' => 'd1_postgraduate',
                            ]" />

                        <x-forms.score title="2. Talent Specialization" minLabel='1 = Scarce' maxLabel='5 = Powerhouse'
                            description="Evaluate the abundance, graduation rates, and recruitment ease of profiles within your city/country."
                            scores="Evaluation Criteria: 1 - Scarce: No strong local Universities, recruiting 10 people takes months. 2 - Emerging: Small institutes are present; junior talent is available but limited. 3 - Stable: Constant educational supply; competitive market but with a steady talent flow. 4 - Strong: It is a pillar of the city; massive annual graduation rates and experienced talent. 5 - Regional Powerhouse: Recognized hub; the country is famous for exporting this type of talent."
                            idPrefix="create_hidden_" :metrics="[
                                '2A. CX & Hospitality (Tourism, arts, social fields. Customer service and empathy focus)' =>
                                    'd1_cx_hospitality',
                                '2B. STEM & Digital (Engineers, developers, data analysts. Technical and complex support profiles)' =>
                                    'd1_stem_digital',
                                '2C. Professional Services (Accountants, lawyers, financial, HR. Ideal for Back-office processes like F&A, HRO)' =>
                                    'd1_professional_services',
                                '2D. Healthcare & Sciences (Nurses, doctors, bio-tech specialists. Ideal for clinical or pharmaceutical support)' =>
                                    'd1_healthcare_sciences',
                                '2E. Business & Sales (Administrators, marketers. Profiles with high negotiation and closing capabilities)' =>
                                    'd1_business_sales',
                            ]" />

                        <x-forms.score title="3. Bilingualism Depth" minLabel='1 = Restricted'
                            maxLabel='5 = Extremely Easy'
                            description="Indicate the talent pool capability in this country for the following languages."
                            scores="Evaluation Criteria: 1 - Niche / Restricted: Very limited availability and only found in highly specific sectors. 2 - Challenging: Talent is limited and fiercely contested among companies. 3 - Standard: Sufficient talent exists, but requires active attracting efforts from Concentrix. 4 - Easy: Mature market with a constant flow of qualified bilingual candidates. Manageable competition. 5 - Extremely Easy: Massive and surplus talent pool."
                            idPrefix="create_hidden_" :metrics="[
                                '3A. Spanish' => 'd1_lang_spanish',
                                '3B. English' => 'd1_lang_english',
                                '3C. Portuguese' => 'd1_lang_portuguese',
                                '3D. French' => 'd1_lang_french',
                                '3E. Italian' => 'd1_lang_italian',
                            ]">
                            <x-forms.input name="d1_lang_others_specify" title="3F. Other Language (Specify)"
                                description="If you evaluated 'Other Language' in the previous metric, specify the language here." />
                        </x-forms.score>
                        <x-forms.score title="4. Global Readiness" minLabel="1 = Very Low" maxLabel="5 = Total"
                            description="Evaluate how aligned the local talent is with the business etiquette and culture of the following global markets."
                            scores="Evaluation Criteria: 1 - Very Low: Frequent cultural clash; requires intensive 'business etiquette' training. 2 - Low: Aware of the market, but communication style is highly local/informal. 3 - Medium: Familiar with the culture (media consumers); requires minor soft skills adjustments. 4 - High: Well-aligned; understands idioms, punctuality standards, and service expectations. 5 - Total: 'Cultural Twins'. The client notices no difference in working style vs. their domestic team."
                            idPrefix="create_hidden_" :metrics="[
                                '4A. North America (USA/CAN)' => 'd1_global_ready_na',
                                '4B. Europe (UK/EU)' => 'd1_global_ready_eu',
                                '4C. Spain' => 'd1_global_ready_spain',
                                '4D. LATAM (Cross-border)' => 'd1_global_ready_latam',
                                '4E. Asia / Pacific' => 'd1_global_ready_apac',
                            ]" />
                    </x-panels.dimensions>

                    <!-- DIMENSION 2: Business Ecosystem -->
                    <x-panels.dimensions title="D2 | Country's Business Ecosystem." step="2"
                        description="
                        This dimension assesses the sophistication and maturity of the local business environment. It
                        analyzes the density of multinational corporations, the trajectory of the BPO and technology
                        sectors, and market experience in industries with strict compliance regulations.">

                        <x-forms.score title="1. Presence of Multinationals" minLabel="1=Local"
                            maxLabel="5 = Global Hub"
                            description="How dense is the presence of global companies (Fortune 500) with operational hubs in the city/country?"
                            scores="Evaluation Criteria: 1 - Local: Market dominated by national companies; minimal presence of global brands. 2 - In Progress: Some global brands have commercial offices, but few large-scale operations. 3 - Stable: Clear presence of multinationals with functional operational centers. 4 - Benchmark: Preferred regional hub for foreign companies to establish headquarters. 5 - Global Hub: Massive density of multinationals; global corporate culture standardized throughout the city."
                            idPrefix="create_hidden_" :metrics="[
                                '1A. Multinational Corporation Presence' => 'd2_mnc_presence',
                            ]">
                            <x-forms.input name="d2_mnc_years" type="number"
                                title="1B. Years of Experience with Multinationals"
                                description="How many years of experience does the country have with multinational companies?" />
                        </x-forms.score>

                        <x-forms.score title="2. Regulated Industry Maturity" minLabel="1 = None/Basic"
                            maxLabel="5 = World-Class Hub"
                            description="How robust is the presence of advanced manufacturing or specialized services that generate an expert talent pipeline in international regulations (FDA, ISO 13485, HIPAA, etc.)?"
                            scores="Evaluation Criteria: 1 - None/Basic: No clusters of regulated industries; talent is unfamiliar with audit or compliance processes. 2 - Indirect: Presence of mass consumer companies with basic quality standards, but without critical certifications. 3 - Stable: Medical device plants or pharmaceutical service centers exist; talent understands the concept of 'compliance'. 4 - Specialized: The city has a medical devices/life sciences cluster. It is easy to find profiles who know how to document processes. 5 - World-Class Hub: The country is a regional leader. There is an educational and professional ecosystem dedicated exclusively to these areas."
                            idPrefix="create_hidden_" :metrics="[
                                '2A. Maturity in Strictly Regulated Industries (e.g., MedTech / Life Sciences)' =>
                                    'd1_regulated_industry_maturity',
                            ]">
                            <x-forms.input name="d2_mnc_years" type="number"
                                title="2B. Years of Experience with Strict Regulations"
                                description="How many years of experience do you have in industries with strict regulations?" />
                        </x-forms.score>
                    </x-panels.dimensions>

                    <!-- DIMENSION 3: Operational Profile -->

                    <x-panels.dimensions title="D3 | Current Operational Profile of Concentrix in the Country"
                        step="3"
                        description="
                        This dimension evaluates Concentrix's operational footprint and maturity level in the country.
                        It analyzes capacity, the sophistication of existing service channels, compliance with security
                        standards, and cost competitiveness to determine the site's strategic role within the regional
                        network, etc.">
                        <x-forms.score title="1. Channel Readiness Matrix" minLabel="1 = No Capability"
                            maxLabel="5 = Specialist"
                            description="Evaluate the current capability, infrastructure, and experience of game changers to operate in each of the following channels."
                            scores="Evaluation Criteria: 1 - No Capability: Site without operation, technical infrastructure, or profiles for this channel. 2 - Emerging: Pilot tests or basic tasks; requires constant supervision and training. 3 - Operational: Stable operation with basic QA processes; mastery of tools and SLAs. 4 - Advanced: Optimized management with last-mile tools and multi-industry experience. 5 - Specialist: Center of excellence; handles high complexity and trains other network nodes."
                            idPrefix="create_hidden_" :metrics="[
                                '1A. Voice' => 'd3_channel_voice',
                                '1B. Chat & Real-Time Messaging' => 'd3_channel_chat',
                                '1C. Email' => 'd3_channel_email',
                                '1D. Back Office (Case Management)' => 'd3_channel_back_office',
                                '1E. Self-Service & AI Support' => 'd3_channel_self_service',
                                '1F. Video Chat' => 'd3_channel_video_chat',
                            ]" />
                        <x-forms.score title="2. Supported Languages" minLabel="0 = Not Supported"
                            maxLabel="5 = Native / Technical-Professional"
                            description="Indicate the scale of languages currently supported from this Location & the Capacity to Hire."
                            scores="Evaluation Criteria: 0 - Not Supported. 1 - Basic (A2). 2 - Intermediate (B1). 3 - Operational Fluency (B2). 4 - Advanced (C1). 5 - Native or technical-professional (C2)."
                            idPrefix="create_hidden_" :metrics="[
                                '2A. Spanish' => 'd3_lang_spanish',
                                '2B. English B1' => 'd3_lang_english_b1',
                                '2C. English B2' => 'd3_lang_english_b2',
                                '2D. English C1' => 'd3_lang_english_c1',
                                '2E. Portuguese B1' => 'd3_lang_portuguese_b1',
                                '2F. Portuguese B2' => 'd3_lang_portuguese_b2',
                                '2G. Portuguese C1' => 'd3_lang_portuguese_c1',
                            ]">
                            <x-forms.input name="d3_lang_others" title="2H. Others :"
                                description="Specify another language supported." />
                        </x-forms.score>

                        <x-forms.score title="3. Technical Support Maturity (Tech Tiering) / CX" minLabel="0 = None"
                            maxLabel="5 = Strategic (KPO)"
                            description="To what level of technical depth does the operation reach on a massive scale?"
                            scores="Evaluation Criteria: 0 - None: Has no experience. 1 - Minimum: The site has minimal experience (nothing outside of rigid scripts). 2 - Guided: The site has the capability to follow simple logical flows (Decision Trees); low decision autonomy. 3 - Resolutive: Talent can investigate cases, cross-reference information from different sources, and decide under established policies. 4 - Professionalized: Capability to execute processes that require expert judgment (e.g., credit analysis or initial technical diagnosis). 5 - Strategic (KPO): Consulting capability; talent generates new solutions, drafts processes, and manages complete ambiguity without defined procedures."
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
                                description="Specify the number of years of experience." />
                        </x-forms.score>

                        <x-forms.score title="4. Retention and Stability (Attrition)"
                            description="What is the historical behavior of personnel turnover in this specific node?"
                            scores="If not handled, leave it blank. Enter the annualized attrition percentage for each area (with one decimal place)."
                            idPrefix="create_hidden_">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 pt-2">
                                <x-forms.input name="d3_attrition_cx" type="number" step="0.1"
                                    title="4A. Customer Experience (CS)"
                                    description="Specify the annualized attrition percentage." />

                                <x-forms.input name="d3_attrition_technical" type="number" step="0.1"
                                    title="4B. Technical"
                                    description="Specify the annualized attrition percentage." />

                                <x-forms.input name="d3_attrition_back_office" type="number" step="0.1"
                                    title="4C. Back Office"
                                    description="Specify the annualized attrition percentage." />

                                <x-forms.input name="d3_attrition_sales" type="number" step="0.1"
                                    title="4D. Sales" description="Specify the annualized attrition percentage." />

                                <x-forms.input name="d3_attrition_collections" type="number" step="0.1"
                                    title="4E. Collections"
                                    description="Specify the annualized attrition percentage." />

                                <x-forms.input name="d3_attrition_consulting" type="number" step="0.1"
                                    title="4F. Consulting"
                                    description="Specify the annualized attrition percentage." />
                            </div>
                        </x-forms.score>
                        <x-forms.score title="5. Supported Markets"
                            description="Indicate the markets currently served from this Country."
                            idPrefix="create_hidden_" :model="null">

                            <div class="space-y-3 pt-2">
                                @foreach ([
        '5A. North America' => 'd3_market_north_america',
        '5B. EMEA' => 'd3_market_emea',
        '5C. Latin America' => 'd3_market_latam',
        '5D. APAC' => 'd3_market_apac',
        '5E. Local Market' => 'd3_market_local',
    ] as $label => $metric)
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
                                                    {{ old($metric, isset($model) ? $model->$metric : false) ? 'checked' : '' }} />
                                            </label>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <x-forms.input name="d3_tech_years" type="number" title="5F. Years of Experience:"
                                description="Specify the number of years of experience in the country." />
                        </x-forms.score>
                        <x-forms.score title="6. Industry Experience Matrix"
                            description="Evaluate if the Country currently possesses operational experience and process knowledge in each of the following verticals."
                            idPrefix="create_hidden_">

                            <div class="space-y-3 pt-2">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 pt-2">
                                    @foreach ([
        '6A. Automotive' => 'd3_vertical_automotive',
        '6B. BFSI (Banking, Financial Services & Insurance)' => 'd3_vertical_bfsi',
        '6C. Energy & Utilities' => 'd3_vertical_energy',
        '6D. Government & Public Sector' => 'd3_vertical_government',
        '6E. Healthcare' => 'd3_vertical_healthcare',
        '6F. Media & Communications' => 'd3_vertical_media',
        '6G. Retail & Ecommerce' => 'd3_vertical_retail',
        '6H. Tech & Consumer Electronics' => 'd3_vertical_tech',
        '6I. Travel, Transp. & Tourism' => 'd3_vertical_travel',
    ] as $label => $metric)
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
                                                        {{ old($metric, isset($model) ? $model->$metric : false) ? 'checked' : '' }} />
                                                </label>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                        </x-forms.score>
                        <x-forms.score title="7. Industries: Years of Experience"
                            description="Specify the amount of years of operational experience in the previously mentioned industries."
                            scores="Provide the operational timeline length in years for each vertical market segment."
                            idPrefix="create_hidden_">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 pt-2">
                                <x-forms.input name="d3_exp_years_automotive" type="number" min="0"
                                    step="1" title="7A. Automotive"
                                    description="Enter the total years of operational experience."
                                    value="{{ old('d3_exp_years_automotive', isset($model) ? $model->d3_exp_years_automotive : '') }}" />

                                <x-forms.input name="d3_exp_years_bfsi" type="number" min="0" step="1"
                                    title="7B. BFSI (Banking, Financial Services & Insurance)"
                                    description="Enter the total years of operational experience."
                                    value="{{ old('d3_exp_years_bfsi', isset($model) ? $model->d3_exp_years_bfsi : '') }}" />

                                <x-forms.input name="d3_exp_years_energy" type="number" min="0"
                                    step="1" title="7C. Energy & Utilities"
                                    description="Enter the total years of operational experience."
                                    value="{{ old('d3_exp_years_energy', isset($model) ? $model->d3_exp_years_energy : '') }}" />

                                <x-forms.input name="d3_exp_years_government" type="number" min="0"
                                    step="1" title="7D. Government & Public Sector"
                                    description="Enter the total years of operational experience."
                                    value="{{ old('d3_exp_years_government', isset($model) ? $model->d3_exp_years_government : '') }}" />

                                <x-forms.input name="d3_exp_years_healthcare" type="number" min="0"
                                    step="1" title="7E. Healthcare"
                                    description="Enter the total years of operational experience."
                                    value="{{ old('d3_exp_years_healthcare', isset($model) ? $model->d3_exp_years_healthcare : '') }}" />

                                <x-forms.input name="d3_exp_years_media" type="number" min="0"
                                    step="1" title="7F. Media & Communications"
                                    description="Enter the total years of operational experience."
                                    value="{{ old('d3_exp_years_media', isset($model) ? $model->d3_exp_years_media : '') }}" />

                                <x-forms.input name="d3_exp_years_retail" type="number" min="0"
                                    step="1" title="7G. Retail & Ecommerce"
                                    description="Enter the total years of operational experience."
                                    value="{{ old('d3_exp_years_retail', isset($model) ? $model->d3_exp_years_retail : '') }}" />

                                <x-forms.input name="d3_exp_years_tech" type="number" min="0" step="1"
                                    title="7H. Tech & Consumer Electronics"
                                    description="Enter the total years of operational experience."
                                    value="{{ old('d3_exp_years_tech', isset($model) ? $model->d3_exp_years_tech : '') }}" />

                                <x-forms.input name="d3_exp_years_travel" type="number" min="0"
                                    step="1" title="7I. Travel, Transp. & Tourism"
                                    description="Enter the total years of operational experience."
                                    value="{{ old('d3_exp_years_travel', isset($model) ? $model->d3_exp_years_travel : '') }}" />
                            </div>
                        </x-forms.score>

                        <x-forms.score title="8. Infrastructure (Seat Capacity)"
                            description="Provide details regarding the physical operational capacity, seat metrics, and distribution centers for this location."
                            idPrefix="create_hidden_">

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 pt-2">
                                <x-forms.input name="d3_total_installed_capacity" type="text"
                                    title="8A. Current Installed Capacity"
                                    description="What is the current installed capacity of the country? Provide the total number of seats."
                                    value="{{ old('d3_total_installed_capacity', isset($model) ? $model->d3_total_installed_capacity : '') }}" />

                                <x-forms.input name="d3_growth_availability" type="text"
                                    title="8B. Growth Availability"
                                    description="What is the current availability of seats allocated for expansion or scale?"
                                    value="{{ old('d3_growth_availability', isset($model) ? $model->d3_growth_availability : '') }}" />

                                <x-forms.input name="d3_sites_count" type="text" title="8C. Covered Sites Count"
                                    description="How many sites or facility nodes are factored into the total installed capacity calculation?"
                                    value="{{ old('d3_sites_count', isset($model) ? $model->d3_sites_count : '') }}" />

                                <x-forms.input name="d3_site_locations" type="text"
                                    title="8D. Site Locations & Names"
                                    description="Specify the exact geographical location and corporate name of these active operational sites."
                                    value="{{ old('d3_site_locations', isset($model) ? $model->d3_site_locations : '') }}" />
                            </div>

                        </x-forms.score>

                    </x-panels.dimensions>

                    <!-- DIMENSION 4: Country Profile -->
                    <x-panels.dimensions title="D4 | Country Level Risk Profile" step="4"
                        description="This dimension assesses the level of exposure and resilience of the national environment to external and internal factors.">
                        <x-forms.score title="1. Global Readiness" minLabel="1 = Very Low" maxLabel="5 = Total"
                            description="Evaluate how aligned the local talent is with the business etiquette and culture of the following global markets."
                            scores="Evaluation Criteria: 1 - Very Low: Frequent culture clash; requires intensive training in 'business etiquette'. 2 - Low: They know the market but the communication style is very local/informal. 3 - Medium: Familiar with the culture (consume their media); need adjustments in 'soft skills'. 4 - High: Highly aligned; understand idioms, punctuality expectations, and service. 5 - Total: 'Cultural Twins'. The client does not notice a difference in work style vs. their local country."
                            idPrefix="create_hidden_" :metrics="[
                                '1A. North America (USA/CAN)' => 'd1_global_ready_na',
                                '1B. Europe (UK/EU)' => 'd1_global_ready_eu',
                                '1C. Spain' => 'd1_global_ready_spain',
                                '1D. LATAM (Cross-border)' => 'd1_global_ready_latam',
                                '1E. Asia / Pacific' => 'd1_global_ready_apac',
                            ]" />

                        <x-forms.score title="2. International Perception"
                            description="How is the country perceived by foreign investors in terms of reputation, country brand, and ease of doing business?"
                            scores="Evaluation Criteria: 1 - Unfavorable: High risk or questionable ethics; difficult to justify before global committees. 2 - Emerging: Weak country brand in services; requires significant investor education. 3 - Reliable: Standard outsourcing destination; on the radar but not a priority. 4 - Attractive: Preferred destination with high reputation for talent and ease of doing business. 5 - Top Tier: Investment magnet and regional benchmark for transparency, infrastructure, and prestige."
                            idPrefix="create_hidden_" :metrics="[
                                '2A. International Perception' => 'd4_international_perception',
                            ]" />

                        <x-forms.score title="3. Compliance and Data Protection"
                            description="How aligned are local laws and site standards with international security regulations (GDPR, HIPAA, PCI)?"
                            scores="Evaluation Criteria: 1 - Incipient: Absence of data protection laws and basic cybersecurity controls. 2 - Basic: Local legislation with low enforcement; internal protocols without external certifications. 3 - Aligned: International standards applied; preparation for audits and responsible handling. 4 - Certified: Operation under auditable standards (ISO, SOC2) with a robust compliance culture. 5 - World-Class: Full compliance (GDPR, HIPAA, PCI) and a global benchmark in information security."
                            idPrefix="create_hidden_" :metrics="[
                                '3A. Compliance & Data Protection' => 'd4_compliance_data_protection',
                            ]" />
                    </x-panels.dimensions>

                    <!-- DIMENSION 5: Cost Competitiveness -->
                    <x-panels.dimensions title="D5 | Price Sensitivity & Operating Cost" step="5"
                        description="This dimension assesses the financial competitiveness and cost efficiency of the location. It analyzes the operating cost structure (OpEx), the burden of local wages, and the level of exposure to exchange rate risks to determine whether the country functions as a value-added center or a center of mass savings.">
                        <x-forms.score title="1. Total Labor Cost Index"
                            description="How would you evaluate the cost of operating a site for the client in this country?"
                            scores="Evaluation Criteria: 1 - Premium: High cost; focused on high value and transformation, not on savings. 2 - Above Average: Moderately high costs; with exceptional talent. 3 - Standard LATAM: Competitive costs; ideal balance between budget and quality. 4 - Competitive: Significant savings; Opex optimization compared to other hubs. 5 - Maximum Efficiency: Minimum labor costs; strategic node for massive savings."
                            idPrefix="create_hidden_" :metrics="[
                                '1A. Total Labor Cost Index' => 'd4_labor_cost_index',
                            ]" />

                        <x-forms.score title="2. Currency Stability and Inflationary Risk"
                            description="How protected is the client's rate against devaluations or uncontrolled inflation in the country?"
                            scores="Evaluation Criteria: 1 - Critical Risk: High volatility or hyperinflation. 2 - Moderate Volatility: Constant fluctuation; requires complex clauses to protect margins. 3 - Stable: Inflation under control and predictable currency variations. 4 - Solid: Strong monetary stability allowing for precise 3-5 year projections. 5 - Armored: Almost non-existent exchange rate risk; total certainty regarding the value of the investment."
                            idPrefix="create_hidden_" :metrics="[
                                '2B. Currency & Inflation Risk' => 'd4_currency_inflation_risk',
                            ]" />

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
                        class="btn bg-[#003D5B] hover:bg-[#003D5B]/90 text-white btn-sm rounded-lg font-semibold px-6 shadow-sm animate-fadeIn"
                        x-show="currentStep === maxSteps">
                        Save Profile Parameters
                    </button>

                </div>

            </div>
        </x-cards.create-node>
    </form>
</x-layouts.admin>
