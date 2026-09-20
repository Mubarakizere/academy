<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Diva House Beauty Academy | Student & Partner Portal</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Outfit:wght@600;700;800;900&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        h1, h2, h3, .font-heading {
            font-family: 'Outfit', sans-serif;
        }
    </style>
</head>

<body class="antialiased bg-slate-50 text-slate-900 selection:bg-yellow-400 selection:text-slate-950">
    <div class="min-h-screen flex">
        {{-- Left Panel — High-End Image Side Layout --}}
        <div class="hidden lg:flex lg:w-[48%] relative overflow-hidden bg-slate-950 text-white">
            {{-- Background Photography Image --}}
            <img src="{{ asset('images/courses/makeup_course.png') }}" alt="Diva House Studio Training"
                class="absolute inset-0 w-full h-full object-cover object-center opacity-60 scale-105 transition-transform duration-1000">
            <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/75 to-slate-950/40"></div>

            <div class="relative z-10 flex flex-col justify-between p-12 w-full">
                {{-- Logo & Brand --}}
                <a href="{{ route('home') }}" class="flex items-center gap-3.5 group">
                    <img src="{{ asset('images/logo.png') }}" alt="Diva House Beauty Academy Logo" class="h-11 w-auto object-contain">
                    <div>
                        <span class="text-xl font-extrabold text-white font-heading tracking-wider block">DIVA HOUSE</span>
                        <p class="text-[10px] font-extrabold text-yellow-400 uppercase tracking-[0.25em]">Beauty Academy</p>
                    </div>
                </a>

                {{-- Editorial Copy --}}
                <div class="space-y-6 max-w-lg">
                    <div class="inline-flex items-center gap-2 bg-yellow-400 text-slate-950 rounded-full px-4 py-1.5 font-extrabold text-xs uppercase tracking-widest shadow-md">
                        <span class="w-2 h-2 rounded-full bg-slate-950 animate-pulse"></span>
                        <span>Regional Training Studios</span>
                    </div>

                    <h1 class="text-4xl sm:text-5xl font-extrabold text-white leading-tight font-heading tracking-tight">
                        Transform Your Passion Into A <span class="text-yellow-400">Beauty Career</span>
                    </h1>

                    <p class="text-sm text-slate-300 leading-relaxed font-medium">
                        Log in to manage student admissions, verify intake applications, and access influencer partner commissions across our Kigali, Nairobi, and Mombasa studio hubs.
                    </p>

                    {{-- Feature Bullet Points --}}
                    <div class="space-y-3 pt-2">
                        <div class="flex items-center gap-3">
                            <span class="w-6 h-6 rounded-full bg-yellow-400 text-slate-950 font-extrabold flex items-center justify-center text-xs shadow-sm">✓</span>
                            <span class="text-xs font-bold text-slate-200">Certified Lashes Artistry & Pro Makeup Masterclasses</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <span class="w-6 h-6 rounded-full bg-yellow-400 text-slate-950 font-extrabold flex items-center justify-center text-xs shadow-sm">✓</span>
                            <span class="text-xs font-bold text-slate-200">Practical Studios in Kigali (Rwanda) & Nairobi / Mombasa (Kenya)</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <span class="w-6 h-6 rounded-full bg-yellow-400 text-slate-950 font-extrabold flex items-center justify-center text-xs shadow-sm">✓</span>
                            <span class="text-xs font-bold text-slate-200">Live Model Hands-On Practice & Verification</span>
                        </div>
                    </div>
                </div>

                {{-- Footer --}}
                <div class="border-t border-slate-800/80 pt-6 flex items-center justify-between text-xs text-slate-400">
                    <p>&copy; {{ date('Y') }} Diva House Beauty Academy. All rights reserved.</p>
                </div>
            </div>
        </div>

        {{-- Right Panel — Clean Form Container --}}
        <div class="flex-1 flex items-center justify-center p-6 sm:p-12 bg-white">
            <div class="w-full max-w-md space-y-6">
                {{ $slot }}
            </div>
        </div>
    </div>
</body>

</html>