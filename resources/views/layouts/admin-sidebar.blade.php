@php
    $currentRoute = request()->route()?->getName() ?? '';
@endphp

<style>
    /* Curved Inverted Notch matching clean light content canvas (#F8FAFC) */
    .sidebar-active-notch {
        position: relative;
        background-color: #F8FAFC !important; /* Matches main page bg-slate-50 */
        border-top-left-radius: 1.75rem;
        border-bottom-left-radius: 1.75rem;
    }
    .sidebar-active-notch::before {
        content: '';
        position: absolute;
        top: -20px;
        right: 0;
        width: 20px;
        height: 20px;
        background-color: transparent;
        border-bottom-right-radius: 20px;
        box-shadow: 8px 8px 0 8px #F8FAFC;
        pointer-events: none;
        z-index: 10;
    }
    .sidebar-active-notch::after {
        content: '';
        position: absolute;
        bottom: -20px;
        right: 0;
        width: 20px;
        height: 20px;
        background-color: transparent;
        border-top-right-radius: 20px;
        box-shadow: 8px -8px 0 8px #F8FAFC;
        pointer-events: none;
        z-index: 10;
    }
</style>

<div class="h-full bg-white text-slate-800 flex flex-col justify-between shadow-xl select-none font-sans border-r border-slate-200/80 transition-all duration-300 ease-in-out"
    :class="sidebarCollapsed ? 'w-20' : 'w-64'">
    
    <div class="flex flex-col h-full overflow-y-auto custom-scrollbar">
        
        {{-- 1. Brand Logo Header & Collapse Toggle Button --}}
        <div class="p-4 pb-3 flex items-center justify-between border-b border-slate-100">
            <a href="{{ route('admin.applications') }}" class="flex items-center gap-3 group overflow-hidden">
                <div class="w-10 h-10 rounded-full bg-slate-900 text-amber-400 flex items-center justify-center font-black text-sm shadow-md group-hover:scale-105 transition-transform shrink-0">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-5 h-5 object-contain">
                </div>
                <div x-show="!sidebarCollapsed" x-transition.opacity.duration.200ms class="min-w-0">
                    <h2 class="text-xs font-black tracking-widest text-slate-900 uppercase font-heading leading-tight truncate">DIVA HOUSE</h2>
                    <span class="text-[9px] font-bold tracking-widest text-amber-600 uppercase block leading-tight truncate">ACADEMY ADMIN</span>
                </div>
            </a>
            
            <div class="flex items-center gap-1">
                {{-- Desktop Collapse Toggle Button --}}
                <button @click="sidebarCollapsed = !sidebarCollapsed"
                    class="hidden lg:flex p-1.5 rounded-xl text-slate-400 hover:text-slate-800 hover:bg-slate-100 transition"
                    :title="sidebarCollapsed ? 'Expand Sidebar' : 'Collapse Sidebar'">
                    <svg class="w-5 h-5 transition-transform duration-300" :class="sidebarCollapsed ? 'rotate-180' : ''" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M18.75 19.5l-7.5-7.5 7.5-7.5m-6 15L5.25 12l7.5-7.5" />
                    </svg>
                </button>

                {{-- Mobile Close Button --}}
                <button @click="sidebarOpen = false" class="lg:hidden text-slate-400 hover:text-slate-800 p-1">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>

        {{-- 2. Navigation Menu Items (Exact Sample Layout with Collapsible Adapters) --}}
        <nav class="flex-1 pl-3 py-3 space-y-1 overflow-x-hidden">

            {{-- DASHBOARD --}}
            @php $isActive = $currentRoute === 'admin.dashboard'; @endphp
            <a href="{{ Route::has('admin.dashboard') ? route('admin.dashboard') : '#' }}"
                title="DASHBOARD"
                class="flex items-center gap-3.5 py-3 rounded-l-2xl text-xs font-bold transition-all duration-200 {{ $isActive ? 'sidebar-active-notch text-orange-500' : 'text-slate-500 hover:text-slate-900 hover:bg-slate-50' }}"
                :class="sidebarCollapsed ? 'px-2 justify-center' : 'px-4'">
                <div class="w-9 h-9 rounded-full flex items-center justify-center transition-transform shrink-0 {{ $isActive ? 'bg-orange-500 text-white shadow-lg shadow-orange-500/40 scale-105' : 'bg-slate-100 text-slate-700' }}">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                    </svg>
                </div>
                <span x-show="!sidebarCollapsed" x-transition.opacity.duration.150ms class="tracking-wider uppercase text-[11px] font-extrabold whitespace-nowrap">DASHBOARD</span>
            </a>

            {{-- APPLICATIONS --}}
            @php $isActive = request()->routeIs('admin.applications'); @endphp
            <a href="{{ route('admin.applications') }}"
                title="APPLICATIONS"
                class="flex items-center gap-3.5 py-3 rounded-l-2xl text-xs font-bold transition-all duration-200 {{ $isActive ? 'sidebar-active-notch text-amber-500' : 'text-slate-500 hover:text-slate-900 hover:bg-slate-50' }}"
                :class="sidebarCollapsed ? 'px-2 justify-center' : 'px-4'">
                <div class="w-9 h-9 rounded-full flex items-center justify-center transition-transform shrink-0 {{ $isActive ? 'bg-amber-500 text-white shadow-lg shadow-amber-500/40 scale-105' : 'bg-slate-100 text-slate-700' }}">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                    </svg>
                </div>
                <span x-show="!sidebarCollapsed" x-transition.opacity.duration.150ms class="tracking-wider uppercase text-[11px] font-extrabold whitespace-nowrap">APPLICATIONS</span>
            </a>

            {{-- PROMO CODES --}}
            @php $isActive = request()->routeIs('admin.promo-codes'); @endphp
            <a href="{{ route('admin.promo-codes') }}"
                title="PROMO CODES"
                class="flex items-center gap-3.5 py-3 rounded-l-2xl text-xs font-bold transition-all duration-200 {{ $isActive ? 'sidebar-active-notch text-rose-500' : 'text-slate-500 hover:text-slate-900 hover:bg-slate-50' }}"
                :class="sidebarCollapsed ? 'px-2 justify-center' : 'px-4'">
                <div class="w-9 h-9 rounded-full flex items-center justify-center transition-transform shrink-0 {{ $isActive ? 'bg-rose-500 text-white shadow-lg shadow-rose-500/40 scale-105' : 'bg-slate-100 text-slate-700' }}">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.568 3H5.25A2.25 2.25 0 003 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 005.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 009.568 3z" />
                    </svg>
                </div>
                <span x-show="!sidebarCollapsed" x-transition.opacity.duration.150ms class="tracking-wider uppercase text-[11px] font-extrabold whitespace-nowrap">PROMO CODES</span>
            </a>

            {{-- CERTIFICATES --}}
            @php $isActive = request()->routeIs('admin.certificates*'); @endphp
            <a href="{{ Route::has('admin.certificates.index') ? route('admin.certificates.index') : (Route::has('admin.certificates') ? route('admin.certificates') : '#') }}"
                title="GRADUATE CERTIFICATES"
                class="flex items-center gap-3.5 py-3 rounded-l-2xl text-xs font-bold transition-all duration-200 {{ $isActive ? 'sidebar-active-notch text-amber-600' : 'text-slate-500 hover:text-slate-900 hover:bg-slate-50' }}"
                :class="sidebarCollapsed ? 'px-2 justify-center' : 'px-4'">
                <div class="w-9 h-9 rounded-full flex items-center justify-center transition-transform shrink-0 {{ $isActive ? 'bg-amber-600 text-white shadow-lg shadow-amber-600/40 scale-105' : 'bg-slate-100 text-slate-700' }}">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342" />
                    </svg>
                </div>
                <span x-show="!sidebarCollapsed" x-transition.opacity.duration.150ms class="tracking-wider uppercase text-[11px] font-extrabold whitespace-nowrap">CERTIFICATES</span>
            </a>

            {{-- HERO CAROUSEL --}}
            @php $isActive = request()->routeIs('admin.carousels*'); @endphp
            <a href="{{ Route::has('admin.carousels.index') ? route('admin.carousels.index') : '#' }}"
                title="HERO CAROUSEL"
                class="flex items-center gap-3.5 py-3 rounded-l-2xl text-xs font-bold transition-all duration-200 {{ $isActive ? 'sidebar-active-notch text-purple-600' : 'text-slate-500 hover:text-slate-900 hover:bg-slate-50' }}"
                :class="sidebarCollapsed ? 'px-2 justify-center' : 'px-4'">
                <div class="w-9 h-9 rounded-full flex items-center justify-center transition-transform shrink-0 {{ $isActive ? 'bg-purple-600 text-white shadow-lg shadow-purple-600/40 scale-105' : 'bg-slate-100 text-slate-700' }}">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                    </svg>
                </div>
                <span x-show="!sidebarCollapsed" x-transition.opacity.duration.150ms class="tracking-wider uppercase text-[11px] font-extrabold whitespace-nowrap">HERO CAROUSEL</span>
            </a>

            {{-- ACADEMY STATS --}}
            @php $isActive = request()->routeIs('admin.stats*'); @endphp
            <a href="{{ Route::has('admin.stats.index') ? route('admin.stats.index') : '#' }}"
                title="ACADEMY STATS"
                class="flex items-center gap-3.5 py-3 rounded-l-2xl text-xs font-bold transition-all duration-200 {{ $isActive ? 'sidebar-active-notch text-emerald-500' : 'text-slate-500 hover:text-slate-900 hover:bg-slate-50' }}"
                :class="sidebarCollapsed ? 'px-2 justify-center' : 'px-4'">
                <div class="w-9 h-9 rounded-full flex items-center justify-center transition-transform shrink-0 {{ $isActive ? 'bg-emerald-500 text-white shadow-lg shadow-emerald-500/40 scale-105' : 'bg-slate-100 text-slate-700' }}">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 013 19.875v-6.75zM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625zM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z" />
                    </svg>
                </div>
                <span x-show="!sidebarCollapsed" x-transition.opacity.duration.150ms class="tracking-wider uppercase text-[11px] font-extrabold whitespace-nowrap">ACADEMY STATS</span>
            </a>

            {{-- ALUMNI REVIEWS --}}
            @php $isActive = request()->routeIs('admin.reviews*'); @endphp
            <a href="{{ Route::has('admin.reviews.index') ? route('admin.reviews.index') : '#' }}"
                title="ALUMNI REVIEWS"
                class="flex items-center gap-3.5 py-3 rounded-l-2xl text-xs font-bold transition-all duration-200 {{ $isActive ? 'sidebar-active-notch text-yellow-600' : 'text-slate-500 hover:text-slate-900 hover:bg-slate-50' }}"
                :class="sidebarCollapsed ? 'px-2 justify-center' : 'px-4'">
                <div class="w-9 h-9 rounded-full flex items-center justify-center transition-transform shrink-0 {{ $isActive ? 'bg-yellow-500 text-white shadow-lg shadow-yellow-500/40 scale-105' : 'bg-slate-100 text-slate-700' }}">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.562.562 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                    </svg>
                </div>
                <span x-show="!sidebarCollapsed" x-transition.opacity.duration.150ms class="tracking-wider uppercase text-[11px] font-extrabold whitespace-nowrap">ALUMNI REVIEWS</span>
            </a>

            {{-- ANNOUNCEMENTS --}}
            @php $isActive = request()->routeIs('admin.announcements*'); @endphp
            <a href="{{ Route::has('admin.announcements.index') ? route('admin.announcements.index') : '#' }}"
                title="ANNOUNCEMENTS"
                class="flex items-center gap-3.5 py-3 rounded-l-2xl text-xs font-bold transition-all duration-200 {{ $isActive ? 'sidebar-active-notch text-sky-500' : 'text-slate-500 hover:text-slate-900 hover:bg-slate-50' }}"
                :class="sidebarCollapsed ? 'px-2 justify-center' : 'px-4'">
                <div class="w-9 h-9 rounded-full flex items-center justify-center transition-transform shrink-0 {{ $isActive ? 'bg-sky-500 text-white shadow-lg shadow-sky-500/40 scale-105' : 'bg-slate-100 text-slate-700' }}">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.34 15.84c-.688-.06-1.386-.09-2.09-.09H7.5a4.5 4.5 0 110-9h.75c.704 0 1.402-.03 2.09-.09m0 9.18c.253.962.584 1.892.985 2.783.247.55.06 1.21-.463 1.511l-.657.38c-.551.318-1.26.117-1.527-.461a20.845 20.845 0 01-1.44-4.282m3.102.069a18.03 18.03 0 01-.59-4.59c0-1.586.205-3.124.59-4.59m0 9.18a23.848 23.848 0 018.835 2.535M10.34 6.66a23.847 23.847 0 008.835-2.535m0 0A23.74 23.74 0 0018.795 3m.38 1.125a23.91 23.91 0 011.014 5.395m-1.014 8.855c-.118.38-.245.754-.38 1.125m.38-1.125a23.91 23.91 0 001.014-5.395m0-3.46c.495.413.811 1.035.811 1.73 0 .695-.316 1.317-.811 1.73m0-3.46a24.347 24.347 0 010 3.46" />
                    </svg>
                </div>
                <span x-show="!sidebarCollapsed" x-transition.opacity.duration.150ms class="tracking-wider uppercase text-[11px] font-extrabold whitespace-nowrap">ANNOUNCEMENTS</span>
            </a>

            {{-- TEACHERS --}}
            @php $isActive = request()->routeIs('admin.teachers*'); @endphp
            <a href="{{ Route::has('admin.teachers.index') ? route('admin.teachers.index') : '#' }}"
                title="TEACHERS"
                class="flex items-center gap-3.5 py-3 rounded-l-2xl text-xs font-bold transition-all duration-200 {{ $isActive ? 'sidebar-active-notch text-indigo-500' : 'text-slate-500 hover:text-slate-900 hover:bg-slate-50' }}"
                :class="sidebarCollapsed ? 'px-2 justify-center' : 'px-4'">
                <div class="w-9 h-9 rounded-full flex items-center justify-center transition-transform shrink-0 {{ $isActive ? 'bg-indigo-500 text-white shadow-lg shadow-indigo-500/40 scale-105' : 'bg-slate-100 text-slate-700' }}">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                    </svg>
                </div>
                <span x-show="!sidebarCollapsed" x-transition.opacity.duration.150ms class="tracking-wider uppercase text-[11px] font-extrabold whitespace-nowrap">TEACHERS</span>
            </a>

            {{-- STUDENTS --}}
            @php $isActive = request()->routeIs('admin.students*'); @endphp
            <a href="{{ Route::has('admin.students.index') ? route('admin.students.index') : '#' }}"
                title="STUDENTS"
                class="flex items-center gap-3.5 py-3 rounded-l-2xl text-xs font-bold transition-all duration-200 {{ $isActive ? 'sidebar-active-notch text-teal-500' : 'text-slate-500 hover:text-slate-900 hover:bg-slate-50' }}"
                :class="sidebarCollapsed ? 'px-2 justify-center' : 'px-4'">
                <div class="w-9 h-9 rounded-full flex items-center justify-center transition-transform shrink-0 {{ $isActive ? 'bg-teal-500 text-white shadow-lg shadow-teal-500/40 scale-105' : 'bg-slate-100 text-slate-700' }}">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342" />
                    </svg>
                </div>
                <span x-show="!sidebarCollapsed" x-transition.opacity.duration.150ms class="tracking-wider uppercase text-[11px] font-extrabold whitespace-nowrap">STUDENTS</span>
            </a>

            {{-- CLASSROOMS --}}
            @php $isActive = request()->routeIs('admin.classrooms*'); @endphp
            <a href="{{ Route::has('admin.classrooms.index') ? route('admin.classrooms.index') : '#' }}"
                title="CLASSROOMS"
                class="flex items-center gap-3.5 py-3 rounded-l-2xl text-xs font-bold transition-all duration-200 {{ $isActive ? 'sidebar-active-notch text-violet-500' : 'text-slate-500 hover:text-slate-900 hover:bg-slate-50' }}"
                :class="sidebarCollapsed ? 'px-2 justify-center' : 'px-4'">
                <div class="w-9 h-9 rounded-full flex items-center justify-center transition-transform shrink-0 {{ $isActive ? 'bg-violet-500 text-white shadow-lg shadow-violet-500/40 scale-105' : 'bg-slate-100 text-slate-700' }}">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18M9 6.75h1.5m-1.5 3h1.5m-1.5 3h1.5m3-6H15m-1.5 3H15m-1.5 3H15M9 21v-3.375c0-.621.504-1.125 1.125-1.125h3.75c.621 0 1.125.504 1.125 1.125V21" />
                    </svg>
                </div>
                <span x-show="!sidebarCollapsed" x-transition.opacity.duration.150ms class="tracking-wider uppercase text-[11px] font-extrabold whitespace-nowrap">CLASSROOMS</span>
            </a>

            {{-- SUBJECTS --}}
            @php $isActive = request()->routeIs('admin.subjects*'); @endphp
            <a href="{{ Route::has('admin.subjects.index') ? route('admin.subjects.index') : '#' }}"
                title="SUBJECTS"
                class="flex items-center gap-3.5 py-3 rounded-l-2xl text-xs font-bold transition-all duration-200 {{ $isActive ? 'sidebar-active-notch text-fuchsia-500' : 'text-slate-500 hover:text-slate-900 hover:bg-slate-50' }}"
                :class="sidebarCollapsed ? 'px-2 justify-center' : 'px-4'">
                <div class="w-9 h-9 rounded-full flex items-center justify-center transition-transform shrink-0 {{ $isActive ? 'bg-fuchsia-500 text-white shadow-lg shadow-fuchsia-500/40 scale-105' : 'bg-slate-100 text-slate-700' }}">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                    </svg>
                </div>
                <span x-show="!sidebarCollapsed" x-transition.opacity.duration.150ms class="tracking-wider uppercase text-[11px] font-extrabold whitespace-nowrap">SUBJECTS</span>
            </a>

        </nav>

        {{-- 3. User Footer (Exact Sample Image Profile & Logout Bar) --}}
        <div class="p-4 border-t border-slate-100 mt-auto bg-white">
            <div class="flex items-center justify-between gap-3 overflow-hidden" :class="sidebarCollapsed ? 'justify-center flex-col gap-2' : ''">
                <div class="flex items-center gap-3 min-w-0" :class="sidebarCollapsed ? 'justify-center' : ''">
                    <div class="relative flex-shrink-0">
                        <div class="w-9 h-9 rounded-full bg-gradient-to-tr from-rose-500 to-amber-500 text-white flex items-center justify-center font-black text-xs shadow-md border-2 border-white"
                            title="{{ Auth::user()?->name ?? 'MUHAMMAD IRSHAD' }}">
                            {{ strtoupper(substr(Auth::user()?->name ?? 'M', 0, 2)) }}
                        </div>
                    </div>
                    <div class="min-w-0" x-show="!sidebarCollapsed" x-transition.opacity.duration.150ms>
                        <h4 class="text-xs font-black tracking-wider text-slate-900 uppercase truncate leading-tight font-heading">{{ Auth::user()?->name ?? 'MUHAMMAD IRSHAD' }}</h4>
                        <span class="text-[9px] font-extrabold text-slate-400 tracking-wider uppercase block leading-tight">ADMINISTRATOR</span>
                    </div>
                </div>

                <form method="POST" action="{{ route('logout') }}" class="flex-shrink-0">
                    @csrf
                    <button type="submit" title="LOGOUT" class="p-2 text-slate-400 hover:text-rose-600 hover:bg-rose-50 rounded-full transition-colors">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l3 3m0 0l-3 3m3-3H2.25" />
                        </svg>
                    </button>
                </form>
            </div>
        </div>

    </div>

</div>