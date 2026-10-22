<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_TutoringSession extends Model
{
    use HasFactory;
    protected $table="tutoring_sessions";
    protected $fillable = [
        'help_request_id',
        'tutor_id',
        'scheduled_at',
        'mode_belajar',
        'lokasi',
        'status',
        'session_notes',
    ];

    protected $casts = [
        'scheduled_at' => 'datetime',
    ];

    public function helpRequest()
    {
        return $this->belongsTo(M_HelpRequest::class);
    }

    public function tutor()
    {
        return $this->belongsTo(User::class, 'tutor_id');
    }
}
