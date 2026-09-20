<div class="space-y-6">

    {{-- Header Banner --}}
    <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 bg-white p-6 rounded-2xl border border-slate-200/80 shadow-xs">
        <div>
            <h1 class="text-2xl font-extrabold text-slate-900 font-heading">Promo Codes & Influencer Partners</h1>
            <p class="text-xs text-slate-500 font-medium">Create promo codes, set discount rates, and assign influencer commission percentages.</p>
        </div>
        <button wire:click="openCreateModal()" class="bg-amber-500 hover:bg-amber-400 text-slate-950 font-extrabold px-5 py-3 rounded-xl text-xs uppercase tracking-wider shadow-md transition-all">
            + Create New Promo Code
        </button>
    </div>

    {{-- Flash Message --}}
    @if (session()->has('success'))
        <div class="bg-emerald-50 border border-emerald-200 text-emerald-800 p-4 rounded-xl text-xs font-bold">
            ✓ {{ session('success') }}
        </div>
    @endif

    {{-- Promo Codes Table --}}
    <div class="bg-white rounded-2xl border border-slate-200/80 shadow-xs overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs text-slate-700">
                <thead class="bg-slate-900 text-slate-200 uppercase tracking-wider font-extrabold text-[11px]">
                    <tr>
                        <th class="p-4">Promo Code</th>
                        <th class="p-4">Assigned Influencer</th>
                        <th class="p-4">Student Discount %</th>
                        <th class="p-4">Influencer Comm %</th>
                        <th class="p-4">Total Uses</th>
                        <th class="p-4">Status</th>
                        <th class="p-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 font-medium">
                    @forelse($promoCodes as $promo)
                    <tr class="hover:bg-slate-50/80 transition-colors">
                        <td class="p-4 font-mono font-extrabold text-amber-600 text-sm">
                            {{ $promo->code }}
                        </td>
                        <td class="p-4">
                            @if($promo->influencer)
                                <span class="font-bold text-slate-900 block">{{ $promo->influencer->name }}</span>
                                <span class="text-slate-500 text-[11px] block">{{ $promo->influencer->email }}</span>
                            @else
                                <span class="text-slate-400 italic">Unassigned (Global Code)</span>
                            @endif
                        </td>
                        <td class="p-4 font-extrabold text-emerald-700 text-sm">
                            {{ number_format($promo->discount_percent, 1) }}%
                        </td>
                        <td class="p-4 font-extrabold text-amber-600 text-sm">
                            {{ number_format($promo->commission_percent, 1) }}%
                        </td>
                        <td class="p-4 font-bold text-slate-800">
                            {{ $promo->times_used }} {{ $promo->usage_limit ? '/ ' . $promo->usage_limit : '' }}
                        </td>
                        <td class="p-4">
                            <button wire:click="toggleActive({{ $promo->id }})" class="cursor-pointer">
                                @if($promo->is_active)
                                    <span class="bg-emerald-100 text-emerald-800 border border-emerald-300 font-bold px-2.5 py-1 rounded-full text-[10px]">
                                        Active
                                    </span>
                                @else
                                    <span class="bg-slate-100 text-slate-600 font-bold px-2.5 py-1 rounded-full text-[10px]">
                                        Inactive
                                    </span>
                                @endif
                            </button>
                        </td>
                        <td class="p-4 text-right">
                            <button wire:click="openEditModal({{ $promo->id }})" class="bg-slate-100 hover:bg-slate-200 text-slate-800 font-bold px-3 py-1.5 rounded-lg text-[11px] uppercase transition-colors">
                                Edit
                            </button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="p-8 text-center text-slate-500">
                            No promo codes found. Click "+ Create New Promo Code" above to add one.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="p-4 border-t border-slate-100">
            {{ $promoCodes->links() }}
        </div>
    </div>

    {{-- MODAL FORM --}}
    @if($showModal)
    <div class="fixed inset-0 z-50 bg-slate-950/70 backdrop-blur-xs flex items-center justify-center p-4">
        <div class="bg-white rounded-3xl p-6 sm:p-8 max-w-md w-full space-y-6 shadow-2xl border border-slate-200">
            <div class="flex items-center justify-between border-b border-slate-100 pb-3">
                <h3 class="text-lg font-bold text-slate-900 font-heading">
                    {{ $editingId ? 'Edit Promo Code' : 'Create New Promo Code' }}
                </h3>
                <button wire:click="closeModal()" class="text-slate-400 hover:text-slate-600 text-xl font-bold">&times;</button>
            </div>

            <form wire:submit.prevent="save" class="space-y-4 text-xs">
                <div>
                    <label class="block font-bold text-slate-800 mb-1 uppercase">Promo Code String *</label>
                    <input type="text" wire:model="code" placeholder="e.g. DIVA2026 / KEZA10"
                        class="w-full rounded-xl border-slate-300 p-3 font-mono font-extrabold uppercase focus:ring-amber-400 focus:border-amber-400">
                    @error('code') <span class="text-rose-600 text-[11px] block mt-1">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label class="block font-bold text-slate-800 mb-1 uppercase">Assigned Influencer Partner</label>
                    <select wire:model="influencer_id" class="w-full rounded-xl border-slate-300 p-3 bg-slate-50 font-semibold focus:ring-amber-400 focus:border-amber-400">
                        <option value="">-- No Influencer (Global Code) --</option>
                        @foreach($influencers as $user)
                            <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
                        @endforeach
                    </select>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block font-bold text-slate-800 mb-1 uppercase">Student Discount % *</label>
                        <input type="number" step="0.5" wire:model="discount_percent" placeholder="10.0"
                            class="w-full rounded-xl border-slate-300 p-3 font-bold focus:ring-amber-400 focus:border-amber-400">
                    </div>
                    <div>
                        <label class="block font-bold text-slate-800 mb-1 uppercase">Influencer Comm % *</label>
                        <input type="number" step="0.5" wire:model="commission_percent" placeholder="10.0"
                            class="w-full rounded-xl border-slate-300 p-3 font-bold focus:ring-amber-400 focus:border-amber-400">
                    </div>
                </div>

                <div>
                    <label class="block font-bold text-slate-800 mb-1 uppercase">Usage Limit (Optional)</label>
                    <input type="number" wire:model="usage_limit" placeholder="Leave empty for unlimited"
                        class="w-full rounded-xl border-slate-300 p-3 focus:ring-amber-400 focus:border-amber-400">
                </div>

                <div class="flex items-center gap-2 pt-1">
                    <input type="checkbox" wire:model="is_active" id="is_active_chk" class="rounded text-amber-500 focus:ring-amber-400">
                    <label for="is_active_chk" class="font-bold text-slate-800">Active (Students can use code)</label>
                </div>

                <div class="flex justify-end gap-3 pt-4 border-t border-slate-100">
                    <button type="button" wire:click="closeModal()" class="px-5 py-2.5 rounded-xl bg-slate-100 text-slate-700 font-bold text-xs uppercase">
                        Cancel
                    </button>
                    <button type="submit" class="px-6 py-2.5 rounded-xl bg-amber-500 hover:bg-amber-400 text-slate-950 font-extrabold text-xs uppercase shadow-md">
                        Save Promo Code
                    </button>
                </div>
            </form>
        </div>
    </div>
    @endif

</div>
