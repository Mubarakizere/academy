<div class="space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900 font-heading">Alumni Reviews Management</h1>
            <p class="text-sm text-gray-600">Manage alumni testimonials and student success stories displayed on the homepage.</p>
        </div>
        <button wire:click="create" class="bg-yellow-400 hover:bg-yellow-300 text-slate-950 font-bold px-4 py-2.5 rounded-xl text-xs uppercase tracking-wider transition-all shadow-sm">
            + Add New Review
        </button>
    </div>

    @if (session()->has('success'))
        <div class="p-4 bg-emerald-50 border border-emerald-200 text-emerald-800 rounded-xl text-xs font-semibold">
            {{ session('success') }}
        </div>
    @endif

    {{-- Reviews Table --}}
    <div class="bg-white rounded-2xl border border-gray-200 overflow-hidden shadow-xs">
        <table class="w-full text-left border-collapse text-xs">
            <thead>
                <tr class="bg-gray-50 border-b border-gray-200 text-gray-600 font-bold uppercase tracking-wider">
                    <th class="p-4">Student</th>
                    <th class="p-4">Role & Location</th>
                    <th class="p-4">Course</th>
                    <th class="p-4">Comment</th>
                    <th class="p-4">Status</th>
                    <th class="p-4 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 font-medium text-gray-800">
                @forelse ($reviews as $rev)
                    <tr class="hover:bg-gray-50/80 transition-colors">
                        <td class="p-4 flex items-center gap-3">
                            <span class="w-8 h-8 rounded-lg bg-slate-900 text-yellow-400 font-bold text-xs flex items-center justify-center shrink-0">
                                {{ $rev->avatar_initials ?: 'DH' }}
                            </span>
                            <span class="font-bold text-gray-900">{{ $rev->student_name }}</span>
                        </td>
                        <td class="p-4">
                            <p class="font-semibold text-gray-900">{{ $rev->role_title }}</p>
                            <span class="text-amber-600 text-[11px] font-bold">{{ $rev->location }}</span>
                        </td>
                        <td class="p-4">
                            <span class="bg-gray-100 text-gray-800 px-2.5 py-1 rounded-md text-[11px] font-bold">
                                {{ $rev->course_name }}
                            </span>
                        </td>
                        <td class="p-4 max-w-xs truncate text-gray-600">
                            "{{ $rev->comment }}"
                        </td>
                        <td class="p-4">
                            <button wire:click="toggleActive({{ $rev->id }})"
                                class="px-2.5 py-1 rounded-full text-[10px] font-bold uppercase transition-colors {{ $rev->is_active ? 'bg-emerald-100 text-emerald-800' : 'bg-gray-100 text-gray-500' }}">
                                {{ $rev->is_active ? 'Active' : 'Disabled' }}
                            </button>
                        </td>
                        <td class="p-4 text-right space-x-2">
                            <button wire:click="edit({{ $rev->id }})" class="text-blue-600 hover:text-blue-800 font-bold">Edit</button>
                            <button wire:click="confirmDelete({{ $rev->id }})" class="text-red-600 hover:text-red-800 font-bold">Delete</button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="p-8 text-center text-gray-500 font-medium">No reviews found. Click "Add New Review" to create one.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div class="p-4 border-t border-gray-100">
            {{ $reviews->links() }}
        </div>
    </div>

    {{-- Form Modal --}}
    @if ($showForm)
        <div class="fixed inset-0 z-50 bg-slate-900/60 backdrop-blur-xs flex items-center justify-center p-4">
            <div class="bg-white rounded-2xl max-w-lg w-full p-6 space-y-4 shadow-xl border border-gray-200">
                <h3 class="text-lg font-bold text-gray-900 font-heading">
                    {{ $editingId ? 'Edit Alumni Review' : 'Create Alumni Review' }}
                </h3>

                <div class="space-y-3 text-xs">
                    <div>
                        <label class="block font-bold text-gray-700 mb-1">Student Name</label>
                        <input type="text" wire:model="student_name" class="w-full rounded-xl border-gray-300 p-2.5 focus:ring-yellow-400 focus:border-yellow-400">
                    </div>
                    <div class="grid grid-cols-2 gap-3">
                        <div>
                            <label class="block font-bold text-gray-700 mb-1">Role Title</label>
                            <input type="text" wire:model="role_title" class="w-full rounded-xl border-gray-300 p-2.5 focus:ring-yellow-400 focus:border-yellow-400">
                        </div>
                        <div>
                            <label class="block font-bold text-gray-700 mb-1">Location</label>
                            <select wire:model="location" class="w-full rounded-xl border-gray-300 p-2.5 focus:ring-yellow-400 focus:border-yellow-400">
                                <option value="Kigali">Kigali</option>
                                <option value="Nairobi">Nairobi</option>
                                <option value="Mombasa">Mombasa</option>
                            </select>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-3">
                        <div>
                            <label class="block font-bold text-gray-700 mb-1">Course Name</label>
                            <select wire:model="course_name" class="w-full rounded-xl border-gray-300 p-2.5 focus:ring-yellow-400 focus:border-yellow-400">
                                <option value="Lashes Artistry">Lashes Artistry</option>
                                <option value="Pro Makeup">Pro Makeup</option>
                            </select>
                        </div>
                        <div>
                            <label class="block font-bold text-gray-700 mb-1">Rating (1-5)</label>
                            <input type="number" min="1" max="5" wire:model="rating" class="w-full rounded-xl border-gray-300 p-2.5 focus:ring-yellow-400 focus:border-yellow-400">
                        </div>
                    </div>
                    <div>
                        <label class="block font-bold text-gray-700 mb-1">Review Quote / Comment</label>
                        <textarea wire:model="comment" rows="3" class="w-full rounded-xl border-gray-300 p-2.5 focus:ring-yellow-400 focus:border-yellow-400"></textarea>
                    </div>
                    <div class="flex items-center gap-4 pt-2">
                        <label class="flex items-center gap-2 font-bold text-gray-700">
                            <input type="checkbox" wire:model="is_active" class="rounded text-yellow-400 focus:ring-yellow-400">
                            <span>Active (Visible on Homepage)</span>
                        </label>
                    </div>
                </div>

                <div class="flex justify-end gap-3 pt-4 border-t border-gray-100">
                    <button wire:click="$set('showForm', false)" class="px-4 py-2 rounded-xl text-xs font-bold bg-gray-100 text-gray-700 hover:bg-gray-200">Cancel</button>
                    <button wire:click="save" class="px-4 py-2 rounded-xl text-xs font-extrabold bg-yellow-400 text-slate-950 hover:bg-yellow-300">Save Review</button>
                </div>
            </div>
        </div>
    @endif

    {{-- Delete Modal --}}
    @if ($showDeleteModal)
        <div class="fixed inset-0 z-50 bg-slate-900/60 backdrop-blur-xs flex items-center justify-center p-4">
            <div class="bg-white rounded-2xl max-w-sm w-full p-6 space-y-4 shadow-xl border border-gray-200 text-center">
                <h3 class="text-base font-bold text-gray-900">Delete Review?</h3>
                <p class="text-xs text-gray-600">Are you sure you want to delete this alumni review? This action cannot be undone.</p>
                <div class="flex justify-center gap-3 pt-2">
                    <button wire:click="$set('showDeleteModal', false)" class="px-4 py-2 rounded-xl text-xs font-bold bg-gray-100 text-gray-700">Cancel</button>
                    <button wire:click="delete" class="px-4 py-2 rounded-xl text-xs font-bold bg-red-600 text-white hover:bg-red-700">Delete</button>
                </div>
            </div>
        </div>
    @endif
</div>
