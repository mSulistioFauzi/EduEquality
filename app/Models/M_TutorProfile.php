<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_TutorProfile extends Model
{
    use HasFactory;
    protected $table="tutor_profiles";
    protected $fillable = [
        'user_id',
        'bio',
        'verification_status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function subjects()
    {
        return $this->belongsToMany(
            M_Subject::class,
            'tutor_subjects'
        )->withTimestamps();
    }
}
