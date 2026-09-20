<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Apply for Next Intake | Diva House Beauty Academy</title>
    <meta name="description"
        content="Submit your student intake application for Lashes Artistry or Pro Makeup Masterclass at Diva House Beauty Academy in Kigali (Rwanda), Nairobi (Kenya), or Mombasa (Kenya).">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Outfit:wght@600;700;800;900&display=swap"
        rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        [x-cloak] { display: none !important; }
        body { font-family: 'Inter', sans-serif; }
        h1, h2, h3, .font-heading { font-family: 'Outfit', sans-serif; }
    </style>
</head>

<body class="antialiased bg-slate-50/50 text-slate-900 selection:bg-yellow-400 selection:text-slate-950">

    {{-- ====== NAVBAR ====== --}}
    <x-navbar />

    {{-- ====== PAGE HEADER ====== --}}
    <section class="bg-gradient-to-b from-amber-100/60 via-amber-50/30 to-slate-50 py-16 sm:py-20 border-b border-slate-200/80">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-4">
            <div class="inline-flex items-center gap-2 bg-yellow-400 text-slate-950 rounded-full px-4 py-1.5 font-extrabold text-xs uppercase tracking-widest shadow-sm">
                <span class="w-2 h-2 rounded-full bg-slate-950 animate-pulse"></span>
                <span>Applications Open · Kigali, Nairobi & Mombasa</span>
            </div>
            <h1 class="text-4xl sm:text-6xl font-extrabold text-slate-900 font-heading tracking-tight">
                Apply for Upcoming Intake
            </h1>
            <p class="text-slate-600 text-base sm:text-lg font-medium max-w-xl mx-auto leading-relaxed">
                Secure your practical studio seat in Lashes Artistry or Pro Makeup Artistry. Complete the simple 2-step application below.
            </p>
        </div>
    </section>

    {{-- ====== APPLICATION FORM SECTION ====== --}}
    @php
        $coursesJson = $courses->map(function($c) {
            return [
                'id' => $c->id,
                'name' => $c->name,
                'slug' => $c->slug,
                'price_rwf' => $c->price_rwf,
                'price_kes' => $c->price_kes,
                'price_usd' => $c->price_usd,
            ];
        })->values();
    @endphp

    <section class="py-16 sm:py-20 bg-slate-50/50" x-data="{
        step: 1,
        coursesData: {{ json_encode($coursesJson) }},
        selectedCourseId: {{ $courses->first() ? $courses->first()->id : 1 }},
        location: 'Kigali',
        schedule: 'fulltime',
        fullName: '',
        email: '',
        phoneCode: '+250',
        phone: '',
        experience: 'Beginner',
        notes: '',
        promoCode: '',
        promoApplied: false,
        promoLoading: false,
        promoMessage: '',
        discountAmount: 0,
        finalPrice: 0,
        originalPrice: 0,
        currency: 'RWF',
        submitted: false,
        submitting: false,
        resultData: null,

        get currentCourse() {
            return this.coursesData.find(c => c.id === this.selectedCourseId) || this.coursesData[0];
        },

        updatePricing() {
            if (this.location === 'Kigali') {
                this.currency = 'RWF';
                this.originalPrice = this.currentCourse ? this.currentCourse.price_rwf : 350000;
            } else if (this.location === 'Nairobi' || this.location === 'Mombasa') {
                this.currency = 'KES';
                this.originalPrice = this.currentCourse ? this.currentCourse.price_kes : 3500;
            } else {
                this.currency = 'USD';
                this.originalPrice = this.currentCourse ? this.currentCourse.price_usd : 350;
            }
            if (!this.promoApplied) {
                this.finalPrice = this.originalPrice;
                this.discountAmount = 0;
            } else {
                this.validatePromo();
            }
        },

        async validatePromo() {
            if (!this.promoCode) {
                this.promoApplied = false;
                this.promoMessage = '';
                this.updatePricing();
                return;
            }
            this.promoLoading = true;
            this.promoMessage = '';
            try {
                const res = await fetch('{{ route('apply.validate-code') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content
                    },
                    body: JSON.stringify({
                        code: this.promoCode,
                        course_id: this.selectedCourseId,
                        location: this.location
                    })
                });
                const data = await res.json();
                if (res.ok && data.valid) {
                    this.promoApplied = true;
                    this.discountAmount = data.discount_amount;
                    this.finalPrice = data.final_price;
                    this.originalPrice = data.original_price;
                    this.currency = data.currency;
                    this.promoMessage = data.message;
                } else {
                    this.promoApplied = false;
                    this.discountAmount = 0;
                    this.finalPrice = this.originalPrice;
                    this.promoMessage = data.message || 'Invalid promo code';
                }
            } catch (err) {
                this.promoMessage = 'Error validating code. Please try again.';
            } finally {
                this.promoLoading = false;
            }
        },

        async submitForm() {
            if (!this.fullName || !this.email || !this.phone) {
                alert('Please fill out all required contact fields (Name, Email, and Phone).');
                return;
            }
            this.submitting = true;
            try {
                const res = await fetch('{{ route('apply.submit') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content
                    },
                    body: JSON.stringify({
                        full_name: this.fullName,
                        email: this.email,
                        phone_code: this.phoneCode,
                        phone: this.phone,
                        course_id: this.selectedCourseId,
                        location: this.location,
                        schedule: this.schedule,
                        experience: this.experience,
                        notes: this.notes,
                        promo_code: this.promoApplied ? this.promoCode : ''
                    })
                });
                const data = await res.json();
                if (res.ok && data.success) {
                    this.resultData = data;
                    this.submitted = true;
                    window.scrollTo({ top: 200, behavior: 'smooth' });
                } else {
                    alert(data.message || 'Submission failed. Please check form fields.');
                }
            } catch (err) {
                alert('Submission error. Please check your internet connection.');
            } finally {
                this.submitting = false;
            }
        }
    }" x-init="updatePricing(); $watch('location', () => updatePricing()); $watch('selectedCourseId', () => updatePricing());">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- SUCCESS CONFIRMATION STATE --}}
            <div x-show="submitted" x-cloak class="bg-white rounded-3xl p-8 sm:p-12 border border-emerald-200 shadow-xl text-center space-y-6">
                <div class="w-20 h-20 bg-emerald-100 text-emerald-700 rounded-full flex items-center justify-center mx-auto text-3xl font-extrabold shadow-inner">
                    ✓
                </div>
                <div class="space-y-2">
                    <span class="text-xs font-extrabold uppercase tracking-widest bg-emerald-50 text-emerald-700 px-3 py-1 rounded-full border border-emerald-200">
                        Application Registered
                    </span>
                    <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 font-heading">
                        Congratulations, <span x-text="fullName"></span>!
                    </h2>
                    <p class="text-slate-600 text-sm sm:text-base max-w-lg mx-auto font-medium leading-relaxed">
                        Your intake application <strong class="text-amber-600" x-text="resultData ? resultData.reference_no : ''"></strong> has been submitted to the admissions portal.
                    </p>
                </div>

                <div class="bg-slate-50 rounded-2xl p-6 border border-slate-200/80 text-left max-w-md mx-auto space-y-3 text-xs">
                    <div class="flex justify-between border-b border-slate-200/60 pb-2">
                        <span class="text-slate-500 font-semibold">Reference Number:</span>
                        <strong class="text-amber-600 font-bold" x-text="resultData ? resultData.reference_no : ''"></strong>
                    </div>
                    <div class="flex justify-between border-b border-slate-200/60 pb-2">
                        <span class="text-slate-500 font-semibold">Program:</span>
                        <strong class="text-slate-900 font-bold" x-text="currentCourse ? currentCourse.name : ''"></strong>
                    </div>
                    <div class="flex justify-between border-b border-slate-200/60 pb-2">
                        <span class="text-slate-500 font-semibold">Campus Location:</span>
                        <strong class="text-slate-900 font-bold" x-text="location + ' Studio'"></strong>
                    </div>
                    <div class="flex justify-between border-b border-slate-200/60 pb-2">
                        <span class="text-slate-500 font-semibold">Schedule Track:</span>
                        <strong class="text-slate-900 font-bold" x-text="schedule === 'fulltime' ? 'Full-Time Weekday' : (schedule === 'evening' ? 'Evening Masterclass' : 'Weekend Intensive')"></strong>
                    </div>
                    
                    {{-- Financial Breakdown --}}
                    <div class="pt-2 border-t border-slate-200 space-y-1.5">
                        <div class="flex justify-between">
                            <span class="text-slate-500 font-semibold">Original Tuition:</span>
                            <span class="text-slate-900 font-bold" x-text="(resultData ? Number(resultData.original_price).toLocaleString() : 0) + ' ' + currency"></span>
                        </div>
                        <template x-if="resultData && resultData.discount_amount > 0">
                            <div class="flex justify-between text-emerald-600">
                                <span class="font-semibold">Promo Discount Applied:</span>
                                <span class="font-bold" x-text="'- ' + Number(resultData.discount_amount).toLocaleString() + ' ' + currency"></span>
                            </div>
                        </template>
                        <div class="flex justify-between pt-1 text-sm border-t border-slate-200">
                            <span class="text-slate-900 font-extrabold">Final Payable Tuition:</span>
                            <strong class="text-amber-600 font-extrabold" x-text="(resultData ? Number(resultData.final_price).toLocaleString() : 0) + ' ' + currency"></strong>
                        </div>
                    </div>
                </div>

                <div class="bg-amber-50/80 rounded-2xl p-4 border border-amber-200 text-left max-w-md mx-auto space-y-1">
                    <p class="text-xs font-bold text-amber-900 flex items-center gap-1.5">
                        <span class="w-2 h-2 rounded-full bg-amber-500 animate-pulse"></span>
                        <span>Next Step: Tuition Payment Verification</span>
                    </p>
                    <p class="text-[11px] text-amber-800 leading-relaxed font-medium">
                        Our admissions officer will message your WhatsApp (<strong x-text="phoneCode + ' ' + phone"></strong>) within 24 hours with studio payment numbers (MoMo / M-PESA / Bank). Once payment is received, your seat will be officially confirmed!
                    </p>
                </div>

                <div class="pt-4 flex flex-wrap justify-center gap-4">
                    <a href="{{ route('home') }}" class="inline-flex items-center gap-2 bg-slate-950 hover:bg-slate-900 text-white font-extrabold px-8 py-3.5 rounded-xl shadow-md text-xs uppercase tracking-wider">
                        Return to Homepage
                    </a>
                    <a href="{{ route('courses') }}" class="inline-flex items-center gap-2 bg-slate-100 hover:bg-slate-200 text-slate-900 font-extrabold px-8 py-3.5 rounded-xl text-xs uppercase tracking-wider">
                        View Course Details
                    </a>
                </div>
            </div>

            {{-- MAIN FORM CONTAINER --}}
            <div x-show="!submitted" class="bg-white rounded-3xl border border-slate-200/80 shadow-lg p-6 sm:p-10 space-y-8">
                
                {{-- Step Progress Bar --}}
                <div class="flex items-center justify-between pb-6 border-b border-slate-100">
                    <div class="flex items-center gap-3">
                        <span :class="step === 1 ? 'bg-yellow-400 text-slate-950 font-extrabold' : 'bg-emerald-500 text-white font-extrabold'"
                            class="w-8 h-8 rounded-full flex items-center justify-center text-xs shadow-xs">
                            <template x-if="step === 1"><span>1</span></template>
                            <template x-if="step === 2"><span>✓</span></template>
                        </span>
                        <div>
                            <p class="text-xs font-bold text-slate-900 font-heading">Step 1: Program & Location</p>
                            <p class="text-[11px] text-slate-500">Select course, studio, & schedule</p>
                        </div>
                    </div>

                    <div class="w-12 sm:w-24 h-0.5 bg-slate-200"></div>

                    <div class="flex items-center gap-3">
                        <span :class="step === 2 ? 'bg-yellow-400 text-slate-950 font-extrabold' : 'bg-slate-200 text-slate-500 font-bold'"
                            class="w-8 h-8 rounded-full flex items-center justify-center text-xs">
                            2
                        </span>
                        <div>
                            <p class="text-xs font-bold text-slate-900 font-heading">Step 2: Contact & Pricing</p>
                            <p class="text-[11px] text-slate-500">Details & promo discounts</p>
                        </div>
                    </div>
                </div>

                {{-- STEP 1: PROGRAM & LOCATION SELECTOR --}}
                <div x-show="step === 1" class="space-y-8">
                    
                    {{-- Course Selection Cards --}}
                    <div class="space-y-4">
                        <label class="block text-sm font-extrabold text-slate-900 uppercase tracking-wider font-heading">
                            1. Select Masterclass Program *
                        </label>
                        <div class="grid sm:grid-cols-2 gap-5">
                            @foreach($courses as $c)
                            <div @click="selectedCourseId = {{ $c->id }}"
                                :class="selectedCourseId === {{ $c->id }} ? 'border-amber-400 bg-amber-50/40 ring-2 ring-amber-400/50 shadow-md' : 'border-slate-200 bg-white hover:border-slate-300'"
                                class="cursor-pointer rounded-2xl border p-5 transition-all flex flex-col justify-between space-y-4 group">
                                <div class="space-y-3">
                                    <div class="flex items-center justify-between">
                                        <span class="text-[10px] font-extrabold uppercase bg-yellow-400 text-slate-950 px-2.5 py-0.5 rounded-full">Certified</span>
                                        <span x-show="selectedCourseId === {{ $c->id }}" class="w-5 h-5 rounded-full bg-amber-500 text-white font-extrabold text-[10px] flex items-center justify-center">✓</span>
                                    </div>
                                    <h3 class="text-xl font-bold text-slate-900 font-heading">{{ $c->name }}</h3>
                                    <p class="text-xs text-slate-600 font-medium leading-relaxed">
                                        {{ $c->description }}
                                    </p>
                                </div>
                                <div class="pt-2 flex items-center justify-between border-t border-slate-100/80">
                                    <span class="text-xs font-extrabold text-slate-900">
                                        <template x-if="location === 'Kigali'">
                                            <span>{{ number_format($c->price_rwf) }} RWF</span>
                                        </template>
                                        <template x-if="location === 'Nairobi' || location === 'Mombasa'">
                                            <span>{{ number_format($c->price_kes) }} KES</span>
                                        </template>
                                        <template x-if="location !== 'Kigali' && location !== 'Nairobi' && location !== 'Mombasa'">
                                            <span>${{ number_format($c->price_usd) }} USD</span>
                                        </template>
                                    </span>
                                    <span class="text-[11px] font-bold text-amber-700">Studio Kit Included →</span>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    {{-- Location Selection --}}
                    <div class="space-y-4">
                        <label class="block text-sm font-extrabold text-slate-900 uppercase tracking-wider font-heading">
                            2. Select Preferred Studio Campus *
                        </label>
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                            <button type="button" @click="location = 'Kigali'; phoneCode = '+250'"
                                :class="location === 'Kigali' ? 'bg-slate-950 text-white font-extrabold shadow-md border-slate-950' : 'bg-slate-50 text-slate-700 border-slate-200 hover:bg-slate-100 font-semibold'"
                                class="p-4 rounded-xl border text-left transition-all space-y-1">
                                <div class="flex items-center justify-between">
                                    <span class="text-xs font-bold text-amber-400 uppercase">Rwanda Hub</span>
                                    <span class="text-[10px] bg-slate-800 text-amber-300 font-extrabold px-2 py-0.5 rounded">RWF</span>
                                </div>
                                <span class="text-base font-bold font-heading block">Kigali Studio</span>
                            </button>

                            <button type="button" @click="location = 'Nairobi'; phoneCode = '+254'"
                                :class="location === 'Nairobi' ? 'bg-slate-950 text-white font-extrabold shadow-md border-slate-950' : 'bg-slate-50 text-slate-700 border-slate-200 hover:bg-slate-100 font-semibold'"
                                class="p-4 rounded-xl border text-left transition-all space-y-1">
                                <div class="flex items-center justify-between">
                                    <span class="text-xs font-bold text-amber-400 uppercase">Kenya Flagship</span>
                                    <span class="text-[10px] bg-slate-800 text-amber-300 font-extrabold px-2 py-0.5 rounded">KES</span>
                                </div>
                                <span class="text-base font-bold font-heading block">Nairobi Hub</span>
                            </button>

                            <button type="button" @click="location = 'Mombasa'; phoneCode = '+254'"
                                :class="location === 'Mombasa' ? 'bg-slate-950 text-white font-extrabold shadow-md border-slate-950' : 'bg-slate-50 text-slate-700 border-slate-200 hover:bg-slate-100 font-semibold'"
                                class="p-4 rounded-xl border text-left transition-all space-y-1">
                                <div class="flex items-center justify-between">
                                    <span class="text-xs font-bold text-amber-400 uppercase">Kenya Coastal</span>
                                    <span class="text-[10px] bg-slate-800 text-amber-300 font-extrabold px-2 py-0.5 rounded">KES</span>
                                </div>
                                <span class="text-base font-bold font-heading block">Mombasa Hub</span>
                            </button>
                        </div>
                    </div>

                    {{-- Schedule Preference --}}
                    <div class="space-y-4">
                        <label class="block text-sm font-extrabold text-slate-900 uppercase tracking-wider font-heading">
                            3. Select Class Schedule Track *
                        </label>
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                            <label @click="schedule = 'fulltime'"
                                :class="schedule === 'fulltime' ? 'border-amber-400 bg-amber-50/40 text-slate-900 font-bold' : 'border-slate-200 bg-slate-50 text-slate-700'"
                                class="cursor-pointer p-4 rounded-xl border flex items-center gap-3 text-xs transition-all">
                                <input type="radio" name="schedule" value="fulltime" x-model="schedule" class="text-amber-500 focus:ring-amber-400">
                                <div>
                                    <span class="block font-bold">Full-Time Weekday</span>
                                    <span class="text-[11px] text-slate-500">Mon - Thu (Morning/Afternoon)</span>
                                </div>
                            </label>

                            <label @click="schedule = 'evening'"
                                :class="schedule === 'evening' ? 'border-amber-400 bg-amber-50/40 text-slate-900 font-bold' : 'border-slate-200 bg-slate-50 text-slate-700'"
                                class="cursor-pointer p-4 rounded-xl border flex items-center gap-3 text-xs transition-all">
                                <input type="radio" name="schedule" value="evening" x-model="schedule" class="text-amber-500 focus:ring-amber-400">
                                <div>
                                    <span class="block font-bold">Evening Masterclass</span>
                                    <span class="text-[11px] text-slate-500">Flexible Evening Hours</span>
                                </div>
                            </label>

                            <label @click="schedule = 'weekend'"
                                :class="schedule === 'weekend' ? 'border-amber-400 bg-amber-50/40 text-slate-900 font-bold' : 'border-slate-200 bg-slate-50 text-slate-700'"
                                class="cursor-pointer p-4 rounded-xl border flex items-center gap-3 text-xs transition-all">
                                <input type="radio" name="schedule" value="weekend" x-model="schedule" class="text-amber-500 focus:ring-amber-400">
                                <div>
                                    <span class="block font-bold">Weekend Intensive</span>
                                    <span class="text-[11px] text-slate-500">Saturday & Sunday Sessions</span>
                                </div>
                            </label>
                        </div>
                    </div>

                    {{-- Next Step Button --}}
                    <div class="pt-4 flex justify-end">
                        <button type="button" @click="step = 2"
                            class="inline-flex items-center gap-2 bg-yellow-400 hover:bg-yellow-300 text-slate-950 font-extrabold px-8 py-4 rounded-xl shadow-md transition-all text-xs uppercase tracking-wider">
                            <span>Continue to Step 2 →</span>
                        </button>
                    </div>
                </div>

                {{-- STEP 2: STUDENT CONTACT & PROMO PRICING --}}
                <div x-show="step === 2" class="space-y-6">
                    <div class="space-y-1">
                        <h3 class="text-lg font-bold text-slate-900 font-heading">Student Contact & Tuition Summary</h3>
                        <p class="text-xs text-slate-500">Enter your contact info and apply an influencer promo code if you have one.</p>
                    </div>

                    <div class="space-y-4 text-xs">
                        {{-- Full Name --}}
                        <div>
                            <label class="block font-bold text-slate-700 mb-1.5 uppercase tracking-wider">Full Name *</label>
                            <input type="text" x-model="fullName" placeholder="e.g. Keza Grace / Amina Wanjiku" required
                                class="w-full rounded-xl border-slate-300 p-3.5 text-sm focus:ring-amber-400 focus:border-amber-400 bg-slate-50/50">
                        </div>

                        {{-- Email Address --}}
                        <div>
                            <label class="block font-bold text-slate-700 mb-1.5 uppercase tracking-wider">Email Address *</label>
                            <input type="email" x-model="email" placeholder="student@example.com" required
                                class="w-full rounded-xl border-slate-300 p-3.5 text-sm focus:ring-amber-400 focus:border-amber-400 bg-slate-50/50">
                        </div>

                        {{-- WhatsApp / Phone --}}
                        <div>
                            <label class="block font-bold text-slate-700 mb-1.5 uppercase tracking-wider">WhatsApp / Phone Number *</label>
                            <div class="flex gap-2">
                                <select x-model="phoneCode" class="rounded-xl border-slate-300 p-3.5 text-xs font-bold bg-slate-100 text-slate-800">
                                    <option value="+250">🇷🇼 +250 (Rwanda)</option>
                                    <option value="+254">🇰🇪 +254 (Kenya)</option>
                                    <option value="+255">🇹ℤ +255 (Tanzania)</option>
                                    <option value="+256">🇺🇬 +256 (Uganda)</option>
                                </select>
                                <input type="tel" x-model="phone" placeholder="788 123 456" required
                                    class="flex-1 rounded-xl border-slate-300 p-3.5 text-sm focus:ring-amber-400 focus:border-amber-400 bg-slate-50/50">
                            </div>
                        </div>

                        {{-- Previous Experience --}}
                        <div>
                            <label class="block font-bold text-slate-700 mb-1.5 uppercase tracking-wider">Prior Beauty Experience Level</label>
                            <select x-model="experience" class="w-full rounded-xl border-slate-300 p-3.5 text-xs font-semibold bg-slate-50/50">
                                <option value="Beginner">Complete Beginner (No prior experience)</option>
                                <option value="Self-Taught">Self-Taught / Enthusiast</option>
                                <option value="Practicing">Practicing Beauty Technician (Upskilling)</option>
                            </select>
                        </div>

                        {{-- Additional Notes --}}
                        <div>
                            <label class="block font-bold text-slate-700 mb-1.5 uppercase tracking-wider">Questions or Additional Notes (Optional)</label>
                            <textarea x-model="notes" rows="2" placeholder="Tell us any specific questions or preferred start dates..."
                                class="w-full rounded-xl border-slate-300 p-3.5 text-xs focus:ring-amber-400 focus:border-amber-400 bg-slate-50/50"></textarea>
                        </div>

                        {{-- PROMO CODE BOX --}}
                        <div class="bg-amber-50/50 p-5 rounded-2xl border border-amber-200/80 space-y-3">
                            <label class="block font-bold text-slate-900 uppercase tracking-wider flex items-center justify-between">
                                <span>Have an Influencer Promo Code?</span>
                                <span class="text-[10px] text-amber-700 bg-yellow-400 text-slate-950 font-extrabold px-2 py-0.5 rounded-full">Discount Available</span>
                            </label>

                            <div class="flex gap-2">
                                <input type="text" x-model="promoCode" placeholder="Enter Code (e.g. DIVA2026 / KEZA10)"
                                    @keyup.enter="validatePromo()"
                                    class="flex-1 rounded-xl border-slate-300 p-3 text-xs uppercase tracking-wider font-extrabold focus:ring-amber-400 focus:border-amber-400 bg-white">
                                <button type="button" @click="validatePromo()" :disabled="promoLoading"
                                    class="bg-slate-950 hover:bg-slate-900 text-white font-extrabold px-5 py-3 rounded-xl transition-all text-xs uppercase tracking-wider">
                                    <span x-show="!promoLoading">Apply Code</span>
                                    <span x-show="promoLoading" x-cloak>Validating...</span>
                                </button>
                            </div>

                            {{-- Promo Code Status Feedback --}}
                            <div x-show="promoMessage" x-cloak class="text-xs font-semibold">
                                <p :class="promoApplied ? 'text-emerald-700 font-bold bg-emerald-50 px-3 py-1.5 rounded-lg border border-emerald-200 inline-block' : 'text-rose-600 bg-rose-50 px-3 py-1.5 rounded-lg border border-rose-200 inline-block'" x-text="promoMessage"></p>
                            </div>
                        </div>

                        {{-- DYNAMIC DUAL PRICE BREAKDOWN BOX --}}
                        <div class="bg-slate-950 text-white p-6 rounded-2xl space-y-3 shadow-md">
                            <div class="flex items-center justify-between border-b border-slate-800 pb-3">
                                <div>
                                    <h4 class="text-sm font-bold font-heading text-white">Tuition Price Calculation</h4>
                                    <p class="text-[11px] text-slate-400" x-text="location + ' Studio (' + currency + ')'"></p>
                                </div>
                                <span class="text-xs font-extrabold uppercase bg-amber-400 text-slate-950 px-3 py-1 rounded-full" x-text="currency"></span>
                            </div>

                            <div class="space-y-2 text-xs">
                                <div class="flex justify-between text-slate-400">
                                    <span>Base Tuition:</span>
                                    <span class="font-bold text-slate-200" x-text="Number(originalPrice).toLocaleString() + ' ' + currency"></span>
                                </div>

                                <div x-show="promoApplied" x-cloak class="flex justify-between text-emerald-400 font-semibold">
                                    <span>Influencer Promo Discount:</span>
                                    <span class="font-extrabold" x-text="'- ' + Number(discountAmount).toLocaleString() + ' ' + currency"></span>
                                </div>

                                <div class="flex justify-between items-center pt-3 border-t border-slate-800 text-sm sm:text-base">
                                    <span class="font-bold text-white">Final Payable Tuition:</span>
                                    <strong class="text-yellow-400 font-extrabold font-heading text-lg sm:text-xl" x-text="Number(finalPrice).toLocaleString() + ' ' + currency"></strong>
                                </div>
                            </div>
                        </div>

                    </div>

                    {{-- Form Action Buttons --}}
                    <div class="pt-4 flex items-center justify-between border-t border-slate-100">
                        <button type="button" @click="step = 1"
                            class="px-6 py-3.5 rounded-xl text-xs font-bold text-slate-600 bg-slate-100 hover:bg-slate-200 transition-colors uppercase tracking-wider">
                            ← Back to Step 1
                        </button>
                        <button type="button" @click="submitForm()" :disabled="submitting"
                            class="inline-flex items-center gap-2 bg-yellow-400 hover:bg-yellow-300 text-slate-950 font-extrabold px-9 py-4 rounded-xl shadow-lg transition-all text-xs uppercase tracking-wider">
                            <span x-show="!submitting">Submit Application →</span>
                            <span x-show="submitting" x-cloak>Submitting Application...</span>
                        </button>
                    </div>
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
