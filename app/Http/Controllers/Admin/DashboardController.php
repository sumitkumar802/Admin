<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
Use App\Models\User;
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

    public function UserList()
    {
        $users = User::where('role','user')->get();
        // dd($user);
        return view('admin.tables',['users'=>$users]);
    }
}
