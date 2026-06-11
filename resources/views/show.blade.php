<x-layouts.guest title="CNX LATAM SSE - {{ $country->country_name }}">
    @auth
    {{-- Top Action Bar / Breadcrumb Layout System --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
        <div>
            <div class="text-xs breadcrumbs text-base-content/50 p-0 mb-1">
                <ul>
                    <li><a href="{{ route('dashboard') }}">Admin Dashboard</a></li>
                    <li><a href="{{ route('pipeline') }}">Active Matrices Pipeline</a></li>
                    <li class="font-semibold text-primary">Strategic Profile</li>
                </ul>
            </div>
            <h2 class="text-xl font-bold text-primary flex items-center gap-2">
                <i class="fa-solid fa-folder-open text-sm text-accent"></i>
                Node Intelligence Scorecard
            </h2>
        </div>
        <div class="flex items-center gap-2">
            <a href="{{ route('countries.edit', $country) }}" class="btn btn-sm bg-primary hover:bg-primary/90 text-white rounded-lg px-4 shadow-sm">
                <i class="fa-solid fa-pen-to-square mr-1"></i> Modify Parameters
            </a>
            <a href="{{ route('pipeline') }}" class="btn btn-sm btn-outline border-base-300 rounded-lg px-4 bg-white">
                Back to Pipeline
            </a>
        </div>
    </div>
    @endauth

    {{-- Hero Node Branding Header Wrapper --}}
    <div class="hero bg-primary rounded-xl p-6 text-white relative overflow-hidden shadow-md mb-6">
        <div class="absolute top-0 right-0 w-64 h-64 bg-white/5 rounded-full -translate-y-1/2 translate-x-1/2 pointer-events-none"></div>
        <div class="w-full flex flex-col md:flex-row md:items-center md:justify-between gap-6 z-10">
            <div class="flex items-center gap-5">
                <div class="w-16 h-16 rounded-2xl bg-white/10 border border-white/20 flex items-center justify-center text-4xl shadow-inner select-none animate-fadeIn">
                    <i class="fa-solid fa-earth-americas text-accent"></i>
                </div>
                <div>
                    <div class="flex items-center gap-3">
                        <h1 class="text-2xl sm:text-3xl font-extrabold uppercase tracking-wide text-white">
                            {{ $country->country_name }}
                        </h1>
                        <div class="badge bg-accent text-primary font-bold border-none uppercase text-xs px-2.5 shadow-sm rounded-md h-5 select-none">
                            {{ $country->iso_code }}
                        </div>
                    </div>
                    <p class="text-white/70 text-xs mt-1 font-medium flex items-center gap-3">
                        <span><i class="fa-solid fa-user-tie text-accent/80 mr-1.5"></i>Leader: <strong class="text-white">{{ $country->leader_name }}</strong></span>
                        <span class="text-white/30">|</span>
                        <span><i class="fa-solid fa-location-dot text-accent/80 mr-1.5"></i>Operational Hub: <strong class="text-white">{{ $country->site_region }}</strong></span>
                    </p>
                </div>
            </div>

            {{-- Audit Matrix Details Panel --}}
            <div class="bg-black/15 border border-white/10 rounded-xl px-4 py-3 min-w-[240px] text-xs space-y-1.5 backdrop-blur-sm self-start md:self-auto">
                <div class="flex justify-between text-white/50 font-medium">
                    <span>Profile Data Completeness:</span>
                    <span class="text-accent font-bold">100%</span>
                </div>
                <progress class="progress progress-accent w-full h-1.5" value="100" max="100" style="--p: #25E2CC;"></progress>
                <div class="flex justify-between items-center text-[10px] text-white/40 pt-1 font-mono">
                    <span>Updated: {{ $country->updated_at->format('M d, Y') }}</span>
                </div>
            </div>
        </div>
    </div>

    {{-- Leader Comments and Analysis --}}
    <div class="bg-base-100 rounded-xl p-4 border border-base-200 shadow-sm mb-8">
        <h3 class="text-sm font-bold text-primary uppercase tracking-wide mb-2">Leader's Commentary</h3>
        <p class="text-[11px] text-base-content/70 italic border-l-2 border-primary pl-4">
            {{ $country->leader_comments ?? 'No commentary provided by the leader.' }}
        </p>
    </div>

    {{-- Overview / Framework Average Matrix Grid Section using Model Eloquent Attributes --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
        {{-- Matrix Average Base Blueprint Widget --}}
        <div class="card bg-base-100 shadow-xl border-2 border-accent relative overflow-hidden group hover:shadow-2xl transition-all duration-300">
            <div class="card-body p-5 flex flex-col justify-between">
                <div>
                    <div class="flex items-center justify-between">
                        <span class="text-[10px] font-bold uppercase tracking-widest text-primary/60">Framework Target Score</span>
                        <div class="w-7 h-7 rounded-lg bg-accent/10 text-primary flex items-center justify-center"><i class="fa-solid fa-chart-line text-xs"></i></div>
                    </div>
                    <h4 class="text-xs font-bold text-primary uppercase mt-2">Overall Framework Average</h4>
                    <p class="text-[11px] text-base-content/50 mt-1 line-clamp-2">Aggregated macro evaluation benchmark of this geo profile node across all active target sizing thresholds.</p>
                </div>
                <div class="mt-4 pt-4 border-t border-base-100 flex items-center justify-between">
                    <span class="text-3xl font-extrabold text-primary tracking-tight">{{ number_format($country->average_score, 2) }} <span class="text-xs font-semibold text-base-content/40">/ 5.00</span></span>
                    <span class="badge bg-accent/10 text-primary border-none font-bold text-[10px] px-2.5 rounded h-5">MATRIX BOUND</span>
                </div>
            </div>
        </div>

        {{-- Dimension Cards Block Map Loop using Model Accessors --}}
        @foreach ([
            ['title' => 'D1 | Human Capital', 'score' => $country->d1_score, 'desc' => 'Assesses the maturity, deep technical parameters, and strategic language capabilities of the local market pool.'],
            ['title' => 'D2 | Business Ecosystem', 'score' => $country->d2_score, 'desc' => 'Evaluates structural multinational density, market scale, and regulated sector experience thresholds.'],
            ['title' => 'D3 | Operational Profile', 'score' => $country->d3_score, 'desc' => 'Analyzes delivery channel readiness matrix configurations, backed footprints, and structural capacity bounds.'],
            ['title' => 'D4 | Country Profile', 'score' => $country->d4_score, 'desc' => 'Measures environmental regulatory landscape continuity, compliance controls, and risk insulation factors.'],
            ['title' => 'D5 | Cost Sensitivity', 'score' => $country->d5_score, 'desc' => 'Calculates financial efficiency indexing metrics, currency fluctuations, and localized rate stability fields.'],
        ] as $dimWidget)
            <div class="card bg-base-100 shadow-md border border-base-200 relative overflow-hidden group hover:shadow-xl hover:border-base-300 transition-all duration-300">
                <div class="card-body p-5 flex flex-col justify-between">
                    <div>
                        <div class="flex items-center justify-between">
                            <span class="text-[10px] font-bold uppercase tracking-widest text-base-content/40">Dimension Indicator</span>
                            <div class="w-7 h-7 rounded-lg bg-base-200 text-primary flex items-center justify-center"><i class="fa-solid fa-circle-nodes text-xs"></i></div>
                        </div>
                        <h4 class="text-xs font-bold text-primary uppercase mt-2">{{ $dimWidget['title'] }}</h4>
                        <p class="text-[11px] text-base-content/50 mt-1 line-clamp-2">{{ $dimWidget['desc'] }}</p>
                    </div>
                    <div class="mt-4 pt-4 border-t border-base-100 flex items-center justify-between">
                        <span class="text-2xl font-extrabold text-neutral-800 tracking-tight">{{ number_format($dimWidget['score'], 2) }} <span class="text-xs font-semibold text-base-content/30">/ 5.00</span></span>
                        <div class="w-24 bg-base-200 h-2 rounded-full overflow-hidden shadow-inner">
                            <div class="bg-primary h-full rounded-full" style="width: {{ ($dimWidget['score'] / 5) * 100 }}%"></div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    {{-- Interactive Presentation View Layout --}}
    <div x-data="{ activePanel: 1 }" class="w-full">
        {{-- Custom Navigation Segment Header Tabs System --}}
        <div class="w-full overflow-x-auto bg-white border border-base-300 p-1.5 rounded-xl mb-6 shadow-sm">
            <div class="flex min-w-[760px] gap-1">
                <button type="button" @click="activePanel = 1" :class="activePanel === 1 ? 'bg-primary text-white shadow-sm' : 'text-neutral hover:bg-base-200/60'" class="flex-1 py-2.5 px-3 rounded-lg text-xs font-bold transition-all duration-150 uppercase tracking-wider text-center cursor-pointer select-none">
                    D1 | Human Capital
                </button>
                <button type="button" @click="activePanel = 2" :class="activePanel === 2 ? 'bg-primary text-white shadow-sm' : 'text-neutral hover:bg-base-200/60'" class="flex-1 py-2.5 px-3 rounded-lg text-xs font-bold transition-all duration-150 uppercase tracking-wider text-center cursor-pointer select-none">
                    D2 | Business Ecosystem
                </button>
                <button type="button" @click="activePanel = 3" :class="activePanel === 3 ? 'bg-primary text-white shadow-sm' : 'text-neutral hover:bg-base-200/60'" class="flex-1 py-2.5 px-3 rounded-lg text-xs font-bold transition-all duration-150 uppercase tracking-wider text-center cursor-pointer select-none">
                    D3 | Operational Profile
                </button>
                <button type="button" @click="activePanel = 4" :class="activePanel === 4 ? 'bg-primary text-white shadow-sm' : 'text-neutral hover:bg-base-200/60'" class="flex-1 py-2.5 px-3 rounded-lg text-xs font-bold transition-all duration-150 uppercase tracking-wider text-center cursor-pointer select-none">
                    D4 | Country Profile
                </button>
                <button type="button" @click="activePanel = 5" :class="activePanel === 5 ? 'bg-primary text-white shadow-sm' : 'text-neutral hover:bg-base-200/60'" class="flex-1 py-2.5 px-3 rounded-lg text-xs font-bold transition-all duration-150 uppercase tracking-wider text-center cursor-pointer select-none">
                    D5 | Cost Sensitivity
                </button>
            </div>
        </div>

        {{-- Main Dashboard Score Grid Content Output Area --}}
        <div class="bg-transparent rounded-xl">

            {{-- DIMENSION 1: PANEL INSULATION SYSTEM --}}
            <div x-show="activePanel === 1" x-transition class="space-y-6">
                {{-- Subsection 1 --}}
                <div class="card bg-base-100 shadow-xl border border-base-200 overflow-hidden animate-fadeIn">
                    <div class="h-1 w-full bg-gradient-to-r from-primary via-accent to-secondary"></div>
                    <div class="card-body p-6 space-y-4">
                        <div class="flex flex-col gap-1 pb-3 border-b border-base-200">
                            <h3 class="text-xs font-bold text-secondary uppercase tracking-wider">1. Educational Level (Pipeline)</h3>
                            <p class="text-[11px] text-base-content/60">Evaluates educational penetration and profile availability based on completed academic level within the local talent pool.</p>
                        </div>
                        <div class="divide-y divide-base-100">
                            @foreach ([
                                '1A. High School / Secondary Education' => 'd1_high_school',
                                '1B. Technical / Vocational Degree' => 'd1_technical',
                                '1C. University Degree (Bachelors)' => 'd1_bachelors',
                                '1D. Postgraduate / Specialization' => 'd1_postgraduate'
                            ] as $label => $field)
                                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 py-3.5 first:pt-0 last:pb-0">
                                    <span class="text-sm font-medium text-neutral-700">{{ $label }}</span>
                                    <div class="flex items-center gap-1">
                                        @for ($i = 1; $i <= 5; $i++)
                                            <span class="w-10 h-10 rounded-full font-bold text-sm flex items-center justify-center border {{ $country->$field == $i ? 'bg-accent text-primary border-accent scale-105 shadow-md ring-2 ring-accent/20' : 'bg-base-50 text-base-content/40 border-base-200' }}">{{ $i }}</span>
                                        @endfor
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                {{-- Subsection 2 --}}
                <div class="card bg-base-100 shadow-xl border border-base-200 overflow-hidden animate-fadeIn">
                    <div class="h-1 w-full bg-gradient-to-r from-primary via-accent to-secondary"></div>
                    <div class="card-body p-6 space-y-4">
                        <div class="flex flex-col gap-1 pb-3 border-b border-base-200">
                            <h3 class="text-xs font-bold text-secondary uppercase tracking-wider">2. Talent Specialization</h3>
                            <p class="text-[11px] text-base-content/60">Evaluate the abundance, graduation rates, and recruitment ease of profiles within your city/country.</p>
                        </div>
                        <div class="divide-y divide-base-100">
                            @foreach ([
                                '2A. CX & Hospitality' => 'd1_cx_hospitality',
                                '2B. STEM & Digital' => 'd1_stem_digital',
                                '2C. Professional Services' => 'd1_professional_services',
                                '2D. Healthcare & Sciences' => 'd1_healthcare_sciences',
                                '2E. Business & Sales' => 'd1_business_sales'
                            ] as $label => $field)
                                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 py-3.5 first:pt-0 last:pb-0">
                                    <span class="text-sm font-medium text-neutral-700">{{ $label }}</span>
                                    <div class="flex items-center gap-1">
                                        @for ($i = 1; $i <= 5; $i++)
                                            <span class="w-10 h-10 rounded-full font-bold text-sm flex items-center justify-center border {{ $country->$field == $i ? 'bg-accent text-primary border-accent scale-105 shadow-md ring-2 ring-accent/20' : 'bg-base-50 text-base-content/40 border-base-200' }}">{{ $i }}</span>
                                        @endfor
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                {{-- Subsection 3 --}}
                <div class="card bg-base-100 shadow-xl border border-base-200 overflow-hidden animate-fadeIn">
                    <div class="h-1 w-full bg-gradient-to-r from-primary via-accent to-secondary"></div>
                    <div class="card-body p-6 space-y-4">
                        <div class="flex flex-col gap-1 pb-3 border-b border-base-200">
                            <h3 class="text-xs font-bold text-secondary uppercase tracking-wider">3. Bilingualism Depth</h3>
                            <p class="text-[11px] text-base-content/60">Indicate the talent pool capability in this country for the following languages.</p>
                        </div>
                        <div class="divide-y divide-base-100">
                            @foreach ([
                                '3A. Spanish' => 'd1_lang_spanish',
                                '3B. English' => 'd1_lang_english',
                                '3C. Portuguese' => 'd1_lang_portuguese',
                                '3D. French' => 'd1_lang_french',
                                '3E. Italian' => 'd1_lang_italian'
                            ] as $label => $field)
                                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 py-3.5 first:pt-0 last:pb-0">
                                    <span class="text-sm font-medium text-neutral-700">{{ $label }}</span>
                                    <div class="flex items-center gap-1">
                                        @for ($i = 1; $i <= 5; $i++)
                                            <span class="w-10 h-10 rounded-full font-bold text-sm flex items-center justify-center border {{ $country->$field == $i ? 'bg-accent text-primary border-accent scale-105 shadow-md ring-2 ring-accent/20' : 'bg-base-50 text-base-content/40 border-base-200' }}">{{ $i }}</span>
                                        @endfor
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        {{-- Section Custom Language Extra Slot Read Only Output --}}
                        <div class="flex flex-col sm:flex-row sm:items-center gap-4 py-3 px-4 bg-base-200/30 rounded-xl border border-base-200/60 text-xs mt-2">
                            <div class="flex-1">
                                <span class="font-semibold text-base-content/80 block mb-0.5">
                                    <i class="fa-solid fa-language text-primary mr-1"></i> 3F. Other Language (Specify)
                                </span>
                                <p class="text-[11px] text-base-content/50">Custom alternative language specifications tracked for regional nodes.</p>
                            </div>
                            <div class="w-full sm:w-72 font-semibold text-sm text-neutral-700 bg-white border border-base-300 rounded-lg px-3 py-1.5 shadow-sm min-h-[34px] flex items-center">
                                {{ $country->d1_lang_others_specify ?? 'None Registered' }}
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Subsection 4 --}}
                <div class="card bg-base-100 shadow-xl border border-base-200 overflow-hidden animate-fadeIn">
                    <div class="h-1 w-full bg-gradient-to-r from-primary via-accent to-secondary"></div>
                    <div class="card-body p-6 space-y-4">
                        <div class="flex flex-col gap-1 pb-3 border-b border-base-200">
                            <h3 class="text-xs font-bold text-secondary uppercase tracking-wider">4. Global Readiness</h3>
                            <p class="text-[11px] text-base-content/60">Evaluate how aligned the local talent is with the business etiquette and culture of the following global markets.</p>
                        </div>
                        <div class="divide-y divide-base-100">
                            @foreach ([
                                '4A. North America (USA/CAN)' => 'd1_global_ready_na',
                                '4B. Europe (UK/EU)' => 'd1_global_ready_eu',
                                '4C. Spain' => 'd1_global_ready_spain',
                                '4D. LATAM (Cross-border)' => 'd1_global_ready_latam',
                                '4E. Asia / Pacific' => 'd1_global_ready_apac'
                            ] as $label => $field)
                                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 py-3.5 first:pt-0 last:pb-0">
                                    <span class="text-sm font-medium text-neutral-700">{{ $label }}</span>
                                    <div class="flex items-center gap-1">
                                        @for ($i = 1; $i <= 5; $i++)
                                            <span class="w-10 h-10 rounded-full font-bold text-sm flex items-center justify-center border {{ $country->$field == $i ? 'bg-accent text-primary border-accent scale-105 shadow-md ring-2 ring-accent/20' : 'bg-base-50 text-base-content/40 border-base-200' }}">{{ $i }}</span>
                                        @endfor
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            {{-- DIMENSION 2: PANEL INSULATION SYSTEM --}}
            <div x-show="activePanel === 2" x-transition class="space-y-6">
                <div class="card bg-base-100 shadow-xl border border-base-200 overflow-hidden animate-fadeIn">
                    <div class="h-1 w-full bg-gradient-to-r from-primary via-accent to-secondary"></div>
                    <div class="card-body p-6 space-y-5">
                        {{-- Group 1 --}}
                        <div class="space-y-3">
                            <div class="flex flex-col gap-1 pb-3 border-b border-base-200">
                                <h3 class="text-xs font-bold text-secondary uppercase tracking-wider">1. Presence of Multinationals</h3>
                                <p class="text-[11px] text-base-content/60">How dense is the presence of global companies (Fortune 500) with operational hubs in the city/country?</p>
                            </div>
                            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 py-1">
                                <span class="text-sm font-medium text-neutral-700">1A. Multinational Corporation Presence</span>
                                <div class="flex items-center gap-1">
                                    @for ($i = 1; $i <= 5; $i++)
                                        <span class="w-10 h-10 rounded-full font-bold text-sm flex items-center justify-center border {{ $country->d2_mnc_presence == $i ? 'bg-accent text-primary border-accent scale-105 shadow-md ring-2 ring-accent/20' : 'bg-base-50 text-base-content/40 border-base-200' }}">{{ $i }}</span>
                                    @endfor
                                </div>
                            </div>
                            <div class="flex flex-col sm:flex-row sm:items-center gap-4 py-3 px-4 bg-base-200/30 rounded-xl border border-base-200/60 text-xs">
                                <div class="flex-1">
                                    <span class="font-semibold text-base-content/80 block mb-0.5">1B. Years of Experience with Multinationals</span>
                                    <p class="text-[11px] text-base-content/50">Historical operations duration baseline metrics.</p>
                                </div>
                                <div class="w-full sm:w-72 font-mono font-bold text-sm text-neutral-700 bg-white border border-base-300 rounded-lg px-3 py-1.5 shadow-sm min-h-[34px] flex items-center justify-end">
                                    {{ $country->d2_mnc_years ?? '0' }} <span class="text-xs font-semibold text-base-content/40 ml-1.5">Years</span>
                                </div>
                            </div>
                        </div>

                        {{-- Group 2 --}}
                        <div class="space-y-3 pt-4">
                            <div class="flex flex-col gap-1 pb-3 border-b border-base-200">
                                <h3 class="text-xs font-bold text-secondary uppercase tracking-wider">2. Regulated Industry Maturity</h3>
                                <p class="text-[11px] text-base-content/60">How robust is the presence of advanced manufacturing or specialized services that generate an expert talent pipeline?</p>
                            </div>
                            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 py-1">
                                <span class="text-sm font-medium text-neutral-700">2A. Maturity in Strictly Regulated Industries</span>
                                <div class="flex items-center gap-1">
                                    @for ($i = 1; $i <= 5; $i++)
                                        <span class="w-10 h-10 rounded-full font-bold text-sm flex items-center justify-center border {{ $country->d2_regulated_industry_maturity == $i ? 'bg-accent text-primary border-accent scale-105 shadow-md ring-2 ring-accent/20' : 'bg-base-50 text-base-content/40 border-base-200' }}">{{ $i }}</span>
                                    @endfor
                                </div>
                            </div>
                            <div class="flex flex-col sm:flex-row sm:items-center gap-4 py-3 px-4 bg-base-200/30 rounded-xl border border-base-200/60 text-xs">
                                <div class="flex-1">
                                    <span class="font-semibold text-base-content/80 block mb-0.5">2B. Years of Experience with Strict Regulations</span>
                                    <p class="text-[11px] text-base-content/50">Sovereign institutional experience parameters.</p>
                                </div>
                                <div class="w-full sm:w-72 font-mono font-bold text-sm text-neutral-700 bg-white border border-base-300 rounded-lg px-3 py-1.5 shadow-sm min-h-[34px] flex items-center justify-end">
                                    {{ $country->d2_regulated_years ?? '0' }} <span class="text-xs font-semibold text-base-content/40 ml-1.5">Years</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- DIMENSION 3: PANEL INSULATION SYSTEM --}}
            <div x-show="activePanel === 3" x-transition class="space-y-6">
                {{-- Subsection 1 --}}
                <div class="card bg-base-100 shadow-xl border border-base-200 overflow-hidden animate-fadeIn">
                    <div class="h-1 w-full bg-gradient-to-r from-primary via-accent to-secondary"></div>
                    <div class="card-body p-6 space-y-4">
                        <div class="flex flex-col gap-1 pb-3 border-b border-b-base-200">
                            <h3 class="text-xs font-bold text-secondary uppercase tracking-wider">1. Channel Readiness Matrix</h3>
                            <p class="text-[11px] text-base-content/60">Evaluate the current capability, infrastructure, and experience of game changers to operate in each of the following channels.</p>
                        </div>
                        <div class="divide-y divide-base-100">
                            @foreach ([
                                '1A. Voice' => 'd3_channel_voice',
                                '1B. Chat & Real-Time Messaging' => 'd3_channel_chat',
                                '1C. Email' => 'd3_channel_email',
                                '1D. Back Office (Case Management)' => 'd3_channel_back_office',
                                '1E. Self-Service & AI Support' => 'd3_channel_self_service',
                                '1F. Video Chat' => 'd3_channel_video_chat'
                            ] as $label => $field)
                                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 py-3.5 first:pt-0 last:pb-0">
                                    <span class="text-sm font-medium text-neutral-700">{{ $label }}</span>
                                    <div class="flex items-center gap-1">
                                        @for ($i = 1; $i <= 5; $i++)
                                            <span class="w-10 h-10 rounded-full font-bold text-sm flex items-center justify-center border {{ $country->$field == $i ? 'bg-accent text-primary border-accent scale-105 shadow-md ring-2 ring-accent/20' : 'bg-base-50 text-base-content/40 border-base-200' }}">{{ $i }}</span>
                                        @endfor
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                {{-- Subsection 2 --}}
                <div class="card bg-base-100 shadow-xl border border-base-200 overflow-hidden animate-fadeIn">
                    <div class="h-1 w-full bg-gradient-to-r from-primary via-accent to-secondary"></div>
                    <div class="card-body p-6 space-y-4">
                        <div class="flex flex-col gap-1 pb-3 border-b border-b-base-200">
                            <h3 class="text-xs font-bold text-secondary uppercase tracking-wider">2. Supported Languages</h3>
                            <p class="text-[11px] text-base-content/60">Indicate the scale of languages currently supported from this Location & the Capacity to Hire.</p>
                        </div>
                        <div class="divide-y divide-base-100">
                            @foreach ([
                                '2A. Spanish' => 'd3_lang_spanish',
                                '2B. English B1' => 'd3_lang_english_b1',
                                '2C. English B2' => 'd3_lang_english_b2',
                                '2D. English C1' => 'd3_lang_english_c1',
                                '2E. Portuguese B1' => 'd3_lang_portuguese_b1',
                                '2F. Portuguese B2' => 'd3_lang_portuguese_b2',
                                '2G. Portuguese C1' => 'd3_lang_portuguese_c1'
                            ] as $label => $field)
                                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 py-3.5 first:pt-0 last:pb-0">
                                    <span class="text-sm font-medium text-neutral-700">{{ $label }}</span>
                                    <div class="flex items-center gap-1">
                                        @for ($i = 0; $i <= 5; $i++)
                                            <span class="w-10 h-10 rounded-full font-bold text-sm flex items-center justify-center border {{ $country->$field == $i ? 'bg-accent text-primary border-accent scale-105 shadow-md ring-2 ring-accent/20' : 'bg-base-50 text-base-content/40 border-base-200' }}">{{ $i }}</span>
                                        @endfor
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="flex flex-col sm:flex-row sm:items-center gap-4 py-3 px-4 bg-base-200/30 rounded-xl border border-base-200/60 text-xs mt-2">
                            <div class="flex-1">
                                <span class="font-semibold text-base-content/80 block mb-0.5"><i class="fa-solid fa-globe text-primary mr-1"></i> 2H. Others:</span>
                                <p class="text-[11px] text-base-content/50">Specify another language supported parameters.</p>
                            </div>
                            <div class="w-full sm:w-72 font-semibold text-sm text-neutral-700 bg-white border border-base-300 rounded-lg px-3 py-1.5 shadow-sm min-h-[34px] flex items-center">
                                {{ $country->d3_lang_others ?? 'None Registered' }}
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Subsection 3 --}}
                <div class="card bg-base-100 shadow-xl border border-base-200 overflow-hidden animate-fadeIn">
                    <div class="h-1 w-full bg-gradient-to-r from-primary via-accent to-secondary"></div>
                    <div class="card-body p-6 space-y-4">
                        <div class="flex flex-col gap-1 pb-3 border-b border-b-base-200">
                            <h3 class="text-xs font-bold text-secondary uppercase tracking-wider">3. Technical Support Maturity (Tech Tiering) / CX</h3>
                            <p class="text-[11px] text-base-content/60">To what level of technical depth does the operation reach on a massive scale?</p>
                        </div>
                        <div class="divide-y divide-base-100">
                            @foreach ([
                                '3A. Customer Experience (CS)' => 'd3_tech_cx',
                                '3B. Sales' => 'd3_tech_sales',
                                '3C. Collections' => 'd3_tech_collections',
                                '3D. Tier 1 (Front Line)' => 'd3_tech_tier1',
                                '3E. Tier 2 (Troubleshooting)' => 'd3_tech_tier2',
                                '3F. Tier 3 (Expert/Engineering)' => 'd3_tech_tier3',
                                '3G. Back Office' => 'd3_tech_back_office',
                                '3H. Consulting' => 'd3_tech_consulting'
                            ] as $label => $field)
                                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 py-3.5 first:pt-0 last:pb-0">
                                    <span class="text-sm font-medium text-neutral-700">{{ $label }}</span>
                                    <div class="flex items-center gap-1">
                                        @for ($i = 0; $i <= 5; $i++)
                                            <span class="w-10 h-10 rounded-full font-bold text-sm flex items-center justify-center border {{ $country->$field == $i ? 'bg-accent text-primary border-accent scale-105 shadow-md ring-2 ring-accent/20' : 'bg-base-50 text-base-content/40 border-base-200' }}">{{ $i }}</span>
                                        @endfor
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="flex flex-col sm:flex-row sm:items-center gap-4 py-3 px-4 bg-base-200/30 rounded-xl border border-base-200/60 text-xs mt-2">
                            <div class="flex-1">
                                <span class="font-semibold text-base-content/80 block mb-0.5"><i class="fa-solid fa-clock-rotate-left text-primary mr-1"></i> 3I. Years of Experience:</span>
                                <p class="text-[11px] text-base-content/50">Operational lineage footprint duration.</p>
                            </div>
                            <div class="w-full sm:w-72 font-mono font-bold text-sm text-neutral-700 bg-white border border-base-300 rounded-lg px-3 py-1.5 shadow-sm min-h-[34px] flex items-center justify-end">
                                {{ $country->d3_tech_years ?? '0' }} <span class="text-xs font-semibold text-base-content/40 ml-1.5">Years</span>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Subsection 4 --}}
                <div class="card bg-base-100 shadow-xl border border-base-200 overflow-hidden animate-fadeIn">
                    <div class="h-1 w-full bg-gradient-to-r from-primary via-accent to-secondary"></div>
                    <div class="card-body p-6 space-y-4">
                        <div class="flex flex-col gap-1 pb-3 border-b border-b-base-200">
                            <h3 class="text-xs font-bold text-secondary uppercase tracking-wider">4. Retention and Stability (Attrition)</h3>
                            <p class="text-[11px] text-base-content/60">What is the historical behavior of personnel turnover in this specific node? Annualized attrition metrics matrix.</p>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 pt-1">
                            @foreach ([
                                '4A. Customer Experience (CS)' => 'd3_attrition_cx',
                                '4B. Technical' => 'd3_attrition_technical',
                                '4C. Back Office' => 'd3_attrition_back_office',
                                '4D. Sales' => 'd3_attrition_sales',
                                '4E. Collections' => 'd3_attrition_collections',
                                '4F. Consulting' => 'd3_attrition_consulting'
                            ] as $label => $field)
                                <div class="flex items-center justify-between py-3 px-4 bg-base-200/30 rounded-xl border border-base-200/60 text-xs">
                                    <span class="font-semibold text-neutral-700">{{ $label }}</span>
                                    <span class="font-mono font-bold text-sm text-neutral-800 bg-white border border-base-200 px-3 py-1 rounded-lg shadow-xs">
                                        {{ number_format((float)($country->$field ?? 0), 1) }}%
                                    </span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                {{-- Subsection 5 --}}
                <div class="card bg-base-100 shadow-xl border border-base-200 overflow-hidden animate-fadeIn">
                    <div class="h-1 w-full bg-gradient-to-r from-primary via-accent to-secondary"></div>
                    <div class="card-body p-6 space-y-4">
                        <div class="flex flex-col gap-1 pb-3 border-b border-b-base-200">
                            <h3 class="text-xs font-bold text-secondary uppercase tracking-wider">5. Supported Markets</h3>
                            <p class="text-[11px] text-base-content/60">Indicate the markets currently served from this Country node parameters.</p>
                        </div>
                        <div class="space-y-2.5">
                            @foreach ([
                                '5A. North America' => 'd3_market_north_america',
                                '5B. EMEA' => 'd3_market_emea',
                                '5C. Latin America' => 'd3_market_latam',
                                '5D. APAC' => 'd3_market_apac',
                                '5E. Local Market' => 'd3_market_local'
                            ] as $label => $field)
                                <div class="flex items-center justify-between py-2.5 px-3 border-b border-base-100 last:border-0 rounded-lg hover:bg-base-200/10">
                                    <span class="text-sm font-semibold text-neutral-700">{{ $label }}</span>
                                    <div class="badge font-bold text-xs px-3 h-6 rounded-md shadow-xs {{ $country->$field ? 'bg-success/10 text-success border-success/20' : 'bg-base-200 text-base-content/30 border-none' }}">
                                        {{ $country->$field ? 'ACTIVE SUPPORT' : 'NOT SIZED' }}
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="flex flex-col sm:flex-row sm:items-center gap-4 py-3 px-4 bg-base-200/30 rounded-xl border border-base-200/60 text-xs mt-2">
                            <div class="flex-1">
                                <span class="font-semibold text-base-content/80 block mb-0.5"><i class="fa-solid fa-timeline text-primary mr-1"></i> 5F. Years of Experience:</span>
                                <p class="text-[11px] text-base-content/50">Strategic market export servicing tenure footprint bounds.</p>
                            </div>
                            <div class="w-full sm:w-72 font-mono font-bold text-sm text-neutral-700 bg-white border border-base-300 rounded-lg px-3 py-1.5 shadow-sm min-h-[34px] flex items-center justify-end">
                                {{ $country->d3_market_years ?? '0' }} <span class="text-xs font-semibold text-base-content/40 ml-1.5">Years</span>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Subsection 6 --}}
                <div class="card bg-base-100 shadow-xl border border-base-200 overflow-hidden animate-fadeIn">
                    <div class="h-1 w-full bg-gradient-to-r from-primary via-accent to-secondary"></div>
                    <div class="card-body p-6 space-y-4">
                        <div class="flex flex-col gap-1 pb-3 border-b border-b-base-200">
                            <h3 class="text-xs font-bold text-secondary uppercase tracking-wider">6. Industry Experience Matrix</h3>
                            <p class="text-[11px] text-base-content/60">Operational experience footprint presence mapping records.</p>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                            @foreach ([
                                '6A. Automotive' => 'd3_vertical_automotive',
                                '6B. BFSI' => 'd3_vertical_bfsi',
                                '6C. Energy & Utilities' => 'd3_vertical_energy',
                                '6D. Government & Public Sector' => 'd3_vertical_government',
                                '6E. Healthcare' => 'd3_vertical_healthcare',
                                '6F. Media & Communications' => 'd3_vertical_media',
                                '6G. Retail & Ecommerce' => 'd3_vertical_retail',
                                '6H. Tech & Consumer Electronics' => 'd3_vertical_tech',
                                '6I. Travel, Transp. & Tourism' => 'd3_vertical_travel'
                            ] as $label => $field)
                                <div class="flex items-center justify-between py-2.5 px-3 border border-base-200 rounded-xl hover:bg-base-200/10">
                                    <span class="text-xs font-bold text-neutral-700 uppercase tracking-wide">{{ $label }}</span>
                                    <div class="badge font-bold text-[10px] px-2.5 h-5 rounded {{ $country->$field ? 'bg-accent/10 text-primary' : 'bg-base-200 text-base-content/30 border-none' }}">
                                        {{ $country->$field ? 'ENGAGED' : 'VACANT' }}
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                {{-- Subsection 7 --}}
                <div class="card bg-base-100 shadow-xl border border-base-200 overflow-hidden animate-fadeIn">
                    <div class="h-1 w-full bg-gradient-to-r from-primary via-accent to-secondary"></div>
                    <div class="card-body p-6 space-y-4">
                        <div class="flex flex-col gap-1 pb-3 border-b border-b-base-200">
                            <h3 class="text-xs font-bold text-secondary uppercase tracking-wider">7. Industries: Years of Experience</h3>
                            <p class="text-[11px] text-base-content/60">Operational duration constraints matching validated business matrix lines.</p>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 pt-1">
                            @foreach ([
                                '7A. Automotive' => 'd3_exp_years_automotive',
                                '7B. BFSI' => 'd3_exp_years_bfsi',
                                '7C. Energy & Utilities' => 'd3_exp_years_energy',
                                '7D. Government & Public Sector' => 'd3_exp_years_government',
                                '7E. Healthcare' => 'd3_exp_years_healthcare',
                                '7F. Media & Communications' => 'd3_exp_years_media',
                                '7G. Retail & Ecommerce' => 'd3_exp_years_retail',
                                '7H. Tech & Consumer Electronics' => 'd3_exp_years_tech',
                                '7I. Travel, Transp. & Tourism' => 'd3_exp_years_travel'
                            ] as $label => $field)
                                <div class="flex flex-col gap-1 py-2.5 px-3 bg-base-200/20 rounded-xl border border-base-200/60">
                                    <span class="text-[11px] font-bold text-neutral-600 uppercase tracking-tight">{{ $label }}</span>
                                    <div class="font-mono font-extrabold text-sm text-primary mt-0.5">
                                        {{ $country->$field ?? '0' }} <span class="text-[10px] font-medium text-base-content/40">Yrs</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                {{-- Subsection 8 --}}
                <div class="card bg-base-100 shadow-xl border border-base-200 overflow-hidden animate-fadeIn">
                    <div class="h-1 w-full bg-gradient-to-r from-primary via-accent to-secondary"></div>
                    <div class="card-body p-6 space-y-4">
                        <div class="flex flex-col gap-1 pb-3 border-b border-b-base-200">
                            <h3 class="text-xs font-bold text-secondary uppercase tracking-wider">8. Infrastructure (Seat Capacity)</h3>
                            <p class="text-[11px] text-base-content/60">Physical footprint capacity configuration parameters logged inside the system framework.</p>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 pt-1">
                            @foreach ([
                                '8A. Current Installed Capacity' => 'd3_total_installed_capacity',
                                '8B. Growth Availability' => 'd3_growth_availability',
                                '8C. Covered Sites Count' => 'd3_sites_count',
                                '8D. Site Locations & Names' => 'd3_site_locations'
                            ] as $label => $field)
                                <div class="flex flex-col gap-1 py-3 px-4 bg-base-200/30 rounded-xl border border-base-200/60">
                                    <span class="font-bold text-xs text-base-content/80"><i class="fa-solid fa-building text-primary/70 mr-1.5"></i>{{ $label }}</span>
                                    <div class="text-sm font-semibold text-neutral-700 mt-1 min-h-[20px]">
                                        {{ $country->$field ?? 'Not Documented' }}
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            {{-- DIMENSION 4: PANEL INSULATION SYSTEM --}}
            <div x-show="activePanel === 4" x-transition class="space-y-6">
                {{-- Subsection 1 --}}
                <div class="card bg-base-100 shadow-xl border border-base-200 overflow-hidden animate-fadeIn">
                    <div class="h-1 w-full bg-gradient-to-r from-primary via-accent to-secondary"></div>
                    <div class="card-body p-6 space-y-4">
                        <div class="flex flex-col gap-1 pb-3 border-b border-base-200">
                            <h3 class="text-xs font-bold text-secondary uppercase tracking-wider">1. Operational Stability & Country Risk</h3>
                            <p class="text-[11px] text-base-content/60">Evaluate the level of security and business continuity provided by the environment for the operation.</p>
                        </div>
                        <div class="divide-y divide-base-100">
                            @foreach ([
                                '1A. Political Stability: Evaluation of government changes, strikes, or disturbances affecting the site.' => 'd4_political_stability',
                                '1B. Legal Security: Respect for contracts, clear labor laws, and stable tax incentives.' => 'd4_legal_security',
                                '1C. Physical Security: Security level in the site area for employees and assets.' => 'd4_physical_security',
                                '1D. Economic Stability: Inflation control and volatility of the local currency against the dollar/euro.' => 'd4_economic_stability'
                            ] as $label => $field)
                                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 py-3.5 first:pt-0 last:pb-0">
                                    <span class="text-xs font-semibold text-neutral-700 max-w-xl">{{ $label }}</span>
                                    <div class="flex items-center gap-1">
                                        @for ($i = 1; $i <= 5; $i++)
                                            <span class="w-10 h-10 rounded-full font-bold text-sm flex items-center justify-center border {{ $country->$field == $i ? 'bg-accent text-primary border-accent scale-105 shadow-md ring-2 ring-accent/20' : 'bg-base-50 text-base-content/40 border-base-200' }}">{{ $i }}</span>
                                        @endfor
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                {{-- Subsection 2 --}}
                <div class="card bg-base-100 shadow-xl border border-base-200 overflow-hidden animate-fadeIn">
                    <div class="h-1 w-full bg-gradient-to-r from-primary via-accent to-secondary"></div>
                    <div class="card-body p-6 space-y-4">
                        <div class="flex flex-col gap-1 pb-3 border-b border-base-200">
                            <h3 class="text-xs font-bold text-secondary uppercase tracking-wider">2. International Perception</h3>
                            <p class="text-[11px] text-base-content/60">How is the country perceived by foreign investors in terms of reputation, country brand, and ease of doing business?</p>
                        </div>
                        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 py-1">
                            <span class="text-sm font-medium text-neutral-700">2A. International Perception Index</span>
                            <div class="flex items-center gap-1">
                                @for ($i = 1; $i <= 5; $i++)
                                    <span class="w-10 h-10 rounded-full font-bold text-sm flex items-center justify-center border {{ $country->d4_international_perception == $i ? 'bg-accent text-primary border-accent scale-105 shadow-md ring-2 ring-accent/20' : 'bg-base-50 text-base-content/40 border-base-200' }}">{{ $i }}</span>
                                @endfor
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Subsection 3 --}}
                <div class="card bg-base-100 shadow-xl border border-base-200 overflow-hidden animate-fadeIn">
                    <div class="h-1 w-full bg-gradient-to-r from-primary via-accent to-secondary"></div>
                    <div class="card-body p-6 space-y-4">
                        <div class="flex flex-col gap-1 pb-3 border-b border-base-200">
                            <h3 class="text-xs font-bold text-secondary uppercase tracking-wider">3. Compliance and Data Protection</h3>
                            <p class="text-[11px] text-base-content/60">How aligned are local laws and site standards with international security regulations (GDPR, HIPAA, PCI)?</p>
                        </div>
                        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 py-1">
                            <span class="text-sm font-medium text-neutral-700">3A. Compliance & Data Protection Rubric</span>
                            <div class="flex items-center gap-1">
                                @for ($i = 1; $i <= 5; $i++)
                                    <span class="w-10 h-10 rounded-full font-bold text-sm flex items-center justify-center border {{ $country->d4_compliance_data_protection == $i ? 'bg-accent text-primary border-accent scale-105 shadow-md ring-2 ring-accent/20' : 'bg-base-50 text-base-content/40 border-base-200' }}">{{ $i }}</span>
                                @endfor
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- DIMENSION 5: PANEL INSULATION SYSTEM --}}
            <div x-show="activePanel === 5" x-transition class="space-y-6">
                <div class="card bg-base-100 shadow-xl border border-base-200 overflow-hidden animate-fadeIn">
                    <div class="h-1 w-full bg-gradient-to-r from-primary via-accent to-secondary"></div>
                    <div class="card-body p-6 space-y-4">
                        <div class="flex flex-col gap-1 pb-3 border-b border-base-200">
                            <h3 class="text-xs font-bold text-secondary uppercase tracking-wider">1. Total Labor Cost Index</h3>
                            <p class="text-[11px] text-base-content/60">How would you evaluate the cost of operating a site for the client in this country?</p>
                        </div>
                        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 py-1">
                            <span class="text-sm font-medium text-neutral-700">1A. Total Labor Cost Index</span>
                            <div class="flex items-center gap-1">
                                @for ($i = 1; $i <= 5; $i++)
                                    <span class="w-10 h-10 rounded-full font-bold text-sm flex items-center justify-center border {{ $country->d5_labor_cost_index == $i ? 'bg-accent text-primary border-accent scale-105 shadow-md ring-2 ring-accent/20' : 'bg-base-50 text-base-content/40 border-base-200' }}">{{ $i }}</span>
                                @endfor
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card bg-base-100 shadow-xl border border-base-200 overflow-hidden animate-fadeIn">
                    <div class="h-1 w-full bg-gradient-to-r from-primary via-accent to-secondary"></div>
                    <div class="card-body p-6 space-y-4">
                        <div class="flex flex-col gap-1 pb-3 border-b border-base-200">
                            <h3 class="text-xs font-bold text-secondary uppercase tracking-wider">2. Currency Stability and Inflationary Risk</h3>
                            <p class="text-[11px] text-base-content/60">How protected is the client's rate against devaluations or uncontrolled inflation in the country?</p>
                        </div>
                        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 py-1">
                            <span class="text-sm font-medium text-neutral-700">2B. Currency & Inflation Risk</span>
                            <div class="flex items-center gap-1">
                                @for ($i = 1; $i <= 5; $i++)
                                    <span class="w-10 h-10 rounded-full font-bold text-sm flex items-center justify-center border {{ $country->d5_currency_inflation_risk == $i ? 'bg-accent text-primary border-accent scale-105 shadow-md ring-2 ring-accent/20' : 'bg-base-50 text-base-content/40 border-base-200' }}">{{ $i }}</span>
                                @endfor
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-layouts.guest>