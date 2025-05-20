<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        if (!auth()->check() || optional(auth()->user()->role)->name !== 'admin') {
            return response()->json([
                'error' => 'Access denied. Only admins can perform this action.'
            ], 403);
        }

        return $next($request);
    }

}
