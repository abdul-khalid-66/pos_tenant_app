<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class TenantAuthenticate
{
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        // Your custom authentication logic
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // Additional checks (e.g., Spatie permissions)
        if (Auth::user()->cannot('access-route')) {
            return redirect()->route('admin.dashboard');
        }

        return $next($request);
    }
}
