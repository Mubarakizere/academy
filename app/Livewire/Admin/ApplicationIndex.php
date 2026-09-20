<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Application;
use App\Mail\CommissionVerifiedInfluencerMail;
use Illuminate\Support\Facades\Mail;

class ApplicationIndex extends Component
{
    use WithPagination;

    public string $search = '';
    public string $filterLocation = '';
    public string $filterStatus = '';

    public ?int $payoutModalAppId = null;
    public string $payoutReference = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function verifyPayment(int $applicationId)
    {
        $application = Application::findOrFail($applicationId);

        $application->update([
            'payment_status' => 'verified_paid',
            'payout_status' => $application->influencer_id ? 'confirmed' : 'unearned',
            'verified_at' => now(),
            'verified_by' => auth()->id(),
        ]);

        // Send email to influencer if applicable
        if ($application->influencer && $application->influencer->email) {
            try {
                Mail::to($application->influencer->email)->send(new CommissionVerifiedInfluencerMail($application, 'verified'));
            } catch (\Exception $e) {
                logger()->error('Failed sending influencer verified mail: ' . $e->getMessage());
            }
        }

        session()->flash('success', "Payment for {$application->reference_no} ({$application->full_name}) has been verified.");
    }

    public function openPayoutModal(int $applicationId)
    {
        $this->payoutModalAppId = $applicationId;
        $this->payoutReference = '';
    }

    public function closePayoutModal()
    {
        $this->payoutModalAppId = null;
        $this->payoutReference = '';
    }

    public function recordPayout()
    {
        if (!$this->payoutModalAppId) return;

        $this->validate([
            'payoutReference' => 'required|string|max:255',
        ]);

        $application = Application::findOrFail($this->payoutModalAppId);

        $application->update([
            'payout_status' => 'transferred',
            'payout_transferred_at' => now(),
            'payout_reference' => $this->payoutReference,
        ]);

        // Send email to influencer
        if ($application->influencer && $application->influencer->email) {
            try {
                Mail::to($application->influencer->email)->send(new CommissionVerifiedInfluencerMail($application, 'transferred'));
            } catch (\Exception $e) {
                logger()->error('Failed sending influencer payout transferred mail: ' . $e->getMessage());
            }
        }

        session()->flash('success', "Payout transferred ref recorded for {$application->reference_no}.");
        $this->closePayoutModal();
    }

    public function render()
    {
        $query = Application::with(['course', 'promoCode', 'influencer', 'verifier'])
            ->orderBy('created_at', 'desc');

        if ($this->search) {
            $query->where(function($q) {
                $q->where('reference_no', 'like', "%{$this->search}%")
                  ->orWhere('full_name', 'like', "%{$this->search}%")
                  ->orWhere('email', 'like', "%{$this->search}%")
                  ->orWhere('phone', 'like', "%{$this->search}%");
            });
        }

        if ($this->filterLocation) {
            $query->where('location', $this->filterLocation);
        }

        if ($this->filterStatus) {
            $query->where('payment_status', $this->filterStatus);
        }

        $applications = $query->paginate(15);

        return view('livewire.admin.application-index', compact('applications'))
            ->layout('layouts.admin', ['header' => 'Student Applications & Commission Verification']);
    }
}
