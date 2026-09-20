<div>
    {{-- Header --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-900 tracking-tight">Academy Stats & Impact Manager</h1>
            <p class="text-sm text-gray-600">Add, edit, or reorder key achievement counters (Years of Experience, Students Taught, Programs, Campuses) displayed below the home banner.</p>
        </div>
        <button wire:click="create"
            class="inline-flex items-center gap-2 px-4 py-2.5 bg-yellow-400 hover:bg-yellow-300 text-neutral-950 font-bold text-xs uppercase tracking-wider rounded-xl transition-all shadow-sm">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
            </svg>
            Add New Statistic
        </button>
    </div>

    {{-- Flash Message --}}
    @if (session()->has('success'))
        <div class="mb-6 p-4 rounded-xl bg-emerald-50 border border-emerald-200 text-emerald-800 text-sm font-medium flex items-center justify-between">
            <span>{{ session('success') }}</span>
        </div>
    @endif

    {{-- Table of Stats --}}
    <div class="bg-white rounded-2xl border border-gray-200 shadow-xs overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50 border-b border-gray-200 text-xs font-semibold text-gray-500 uppercase tracking-wider">
                        <th class="py-3.5 px-4 text-center">Order</th>
                        <th class="py-3.5 px-4">Counter Value</th>
                        <th class="py-3.5 px-4">Label</th>
                        <th class="py-3.5 px-4">Description</th>
                        <th class="py-3.5 px-4 text-center">Status</th>
                        <th class="py-3.5 px-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 text-sm">
                    @forelse($stats as $stat)
                        <tr class="hover:bg-gray-50/80 transition-colors">
                            <td class="py-3.5 px-4 text-center font-mono font-bold text-gray-700">
                                #{{ $stat->order }}
                            </td>
                            <td class="py-3.5 px-4">
                                <span class="text-xl font-black text-gray-900 font-heading">
                                    {{ $stat->value }}
                                </span>
                            </td>
                            <td class="py-3.5 px-4">
                                <p class="font-bold text-gray-900 leading-snug">{{ $stat->label }}</p>
                            </td>
                            <td class="py-3.5 px-4">
                                <p class="text-xs text-gray-500 max-w-xs">{{ $stat->description ?? '-' }}</p>
                            </td>
                            <td class="py-3.5 px-4 text-center">
                                <button wire:click="toggleActive({{ $stat->id }})"
                                    class="px-2.5 py-1 rounded-full text-xs font-bold transition-all cursor-pointer {{ $stat->is_active ? 'bg-emerald-100 text-emerald-800' : 'bg-gray-100 text-gray-500' }}">
                                    {{ $stat->is_active ? 'Active' : 'Disabled' }}
                                </button>
                            </td>
                            <td class="py-3.5 px-4 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <button wire:click="edit({{ $stat->id }})"
                                        class="px-3 py-1.5 bg-gray-100 hover:bg-gray-200 text-gray-700 text-xs font-semibold rounded-lg transition-all">
                                        Edit
                                    </button>
                                    <button wire:click="confirmDelete({{ $stat->id }})"
                                        class="px-3 py-1.5 bg-red-50 hover:bg-red-100 text-red-600 text-xs font-semibold rounded-lg transition-all">
                                        Remove
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="py-12 text-center text-gray-500 text-sm">
                                No academy statistics found. Click "Add New Statistic" above to create one.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="px-4 py-3 border-t border-gray-100">
            {{ $stats->links() }}
        </div>
    </div>

    {{-- Add/Edit Form Modal --}}
    @if($showForm)
        <div class="fixed inset-0 z-50 overflow-y-auto bg-black/60 backdrop-blur-xs flex items-center justify-center p-4">
            <div class="bg-white rounded-2xl max-w-lg w-full p-6 shadow-2xl space-y-5">
                <div class="flex items-center justify-between border-b pb-3">
                    <h3 class="text-lg font-bold text-gray-900">
                        {{ $editingId ? 'Edit Statistic' : 'Add New Statistic' }}
                    </h3>
                    <button wire:click="$set('showForm', false)" class="text-gray-400 hover:text-gray-600">✕</button>
                </div>

                <form wire:submit.prevent="save" class="space-y-4">
                    <div>
                        <label class="block text-xs font-bold uppercase text-gray-700 mb-1">Counter Value *</label>
                        <input type="text" wire:model="value" placeholder="e.g. 8+ or 1,500+" class="w-full text-sm rounded-xl border-gray-300 focus:border-yellow-400 focus:ring-yellow-400">
                        @error('value') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-xs font-bold uppercase text-gray-700 mb-1">Metric Title / Label *</label>
                        <input type="text" wire:model="label" placeholder="e.g. Years of Experience" class="w-full text-sm rounded-xl border-gray-300 focus:border-yellow-400 focus:ring-yellow-400">
                        @error('label') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-xs font-bold uppercase text-gray-700 mb-1">Short Description (Optional)</label>
                        <textarea wire:model="description" rows="2" placeholder="e.g. Pioneering beauty education in Rwanda & Kenya" class="w-full text-sm rounded-xl border-gray-300 focus:border-yellow-400 focus:ring-yellow-400"></textarea>
                    </div>

                    <div class="grid grid-cols-2 gap-3 items-center pt-2">
                        <div>
                            <label class="block text-xs font-bold uppercase text-gray-700 mb-1">Display Order</label>
                            <input type="number" wire:model="order" class="w-full text-sm rounded-xl border-gray-300 focus:border-yellow-400 focus:ring-yellow-400">
                        </div>
                        <div class="flex items-center gap-2 pt-5">
                            <input type="checkbox" wire:model="is_active" id="stat_is_active" class="rounded text-yellow-400 focus:ring-yellow-400">
                            <label for="stat_is_active" class="text-xs font-bold text-gray-700 cursor-pointer">Active on Home Page</label>
                        </div>
                    </div>

                    <div class="flex items-center justify-end gap-3 pt-4 border-t">
                        <button type="button" wire:click="$set('showForm', false)" class="px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 text-xs font-bold rounded-xl">
                            Cancel
                        </button>
                        <button type="submit" class="px-5 py-2 bg-yellow-400 hover:bg-yellow-300 text-neutral-950 text-xs font-extrabold rounded-xl shadow-xs">
                            Save Metric
                        </button>
                    </div>
                </form>
            </div>
        </div>
    @endif

    {{-- Delete Modal --}}
    @if($showDeleteModal)
        <div class="fixed inset-0 z-50 bg-black/60 backdrop-blur-xs flex items-center justify-center p-4">
            <div class="bg-white rounded-2xl max-w-sm w-full p-6 shadow-2xl text-center space-y-4">
                <div class="w-12 h-12 rounded-full bg-red-100 text-red-600 flex items-center justify-center mx-auto text-xl">⚠️</div>
                <h3 class="text-base font-bold text-gray-900">Remove Statistic?</h3>
                <p class="text-xs text-gray-500">This action will permanently delete this key metric counter from the home page.</p>
                <div class="flex items-center justify-center gap-3 pt-2">
                    <button wire:click="$set('showDeleteModal', false)" class="px-4 py-2 bg-gray-100 text-gray-700 text-xs font-bold rounded-xl">Cancel</button>
                    <button wire:click="delete" class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white text-xs font-bold rounded-xl">Delete</button>
                </div>
            </div>
        </div>
    @endif
</div>
