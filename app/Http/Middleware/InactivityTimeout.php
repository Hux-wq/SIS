<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Inertia\Inertia;

class InactivityTimeout
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $timeout = 20;

        
        if (Auth::check()) {
            
            $lastActivity = session('last_activity_time');

            if ($lastActivity && Carbon::parse($lastActivity)->addMinutes($timeout)->isPast()) {
                Auth::logout(); 
                session()->invalidate();
                session()->regenerateToken();

                
                session(['session_expired' => true]);
                
                return Inertia::render('Login');
            }

            session(['last_activity_time' => now()]);
        }
        return $next($request);
    }
}
