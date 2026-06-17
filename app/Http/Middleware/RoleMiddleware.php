<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        // cek apakah user login
        if (!auth()->check()) {
            abort(403, 'Unauthorized');
        }

        // Log untuk debug
        \Illuminate\Support\Facades\Log::info('Role Check:', [
            'url' => $request->fullUrl(),
            'user_role' => auth()->user()->role,
            'allowed_roles' => $roles
        ]);

        // cek apakah role user sesuai
        if (!in_array(trim(auth()->user()->role), $roles)) {
            abort(403, 'Akses ditolak. Role Anda: ' . auth()->user()->role . '. Dibutuhkan: ' . implode(', ', $roles));
        }

        return $next($request);
    }
}