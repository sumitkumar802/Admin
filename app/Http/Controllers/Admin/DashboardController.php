<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function superAdminDashboard()
    {
        return view('superadmin.dashboard');
    }

    public function adminDashboard()
    {
        return view('admin.dashboard');
    }
}
