<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'price_rwf',
        'price_kes',
        'price_usd',
        'duration',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'price_rwf' => 'integer',
        'price_kes' => 'integer',
        'price_usd' => 'integer',
    ];

    public function getPriceForLocation(string $location): int
    {
        return match (strtolower($location)) {
            'kigali', 'rwanda' => $this->price_rwf,
            'nairobi', 'mombasa', 'kenya' => $this->price_kes,
            default => $this->price_usd,
        };
    }

    public function getCurrencyForLocation(string $location): string
    {
        return match (strtolower($location)) {
            'kigali', 'rwanda' => 'RWF',
            'nairobi', 'mombasa', 'kenya' => 'KES',
            default => 'USD',
        };
    }

    public function applications()
    {
        return $this->hasMany(Application::class);
    }
}
