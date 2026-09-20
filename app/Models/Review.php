<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_name',
        'avatar_initials',
        'role_title',
        'location',
        'course_name',
        'rating',
        'comment',
        'is_featured',
        'is_active',
        'order',
    ];

    protected $casts = [
        'rating' => 'integer',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
        'order' => 'integer',
    ];
}
