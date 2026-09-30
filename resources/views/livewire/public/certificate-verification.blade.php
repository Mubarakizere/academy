<div id="verify-section" class="max-w-6xl mx-auto space-y-8">
    
    {{-- Search Card (Light White Design) --}}
    <div class="bg-white rounded-3xl p-6 sm:p-10 text-slate-900 shadow-xl border border-slate-200/90 space-y-6 relative overflow-hidden no-print">
        
        {{-- Background Glow --}}
        <div class="absolute -top-24 -right-24 w-64 h-64 bg-amber-400/10 rounded-full blur-3xl pointer-events-none"></div>

        <div class="text-center space-y-3 relative z-10">
            <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-amber-50 border border-amber-200 text-amber-800 text-xs font-black uppercase tracking-widest">
                <svg class="w-4 h-4 text-amber-600" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>Instant Official Registry Search</span>
            </div>
            <h2 class="text-2xl sm:text-4xl font-black font-heading text-slate-900 tracking-tight">
                Verify Graduate Certificate & Credentials
            </h2>
            <p class="text-slate-600 text-xs sm:text-sm max-w-xl mx-auto font-medium leading-relaxed">
                Enter an alumna's full name or certificate ID to display their authentic A4 completion certificate.
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
                        placeholder="Search student name or certificate ID (e.g. IRAGENA JEANETTE or DH-2026-0812)..."
                        class="w-full pl-12 pr-4 py-3.5 sm:py-4 rounded-2xl bg-slate-50 border border-slate-200 text-slate-900 text-sm font-bold placeholder:text-slate-400 focus:bg-white focus:ring-2 focus:ring-amber-400 focus:border-amber-400 outline-none transition-all">
                </div>

                <button type="submit"
                    class="w-full sm:w-auto px-8 py-3.5 sm:py-4 rounded-2xl bg-slate-950 hover:bg-slate-900 text-amber-400 font-black text-xs uppercase tracking-wider shadow-md hover:shadow-lg transition-all shrink-0">
                    Verify Credential →
                </button>
            </div>
        </form>

    </div>

    {{-- Search Results Feed --}}
    @if($searched)
        <div class="space-y-6">
            
            @if($results->isNotEmpty())
                <div class="text-center space-y-1 no-print">
                    <span class="text-xs font-black text-emerald-600 uppercase tracking-widest">Verified Graduate Record</span>
                    <h3 class="text-xl font-black text-slate-900 font-heading">
                        Found {{ $results->count() }} Official Certificate{{ $results->count() > 1 ? 's' : '' }}
                    </h3>
                </div>

                {{-- Multiple Results Selection --}}
                @if($results->count() > 1 && !$selectedCert)
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 no-print">
                        @foreach($results as $res)
                            <div wire:click="selectCert({{ $res->id }})"
                                class="bg-white rounded-2xl p-6 border border-slate-200/80 shadow-sm hover:shadow-md cursor-pointer transition-all hover:border-amber-400 group">
                                <div class="flex items-center justify-between mb-3">
                                    <span class="font-mono text-xs font-extrabold bg-slate-100 px-2.5 py-1 rounded-md text-slate-800">
                                        {{ $res->certificate_number }}
                                    </span>
                                    <span class="px-2 py-0.5 rounded-full bg-emerald-50 text-emerald-700 text-[10px] font-bold">
                                        ✓ Verified
                                    </span>
                                </div>
                                <h4 class="text-lg font-bold text-slate-900 group-hover:text-amber-600 transition-colors">{{ $res->student_name }}</h4>
                                <p class="text-xs text-slate-600 font-medium mt-1">{{ $res->course_name }}</p>
                                <p class="text-[11px] text-slate-400 mt-2">{{ $res->location }} &bull; {{ $res->issue_date?->format('M Y') }}</p>
                                <div class="mt-4 pt-3 border-t border-slate-100 flex items-center justify-between text-xs font-bold text-amber-600">
                                    <span>Display A4 Official Certificate</span>
                                    <span>→</span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif

                {{-- Official Displayed A4 Landscape Digital Certificate Card --}}
                @if($selectedCert)
                    <div class="space-y-4">
                        
                        {{-- Top Actions Toolbar --}}
                        <div class="flex flex-wrap items-center justify-between gap-3 bg-white p-4 rounded-2xl border border-slate-200 shadow-sm no-print">
                            <div class="flex items-center gap-2">
                                <span class="w-3 h-3 rounded-full bg-emerald-500 animate-pulse"></span>
                                <span class="text-xs font-bold text-slate-800">
                                    Authentic Certificate Verified &bull;
                                    <span class="font-mono text-amber-700 font-black">{{ $selectedCert->certificate_number }}</span>
                                </span>
                            </div>

                            <div class="flex flex-wrap items-center gap-2">
                                {{-- Save PDF Button with Loading State --}}
                                <button type="button" id="btn-save-pdf" onclick="saveCertificatePDF()"
                                    class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-slate-900 hover:bg-slate-800 active:scale-95 text-amber-400 text-xs font-black uppercase tracking-wider shadow-sm hover:shadow-md transition-all cursor-pointer">
                                    <svg id="btn-save-pdf-icon" class="w-4 h-4 text-amber-400" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m.75 12l3 3m0 0l3-3m-3 3v-6m-1.5-9H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                                    </svg>
                                    <svg id="btn-save-pdf-spinner" class="w-4 h-4 text-amber-400 animate-spin hidden" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"></path>
                                    </svg>
                                    <span id="btn-save-pdf-text">Save PDF</span>
                                </button>

                                {{-- Copy Verification URL Button --}}
                                <button type="button" x-data="{ copied: false }"
                                    @click="navigator.clipboard.writeText('https://academy.divahousebeauty.com/search-certificate?cert={{ $selectedCert->certificate_number }}'); copied = true; setTimeout(() => copied = false, 2500)"
                                    class="inline-flex items-center gap-1.5 px-3.5 py-2 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-800 text-xs font-bold transition-all cursor-pointer">
                                    <svg class="w-4 h-4 text-slate-600" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.19 8.688a4.5 4.5 0 011.242 7.244l-4.5 4.5a4.5 4.5 0 01-6.364-6.364l1.757-1.757m13.35-.622l1.757-1.757a4.5 4.5 0 00-6.364-6.364l-4.5 4.5a4.5 4.5 0 001.242 7.244" />
                                    </svg>
                                    <span x-text="copied ? 'Link Copied!' : 'Copy Verify Link'"></span>
                                </button>

                                {{-- Search Another Button --}}
                                <button wire:click="resetSearch"
                                    class="px-3 py-2 rounded-xl text-xs font-bold text-slate-500 hover:text-slate-900 transition-colors">
                                    ✕ Search Another
                                </button>
                            </div>
                        </div>

                        {{-- ============================================================== --}}
                        {{-- THE REUSABLE A4 LANDSCAPE CERTIFICATE TEMPLATE --}}
                        {{-- ============================================================== --}}
                        <div id="certificate-printable-wrapper" class="w-full flex justify-center overflow-x-auto py-2">
                            
                            <div id="certificate-printable-card"
                                class="relative w-full max-w-[1024px] bg-white text-slate-900 shadow-2xl border border-slate-300/80 overflow-hidden select-none"
                                style="aspect-ratio: 1.414 / 1; min-height: 520px;">

                                {{-- AUTHENTIC SUNBURST RAYS BACKGROUND (Rendered as raster image for 100% html2canvas & print fidelity) --}}
                                <img src="{{ asset('images/certificates/sunburst-bg.png') }}" alt="" class="absolute inset-0 w-full h-full object-cover pointer-events-none z-0">

                                {{-- 4 LUXURY GEOMETRIC BLACK & GOLD CORNER ORNAMENTS --}}
                                <img src="{{ asset('images/certificates/corner-tl.png') }}" alt="" class="absolute top-0 left-0 w-[14%] max-w-[145px] pointer-events-none z-10">
                                <img src="{{ asset('images/certificates/corner-tr.png') }}" alt="" class="absolute top-0 right-0 w-[14%] max-w-[145px] pointer-events-none z-10">
                                <img src="{{ asset('images/certificates/corner-bl.png') }}" alt="" class="absolute bottom-0 left-0 w-[14%] max-w-[145px] pointer-events-none z-10">
                                <img src="{{ asset('images/certificates/corner-br.png') }}" alt="" class="absolute bottom-0 right-0 w-[14%] max-w-[145px] pointer-events-none z-10">

                                {{-- MAIN CERTIFICATE CONTENT CONTAINER --}}
                                <div class="relative z-20 w-full h-full flex flex-col justify-between px-[6%] py-[3%] text-center">

                                    {{-- HEADER AREA: LOGO & CERTIFICATE TITLE --}}
                                    <div class="space-y-1">
                                        {{-- Brand Logo --}}
                                        <div class="flex justify-center">
                                            <img src="{{ asset('images/certificates/header-logo-transparent.png') }}"
                                                alt="Diva House Beauty"
                                                class="h-14 sm:h-18 md:h-20 max-h-[85px] object-contain">
                                        </div>

                                        {{-- Certificate Title --}}
                                        <h2 class="font-['Cinzel',serif] tracking-[0.14em] font-extrabold text-xl sm:text-2xl md:text-3xl text-slate-900 uppercase leading-tight pt-1">
                                            CERTIFICATE OF COMPLETION
                                        </h2>

                                        {{-- "Presented to" --}}
                                        <p class="text-xs sm:text-sm text-slate-700 font-medium tracking-wide">
                                            Presented to
                                        </p>
                                    </div>

                                    {{-- CENTER RECIPIENT NAME & RECOGNITION DETAILS --}}
                                    <div class="space-y-2 my-auto py-2">
                                        {{-- Student Full Name (Dynamic) with Table Row Separation & Generous Spacing --}}
                                        <div class="w-full text-center py-2">
                                            <table class="w-full border-collapse mx-auto" style="border: none; margin: 0 auto;">
                                                <tbody>
                                                    <tr>
                                                        <td style="text-align: center; border: none; padding: 0 0 18px 0;">
                                                            <span class="font-['Cinzel',serif] font-black text-2xl sm:text-3xl md:text-4xl lg:text-[38px] text-slate-950 uppercase tracking-wider inline-block leading-normal">
                                                                {{ $selectedCert->student_name }}
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="text-align: center; border: none; padding: 4px 0 0 0;">
                                                            <div style="width: 75%; max-width: 620px; height: 2px; background-color: #0f172a; margin: 0 auto;"></div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                        {{-- Course Recognition Paragraph (Dynamic) --}}
                                        <div class="max-w-[82%] mx-auto space-y-1 text-slate-800 leading-relaxed font-normal">
                                            <p class="text-xs sm:text-sm md:text-[15px]">
                                                In recognition of successfully completing the <strong class="font-bold text-slate-950">{{ $selectedCert->course_name }}</strong> at
                                                <span class="font-medium text-slate-900">{{ $selectedCert->location }}</span>
                                            </p>
                                            <p class="text-[11px] sm:text-xs md:text-[13px] text-slate-700">
                                                Your dedication, skill development, and commitment to excellence in beauty artistry are proudly acknowledged.
                                            </p>
                                        </div>
                                    </div>

                                    {{-- BOTTOM ROW: QR CODE (LEFT) + APPRECIATION & SIGNATURE (CENTER) + GOLD SEAL (RIGHT) --}}
                                    <div class="grid grid-cols-12 items-end pt-2">
                                        
                                        {{-- LEFT: Dynamic Scannable QR Code Box --}}
                                        <div class="col-span-3 flex flex-col items-center pl-2">
                                            <div class="w-20 sm:w-24 md:w-28 aspect-square bg-white border border-slate-900 p-1 shadow-xs flex items-center justify-center">
                                                <img src="https://api.qrserver.com/v1/create-qr-code/?size=220x220&data={{ urlencode('https://academy.divahousebeauty.com/search-certificate?cert=' . $selectedCert->certificate_number) }}"
                                                    alt="Scan to verify: {{ $selectedCert->certificate_number }}"
                                                    class="w-full h-full object-contain" crossorigin="anonymous">
                                            </div>
                                            <span class="text-[10px] sm:text-xs text-slate-700 italic mt-0.5 font-medium">
                                                Scan here
                                            </span>
                                            <span class="font-mono text-[9px] sm:text-[10px] text-slate-500 font-bold tracking-tight">
                                                {{ $selectedCert->certificate_number }}
                                            </span>
                                        </div>

                                        {{-- CENTER: Appreciation, Date, Official Stamp & Signature --}}
                                        <div class="col-span-6 flex flex-col items-center text-center space-y-0.5">
                                            <p class="text-[11px] sm:text-xs text-slate-700 font-normal">
                                                With appreciation,
                                            </p>
                                            <p class="text-xs sm:text-sm font-bold text-slate-900 tracking-wide">
                                                Diva House Beauty
                                            </p>
                                            <p class="text-[10px] sm:text-xs text-slate-600 font-medium">
                                                Presented on {{ $selectedCert->issue_date?->format('F d, Y') ?? 'September 24, 2026' }}
                                            </p>

                                            {{-- Stamp & Signature of Olivier Niyikiza --}}
                                            <div class="pt-1">
                                                <img src="{{ asset('images/certificates/stamp-signature-transparent.png') }}"
                                                    alt="Stamp & Signature: Olivier Niyikiza, Managing Director"
                                                    class="w-48 sm:w-60 md:w-68 max-w-[280px] object-contain mx-auto -mt-1.5">
                                            </div>
                                        </div>

                                        {{-- RIGHT: Authentic 3D Gold Ribbon Seal --}}
                                        <div class="col-span-3 flex justify-center items-center pr-2">
                                            <img src="{{ asset('images/certificates/gold-seal-transparent.png') }}"
                                                alt="Official Gold Accreditation Seal"
                                                class="w-18 sm:w-22 md:w-26 max-w-[120px] object-contain drop-shadow-md">
                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                        {{-- METADATA SUMMARY CARD (Below Certificate) --}}
                        <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 bg-white p-5 rounded-2xl border border-slate-200 shadow-sm text-xs no-print">
                            <div>
                                <span class="text-[10px] font-extrabold text-slate-400 uppercase tracking-wider block">Verification ID</span>
                                <span class="font-mono font-black text-slate-900 text-sm block mt-0.5">{{ $selectedCert->certificate_number }}</span>
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

                    </div>
                @endif

            @else
                {{-- No Results Found Card --}}
                <div class="bg-white rounded-3xl p-8 sm:p-12 text-center border border-slate-200/80 shadow-sm max-w-2xl mx-auto space-y-4 no-print">
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
                        Please check the spelling of the graduate's name or verify the certificate code (e.g. DH-2026-0821).
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

    {{-- LUXURY ANIMATED PDF GENERATION OVERLAY MODAL --}}
    <div id="pdf-download-modal" class="fixed inset-0 z-[1000000] hidden items-center justify-center bg-slate-950/75 backdrop-blur-md transition-opacity duration-300">
        <div id="pdf-modal-card" class="relative w-full max-w-sm mx-4 bg-white border border-amber-500/30 rounded-3xl p-7 shadow-2xl text-center overflow-hidden transform scale-95 transition-all duration-300">
            {{-- Ambient golden glows --}}
            <div class="absolute -top-12 -right-12 w-32 h-32 bg-amber-400/25 rounded-full blur-2xl pointer-events-none"></div>
            <div class="absolute -bottom-12 -left-12 w-32 h-32 bg-yellow-400/20 rounded-full blur-2xl pointer-events-none"></div>

            {{-- Animated Icon Container --}}
            <div class="relative w-20 h-20 mx-auto mb-4 flex items-center justify-center">
                {{-- Spinning Gold Border Ring --}}
                <div id="pdf-modal-spinner" class="absolute inset-0 rounded-full border-4 border-amber-200 border-t-amber-500 animate-spin"></div>
                
                {{-- Complete Checkmark Icon (Initially hidden) --}}
                <div id="pdf-modal-check" class="hidden w-16 h-16 rounded-full bg-emerald-500 text-white items-center justify-center shadow-lg transition-transform duration-300 scale-0">
                    <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                    </svg>
                </div>

                {{-- Animated Certificate Icon (While processing) --}}
                <div id="pdf-modal-cert-icon" class="w-10 h-10 text-amber-600 flex items-center justify-center animate-bounce">
                    <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                    </svg>
                </div>
            </div>

            {{-- Dynamic Status Heading --}}
            <h3 id="pdf-modal-title" class="text-base font-black text-slate-900 tracking-tight">
                Generating Certificate...
            </h3>
            <p id="pdf-modal-subtitle" class="text-xs text-slate-500 font-medium mt-1">
                Rasterizing ultra-HD credential with authentic seal & QR...
            </p>

            {{-- Animated Progress Bar --}}
            <div class="w-full bg-slate-100 rounded-full h-2 mt-4 overflow-hidden border border-slate-200">
                <div id="pdf-modal-progress" class="bg-gradient-to-r from-amber-500 via-yellow-400 to-amber-600 h-2 rounded-full transition-all duration-300 ease-out" style="width: 25%;"></div>
            </div>

            <div class="mt-3.5 flex items-center justify-center gap-1.5 text-[10px] text-slate-400 font-bold uppercase tracking-wider">
                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-ping"></span>
                Official A4 Landscape &bull; 300 DPI High-Res
            </div>
        </div>
    </div>

    {{-- Client-side script to handle 100% reliable A4 Landscape PDF save with Animation --}}
    <script>
        function showPdfModal() {
            const modal = document.getElementById('pdf-download-modal');
            const card = document.getElementById('pdf-modal-card');
            if (!modal) return;
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            setTimeout(() => {
                if (card) {
                    card.classList.remove('scale-95');
                    card.classList.add('scale-100');
                }
            }, 10);
        }

        function updatePdfModal(title, subtitle, percent) {
            const titleEl = document.getElementById('pdf-modal-title');
            const subEl = document.getElementById('pdf-modal-subtitle');
            const progEl = document.getElementById('pdf-modal-progress');
            if (titleEl) titleEl.innerText = title;
            if (subEl) subEl.innerText = subtitle;
            if (progEl) progEl.style.width = percent + '%';
        }

        function completePdfModal() {
            const spinner = document.getElementById('pdf-modal-spinner');
            const certIcon = document.getElementById('pdf-modal-cert-icon');
            const check = document.getElementById('pdf-modal-check');
            const progEl = document.getElementById('pdf-modal-progress');
            
            if (spinner) spinner.classList.add('hidden');
            if (certIcon) certIcon.classList.add('hidden');
            if (check) {
                check.classList.remove('hidden');
                check.classList.add('flex');
                setTimeout(() => {
                    check.classList.remove('scale-0');
                    check.classList.add('scale-100');
                }, 20);
            }
            if (progEl) progEl.style.width = '100%';

            // Use inline SVG icon instead of emoji for professional finish
            const titleEl = document.getElementById('pdf-modal-title');
            if (titleEl) {
                titleEl.innerHTML = 'Certificate Ready <svg class="w-4 h-4 text-emerald-600 inline-block ml-1 -mt-0.5" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>';
            }
            const subEl = document.getElementById('pdf-modal-subtitle');
            if (subEl) subEl.innerText = 'Saved to your downloads folder.';

            setTimeout(() => {
                hidePdfModal();
            }, 1400);
        }

        function hidePdfModal() {
            const modal = document.getElementById('pdf-download-modal');
            const card = document.getElementById('pdf-modal-card');
            const spinner = document.getElementById('pdf-modal-spinner');
            const certIcon = document.getElementById('pdf-modal-cert-icon');
            const check = document.getElementById('pdf-modal-check');

            if (card) {
                card.classList.remove('scale-100');
                card.classList.add('scale-95');
            }
            setTimeout(() => {
                if (modal) {
                    modal.classList.add('hidden');
                    modal.classList.remove('flex');
                }
                if (spinner) spinner.classList.remove('hidden');
                if (certIcon) certIcon.classList.remove('hidden');
                if (check) {
                    check.classList.add('hidden');
                    check.classList.remove('flex');
                    check.classList.add('scale-0');
                }
                updatePdfModal('Generating Certificate...', 'Rasterizing ultra-HD credential with authentic seal & QR...', 25);
            }, 300);
        }

        function saveCertificatePDF() {
            const card = document.getElementById('certificate-printable-card');
            if (!card) {
                window.print();
                return;
            }

            const btnText = document.getElementById('btn-save-pdf-text');
            const btnIcon = document.getElementById('btn-save-pdf-icon');
            const btnSpinner = document.getElementById('btn-save-pdf-spinner');
            
            if (btnText) btnText.innerText = 'Downloading...';
            if (btnIcon) btnIcon.classList.add('hidden');
            if (btnSpinner) btnSpinner.classList.remove('hidden');

            showPdfModal();
            updatePdfModal('Preparing Official Credential...', 'Initializing A4 landscape layout & security verification...', 30);

            if (typeof html2canvas !== 'undefined') {
                // 1. Temporarily disable smooth scrolling so window.scrollTo is instantaneous
                const htmlEl = document.documentElement;
                const hadScrollSmooth = htmlEl.classList.contains('scroll-smooth');
                if (hadScrollSmooth) htmlEl.classList.remove('scroll-smooth');
                const prevScrollBehavior = htmlEl.style.scrollBehavior;
                htmlEl.style.scrollBehavior = 'auto';

                // 2. Save user scroll coordinates
                const savedScrollX = window.scrollX || window.pageXOffset || 0;
                const savedScrollY = window.scrollY || window.pageYOffset || 0;

                // 3. Snap immediately to (0, 0) to eliminate any scroll offset calculation bugs
                window.scrollTo(0, 0);

                // 4. Create an isolated staging wrapper OFF-SCREEN so user never sees the clone flash
                const stage = document.createElement('div');
                stage.id = 'pdf-render-stage';
                stage.style.position = 'absolute';
                stage.style.top = '0px';
                stage.style.left = '-9999px';
                stage.style.width = '1024px';
                stage.style.height = '724px';
                stage.style.zIndex = '1';
                stage.style.backgroundColor = '#ffffff';
                stage.style.overflow = 'hidden';
                stage.style.margin = '0px';
                stage.style.padding = '0px';

                // 5. Clone certificate card with exact 1024x724 proportions (A4 Landscape 1.414 ratio)
                const clone = card.cloneNode(true);
                clone.id = 'certificate-pdf-clone';
                clone.style.width = '1024px';
                clone.style.height = '724px';
                clone.style.minHeight = '724px';
                clone.style.maxHeight = '724px';
                clone.style.margin = '0px';
                clone.style.boxShadow = 'none';
                clone.style.border = 'none';
                clone.style.transform = 'none';

                stage.appendChild(clone);
                document.body.appendChild(stage);

                setTimeout(() => {
                    updatePdfModal('Rasterizing High-Resolution Graphics...', 'Rendering sunburst background, medal seal & scannable QR...', 65);

                    html2canvas(stage, {
                        scale: 2, // 2048 x 1448 high-res output
                        useCORS: true,
                        allowTaint: false,
                        backgroundColor: '#ffffff',
                        scrollX: 0,
                        scrollY: 0,
                        width: 1024,
                        height: 724,
                        windowWidth: 1024,
                        windowHeight: 724,
                        logging: false
                    }).then(canvas => {
                        // Clean up staging element
                        if (stage.parentNode) stage.parentNode.removeChild(stage);

                        // Restore original scroll coordinates and smooth scroll
                        window.scrollTo(savedScrollX, savedScrollY);
                        if (hadScrollSmooth) htmlEl.classList.add('scroll-smooth');
                        htmlEl.style.scrollBehavior = prevScrollBehavior;

                        updatePdfModal('Building Print-Ready A4 Document...', 'Finalizing PDF stream...', 90);

                        // Instantiate jsPDF in A4 landscape mode
                        const { jsPDF } = window.jspdf || window;
                        const pdf = new jsPDF({
                            orientation: 'landscape',
                            unit: 'mm',
                            format: 'a4',
                            compress: true
                        });

                        // 297mm x 210mm fills full A4 landscape page edge-to-edge
                        const imgData = canvas.toDataURL('image/jpeg', 0.98);
                        pdf.addImage(imgData, 'JPEG', 0, 0, 297, 210, undefined, 'FAST');

                        const certNumber = @json($selectedCert?->certificate_number ?? 'DH-2026');
                        const studentName = @json($selectedCert?->student_name ?? 'Certificate');
                        const cleanName = studentName.replace(/[^a-zA-Z0-9]/g, '_');

                        pdf.save('Certificate_' + certNumber + '_' + cleanName + '.pdf');

                        completePdfModal();

                        if (btnText) btnText.innerText = 'Save PDF';
                        if (btnIcon) btnIcon.classList.remove('hidden');
                        if (btnSpinner) btnSpinner.classList.add('hidden');
                    }).catch(err => {
                        console.error('html2canvas error, falling back to window.print():', err);
                        if (stage.parentNode) stage.parentNode.removeChild(stage);
                        window.scrollTo(savedScrollX, savedScrollY);
                        if (hadScrollSmooth) htmlEl.classList.add('scroll-smooth');
                        htmlEl.style.scrollBehavior = prevScrollBehavior;
                        hidePdfModal();
                        if (btnText) btnText.innerText = 'Save PDF';
                        if (btnIcon) btnIcon.classList.remove('hidden');
                        if (btnSpinner) btnSpinner.classList.add('hidden');
                        window.print();
                    });
                }, 120);

            } else {
                hidePdfModal();
                if (btnText) btnText.innerText = 'Save PDF';
                if (btnIcon) btnIcon.classList.remove('hidden');
                if (btnSpinner) btnSpinner.classList.add('hidden');
                window.print();
            }
        }
    </script>

</div>

