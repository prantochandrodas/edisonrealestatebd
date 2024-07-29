<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Facades\JWTAuth;

class JwtMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        try {
            $token = $request->session()->get('jwt_token');
            if (!$token) {
                return redirect('login');
            }

            $user = JWTAuth::setToken($token)->authenticate();
            if (!$user) {
                return redirect('login');
            }
        } catch (Exception $e) {
            return redirect('login');
        }

        return $next($request);
    }
}
