<div class="space-y-6">

    {{-- Header Banner --}}
    <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 bg-white p-6 rounded-2xl border border-slate-200/80 shadow-xs">
        <div>
            <h1 class="text-2xl font-extrabold text-slate-900 font-heading">Intake Student Applications</h1>
            <p class="text-xs text-slate-500 font-medium">Verify student offline tuition payments & process influencer commission payouts.</p>
        </div>
    </div>

    {{-- Flash Message --}}
    @if (session()->has('success'))
        <div class="bg-emerald-50 border border-emerald-200 text-emerald-800 p-4 rounded-xl text-xs font-bold flex items-center justify-between">
            <span>✓ {{ session('success') }}</span>
        </div>
    @endif

    {{-- Search & Filters --}}
    <div class="bg-white p-4 rounded-2xl border border-slate-200/80 shadow-xs flex flex-wrap gap-4 items-center justify-between">
        <div class="flex-1 min-w-[240px]">
            <input type="text" wire:model.live="search" placeholder="Search by student name, email, phone or Ref No..."
                class="w-full rounded-xl border-slate-300 text-xs focus:ring-amber-400 focus:border-amber-400 p-3 bg-slate-50">
        </div>

        <div class="flex flex-wrap items-center gap-3">
            <select wire:model.live="filterLocation" class="rounded-xl border-slate-300 text-xs font-semibold bg-slate-50 p-3">
                <option value="">All Campuses (RW & KE)</option>
                <option value="Kigali">Kigali Studio (RWF)</option>
                <option value="Nairobi">Nairobi Hub (KES)</option>
                <option value="Mombasa">Mombasa Hub (KES)</option>
            </select>

            <select wire:model.live="filterStatus" class="rounded-xl border-slate-300 text-xs font-semibold bg-slate-50 p-3">
                <option value="">All Payment Statuses</option>
                <option value="pending_verification">Pending Verification</option>
                <option value="verified_paid">Verified Paid</option>
                <option value="cancelled">Cancelled</option>
            </select>
        </div>
    </div>

    {{-- Applications Table --}}
    <div class="bg-white rounded-2xl border border-slate-200/80 shadow-xs overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs text-slate-700">
                <thead class="bg-slate-900 text-slate-200 uppercase tracking-wider font-extrabold text-[11px]">
                    <tr>
                        <th class="p-4">Ref & Student</th>
                        <th class="p-4">Course & Campus</th>
                        <th class="p-4">Tuition Breakdown</th>
                        <th class="p-4">Promo / Influencer</th>
                        <th class="p-4">Payment Status</th>
                        <th class="p-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 font-medium">
                    @forelse($applications as $app)
                    <tr class="hover:bg-slate-50/80 transition-colors">
                        {{-- Ref & Student --}}
                        <td class="p-4 space-y-1">
                            <span class="font-extrabold text-amber-600 block font-mono text-xs">{{ $app->reference_no }}</span>
                            <span class="font-bold text-slate-900 block text-sm">{{ $app->full_name }}</span>
                            <span class="text-slate-500 block text-[11px]">{{ $app->email }}</span>
                            <span class="text-slate-600 font-semibold block text-[11px]">{{ $app->phone_code }} {{ $app->phone }}</span>
                        </td>

                        {{-- Course & Campus --}}
                        <td class="p-4 space-y-1">
                            <span class="font-bold text-slate-900 block">{{ $app->course ? $app->course->name : 'N/A' }}</span>
                            <span class="inline-block bg-slate-100 text-slate-700 font-extrabold px-2.5 py-0.5 rounded text-[10px] uppercase">
                                {{ $app->location }} Studio
                            </span>
                            <span class="text-[11px] text-slate-500 block uppercase font-medium">{{ $app->schedule }}</span>
                        </td>

                        {{-- Tuition Breakdown --}}
                        <td class="p-4 space-y-1">
                            <div class="flex justify-between gap-2 text-slate-500 text-[11px]">
                                <span>Base:</span>
                                <span class="font-semibold">{{ number_format($app->original_price) }} {{ $app->currency }}</span>
                            </div>
                            @if($app->discount_amount > 0)
                            <div class="flex justify-between gap-2 text-emerald-600 text-[11px]">
                                <span>Discount:</span>
                                <span class="font-bold">- {{ number_format($app->discount_amount) }} {{ $app->currency }}</span>
                            </div>
                            @endif
                            <div class="flex justify-between gap-2 border-t border-slate-100 pt-1 text-xs">
                                <span class="font-bold text-slate-900">Payable:</span>
                                <strong class="text-amber-600 font-extrabold">{{ number_format($app->final_price) }} {{ $app->currency }}</strong>
                            </div>
                        </td>

                        {{-- Promo / Influencer --}}
                        <td class="p-4 space-y-1">
                            @if($app->promoCode)
                                <span class="bg-amber-100 text-amber-900 font-mono font-extrabold px-2 py-0.5 rounded text-[11px]">
                                    {{ $app->promoCode->code }}
                                </span>
                                @if($app->influencer)
                                    <span class="text-slate-700 font-bold block text-[11px]">{{ $app->influencer->name }}</span>
                                    <span class="text-emerald-700 font-extrabold block text-[11px]">
                                        Comm: {{ number_format($app->commission_amount) }} {{ $app->currency }}
                                    </span>
                                    @if($app->influencer->influencerProfile)
                                        <span class="text-slate-500 text-[10px] block">
                                            Pay: {{ strtoupper($app->influencer->influencerProfile->payout_method) }} ({{ $app->influencer->influencerProfile->phone_number }})
                                        </span>
                                    @endif
                                @endif
                            @else
                                <span class="text-slate-400 text-[11px] italic">Direct (No Promo)</span>
                            @endif
                        </td>

                        {{-- Payment Status --}}
                        <td class="p-4 space-y-1">
                            @if($app->payment_status === 'pending_verification')
                                <span class="bg-amber-100 text-amber-900 border border-amber-300 font-bold px-2.5 py-1 rounded-full text-[10px] inline-flex items-center gap-1">
                                    <span class="w-1.5 h-1.5 rounded-full bg-amber-500 animate-pulse"></span>
                                    <span>Pending Verification</span>
                                </span>
                            @elseif($app->payment_status === 'verified_paid')
                                <span class="bg-emerald-100 text-emerald-800 border border-emerald-300 font-bold px-2.5 py-1 rounded-full text-[10px] inline-flex items-center gap-1">
                                    <span>✓</span>
                                    <span>Verified Paid</span>
                                </span>
                                @if($app->verifier)
                                    <span class="text-[10px] text-slate-500 block">By: {{ $app->verifier->name }}</span>
                                @endif
                            @else
                                <span class="bg-slate-100 text-slate-600 font-bold px-2.5 py-1 rounded-full text-[10px]">
                                    Cancelled
                                </span>
                            @endif

                            {{-- Payout status if promo code --}}
                            @if($app->influencer_id)
                                <div class="pt-1">
                                    @if($app->payout_status === 'transferred')
                                        <span class="bg-emerald-700 text-white font-bold px-2 py-0.5 rounded text-[10px] block w-max">
                                            Payout Transferred
                                        </span>
                                        <span class="text-[10px] text-slate-500 font-mono block">Ref: {{ $app->payout_reference }}</span>
                                    @elseif($app->payout_status === 'confirmed')
                                        <span class="bg-amber-500 text-white font-bold px-2 py-0.5 rounded text-[10px] block w-max">
                                            Comm Confirmed
                                        </span>
                                    @endif
                                </div>
                            @endif
                        </td>

                        {{-- Actions --}}
                        <td class="p-4 text-right space-y-2">
                            @if($app->payment_status === 'pending_verification')
                                <button wire:click="verifyPayment({{ $app->id }})" wire:confirm="Are you sure student {{ $app->full_name }} has paid tuition?"
                                    class="bg-emerald-600 hover:bg-emerald-700 text-white font-extrabold px-3 py-1.5 rounded-lg text-[11px] uppercase transition-colors shadow-xs">
                                    Verify Payment
                                </button>
                            @endif

                            @if($app->payment_status === 'verified_paid' && $app->influencer_id && $app->payout_status !== 'transferred')
                                <button wire:click="openPayoutModal({{ $app->id }})"
                                    class="bg-slate-900 hover:bg-slate-800 text-amber-400 font-extrabold px-3 py-1.5 rounded-lg text-[11px] uppercase transition-colors shadow-xs">
                                    Record Payout
                                </button>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="p-8 text-center text-slate-500">
                            No student applications match your filter criteria.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="p-4 border-t border-slate-100">
            {{ $applications->links() }}
        </div>
    </div>

    {{-- PAYOUT MODAL --}}
    @if($payoutModalAppId)
    <div class="fixed inset-0 z-50 bg-slate-950/70 backdrop-blur-xs flex items-center justify-center p-4">
        <div class="bg-white rounded-3xl p-6 sm:p-8 max-w-md w-full space-y-6 shadow-2xl border border-slate-200">
            <div class="flex items-center justify-between border-b border-slate-100 pb-3">
                <h3 class="text-lg font-bold text-slate-900 font-heading">Record Influencer Payout</h3>
                <button wire:click="closePayoutModal()" class="text-slate-400 hover:text-slate-600 text-xl font-bold">&times;</button>
            </div>

            <p class="text-xs text-slate-600 leading-relaxed font-medium">
                Enter the MoMo / M-PESA / Bank transaction reference number to confirm funds transfer to the influencer.
            </p>

            <div>
                <label class="block text-xs font-bold text-slate-800 mb-1.5 uppercase">Transaction Reference Number *</label>
                <input type="text" wire:model="payoutReference" placeholder="e.g. TXN-998822 / MoMo Ref #123456"
                    class="w-full rounded-xl border-slate-300 p-3 text-xs font-mono font-bold focus:ring-amber-400 focus:border-amber-400">
                @error('payoutReference') <span class="text-rose-600 text-[11px] block mt-1">{{ $message }}</span> @enderror
            </div>

            <div class="flex justify-end gap-3 pt-2">
                <button wire:click="closePayoutModal()" class="px-5 py-2.5 rounded-xl bg-slate-100 text-slate-700 font-bold text-xs uppercase">
                    Cancel
                </button>
                <button wire:click="recordPayout()" class="px-6 py-2.5 rounded-xl bg-amber-500 hover:bg-amber-400 text-slate-950 font-extrabold text-xs uppercase shadow-md">
                    Confirm Payout Transferred
                </button>
            </div>
        </div>
    </div>
    @endif

</div>
