<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\PromoCode;
use App\Models\InfluencerProfile;
use Illuminate\Support\Facades\Hash;

class PromoCodeSeeder extends Seeder
{
    public function run(): void
    {
        // Sample Influencer User
        $influencer = User::firstOrCreate(
            ['email' => 'influencer@divahouse.com'],
            [
                'name' => 'Keza Grace (Influencer)',
                'password' => Hash::make('password'),
                'phone' => '+250788123456',
                'is_active' => true,
            ]
        );

        // Influencer Profile payout setup
        InfluencerProfile::updateOrCreate(
            ['user_id' => $influencer->id],
            [
                'payout_method' => 'momo',
                'phone_number' => '+250788123456',
                'momo_name' => 'Keza Grace',
                'notes' => 'MTN Mobile Money Rwanda',
            ]
        );

        // Promo Codes
        PromoCode::updateOrCreate(
            ['code' => 'DIVA2026'],
            [
                'influencer_id' => $influencer->id,
                'discount_percent' => 10.00,
                'commission_percent' => 10.00,
                'is_active' => true,
            ]
        );

        PromoCode::updateOrCreate(
            ['code' => 'KEZA10'],
            [
                'influencer_id' => $influencer->id,
                'discount_percent' => 10.00,
                'commission_percent' => 10.00,
                'is_active' => true,
            ]
        );
    }
}
