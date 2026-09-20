<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InfluencerProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'payout_method',
        'phone_number',
        'momo_name',
        'bank_name',
        'bank_account_number',
        'bank_account_name',
        'notes',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
