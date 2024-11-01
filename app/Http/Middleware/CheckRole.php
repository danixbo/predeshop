<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (!Auth::guard('admin')->check()) {
            return redirect()->route('login')
                ->with('error', 'Silahkan login terlebih dahulu.');
        }

        $user = Auth::guard('admin')->user();
        
        // Konversi role yang diterima ke string untuk memastikan tipe data sama
        $userRole = (string) $user->role;
        $allowedRoles = array_map('strval', $roles);

        if (!in_array($userRole, $allowedRoles)) {
            return redirect()->route('dashboard')
                ->with('error', 'Anda tidak memiliki akses ke halaman tersebut.');
        }

        return $next($request);
    }
}
