<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PromoCode extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'influencer_id',
        'discount_percent',
        'commission_percent',
        'usage_limit',
        'times_used',
        'is_active',
        'expires_at',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'discount_percent' => 'float',
        'commission_percent' => 'float',
        'expires_at' => 'datetime',
    ];

    public function influencer()
    {
        return $this->belongsTo(User::class, 'influencer_id');
    }

    public function applications()
    {
        return $this->hasMany(Application::class);
    }

    public function isValid(): bool
    {
        if (!$this->is_active) {
            return false;
        }

        if ($this->expires_at && $this->expires_at->isPast()) {
            return false;
        }

        if ($this->usage_limit !== null && $this->times_used >= $this->usage_limit) {
            return false;
        }

        return true;
    }
}
