<x-layouts.guest>

    <x-cards.hero title="LATAM Strategic Selection Engine"
        subtitle="Strategic framework for operational readiness and risk assessment." />

    <div
        class="grid centered grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 justify-center max-w-7xl mx-auto px-4 py-6">
        @isset($countries)
            @forelse($countries as $country)
                <a href="{{ route('countries.show', $country) }}"
                    class="block transition-all hover:scale-[1.02] duration-200">
                    <x-cards.country-cards :countryCode="$country->iso_code" :countryName="$country->country_name" :location="$country->site_region" />
                </a>
            @empty
                <div class="col-span-full py-16 text-center bg-base-100/50 border border-dashed border-base-300 rounded-2xl">
                    <div class="flex flex-col items-center gap-3 text-base-content/30 select-none">
                        <i class="fa-solid fa-earth-americas text-4xl"></i>
                        <p class="text-sm font-medium">No active strategic country node profiles found in records.</p>
                        @auth
                            <a href="{{ route('countries.create') }}" class="btn btn-primary btn-sm mt-2 rounded-lg">
                                <i class="fa-solid fa-plus"></i> Ingest First Node
                            </a>
                        @endauth
                    </div>
                </div>
            @endforelse
        @else
            <div class="col-span-full py-16 text-center bg-base-100/50 border border-dashed border-base-300 rounded-2xl">
                <div class="flex flex-col items-center gap-3 text-base-content/30 select-none">
                    <i class="fa-solid fa-exclamation text-4xl"></i>
                    <p class="text-sm font-medium">UPPS Error loanding the data. Please contact support.</p>
                </div>
            </div>
        @endisset
    </div>

</x-layouts.guest>
