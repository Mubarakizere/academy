<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Accreditation & Certification | Diva House Beauty Academy</title>
    <meta name="description"
        content="Earn recognized certificates in Lashes Artistry and Pro Makeup from Diva House Beauty Academy in Rwanda & Kenya.">
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

    {{-- ====== PAGE HEADER ====== --}}
    <section class="bg-slate-950 text-white py-20 border-b border-slate-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-4">
            <div class="inline-flex items-center gap-2 bg-yellow-400 text-slate-950 rounded-full px-4 py-1.5 border border-yellow-400 font-extrabold text-xs uppercase tracking-widest">
                <span>Professional Recognition</span>
            </div>
            <h1 class="text-4xl sm:text-6xl font-extrabold text-white font-heading">Accreditation & Certificates</h1>
            <p class="text-slate-300 text-base sm:text-lg max-w-2xl mx-auto font-medium leading-relaxed">
                Graduate with industry-certified qualifications accepted across East Africa and international beauty salons.
            </p>
        </div>
    </section>

    {{-- ====== LIVE GRADUATE VERIFICATION SEARCH ====== --}}
    <section class="py-16 bg-slate-100/70 border-b border-slate-200/80">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @livewire('public.certificate-verification')
        </div>
    </section>

    {{-- ====== CERTIFICATIONS CONTENT ====== --}}
    <section class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-16">
            <div class="grid md:grid-cols-3 gap-8">
                {{-- Cert Card 1 --}}
                <div class="bg-white rounded-2xl border border-slate-200/80 p-8 shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col justify-between space-y-6">
                    <div class="space-y-4">
                        <div class="w-14 h-14 bg-slate-950 text-yellow-400 rounded-2xl flex items-center justify-center font-bold text-lg shadow-md">
                            <svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 21v-8.25M15.75 21v-8.25M8.25 21v-8.25M3 9l9-6 9 6m-1.5 12V10.5M4.5 21V10.5" />
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-slate-900 font-heading">Certified Beauty Specialist</h3>
                        <p class="text-xs text-slate-600 font-medium leading-relaxed">
                            Awarded upon successful completion of hands-on coursework and practical model assessments in Lashes Artistry or Pro Makeup.
                        </p>
                    </div>
                    <ul class="space-y-2.5 text-xs text-slate-700 font-semibold pt-4 border-t border-slate-100">
                        <li class="flex items-center gap-2"><span class="w-2 h-2 rounded-full bg-emerald-500"></span> Verified Practical Hours Logbook</li>
                        <li class="flex items-center gap-2"><span class="w-2 h-2 rounded-full bg-emerald-500"></span> Live Model Examination Pass</li>
                        <li class="flex items-center gap-2"><span class="w-2 h-2 rounded-full bg-emerald-500"></span> Hygiene & Sanitation Mastery</li>
                    </ul>
                </div>

                {{-- Cert Card 2 --}}
                <div class="bg-slate-950 text-white rounded-2xl border border-slate-800 p-8 shadow-xl flex flex-col justify-between space-y-6">
                    <div class="space-y-4">
                        <div class="w-14 h-14 bg-yellow-400 text-slate-950 rounded-2xl flex items-center justify-center font-bold text-lg shadow-md">
                            <svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 18.75h-9m9 0a3 3 0 003-3V8.25a3 3 0 00-3-3h-9a3 3 0 00-3 3v7.5a3 3 0 003 3m9 0v-3.375c0-.621-.504-1.125-1.125-1.125h-6.75c-.621 0-1.125.504-1.125 1.125v3.375" />
                            </svg>
                        </div>
                        <span class="text-[10px] uppercase font-extrabold bg-yellow-400 text-slate-950 px-3 py-1 rounded-full inline-block">Flagship Credential</span>
                        <h3 class="text-2xl font-bold text-yellow-400 font-heading">Master Artistry Diploma</h3>
                        <p class="text-xs text-slate-300 font-medium leading-relaxed">
                            Comprehensive multi-track diploma for students completing combined masterclasses with advanced studio client experience.
                        </p>
                    </div>
                    <ul class="space-y-2.5 text-xs text-slate-300 font-semibold pt-4 border-t border-slate-800">
                        <li class="flex items-center gap-2"><span class="w-2 h-2 rounded-full bg-yellow-400"></span> Dual Specialty Endorsement</li>
                        <li class="flex items-center gap-2"><span class="w-2 h-2 rounded-full bg-yellow-400"></span> Salon Business Management Module</li>
                        <li class="flex items-center gap-2"><span class="w-2 h-2 rounded-full bg-yellow-400"></span> Official Credential Verification</li>
                    </ul>
                </div>

                {{-- Cert Card 3 --}}
                <div class="bg-white rounded-2xl border border-slate-200/80 p-8 shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col justify-between space-y-6">
                    <div class="space-y-4">
                        <div class="w-14 h-14 bg-slate-950 text-yellow-400 rounded-2xl flex items-center justify-center font-bold text-lg shadow-md">
                            <svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18L9 11.25l4.306 4.307a11.95 11.95 0 005.814-5.519l2.74-1.22m0 0l-5.94-2.28m5.94 2.28l-2.28 5.941" />
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-slate-900 font-heading">Regional & Global Career Support</h3>
                        <p class="text-xs text-slate-600 font-medium leading-relaxed">
                            Our graduates operate top beauty salons, independent studios, and mobile beauty brands across Rwanda, Kenya, and beyond.
                        </p>
                    </div>
                    <ul class="space-y-2.5 text-xs text-slate-700 font-semibold pt-4 border-t border-slate-100">
                        <li class="flex items-center gap-2"><span class="w-2 h-2 rounded-full bg-emerald-500"></span> Lifetime Graduate Network Access</li>
                        <li class="flex items-center gap-2"><span class="w-2 h-2 rounded-full bg-emerald-500"></span> Direct Salon Partner Referrals</li>
                        <li class="flex items-center gap-2"><span class="w-2 h-2 rounded-full bg-emerald-500"></span> Continuous Upskilling Workshops</li>
                    </ul>
                </div>
            </div>

            <div class="bg-gradient-to-r from-yellow-400 via-amber-400 to-yellow-400 rounded-2xl p-10 text-center max-w-4xl mx-auto shadow-lg space-y-4 text-slate-950">
                <h3 class="text-2xl sm:text-3xl font-extrabold font-heading">Ready to Start Your Beauty Career?</h3>
                <p class="font-bold text-sm max-w-xl mx-auto leading-relaxed text-slate-900">
                    Join our upcoming intake in Kigali (Rwanda) or Nairobi & Mombasa (Kenya) and earn your professional certificate.
                </p>
                <div class="pt-2">
                    <a href="{{ route('apply') }}" class="inline-flex justify-center items-center gap-2 bg-slate-950 hover:bg-slate-900 text-white font-extrabold py-4 px-8 rounded-xl shadow-md transition-all text-xs uppercase tracking-wider">
                        <span>Register for Next Intake →</span>
                    </a>
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

    @livewireScripts
</body>

</html>
