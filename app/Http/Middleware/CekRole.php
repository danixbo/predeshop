<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CekRole
{
    public function handle(Request $request, Closure $next, $roles)
    {
        // Debug untuk melihat role user
        // dd(Auth::guard('admin')->user()->role);
        
        if (!Auth::guard('admin')->check()) {
            return redirect('login');
        }

        $allowedRoles = explode(',', $roles);
        
        if (in_array(Auth::guard('admin')->user()->role, $allowedRoles)) {
            return $next($request);
        }

        return redirect('dashboard')->with('error', 'Unauthorized');
    }
}
