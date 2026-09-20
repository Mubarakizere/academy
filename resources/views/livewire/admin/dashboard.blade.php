<div class="space-y-8">
    
    {{-- 1. Executive Banner Header --}}
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 bg-gradient-to-r from-slate-900 via-slate-800 to-slate-900 p-6 sm:p-8 rounded-3xl text-white shadow-xl border border-slate-800 relative overflow-hidden">
        <div class="relative z-10">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-amber-400/10 border border-amber-400/20 text-amber-400 text-xs font-bold uppercase tracking-wider mb-3">
                <span class="w-2 h-2 rounded-full bg-amber-400 animate-pulse"></span>
                Diva House Academy Oversight
            </div>
            <h1 class="text-2xl sm:text-3xl font-black font-heading tracking-tight text-white">
                Admissions & Executive Command Center
            </h1>
            <p class="text-sm text-slate-300 mt-1 max-w-xl">
                Real-time tracking for student intake applications, influencer referral commissions, course catalog, and academy performance.
            </p>
        </div>

        <div class="flex items-center gap-3 relative z-10 shrink-0">
            <a href="{{ route('admin.applications') }}"
                class="inline-flex items-center gap-2 bg-amber-500 hover:bg-amber-400 text-slate-950 font-extrabold text-xs px-4 py-3 rounded-2xl shadow-lg shadow-amber-500/20 transition-all duration-150">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                </svg>
                <span>Review Applications</span>
            </a>

            <a href="{{ route('admin.promo-codes') }}"
                class="inline-flex items-center gap-2 bg-slate-800 hover:bg-slate-700 text-white font-bold text-xs px-4 py-3 rounded-2xl border border-slate-700 transition-all duration-150">
                <svg class="w-4 h-4 text-rose-400" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.568 3H5.25A2.25 2.25 0 003 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 005.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 009.568 3z" />
                </svg>
                <span>Promo Codes</span>
            </a>
        </div>
    </div>

    {{-- 2. Executive KPI Cards (4 Grid) --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
        
        {{-- Total Revenue --}}
        <div class="bg-white rounded-3xl p-6 border border-slate-200/80 shadow-sm hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between mb-4">
                <span class="text-xs font-bold text-slate-500 uppercase tracking-wider">Total Intake Volume</span>
                <div class="w-10 h-10 rounded-2xl bg-amber-50 text-amber-600 flex items-center justify-center font-bold">
                    $
                </div>
            </div>
            <div class="flex items-baseline justify-between">
                <h3 class="text-2xl font-black text-slate-900 font-heading">
                    ${{ number_format($totalRevenue, 0) }}
                </h3>
                <span class="text-xs font-bold text-emerald-600 bg-emerald-50 px-2 py-0.5 rounded-full">+14.2%</span>
            </div>
            <p class="text-xs text-slate-500 mt-2 flex items-center gap-1.5">
                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                <span>From {{ $totalApplications }} student applications</span>
            </p>
        </div>

        {{-- Pending Applications Pipeline --}}
        <div class="bg-white rounded-3xl p-6 border border-slate-200/80 shadow-sm hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between mb-4">
                <span class="text-xs font-bold text-slate-500 uppercase tracking-wider">Admissions Submissions</span>
                <div class="w-10 h-10 rounded-2xl bg-blue-50 text-blue-600 flex items-center justify-center">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                    </svg>
                </div>
            </div>
            <div class="flex items-baseline justify-between">
                <h3 class="text-2xl font-black text-slate-900 font-heading">
                    {{ $totalApplications }}
                </h3>
                @if($pendingApplications > 0)
                    <span class="text-xs font-bold text-amber-700 bg-amber-50 px-2 py-0.5 rounded-full">{{ $pendingApplications }} Pending</span>
                @else
                    <span class="text-xs font-bold text-emerald-600 bg-emerald-50 px-2 py-0.5 rounded-full">All Up to Date</span>
                @endif
            </div>
            <p class="text-xs text-slate-500 mt-2 flex items-center gap-1.5">
                <span class="w-1.5 h-1.5 rounded-full bg-blue-500"></span>
                <span>{{ $paidApplications }} confirmed paid admissions</span>
            </p>
        </div>

        {{-- Influencers & Promo Campaigns --}}
        <div class="bg-white rounded-3xl p-6 border border-slate-200/80 shadow-sm hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between mb-4">
                <span class="text-xs font-bold text-slate-500 uppercase tracking-wider">Influencer Referral Codes</span>
                <div class="w-10 h-10 rounded-2xl bg-rose-50 text-rose-600 flex items-center justify-center">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.568 3H5.25A2.25 2.25 0 003 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 005.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 009.568 3z" />
                    </svg>
                </div>
            </div>
            <div class="flex items-baseline justify-between">
                <h3 class="text-2xl font-black text-slate-900 font-heading">
                    {{ $activePromoCodes }} Active
                </h3>
                <span class="text-xs font-bold text-rose-600 bg-rose-50 px-2 py-0.5 rounded-full">${{ number_format($totalCommissionPaid, 0) }} Paid</span>
            </div>
            <p class="text-xs text-slate-500 mt-2 flex items-center gap-1.5">
                <span class="w-1.5 h-1.5 rounded-full bg-rose-500"></span>
                <span>Commissions calculated automatically</span>
            </p>
        </div>

        {{-- Academic Directory Overview --}}
        <div class="bg-white rounded-3xl p-6 border border-slate-200/80 shadow-sm hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between mb-4">
                <span class="text-xs font-bold text-slate-500 uppercase tracking-wider">Academy Directory</span>
                <div class="w-10 h-10 rounded-2xl bg-indigo-50 text-indigo-600 flex items-center justify-center">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342" />
                    </svg>
                </div>
            </div>
            <div class="flex items-baseline justify-between">
                <h3 class="text-2xl font-black text-slate-900 font-heading">
                    {{ $totalStudents }} Students
                </h3>
                <span class="text-xs font-bold text-indigo-600 bg-indigo-50 px-2 py-0.5 rounded-full">{{ $totalTeachers }} Teachers</span>
            </div>
            <p class="text-xs text-slate-500 mt-2 flex items-center gap-1.5">
                <span class="w-1.5 h-1.5 rounded-full bg-indigo-500"></span>
                <span>{{ $totalClassrooms }} classrooms across {{ $totalSubjects }} subjects</span>
            </p>
        </div>

    </div>

    {{-- 3. Analytics Chart & Recent Submissions Section --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        
        {{-- Left 2 Columns: Admissions Trend Chart & Recent Applications Table --}}
        <div class="lg:col-span-2 space-y-8">
            
            {{-- Smooth Area Trend Graph Card --}}
            <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200/80 shadow-sm">
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
                    <div>
                        <span class="text-xs font-bold uppercase tracking-wider text-amber-600">Admissions Growth</span>
                        <h2 class="text-lg font-black text-slate-900 font-heading">Monthly Application Volume Trend</h2>
                    </div>

                    <div class="inline-flex items-center bg-slate-100 p-1 rounded-xl text-xs font-bold text-slate-600">
                        <span class="px-3 py-1.5 rounded-lg bg-white shadow-xs text-slate-900">Last 6 Months</span>
                    </div>
                </div>

                {{-- Interactive SVG Bar/Area Chart --}}
                <div class="h-64 w-full flex items-end gap-3 pt-6 pb-2 px-2 border-b border-slate-100 relative">
                    {{-- Grid Lines --}}
                    <div class="absolute inset-x-0 top-0 border-t border-dashed border-slate-100"></div>
                    <div class="absolute inset-x-0 top-1/2 border-t border-dashed border-slate-100"></div>

                    @foreach($chartMonths as $idx => $mName)
                        @php
                            $val = $chartValues[$idx] ?? 0;
                            $pct = round(($val / $maxChartVal) * 100);
                            if ($pct < 12) $pct = 12; // minimum visual bar height
                        @endphp
                        <div class="flex-1 flex flex-col items-center gap-2 group relative z-10 h-full justify-end">
                            {{-- Value Tooltip --}}
                            <div class="opacity-0 group-hover:opacity-100 transition-opacity bg-slate-900 text-white text-[10px] font-extrabold px-2 py-1 rounded-md shadow-lg -mb-1 pointer-events-none">
                                {{ $val }} Applications
                            </div>

                            <div class="w-full bg-amber-100 group-hover:bg-amber-400 rounded-2xl transition-all duration-300 relative overflow-hidden"
                                style="height: {{ $pct }}%;">
                                <div class="absolute inset-0 bg-gradient-to-t from-amber-500 to-amber-300 opacity-90"></div>
                            </div>
                            <span class="text-[10px] font-bold text-slate-400 group-hover:text-slate-800 transition-colors uppercase truncate w-full text-center">
                                {{ $mName }}
                            </span>
                        </div>
                    @endforeach
                </div>

                <div class="flex items-center justify-between text-xs text-slate-500 pt-4">
                    <span>* Automatically synced from live intake application records</span>
                    <span class="font-bold text-slate-800">Peak Intake: {{ max($chartValues) }} Submissions</span>
                </div>
            </div>

            {{-- Recent Student Intake Submissions Table --}}
            <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200/80 shadow-sm">
                <div class="flex items-center justify-between mb-6">
                    <div>
                        <span class="text-xs font-bold uppercase tracking-wider text-amber-600">Live Intake Feed</span>
                        <h2 class="text-lg font-black text-slate-900 font-heading">Recent Student Submissions</h2>
                    </div>

                    <a href="{{ route('admin.applications') }}" class="text-xs font-bold text-amber-600 hover:text-amber-700 hover:underline">
                        View All Submissions →
                    </a>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left text-xs">
                        <thead>
                            <tr class="border-b border-slate-100 text-slate-400 uppercase tracking-wider font-extrabold text-[10px]">
                                <th class="pb-3 pl-2">Applicant</th>
                                <th class="pb-3">Selected Course</th>
                                <th class="pb-3">Promo Code</th>
                                <th class="pb-3">Final Fee</th>
                                <th class="pb-3">Status</th>
                                <th class="pb-3 text-right pr-2">Applied</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100">
                            @forelse($recentApplications as $app)
                                <tr class="hover:bg-slate-50/80 transition-colors">
                                    <td class="py-3.5 pl-2">
                                        <div class="flex items-center gap-3">
                                            <div class="w-8 h-8 rounded-full bg-slate-900 text-amber-400 font-extrabold text-xs flex items-center justify-center shrink-0">
                                                {{ strtoupper(substr($app->full_name, 0, 2)) }}
                                            </div>
                                            <div>
                                                <p class="font-bold text-slate-900 leading-tight">{{ $app->full_name }}</p>
                                                <p class="text-[10px] text-slate-400 leading-tight">{{ $app->phone }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="py-3.5 font-semibold text-slate-700">
                                        {{ $app->course?->title ?? 'Academy Program' }}
                                    </td>
                                    <td class="py-3.5">
                                        @if($app->promoCode)
                                            <span class="px-2 py-0.5 rounded-md bg-rose-50 text-rose-600 border border-rose-100 font-extrabold text-[10px]">
                                                {{ $app->promoCode->code }}
                                            </span>
                                        @else
                                            <span class="text-slate-400 text-[10px]">-</span>
                                        @endif
                                    </td>
                                    <td class="py-3.5 font-black text-slate-900">
                                        ${{ number_format($app->final_price ?? 0) }}
                                    </td>
                                    <td class="py-3.5">
                                        @if($app->payment_status === 'paid')
                                            <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full bg-emerald-50 text-emerald-700 font-bold text-[10px]">
                                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Paid
                                            </span>
                                        @else
                                            <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full bg-amber-50 text-amber-700 font-bold text-[10px]">
                                                <span class="w-1.5 h-1.5 rounded-full bg-amber-500"></span> Pending
                                            </span>
                                        @endif
                                    </td>
                                    <td class="py-3.5 text-right pr-2 text-slate-400 text-[10px] font-medium">
                                        {{ $app->created_at?->diffForHumans() }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="py-8 text-center text-slate-400">
                                        No student application records found yet.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

        {{-- Right 1 Column: Top Promo Codes & System Shortcuts --}}
        <div class="space-y-8">
            
            {{-- Top Performing Promo Codes Card --}}
            <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200/80 shadow-sm">
                <div class="flex items-center justify-between mb-6">
                    <div>
                        <span class="text-xs font-bold uppercase tracking-wider text-rose-600">Referral Metrics</span>
                        <h2 class="text-base font-black text-slate-900 font-heading">Top Influencer Promo Codes</h2>
                    </div>
                    <a href="{{ route('admin.promo-codes') }}" class="text-xs font-bold text-rose-600 hover:underline">Manage</a>
                </div>

                <div class="space-y-4">
                    @forelse($topPromoCodes as $code)
                        <div class="p-4 rounded-2xl bg-slate-50 border border-slate-100 flex items-center justify-between">
                            <div>
                                <div class="flex items-center gap-2">
                                    <span class="font-black text-sm text-slate-900 tracking-wider">{{ $code->code }}</span>
                                    <span class="px-1.5 py-0.5 rounded bg-amber-100 text-amber-800 text-[10px] font-extrabold">
                                        {{ $code->discount_percentage ? $code->discount_percentage.'%' : '$'.$code->discount_amount }} OFF
                                    </span>
                                </div>
                                <p class="text-[10px] text-slate-500 mt-0.5">
                                    Influencer 10% commission model
                                </p>
                            </div>
                            <div class="text-right">
                                <span class="text-base font-black text-slate-900 font-heading block leading-none">
                                    {{ $code->applications_count }}
                                </span>
                                <span class="text-[10px] text-slate-400 font-bold uppercase">Usages</span>
                            </div>
                        </div>
                    @empty
                        <div class="p-6 text-center text-xs text-slate-400">
                            No promo codes active yet.
                        </div>
                    @endforelse
                </div>
            </div>

            {{-- Executive Shortcuts Bar --}}
            <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200/80 shadow-sm">
                <span class="text-xs font-bold uppercase tracking-wider text-indigo-600 block mb-1">Quick Tools</span>
                <h2 class="text-base font-black text-slate-900 font-heading mb-4">Academy System Actions</h2>

                <div class="grid grid-cols-2 gap-3">
                    <a href="{{ Route::has('admin.carousels.index') ? route('admin.carousels.index') : '#' }}"
                        class="p-4 rounded-2xl bg-purple-50/50 hover:bg-purple-100/60 border border-purple-100 text-purple-900 transition flex flex-col items-start gap-2">
                        <svg class="w-5 h-5 text-purple-600" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                        </svg>
                        <span class="text-xs font-bold">Hero Images</span>
                    </a>

                    <a href="{{ Route::has('admin.stats.index') ? route('admin.stats.index') : '#' }}"
                        class="p-4 rounded-2xl bg-emerald-50/50 hover:bg-emerald-100/60 border border-emerald-100 text-emerald-900 transition flex flex-col items-start gap-2">
                        <svg class="w-5 h-5 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 013 19.875v-6.75zM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625zM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z" />
                        </svg>
                        <span class="text-xs font-bold">Academy Stats</span>
                    </a>

                    <a href="{{ Route::has('admin.announcements.index') ? route('admin.announcements.index') : '#' }}"
                        class="p-4 rounded-2xl bg-sky-50/50 hover:bg-sky-100/60 border border-sky-100 text-sky-900 transition flex flex-col items-start gap-2">
                        <svg class="w-5 h-5 text-sky-600" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10.34 15.84c-.688-.06-1.386-.09-2.09-.09H7.5a4.5 4.5 0 110-9h.75c.704 0 1.402-.03 2.09-.09m0 9.18c.253.962.584 1.892.985 2.783.247.55.06 1.21-.463 1.511l-.657.38c-.551.318-1.26.117-1.527-.461a20.845 20.845 0 01-1.44-4.282m3.102.069a18.03 18.03 0 01-.59-4.59c0-1.586.205-3.124.59-4.59m0 9.18a23.848 23.848 0 018.835 2.535M10.34 6.66a23.847 23.847 0 008.835-2.535m0 0A23.74 23.74 0 0018.795 3m.38 1.125a23.91 23.91 0 011.014 5.395m-1.014 8.855c-.118.38-.245.754-.38 1.125m.38-1.125a23.91 23.91 0 001.014-5.395m0-3.46c.495.413.811 1.035.811 1.73 0 .695-.316 1.317-.811 1.73m0-3.46a24.347 24.347 0 010 3.46" />
                        </svg>
                        <span class="text-xs font-bold">Announcements</span>
                    </a>

                    <a href="{{ Route::has('admin.students.index') ? route('admin.students.index') : '#' }}"
                        class="p-4 rounded-2xl bg-teal-50/50 hover:bg-teal-100/60 border border-teal-100 text-teal-900 transition flex flex-col items-start gap-2">
                        <svg class="w-5 h-5 text-teal-600" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342" />
                        </svg>
                        <span class="text-xs font-bold">Students Directory</span>
                    </a>
                </div>
            </div>

            {{-- Recent System Announcements --}}
            <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200/80 shadow-sm">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-sm font-black text-slate-900 font-heading">Recent Announcements</h3>
                    <a href="{{ route('admin.announcements.index') }}" class="text-xs font-bold text-sky-600 hover:underline">All →</a>
                </div>

                <div class="space-y-3">
                    @forelse($recentAnnouncements as $ann)
                        <div class="p-3.5 rounded-2xl bg-slate-50 border border-slate-100 flex items-start justify-between gap-3">
                            <div class="min-w-0">
                                <h4 class="text-xs font-bold text-slate-900 truncate">{{ $ann->title }}</h4>
                                <p class="text-[10px] text-slate-400 mt-0.5">{{ $ann->created_at?->diffForHumans() }}</p>
                            </div>
                            <span class="px-2 py-0.5 rounded-full text-[9px] font-extrabold uppercase bg-sky-50 text-sky-700 shrink-0">
                                {{ $ann->target ?? 'Public' }}
                            </span>
                        </div>
                    @empty
                        <p class="text-xs text-slate-400 text-center py-4">No recent announcements posted.</p>
                    @endforelse
                </div>
            </div>

        </div>

    </div>

</div>