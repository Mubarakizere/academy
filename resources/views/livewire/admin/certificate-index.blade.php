<div class="space-y-6">

    {{-- Flash Notifications --}}
    @if (session()->has('success'))
        <div class="p-4 rounded-2xl bg-emerald-50 border border-emerald-200 text-emerald-800 text-xs font-bold flex items-center justify-between shadow-xs">
            <div class="flex items-center gap-2">
                <svg class="w-5 h-5 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>{{ session('success') }}</span>
            </div>
        </div>
    @endif

    {{-- Top Action Bar --}}
    <div class="bg-white rounded-3xl p-6 border border-slate-200/80 shadow-sm flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-amber-400/10 border border-amber-400/20 text-amber-600 text-xs font-bold uppercase tracking-wider mb-2">
                Official Certification Registry
            </div>
            <h2 class="text-xl font-black text-slate-900 font-heading">Certified Graduates & Credentials</h2>
            <p class="text-xs text-slate-500 mt-0.5">Manage alumni certificates, issue verification codes, and authorize trained graduate credentials.</p>
        </div>

        <button wire:click="create"
            class="inline-flex items-center justify-center gap-2 bg-slate-900 hover:bg-slate-800 text-amber-400 font-extrabold text-xs px-5 py-3 rounded-2xl shadow-md transition-all">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
            </svg>
            <span>Issue New Certificate</span>
        </button>
    </div>

    {{-- Search & Filter Controls --}}
    <div class="bg-white rounded-3xl p-4 border border-slate-200/80 shadow-sm flex items-center gap-3">
        <div class="relative flex-1">
            <svg class="w-4 h-4 text-slate-400 absolute left-4 top-3.5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
            </svg>
            <input type="text" wire:model.live.debounce.300ms="search" placeholder="Search by graduate name, certificate # (e.g. DH-2026-9842), course, or campus..."
                class="w-full pl-11 pr-4 py-2.5 rounded-2xl bg-slate-50 border border-slate-200 text-slate-800 text-xs font-medium focus:bg-white focus:ring-2 focus:ring-amber-400 focus:border-amber-400 outline-none transition-all">
        </div>
    </div>

    {{-- Certificates Data Table --}}
    <div class="bg-white rounded-3xl border border-slate-200/80 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs">
                <thead>
                    <tr class="border-b border-slate-100 bg-slate-50/50 text-slate-400 uppercase tracking-wider font-extrabold text-[10px]">
                        <th class="py-4 px-6">Certificate #</th>
                        <th class="py-4 px-6">Graduate Name</th>
                        <th class="py-4 px-6">Course Completed</th>
                        <th class="py-4 px-6">Hub / Location</th>
                        <th class="py-4 px-6">Issue Date</th>
                        <th class="py-4 px-6">Status</th>
                        <th class="py-4 px-6 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($certificates as $cert)
                        <tr class="hover:bg-slate-50/80 transition-colors">
                            <td class="py-4 px-6">
                                <span class="font-black text-slate-900 tracking-wider font-mono text-xs bg-slate-100 px-2.5 py-1 rounded-lg border border-slate-200">
                                    {{ $cert->certificate_number }}
                                </span>
                            </td>
                            <td class="py-4 px-6">
                                <div>
                                    <p class="font-bold text-slate-900 leading-tight text-sm">{{ $cert->student_name }}</p>
                                    @if($cert->student_email)
                                        <p class="text-[10px] text-slate-400 leading-tight mt-0.5">{{ $cert->student_email }}</p>
                                    @endif
                                </div>
                            </td>
                            <td class="py-4 px-6">
                                <div>
                                    <p class="font-bold text-slate-800 leading-tight">{{ $cert->course_name }}</p>
                                    <p class="text-[10px] text-amber-600 font-semibold mt-0.5">{{ $cert->grade }}</p>
                                </div>
                            </td>
                            <td class="py-4 px-6 font-medium text-slate-600">
                                {{ $cert->location }}
                            </td>
                            <td class="py-4 px-6 text-slate-500 font-medium">
                                {{ $cert->issue_date?->format('M d, Y') ?? '-' }}
                            </td>
                            <td class="py-4 px-6">
                                <button wire:click="toggleValid({{ $cert->id }})" title="Click to toggle validation status"
                                    class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-[10px] font-extrabold cursor-pointer transition-colors {{ $cert->is_valid ? 'bg-emerald-50 text-emerald-700 border border-emerald-200 hover:bg-emerald-100' : 'bg-rose-50 text-rose-700 border border-rose-200 hover:bg-rose-100' }}">
                                    <span class="w-1.5 h-1.5 rounded-full {{ $cert->is_valid ? 'bg-emerald-500' : 'bg-rose-500' }}"></span>
                                    <span>{{ $cert->is_valid ? 'Verified Valid' : 'Revoked / Invalid' }}</span>
                                </button>
                            </td>
                            <td class="py-4 px-6 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <button wire:click="edit({{ $cert->id }})" title="Edit Certificate"
                                        class="p-2 text-slate-400 hover:text-amber-600 hover:bg-amber-50 rounded-xl transition-colors">
                                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                        </svg>
                                    </button>
                                    <button wire:click="confirmDelete({{ $cert->id }})" title="Delete Certificate"
                                        class="p-2 text-slate-400 hover:text-rose-600 hover:bg-rose-50 rounded-xl transition-colors">
                                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="py-12 text-center text-slate-400">
                                <p class="text-sm font-semibold">No graduate certificates found matching your search.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="p-4 border-t border-slate-100 bg-slate-50/50">
            {{ $certificates->links() }}
        </div>
    </div>

    {{-- Issue / Edit Certificate Form Modal --}}
    @if($showForm)
        <div class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-slate-900/60 backdrop-blur-xs">
            <div class="bg-white rounded-3xl shadow-2xl border border-slate-200 max-w-xl w-full p-6 sm:p-8 space-y-6 animate-in fade-in zoom-in duration-200">
                
                <div class="flex items-center justify-between border-b border-slate-100 pb-4">
                    <div>
                        <h3 class="text-lg font-black text-slate-900 font-heading">
                            {{ $editingId ? 'Edit Graduate Certificate' : 'Issue New Graduate Certificate' }}
                        </h3>
                        <p class="text-xs text-slate-500">Official credential record stored in Diva House verification registry.</p>
                    </div>
                    <button wire:click="$set('showForm', false)" class="text-slate-400 hover:text-slate-700">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <form wire:submit.prevent="save" class="space-y-4 text-xs">
                    
                    {{-- Certificate Number --}}
                    <div>
                        <div class="flex items-center justify-between mb-1">
                            <label class="font-bold text-slate-700 uppercase tracking-wider text-[10px]">Certificate Verification ID *</label>
                            <button type="button" wire:click="generateCode" class="text-amber-600 font-bold hover:underline text-[10px]">
                                Re-Generate ID
                            </button>
                        </div>
                        <input type="text" wire:model="certificate_number" required placeholder="DH-2026-XXXX"
                            class="w-full px-4 py-2.5 rounded-2xl bg-slate-50 border border-slate-200 font-mono font-bold text-slate-900 focus:bg-white focus:ring-2 focus:ring-amber-400 outline-none">
                        @error('certificate_number') <span class="text-rose-500 font-bold text-[10px] mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    {{-- Student Full Name & Email --}}
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="font-bold text-slate-700 uppercase tracking-wider text-[10px] block mb-1">Graduate Full Name *</label>
                            <input type="text" wire:model="student_name" required placeholder="e.g. Jane Mukamana"
                                class="w-full px-4 py-2.5 rounded-2xl bg-slate-50 border border-slate-200 font-bold text-slate-900 focus:bg-white focus:ring-2 focus:ring-amber-400 outline-none">
                            @error('student_name') <span class="text-rose-500 font-bold text-[10px] mt-1 block">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label class="font-bold text-slate-700 uppercase tracking-wider text-[10px] block mb-1">Graduate Email (Optional)</label>
                            <input type="email" wire:model="student_email" placeholder="jane@example.com"
                                class="w-full px-4 py-2.5 rounded-2xl bg-slate-50 border border-slate-200 font-medium text-slate-900 focus:bg-white focus:ring-2 focus:ring-amber-400 outline-none">
                            @error('student_email') <span class="text-rose-500 font-bold text-[10px] mt-1 block">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    {{-- Course Title & Course Selection --}}
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="font-bold text-slate-700 uppercase tracking-wider text-[10px] block mb-1">Select Academy Course</label>
                            <select wire:model.live="course_id"
                                class="w-full px-4 py-2.5 rounded-2xl bg-slate-50 border border-slate-200 font-medium text-slate-900 focus:bg-white focus:ring-2 focus:ring-amber-400 outline-none">
                                <option value="">-- Custom Course Name --</option>
                                @foreach($courses as $c)
                                    <option value="{{ $c->id }}">{{ $c->title }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label class="font-bold text-slate-700 uppercase tracking-wider text-[10px] block mb-1">Course Title *</label>
                            <input type="text" wire:model="course_name" required placeholder="Master Lashes Artistry & Brow Styling"
                                class="w-full px-4 py-2.5 rounded-2xl bg-slate-50 border border-slate-200 font-bold text-slate-900 focus:bg-white focus:ring-2 focus:ring-amber-400 outline-none">
                            @error('course_name') <span class="text-rose-500 font-bold text-[10px] mt-1 block">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    {{-- Issue Date & Grade/Distinction --}}
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="font-bold text-slate-700 uppercase tracking-wider text-[10px] block mb-1">Issue Date *</label>
                            <input type="date" wire:model="issue_date" required
                                class="w-full px-4 py-2.5 rounded-2xl bg-slate-50 border border-slate-200 font-bold text-slate-900 focus:bg-white focus:ring-2 focus:ring-amber-400 outline-none">
                            @error('issue_date') <span class="text-rose-500 font-bold text-[10px] mt-1 block">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label class="font-bold text-slate-700 uppercase tracking-wider text-[10px] block mb-1">Grade / Award Title *</label>
                            <input type="text" wire:model="grade" required placeholder="Certified Master Specialist with Distinction"
                                class="w-full px-4 py-2.5 rounded-2xl bg-slate-50 border border-slate-200 font-bold text-slate-900 focus:bg-white focus:ring-2 focus:ring-amber-400 outline-none">
                            @error('grade') <span class="text-rose-500 font-bold text-[10px] mt-1 block">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    {{-- Location / Campus --}}
                    <div>
                        <label class="font-bold text-slate-700 uppercase tracking-wider text-[10px] block mb-1">Training Hub / Campus Location *</label>
                        <input type="text" wire:model="location" required placeholder="Kigali Flagship Hub (Rwanda)"
                            class="w-full px-4 py-2.5 rounded-2xl bg-slate-50 border border-slate-200 font-bold text-slate-900 focus:bg-white focus:ring-2 focus:ring-amber-400 outline-none">
                        @error('location') <span class="text-rose-500 font-bold text-[10px] mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    {{-- Status Switch --}}
                    <div class="pt-2">
                        <label class="inline-flex items-center gap-3 cursor-pointer">
                            <input type="checkbox" wire:model="is_valid" class="w-4 h-4 rounded text-amber-500 focus:ring-amber-400 border-slate-300">
                            <span class="font-bold text-slate-800">Certificate Authorized & Searchable on Website</span>
                        </label>
                    </div>

                    {{-- Action Buttons --}}
                    <div class="pt-4 flex items-center justify-end gap-3 border-t border-slate-100">
                        <button type="button" wire:click="$set('showForm', false)"
                            class="px-5 py-2.5 rounded-2xl bg-slate-100 text-slate-700 font-bold hover:bg-slate-200 transition-colors">
                            Cancel
                        </button>
                        <button type="submit"
                            class="px-6 py-2.5 rounded-2xl bg-slate-900 text-amber-400 font-black hover:bg-slate-800 shadow-md transition-all">
                            {{ $editingId ? 'Update Record' : 'Issue Certificate' }}
                        </button>
                    </div>

                </form>
            </div>
        </div>
    @endif

    {{-- Delete Confirmation Modal --}}
    @if($showDeleteModal)
        <div class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-slate-900/60 backdrop-blur-xs"
            wire:keydown.escape.window="cancelDelete"
            wire:click.self="cancelDelete">
            <div class="bg-white rounded-3xl shadow-2xl border border-slate-200 max-w-md w-full p-6 sm:p-7 text-center space-y-5 animate-in fade-in zoom-in duration-200">
                <div class="w-14 h-14 rounded-2xl bg-rose-50 border border-rose-100 text-rose-600 flex items-center justify-center mx-auto shadow-xs">
                    <svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                    </svg>
                </div>
                <div>
                    <h3 class="text-lg font-black text-slate-900 font-heading">Delete Certificate Record?</h3>
                    <p class="text-xs text-slate-500 mt-1">Are you sure you want to permanently remove this graduate credential from the system?</p>
                </div>

                @if($deletingCertificate)
                    <div class="bg-rose-50/60 rounded-2xl p-4 border border-rose-100/80 text-left space-y-1.5">
                        <div class="flex items-center justify-between">
                            <span class="text-[10px] font-bold uppercase tracking-wider text-rose-600">Verification ID</span>
                            <span class="font-mono font-black text-xs text-slate-900 bg-white px-2 py-0.5 rounded-lg border border-rose-200 shadow-2xs">{{ $deletingCertificate->certificate_number }}</span>
                        </div>
                        <p class="text-sm font-black text-slate-900 leading-tight">{{ $deletingCertificate->student_name }}</p>
                        <p class="text-xs text-slate-600 font-medium leading-tight">{{ $deletingCertificate->course_name }}</p>
                    </div>
                @endif

                <div class="flex items-center gap-3 pt-2">
                    <button wire:click="cancelDelete" type="button"
                        class="flex-1 py-3 rounded-2xl bg-slate-100 hover:bg-slate-200 text-slate-700 font-extrabold text-xs transition-colors">
                        Cancel
                    </button>
                    <button wire:click="delete" type="button"
                        class="flex-1 py-3 rounded-2xl bg-rose-600 hover:bg-rose-500 text-white font-black text-xs shadow-md transition-all">
                        Yes, Delete Certificate
                    </button>
                </div>
            </div>
        </div>
    @endif

</div>
