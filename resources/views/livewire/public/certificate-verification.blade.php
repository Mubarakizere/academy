<div id="verify-section" class="max-w-4xl mx-auto space-y-8">
    
    {{-- Search Card (Light White Design) --}}
    <div class="bg-white rounded-3xl p-8 sm:p-12 text-slate-900 shadow-xl border border-slate-200/90 space-y-6 relative overflow-hidden">
        
        {{-- Background Glow --}}
        <div class="absolute -top-24 -right-24 w-64 h-64 bg-amber-400/10 rounded-full blur-3xl pointer-events-none"></div>

        <div class="text-center space-y-3 relative z-10">
            <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-amber-50 border border-amber-200 text-amber-800 text-xs font-black uppercase tracking-widest">
                <svg class="w-4 h-4 text-amber-600" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>Instant Graduate Verification System</span>
            </div>
            <h2 class="text-3xl sm:text-4xl font-black font-heading text-slate-900 tracking-tight">
                Verify Alumna Training & Certificate
            </h2>
            <p class="text-slate-600 text-xs sm:text-sm max-w-xl mx-auto font-medium leading-relaxed">
                Enter a graduate's full name or certificate ID to confirm their training credentials with Diva House Beauty Academy (Rwanda & Kenya).
            </p>
        </div>

        {{-- Search Input Form --}}
        <form wire:submit.prevent="searchCertificates" class="relative max-w-2xl mx-auto z-10">
            <div class="flex flex-col sm:flex-row items-center gap-3">
                <div class="relative flex-1 w-full">
                    <svg class="w-5 h-5 text-slate-400 absolute left-4 top-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                    </svg>
                    <input type="text" wire:model="query" required
                        placeholder="Enter student name or certificate ID (e.g. DH-2026-9842)..."
                        class="w-full pl-12 pr-4 py-4 rounded-2xl bg-slate-50 border border-slate-200 text-slate-900 text-sm font-bold placeholder:text-slate-400 focus:bg-white focus:ring-2 focus:ring-amber-400 focus:border-amber-400 outline-none transition-all">
                </div>

                <button type="submit"
                    class="w-full sm:w-auto px-8 py-4 rounded-2xl bg-slate-950 hover:bg-slate-900 text-amber-400 font-black text-xs uppercase tracking-wider shadow-md hover:shadow-lg transition-all shrink-0">
                    Verify Credential →
                </button>
            </div>
        </form>

    </div>

    {{-- Search Results Feed --}}
    @if($searched)
        <div class="space-y-6">
            
            @if($results->isNotEmpty())
                <div class="text-center space-y-1">
                    <span class="text-xs font-black text-emerald-600 uppercase tracking-widest">Verified Graduate Matches</span>
                    <h3 class="text-xl font-black text-slate-900 font-heading">
                        Found {{ $results->count() }} Certified Record{{ $results->count() > 1 ? 's' : '' }}
                    </h3>
                </div>

                {{-- Multiple Results Selection --}}
                @if($results->count() > 1 && !$selectedCert)
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        @foreach($results as $res)
                            <div wire:click="selectCert({{ $res->id }})"
                                class="bg-white rounded-2xl p-6 border border-slate-200/80 shadow-sm hover:shadow-md cursor-pointer transition-all hover:border-amber-400 group">
                                <div class="flex items-center justify-between mb-3">
                                    <span class="font-mono text-xs font-extrabold bg-slate-100 px-2.5 py-1 rounded-md text-slate-800">
                                        {{ $res->certificate_number }}
                                    </span>
                                    <span class="px-2 py-0.5 rounded-full bg-emerald-50 text-emerald-700 text-[10px] font-bold">
                                        Verified
                                    </span>
                                </div>
                                <h4 class="text-lg font-bold text-slate-900 group-hover:text-amber-600 transition-colors">{{ $res->student_name }}</h4>
                                <p class="text-xs text-slate-600 font-medium mt-1">{{ $res->course_name }}</p>
                                <p class="text-[11px] text-slate-400 mt-2">{{ $res->location }} &bull; {{ $res->issue_date?->format('M Y') }}</p>
                                <div class="mt-4 pt-3 border-t border-slate-100 flex items-center justify-between text-xs font-bold text-amber-600">
                                    <span>View Official Certificate Card</span>
                                    <span>→</span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif

                {{-- Official Displayed Digital Certificate Card --}}
                @if($selectedCert)
                    <div class="relative bg-gradient-to-b from-amber-500/10 via-white to-amber-500/5 rounded-3xl p-6 sm:p-12 border-2 border-amber-400/60 shadow-2xl space-y-8 text-center text-slate-900">
                        
                        {{-- Top Header Brand Seal --}}
                        <div class="flex flex-col items-center gap-3">
                            <div class="w-16 h-16 rounded-2xl bg-slate-950 text-amber-400 flex items-center justify-center p-2 shadow-xl border-2 border-amber-400">
                                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-full h-full object-contain">
                            </div>
                            <div>
                                <h3 class="text-base sm:text-lg font-black tracking-widest font-heading text-slate-950 uppercase">DIVA HOUSE BEAUTY ACADEMY</h3>
                                <span class="text-xs font-bold text-amber-700 uppercase tracking-widest block mt-0.5">Rwanda & Kenya Accredited Hubs</span>
                            </div>
                        </div>

                        {{-- Certificate Title --}}
                        <div class="space-y-2 border-y border-amber-400/30 py-6 max-w-2xl mx-auto">
                            <span class="text-[11px] font-extrabold tracking-widest text-slate-500 uppercase block">Official Certificate of Completion & Training Endorsement</span>
                            <p class="text-xs text-slate-600 font-semibold italic">This is to officially certify and validate that</p>
                            
                            {{-- Graduate Name --}}
                            <h2 class="text-3xl sm:text-5xl font-black font-heading text-slate-950 tracking-tight py-2 text-gradient bg-gradient-to-r from-slate-950 via-amber-900 to-slate-950 bg-clip-text">
                                {{ $selectedCert->student_name }}
                            </h2>

                            <p class="text-xs sm:text-sm text-slate-700 max-w-xl mx-auto font-medium leading-relaxed">
                                has successfully completed all required professional course modules, practical client model logbooks, and sanitation standards for:
                            </p>

                            {{-- Course Name --}}
                            <div class="pt-2">
                                <span class="inline-block px-6 py-2.5 rounded-2xl bg-slate-950 text-amber-400 font-black text-base sm:text-xl font-heading shadow-md">
                                    {{ $selectedCert->course_name }}
                                </span>
                            </div>
                        </div>

                        {{-- Certificate Details Grid --}}
                        <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 max-w-3xl mx-auto text-left text-xs bg-white p-5 rounded-2xl border border-amber-200/80 shadow-xs">
                            <div>
                                <span class="text-[10px] font-extrabold text-slate-400 uppercase tracking-wider block">Verification ID</span>
                                <span class="font-mono font-black text-slate-900 text-xs block mt-0.5">{{ $selectedCert->certificate_number }}</span>
                            </div>
                            <div>
                                <span class="text-[10px] font-extrabold text-slate-400 uppercase tracking-wider block">Award Distinction</span>
                                <span class="font-bold text-amber-800 text-xs block mt-0.5">{{ $selectedCert->grade }}</span>
                            </div>
                            <div>
                                <span class="text-[10px] font-extrabold text-slate-400 uppercase tracking-wider block">Training Campus</span>
                                <span class="font-bold text-slate-800 text-xs block mt-0.5">{{ $selectedCert->location }}</span>
                            </div>
                            <div>
                                <span class="text-[10px] font-extrabold text-slate-400 uppercase tracking-wider block">Date of Issue</span>
                                <span class="font-bold text-slate-800 text-xs block mt-0.5">{{ $selectedCert->issue_date?->format('F d, Y') }}</span>
                            </div>
                        </div>

                        {{-- Official Validation Seal Badge --}}
                        <div class="pt-2 flex flex-col sm:flex-row items-center justify-between gap-4 max-w-2xl mx-auto border-t border-slate-200">
                            <div class="flex items-center gap-3 text-left">
                                <div class="w-10 h-10 rounded-full bg-emerald-500 text-white flex items-center justify-center font-bold shadow-md shrink-0">
                                    ✓
                                </div>
                                <div>
                                    <span class="text-xs font-black text-emerald-800 block">AUTHENTIC & VALIDATED CREDENTIAL</span>
                                    <span class="text-[10px] text-slate-500 font-medium block">Authorized by Diva House Admissions Board</span>
                                </div>
                            </div>

                            <button wire:click="resetSearch" class="text-xs font-bold text-slate-500 hover:text-slate-900 underline">
                                Search Another Graduate
                            </button>
                        </div>

                    </div>
                @endif

            @else
                {{-- No Results Found Card --}}
                <div class="bg-white rounded-3xl p-8 sm:p-12 text-center border border-slate-200/80 shadow-sm max-w-2xl mx-auto space-y-4">
                    <div class="w-16 h-16 rounded-full bg-rose-50 text-rose-500 flex items-center justify-center mx-auto text-2xl font-bold">
                        ?
                    </div>
                    <div class="space-y-1">
                        <h3 class="text-xl font-black text-slate-900 font-heading">No Certified Record Found</h3>
                        <p class="text-xs text-slate-500 max-w-md mx-auto">
                            We couldn't find an official graduate certificate matching "<strong class="text-slate-800">{{ $query }}</strong>".
                        </p>
                    </div>
                    <p class="text-xs text-slate-400 font-medium max-w-lg mx-auto">
                        Please check the spelling of the graduate's name or verify the certificate code (e.g. DH-2026-9842). For manual verification assistance, contact our admissions team.
                    </p>
                    <div class="pt-2">
                        <button wire:click="resetSearch" class="px-6 py-2.5 rounded-2xl bg-slate-900 text-amber-400 font-extrabold text-xs">
                            Try Another Search
                        </button>
                    </div>
                </div>
            @endif

        </div>
    @endif

</div>
