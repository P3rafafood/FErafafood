<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PasetoAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (session('token')) {
            $token = $request->header('Authorization', 'Bearer '.session('token'));

            if (!$token) {
                return abort(403);
            }
            return $next($request);
        } else {
            return redirect()->route('login');
        }
    }
}
