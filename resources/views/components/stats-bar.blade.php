@props(['stats'])

@if(isset($stats) && count($stats) > 0)
<section class="bg-slate-950 text-white border-y border-slate-800/80 py-12 relative overflow-hidden">
    {{-- Soft Ambient Glow --}}
    <div class="absolute -left-20 top-1/2 -translate-y-1/2 w-72 h-72 bg-yellow-400/10 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute -right-20 top-1/2 -translate-y-1/2 w-72 h-72 bg-yellow-400/10 rounded-full blur-3xl pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-6 sm:px-8 lg:px-12 relative z-10">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 divide-y sm:divide-y-0 sm:divide-x divide-slate-800/70">
            @foreach($stats as $index => $stat)
            <div class="pt-6 sm:pt-0 sm:px-6 first:pl-0 last:pr-0 group transition-all duration-300">
                <div class="space-y-1">
                    <div class="flex items-baseline gap-1">
                        <span class="text-4xl sm:text-5xl font-black text-yellow-400 font-heading tracking-tight drop-shadow-sm group-hover:text-yellow-300 transition-colors">
                            {{ $stat->value }}
                        </span>
                    </div>
                    <h3 class="text-xs font-extrabold text-white uppercase tracking-wider font-heading leading-snug">
                        {{ $stat->label }}
                    </h3>
                    @if($stat->description)
                    <p class="text-[11px] text-slate-400 font-medium leading-relaxed pt-0.5">
                        {{ $stat->description }}
                    </p>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif
