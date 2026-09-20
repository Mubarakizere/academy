<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Diva House Beauty Academy | Premier Lashes & Makeup Courses in Rwanda & Kenya</title>
    <meta name="description"
        content="Diva House Beauty Academy offers professional certification courses in Lashes Artistry and Pro Makeup Artistry across Rwanda (Kigali) and Kenya (Nairobi & Mombasa). Hands-on training & live model sessions.">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Outfit:wght@500;600;700;800;900&display=swap"
        rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        [x-cloak] {
            display: none !important;
        }

        body {
            font-family: 'Inter', sans-serif;
        }

        h1, h2, h3, .font-heading {
            font-family: 'Outfit', sans-serif;
        }
    </style>
</head>

<body class="antialiased bg-slate-50/50 text-slate-900 selection:bg-yellow-400 selection:text-slate-950">

    {{-- ====== NAVBAR ====== --}}
    <x-navbar />

    {{-- ====== DYNAMIC HERO CAROUSEL (FROM DATABASE) ====== --}}
    <x-hero-carousel :carousels="$carousels" />

    {{-- ====== ACADEMY STATS BAR (FROM DATABASE) ====== --}}
    <x-stats-bar :stats="$stats" />

    {{-- ====== COURSES SECTION ====== --}}
    <section id="courses" class="py-24 bg-white relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16 space-y-4">
                <div class="inline-flex items-center gap-2 bg-yellow-400/15 text-yellow-700 font-extrabold rounded-full px-4 py-1.5 text-xs uppercase tracking-widest border border-yellow-400/30">
                    <span class="w-1.5 h-1.5 rounded-full bg-yellow-500 animate-pulse"></span>
                    <span>Signature Training Programs</span>
                </div>
                <h2 class="text-3xl sm:text-5xl font-extrabold text-slate-900 tracking-tight font-heading">
                    Our Core Beauty Masterclasses
                </h2>
                <p class="text-slate-600 text-base sm:text-lg font-medium leading-relaxed">
                    Specially curated masterclasses designed to launch your high-earning beauty career in Rwanda, Kenya, and beyond.
                </p>
            </div>

            <div class="grid md:grid-cols-2 gap-8 max-w-5xl mx-auto">
                {{-- Course 1: Lash Extensions --}}
                <div class="group bg-white rounded-2xl border border-slate-200/80 shadow-sm hover:shadow-xl hover:-translate-y-1.5 transition-all duration-300 flex flex-col justify-between overflow-hidden">
                    <div>
                        <div class="h-60 sm:h-64 relative overflow-hidden bg-slate-950">
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
                        <div class="p-6 space-y-4">
                            <ul class="space-y-3 text-xs sm:text-sm text-slate-700 font-semibold">
                                <li class="flex items-center gap-2.5">
                                    <span class="w-4 h-4 rounded-full bg-emerald-100 text-emerald-700 flex items-center justify-center text-[10px] font-bold">✓</span> Classic, Hybrid & Volume Application
                                </li>
                                <li class="flex items-center gap-2.5">
                                    <span class="w-4 h-4 rounded-full bg-emerald-100 text-emerald-700 flex items-center justify-center text-[10px] font-bold">✓</span> Mega Volume & Fanning Techniques
                                </li>
                                <li class="flex items-center gap-2.5">
                                    <span class="w-4 h-4 rounded-full bg-emerald-100 text-emerald-700 flex items-center justify-center text-[10px] font-bold">✓</span> Lash Lifts, Tinting & Brow Lamination
                                </li>
                                <li class="flex items-center gap-2.5">
                                    <span class="w-4 h-4 rounded-full bg-emerald-100 text-emerald-700 flex items-center justify-center text-[10px] font-bold">✓</span> Hygiene, Safety & Eye Isolation
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="px-6 pb-6 pt-2">
                        <a href="{{ route('register') }}" class="w-full inline-flex justify-center items-center gap-2 bg-yellow-400 hover:bg-yellow-300 text-slate-950 font-bold text-xs uppercase tracking-wider py-4 px-4 rounded-xl transition-all shadow-sm group-hover:shadow-md">
                            <span>Enroll in Lash Artistry →</span>
                        </a>
                    </div>
                </div>

                {{-- Course 2: Pro Makeup Artistry --}}
                <div class="group bg-white rounded-2xl border border-slate-200/80 shadow-sm hover:shadow-xl hover:-translate-y-1.5 transition-all duration-300 flex flex-col justify-between overflow-hidden">
                    <div>
                        <div class="h-60 sm:h-64 relative overflow-hidden bg-slate-950">
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
                        <div class="p-6 space-y-4">
                            <ul class="space-y-3 text-xs sm:text-sm text-slate-700 font-semibold">
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
                    <div class="px-6 pb-6 pt-2">
                        <a href="{{ route('register') }}" class="w-full inline-flex justify-center items-center gap-2 bg-yellow-400 hover:bg-yellow-300 text-slate-950 font-bold text-xs uppercase tracking-wider py-4 px-4 rounded-xl transition-all shadow-sm group-hover:shadow-md">
                            <span>Enroll in Pro Makeup →</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ====== LOCATIONS SECTION ====== --}}
    <section id="locations" class="py-24 bg-slate-100/70 border-y border-slate-200/80">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16 space-y-4">
                <div class="inline-flex items-center gap-2 bg-slate-900 text-yellow-400 font-extrabold rounded-full px-4 py-1.5 text-xs uppercase tracking-widest">
                    <span>East African Campuses</span>
                </div>
                <h2 class="text-3xl sm:text-5xl font-extrabold text-slate-900 font-heading">Train in Rwanda or Kenya</h2>
                <p class="text-slate-600 text-base sm:text-lg font-medium">State-of-the-art beauty training facilities located in East Africa's top vibrant cities.</p>
            </div>

            <div class="grid md:grid-cols-2 gap-8">
                {{-- Campus 1: Rwanda --}}
                <div class="bg-white rounded-2xl border border-slate-200/80 p-8 shadow-sm hover:shadow-lg transition-all space-y-6">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-3.5">
                            <div class="w-10 h-10 rounded-xl bg-slate-900 text-white flex items-center justify-center font-bold text-xs">RW</div>
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
                        Located in the heart of Kigali, our Rwanda studio features fully equipped practical stations for lashes and makeup artistry with live model sessions.
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
                </div>

                {{-- Campus 2: Kenya --}}
                <div class="bg-white rounded-2xl border border-slate-200/80 p-8 shadow-sm hover:shadow-lg transition-all space-y-6">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-3.5">
                            <div class="w-10 h-10 rounded-xl bg-slate-900 text-white flex items-center justify-center font-bold text-xs">KE</div>
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
                        Our Kenya facilities in Nairobi and Mombasa offer luxury training spaces, high-end beauty equipment, sterilization rooms, and interactive workshops for aspiring beauty entrepreneurs.
                    </p>

                    <div class="space-y-3 pt-4 border-t border-slate-100 text-xs font-semibold text-slate-700">
                        <div class="flex items-center gap-3">
                            <span class="w-2 h-2 rounded-full bg-amber-400"></span>
                            <span>Nairobi (Flagship) & Mombasa (Coastal Hub)</span>
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
                </div>
            </div>
        </div>
    </section>



    {{-- ====== CERTIFICATION & CAREERS ====== --}}
    <section id="certification" class="py-24 bg-slate-100/60 border-y border-slate-200/80">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16 space-y-4">
                <div class="inline-flex items-center gap-2 bg-slate-900 text-yellow-400 font-extrabold rounded-full px-4 py-1.5 text-xs uppercase tracking-widest">
                    <span>Recognized Credentials</span>
                </div>
                <h2 class="text-3xl sm:text-5xl font-extrabold text-slate-900 font-heading">Certification & Business Support</h2>
                <p class="text-slate-600 text-base sm:text-lg font-medium">We don't just teach beauty skills, we empower you to build a high-earning salon business.</p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                {{-- Card 1: Accredited Diploma --}}
                <div class="group p-8 rounded-2xl bg-white border border-slate-200/80 text-left shadow-sm hover:shadow-xl hover:-translate-y-1.5 hover:border-yellow-400/50 transition-all duration-300 space-y-4 flex flex-col justify-between">
                    <div class="space-y-4">
                        <div class="w-14 h-14 rounded-2xl bg-slate-950 text-yellow-400 flex items-center justify-center shadow-md group-hover:bg-yellow-400 group-hover:text-slate-950 transition-colors duration-300">
                            <svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 21v-8.25M15.75 21v-8.25M8.25 21v-8.25M3 9l9-6 9 6m-1.5 12V10.5M4.5 21V10.5" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 font-heading group-hover:text-amber-600 transition-colors">Accredited Diploma</h3>
                        <p class="text-xs text-slate-600 font-medium leading-relaxed">
                            Receive an officially accredited Certificate of Completion in Lashes Artistry or Pro Makeup upon successfully passing your practical assessments.
                        </p>
                    </div>
                    <div class="pt-3 border-t border-slate-100 flex items-center gap-2 text-xs font-bold text-slate-700">
                        <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                        <span>Industry Recognized Certificate</span>
                    </div>
                </div>

                {{-- Card 2: Pro Starter Kit --}}
                <div class="group p-8 rounded-2xl bg-white border border-slate-200/80 text-left shadow-sm hover:shadow-xl hover:-translate-y-1.5 hover:border-yellow-400/50 transition-all duration-300 space-y-4 flex flex-col justify-between">
                    <div class="space-y-4">
                        <div class="w-14 h-14 rounded-2xl bg-slate-950 text-yellow-400 flex items-center justify-center shadow-md group-hover:bg-yellow-400 group-hover:text-slate-950 transition-colors duration-300">
                            <svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 00.75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 00-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0112 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 01-.673-.38m0 0A2.18 2.18 0 013 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 013.413-.387m7.5 0V5.25A2.25 2.25 0 0013.5 3h-3a2.25 2.25 0 00-2.25 2.25v1.094m7.5 0a48.667 48.667 0 00-7.5 0" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 font-heading group-hover:text-amber-600 transition-colors">Practical Training Kits</h3>
                        <p class="text-xs text-slate-600 font-medium leading-relaxed">
                            Each masterclass includes complete practical training equipment with high-grade tools, lash trays, tweezers, and cosmetics supplies provided for your hands-on studio sessions.
                        </p>
                    </div>
                    <div class="pt-3 border-t border-slate-100 flex items-center gap-2 text-xs font-bold text-slate-700">
                        <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                        <span>Full Training Equipment Provided</span>
                    </div>
                </div>

                {{-- Card 3: Salon Business Coaching --}}
                <div class="group p-8 rounded-2xl bg-white border border-slate-200/80 text-left shadow-sm hover:shadow-xl hover:-translate-y-1.5 hover:border-yellow-400/50 transition-all duration-300 space-y-4 flex flex-col justify-between">
                    <div class="space-y-4">
                        <div class="w-14 h-14 rounded-2xl bg-slate-950 text-yellow-400 flex items-center justify-center shadow-md group-hover:bg-yellow-400 group-hover:text-slate-950 transition-colors duration-300">
                            <svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18L9 11.25l4.306 4.307a11.95 11.95 0 005.814-5.519l2.74-1.22m0 0l-5.94-2.28m5.94 2.28l-2.28 5.941" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 font-heading group-hover:text-amber-600 transition-colors">Salon Business Coaching</h3>
                        <p class="text-xs text-slate-600 font-medium leading-relaxed">
                            Master client pricing, social media branding, hygiene compliance, and how to launch your own profitable beauty studio in Rwanda (Kigali) or Kenya (Nairobi & Mombasa).
                        </p>
                    </div>
                    <div class="pt-3 border-t border-slate-100 flex items-center gap-2 text-xs font-bold text-slate-700">
                        <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                        <span>Entrepreneurship & Branding</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ====== GRADUATE SUCCESS & INFINITE SCROLLING ALUMNI REVIEWS ====== --}}
    <section id="reviews" class="py-24 bg-white relative overflow-hidden"
        x-data="{
            filter: 'all',
            reviews: {{ $reviews->toJson() }},
            get filteredReviews() {
                if (this.filter === 'all') return this.reviews;
                if (this.filter === 'kigali') return this.reviews.filter(r => r.location === 'Kigali');
                if (this.filter === 'nairobi') return this.reviews.filter(r => r.location === 'Nairobi');
                if (this.filter === 'mombasa') return this.reviews.filter(r => r.location === 'Mombasa');
                if (this.filter === 'lashes') return this.reviews.filter(r => r.course_name.includes('Lashes'));
                if (this.filter === 'makeup') return this.reviews.filter(r => r.course_name.includes('Makeup'));
                return this.reviews;
            },
            scroll(direction) {
                const row = this.$refs.sliderRow;
                if (row) {
                    const scrollAmount = direction === 'left' ? -380 : 380;
                    row.scrollBy({ left: scrollAmount, behavior: 'smooth' });
                }
            }
        }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-12">
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-6">
                <div class="space-y-4 max-w-2xl">
                    <div class="inline-flex items-center gap-2 bg-yellow-400/15 text-yellow-700 font-extrabold rounded-full px-4 py-1.5 text-xs uppercase tracking-widest border border-yellow-400/30">
                        <span class="w-1.5 h-1.5 rounded-full bg-yellow-500 animate-pulse"></span>
                        <span>40+ Verified Graduate Stories</span>
                    </div>
                    <h2 class="text-3xl sm:text-5xl font-extrabold text-slate-900 tracking-tight font-heading">
                        What Our Alumni Say
                    </h2>
                    <p class="text-slate-600 text-base sm:text-lg font-medium leading-relaxed">
                        Slide through 40 verified graduate reviews from certified lash technicians and pro makeup artists in Kigali, Nairobi, and Mombasa.
                    </p>
                </div>

                {{-- Left & Right Slider Controls --}}
                <div class="flex items-center gap-3">
                    <button @click="scroll('left')"
                        aria-label="Scroll Left"
                        class="w-12 h-12 rounded-2xl bg-slate-100 hover:bg-slate-950 text-slate-800 hover:text-yellow-400 flex items-center justify-center font-bold transition-all shadow-xs">
                        ←
                    </button>
                    <button @click="scroll('right')"
                        aria-label="Scroll Right"
                        class="w-12 h-12 rounded-2xl bg-slate-950 hover:bg-slate-900 text-yellow-400 flex items-center justify-center font-bold transition-all shadow-md">
                        →
                    </button>
                </div>
            </div>

            {{-- Filter Tabs --}}
            <div class="flex flex-wrap items-center gap-2 mt-8">
                <button @click="filter = 'all'"
                    :class="filter === 'all' ? 'bg-slate-950 text-white font-extrabold shadow-md' : 'bg-slate-100 text-slate-700 hover:bg-slate-200 font-semibold'"
                    class="px-5 py-2.5 rounded-full text-xs transition-all uppercase tracking-wider">
                    All Reviews ({{ $reviews->count() }})
                </button>
                <button @click="filter = 'kigali'"
                    :class="filter === 'kigali' ? 'bg-slate-950 text-white font-extrabold shadow-md' : 'bg-slate-100 text-slate-700 hover:bg-slate-200 font-semibold'"
                    class="px-5 py-2.5 rounded-full text-xs transition-all uppercase tracking-wider">
                    Kigali Studio ({{ $reviews->where('location', 'Kigali')->count() }})
                </button>
                <button @click="filter = 'nairobi'"
                    :class="filter === 'nairobi' ? 'bg-slate-950 text-white font-extrabold shadow-md' : 'bg-slate-100 text-slate-700 hover:bg-slate-200 font-semibold'"
                    class="px-5 py-2.5 rounded-full text-xs transition-all uppercase tracking-wider">
                    Nairobi Hub ({{ $reviews->where('location', 'Nairobi')->count() }})
                </button>
                <button @click="filter = 'mombasa'"
                    :class="filter === 'mombasa' ? 'bg-slate-950 text-white font-extrabold shadow-md' : 'bg-slate-100 text-slate-700 hover:bg-slate-200 font-semibold'"
                    class="px-5 py-2.5 rounded-full text-xs transition-all uppercase tracking-wider">
                    Mombasa Hub ({{ $reviews->where('location', 'Mombasa')->count() }})
                </button>
                <button @click="filter = 'lashes'"
                    :class="filter === 'lashes' ? 'bg-slate-950 text-white font-extrabold shadow-md' : 'bg-slate-100 text-slate-700 hover:bg-slate-200 font-semibold'"
                    class="px-5 py-2.5 rounded-full text-xs transition-all uppercase tracking-wider">
                    Lashes Artistry
                </button>
                <button @click="filter = 'makeup'"
                    :class="filter === 'makeup' ? 'bg-slate-950 text-white font-extrabold shadow-md' : 'bg-slate-100 text-slate-700 hover:bg-slate-200 font-semibold'"
                    class="px-5 py-2.5 rounded-full text-xs transition-all uppercase tracking-wider">
                    Pro Makeup
                </button>
            </div>
        </div>

        {{-- Single Continuous Horizontal Slider Line --}}
        <div class="relative w-full overflow-hidden py-4">
            <div class="absolute left-0 top-0 bottom-0 w-16 sm:w-28 z-10 bg-gradient-to-r from-white via-white/80 to-transparent pointer-events-none"></div>
            <div class="absolute right-0 top-0 bottom-0 w-16 sm:w-28 z-10 bg-gradient-to-l from-white via-white/80 to-transparent pointer-events-none"></div>

            <div x-ref="sliderRow" class="flex gap-6 overflow-x-auto scrollbar-none scroll-smooth px-6 sm:px-12 py-2">
                <template x-for="review in filteredReviews" :key="review.id">
                    <div class="w-[330px] sm:w-[380px] shrink-0 bg-slate-50/90 rounded-2xl p-7 border border-slate-200/80 shadow-xs hover:shadow-xl hover:-translate-y-1.5 transition-all duration-300 flex flex-col justify-between space-y-6">
                        <div class="space-y-4">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-1 text-amber-400">
                                    <template x-for="i in review.rating" :key="i">
                                        <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                        </svg>
                                    </template>
                                </div>
                                <span class="text-[10px] font-extrabold uppercase tracking-wider px-2.5 py-1 rounded-full bg-slate-200/80 text-slate-800"
                                    x-text="review.course_name"></span>
                            </div>
                            <p class="text-slate-700 text-sm font-medium leading-relaxed italic" x-text="'&quot;' + review.comment + '&quot;'"></p>
                        </div>

                        <div class="pt-4 border-t border-slate-200/80 flex items-center justify-between">
                            <div>
                                <h4 class="text-sm font-bold text-slate-900 font-heading" x-text="review.student_name"></h4>
                                <p class="text-xs text-amber-600 font-semibold" x-text="review.role_title + ' · ' + review.location"></p>
                            </div>
                            <span class="w-9 h-9 rounded-xl bg-slate-950 text-yellow-400 font-extrabold text-xs flex items-center justify-center shadow-xs"
                                x-text="review.avatar_initials || 'DH'"></span>
                        </div>
                    </div>
                </template>
            </div>
        </div>
    </section>

    {{-- ====== FREQUENTLY ASKED QUESTIONS ====== --}}
    <section id="faq" class="py-24 bg-slate-100/60 border-y border-slate-200/80" x-data="{ active: null }">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16 space-y-4">
                <div class="inline-flex items-center gap-2 bg-slate-900 text-yellow-400 font-extrabold rounded-full px-4 py-1.5 text-xs uppercase tracking-widest">
                    <span>Got Questions?</span>
                </div>
                <h2 class="text-3xl sm:text-5xl font-extrabold text-slate-900 font-heading">Frequently Asked Questions</h2>
                <p class="text-slate-600 text-base sm:text-lg font-medium">Everything you need to know about enrolling at Diva House Beauty Academy.</p>
            </div>

            <div class="space-y-4">
                {{-- FAQ Item 1 --}}
                <div class="bg-white rounded-2xl border border-slate-200/80 shadow-sm overflow-hidden">
                    <button @click="active = (active === 1 ? null : 1)"
                        class="w-full text-left p-6 flex items-center justify-between gap-4 focus:outline-none">
                        <span class="text-base sm:text-lg font-bold text-slate-900 font-heading">Where are your academy campuses located?</span>
                        <span class="w-8 h-8 rounded-full bg-slate-100 text-slate-700 flex items-center justify-center text-sm font-bold transition-transform duration-300"
                            :class="{ 'rotate-180 bg-yellow-400 text-slate-950': active === 1 }">
                            ↓
                        </span>
                    </button>
                    <div x-show="active === 1" x-collapse x-cloak class="px-6 pb-6 text-sm text-slate-600 leading-relaxed border-t border-slate-100 pt-4 font-medium">
                        We have full practical training hubs in <strong class="text-slate-900">Kigali, Rwanda</strong> as well as <strong class="text-slate-900">Nairobi and Mombasa, Kenya</strong>. Both facilities feature luxury student workstations and sterile practice setups.
                    </div>
                </div>

                {{-- FAQ Item 2 --}}
                <div class="bg-white rounded-2xl border border-slate-200/80 shadow-sm overflow-hidden">
                    <button @click="active = (active === 2 ? null : 2)"
                        class="w-full text-left p-6 flex items-center justify-between gap-4 focus:outline-none">
                        <span class="text-base sm:text-lg font-bold text-slate-900 font-heading">Are practical training tools provided during the masterclass?</span>
                        <span class="w-8 h-8 rounded-full bg-slate-100 text-slate-700 flex items-center justify-center text-sm font-bold transition-transform duration-300"
                            :class="{ 'rotate-180 bg-yellow-400 text-slate-950': active === 2 }">
                            ↓
                        </span>
                    </button>
                    <div x-show="active === 2" x-collapse x-cloak class="px-6 pb-6 text-sm text-slate-600 leading-relaxed border-t border-slate-100 pt-4 font-medium">
                        Yes! Every student enrolled in our Lashes Artistry or Pro Makeup Masterclass is provided with complete practical training equipment including high-grade tweezers, lash trays, adhesives, makeup palettes, and safety accessories to use throughout your hands-on studio training sessions.
                    </div>
                </div>

                {{-- FAQ Item 3 --}}
                <div class="bg-white rounded-2xl border border-slate-200/80 shadow-sm overflow-hidden">
                    <button @click="active = (active === 3 ? null : 3)"
                        class="w-full text-left p-6 flex items-center justify-between gap-4 focus:outline-none">
                        <span class="text-base sm:text-lg font-bold text-slate-900 font-heading">What certification will I receive after graduation?</span>
                        <span class="w-8 h-8 rounded-full bg-slate-100 text-slate-700 flex items-center justify-center text-sm font-bold transition-transform duration-300"
                            :class="{ 'rotate-180 bg-yellow-400 text-slate-950': active === 3 }">
                            ↓
                        </span>
                    </button>
                    <div x-show="active === 3" x-collapse x-cloak class="px-6 pb-6 text-sm text-slate-600 leading-relaxed border-t border-slate-100 pt-4 font-medium">
                        Upon successfully completing practical assessments and model evaluation, you will be awarded an officially recognized Certificate of Completion in your masterclass field.
                    </div>
                </div>

                {{-- FAQ Item 4 --}}
                <div class="bg-white rounded-2xl border border-slate-200/80 shadow-sm overflow-hidden">
                    <button @click="active = (active === 4 ? null : 4)"
                        class="w-full text-left p-6 flex items-center justify-between gap-4 focus:outline-none">
                        <span class="text-base sm:text-lg font-bold text-slate-900 font-heading">What are the class schedules?</span>
                        <span class="w-8 h-8 rounded-full bg-slate-100 text-slate-700 flex items-center justify-center text-sm font-bold transition-transform duration-300"
                            :class="{ 'rotate-180 bg-yellow-400 text-slate-950': active === 4 }">
                            ↓
                        </span>
                    </button>
                    <div x-show="active === 4" x-collapse x-cloak class="px-6 pb-6 text-sm text-slate-600 leading-relaxed border-t border-slate-100 pt-4 font-medium">
                        We offer flexible weekday full-time tracks, evening masterclasses, and weekend intensive sessions to accommodate working professionals and full-time students.
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ====== CLEAN WHITE CALL TO ACTION (CTA) ====== --}}
    <section class="py-24 bg-white text-slate-900 relative overflow-hidden border-t border-slate-200/80">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center space-y-8">
            <div class="inline-flex items-center gap-2 bg-yellow-400/15 text-yellow-800 font-extrabold px-4.5 py-2 rounded-full text-xs uppercase tracking-widest border border-yellow-400/40 shadow-xs">
                <span class="w-2 h-2 rounded-full bg-yellow-500 animate-ping"></span>
                <span>Next Intake Applications Open</span>
            </div>

            <h2 class="text-4xl sm:text-6xl font-extrabold tracking-tight font-heading text-slate-900 max-w-4xl mx-auto leading-tight">
                Transform Your Passion Into a <span class="text-amber-600">Profitable Beauty Business</span>
            </h2>

            <p class="text-slate-600 max-w-2xl mx-auto text-base sm:text-lg font-medium leading-relaxed">
                Join East Africa's leading beauty academy in <strong class="text-slate-900">Kigali (Rwanda)</strong> or <strong class="text-slate-900">Nairobi & Mombasa (Kenya)</strong>. Secure your practical studio seat today.
            </p>

            <div class="flex flex-wrap justify-center gap-4 pt-4">
                <a href="{{ route('apply') }}"
                    class="inline-flex items-center gap-3 bg-yellow-400 hover:bg-yellow-300 text-slate-950 font-extrabold px-9 py-4 rounded-xl shadow-lg hover:shadow-yellow-400/30 transition-all text-xs uppercase tracking-wider">
                    <span>Apply for Intake →</span>
                </a>
                <a href="{{ route('login') }}"
                    class="inline-flex items-center gap-3 bg-slate-950 hover:bg-slate-900 text-white font-extrabold px-9 py-4 rounded-xl shadow-md transition-all text-xs uppercase tracking-wider">
                    <span>Student Portal Login</span>
                </a>
            </div>

            <div class="pt-8 flex flex-wrap justify-center items-center gap-6 text-xs text-slate-600 font-semibold border-t border-slate-100 max-w-3xl mx-auto">
                <div class="flex items-center gap-2">
                    <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                    <span>Kigali, Rwanda Hub</span>
                </div>
                <div class="flex items-center gap-2">
                    <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                    <span>Nairobi & Mombasa, Kenya Hubs</span>
                </div>
                <div class="flex items-center gap-2">
                    <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                    <span>Hands-On Training Tools & Certification Included</span>
                </div>
            </div>
        </div>
    </section>

    {{-- ====== FOOTER ====== --}}
    <footer class="bg-slate-950 text-slate-400 py-16 border-t border-slate-800/80">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-10 mb-12">
                {{-- Brand Info --}}
                <div class="space-y-4 md:col-span-1">
                    <a href="{{ route('home') }}" class="flex items-center gap-3">
                        <img src="{{ asset('images/logo.png') }}" alt="Diva House Beauty Academy Logo" class="h-10 w-auto object-contain">
                        <div>
                            <span class="text-base font-bold text-white font-heading">DIVA HOUSE BEAUTY ACADEMY</span>
                            <p class="text-xs text-yellow-400 font-semibold">East Africa Regional Training Hubs</p>
                        </div>
                    </a>
                    <p class="text-xs text-slate-400 leading-relaxed font-medium">
                        Empowering aspiring beauty professionals with hands-on certification masterclasses in Lashes Artistry and Pro Makeup across Rwanda (Kigali) and Kenya (Nairobi & Mombasa).
                    </p>
                </div>

                {{-- Quick Links --}}
                <div class="space-y-3">
                    <h4 class="text-xs font-bold text-white uppercase tracking-wider font-heading">Academy</h4>
                    <ul class="space-y-2 text-xs font-medium">
                        <li><a href="{{ route('home') }}" class="hover:text-yellow-400 transition-colors">Home</a></li>
                        <li><a href="{{ route('courses') }}" class="hover:text-yellow-400 transition-colors">Training Courses</a></li>
                        <li><a href="{{ route('campuses') }}" class="hover:text-yellow-400 transition-colors">Campuses (RW & KE)</a></li>
                        <li><a href="{{ route('certifications') }}" class="hover:text-yellow-400 transition-colors">Certification</a></li>
                        <li><a href="{{ route('apply') }}" class="hover:text-yellow-400 transition-colors">Apply for Intake</a></li>
                        <li><a href="{{ route('login') }}" class="hover:text-yellow-400 transition-colors">Student Portal</a></li>
                    </ul>
                </div>

                {{-- Locations --}}
                <div class="space-y-3">
                    <h4 class="text-xs font-bold text-white uppercase tracking-wider font-heading">Hub Locations</h4>
                    <ul class="space-y-2 text-xs font-medium text-slate-400">
                        <li><strong class="text-slate-200">Rwanda:</strong> Kigali Campus</li>
                        <li><strong class="text-slate-200">Kenya:</strong> Nairobi Flagship Campus</li>
                        <li><strong class="text-slate-200">Kenya:</strong> Mombasa Coastal Campus</li>
                    </ul>
                </div>

                {{-- Contact & Phone Numbers --}}
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