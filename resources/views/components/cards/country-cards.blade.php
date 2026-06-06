       @props([
           'countryCode' => 'cr',
           'countryName' => 'Costa Rica',
           'location' => 'San José',
       ])
       <div
           class="card w-96 bg-base-100 card-md shadow-sm relative overflow-hidden group hover:shadow-md transition-all duration-300">

           <div
               class="absolute -right-4 -top-4 w-40 opacity-20 z-0 pointer-events-none select-none transform rotate-12 group-hover:scale-110 transition-transform duration-500">
               <img src="https://flagcdn.com/192x144/{{ $countryCode }}.png" alt="{{ $countryName }}"
                   class="w-full rounded-lg h-auto object-contain">
           </div>

           <div class="card-body z-10 relative">
               <!-- Top Badge Row -->
               <div class="flex items-center justify-between mb-2">
                   <span
                       class="text-xs font-mono font-bold text-secondary bg-accent/10 px-2.5 py-1 rounded-md tracking-wider">
                       {{ strtoupper($countryCode) }}
                   </span>
               </div>

               <!-- Title & Location -->
               <div class="mb-5">
                   <h2 class="text-xl font-extrabold text-neutral tracking-tight">{{ $countryName }}</h2>
                   <p class="text-sm text-neutral-500 flex items-center gap-1 mt-0.5">
                       <i class="fas fa-map-marker-alt text-accent"></i>
                       {{ $location }} Site
                   </p>
               </div>

               <!-- Action Button -->
               <div class="card-actions mt-auto">
                   <button class="btn btn-block btn-accent text-primary font-semibold shadow-sm hover:btn-active">
                       View Details <i class="fas fa-arrow-right ml-2"></i>
                   </button>
               </div>
           </div>
       </div>
