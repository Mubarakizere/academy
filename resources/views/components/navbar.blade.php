{{-- ====== TOP MINI ANNOUNCEMENT & CALL BAR ====== --}}
<div class="bg-slate-950 text-slate-300 py-2 px-4 text-xs border-b border-slate-800/80">
    <div class="max-w-7xl mx-auto flex flex-col sm:flex-row items-center justify-between gap-2">
        <div class="flex items-center gap-3 text-[11px] font-medium tracking-wide">
            <span class="inline-flex items-center gap-1.5 bg-amber-400/15 text-amber-300 px-2.5 py-0.5 rounded-full border border-amber-400/30 font-semibold text-[10px] uppercase tracking-wider">
                <span class="w-1.5 h-1.5 rounded-full bg-amber-400 animate-pulse"></span>
                <span>Applications Open</span>
            </span>
            <span class="hidden md:inline text-slate-400">|</span>
            <span class="hidden md:inline text-slate-300">Intake ongoing in Kigali (Rwanda), Nairobi & Mombasa (Kenya)</span>
        </div>

        <div class="flex items-center gap-4 text-[11px] font-semibold text-slate-300">
            <a href="tel:+250780159059" class="hover:text-amber-400 transition-colors flex items-center gap-1">
                <span class="text-slate-500 font-normal">RW:</span>
                <span>+250 780 159 059</span>
            </a>
            <span class="text-slate-700">|</span>
            <a href="tel:+254118465054" class="hover:text-amber-400 transition-colors flex items-center gap-1">
                <span class="text-slate-500 font-normal">KE:</span>
                <span>+254 118 465 054</span>
            </a>
        </div>
    </div>
</div>

