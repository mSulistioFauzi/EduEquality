<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_Subject extends Model
{
    use HasFactory;
    protected $table="subjects";
    protected $fillable = [
        'nama',
        'deskripsi',
    ];

    public function tutors()
    {
        return $this->belongsToMany(
            M_TutorProfile::class,
            'tutor_subjects'
        )->withTimestamps();
    }

    public function helpRequests()
    {
        return $this->hasMany(M_HelpRequest::class);
    }
}
