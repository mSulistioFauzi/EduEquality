<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class C_TutorDashboard extends Controller
{
    public function index()
    {
        return view('tutor.dashboard');
    }
}
