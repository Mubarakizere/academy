<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-slate-50">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Diva House Beauty Academy') }} - Admissions Admin</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Outfit:wght@600;700;800;900&display=swap" rel="stylesheet">

    <!-- Scripts & Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body { font-family: 'Inter', sans-serif; }
        h1, h2, h3, h4, .font-heading { font-family: 'Outfit', sans-serif; }
        [x-cloak] { display: none !important; }
    </style>
</head>

<body class="h-full antialiased bg-slate-50 text-slate-800" x-data="{ sidebarOpen: false, sidebarCollapsed: false }">

    <div class="min-h-full flex flex-col lg:flex-row bg-slate-50">

        {{-- Mobile Backdrop --}}
        <div x-show="sidebarOpen" x-cloak @click="sidebarOpen = false"
            class="fixed inset-0 z-40 bg-slate-900/40 backdrop-blur-xs lg:hidden transition-opacity"></div>

        {{-- ====== ADMIN SIDEBAR ====== --}}
        <aside :class="[
            sidebarOpen ? 'translate-x-0' : '-translate-x-full lg:translate-x-0',
            sidebarCollapsed ? 'lg:w-20' : 'lg:w-64'
        ]"
            class="fixed inset-y-0 left-0 z-50 w-64 transition-all duration-300 ease-in-out lg:static lg:z-auto shrink-0 bg-white">
            @include('layouts.admin-sidebar')
        </aside>

        {{-- ====== MAIN CONTENT AREA (Clean Light White Layout) ====== --}}
        <div class="flex-1 flex flex-col min-w-0 min-h-screen bg-slate-50">

            {{-- Top Header --}}
            <header class="h-20 bg-white/90 border-b border-slate-200/80 backdrop-blur-md sticky top-0 z-30 px-4 sm:px-8 flex items-center justify-between">
                <div class="flex items-center gap-4">
                    {{-- Mobile Menu Open Button --}}
                    <button @click="sidebarOpen = true" class="lg:hidden text-slate-600 hover:text-slate-900 p-2 rounded-xl border border-slate-200 bg-white">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                    </button>

                    <div>
                        <h1 class="text-xl sm:text-2xl font-extrabold text-slate-900 font-heading tracking-tight">
                            {{ $header ?? 'Admissions Admin Portal' }}
                        </h1>
                    </div>
                </div>

                <div class="flex items-center gap-3">
                    <a href="{{ route('home') }}" class="hidden sm:inline-flex items-center gap-2 text-xs font-bold text-slate-700 bg-slate-100 hover:bg-slate-200 border border-slate-200 px-4 py-2.5 rounded-xl transition">
                        <svg class="w-4 h-4 text-amber-500" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                        </svg>
                        <span>Website Home</span>
                    </a>

                    <div class="inline-flex items-center gap-1.5 bg-amber-500/10 text-amber-800 border border-amber-500/20 px-3 py-1.5 rounded-xl text-xs font-extrabold">
                        <span class="w-2 h-2 rounded-full bg-amber-500 animate-pulse"></span>
                        <span>Intake 2026 Admin</span>
                    </div>
                </div>
            </header>

            {{-- Main Page Slot (Clean White Canvas) --}}
            <main class="p-4 sm:p-8 flex-1 max-w-7xl w-full mx-auto">
                {{ $slot }}
            </main>

            {{-- Footer --}}
            <footer class="mt-auto border-t border-slate-200/80 bg-white py-6 px-4 sm:px-8 text-center text-xs text-slate-400">
                <p>&copy; {{ date('Y') }} Diva House Beauty Academy. Admissions Administration System.</p>
            </footer>
        </div>

    </div>

</body>

</html>
