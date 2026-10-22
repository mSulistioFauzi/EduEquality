<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class C_AdminDashboard extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }
}
