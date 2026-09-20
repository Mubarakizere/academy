<?php

namespace App\Livewire\Admin;

use App\Models\Review;
use Livewire\Component;
use Livewire\WithPagination;

class ReviewIndex extends Component
{
    use WithPagination;

    public bool $showForm = false;
    public bool $showDeleteModal = false;
    public ?int $editingId = null;
    public ?int $deletingId = null;

    public string $student_name = '';
    public string $avatar_initials = '';
    public string $role_title = 'Certified Lash Artist';
    public string $location = 'Kigali';
    public string $course_name = 'Lashes Artistry';
    public int $rating = 5;
    public string $comment = '';
    public int $order = 1;
    public bool $is_active = true;
    public bool $is_featured = true;

    protected function rules(): array
    {
        return [
            'student_name' => 'required|string|max:255',
            'avatar_initials' => 'nullable|string|max:10',
            'role_title' => 'required|string|max:255',
            'location' => 'required|string|max:100',
            'course_name' => 'required|string|max:100',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string|max:1000',
            'order' => 'required|integer|min:0',
            'is_active' => 'boolean',
            'is_featured' => 'boolean',
        ];
    }

    public function create(): void
    {
        $this->reset(['student_name', 'avatar_initials', 'role_title', 'location', 'course_name', 'comment', 'editingId']);
        $this->role_title = 'Certified Lash Artist';
        $this->location = 'Kigali';
        $this->course_name = 'Lashes Artistry';
        $this->rating = 5;
        $this->order = Review::max('order') + 1;
        $this->is_active = true;
        $this->is_featured = true;
        $this->showForm = true;
    }

    public function edit(int $id): void
    {
        $review = Review::findOrFail($id);
        $this->editingId = $id;
        $this->student_name = $review->student_name;
        $this->avatar_initials = $review->avatar_initials ?? '';
        $this->role_title = $review->role_title;
        $this->location = $review->location;
        $this->course_name = $review->course_name;
        $this->rating = $review->rating;
        $this->comment = $review->comment;
        $this->order = $review->order;
        $this->is_active = $review->is_active;
        $this->is_featured = $review->is_featured;
        $this->showForm = true;
    }

    public function save(): void
    {
        $this->validate();

        $data = [
            'student_name' => $this->student_name,
            'avatar_initials' => $this->avatar_initials ?: strtoupper(substr($this->student_name, 0, 2)),
            'role_title' => $this->role_title,
            'location' => $this->location,
            'course_name' => $this->course_name,
            'rating' => $this->rating,
            'comment' => $this->comment,
            'order' => $this->order,
            'is_active' => $this->is_active,
            'is_featured' => $this->is_featured,
        ];

        if ($this->editingId) {
            Review::findOrFail($this->editingId)->update($data);
            session()->flash('success', 'Alumni review updated successfully.');
        } else {
            Review::create($data);
            session()->flash('success', 'Alumni review created successfully.');
        }

        $this->showForm = false;
    }

    public function toggleActive(int $id): void
    {
        $review = Review::findOrFail($id);
        $review->update(['is_active' => !$review->is_active]);
        session()->flash('success', 'Review status updated.');
    }

    public function confirmDelete(int $id): void
    {
        $this->deletingId = $id;
        $this->showDeleteModal = true;
    }

    public function delete(): void
    {
        if ($this->deletingId) {
            Review::findOrFail($this->deletingId)->delete();
            $this->showDeleteModal = false;
            session()->flash('success', 'Review deleted successfully.');
        }
    }

    public function render()
    {
        return view('livewire.admin.review-index', [
            'reviews' => Review::orderBy('order')->paginate(15),
        ])->layout('layouts.app');
    }
}
