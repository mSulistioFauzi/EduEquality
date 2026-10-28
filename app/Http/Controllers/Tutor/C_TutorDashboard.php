<?php

namespace App\Http\Controllers\Tutor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class C_TutorDashboard extends Controller
{
    public function index()
    {
        return view('tutor.dashboard');
    }
}