{{-- ====== MAIN NAVBAR ====== --}}
<nav x-data="{ open: false, scrolled: false }"
    @scroll.window="scrolled = (window.pageYOffset > 20)"
    :class="scrolled ? 'shadow-md bg-white/95 backdrop-blur-xl border-b border-slate-200/90' : 'bg-white/90 backdrop-blur-md border-b border-slate-200/60 shadow-xs'"
    class="sticky top-0 inset-x-0 z-50 transition-all duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-20">

            {{-- Logo & Brand --}}
            <a href="{{ route('home') }}" class="flex items-center gap-3.5 group relative py-1">
                <div class="relative">
                    <img src="{{ asset('images/logo.png') }}" alt="Diva House Beauty Academy Logo"
                        class="h-11 w-auto object-contain transition-all duration-300 group-hover:scale-105 group-hover:drop-shadow-md">
                </div>
                <div class="flex flex-col">
                    <div class="flex items-center gap-1.5">
                        <span class="text-lg font-extrabold text-slate-900 tracking-wider font-heading leading-tight group-hover:text-amber-600 transition-colors">
                            DIVA HOUSE
                        </span>
                    </div>
                    <span class="text-[10px] font-extrabold uppercase tracking-[0.22em] text-amber-600 group-hover:text-slate-900 transition-colors">
                        Beauty Academy
                    </span>
                </div>
            </a>

            {{-- Desktop Navigation Links --}}
            <div class="hidden md:flex items-center gap-1.5 p-1 bg-slate-100/70 rounded-full border border-slate-200/60 shadow-inner">
                {{-- Home Link --}}
                <a href="{{ route('home') }}"
                    class="relative px-4 py-2 rounded-full text-xs font-bold tracking-wide transition-all duration-200 flex items-center gap-1.5 {{ request()->routeIs('home') ? 'bg-slate-950 text-white shadow-md shadow-slate-950/20' : 'text-slate-600 hover:text-slate-950 hover:bg-white/80' }}">
                    <svg class="w-3.5 h-3.5 opacity-80" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                    </svg>
                    <span>Home</span>
                </a>

                {{-- Courses Link --}}
                <a href="{{ route('courses') }}"
                    class="relative px-4 py-2 rounded-full text-xs font-bold tracking-wide transition-all duration-200 flex items-center gap-1.5 {{ request()->routeIs('courses') ? 'bg-slate-950 text-white shadow-md shadow-slate-950/20' : 'text-slate-600 hover:text-slate-950 hover:bg-white/80' }}">
                    <span>Academy Programs</span>
                </a>

                {{-- Campuses Link --}}
                <a href="{{ route('campuses') }}"
                    class="relative px-4 py-2 rounded-full text-xs font-bold tracking-wide transition-all duration-200 flex items-center gap-1.5 {{ request()->routeIs('campuses') ? 'bg-slate-950 text-white shadow-md shadow-slate-950/20' : 'text-slate-600 hover:text-slate-950 hover:bg-white/80' }}">
                    <span>Campuses</span>
                    <span class="text-[9px] font-extrabold uppercase bg-amber-200 text-amber-900 px-1.5 py-0.2 rounded-full">RW/KE</span>
                </a>

                {{-- Search Certificate Link --}}
                <a href="{{ route('search.certificate') }}"
                    class="relative px-4 py-2 rounded-full text-xs font-bold tracking-wide transition-all duration-200 flex items-center gap-1.5 {{ request()->routeIs('search.certificate') ? 'bg-amber-400 text-slate-950 font-black shadow-md' : 'text-slate-700 hover:text-slate-950 hover:bg-white/80' }}">
                    <svg class="w-3.5 h-3.5 text-amber-600" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                    </svg>
                    <span>Search Certificate</span>
                </a>
            </div>

            {{-- Desktop Actions (Login / Apply) --}}
            <div class="hidden md:flex items-center gap-3">
                <a href="{{ route('login') }}"
                    class="group text-xs font-extrabold uppercase tracking-wider text-slate-800 hover:text-slate-950 px-4 py-2.5 rounded-full border border-slate-300/90 hover:border-slate-950 hover:bg-slate-100/70 transition-all duration-200 flex items-center gap-2">
                    <svg class="w-4 h-4 text-slate-600 group-hover:text-slate-950 transition-colors" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9" />
                    </svg>
                    <span>Student Portal</span>
                </a>

                <a href="{{ route('apply') }}"
                    class="group text-xs font-extrabold uppercase tracking-wider text-slate-950 bg-gradient-to-r from-yellow-400 via-amber-400 to-yellow-400 hover:from-yellow-300 hover:to-amber-300 px-5 py-2.5 rounded-full transition-all duration-300 shadow-md hover:shadow-lg shadow-amber-400/25 hover:shadow-amber-400/40 hover:-translate-y-0.5 active:translate-y-0 flex items-center gap-2 border border-amber-300/80">
                    <span>Apply for Intake</span>
                    <svg class="w-3.5 h-3.5 text-slate-950 transform group-hover:translate-x-1 transition-transform duration-200" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                    </svg>
                </a>
            </div>

            {{-- Mobile Menu Button --}}
            <button @click="open = !open"
                class="md:hidden p-2.5 rounded-full text-slate-800 bg-slate-100 hover:bg-slate-200 focus:outline-none transition-colors border border-slate-200/80 shadow-xs"
                aria-label="Toggle Navigation Menu">
                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path x-show="!open" stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    <path x-show="open" x-cloak stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        {{-- Mobile Drawer Menu --}}
        <div x-show="open" x-cloak x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 -translate-y-2"
            x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="opacity-100 translate-y-0"
            x-transition:leave-end="opacity-0 -translate-y-2"
            class="md:hidden pb-6 space-y-2 pt-3 border-t border-slate-200/80">
            <a href="{{ route('home') }}"
                class="block py-3 px-4 rounded-2xl text-sm font-bold transition-all {{ request()->routeIs('home') ? 'bg-slate-950 text-white shadow-md' : 'text-slate-700 hover:bg-slate-100' }}">
                Home
            </a>

            <a href="{{ route('courses') }}"
                class="block py-3 px-4 rounded-2xl text-sm font-bold transition-all {{ request()->routeIs('courses') ? 'bg-slate-950 text-white shadow-md' : 'text-slate-700 hover:bg-slate-100' }}">
                Academy Programs
            </a>

            <a href="{{ route('campuses') }}"
                class="flex items-center justify-between py-3 px-4 rounded-2xl text-sm font-bold transition-all {{ request()->routeIs('campuses') ? 'bg-slate-950 text-white shadow-md' : 'text-slate-700 hover:bg-slate-100' }}">
                <span>East Africa Campuses</span>
                <span class="text-[10px] uppercase font-extrabold bg-amber-400 text-slate-950 px-2 py-0.5 rounded-full">Kigali / Nairobi / Mombasa</span>
            </a>

            <a href="{{ route('certifications') }}"
                class="block py-3 px-4 rounded-2xl text-sm font-bold transition-all {{ request()->routeIs('certifications') ? 'bg-slate-950 text-white shadow-md' : 'text-slate-700 hover:bg-slate-100' }}">
                Accreditation
            </a>

            <a href="{{ route('search.certificate') }}"
                class="flex items-center justify-between py-3 px-4 rounded-2xl text-sm font-bold transition-all {{ request()->routeIs('search.certificate') ? 'bg-amber-400 text-slate-950 font-black shadow-md' : 'text-slate-700 hover:bg-slate-100' }}">
                <div class="flex items-center gap-2">
                    <svg class="w-4 h-4 text-amber-600" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                    </svg>
                    <span>Search Alumni Certificates</span>
                </div>
                <span class="text-[10px] uppercase font-extrabold bg-slate-900 text-amber-400 px-2 py-0.5 rounded-full">Instant</span>
            </a>

            <div class="pt-4 grid grid-cols-2 gap-2 px-1">
                <a href="{{ route('login') }}"
                    class="block py-3 px-3 rounded-xl text-xs font-extrabold uppercase tracking-wider text-slate-900 text-center border border-slate-300 hover:bg-slate-50 transition-colors">
                    Student Portal
                </a>

                <a href="{{ route('apply') }}"
                    class="block py-3 px-3 rounded-xl text-xs font-extrabold uppercase tracking-wider text-slate-950 bg-gradient-to-r from-yellow-400 to-amber-400 text-center hover:from-yellow-300 hover:to-amber-300 transition-colors shadow-md">
                    Apply for Intake →
                </a>
            </div>
        </div>
    </div>
</nav>
