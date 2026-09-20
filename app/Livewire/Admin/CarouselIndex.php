<?php

namespace App\Livewire\Admin;

use App\Models\Carousel;
use Livewire\Component;
use Livewire\WithPagination;

class CarouselIndex extends Component
{
    use WithPagination;

    public bool $showForm = false;
    public bool $showDeleteModal = false;
    public ?int $editingId = null;
    public ?int $deletingId = null;

    public string $title = '';
    public string $badge = '';
    public string $subtitle = '';
    public string $image = '';
    public string $button_text = 'Explore Course';
    public string $button_link = '/courses';
    public int $order = 1;
    public bool $is_active = true;

    protected function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'badge' => 'nullable|string|max:255',
            'subtitle' => 'nullable|string|max:500',
            'image' => 'required|string',
            'button_text' => 'required|string|max:100',
            'button_link' => 'required|string|max:255',
            'order' => 'required|integer|min:0',
            'is_active' => 'boolean',
        ];
    }

    public function create(): void
    {
        $this->reset(['title', 'badge', 'subtitle', 'image', 'editingId']);
        $this->button_text = 'Explore Course';
        $this->button_link = '/courses';
        $this->order = Carousel::max('order') + 1;
        $this->is_active = true;
        $this->showForm = true;
    }

    public function edit(int $id): void
    {
        $slide = Carousel::findOrFail($id);
        $this->editingId = $id;
        $this->title = $slide->title;
        $this->badge = $slide->badge ?? '';
        $this->subtitle = $slide->subtitle ?? '';
        $this->image = $slide->image;
        $this->button_text = $slide->button_text;
        $this->button_link = $slide->button_link;
        $this->order = $slide->order;
        $this->is_active = $slide->is_active;
        $this->showForm = true;
    }

    public function save(): void
    {
        $this->validate();

        $data = [
            'title' => $this->title,
            'badge' => $this->badge,
            'subtitle' => $this->subtitle,
            'image' => $this->image,
            'button_text' => $this->button_text,
            'button_link' => $this->button_link,
            'order' => $this->order,
            'is_active' => $this->is_active,
        ];

        if ($this->editingId) {
            Carousel::findOrFail($this->editingId)->update($data);
            session()->flash('success', 'Hero Carousel slide updated successfully.');
        } else {
            Carousel::create($data);
            session()->flash('success', 'Hero Carousel slide created successfully.');
        }

        $this->showForm = false;
    }

    public function toggleActive(int $id): void
    {
        $slide = Carousel::findOrFail($id);
        $slide->update(['is_active' => !$slide->is_active]);
        session()->flash('success', 'Slide status updated.');
    }

    public function confirmDelete(int $id): void
    {
        $this->deletingId = $id;
        $this->showDeleteModal = true;
    }

    public function delete(): void
    {
        if ($this->deletingId) {
            Carousel::findOrFail($this->deletingId)->delete();
            $this->showDeleteModal = false;
            session()->flash('success', 'Hero Carousel slide removed successfully.');
        }
    }

    public function render()
    {
        return view('livewire.admin.carousel-index', [
            'carousels' => Carousel::orderBy('order', 'asc')->paginate(10),
        ])->layout('components.layouts.admin', ['title' => 'Hero Carousel Management']);
    }
}
