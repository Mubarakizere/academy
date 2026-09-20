<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>East Africa Campuses | Diva House Beauty Academy (Rwanda & Kenya)</title>
    <meta name="description"
        content="Train at Diva House Beauty Academy studios in Kigali, Rwanda and Nairobi & Mombasa, Kenya. Practical facilities for Lashes Artistry & Pro Makeup.">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Outfit:wght@600;700;800;900&display=swap"
        rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body { font-family: 'Inter', sans-serif; }
        h1, h2, h3, .font-heading { font-family: 'Outfit', sans-serif; }
    </style>
</head>

<body class="antialiased bg-slate-50/50 text-slate-900 selection:bg-yellow-400 selection:text-slate-950">

    {{-- ====== TOP NAVBAR ====== --}}
    <x-navbar />

    {{-- ====== PAGE HEADER ====== --}}
    <section class="bg-slate-950 text-white py-20 border-b border-slate-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-4">
            <div class="inline-flex items-center gap-2 bg-yellow-400 text-slate-950 rounded-full px-4 py-1.5 border border-yellow-400 font-extrabold text-xs uppercase tracking-widest">
                <span>Regional Training Hubs</span>
            </div>
            <h1 class="text-4xl sm:text-6xl font-extrabold text-white font-heading">East Africa Campuses</h1>
            <p class="text-slate-300 text-base sm:text-lg max-w-2xl mx-auto font-medium leading-relaxed">
                Our luxury beauty training studios are located in two of East Africa's top vibrant capitals: <strong class="text-white">Kigali (Rwanda)</strong> and <strong class="text-white">Nairobi & Mombasa (Kenya)</strong>.
            </p>
        </div>
    </section>

    {{-- ====== CAMPUSES SECTION ====== --}}
    <section class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-2 gap-8">
                {{-- Campus 1: Rwanda --}}
                <div class="bg-white rounded-2xl border border-slate-200/80 p-8 shadow-sm hover:shadow-lg transition-all space-y-6">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-3.5">
                            <div class="w-10 h-10 rounded-xl bg-slate-950 text-yellow-400 font-bold text-xs flex items-center justify-center">RW</div>
                            <div>
                                <h3 class="text-2xl font-bold text-slate-900 font-heading">Kigali Campus</h3>
                                <p class="text-xs font-bold text-amber-600">Rwanda Training Hub</p>
                            </div>
                        </div>
                        <span class="bg-emerald-50 text-emerald-700 font-bold text-xs px-3 py-1.5 rounded-full border border-emerald-200">
                            Live Intake Active
                        </span>
                    </div>

                    <p class="text-sm text-slate-600 leading-relaxed font-medium">
                        Located in the heart of Kigali, our Rwanda studio features fully equipped practical stations for lashes artistry and pro makeup with live model sessions.
                    </p>

                    <div class="space-y-3 pt-4 border-t border-slate-100 text-xs font-semibold text-slate-700">
                        <div class="flex items-center gap-3">
                            <span class="w-2 h-2 rounded-full bg-amber-400"></span>
                            <span>Full-Time & Weekend Flexible Schedules</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <span class="w-2 h-2 rounded-full bg-amber-400"></span>
                            <span>Hands-On Training Kits Included</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <span class="w-2 h-2 rounded-full bg-amber-400"></span>
                            <span>Kigali Master Trainers & Mentors</span>
                        </div>
                    </div>

                    <div class="pt-4">
                        <a href="{{ route('apply') }}" class="w-full inline-flex justify-center items-center gap-2 bg-yellow-400 hover:bg-yellow-300 text-slate-950 font-extrabold text-xs uppercase tracking-wider py-4 px-6 rounded-xl transition-all shadow-sm">
                            <span>Apply for Kigali Intake →</span>
                        </a>
                    </div>
                </div>

                {{-- Campus 2: Kenya --}}
                <div class="bg-white rounded-2xl border border-slate-200/80 p-8 shadow-sm hover:shadow-lg transition-all space-y-6">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-3.5">
                            <div class="w-10 h-10 rounded-xl bg-slate-950 text-yellow-400 font-bold text-xs flex items-center justify-center">KE</div>
                            <div>
                                <h3 class="text-2xl font-bold text-slate-900 font-heading">Nairobi & Mombasa Campuses</h3>
                                <p class="text-xs font-bold text-amber-600">Kenya Training Hubs</p>
                            </div>
                        </div>
                        <span class="bg-emerald-50 text-emerald-700 font-bold text-xs px-3 py-1.5 rounded-full border border-emerald-200">
                            Live Intake Active
                        </span>
                    </div>

                    <p class="text-sm text-slate-600 leading-relaxed font-medium">
                        Our Kenya facilities in Nairobi and Mombasa offer luxury training spaces, high-end equipment, sterilization rooms, and interactive workshops for aspiring beauty entrepreneurs.
                    </p>

                    <div class="space-y-3 pt-4 border-t border-slate-100 text-xs font-semibold text-slate-700">
                        <div class="flex items-center gap-3">
                            <span class="w-2 h-2 rounded-full bg-amber-400"></span>
                            <span>Nairobi (Flagship) & Mombasa (Coastal Hub) Studios</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <span class="w-2 h-2 rounded-full bg-amber-400"></span>
                            <span>Flexible Day & Evening Masterclass Sessions</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <span class="w-2 h-2 rounded-full bg-amber-400"></span>
                            <span>Professional Student Starter Kits Included</span>
                        </div>
                    </div>

                    <div class="pt-4">
                        <a href="{{ route('apply') }}" class="w-full inline-flex justify-center items-center gap-2 bg-yellow-400 hover:bg-yellow-300 text-slate-950 font-extrabold text-xs uppercase tracking-wider py-4 px-6 rounded-xl transition-all shadow-sm">
                            <span>Apply for Kenya Intake →</span>
                        </a>
                    </div>
                </div>
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
                <p class="text-xs text-slate-500 font-medium">Lashes Artistry & Pro Makeup Certification Programs</p>
            </div>
        </div>
    </footer>

</body>

</html>
