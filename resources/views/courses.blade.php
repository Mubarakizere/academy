<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Academy Programs | Diva House Beauty Academy</title>
    <meta name="description"
        content="Explore certified masterclasses in Lashes Artistry and Pro Makeup Artistry in Rwanda & Kenya at Diva House Beauty Academy.">
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
                <span>Certified Masterclass Programs</span>
            </div>
            <h1 class="text-4xl sm:text-6xl font-extrabold text-white font-heading">Our Core Beauty Programs</h1>
            <p class="text-slate-300 text-base sm:text-lg max-w-2xl mx-auto font-medium leading-relaxed">
                Professional hands-on training tracks in Lashes Artistry and Pro Makeup offered at our Kigali (Rwanda), Nairobi (Kenya), and Mombasa (Kenya) studios.
            </p>
        </div>
    </section>

    {{-- ====== COURSES GRID ====== --}}
    <section class="py-24 bg-white">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-2 gap-10">
                {{-- Course 1: Lashes Artistry --}}
                <div class="bg-white rounded-2xl border border-slate-200/80 overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col justify-between group">
                    <div>
                        <div class="h-64 sm:h-72 relative overflow-hidden bg-slate-950">
                            <img src="{{ asset('images/courses/lashes_course.jpg') }}" alt="Lashes Artistry Masterclass Kit"
                                class="w-full h-full object-cover object-center group-hover:scale-105 transition-transform duration-500">
                            <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/40 to-transparent"></div>
                            <div class="absolute top-4 left-4">
                                <span class="text-[10px] font-extrabold uppercase tracking-wider bg-yellow-400 text-slate-950 px-3 py-1 rounded-full shadow-md">Master Course</span>
                            </div>
                            <div class="absolute bottom-4 left-6 right-6">
                                <h3 class="text-2xl sm:text-3xl font-bold font-heading text-white group-hover:text-yellow-400 transition-colors">Lashes Artistry</h3>
                                <p class="text-slate-300 text-xs font-medium mt-0.5">Eyelash Extensions & Lift Masterclass</p>
                            </div>
                        </div>
                        <div class="p-8 space-y-6">
                            <p class="text-sm text-slate-600 font-medium leading-relaxed">
                                Master the high-demand art of eyelash extensions, mapping, fan making, and lash lifts with our intensive practical modules using professional student equipment.
                            </p>
                            <div class="space-y-3 pt-2">
                                <h4 class="text-xs font-bold text-slate-900 uppercase tracking-wider">Curriculum Highlights</h4>
                                <ul class="space-y-2.5 text-xs text-slate-700 font-semibold">
                                    <li class="flex items-center gap-2.5">
                                        <span class="w-4 h-4 rounded-full bg-emerald-100 text-emerald-700 flex items-center justify-center text-[10px] font-bold">✓</span> Classic, Hybrid & Volume Application
                                    </li>
                                    <li class="flex items-center gap-2.5">
                                        <span class="w-4 h-4 rounded-full bg-emerald-100 text-emerald-700 flex items-center justify-center text-[10px] font-bold">✓</span> Mega Volume & Handmade Fanning
                                    </li>
                                    <li class="flex items-center gap-2.5">
                                        <span class="w-4 h-4 rounded-full bg-emerald-100 text-emerald-700 flex items-center justify-center text-[10px] font-bold">✓</span> Lash Lifts, Tinting & Brow Lamination
                                    </li>
                                    <li class="flex items-center gap-2.5">
                                        <span class="w-4 h-4 rounded-full bg-emerald-100 text-emerald-700 flex items-center justify-center text-[10px] font-bold">✓</span> Eye Isolation, Sterilization & Safety Protocols
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="px-8 pb-8 pt-2">
                        <a href="{{ route('apply') }}" class="w-full inline-flex justify-center items-center gap-2 bg-yellow-400 hover:bg-yellow-300 text-slate-950 font-extrabold text-xs uppercase tracking-wider py-4 px-6 rounded-xl transition-all shadow-sm group-hover:shadow-md">
                            <span>Apply for Lashes Masterclass →</span>
                        </a>
                    </div>
                </div>

                {{-- Course 2: Pro Makeup Artistry --}}
                <div class="bg-white rounded-2xl border border-slate-200/80 overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col justify-between group">
                    <div>
                        <div class="h-64 sm:h-72 relative overflow-hidden bg-slate-950">
                            <img src="{{ asset('images/courses/makeup_course.png') }}" alt="Pro Makeup Artistry Masterclass Products"
                                class="w-full h-full object-cover object-center group-hover:scale-105 transition-transform duration-500">
                            <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/40 to-transparent"></div>
                            <div class="absolute top-4 left-4">
                                <span class="text-[10px] font-extrabold uppercase tracking-wider bg-yellow-400 text-slate-950 px-3 py-1 rounded-full shadow-md">Pro Certification</span>
                            </div>
                            <div class="absolute bottom-4 left-6 right-6">
                                <h3 class="text-2xl sm:text-3xl font-bold font-heading text-white group-hover:text-yellow-400 transition-colors">Pro Makeup Artistry</h3>
                                <p class="text-slate-300 text-xs font-medium mt-0.5">Bridal, Glam & High-Fashion Makeup</p>
                            </div>
                        </div>
                        <div class="p-8 space-y-6">
                            <p class="text-sm text-slate-600 font-medium leading-relaxed">
                                Learn professional bridal makeup, red carpet glam, editorial looks, and advanced skin prep techniques tailored for all African skin tones.
                            </p>
                            <div class="space-y-3 pt-2">
                                <h4 class="text-xs font-bold text-slate-900 uppercase tracking-wider">Curriculum Highlights</h4>
                                <ul class="space-y-2.5 text-xs text-slate-700 font-semibold">
                                    <li class="flex items-center gap-2.5">
                                        <span class="w-4 h-4 rounded-full bg-emerald-100 text-emerald-700 flex items-center justify-center text-[10px] font-bold">✓</span> Professional Bridal & Special Event Glam
                                    </li>
                                    <li class="flex items-center gap-2.5">
                                        <span class="w-4 h-4 rounded-full bg-emerald-100 text-emerald-700 flex items-center justify-center text-[10px] font-bold">✓</span> Skin Prep, Color Matching & Contouring
                                    </li>
                                    <li class="flex items-center gap-2.5">
                                        <span class="w-4 h-4 rounded-full bg-emerald-100 text-emerald-700 flex items-center justify-center text-[10px] font-bold">✓</span> Eye Shadow Blending & Cut Crease Artistry
                                    </li>
                                    <li class="flex items-center gap-2.5">
                                        <span class="w-4 h-4 rounded-full bg-emerald-100 text-emerald-700 flex items-center justify-center text-[10px] font-bold">✓</span> High-Fashion, Editorial & Soft Glam
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="px-8 pb-8 pt-2">
                        <a href="{{ route('apply') }}" class="w-full inline-flex justify-center items-center gap-2 bg-yellow-400 hover:bg-yellow-300 text-slate-950 font-extrabold text-xs uppercase tracking-wider py-4 px-6 rounded-xl transition-all shadow-sm group-hover:shadow-md">
                            <span>Apply for Pro Makeup Masterclass →</span>
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
