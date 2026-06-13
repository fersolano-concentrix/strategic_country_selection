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

    <form method="POST" action="{{ route('countries.store') }}" class="w-full mx-auto space-y-6">
        @csrf

        <x-cards.create-node title="1. Profile Core Identity Metadata"
            description="Establish a base regional configuration profile within the strategic matrix.">

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
                            class="select select-bordered pl-11 pr-4 w-full h-12 bg-base-200/50 focus:bg-base-100 border-base-300 focus:border-accent focus:ring-2 focus:ring-accent/20 rounded-xl transition-all font-semibold text-sm text-neutral-700 focus:outline-none {{ $errors->has('country') ? 'border-red-500' : '' }}"
                            onchange="document.getElementById('country_name_hidden').value = this.options[this.selectedIndex].dataset.name;">
                            <option disabled selected hidden value="">Select a country...</option>
                            <option value="ar" data-name="Argentina" @selected(old('country') == 'ar')>Argentina (AR)
                            </option>
                            <option value="bo" data-name="Bolivia" @selected(old('country') == 'bo')>Bolivia (BO)
                            </option>
                            <option value="br" data-name="Brazil" @selected(old('country') == 'br')>Brazil (BR)</option>
                            <option value="cl" data-name="Chile" @selected(old('country') == 'cl')>Chile (CL)</option>
                            <option value="co" data-name="Colombia" @selected(old('country') == 'co')>Colombia (CO)
                            </option>
                            <option value="cr" data-name="Costa Rica" @selected(old('country') == 'cr')>Costa Rica (CR)
                            </option>
                            <option value="cu" data-name="Cuba" @selected(old('country') == 'cu')>Cuba (CU)</option>
                            <option value="do" data-name="Dominican Republic" @selected(old('country') == 'do')>Dominican
                                Republic (DO)</option>
                            <option value="ec" data-name="Ecuador" @selected(old('country') == 'ec')>Ecuador (EC)
                            </option>
                            <option value="sv" data-name="El Salvador" @selected(old('country') == 'sv')>El Salvador (SV)
                            </option>
                            <option value="gt" data-name="Guatemala" @selected(old('country') == 'gt')>Guatemala (GT)
                            </option>
                            <option value="hn" data-name="Honduras" @selected(old('country') == 'hn')>Honduras (HN)
                            </option>
                            <option value="mx" data-name="Mexico" @selected(old('country') == 'mx')>Mexico (MX)</option>
                            <option value="ni" data-name="Nicaragua" @selected(old('country') == 'ni')>Nicaragua (NI)
                            </option>
                            <option value="pa" data-name="Panama" @selected(old('country') == 'pa')>Panama (PA)</option>
                            <option value="py" data-name="Paraguay" @selected(old('country') == 'py')>Paraguay (PY)
                            </option>
                            <option value="pe" data-name="Peru" @selected(old('country') == 'pe')>Peru (PE)</option>
                            <option value="pr" data-name="Puerto Rico" @selected(old('country') == 'pr')>Puerto Rico
                                (PR)</option>
                            <option value="uy" data-name="Uruguay" @selected(old('country') == 'uy')>Uruguay (UY)
                            </option>
                            <option value="ve" data-name="Venezuela" @selected(old('country') == 've')>Venezuela (VE)
                            </option>
                        </select>

                        {{-- Only country_name needs a hidden input --}}
                        <input type="hidden" id="country_name_hidden" name="country_name"
                            value="{{ old('country_name') }}">
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
                            value="{{ old('site_region') }}" placeholder="e.g., San José Hub"
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
                            value="{{ old('leader_name') }}" placeholder="e.g., John Doe"
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

                        <x-panels.sections title="1. Educational Level (Pipeline)"
                            description="Evaluate the educational penetration and availability of profiles according to their level of completed academic training in the local talent pool.">
                            <x-panels.rubrics>
                                <x-panels.rubrics-segment number=1 name="Scarce / Limited Access"
                                    description="Very few people reach this level. Recruiting profiles with this degree is a headhunting challenge." />
                                <x-panels.rubrics-segment number=2 name="Emerging / Minority"
                                    description="There is a supply, but it is limited. Talent with this level is usually quickly absorbed by other local industries." />
                                <x-panels.rubrics-segment number=3 name="Stable Meaning"
                                    description="There is a constant flow of graduates. It is the market standard; you can fill vacancies in normal times (30 days)." />
                                <x-panels.rubrics-segment number=4 name="Abundant / High Availability"
                                    description="Most young people in the talent pool have this level. The market produces more graduates than the local industry can absorb." />
                                <x-panels.rubrics-segment number=5 name="Dominant / Surplus (Blue Ocean)"
                                    description="This is the minimum 'floor' of the market. There is a massive oversupply of profiles with this level (e.g., cities with 20+ universities)." />
                            </x-panels.rubrics>

                            <x-forms.radio-score minLabel="Scarce" maxLabel="Dominant"
                                metricLabel="1A. High School / Secondary Education" metricName="d1_high_school" />

                            <x-forms.radio-score minLabel="Scarce" maxLabel="Dominant"
                                metricLabel="1B. Technical / Vocational Degree" metricName="d1_technical" />

                            <x-forms.radio-score minLabel="Scarce" maxLabel="Dominant"
                                metricLabel="1C. University Degree (Bachelors)" metricName="d1_bachelors" />

                            <x-forms.radio-score minLabel="Scarce" maxLabel="Dominant"
                                metricLabel="1D. Postgraduate / Specialization" metricName="d1_postgraduate" />

                        </x-panels.sections>

                        <x-panels.sections title="2. Talent Specialization"
                            description="Evaluate the abundance, graduation rates, and ease of recruitment of profiles within your city/country.">

                            <x-panels.rubrics>
                                <x-panels.rubrics-segment number=1 name="Scarce"
                                    description="There are no strong local universities; recruiting 10 people takes months." />
                                <x-panels.rubrics-segment number=2 name="Emerging"
                                    description="There are small institutes; junior talent is available but limited." />
                                <x-panels.rubrics-segment number=3 name="Stable"
                                    description="Steady educational supply; competitive market but with a constant flow of talent." />
                                <x-panels.rubrics-segment number=4 name="Strong"
                                    description="It is a pillar of the city; massive annual graduation and experienced talent pool." />
                                <x-panels.rubrics-segment number=5 name="Regional Powerhouse"
                                    description="Recognized hub; the country is famous for exporting this type of talent." />
                            </x-panels.rubrics>

                            <x-forms.radio-score minLabel="Scarce" maxLabel="Powerhouse"
                                metricLabel="2A. CX & Hospitality: Graduates in tourism, arts, or social areas. Strong focus on customer service and empathy."
                                metricName="d1_cx_hospitality" />

                            <x-forms.radio-score minLabel="Scarce" maxLabel="Powerhouse"
                                metricLabel="2B. STEM & Digital: Engineers, developers, data analysts. Technical profiles and complex support capabilities."
                                metricName="d1_stem_digital" />

                            <x-forms.radio-score minLabel="Scarce" maxLabel="Powerhouse"
                                metricLabel="2C. Professional Services: Accountants, lawyers, financial profiles, human resources. Ideal for back-office processes (F&A, HRO)."
                                metricName="d1_professional_services" />

                            <x-forms.radio-score minLabel="Scarce" maxLabel="Powerhouse"
                                metricLabel="2D. Healthcare & Sciences: Nurses, doctors, biotech specialists. Ideal for clinical or pharmaceutical support."
                                metricName="d1_healthcare_sciences" />

                            <x-forms.radio-score minLabel="Scarce" maxLabel="Powerhouse"
                                metricLabel="2E. Business & Sales: Administrators, marketers. Profiles with high negotiation and closing capabilities."
                                metricName="d1_business_sales" />

                        </x-panels.sections>

                        <x-panels.sections title="3. Bilingualism Depth"
                            description="Indicate the capacity of the talent pool in this country for the following languages.">

                            <x-panels.rubrics>
                                <x-panels.rubrics-segment number=0 name="Not Supported"
                                    description="Highly difficult to recruit in this location." />
                                <x-panels.rubrics-segment number=1 name="Niche / Restricted"
                                    description="Very limited availability and only found in very specific sectors." />
                                <x-panels.rubrics-segment number=2 name="Challenging"
                                    description="Talent is limited and fiercely contested among companies." />
                                <x-panels.rubrics-segment number=3 name="Standard"
                                    description="Sufficient talent exists, but requires active efforts from Concentrix to attract it." />
                                <x-panels.rubrics-segment number=4 name="Easy"
                                    description="Mature market with a steady flow of qualified bilingual candidates. Manageable competition." />
                                <x-panels.rubrics-segment number=5 name="Highly Easy"
                                    description="Massive and surplus talent pool." />
                            </x-panels.rubrics>

                            <x-forms.radio-score start="0" minLabel="Not Supported" maxLabel="Highly Easy"
                                metricLabel="3A. Spanish" metricName="d1_lang_spanish" />

                            <x-forms.radio-score start="0" minLabel="Not Supported" maxLabel="Highly Easy"
                                metricLabel="3B. English" metricName="d1_lang_english" />

                            <x-forms.radio-score start="0" minLabel="Not Supported" maxLabel="Highly Easy"
                                metricLabel="3C. Portuguese" metricName="d1_lang_portuguese" />

                            <x-forms.radio-score start="0" minLabel="Not Supported" maxLabel="Highly Easy"
                                metricLabel="3D. French" metricName="d1_lang_french" />

                            <x-forms.radio-score start="0" minLabel="Not Supported" maxLabel="Highly Easy"
                                metricLabel="3E. Italian" metricName="d1_lang_italian" />

                            <x-forms.radio-score input="true" minLabel="Restricted" maxLabel="Highly Easy"
                                metricLabel="3F. Other Language"
                                description="Add a other language here if applicable." inputName="d1_lang_others_name"
                                metricName="d1_lang_others_specify" />

                        </x-panels.sections>

                        <x-panels.sections title="4. Global Readiness"
                            description="How aligned is the local talent with the business etiquette and culture of the following global markets?">

                            <x-panels.rubrics>
                                <x-panels.rubrics-segment number=1 name="Very Low"
                                    description="Frequent cultural clash; requires intensive training in 'business etiquette'." />
                                <x-panels.rubrics-segment number=2 name="Low"
                                    description="They know the market but the communication style is very local/informal." />
                                <x-panels.rubrics-segment number=3 name="Medium"
                                    description="Familiar with the culture (consume their media); need adjustments in 'soft skills'." />
                                <x-panels.rubrics-segment number=4 name="High"
                                    description="Highly aligned; they understand idioms, punctuality expectations, and service standards." />
                                <x-panels.rubrics-segment number=5 name="Total"
                                    description="'Cultural Twins'. The client notices no difference in working style vs. their local country." />
                            </x-panels.rubrics>

                            <x-forms.radio-score minLabel="Very Low" maxLabel="Total"
                                metricLabel="4A. North America (USA/CAN)" metricName="d1_global_ready_na" />

                            <x-forms.radio-score minLabel="Very Low" maxLabel="Total"
                                metricLabel="4B. Europe (UK/EU)" metricName="d1_global_ready_eu" />

                            <x-forms.radio-score minLabel="Very Low" maxLabel="Total" metricLabel="4C. Spain"
                                metricName="d1_global_ready_spain" />

                            <x-forms.radio-score minLabel="Very Low" maxLabel="Total"
                                metricLabel="4D. LATAM (Cross-border)" metricName="d1_global_ready_latam" />

                            <x-forms.radio-score minLabel="Very Low" maxLabel="Total"
                                metricLabel="4E. Asia / Pacific" metricName="d1_global_ready_apac" />

                        </x-panels.sections>

                    </x-panels.dimensions>

                    <x-panels.dimensions title="D2 | Country's Business Ecosystem." step="2"
                        description="This dimension assesses the sophistication and maturity of the local business environment. It analyzes the density of multinational corporations, the trajectory of the BPO and technology sectors, and market experience in industries with strict compliance regulations.">

                        <x-panels.sections title="1. Presence of Multinational Companies"
                            description="How dense is the presence of global companies (Fortune 500) with operational hubs in the city/country?">
                            <x-panels.rubrics>
                                <x-panels.rubrics-segment number=1 name="Local"
                                    description="Market dominated by national companies; minimal presence of global brands." />
                                <x-panels.rubrics-segment number=2 name="Developing"
                                    description="Some global brands have sales offices, but few large-scale operations." />
                                <x-panels.rubrics-segment number=3 name="Established"
                                    description="Clear presence of multinational companies with functional operational centers." />
                                <x-panels.rubrics-segment number=4 name="Benchmark"
                                    description="Preferred regional hub for foreign companies to establish headquarters." />
                                <x-panels.rubrics-segment number=5 name="Global Hub"
                                    description="Massive density of multinational companies; standardized global corporate culture throughout the city." />
                            </x-panels.rubrics>
                            <x-forms.radio-score minLabel="Local" maxLabel="Global Hub"
                                metricLabel="1A. Multinational Corporation Presence" metricName="d2_mnc_presence" />

                            <x-forms.input metricName="d2_mnc_years" type="number"
                                title="1B. Years of Experience with Multinationals"
                                description="How many years of experience does the country have with multinational companies?" />
                        </x-panels.sections>

                        <x-panels.sections title="2. Maturity of the BPO Sector"
                            description="What is the level of professionalization and track record of the local outsourcing industry?">
                            <x-panels.rubrics>
                                <x-panels.rubrics-segment number=1 name="Emerging"
                                    description="New industry; limited knowledge of service metrics or delivery standards." />
                                <x-panels.rubrics-segment number=2 name="Junior"
                                    description="Contact centers exist, but with high turnover and little specialization in complex processes." />
                                <x-panels.rubrics-segment number=3 name="Professional"
                                    description="Market with experience in KPIs, SLAs, and workforce management (WFM)." />
                                <x-panels.rubrics-segment number=4 name="Expert"
                                    description="Mastery of international certifications and continuous improvement processes (Lean/Six Sigma)." />
                                <x-panels.rubrics-segment number=5 name="World-Class"
                                    description="The local ecosystem exports BPO management talent and leads in service process innovation." />
                            </x-panels.rubrics>
                            <x-forms.radio-score minLabel="Emerging" maxLabel="World-Class"
                                metricLabel="2A. Outsourcing Level of Local Industry" metricName="d2_bpo_maturity" />

                            <x-forms.input metricName="d2_bpo_years" type="number"
                                title="2B. Years of Experience with BPOs"
                                description="How many years of experience does the country have with BPOs?" />
                        </x-panels.sections>

                        <x-panels.sections title="3. Tech Industry Maturity"
                            description="How developed is the technology ecosystem (Software, IT, Digital) in the region?">

                            <x-panels.rubrics>
                                <x-panels.rubrics-segment number=1 name="Traditional"
                                    description="The technology sector is limited to basic support and hardware maintenance." />
                                <x-panels.rubrics-segment number=2 name="Adapter"
                                    description="Software development hubs and local startups are beginning to emerge." />
                                <x-panels.rubrics-segment number=3 name="Dynamic"
                                    description="Strong presence of software development companies and IT service exportation." />
                                <x-panels.rubrics-segment number=4 name="Advanced"
                                    description="Mature ecosystem with high investment in Cloud, Cybersecurity, and Agile Development." />
                                <x-panels.rubrics-segment number=5 name="Tech Giant"
                                    description="Cutting-edge infrastructure; breeding ground for tech 'Unicorns' and global R&D centers." />
                            </x-panels.rubrics>

                            <x-forms.radio-score minLabel="Traditional" maxLabel="Tech Giant"
                                metricLabel="3A. Technology Ecosystem Develpment" metricName="d2_tech_development" />

                            <x-forms.input metricName="d2_tech_years" type="number"
                                title="3B. Years of Experience of the Tech Industry"
                                description="How many years of experience does the Tech Industry in the country?" />

                        </x-panels.sections>

                        <x-panels.sections title="4. Regulated Industry Maturity"
                            description="How robust is the presence of advanced manufacturing or specialized services that generate a pipeline of expert talent in international regulations (FDA, ISO 13485, HIPAA, etc.)?">

                            <x-panels.rubrics>
                                <x-panels.rubrics-segment number=1 name="None / Basic"
                                    description="There are no clusters of regulated industries; talent is unfamiliar with audit or compliance processes." />
                                <x-panels.rubrics-segment number=2 name="Indirect"
                                    description="Presence of mass consumer goods companies with basic quality standards, but without critical certifications." />
                                <x-panels.rubrics-segment number=3 name="Stable"
                                    description="Medical device plants or pharmaceutical service centers exist; talent understands the concept of 'compliance'." />
                                <x-panels.rubrics-segment number=4 name="Specialized"
                                    description="The city features a medical device / life sciences cluster. It is easy to find profiles skilled in process documentation." />
                                <x-panels.rubrics-segment number=5 name="World-Class Hub"
                                    description="The country is a regional leader. There is an educational and professional ecosystem exclusively dedicated to these areas." />
                            </x-panels.rubrics>

                            <x-forms.radio-score minLabel="None / Basic" maxLabel="World-Class Hub"
                                metricLabel="4A. Regulated Industry Maturity: Evaluation of advanced manufacturing (MedTech / Life Sciences) and international regulation expertise pipeline."
                                metricName="d2_regulated_industry_maturity" />

                            <x-forms.input metricName="d2_regulated_years" type="number"
                                title="4B. Years of Experience with Regulated Industries"
                                description="How many years of experience does the country have with Regulated Industries?" />

                        </x-panels.sections>

                    </x-panels.dimensions>

                    <x-panels.dimensions title="D3 | Current Operational Profile of Concentrix in the Country"
                        step="3"
                        description="This dimension assesses Concentrix's operational footprint and maturity level in the country. It analyzes capacity, the sophistication of existing service channels, compliance with security standards, and cost competitiveness to determine the site's strategic role within the regional network, etc.">

                        <x-panels.sections title="1. Channel Readiness Matrix"
                            description="Evaluate the current capability, infrastructure, and experience of game changers to operate in each of the following channels.">

                            <x-panels.rubrics>
                                <x-panels.rubrics-segment number=1 name="No Capability"
                                    description="Site without operation, technical infrastructure, or profiles for this channel." />
                                <x-panels.rubrics-segment number=2 name="Emerging"
                                    description="Pilot tests or basic tasks; requires constant supervision and training." />
                                <x-panels.rubrics-segment number=3 name="Operational"
                                    description="Stable operation with basic QA processes; mastery of tools and SLAs." />
                                <x-panels.rubrics-segment number=4 name="Advanced"
                                    description="Optimized management with last-mile tools and multi-industry experience." />
                                <x-panels.rubrics-segment number=5 name="Specialist"
                                    description="Center of excellence; handles high complexity and trains other network nodes." />
                            </x-panels.rubrics>

                            <x-forms.radio-score minLabel="No Capability" maxLabel="Specialist"
                                metricLabel="1A. Voice" metricName="d3_channel_voice" />

                            <x-forms.radio-score minLabel="No Capability" maxLabel="Specialist"
                                metricLabel="1B. Chat & Real-Time Messaging" metricName="d3_channel_chat" />

                            <x-forms.radio-score minLabel="No Capability" maxLabel="Specialist"
                                metricLabel="1C. Email" metricName="d3_channel_email" />

                            <x-forms.radio-score minLabel="No Capability" maxLabel="Specialist"
                                metricLabel="1D. Back Office (Case Management)" metricName="d3_channel_back_office" />

                            <x-forms.radio-score minLabel="No Capability" maxLabel="Specialist"
                                metricLabel="1E. Self-Service & AI Support" metricName="d3_channel_self_service" />

                            <x-forms.radio-score minLabel="No Capability" maxLabel="Specialist"
                                metricLabel="1F. Video Chat" metricName="d3_channel_video_chat" />

                        </x-panels.sections>

                        <x-forms.score title="2. Supported Languages" minLabel="0 = Not Supported"
                            maxLabel="5 = Native / Technical-Professional"
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
                            <x-forms.input metricName="d3_lang_others" title="2H. Others:"
                                description="Specify another language supported." />
                        </x-forms.score>

                        <x-panels.sections title="3. Service Complexity Level"
                            description="Indicate which type of services current Concentrix operations support from this location and their level of complexity.">

                            <x-panels.rubrics>
                                <x-panels.rubrics-segment number=0 name="No Experience"
                                    description="No operational footprints or capabilities exist for this service stream." />
                                <x-panels.rubrics-segment number=1 name="Basic CS (Non-Live)"
                                    description="Basic Customer Service focusing exclusively on non-live interactions (Asynchronous/Ticketing)." />
                                <x-panels.rubrics-segment number=2 name="Basic CS (Live)"
                                    description="Basic Customer Service operating via live concurrent channels (Voice/Real-time chat)." />
                                <x-panels.rubrics-segment number=3 name="Intermediate"
                                    description="Intermediate technical or back-office handling focusing on Tier 1 and Tier 2 resolution services." />
                                <x-panels.rubrics-segment number=4 name="Advanced"
                                    description="Advanced operations supporting multiple support tiers, structural escalations, and complex cross-selling/sales workflows." />
                                <x-panels.rubrics-segment number=5 name="COE Focused"
                                    description="Center of Excellence (COE) environment with specialized capabilities in corporate sales, consulting, process optimization, and strategic innovation." />
                            </x-panels.rubrics>

                            <div class="pt-4 pb-2 border-b border-base-200">
                                <span class="text-xs font-bold tracking-wider text-primary uppercase">3A. Digital
                                    Operations</span>
                            </div>
                            <div class="pl-2 divide-y divide-base-100">
                                <x-forms.radio-score start=0 minLabel="None" maxLabel="COE"
                                    metricLabel="Digital Operations: Sales" metricName="d3_srv_dig_sales" />
                                <x-forms.radio-score start=0 minLabel="None" maxLabel="COE"
                                    metricLabel="Digital Operations: Marketing" metricName="d3_srv_dig_marketing" />
                                <x-forms.radio-score start=0 minLabel="None" maxLabel="COE"
                                    metricLabel="Digital Operations: Customer Service" metricName="d3_srv_dig_cs" />
                                <x-forms.radio-score start=0 minLabel="None" maxLabel="COE"
                                    metricLabel="Digital Operations: Trust & Safety"
                                    metricName="d3_srv_dig_trust_safety" />
                                <x-forms.radio-score start=0 minLabel="None" maxLabel="COE"
                                    metricLabel="Digital Operations: Finance & Compliance"
                                    metricName="d3_srv_dig_finance_compliance" />
                            </div>

                            <div class="pt-6 pb-2 border-b border-base-200">
                                <span class="text-xs font-bold tracking-wider text-primary uppercase">3B. Enterprise
                                    Tech</span>
                            </div>
                            <div class="pl-2 divide-y divide-base-100">
                                <x-forms.radio-score start=0 minLabel="None" maxLabel="COE"
                                    metricLabel="Enterprise Tech: Technology Transformation"
                                    metricName="d3_srv_tech_transformation" />
                                <x-forms.radio-score start=0 minLabel="None" maxLabel="COE"
                                    metricLabel="Enterprise Tech: Application Services"
                                    metricName="d3_srv_tech_applications" />
                                <x-forms.radio-score start=0 minLabel="None" maxLabel="COE"
                                    metricLabel="Enterprise Tech: Enterprise Automation"
                                    metricName="d3_srv_tech_automation" />
                                <x-forms.radio-score start=0 minLabel="None" maxLabel="COE"
                                    metricLabel="Enterprise Tech: Experience Platforms"
                                    metricName="d3_srv_tech_experience_platforms" />
                                <x-forms.radio-score start=0 minLabel="None" maxLabel="COE"
                                    metricLabel="Enterprise Tech: Testing Services"
                                    metricName="d3_srv_tech_testing" />
                                <x-forms.radio-score start=0 minLabel="None" maxLabel="COE"
                                    metricLabel="Enterprise Tech: CX Technology" metricName="d3_srv_tech_cx_tech" />
                                <x-forms.radio-score start=0 minLabel="None" maxLabel="COE"
                                    metricLabel="Enterprise Tech: Generative AI"
                                    metricName="d3_srv_tech_generative_ai" />
                                <x-forms.radio-score start=0 minLabel="None" maxLabel="COE"
                                    metricLabel="Enterprise Tech: Agentic AI" metricName="d3_srv_tech_agentic_ai" />
                                <x-forms.radio-score start=0 minLabel="None" maxLabel="COE"
                                    metricLabel="Enterprise Tech: Cybersecurity"
                                    metricName="d3_srv_tech_cybersecurity" />
                            </div>

                            <div class="pt-6 pb-2 border-b border-base-200">
                                <span class="text-xs font-bold tracking-wider text-primary uppercase">3C. Data &
                                    Analytics
                                    (D&A)</span>
                            </div>
                            <div class="pl-2 divide-y divide-base-100">
                                <x-forms.radio-score start=0 minLabel="None" maxLabel="COE"
                                    metricLabel="D&A: Data & Analytics Transformation"
                                    metricName="d3_srv_data_transformation" />
                                <x-forms.radio-score start=0 minLabel="None" maxLabel="COE"
                                    metricLabel="D&A: Data Engineering" metricName="d3_srv_data_engineering" />
                                <x-forms.radio-score start=0 minLabel="None" maxLabel="COE"
                                    metricLabel="D&A: Advanced Analytics"
                                    metricName="d3_srv_data_advanced_analytics" />
                                <x-forms.radio-score start=0 minLabel="None" maxLabel="COE"
                                    metricLabel="D&A: Enterprise Intelligence"
                                    metricName="d3_srv_data_enterprise_intelligence" />
                                <x-forms.radio-score start=0 minLabel="None" maxLabel="COE"
                                    metricLabel="D&A: Operational Insights"
                                    metricName="d3_srv_data_operational_insights" />
                                <x-forms.radio-score start=0 minLabel="None" maxLabel="COE"
                                    metricLabel="D&A: Voice of the Customer" metricName="d3_srv_data_voc" />
                                <x-forms.radio-score start=0 minLabel="None" maxLabel="COE"
                                    metricLabel="D&A: Industry & Domain Solutions"
                                    metricName="d3_srv_data_domain_solutions" />
                                <x-forms.radio-score start=0 minLabel="None" maxLabel="COE"
                                    metricLabel="D&A: AI Support & Data Services"
                                    metricName="d3_srv_data_ai_support" />
                            </div>

                            <div class="pt-6 pb-2 border-b border-base-200">
                                <span class="text-xs font-bold tracking-wider text-primary uppercase">Strategy &
                                    Design</span>
                            </div>
                            <div class="pl-2 divide-y divide-base-100">
                                <x-forms.radio-score start=0 minLabel="None" maxLabel="COE"
                                    metricLabel="Strategy & Design: Experience Design"
                                    metricName="d3_srv_strat_experience_design" />
                                <x-forms.radio-score start=0 minLabel="None" maxLabel="COE"
                                    metricLabel="Strategy & Design: Digital Innovation"
                                    metricName="d3_srv_strat_digital_innovation" />
                                <x-forms.radio-score start=0 minLabel="None" maxLabel="COE"
                                    metricLabel="Strategy & Design: Lifecycle Engagement"
                                    metricName="d3_srv_strat_lifecycle_engagement" />
                                <x-forms.radio-score start=0 minLabel="None" maxLabel="COE"
                                    metricLabel="Strategy & Design: Business Transformation"
                                    metricName="d3_srv_strat_business_transformation" />
                            </div>

                        </x-panels.sections>

                        <x-panels.sections title="4. Technical Support & CX Maturity (Tech Tiering)"
                            description="To what level of technical depth does the operation scale massively in the country today?">

                            <x-panels.rubrics>
                                <x-panels.rubrics-segment number=1 name="None / Minimal"
                                    description="The site has no operational experience outside of highly rigid scripts." />
                                <x-panels.rubrics-segment number=2 name="Guided"
                                    description="Capability to follow simple logic flows and decision trees; low decision-making autonomy." />
                                <x-panels.rubrics-segment number=3 name="Resolutive"
                                    description="Talent can investigate cases, cross-reference information from different sources, and resolve issues under established policies." />
                                <x-panels.rubrics-segment number=4 name="Professionalized"
                                    description="Capability to execute processes requiring expert criteria (e.g., specialized credit analysis or initial technical diagnosis)." />
                                <x-panels.rubrics-segment number=5 name="Strategic (KPO)"
                                    description="Consulting capability; talent generates new solutions, documents operational processes, and manages complete ambiguity without defined procedures." />
                            </x-panels.rubrics>

                            <x-forms.radio-score minLabel="Minimal" maxLabel="Strategic"
                                metricLabel="4A. Customer Experience (CS)" metricName="d3_tech_cx" />

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 pt-2">
                                <x-forms.input metricName="d3_tech_cx_years" type="number"
                                    title="Years of Experience:"
                                    description="Specify the number of years of experience." />
                                <x-forms.input metricName="d3_tech_cx_attrition" type="number"
                                    title="Anual Attrition Percentage:"
                                    description="Specify the annualized attrition percentage." />
                            </div>


                            <div class="pt-6 pb-2 border-b border-base-200">
                                <span class="text-xs font-bold tracking-wider text-primary uppercase">4B.
                                    Technical</span>
                            </div>
                            <div class="pl-2 divide-y divide-base-100">
                                <x-forms.radio-score minLabel="Minimal" maxLabel="Strategic"
                                    metricLabel="Tier 1 (Front Line)" metricName="d3_tech_tier1" />

                                <x-forms.radio-score minLabel="Minimal" maxLabel="Strategic"
                                    metricLabel="Tier 2 (Troubleshooting)" metricName="d3_tech_tier2" />

                                <x-forms.radio-score minLabel="Minimal" maxLabel="Strategic"
                                    metricLabel="Tier 3 (Expert / Engineering)" metricName="d3_tech_tier3" />
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 pt-2">
                                    <x-forms.input metricName="d3_tech_tiers_years" type="number"
                                        title="Years of Experience:"
                                        description="Specify the number of years of experience." />
                                    <x-forms.input metricName="d3_tech_tiers_attrition" type="number"
                                        title="Anual Attrition Percentage:"
                                        description="Specify the annualized attrition percentage." />
                                </div>
                            </div>

                            <x-forms.radio-score minLabel="Minimal" maxLabel="Strategic"
                                metricLabel="4E. Back Office" metricName="d3_tech_back_office" />

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 pt-2">
                                <x-forms.input metricName="d3_tech_back_office_years" type="number"
                                    title="Years of Experience:"
                                    description="Specify the number of years of experience." />
                                <x-forms.input metricName="d3_tech_back_office_attrition" type="number"
                                    title="Anual Attrition Percentage:"
                                    description="Specify the annualized attrition percentage." />
                            </div>

                            <x-forms.radio-score minLabel="Minimal" maxLabel="Strategic" metricLabel="3F. Consulting"
                                metricName="d3_tech_consulting" />


                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 pt-2">
                                <x-forms.input metricName="d3_tech_consulting_years" type="number"
                                    title="Years of Experience:"
                                    description="Specify the number of years of experience." />
                                <x-forms.input metricName="d3_tech_consulting_attrition" type="number"
                                    title="Anual Attrition Percentage:"
                                    description="Specify the annualized attrition percentage." />
                            </div>

                        </x-panels.sections>

                        <x-panels.sections title="5. Supported Markets"
                            description="Indicate the markets currently served from this Country.">
                            <x-forms.toggle metricName="d3_market_north_america" title="5A. North America" />
                            <x-forms.toggle metricName="d3_market_emea" title="5B. EMEA" />
                            <x-forms.toggle metricName="d3_market_latam" title="5C. Latin America" />
                            <x-forms.toggle metricName="d3_market_apac" title="5D. APAC" />
                            <x-forms.toggle metricName="d3_market_local" title="5E. Local Market" />
                        </x-panels.sections>

                        <x-panels.sections title="6. Years of Experience in the Country">
                            <x-forms.input metricName="d3_market_years" type="number"
                                title="Please indicate the number of years of experience Concentrix has had in the country"
                                description="" />
                        </x-panels.sections>

                        <x-panels.sections title="7. Industry Experience"
                            description="Evaluate if the Country currently possesses operational experience and process knowledge in each of the following verticals.">
                            <x-forms.toggle :hasDependentContent="true" metricName="d3_vertical_automotive"
                                title="7A. Automotive">
                                <x-forms.input metricName="d3_exp_years_automotive" type="number"
                                    title="Years of Experience"
                                    description="Specify the amount of years of operational experience" />
                            </x-forms.toggle>
                            <x-forms.toggle :hasDependentContent="true" metricName="d3_vertical_bfsi"
                                title="7B. BFSI (Bank, Finance, Insurance)">
                                <x-forms.input metricName="d3_exp_years_bfsi" type="number"
                                    title="Years of Experience"
                                    description="Specify the amount of years of operational experience" />
                            </x-forms.toggle>
                            <x-forms.toggle :hasDependentContent="true" metricName="d3_vertical_energy"
                                title="7C. Energy & Utilities">
                                <x-forms.input metricName="d3_exp_years_energy" type="number"
                                    title="Years of Experience"
                                    description="Specify the amount of years of operational experience" />
                            </x-forms.toggle>
                            <x-forms.toggle :hasDependentContent="true" metricName="d3_vertical_government"
                                title="7D. Government & Public Sector">
                                <x-forms.input metricName="d3_exp_years_government" type="number"
                                    title="Years of Experience"
                                    description="Specify the amount of years of operational experience" />
                            </x-forms.toggle>
                            <x-forms.toggle :hasDependentContent="true" metricName="d3_vertical_healthcare"
                                title="7E. Healthcare">
                                <x-forms.input metricName="d3_exp_years_healthcare" type="number"
                                    title="Years of Experience"
                                    description="Specify the amount of years of operational experience" />
                            </x-forms.toggle>
                            <x-forms.toggle :hasDependentContent="true" metricName="d3_vertical_media"
                                title="7F. Media & Communications">
                                <x-forms.input metricName="d3_exp_years_media" type="number"
                                    title="Years of Experience"
                                    description="Specify the amount of years of operational experience" />
                            </x-forms.toggle>
                            <x-forms.toggle :hasDependentContent="true" metricName="d3_vertical_retail"
                                title="7G. Retail & Ecommerce">
                                <x-forms.input metricName="d3_exp_years_retail" type="number"
                                    title="Years of Experience"
                                    description="Specify the amount of years of operational experience" />
                            </x-forms.toggle>
                            <x-forms.toggle :hasDependentContent="true" metricName="d3_vertical_tech"
                                title="7H. Tech & Consumer Electronics">
                                <x-forms.input metricName="d3_exp_years_tech" type="number"
                                    title="Years of Experience"
                                    description="Specify the amount of years of operational experience" />
                            </x-forms.toggle>
                            <x-forms.toggle :hasDependentContent="true" metricName="d3_vertical_travel"
                                title="7I. Travel, Transp. & Tourism">
                                <x-forms.input metricName="d3_exp_years_travel" type="number"
                                    title="Years of Experience"
                                    description="Specify the amount of years of operational experience" />
                            </x-forms.toggle>
                        </x-panels.sections>

                        <x-forms.score title="8. Infrastructure (Seat Capacity)"
                            description="Provide details regarding the physical operational capacity, seat metrics, and distribution centers for this location."
                            idPrefix="create_hidden_">
                            <x-forms.input name="d3_total_installed_capacity" type="number" description=""
                                title="8A. What is the country's current installed capacity, how many total seats does it have?" />
                            <x-forms.input name="d3_growth_availability" type="number" description=""
                                title="8B. What is the current availability of seats for growth?" />
                        </x-forms.score>

                    </x-panels.dimensions>

                    <x-panels.dimensions title="D4 | Country Level Risk Profile" step="4"
                        description="This dimension assesses the level of exposure and resilience of the national environment to external and internal factors.">

                        <x-panels.sections title="1. Operational Stability & Country Risk"
                            description="What level of security and business continuity does the environment offer for the operation?">

                            <x-panels.rubrics>
                                <x-panels.rubrics-segment number=1 name="Critical"
                                    description="Unfeasible due to failing infrastructure, constant strikes, or hyperinflation." />
                                <x-panels.rubrics-segment number=2 name="Unstable"
                                    description="Recurring risks, a volatile environment, and a constantly changing legal framework." />
                                <x-panels.rubrics-segment number=3 name="Stable"
                                    description="Functional environment with isolated incidents and manageable fluctuations for LATAM standards." />
                                <x-panels.rubrics-segment number=4 name="Solid"
                                    description="Secure and predictable environment with strong institutions and low corporate or asset criminality." />
                                <x-panels.rubrics-segment number=5 name="Very Secure"
                                    description="Complete operational buffering, maximum legal security, and robust economic stability." />
                            </x-panels.rubrics>

                            <x-forms.radio-score minLabel="Critical" maxLabel="Very Secure"
                                metricLabel="1A. Political Stability: Evaluation of government changes, strikes, or civil unrest that could impact site continuity."
                                metricName="d4_political_stability" />

                            <x-forms.radio-score minLabel="Critical" maxLabel="Very Secure"
                                metricLabel="1B. Legal Security: Respect for contracts, clear labor laws, and stable fiscal/tax incentives."
                                metricName="d4_legal_security" />

                            <x-forms.radio-score minLabel="Critical" maxLabel="Very Secure"
                                metricLabel="1C. Physical Security: Level of safety and security in the site's zone for both employees and corporate assets."
                                metricName="d4_physical_security" />

                            <x-forms.radio-score minLabel="Critical" maxLabel="Very Secure"
                                metricLabel="1D. Economic Stability: Control of inflation and local currency volatility against the USD/EUR."
                                metricName="d4_economic_stability" />

                        </x-panels.sections>

                        <x-panels.sections title="2. International Perception"
                            description="How is the country perceived by foreign investors in terms of reputation, country brand, and ease of doing businesses?">

                            <x-panels.rubrics>
                                <x-panels.rubrics-segment number=1 name="Unfavorable"
                                    description="High risk or questionable corporate ethics; highly difficult to justify before global investment committees." />
                                <x-panels.rubrics-segment number=2 name="Emerging"
                                    description="Weak country brand in services; requires heavy upfront education for the investor." />
                                <x-panels.rubrics-segment number=3 name="Reliable"
                                    description="Standard outsourcing destination; present on the corporate radar but not a top strategic priority." />
                                <x-panels.rubrics-segment number=4 name="Attractive"
                                    description="Preferred destination with a high talent reputation and streamlined ease of doing business." />
                                <x-panels.rubrics-segment number=5 name="Top Tier"
                                    description="Investment magnet and regional benchmark due to its transparency, advanced infrastructure, and prestige." />
                            </x-panels.rubrics>

                            <x-forms.radio-score minLabel="Unfavorable" maxLabel="Top Tier"
                                metricLabel="2A. International Perception: Evaluation of country brand reputation, global investment safety, and ease of doing business indexes."
                                metricName="d4_international_perception" />

                        </x-panels.sections>


                        <x-panels.sections title="3. Compliance & Data Protection"
                            description="How well-aligned are local laws and site standards with international security regulations (GDPR, HIPAA, PCI)?">

                            <x-panels.rubrics>
                                <x-panels.rubrics-segment number=1 name="Incipient"
                                    description="Absence of data protection laws and basic cybersecurity controls." />
                                <x-panels.rubrics-segment number=2 name="Basic"
                                    description="Local legislation with low enforcement; internal protocols without external certifications." />
                                <x-panels.rubrics-segment number=3 name="Aligned"
                                    description="International standards applied; readiness for audits and responsible data management." />
                                <x-panels.rubrics-segment number=4 name="Certified"
                                    description="Operation under auditable standards (ISO, SOC2) with a robust culture of compliance." />
                                <x-panels.rubrics-segment number=5 name="World-Class"
                                    description="Full compliance (GDPR, HIPAA, PCI) and a global benchmark in information security." />
                            </x-panels.rubrics>

                            <x-forms.radio-score minLabel="Incipient" maxLabel="World-Class"
                                metricLabel="3A. Compliance & Data Protection: Alignment of regional legal frameworks and operational footprints with international standard auditing."
                                metricName="d4_compliance_data_protection" />

                        </x-panels.sections>
                    </x-panels.dimensions>

                    <x-panels.dimensions title="D5 | Price Sensitivity & Operating Cost" step="5"
                        description="This dimension assesses the financial competitiveness and cost efficiency of the location. It analyzes the operating cost structure (OpEx), the burden of local wages, and the level of exposure to exchange rate risks to determine whether the country functions as a center of value-added production or a center of mass savings.

">
                        <x-panels.sections title=" 1. Total Labor Cost Index "
    description="How would you evaluate the cost of operating a site for the client in this country?">
    
    <x-panels.rubrics>
        <x-panels.rubrics-segment number=1 name="Premium"
            description="High cost environment; heavily focused on high-value delivery and operational transformation rather than cost arbitrage." />
        <x-panels.rubrics-segment number=2 name="Above Average"
            description="Moderately high operational costs balanced alongside an exceptional, highly-skilled talent pool." />
        <x-panels.rubrics-segment number=3 name="Standard LATAM"
            description="Highly competitive regional cost structures; represents the ideal balance between budget constraints and output quality." />
        <x-panels.rubrics-segment number=4 name="Competitive"
            description="Yields significant operational savings; highly optimized Opex parameters compared to alternative global hubs." />
    </x-panels.rubrics>

    <x-forms.radio-score end=4 minLabel="Premium" maxLabel="Competitive" 
        metricLabel="1A. Total Labor Cost Index: What is the overall evaluation of operating a delivery site for the client in this country?"
        metricName="d5_labor_cost_index" />

</x-panels.sections>

                        <x-panels.sections title="2. Currency Stability & Inflation Risk"
    description="How well-protected is the client's rate against devaluations or uncontrolled inflation in the country?">
    
    <x-panels.rubrics>
        <x-panels.rubrics-segment number=1 name="Critical Risk"
            description="High volatility or hyperinflation environments; severely compromises long-term pricing predictability." />
        <x-panels.rubrics-segment number=2 name="Moderate Volatility"
            description="Constant fluctuation; requires complex contractual indexing clauses to actively safeguard operational margins." />
        <x-panels.rubrics-segment number=3 name="Stable"
            description="Inflation is under corporate control and local currency variances remain predictable." />
        <x-panels.rubrics-segment number=4 name="Solid"
            description="Strong monetary stability, allowing precise and confident operational forecasting over a 3-to-5 year horizon." />
        <x-panels.rubrics-segment number=5 name="Fully Buffered"
            description="Foreign exchange risk is almost non-existent; total strategic certainty over the value of the investment." />
    </x-panels.rubrics>

    <x-forms.radio-score minLabel="Critical" maxLabel="Buffered" 
        metricLabel="2A. Currency & Inflation Risk: Evaluation of macroeconomic shielding, currency devaluation tracking, and client rate protection."
        metricName="d5_currency_inflation_risk" />

</x-panels.sections>

<div class="divider"></div>

                        <div class="card mt-6 bg-base-100 shadow-xl border border-base-200 overflow-hidden">
                            <div class="h-1 w-full bg-gradient-to-r from-primary via-accent to-secondary"></div>

                            <div class="card-body p-6 space-y-4">
                                <div class="flex flex-col gap-1.5 pb-3 border-b border-base-200">
                                    <h3 class="text-xs font-bold text-primary uppercase tracking-wider">
                                    Profile Qualitative Comments & Observations
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
                                            class="textarea textarea-bordered pl-11 pr-4 w-full bg-base-200/50 focus:bg-base-100 border-base-300 focus:border-accent focus:ring-2 focus:ring-accent/20 rounded-xl transition-all font-semibold text-sm text-neutral-700 focus:outline-none placeholder:text-base-content/30 min-h-[120px]">{{ old('leader_comments') }}</textarea>
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
                        Save Profile Parameters
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
