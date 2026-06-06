<x-layouts.guest>

    <!-- hero -->
    <x-cards.hero title="LATAM Strategic Selection Engine" subtitle="Strategic framework for operational readiness and risk assessment." />
    <!-- ./hero -->

    <!-- country cards -->
    <div class="grid centered grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 justify-center">
        <x-cards.country-cards countryCode="cr" countryName="Costa Rica" location="San José" />
        <x-cards.country-cards countryCode="cl" countryName="Chile" location="Santiago" />
        <x-cards.country-cards countryCode="mx" countryName="Mexico" location="Mexico City" />
    </div>
    <!-- ./country cards -->

</x-layouts.guest>
