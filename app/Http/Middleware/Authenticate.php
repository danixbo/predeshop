<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('login');
        }

        if (\Illuminate\Support\Facades\Auth::guard('admin')->check()) {
            return route('dashboard');
        }

        if (\Illuminate\Support\Facades\Auth::guard('kasir')->check()) {
            return route('dashboard');
        }
    }
}
