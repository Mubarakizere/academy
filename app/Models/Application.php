<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $fillable = [
        'reference_no',
        'full_name',
        'email',
        'phone_code',
        'phone',
        'course_id',
        'location',
        'schedule',
        'experience',
        'notes',
        'currency',
        'original_price',
        'discount_amount',
        'final_price',
        'promo_code_id',
        'influencer_id',
        'commission_amount',
        'payment_status',
        'verified_at',
        'verified_by',
        'payout_status',
        'payout_transferred_at',
        'payout_reference',
    ];

    protected $casts = [
        'verified_at' => 'datetime',
        'payout_transferred_at' => 'datetime',
        'original_price' => 'integer',
        'discount_amount' => 'integer',
        'final_price' => 'integer',
        'commission_amount' => 'integer',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function promoCode()
    {
        return $this->belongsTo(PromoCode::class);
    }

    public function influencer()
    {
        return $this->belongsTo(User::class, 'influencer_id');
    }

    public function verifier()
    {
        return $this->belongsTo(User::class, 'verified_by');
    }
}
