<?php

namespace App\Livewire\Admin;

use App\Models\Stat;
use Livewire\Component;
use Livewire\WithPagination;

class StatIndex extends Component
{
    use WithPagination;

    public bool $showForm = false;
    public bool $showDeleteModal = false;
    public ?int $editingId = null;
    public ?int $deletingId = null;

    public string $label = '';
    public string $value = '';
    public string $description = '';
    public string $icon = '✨';
    public int $order = 1;
    public bool $is_active = true;

    protected function rules(): array
    {
        return [
            'label' => 'required|string|max:255',
            'value' => 'required|string|max:100',
            'description' => 'nullable|string|max:500',
            'icon' => 'nullable|string|max:50',
            'order' => 'required|integer|min:0',
            'is_active' => 'boolean',
        ];
    }

    public function create(): void
    {
        $this->reset(['label', 'value', 'description', 'editingId']);
        $this->icon = '✨';
        $this->order = Stat::max('order') + 1;
        $this->is_active = true;
        $this->showForm = true;
    }

    public function edit(int $id): void
    {
        $stat = Stat::findOrFail($id);
        $this->editingId = $id;
        $this->label = $stat->label;
        $this->value = $stat->value;
        $this->description = $stat->description ?? '';
        $this->icon = $stat->icon ?? '✨';
        $this->order = $stat->order;
        $this->is_active = $stat->is_active;
        $this->showForm = true;
    }

    public function save(): void
    {
        $this->validate();

        $data = [
            'label' => $this->label,
            'value' => $this->value,
            'description' => $this->description,
            'icon' => $this->icon,
            'order' => $this->order,
            'is_active' => $this->is_active,
        ];

        if ($this->editingId) {
            Stat::findOrFail($this->editingId)->update($data);
            session()->flash('success', 'Academy statistic updated successfully.');
        } else {
            Stat::create($data);
            session()->flash('success', 'Academy statistic created successfully.');
        }

        $this->showForm = false;
    }

    public function toggleActive(int $id): void
    {
        $stat = Stat::findOrFail($id);
        $stat->update(['is_active' => !$stat->is_active]);
        session()->flash('success', 'Statistic status updated.');
    }

    public function confirmDelete(int $id): void
    {
        $this->deletingId = $id;
        $this->showDeleteModal = true;
    }

    public function delete(): void
    {
        if ($this->deletingId) {
            Stat::findOrFail($this->deletingId)->delete();
            $this->showDeleteModal = false;
            session()->flash('success', 'Academy statistic removed successfully.');
        }
    }

    public function render()
    {
        return view('livewire.admin.stat-index', [
            'stats' => Stat::orderBy('order', 'asc')->paginate(10),
        ])->layout('components.layouts.admin', ['title' => 'Academy Stats Management']);
    }
}
