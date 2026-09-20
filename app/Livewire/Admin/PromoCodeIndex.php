<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\PromoCode;
use App\Models\User;

class PromoCodeIndex extends Component
{
    use WithPagination;

    public string $code = '';
    public ?int $influencer_id = null;
    public float $discount_percent = 10.0;
    public float $commission_percent = 10.0;
    public ?int $usage_limit = null;
    public bool $is_active = true;

    public ?int $editingId = null;
    public bool $showModal = false;

    protected $rules = [
        'code' => 'required|string|max:50',
        'influencer_id' => 'nullable|exists:users,id',
        'discount_percent' => 'required|numeric|min:0|max:100',
        'commission_percent' => 'required|numeric|min:0|max:100',
        'usage_limit' => 'nullable|integer|min:1',
        'is_active' => 'boolean',
    ];

    public function openCreateModal()
    {
        $this->reset(['code', 'influencer_id', 'discount_percent', 'commission_percent', 'usage_limit', 'is_active', 'editingId']);
        $this->showModal = true;
    }

    public function openEditModal(int $id)
    {
        $promo = PromoCode::findOrFail($id);
        $this->editingId = $promo->id;
        $this->code = $promo->code;
        $this->influencer_id = $promo->influencer_id;
        $this->discount_percent = (float) $promo->discount_percent;
        $this->commission_percent = (float) $promo->commission_percent;
        $this->usage_limit = $promo->usage_limit;
        $this->is_active = $promo->is_active;

        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->reset(['code', 'influencer_id', 'discount_percent', 'commission_percent', 'usage_limit', 'is_active', 'editingId']);
    }

    public function save()
    {
        $this->validate();

        $codeUpper = strtoupper(trim($this->code));

        if ($this->editingId) {
            $promo = PromoCode::findOrFail($this->editingId);
            $promo->update([
                'code' => $codeUpper,
                'influencer_id' => $this->influencer_id,
                'discount_percent' => $this->discount_percent,
                'commission_percent' => $this->commission_percent,
                'usage_limit' => $this->usage_limit,
                'is_active' => $this->is_active,
            ]);
            session()->flash('success', "Promo Code {$codeUpper} updated successfully.");
        } else {
            PromoCode::create([
                'code' => $codeUpper,
                'influencer_id' => $this->influencer_id,
                'discount_percent' => $this->discount_percent,
                'commission_percent' => $this->commission_percent,
                'usage_limit' => $this->usage_limit,
                'is_active' => $this->is_active,
            ]);
            session()->flash('success', "Promo Code {$codeUpper} created successfully.");
        }

        $this->closeModal();
    }

    public function toggleActive(int $id)
    {
        $promo = PromoCode::findOrFail($id);
        $promo->update(['is_active' => !$promo->is_active]);
        session()->flash('success', "Promo code {$promo->code} active status toggled.");
    }

    public function render()
    {
        $promoCodes = PromoCode::with(['influencer', 'applications'])
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        $influencers = User::orderBy('name')->get();

        return view('livewire.admin.promo-code-index', compact('promoCodes', 'influencers'))
            ->layout('layouts.admin', ['header' => 'Promo Codes & Influencer Commissions']);
    }
}
