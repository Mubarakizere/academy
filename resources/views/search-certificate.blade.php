<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Search & Verify Graduate Certificates | Diva House Beauty Academy</title>
    <meta name="description"
        content="Search and verify graduate certificates and credentials from Diva House Beauty Academy (Rwanda & Kenya). Authenticate alumni training in Lashes Artistry & Pro Makeup.">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Outfit:wght@600;700;800;900&display=swap"
        rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    <style>
        body { font-family: 'Inter', sans-serif; }
        h1, h2, h3, .font-heading { font-family: 'Outfit', sans-serif; }
    </style>
</head>

<body class="antialiased bg-slate-50/50 text-slate-900 selection:bg-yellow-400 selection:text-slate-950">

    {{-- ====== TOP NAVBAR ====== --}}
    <x-navbar />

    {{-- ====== HERO & VERIFICATION SEARCH ====== --}}
    <section class="bg-gradient-to-b from-amber-500/5 via-slate-50/60 to-white pt-14 pb-16 border-b border-slate-200/80 relative overflow-hidden">
        {{-- Ambient background glows --}}
        <div class="absolute top-0 right-1/4 w-96 h-96 bg-amber-400/10 rounded-full blur-3xl pointer-events-none"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8 relative z-10">
            
            <div class="text-center space-y-3.5 max-w-3xl mx-auto">
                <div class="inline-flex items-center gap-2 bg-amber-400/15 text-amber-900 rounded-full px-4 py-1.5 border border-amber-400/30 font-extrabold text-xs uppercase tracking-widest shadow-xs">
                    <svg class="w-4 h-4 text-amber-600" fill="none" viewBox="0 0 24 24" stroke-width="2.2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                    </svg>
                    <span>Official Registry Search</span>
                </div>
                <h1 class="text-4xl sm:text-6xl font-black text-slate-900 font-heading tracking-tight leading-tight">
                    Graduate Credential Verification
                </h1>
                <p class="text-slate-600 text-base sm:text-lg max-w-2xl mx-auto font-medium leading-relaxed">
                    Search by graduate full name or certificate verification ID to validate official beauty qualifications awarded by Diva House Beauty Academy (Rwanda & Kenya).
                </p>
            </div>

            {{-- LIVEWIRE CERTIFICATE SEARCH COMPONENT --}}
            <div class="pt-2">
                @livewire('public.certificate-verification')
            </div>

        </div>
    </section>

    {{-- ====== VERIFICATION EXPLANATION SECTION ====== --}}
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-16">
            
            <div class="text-center max-w-3xl mx-auto space-y-3">
                <div class="inline-flex items-center gap-2 bg-slate-100 text-slate-800 font-extrabold rounded-full px-4 py-1.5 text-xs uppercase tracking-widest border border-slate-200">
                    <span>Registry Transparency</span>
                </div>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 font-heading">
                    How Our Verification System Works
                </h2>
                <p class="text-slate-600 text-sm sm:text-base font-medium leading-relaxed">
                    Salons, beauty studios, employers, and clients across East Africa can instantly verify that a beauty specialist underwent authentic hands-on training with us.
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                
                {{-- Feature 1 --}}
                <div class="bg-slate-50/80 rounded-3xl border border-slate-200/80 p-8 space-y-4 hover:shadow-md transition-all">
                    <div class="w-12 h-12 rounded-2xl bg-slate-900 text-amber-400 flex items-center justify-center font-black text-lg shadow-md">
                        1
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 font-heading">Unique Certificate ID</h3>
                    <p class="text-xs text-slate-600 font-medium leading-relaxed">
                        Every graduate is assigned a tamper-proof verification number (e.g. <code class="bg-slate-200 text-slate-900 px-1.5 py-0.5 rounded font-mono font-bold">DH-2026-9842</code>) upon graduation.
                    </p>
                </div>

                {{-- Feature 2 --}}
                <div class="bg-slate-50/80 rounded-3xl border border-slate-200/80 p-8 space-y-4 hover:shadow-md transition-all">
                    <div class="w-12 h-12 rounded-2xl bg-slate-900 text-amber-400 flex items-center justify-center font-black text-lg shadow-md">
                        2
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 font-heading">Instant Name Search</h3>
                    <p class="text-xs text-slate-600 font-medium leading-relaxed">
                        Search by student first or last name to view their completed course track, training location (Kigali or Kenya), and certificate validity status.
                    </p>
                </div>

                {{-- Feature 3 --}}
                <div class="bg-slate-50/80 rounded-3xl border border-slate-200/80 p-8 space-y-4 hover:shadow-md transition-all">
                    <div class="w-12 h-12 rounded-2xl bg-slate-900 text-amber-400 flex items-center justify-center font-black text-lg shadow-md">
                        3
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 font-heading">East Africa Accredited</h3>
                    <p class="text-xs text-slate-600 font-medium leading-relaxed">
                        Authorized certificates demonstrate full compliance with professional hygiene, lash isolation standards, and pro makeup artistry protocols.
                    </p>
                </div>

            </div>

            {{-- CTA Banner (Light White Card) --}}
            <div class="bg-gradient-to-r from-amber-500/10 via-amber-100/40 to-amber-500/10 rounded-3xl p-8 sm:p-12 text-slate-900 shadow-md flex flex-col sm:flex-row items-center justify-between gap-6 border border-amber-300/80">
                <div class="space-y-2 text-center sm:text-left">
                    <span class="text-xs font-black text-amber-800 uppercase tracking-widest">Enrollment Open</span>
                    <h3 class="text-2xl sm:text-3xl font-black font-heading text-slate-950">Want to Earn Your Official Certificate?</h3>
                    <p class="text-xs sm:text-sm text-slate-700 max-w-xl font-medium">
                        Join our upcoming intensive practical intake in Kigali (Rwanda) or Nairobi & Mombasa (Kenya).
                    </p>
                </div>
                <a href="{{ route('apply') }}" class="px-8 py-4 rounded-2xl bg-slate-950 hover:bg-slate-900 text-amber-400 font-black text-xs uppercase tracking-wider shadow-lg shrink-0 transition-all">
                    Apply for Intake →
                </a>
            </div>

        </div>
    </section>

    {{-- ====== FOOTER ====== --}}
    <footer class="bg-slate-950 text-slate-400 py-16 border-t border-slate-800/80">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-10 mb-12">
                <div class="space-y-4 md:col-span-1">
                    <a href="{{ route('home') }}" class="flex items-center gap-3">
                        <img src="{{ asset('images/logo.png') }}" alt="Diva House Beauty Academy Logo" class="h-10 w-auto object-contain">
                        <div>
                            <span class="text-base font-bold text-white font-heading">DIVA HOUSE BEAUTY ACADEMY</span>
                            <p class="text-xs text-yellow-400 font-semibold">Rwanda & Kenya Hubs</p>
                        </div>
                    </a>
                    <p class="text-xs text-slate-400 leading-relaxed font-medium">
                        Empowering aspiring beauty professionals with hands-on certification masterclasses in Lashes Artistry and Pro Makeup.
                    </p>
                </div>

                <div class="space-y-3">
                    <h4 class="text-xs font-bold text-white uppercase tracking-wider font-heading">Academy</h4>
                    <ul class="space-y-2 text-xs font-medium">
                        <li><a href="{{ route('home') }}" class="hover:text-yellow-400 transition-colors">Home</a></li>
                        <li><a href="{{ route('courses') }}" class="hover:text-yellow-400 transition-colors">Training Courses</a></li>
                        <li><a href="{{ route('campuses') }}" class="hover:text-yellow-400 transition-colors">Campuses (RW & KE)</a></li>
                        <li><a href="{{ route('certifications') }}" class="hover:text-yellow-400 transition-colors">Certification</a></li>
                        <li><a href="{{ route('search.certificate') }}" class="text-yellow-400 font-bold hover:underline">Search Alumni Certificates</a></li>
                        <li><a href="{{ route('apply') }}" class="hover:text-yellow-400 transition-colors">Apply for Intake</a></li>
                    </ul>
                </div>

                <div class="space-y-3">
                    <h4 class="text-xs font-bold text-white uppercase tracking-wider font-heading">Hub Locations</h4>
                    <ul class="space-y-2 text-xs font-medium text-slate-400">
                        <li><strong class="text-slate-200">Rwanda:</strong> Kigali Campus</li>
                        <li><strong class="text-slate-200">Kenya:</strong> Nairobi Flagship Campus</li>
                        <li><strong class="text-slate-200">Kenya:</strong> Mombasa Coastal Campus</li>
                    </ul>
                </div>

                <div class="space-y-3">
                    <h4 class="text-xs font-bold text-white uppercase tracking-wider font-heading">Admissions & Contact</h4>
                    <div class="space-y-3 text-xs font-medium">
                        <div class="flex flex-col space-y-0.5">
                            <span class="text-slate-400 text-[11px]">Kenya Hub (Nairobi & Mombasa):</span>
                            <a href="tel:+254118465054" class="text-yellow-400 font-bold hover:underline text-sm">+254 118 465 054</a>
                        </div>
                        <div class="flex flex-col space-y-0.5">
                            <span class="text-slate-400 text-[11px]">Rwanda Hub (Kigali):</span>
                            <a href="tel:+250780159059" class="text-yellow-400 font-bold hover:underline text-sm">+250 780 159 059</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="pt-8 border-t border-slate-800/80 flex flex-col sm:flex-row items-center justify-between gap-4">
                <p class="text-xs text-slate-500 font-medium">&copy; {{ date('Y') }} Diva House Beauty Academy. All rights reserved.</p>
                <p class="text-xs text-slate-500 font-medium">Graduate Credential Search & Verification System</p>
            </div>
        </div>
    </footer>

    @livewireScripts
</body>

</html>
