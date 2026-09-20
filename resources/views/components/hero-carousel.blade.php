@props(['carousels'])

@if(isset($carousels) && count($carousels) > 0)
<section x-data="{
    active: 0,
    total: {{ count($carousels) }},
    timer: null,
    duration: 5000,
    init() {
        this.startTimer();
    },
    startTimer() {
        this.stopTimer();
        this.timer = setInterval(() => {
            this.next();
        }, this.duration);
    },
    stopTimer() {
        if (this.timer) {
            clearInterval(this.timer);
            this.timer = null;
        }
    },
    goTo(i) {
        this.active = i;
        this.startTimer();
    },
    next() {
        this.active = (this.active + 1) % this.total;
        this.startTimer();
    },
    prev() {
        this.active = (this.active - 1 + this.total) % this.total;
        this.startTimer();
    }
}"
class="relative w-full h-[calc(85vh-80px)] min-h-[520px] max-h-[750px] overflow-hidden bg-neutral-950 text-white select-none"
id="hero-carousel">

    {{-- Slides Container --}}
    @foreach($carousels as $index => $slide)
    <div
        x-show="active === {{ $index }}"
        x-transition:enter="transition ease-out duration-700"
        x-transition:enter-start="opacity-0 scale-105"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-500"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95"
        class="absolute inset-0 w-full h-full"
        @if($index !== 0) x-cloak @endif
    >
        {{-- Background Image --}}
        <img src="{{ asset($slide->image) }}" alt="{{ $slide->title }}"
            class="absolute inset-0 w-full h-full object-cover object-center"
            loading="eager">

        {{-- Dark Gradient Overlays for Readability --}}
        <div class="absolute inset-0 bg-black/30"></div>
        <div class="absolute inset-0 bg-gradient-to-r from-black/80 via-black/40 to-transparent"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-black/20"></div>

        {{-- Slide Content --}}
        <div class="relative h-full max-w-7xl mx-auto px-6 sm:px-12 lg:px-16 flex flex-col justify-center py-16 z-10">
            <div class="max-w-2xl space-y-5">
                @if($slide->badge)
                <div class="inline-flex items-center gap-2 bg-yellow-400 text-neutral-950 px-4 py-1.5 rounded-full text-xs font-black uppercase tracking-wider shadow-lg">
                    <span class="w-2 h-2 rounded-full bg-neutral-950 animate-pulse"></span>
                    <span>{{ $slide->badge }}</span>
                </div>
                @endif

                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-black font-heading text-white tracking-tight leading-tight drop-shadow-md">
                    {{ $slide->title }}
                </h1>

                @if($slide->subtitle)
                <p class="text-neutral-200 text-sm sm:text-base max-w-lg font-medium leading-relaxed drop-shadow-sm">
                    {{ $slide->subtitle }}
                </p>
                @endif

                <div class="pt-4 flex flex-wrap items-center gap-4">
                    <a href="{{ $slide->button_link }}"
                        class="group bg-yellow-400 hover:bg-yellow-300 text-neutral-950 font-black text-xs uppercase tracking-wider px-7 py-3.5 rounded-full transition-all duration-300 shadow-xl flex items-center gap-2.5 hover:-translate-y-0.5">
                        <span>{{ $slide->button_text }}</span>
                        <svg class="w-4 h-4 transition-transform duration-300 group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                        </svg>
                    </a>

                    <a href="{{ route('campuses') }}"
                        class="bg-white/10 hover:bg-white/20 text-white backdrop-blur-md font-bold text-xs uppercase tracking-wider px-6 py-3.5 rounded-full border border-white/20 hover:border-white/40 transition-all duration-300 flex items-center gap-2">
                        <span>Kigali & Nairobi Hubs</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    {{-- Left / Right Navigation Arrows --}}
    @if(count($carousels) > 1)
    <button @click="prev()"
        class="absolute left-4 sm:left-8 top-1/2 -translate-y-1/2 z-20 w-12 h-12 rounded-full bg-black/40 hover:bg-yellow-400 hover:text-black backdrop-blur-md border border-white/20 text-white flex items-center justify-center transition-all duration-300 cursor-pointer shadow-lg hover:scale-110"
        aria-label="Previous slide">
        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
        </svg>
    </button>

    <button @click="next()"
        class="absolute right-4 sm:right-8 top-1/2 -translate-y-1/2 z-20 w-12 h-12 rounded-full bg-black/40 hover:bg-yellow-400 hover:text-black backdrop-blur-md border border-white/20 text-white flex items-center justify-center transition-all duration-300 cursor-pointer shadow-lg hover:scale-110"
        aria-label="Next slide">
        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
        </svg>
    </button>
    @endif

    {{-- Bottom Dot Indicators --}}
    <div class="absolute bottom-6 sm:bottom-8 inset-x-0 z-30 flex justify-center items-center gap-3">
        @foreach($carousels as $index => $slide)
        <button @click="goTo({{ $index }})"
            class="h-3 rounded-full transition-all duration-500 cursor-pointer focus:outline-none"
            :class="active === {{ $index }} ? 'w-10 bg-yellow-400' : 'w-3 bg-white/40 hover:bg-white/70'"
            aria-label="Go to slide {{ $index + 1 }}">
        </button>
        @endforeach
    </div>

    {{-- Slide Counter --}}
    <div class="absolute top-6 right-6 sm:top-8 sm:right-10 z-20 flex items-center gap-2 bg-black/40 backdrop-blur-md text-white px-4 py-1.5 rounded-full border border-white/15 text-xs font-black tracking-wider">
        <span x-text="String(active + 1).padStart(2, '0')">01</span>
        <span class="text-white/40">/</span>
        <span class="text-white/60">{{ str_pad(count($carousels), 2, '0', STR_PAD_LEFT) }}</span>
    </div>
</section>
@endif
