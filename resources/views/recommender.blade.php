<x-layouts.guest title="CNX LATAM SSE - Country Recommender">

    <div class="flex flex-col lg:flex-row gap-6 items-start">

        <div class="w-full lg:w-[42%] bg-white rounded-xl shadow-sm p-5 border border-base-300">
            <div class="mb-4">
                <h2 class="text-lg font-bold text-primary flex items-center gap-2">
                    <i class="fa-solid fa-bolt w-5 h-5 text-secondary"></i>
                    Requirements Engine workbench
                </h2>
                <p class="text-xs text-neutral/60 mt-0.5">Configure target alignment thresholds across the 5 structural
                    dimensions of the Node Intelligence framework.</p>
            </div>

            <form action="{{ route('countries.recommender') }}" method="GET" class="space-y-3">
                <input type="hidden" name="run_evaluation" value="1">

                <input type="hidden" name="education_level" id="input_edu"
                    value="{{ request('education_level', 'undergraduate') }}">
                <input type="hidden" name="cost_sensitivity" id="input_cost"
                    value="{{ request('cost_sensitivity', 'balanced') }}">

                <div class="collapse collapse-arrow bg-base-50/50 border border-base-200 rounded-xl transition-all">
                    <input type="checkbox" name="accordion_groups" checked />
                    <div
                        class="collapse-title text-xs font-bold text-primary flex items-center gap-2 uppercase tracking-wide">
                        <span class="w-2 h-2 rounded-full bg-accent"></span> D1 · Human Capital Pool
                    </div>
                    <div class="collapse-content space-y-4 text-xs pt-1">
                        <div>
                            <label class="font-semibold text-neutral block mb-1">Target Minimum Education Track</label>
                            <div class="join w-full bg-white border border-base-300 rounded-lg p-0.5">
                                <button type="button" onclick="syncSelector(this, 'edu', 'high_school')"
                                    class="btn btn-xs join-item flex-1 border-none normal-case h-7 {{ request('education_level') === 'high_school' ? 'bg-accent text-primary font-bold shadow-xs' : 'bg-transparent text-neutral hover:bg-base-100' }}">High
                                    School</button>
                                <button type="button" onclick="syncSelector(this, 'edu', 'technical')"
                                    class="btn btn-xs join-item flex-1 border-none normal-case h-7 {{ request('education_level') === 'technical' ? 'bg-accent text-primary font-bold shadow-xs' : 'bg-transparent text-neutral hover:bg-base-100' }}">Technical
                                    Track</button>
                                <button type="button" onclick="syncSelector(this, 'edu', 'undergraduate')"
                                    class="btn btn-xs join-item flex-1 border-none normal-case h-7 {{ request('education_level', 'undergraduate') === 'undergraduate' ? 'bg-accent text-primary font-bold shadow-xs' : 'bg-transparent text-neutral hover:bg-base-100' }}">Bachelors</button>
                                <button type="button" onclick="syncSelector(this, 'edu', 'postgraduate')"
                                    class="btn btn-xs join-item flex-1 border-none normal-case h-7 {{ request('education_level') === 'postgraduate' ? 'bg-accent text-primary font-bold shadow-xs' : 'bg-transparent text-neutral hover:bg-base-100' }}">Postgrad</button>
                            </div>
                        </div>

                        <div>
                            <label class="font-semibold text-neutral block mb-1">Required Core Competence Focus</label>
                            <div class="grid grid-cols-2 gap-1 bg-white border border-base-200 rounded-lg p-0.5">
                                @foreach ([
        'cx_hospitality' => 'CX & Hospitality Support',
        'stem_digital' => 'STEM & Digital Infrastructure',
        'professional_services' => 'Professional Shared Serv.',
        'healthcare_sciences' => 'Healthcare & Life Sciences',
        'business_sales' => 'Business Dev. & Sales',
    ] as $key => $label)
                                    <input type="checkbox" name="specializations[]" value="{{ $key }}"
                                        id="spec_{{ $key }}" class="hidden"
                                        {{ in_array($key, request('specializations', ['cx_hospitality'])) ? 'checked' : '' }}>
                                    <button type="button" onclick="toggleMultiItem(this, 'spec_{{ $key }}')"
                                        class="btn btn-xs border-none normal-case h-7 {{ in_array($key, request('specializations', ['cx_hospitality'])) ? 'bg-secondary text-white font-bold' : 'bg-transparent text-neutral hover:bg-base-100' }}">{{ $label }}</button>
                                @endforeach
                            </div>
                        </div>

                        <div>
                            <label class="font-semibold text-neutral block mb-1">Target Language Capacity Hub</label>
                            <div class="grid grid-cols-3 gap-1 bg-white border border-base-200 rounded-lg p-0.5">
                                @foreach (['english' => 'English', 'spanish' => 'Spanish', 'portuguese' => 'Portuguese', 'french' => 'French', 'italian' => 'Italian'] as $key => $label)
                                    <input type="checkbox" name="languages[]" value="{{ $key }}"
                                        id="lang_{{ $key }}" class="hidden"
                                        {{ in_array($key, request('languages', ['english'])) ? 'checked' : '' }}>
                                    <button type="button" onclick="toggleMultiItem(this, 'lang_{{ $key }}')"
                                        class="btn btn-xs border-none normal-case h-7 {{ in_array($key, request('languages', ['english'])) ? 'bg-secondary text-white font-bold' : 'bg-transparent text-neutral hover:bg-base-100' }}">{{ $label }}</button>
                                @endforeach
                            </div>
                        </div>

                        <div>
                            <label class="font-semibold text-neutral block mb-1">Target Geographic Destination Cultural
                                Alignment</label>
                            <div class="grid grid-cols-2 gap-1 bg-white border border-base-200 rounded-lg p-0.5">
                                @foreach (['na' => 'North America (US/CA)', 'eu' => 'Europe (UK/EU)', 'spain' => 'Spain Market', 'latam' => 'LATAM Cross-Border', 'apac' => 'Asia / Pacific'] as $key => $label)
                                    <input type="checkbox" name="global_ready[]" value="{{ $key }}"
                                        id="gready_{{ $key }}" class="hidden"
                                        {{ in_array($key, request('global_ready', ['na'])) ? 'checked' : '' }}>
                                    <button type="button"
                                        onclick="toggleMultiItem(this, 'gready_{{ $key }}')"
                                        class="btn btn-xs border-none normal-case h-7 {{ in_array($key, request('global_ready', ['na'])) ? 'bg-secondary text-white font-bold' : 'bg-transparent text-neutral hover:bg-base-100' }}">{{ $label }}</button>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <div class="collapse collapse-arrow bg-base-50/50 border border-base-200 rounded-xl transition-all">
                    <input type="checkbox" name="accordion_groups" />
                    <div
                        class="collapse-title text-xs font-bold text-secondary flex items-center gap-2 uppercase tracking-wide">
                        <span class="w-2 h-2 rounded-full bg-secondary"></span> D2 · Business Ecosystem
                    </div>
                    <div class="collapse-content space-y-3 text-xs pt-1">
                        <div>
                            <div class="flex justify-between text-neutral mb-0.5 font-medium">
                                <span>Min. Fortune 500 MNC Density Hub Score</span>
                                <span class="text-primary font-bold"
                                    id="lbl_d2_mnc_presence">{{ request('d2_mnc_presence', 1) }} / 5</span>
                            </div>
                            <input type="range" name="d2_mnc_presence" min="1" max="5"
                                value="{{ request('d2_mnc_presence', 1) }}" class="range range-xs range-primary"
                                oninput="document.getElementById('lbl_d2_mnc_presence').innerText = this.value + ' / 5'">
                        </div>
                        <div>
                            <div class="flex justify-between text-neutral mb-0.5 font-medium">
                                <span>Min. Regulated Compliance Sector Maturity</span>
                                <span class="text-primary font-bold"
                                    id="lbl_d2_regulated_industry_maturity">{{ request('d2_regulated_industry_maturity', 1) }}
                                    / 5</span>
                            </div>
                            <input type="range" name="d2_regulated_industry_maturity" min="1" max="5"
                                value="{{ request('d2_regulated_industry_maturity', 1) }}"
                                class="range range-xs range-primary"
                                oninput="document.getElementById('lbl_d2_regulated_industry_maturity').innerText = this.value + ' / 5'">
                        </div>
                        <div>
                            <div class="flex justify-between text-neutral mb-0.5 font-medium">
                                <span>Minimum Operational Legacy Track Experience</span>
                                <span class="text-primary font-bold"
                                    id="lbl_min_mnc_years">{{ request('min_mnc_years', 0) }} Years</span>
                            </div>
                            <input type="range" name="min_mnc_years" min="0" max="25"
                                value="{{ request('min_mnc_years', 0) }}" class="range range-xs range-primary"
                                oninput="document.getElementById('lbl_min_mnc_years').innerText = this.value + ' Years'">
                        </div>
                    </div>
                </div>

                <div class="collapse collapse-arrow bg-base-50/50 border border-base-200 rounded-xl transition-all">
                    <input type="checkbox" name="accordion_groups" />
                    <div
                        class="collapse-title text-xs font-bold text-[#FF8700] flex items-center gap-2 uppercase tracking-wide">
                        <span class="w-2 h-2 rounded-full bg-[#FF8700]"></span> D3 · Operational Profile
                    </div>
                    <div class="collapse-content space-y-3 text-xs pt-1">
                        <div>
                            <label class="font-semibold text-neutral block mb-1">Required Delivery Channels
                                Matrix</label>
                            <div class="grid grid-cols-2 gap-1 bg-white border border-base-200 rounded-lg p-0.5">
                                @foreach ([
        'voice' => 'Voice Channel',
        'chat' => 'Chat & Messaging',
        'email' => 'Email Management',
        'back_office' => 'Back Office (Case)',
        'self_service' => 'Self-Service & AI',
        'video_chat' => 'Video Chat Live',
    ] as $key => $label)
                                    <input type="checkbox" name="channels[]" value="{{ $key }}"
                                        id="channel_{{ $key }}" class="hidden"
                                        {{ in_array($key, request('channels', ['voice'])) ? 'checked' : '' }}>
                                    <button type="button"
                                        onclick="toggleMultiItem(this, 'channel_{{ $key }}')"
                                        class="btn btn-xs border-none normal-case h-7 {{ in_array($key, request('channels', ['voice'])) ? 'bg-[#FF8700] text-white font-bold shadow-xs' : 'bg-transparent text-neutral hover:bg-base-100' }}">{{ $label }}</button>
                                @endforeach
                            </div>
                        </div>

                        <div>
                            <label class="font-semibold text-neutral block mb-1">Mass Technical Support & Tiering
                                Depth</label>
                            <div class="grid grid-cols-2 gap-1 bg-white border border-base-200 rounded-lg p-0.5">
                                @foreach ([
        'tech_cx' => 'Customer Experience',
        'tech_sales' => 'High-Volume Sales',
        'tech_collections' => 'Collections Portfolio',
        'tech_tier1' => 'Tier 1 Front Line',
        'tech_tier2' => 'Tier 2 Diagnostics',
        'tech_tier3' => 'Tier 3 Expert Eng.',
    ] as $key => $label)
                                    <input type="checkbox" name="tech_tiers[]" value="{{ $key }}"
                                        id="tier_{{ $key }}" class="hidden"
                                        {{ in_array($key, request('tech_tiers', ['tech_cx'])) ? 'checked' : '' }}>
                                    <button type="button"
                                        onclick="toggleMultiItem(this, 'tier_{{ $key }}')"
                                        class="btn btn-xs border-none normal-case h-7 {{ in_array($key, request('tech_tiers', ['tech_cx'])) ? 'bg-[#FF8700] text-white font-bold shadow-xs' : 'bg-transparent text-neutral hover:bg-base-100' }}">{{ $label }}</button>
                                @endforeach
                            </div>
                        </div>

                        <div>
                            <div class="flex justify-between text-neutral mb-0.5 font-medium">
                                <span>Max Acceptable Annualized Turnover (Attrition)</span>
                                <span class="text-[#FF8700] font-bold"
                                    id="lbl_max_attrition">{{ request('max_attrition', 45) }}% Cap</span>
                            </div>
                            <input type="range" name="max_attrition" min="5" max="75"
                                value="{{ request('max_attrition', 45) }}" class="range range-xs"
                                style="--p:#FF8700;"
                                oninput="document.getElementById('lbl_max_attrition').innerText = this.value + '% Cap'">
                        </div>

                        <div>
                            <div class="flex justify-between text-neutral mb-0.5 font-medium">
                                <span>Minimum Active Infrastructure Clusters</span>
                                <span class="text-[#FF8700] font-bold"
                                    id="lbl_min_sites">{{ request('min_sites', 1) }} Active Nodes</span>
                            </div>
                            <input type="range" name="min_sites" min="1" max="15"
                                value="{{ request('min_sites', 1) }}" class="range range-xs" style="--p:#FF8700;"
                                oninput="document.getElementById('lbl_min_sites').innerText = this.value + ' Active Nodes'">
                        </div>

                        <div>
                            <label class="font-semibold text-neutral block mb-1">Target Specialized Market
                                Verticals</label>
                            <div
                                class="grid grid-cols-1 gap-1 bg-white border border-base-200 rounded-lg p-1 max-h-40 overflow-y-auto">
                                @foreach ([
        'automotive' => 'Automotive & Logistics Systems',
        'bfsi' => 'BFSI Financial Portfolios Matrix',
        'energy' => 'Energy & Public Utilities Infrastructure',
        'government' => 'Government & Defense Frameworks',
        'healthcare' => 'Healthcare Information Records System',
        'media' => 'Telecoms, Networks & Media Assets',
        'retail' => 'Retail Logistics & Connected E-Commerce',
        'tech' => 'Advanced Consumer Electronics & Cloud Eng.',
        'travel' => 'Global Travel Engines & Hospitality',
    ] as $key => $label)
                                    <input type="checkbox" name="verticals[]" value="{{ $key }}"
                                        id="vert_{{ $key }}" class="hidden"
                                        {{ in_array($key, request('verticals', ['tech'])) ? 'checked' : '' }}>
                                    <button type="button"
                                        onclick="toggleMultiItem(this, 'vert_{{ $key }}')"
                                        class="btn btn-xs border-none normal-case h-7 justify-start px-3 text-left w-full {{ in_array($key, request('verticals', ['tech'])) ? 'bg-accent text-primary font-bold shadow-xs' : 'bg-transparent text-neutral hover:bg-base-100' }}">{{ $label }}</button>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <div class="collapse collapse-arrow bg-base-50/50 border border-base-200 rounded-xl transition-all">
                    <input type="checkbox" name="accordion_groups" />
                    <div
                        class="collapse-title text-xs font-bold text-[#CC3262] flex items-center gap-2 uppercase tracking-wide">
                        <span class="w-2 h-2 rounded-full bg-[#CC3262]"></span> D4 · Country Profile Risk
                    </div>
                    <div class="collapse-content space-y-3 text-xs pt-1">
                        @foreach ([
        'd4_political_stability' => 'Political Stability (Government/Incentives)',
        'd4_legal_security' => 'Legal Asset Security (Labor/Tax Frameworks)',
        'd4_physical_security' => 'Physical Safety (Sovereign Infrastructure Protection)',
        'd4_economic_stability' => 'Macroeconomic Consistency (Inflation Control)',
        'd4_international_perception' => 'Global Brand Power & Foreign Investor Sentiment',
        'd4_compliance_data_protection' => 'Regulatory Protection Rubric (GDPR, HIPAA, PCI)',
    ] as $slug => $label)
                            <div>
                                <div class="flex justify-between text-neutral mb-0.5 font-medium">
                                    <span>{{ $label }}</span>
                                    <span class="text-[#CC3262] font-bold"
                                        id="lbl_{{ $slug }}">{{ request($slug, 1) }} / 5</span>
                                </div>
                                <input type="range" name="{{ $slug }}" min="1" max="5"
                                    value="{{ request($slug, 1) }}" class="range range-xs" style="--p:#CC3262;"
                                    oninput="document.getElementById('lbl_{{ $slug }}').innerText = this.value + ' / 5'">
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="collapse collapse-arrow bg-base-50/50 border border-base-200 rounded-xl transition-all">
                    <input type="checkbox" name="accordion_groups" />
                    <div
                        class="collapse-title text-xs font-bold text-accent flex items-center gap-2 uppercase tracking-wide">
                        <span class="w-2 h-2 rounded-full bg-accent"></span> D5 · Cost Sensitivity
                    </div>
                    <div class="collapse-content space-y-4 text-xs pt-1">
                        <div>
                            <label class="font-semibold text-neutral block mb-1">Target Operating Budget
                                Footprint</label>
                            <div class="join w-full bg-white border border-base-300 rounded-lg p-0.5">
                                <button type="button" onclick="syncSelector(this, 'cost', 'cost-driven')"
                                    class="btn btn-xs join-item flex-1 border-none normal-case h-7 {{ request('cost_sensitivity') === 'cost-driven' ? 'bg-accent text-primary font-bold shadow-xs' : 'bg-transparent text-neutral hover:bg-base-100' }}">Cost-Driven</button>
                                <button type="button" onclick="syncSelector(this, 'cost', 'balanced')"
                                    class="btn btn-xs join-item flex-1 border-none normal-case h-7 {{ request('cost_sensitivity', 'balanced') === 'balanced' ? 'bg-accent text-primary font-bold shadow-xs' : 'bg-transparent text-neutral hover:bg-base-100' }}">Balanced</button>
                                <button type="button" onclick="syncSelector(this, 'cost', 'premium')"
                                    class="btn btn-xs join-item flex-1 border-none normal-case h-7 {{ request('cost_sensitivity') === 'premium' ? 'bg-accent text-primary font-bold shadow-xs' : 'bg-transparent text-neutral hover:bg-base-100' }}">Premium
                                    Arbitrage</button>
                            </div>
                        </div>
                        <div>
                            <div class="flex justify-between text-neutral mb-0.5 font-medium">
                                <span>Min. Labor Cost Leverage Optimization</span>
                                <span class="text-primary font-bold"
                                    id="lbl_d5_labor_cost_index">{{ request('d5_labor_cost_index', 1) }} / 5</span>
                            </div>
                            <input type="range" name="d5_labor_cost_index" min="1" max="5"
                                value="{{ request('d5_labor_cost_index', 1) }}" class="range range-xs range-primary"
                                oninput="document.getElementById('lbl_d5_labor_cost_index').innerText = this.value + ' / 5'">
                        </div>
                        <div>
                            <div class="flex justify-between text-neutral mb-0.5 font-medium">
                                <span>Min. Currency Stability Resilience Shielding</span>
                                <span class="text-primary font-bold"
                                    id="lbl_d5_currency_inflation_risk">{{ request('d5_currency_inflation_risk', 1) }}
                                    / 5</span>
                            </div>
                            <input type="range" name="d5_currency_inflation_risk" min="1" max="5"
                                value="{{ request('d5_currency_inflation_risk', 1) }}"
                                class="range range-xs range-primary"
                                oninput="document.getElementById('lbl_d5_currency_inflation_risk').innerText = this.value + ' / 5'">
                        </div>
                    </div>
                </div>

                <button type="submit"
                    class="btn w-full bg-accent hover:bg-accent/90 text-primary border-none font-bold text-md h-12 shadow-sm transition-all rounded-xl mt-2">
                    Run Recommender
                </button>
            </form>
        </div>

        <div class="w-full lg:w-[58%] space-y-4">
            <div class="border-b border-base-200 pb-2">
                <h2 class="text-xl font-bold text-primary">Recommended Countries Matrix</h2>
                <p class="text-xs text-neutral/60">Geo-profile node indexing matching your specified environment
                    variables.</p>
            </div>

            @if ($hasSubmitted)
                @forelse($countries as $index => $country)
                    @php
                        $fitScore = $country->calculated_fit_score;
                        $rankBadgeLabel =
                            $index === 0
                                ? '#1 PRIMARY GEO RECOMMENDATION'
                                : ($index === 1
                                    ? '#2 SECONDARY ALTERNATIVE NODE'
                                    : '#3 RESILIENT PORTFOLIO ENTRY CLUSTER');
                        $leftAccentBorderColor =
                            $index === 0
                                ? 'border-l-accent'
                                : ($index === 1
                                    ? 'border-l-secondary'
                                    : 'border-l-[#D1D5DB]');
                        $badgeStyle =
                            $index === 0
                                ? 'bg-accent text-primary'
                                : ($index === 1
                                    ? 'bg-secondary text-white'
                                    : 'bg-base-200 text-neutral');

                        // Dynamically pull aggregated dimension values
                        $d1_avg = $country->d1_score;
                        $d2_avg = $country->d2_score;
                        $d3_avg = $country->d3_score;
                        $d4_avg = $country->d4_score;
                        $d5_avg = $country->d5_score;

                        // Safely convert ISO code to lowercase for FlagCDN utility integration
                        $flagCode = strtolower($country->iso_code);
                    @endphp

                    <div
                        class="bg-white rounded-xl shadow-sm p-4 border-l-4 {{ $leftAccentBorderColor }} border-y border-r border-base-200 relative overflow-hidden group hover:shadow-md transition-all duration-300">

                        <div
                            class="absolute -right-4 -top-6 w-36 opacity-[0.07] z-0 pointer-events-none select-none transform rotate-12 group-hover:scale-110 group-hover:opacity-[0.12] transition-all duration-500">
                            <img src="https://flagcdn.com/192x144/{{ $flagCode }}.png"
                                alt="{{ $country->country_name }}" class="w-full rounded-lg h-auto object-contain">
                        </div>

                        <div class="relative z-10">
                            <div class="flex items-center justify-between mb-3">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="w-10 h-10 rounded-xl bg-base-100 flex items-center justify-center text-xl shadow-inner border border-base-200 select-none">
                                        <i class="fa-solid fa-earth-americas text-secondary"></i>
                                    </div>
                                    <div>
                                        <div class="flex items-center gap-2">
                                            <a href="{{ route('countries.show', $country) }}"
                                                class="text-md font-bold text-primary hover:underline uppercase tracking-wide">
                                                {{ $country->country_name }}
                                            </a>
                                            <span
                                                class="badge bg-base-100 border border-base-300 text-neutral-500 font-mono text-[9px] px-1 h-4 font-bold rounded">
                                                {{ strtoupper($country->iso_code) }}
                                            </span>
                                        </div>
                                        <span
                                            class="badge {{ $badgeStyle }} border-none font-extrabold text-[9px] mt-1 px-1.5 py-0.5 tracking-wider rounded">
                                            {{ $rankBadgeLabel }}
                                        </span>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <span
                                        class="text-2xl font-black text-primary tracking-tight">{{ $fitScore }}%</span>
                                    <p class="text-[8px] tracking-widest text-neutral/50 font-bold uppercase">Match
                                        Index</p>
                                </div>
                            </div>

                            <div
                                class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-3 mb-2 pt-2 border-t border-base-100">
                                <div class="flex flex-col">
                                    <div
                                        class="flex items-center justify-between text-[10px] text-neutral/70 mb-0.5 font-bold">
                                        <span>D1 Capital</span><span>{{ number_format($d1_avg, 1) }}</span>
                                    </div>
                                    <progress class="progress w-full h-1.5" value="{{ ($d1_avg / 5) * 100 }}"
                                        max="100" style="--p: #003D5B;"></progress>
                                </div>
                                <div class="flex flex-col">
                                    <div
                                        class="flex items-center justify-between text-[10px] text-neutral/70 mb-0.5 font-bold">
                                        <span>D2 Ecosystem</span><span>{{ number_format($d2_avg, 1) }}</span>
                                    </div>
                                    <progress class="progress w-full h-1.5" value="{{ ($d2_avg / 5) * 100 }}"
                                        max="100" style="--p: #007380;"></progress>
                                </div>
                                <div class="flex flex-col">
                                    <div
                                        class="flex items-center justify-between text-[10px] text-neutral/70 mb-0.5 font-bold">
                                        <span>D3 Operational</span><span>{{ number_format($d3_avg, 1) }}</span>
                                    </div>
                                    <progress class="progress w-full h-1.5" value="{{ ($d3_avg / 5) * 100 }}"
                                        max="100" style="--p: #FF8700;"></progress>
                                </div>
                                <div class="flex flex-col">
                                    <div
                                        class="flex items-center justify-between text-[10px] text-neutral/70 mb-0.5 font-bold">
                                        <span>D4 Risk Profile</span><span>{{ number_format($d4_avg, 1) }}</span>
                                    </div>
                                    <progress class="progress w-full h-1.5" value="{{ ($d4_avg / 5) * 100 }}"
                                        max="100" style="--p: #CC3262;"></progress>
                                </div>
                                <div class="flex flex-col">
                                    <div
                                        class="flex items-center justify-between text-[10px] text-neutral/70 mb-0.5 font-bold">
                                        <span>D5 Cost Leverage</span><span>{{ number_format($d5_avg, 1) }}</span>
                                    </div>
                                    <progress class="progress w-full h-1.5" value="{{ ($d5_avg / 5) * 100 }}"
                                        max="100" style="--p: #25E2CC;"></progress>
                                </div>
                            </div>

                            <div class="flex flex-wrap gap-1 mt-2 border-t border-base-50 pt-2">
                                @if ($d1_avg >= 4.0)
                                    <span
                                        class="text-[9px] font-bold bg-secondary/5 text-secondary border border-secondary/10 px-1.5 py-0.5 rounded">High
                                        Talent Availability</span>
                                @endif
                                @if ($d3_avg >= 4.0)
                                    <span
                                        class="text-[9px] font-bold bg-primary/5 text-primary border border-primary/10 px-1.5 py-0.5 rounded">Omnichannel
                                        Track Scale</span>
                                @endif
                                @if ($d5_avg >= 4.0)
                                    <span
                                        class="text-[9px] font-bold bg-[#FF8700]/5 text-[#FF8700] border border-[#FF8700]/10 px-1.5 py-0.5 rounded">Arbitrage
                                        Optimized</span>
                                @endif
                                @if ($country->d3_sites_count > 5)
                                    <span
                                        class="text-[9px] font-bold bg-purple-50 text-purple-700 border border-purple-100 px-1.5 py-0.5 rounded">High
                                        Node Density ({{ $country->d3_sites_count }} clusters)</span>
                                @endif
                            </div>
                        </div>

                    </div>
                @empty
                    <div class="bg-white rounded-xl shadow-sm p-10 text-center border border-base-300">
                            <i class="fa-solid fa-circle-xmark w-10 h-10 text-neutral/30 mx-auto mb-2"></i>
                        <p class="text-xs text-neutral/60 font-semibold">No documented strategic node structures match
                            your active filtering variables.</p>
                    </div>
                @endforelse
            @else
                <div class="bg-white rounded-xl border border-dashed border-base-300 p-12 text-center shadow-inner">
                    <div
                        class="w-12 h-12 bg-base-100 rounded-full flex items-center justify-center mx-auto mb-3 border border-base-200">
                        <i class="fa-solid fa-power-off w-6 h-6 text-secondary"></i>
                    </div>
                    <h3 class="text-md font-bold text-primary mb-0.5">Scoring Engine In Standby</h3>
                    <p class="text-xs text-neutral/50 max-w-xs mx-auto">Map parameter nodes on the left configuration
                        bench and execute <strong>"Execute Matrix Sizing"</strong> to render score calculations.</p>
                </div>
            @endif
        </div>
    </div>

    <x-slot:scripts>
        <script>
            function syncSelector(buttonInstance, fieldKey, passValue) {
                document.getElementById('input_' + fieldKey).value = passValue;

                const buttonGroup = buttonInstance.closest('.join');
                if (!buttonGroup) return;

                buttonGroup.querySelectorAll('button').forEach(btn => {
                    btn.className =
                        "btn btn-xs join-item flex-1 border-none normal-case h-7 bg-transparent text-neutral hover:bg-base-100";
                });

                buttonInstance.className =
                    "btn btn-xs join-item flex-1 border-none normal-case h-7 bg-accent text-primary font-bold shadow-xs hover:bg-accent";
                buttonInstance.blur();
            }

            function toggleMultiItem(buttonInstance, structuralInputId) {
                const innerInputCheckbox = document.getElementById(structuralInputId);
                if (!innerInputCheckbox) return;

                innerInputCheckbox.checked = !innerInputCheckbox.checked;

                if (innerInputCheckbox.checked) {
                    if (structuralInputId.startsWith('vert_')) {
                        buttonInstance.className =
                            "btn btn-xs border-none normal-case h-7 justify-start px-3 text-left w-full bg-accent text-primary font-bold shadow-xs hover:bg-accent";
                    } else if (structuralInputId.startsWith('channel_') || structuralInputId.startsWith('tier_')) {
                        buttonInstance.className =
                            "btn btn-xs border-none normal-case h-7 bg-[#FF8700] text-white font-bold hover:bg-[#FF8700]";
                    } else {
                        buttonInstance.className =
                            "btn btn-xs border-none normal-case h-7 bg-secondary text-white font-bold hover:bg-secondary";
                    }
                } else {
                    buttonInstance.className = structuralInputId.startsWith('vert_') ?
                        "btn btn-xs border-none normal-case h-7 justify-start px-3 text-left w-full bg-transparent text-neutral hover:bg-base-100" :
                        "btn btn-xs border-none normal-case h-7 bg-transparent text-neutral hover:bg-base-100";
                }
                buttonInstance.blur();
            }
        </script>
    </x-slot:scripts>
</x-layouts.guest>
