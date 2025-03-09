<?php

namespace App\Http\Middleware\Admin;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\DashboardController;

class RolesMiddleware
{

    public function handle(Request $request, Closure $next, string $role): Response

    {
        // dd($role);
        if (!Auth::check() || Auth::user()->role !== $role) {
            dd($role);
            abort(403, 'Unauthorized Access');
        }
        return $next($request);
    }
}
