<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_StudentProfile extends Model
{
    use HasFactory;
    protected $table="student_profiles";
    protected $fillable = [
        'user_id',
        'level_sekolah',
        'kebutuhan_belajar',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
