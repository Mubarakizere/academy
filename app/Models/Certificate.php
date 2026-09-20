<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    use HasFactory;

    protected $fillable = [
        'certificate_number',
        'student_name',
        'student_email',
        'course_name',
        'course_id',
        'issue_date',
        'grade',
        'location',
        'is_valid',
        'notes',
    ];

    protected $casts = [
        'issue_date' => 'date',
        'is_valid' => 'boolean',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
