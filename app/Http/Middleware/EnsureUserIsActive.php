<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class EnsureUserIsActive
{

    public function handle(Request $request, Closure $next): Response
    {

        // dd("hello");
        if (Auth::check()) {
            $user = Auth::user();

            if ($user->is_active != 1) {
                Auth::logout();
                return redirect('/login')->with('error', 'Your account is not activated yet. Please contact admin.');
            }

            return $next($request);
        }

        return redirect('/login');
    
    }
}
