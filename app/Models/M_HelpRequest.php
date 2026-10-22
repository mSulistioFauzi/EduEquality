<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_HelpRequest extends Model
{
    use HasFactory;
    protected $table="help_requests";
    protected $fillable = [
        'student_id',
        'subject_id',
        'title',
        'deskripsi',
        'status',
        'reviewed_by',
        'admin_notes',
    ];

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    public function subject()
    {
        return $this->belongsTo(M_Subject::class);
    }

    public function reviewer()
    {
        return $this->belongsTo(User::class, 'reviewed_by');
    }

    public function sessions()
    {
        return $this->hasMany(M_TutoringSession::class);
    }
}
