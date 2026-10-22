<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class C_StudentDashboard extends Controller
{
    public function index()
    {
        return view('student.dashboard');
    }
}
