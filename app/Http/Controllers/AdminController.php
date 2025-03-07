<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Http\Models\User;

class AdminController extends Controller
{
    //
    public function activateUser(User $user)
    {
        $user->update(['is_active' => true]);

        Mail::to($user->email)->send(new UserActivatedMail($user));

        return back()->with('success', 'User activated successfully');
    }
}
