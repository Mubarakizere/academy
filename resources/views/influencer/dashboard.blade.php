<!DOCTYPE html>
<html lang="en" class="h-full bg-slate-50">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Influencer Partner Portal | Diva House Beauty Academy</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Outfit:wght@600;700;800;900&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body { font-family: 'Inter', sans-serif; }
        h1, h2, h3, h4, .font-heading { font-family: 'Outfit', sans-serif; }
        [x-cloak] { display: none !important; }
    </style>
</head>

<body class="h-full antialiased bg-slate-50 text-slate-800" x-data="{
    sidebarOpen: false,
    activeTab: 'overview',
    copiedCode: false,
    copiedLink: false,
    copyText(text, isLink = false) {
        navigator.clipboard.writeText(text);
        if (isLink) {
            this.copiedLink = true;
            setTimeout(() => this.copiedLink = false, 2500);
        } else {
            this.copiedCode = true;
            setTimeout(() => this.copiedCode = false, 2500);
        }
    }
}">

    <div class="min-h-full flex flex-col lg:flex-row">

        {{-- MOBILE SIDEBAR BACKDROP --}}
        <div x-show="sidebarOpen" x-cloak @click="sidebarOpen = false"
            class="fixed inset-0 z-40 bg-slate-900/50 backdrop-blur-xs lg:hidden transition-opacity"></div>

        {{-- ====== SIDEBAR ====== --}}
        <aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full lg:translate-x-0'"
            class="fixed inset-y-0 left-0 z-50 w-72 bg-white border-r border-slate-200/80 flex flex-col justify-between transition-transform duration-300 ease-in-out lg:static lg:z-auto shrink-0">
            
            <div class="flex flex-col h-full">
                {{-- Sidebar Header / Brand --}}
                <div class="h-20 px-6 flex items-center justify-between border-b border-slate-100">
                    <a href="{{ route('home') }}" class="flex items-center gap-3">
                        <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-10 w-auto rounded-xl">
                        <div>
                            <span class="text-base font-extrabold text-slate-900 font-heading block leading-none">DIVA HOUSE</span>
                            <span class="text-[10px] font-extrabold text-amber-600 uppercase tracking-widest mt-1 block">Influencer Partner</span>
                        </div>
                    </a>
                    <button @click="sidebarOpen = false" class="lg:hidden text-slate-400 hover:text-slate-600">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                {{-- Partner Level Badge --}}
                <div class="p-4 mx-4 mt-4 bg-gradient-to-r from-amber-50 to-amber-100/60 border border-amber-200/80 rounded-2xl flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-amber-400 text-slate-950 flex items-center justify-center font-extrabold shadow-xs shrink-0">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 18.75h-9m9 0a3 3 0 013 3h-15a3 3 0 013-3m9 0v-3.375c0-.621-.504-1.125-1.125-1.125h-6.75c-.621 0-1.125.504-1.125 1.125v3.375m9 0h-9m-2.25-6.75a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0z" />
                        </svg>
                    </div>
                    <div class="min-w-0">
                        <span class="text-[10px] font-extrabold uppercase tracking-wider text-amber-800 block">Active Partner</span>
                        <h4 class="text-xs font-bold text-slate-900 truncate">{{ $user->name }}</h4>
                        <span class="text-[11px] font-mono text-amber-700 font-bold block">{{ $promoCodes->first()?->code ?? 'NO CODE' }}</span>
                    </div>
                </div>

                {{-- Navigation Links --}}
                <nav class="p-4 space-y-1.5 flex-1 overflow-y-auto">
                    <button @click="activeTab = 'overview'; sidebarOpen = false"
                        :class="activeTab === 'overview' ? 'bg-amber-400/15 text-amber-900 font-bold border-amber-300 shadow-xs' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900 font-medium border-transparent'"
                        class="w-full flex items-center gap-3 px-4 py-3 rounded-xl border text-xs transition-all text-left">
                        <svg class="w-4 h-4 text-amber-600" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z" />
                        </svg>
                        <span>Dashboard Overview</span>
                    </button>

                    <button @click="activeTab = 'referrals'; sidebarOpen = false"
                        :class="activeTab === 'referrals' ? 'bg-amber-400/15 text-amber-900 font-bold border-amber-300 shadow-xs' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900 font-medium border-transparent'"
                        class="w-full flex items-center justify-between px-4 py-3 rounded-xl border text-xs transition-all text-left">
                        <div class="flex items-center gap-3">
                            <svg class="w-4 h-4 text-amber-600" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                            </svg>
                            <span>Referred Students</span>
                        </div>
                        <span class="bg-amber-100 text-amber-800 px-2 py-0.5 rounded-full text-[10px] font-bold">
                            {{ $applications->count() }}
                        </span>
                    </button>

                    <button @click="activeTab = 'payout'; sidebarOpen = false"
                        :class="activeTab === 'payout' ? 'bg-amber-400/15 text-amber-900 font-bold border-amber-300 shadow-xs' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900 font-medium border-transparent'"
                        class="w-full flex items-center gap-3 px-4 py-3 rounded-xl border text-xs transition-all text-left">
                        <svg class="w-4 h-4 text-amber-600" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5z" />
                        </svg>
                        <span>Payout Settings</span>
                    </button>

                    <a href="{{ route('apply') }}" target="_blank"
                        class="flex items-center justify-between px-4 py-3 rounded-xl text-slate-600 hover:bg-slate-100 hover:text-slate-900 font-medium text-xs transition-all">
                        <div class="flex items-center gap-3">
                            <svg class="w-4 h-4 text-amber-600" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 003 8.25v10.5A2.25 2.25 0 005.25 21h10.5A2.25 2.25 0 0018 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" />
                            </svg>
                            <span>Application Portal</span>
                        </div>
                        <span class="text-[10px] text-slate-400">Live ↗</span>
                    </a>
                </nav>

                {{-- User Footer --}}
                <div class="p-4 border-t border-slate-100 bg-slate-50/50">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-3 min-w-0">
                            <div class="w-9 h-9 rounded-full bg-amber-400 text-slate-950 font-extrabold flex items-center justify-center text-xs shrink-0">
                                {{ strtoupper(substr($user->name, 0, 2)) }}
                            </div>
                            <div class="min-w-0">
                                <p class="text-xs font-bold text-slate-900 truncate">{{ $user->name }}</p>
                                <p class="text-[11px] text-slate-500 truncate">{{ $user->email }}</p>
                            </div>
                        </div>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" title="Log Out" class="text-slate-400 hover:text-rose-600 p-2 rounded-lg transition-colors">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l3 3m0 0l-3 3m3-3H2.25" />
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </aside>

        {{-- ====== MAIN CONTENT AREA ====== --}}
        <div class="flex-1 flex flex-col min-w-0 min-h-screen">

            {{-- Top Navbar --}}
            <header class="h-20 bg-white border-b border-slate-200/80 sticky top-0 z-30 px-4 sm:px-8 flex items-center justify-between">
                <div class="flex items-center gap-4">
                    <button @click="sidebarOpen = true" class="lg:hidden text-slate-600 hover:text-slate-900 p-2 rounded-xl border border-slate-200">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                    </button>

                    <div>
                        <h1 class="text-xl sm:text-2xl font-extrabold text-slate-900 font-heading tracking-tight"
                            x-text="activeTab === 'overview' ? 'Partner Dashboard Overview' : (activeTab === 'referrals' ? 'Referred Students & Earnings' : 'Payout Account Settings')">
                            Partner Dashboard
                        </h1>
                        <p class="text-xs text-slate-500 font-medium hidden sm:block">Track student referrals, discount codes, and commission payouts.</p>
                    </div>
                </div>

                <div class="flex items-center gap-3">
                    <a href="{{ route('home') }}" class="hidden sm:inline-flex items-center gap-2 text-xs font-bold text-slate-700 bg-slate-100 hover:bg-slate-200 px-4 py-2.5 rounded-xl transition">
                        <svg class="w-4 h-4 text-slate-500" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                        </svg>
                        <span>Main Site</span>
                    </a>

                    <a href="{{ route('apply') }}?ref={{ $promoCodes->first()?->code }}" target="_blank"
                        class="inline-flex items-center gap-2 text-xs font-extrabold text-slate-950 bg-yellow-400 hover:bg-yellow-300 px-4 py-2.5 rounded-xl shadow-xs transition">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                        <span>Refer Student</span>
                    </a>
                </div>
            </header>

            {{-- Main Content Body --}}
            <main class="p-4 sm:p-8 space-y-8 flex-1 max-w-7xl w-full mx-auto">

                {{-- Alert Notification --}}
                @if(session('success'))
                    <div class="bg-emerald-50 border border-emerald-200 text-emerald-800 p-4 rounded-2xl text-xs font-bold flex items-center gap-3 shadow-xs">
                        <div class="w-2.5 h-2.5 rounded-full bg-emerald-500 animate-ping"></div>
                        <span>{{ session('success') }}</span>
                    </div>
                @endif

                {{-- ====== TAB 1: OVERVIEW ====== --}}
                <div x-show="activeTab === 'overview'" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0" class="space-y-8">
                    
                    {{-- Promo Code & Share Banner --}}
                    <div class="bg-gradient-to-br from-amber-500 via-amber-400 to-yellow-400 rounded-3xl p-6 sm:p-8 text-slate-950 shadow-md relative overflow-hidden">
                        <div class="absolute -right-10 -bottom-10 w-64 h-64 rounded-full bg-white/10 blur-2xl pointer-events-none"></div>

                        <div class="relative z-10 flex flex-col lg:flex-row items-start lg:items-center justify-between gap-6">
                            <div class="space-y-2 max-w-xl">
                                <div class="inline-flex items-center gap-2 bg-slate-950/10 backdrop-blur-xs px-3 py-1 rounded-full text-[11px] font-extrabold uppercase tracking-wider text-slate-950">
                                    <span class="w-2 h-2 rounded-full bg-slate-950 animate-pulse"></span>
                                    <span>Your Exclusive Partner Promo Code</span>
                                </div>
                                <h2 class="text-3xl sm:text-4xl font-extrabold font-heading tracking-tight">
                                    @if($promoCodes->isNotEmpty())
                                        <span class="bg-slate-950 text-yellow-300 px-4 py-1 rounded-2xl font-mono text-3xl sm:text-4xl inline-block shadow-inner">
                                            {{ $promoCodes->first()->code }}
                                        </span>
                                    @else
                                        <span>NO CODE ASSIGNED</span>
                                    @endif
                                </h2>
                                <p class="text-slate-900 text-xs sm:text-sm font-medium leading-relaxed">
                                    Students who enter your code at admission application get an instant discount. You earn your agreed commission on the net tuition actually paid by the student!
                                </p>
                            </div>

                            {{-- Action Buttons --}}
                            <div class="bg-white/95 backdrop-blur-md p-5 rounded-2xl border border-white/80 shadow-lg space-y-3 w-full lg:w-80 shrink-0">
                                <span class="text-[11px] font-bold text-slate-600 block uppercase tracking-wider">Shareable Referral Link</span>
                                
                                <div class="flex items-center justify-between bg-slate-100 p-2.5 rounded-xl border border-slate-200 font-mono text-[11px] text-slate-800 truncate">
                                    <span class="truncate">{{ route('apply') }}?ref={{ $promoCodes->first()?->code }}</span>
                                </div>

                                <div class="grid grid-cols-2 gap-2">
                                    <button @click="copyText('{{ $promoCodes->first()?->code }}', false)"
                                        class="w-full bg-slate-900 hover:bg-slate-800 text-white font-bold py-2.5 px-3 rounded-xl text-xs transition flex items-center justify-center gap-1.5 shadow-xs">
                                        <svg class="w-3.5 h-3.5 text-amber-400" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 17.25v3.375c0 .621-.504 1.125-1.125 1.125h-9.75a1.125 1.125 0 01-1.125-1.125V7.875c0-.621.504-1.125 1.125-1.125H6.75a9.06 9.06 0 011.5.124m7.5 10.376h3.375c.621 0 1.125-.504 1.125-1.125V11.25c0-4.46-3.243-8.161-7.5-8.876a9.06 9.06 0 00-1.5-.124H9.375c-.621 0-1.125.504-1.125 1.125v3.5m7.5 10.375H9.375a1.125 1.125 0 01-1.125-1.125v-9.25m12 6.625v-1.875a3.375 3.375 0 00-3.375-3.375h-1.5" />
                                        </svg>
                                        <span x-text="copiedCode ? 'Copied!' : 'Copy Code'">Copy Code</span>
                                    </button>

                                    <button @click="copyText('{{ route('apply') }}?ref={{ $promoCodes->first()?->code }}', true)"
                                        class="w-full bg-amber-100 hover:bg-amber-200 text-amber-900 font-bold py-2.5 px-3 rounded-xl text-xs transition flex items-center justify-center gap-1.5 border border-amber-300">
                                        <svg class="w-3.5 h-3.5 text-amber-800" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.19 8.688a4.5 4.5 0 011.242 7.244l-4.5 4.5a4.5 4.5 0 01-6.364-6.364l1.757-1.757m13.35-.622l1.757-1.757a4.5 4.5 0 00-6.364-6.364l-4.5 4.5a4.5 4.5 0 001.242 7.244" />
                                        </svg>
                                        <span x-text="copiedLink ? 'Copied!' : 'Copy Link'">Copy Link</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Metrics KPI Cards --}}
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                        {{-- Card 1: Pending Verification --}}
                        <div class="bg-white border border-slate-200/80 rounded-3xl p-6 space-y-4 shadow-xs hover:shadow-md transition-all">
                            <div class="flex items-center justify-between">
                                <span class="text-xs font-extrabold text-amber-600 uppercase tracking-wider">1. Pending Verification</span>
                                <div class="w-8 h-8 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                            </div>
                            <div>
                                <div class="text-3xl font-extrabold text-slate-900 font-heading">
                                    {{ $pendingApps->count() }} <span class="text-xs text-slate-400 font-medium">Students</span>
                                </div>
                                <p class="text-[11px] text-slate-500 font-medium mt-1">Applications using your promo code, awaiting admin tuition verification.</p>
                            </div>
                            <div class="pt-3 border-t border-slate-100 flex items-center justify-between text-xs text-slate-500">
                                <span>Expected Commission</span>
                                <strong class="text-amber-700 font-mono font-bold">
                                    {{ number_format($pendingApps->sum('commission_amount')) }} {{ $applications->first()?->currency ?? 'RWF' }}
                                </strong>
                            </div>
                        </div>

                        {{-- Card 2: Confirmed Commission --}}
                        <div class="bg-white border border-emerald-200 rounded-3xl p-6 space-y-4 shadow-xs hover:shadow-md transition-all">
                            <div class="flex items-center justify-between">
                                <span class="text-xs font-extrabold text-emerald-700 uppercase tracking-wider">2. Confirmed Earned</span>
                                <div class="w-8 h-8 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                            </div>
                            <div>
                                <div class="text-3xl font-extrabold text-slate-900 font-heading">
                                    {{ $confirmedApps->count() }} <span class="text-xs text-slate-400 font-medium">Verified</span>
                                </div>
                                <p class="text-[11px] text-slate-500 font-medium mt-1">Tuition verified by Admin. Ready for MoMo / Bank transfer.</p>
                            </div>
                            <div class="pt-3 border-t border-slate-100 flex items-center justify-between text-xs text-slate-500">
                                <span>Ready Payout</span>
                                <strong class="text-emerald-700 font-mono font-bold">
                                    {{ number_format($confirmedApps->sum('commission_amount')) }} {{ $applications->first()?->currency ?? 'RWF' }}
                                </strong>
                            </div>
                        </div>

                        {{-- Card 3: Transferred Payouts --}}
                        <div class="bg-white border border-slate-200/80 rounded-3xl p-6 space-y-4 shadow-xs hover:shadow-md transition-all">
                            <div class="flex items-center justify-between">
                                <span class="text-xs font-extrabold text-slate-600 uppercase tracking-wider">3. Transferred Payouts</span>
                                <div class="w-8 h-8 rounded-xl bg-slate-100 text-slate-600 flex items-center justify-center">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 21L3 16.5m0 0L7.5 12M3 16.5h13.5m-5.1-9L16.5 3m0 0L21 7.5M16.5 3v13.5" />
                                    </svg>
                                </div>
                            </div>
                            <div>
                                <div class="text-3xl font-extrabold text-slate-900 font-heading">
                                    {{ $transferredApps->count() }} <span class="text-xs text-slate-400 font-medium">Completed</span>
                                </div>
                                <p class="text-[11px] text-slate-500 font-medium mt-1">Commissions successfully transferred to your payout account.</p>
                            </div>
                            <div class="pt-3 border-t border-slate-100 flex items-center justify-between text-xs text-slate-500">
                                <span>Total Transferred</span>
                                <strong class="text-slate-800 font-mono font-bold">
                                    {{ number_format($transferredApps->sum('commission_amount')) }} {{ $applications->first()?->currency ?? 'RWF' }}
                                </strong>
                            </div>
                        </div>
                    </div>

                    {{-- Quick Preview Grid --}}
                    <div class="grid lg:grid-cols-3 gap-8">
                        {{-- Recent Referred Students Preview (2 cols) --}}
                        <div class="lg:col-span-2 bg-white border border-slate-200/80 rounded-3xl p-6 sm:p-8 space-y-6 shadow-xs">
                            <div class="flex items-center justify-between border-b border-slate-100 pb-4">
                                <div>
                                    <h3 class="text-base font-bold text-slate-900 font-heading">Recent Student Referrals</h3>
                                    <p class="text-xs text-slate-500">Latest students applying with code {{ $promoCodes->first()?->code }}</p>
                                </div>
                                <button @click="activeTab = 'referrals'" class="text-xs font-bold text-amber-700 hover:text-amber-900 flex items-center gap-1">
                                    <span>View All ({{ $applications->count() }})</span>
                                    <span>→</span>
                                </button>
                            </div>

                            @if($applications->isEmpty())
                                <div class="text-center py-10 space-y-2">
                                    <p class="text-xs font-bold text-slate-600">No applications registered with your promo code yet.</p>
                                    <p class="text-[11px] text-slate-400">Share your promo code to start earning commissions!</p>
                                </div>
                            @else
                                <div class="divide-y divide-slate-100 text-xs">
                                    @foreach($applications->take(5) as $app)
                                    <div class="py-3 flex items-center justify-between gap-4">
                                        <div>
                                            <span class="font-bold text-slate-900 block">{{ $app->full_name }}</span>
                                            <span class="text-[11px] text-slate-400 block font-mono">{{ $app->reference_no }} · {{ $app->location }} Campus</span>
                                        </div>
                                        <div class="text-right">
                                            <strong class="text-emerald-700 font-mono font-bold block">{{ number_format($app->commission_amount) }} {{ $app->currency }}</strong>
                                            <span class="text-[10px] text-slate-500 capitalize">{{ str_replace('_', ' ', $app->payment_status) }}</span>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>

                        {{-- Quick Payout Profile Summary (1 col) --}}
                        <div class="bg-white border border-slate-200/80 rounded-3xl p-6 sm:p-8 space-y-4 shadow-xs flex flex-col justify-between">
                            <div class="space-y-3">
                                <div class="w-10 h-10 rounded-2xl bg-amber-50 text-amber-600 flex items-center justify-center font-bold">
                                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5z" />
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="text-sm font-bold text-slate-900">Payout Account</h4>
                                    <p class="text-xs text-slate-500">Method: <strong class="text-slate-800 uppercase">{{ $profile->payout_method }}</strong></p>
                                    <p class="text-xs text-slate-500 font-mono mt-1">{{ $profile->phone_number ?? 'No Phone Set' }}</p>
                                    @if($profile->momo_name)
                                        <p class="text-[11px] text-slate-400">Registered: {{ $profile->momo_name }}</p>
                                    @endif
                                </div>
                            </div>
                            <button @click="activeTab = 'payout'" class="w-full bg-slate-100 hover:bg-slate-200 text-slate-800 font-bold py-2.5 rounded-xl text-xs uppercase transition text-center">
                                Manage Payout Account
                            </button>
                        </div>
                    </div>
                </div>

                {{-- ====== TAB 2: REFERRED STUDENTS ====== --}}
                <div x-show="activeTab === 'referrals'" x-cloak x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0" class="space-y-6">
                    <div class="bg-white border border-slate-200/80 rounded-3xl p-6 sm:p-8 space-y-6 shadow-xs">
                        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 border-b border-slate-100 pb-5">
                            <div>
                                <h3 class="text-xl font-bold text-slate-900 font-heading">Referred Student Applications</h3>
                                <p class="text-xs text-slate-500">Track student status from intake application to tuition verification and payout.</p>
                            </div>
                            <span class="inline-flex items-center gap-1.5 bg-slate-100 text-slate-700 px-3 py-1 rounded-full text-xs font-bold border border-slate-200 self-start sm:self-auto">
                                <span class="w-1.5 h-1.5 rounded-full bg-amber-500"></span>
                                <span>{{ $applications->count() }} Total Referrals</span>
                            </span>
                        </div>

                        @if($applications->isEmpty())
                            <div class="text-center py-16 space-y-4">
                                <div class="w-14 h-14 rounded-2xl bg-amber-50 text-amber-600 flex items-center justify-center mx-auto shadow-xs border border-amber-200/80">
                                    <svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                                    </svg>
                                </div>
                                <div class="max-w-xs mx-auto space-y-1">
                                    <h4 class="text-sm font-bold text-slate-900">No Student Applications Yet</h4>
                                    <p class="text-xs text-slate-500">Share your referral link or promo code <strong class="text-amber-700 font-mono">{{ $promoCodes->first()?->code }}</strong> with interested students to start earning commission!</p>
                                </div>
                            </div>
                        @else
                            <div class="overflow-x-auto">
                                <table class="w-full text-left text-xs text-slate-700">
                                    <thead class="bg-slate-50 text-slate-500 font-bold uppercase tracking-wider border-b border-slate-200/80">
                                        <tr>
                                            <th class="p-3.5">Ref & Student</th>
                                            <th class="p-3.5">Campus</th>
                                            <th class="p-3.5">Final Tuition</th>
                                            <th class="p-3.5">Your Commission</th>
                                            <th class="p-3.5">Payment Status</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-slate-100 font-medium">
                                        @foreach($applications as $app)
                                        <tr class="hover:bg-slate-50/80 transition-colors">
                                            <td class="p-3.5 space-y-0.5">
                                                <span class="font-extrabold text-amber-700 block font-mono text-[11px]">{{ $app->reference_no }}</span>
                                                <span class="text-slate-900 font-bold block">{{ $app->full_name }}</span>
                                                <span class="text-[11px] text-slate-400 block">{{ $app->created_at->format('d M Y, H:i') }}</span>
                                            </td>
                                            <td class="p-3.5">
                                                <span class="font-bold text-slate-800 block">{{ $app->location }} Campus</span>
                                                <span class="text-[10px] text-slate-500 block uppercase font-semibold">{{ $app->schedule }}</span>
                                            </td>
                                            <td class="p-3.5 font-bold text-slate-900">
                                                {{ number_format($app->final_price) }} {{ $app->currency }}
                                            </td>
                                            <td class="p-3.5">
                                                <strong class="text-emerald-700 text-sm font-extrabold block font-mono">
                                                    {{ number_format($app->commission_amount) }} {{ $app->currency }}
                                                </strong>
                                            </td>
                                            <td class="p-3.5 space-y-1">
                                                @if($app->payment_status === 'pending_verification')
                                                    <span class="bg-amber-50 text-amber-800 border border-amber-200 px-2.5 py-1 rounded-full text-[10px] font-bold inline-flex items-center gap-1">
                                                        <span class="w-1.5 h-1.5 rounded-full bg-amber-500 animate-pulse"></span>
                                                        <span>Pending Verification</span>
                                                    </span>
                                                    <span class="text-[10px] text-slate-400 block">Tuition not yet marked paid</span>
                                                @elseif($app->payment_status === 'verified_paid')
                                                    @if($app->payout_status === 'transferred')
                                                        <span class="bg-emerald-50 text-emerald-800 border border-emerald-200 px-2.5 py-1 rounded-full text-[10px] font-bold inline-flex items-center gap-1">
                                                            <span>✓</span>
                                                            <span>Payout Transferred</span>
                                                        </span>
                                                        <span class="text-[10px] text-slate-400 block font-mono">Ref: {{ $app->payout_reference }}</span>
                                                    @else
                                                        <span class="bg-emerald-100 text-emerald-900 border border-emerald-300 px-2.5 py-1 rounded-full text-[10px] font-bold inline-flex items-center gap-1">
                                                            <span>✓</span>
                                                            <span>Confirmed Earned</span>
                                                        </span>
                                                        <span class="text-[10px] text-emerald-700 block font-medium">Tuition verified · Ready for payout</span>
                                                    @endif
                                                @else
                                                    <span class="bg-rose-50 text-rose-700 border border-rose-200 px-2.5 py-1 rounded-full text-[10px] font-bold block w-max">
                                                        Cancelled
                                                    </span>
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>
                </div>

                {{-- ====== TAB 3: PAYOUT SETTINGS ====== --}}
                <div x-show="activeTab === 'payout'" x-cloak x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0" class="max-w-2xl mx-auto space-y-6">
                    <div class="bg-white border border-slate-200/80 rounded-3xl p-6 sm:p-8 space-y-6 shadow-xs">
                        <div class="space-y-1 border-b border-slate-100 pb-4">
                            <h3 class="text-xl font-bold text-slate-900 font-heading">Payout Account Settings</h3>
                            <p class="text-xs text-slate-500">Configure your Mobile Money (MoMo / M-PESA) or Bank account for automatic commission transfers.</p>
                        </div>

                        <form action="{{ route('influencer.payout-profile') }}" method="POST" class="space-y-4 text-xs">
                            @csrf

                            <div>
                                <label class="block text-slate-700 font-bold mb-1.5 uppercase">Preferred Payout Method *</label>
                                <select name="payout_method" class="w-full bg-slate-50 border border-slate-200 rounded-xl p-3 text-slate-900 font-medium focus:ring-2 focus:ring-amber-400 focus:border-amber-400">
                                    <option value="momo" {{ $profile->payout_method === 'momo' ? 'selected' : '' }}>Mobile Money (MTN / Airtel Rwanda)</option>
                                    <option value="mpesa" {{ $profile->payout_method === 'mpesa' ? 'selected' : '' }}>M-PESA (Safaricom Kenya)</option>
                                    <option value="bank" {{ $profile->payout_method === 'bank' ? 'selected' : '' }}>Direct Bank Transfer</option>
                                </select>
                            </div>

                            <div>
                                <label class="block text-slate-700 font-bold mb-1.5 uppercase">Mobile Money / Phone Number</label>
                                <input type="text" name="phone_number" value="{{ old('phone_number', $profile->phone_number) }}" placeholder="+250 788 123 456 / +254 712 345 678"
                                    class="w-full bg-slate-50 border border-slate-200 rounded-xl p-3 text-slate-900 font-mono focus:ring-2 focus:ring-amber-400 focus:border-amber-400">
                            </div>

                            <div>
                                <label class="block text-slate-700 font-bold mb-1.5 uppercase">MoMo / Account Registered Name</label>
                                <input type="text" name="momo_name" value="{{ old('momo_name', $profile->momo_name) }}" placeholder="e.g. Keza Grace"
                                    class="w-full bg-slate-50 border border-slate-200 rounded-xl p-3 text-slate-900 font-medium focus:ring-2 focus:ring-amber-400 focus:border-amber-400">
                            </div>

                            <div class="pt-3 border-t border-slate-100 space-y-3">
                                <span class="text-[11px] font-bold text-amber-800 block uppercase">Bank Details (Optional if using MoMo)</span>

                                <div>
                                    <label class="block text-slate-600 mb-1 font-semibold">Bank Name</label>
                                    <input type="text" name="bank_name" value="{{ old('bank_name', $profile->bank_name) }}" placeholder="e.g. BK Rwanda / Equity Bank Kenya"
                                        class="w-full bg-slate-50 border border-slate-200 rounded-xl p-3 text-slate-900 font-medium focus:ring-2 focus:ring-amber-400 focus:border-amber-400">
                                </div>

                                <div>
                                    <label class="block text-slate-600 mb-1 font-semibold">Account Number</label>
                                    <input type="text" name="bank_account_number" value="{{ old('bank_account_number', $profile->bank_account_number) }}" placeholder="001-1234567-89"
                                        class="w-full bg-slate-50 border border-slate-200 rounded-xl p-3 text-slate-900 font-mono focus:ring-2 focus:ring-amber-400 focus:border-amber-400">
                                </div>
                            </div>

                            <button type="submit" class="w-full bg-yellow-400 hover:bg-yellow-300 text-slate-950 font-extrabold py-3.5 px-6 rounded-xl transition-all uppercase tracking-wider text-xs shadow-xs active:scale-98">
                                Save Payout Account Details
                            </button>
                        </form>
                    </div>
                </div>

            </main>

            {{-- Footer --}}
            <footer class="mt-auto border-t border-slate-200/80 bg-white py-6 px-4 sm:px-8 text-center text-xs text-slate-400">
                <p>&copy; {{ date('Y') }} Diva House Beauty Academy Partner Portal. All rights reserved.</p>
            </footer>

        </div>

    </div>

</body>

</html>
