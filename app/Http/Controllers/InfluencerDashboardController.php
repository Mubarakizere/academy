<?php

namespace App\Http\Controllers;

use App\Models\InfluencerProfile;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InfluencerDashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        
        $profile = $user->influencerProfile ?: InfluencerProfile::create([
            'user_id' => $user->id,
            'payout_method' => 'momo',
            'phone_number' => $user->phone,
        ]);

        $promoCodes = $user->promoCodes;

        $applications = Application::where('influencer_id', $user->id)
            ->with(['course', 'promoCode'])
            ->orderBy('created_at', 'desc')
            ->get();

        $pendingApps = $applications->where('payment_status', 'pending_verification');
        $confirmedApps = $applications->where('payment_status', 'verified_paid')->where('payout_status', '!=', 'transferred');
        $transferredApps = $applications->where('payout_status', 'transferred');

        return view('influencer.dashboard', compact(
            'user',
            'profile',
            'promoCodes',
            'applications',
            'pendingApps',
            'confirmedApps',
            'transferredApps'
        ));
    }

    public function updatePayoutProfile(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'payout_method' => 'required|string|in:momo,mpesa,bank',
            'phone_number' => 'nullable|string|max:30',
            'momo_name' => 'nullable|string|max:255',
            'bank_name' => 'nullable|string|max:255',
            'bank_account_number' => 'nullable|string|max:255',
            'bank_account_name' => 'nullable|string|max:255',
            'notes' => 'nullable|string',
        ]);

        InfluencerProfile::updateOrCreate(
            ['user_id' => $user->id],
            $validated
        );

        return redirect()->back()->with('success', 'Your payout account settings have been updated successfully.');
    }
}
