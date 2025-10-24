<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        $user = $request->user();

        // dd($user->role, $role);
        if (!$user || $user->role !== $role) {
            return redirect()->route('dashboard')->with('error', 'Lu gabisa akses yang ini bro 😭');
        }


    return $next($request);
    }

}
