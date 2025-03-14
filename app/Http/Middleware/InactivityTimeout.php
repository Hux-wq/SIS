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
        $timeout = 120;

        
        if (Auth::check()) {
            
            $lastActivity = session('last_activity_time');

            // In the InactivityTimeout Middleware
            if ($lastActivity && Carbon::parse($lastActivity)->addMinutes($timeout)->isPast()) {
            Auth::logout(); 
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            // For session timeout
            return redirect()->route('login')->with(['status'=>'error', 'message'=>'Your session has expired. Please log in again.']);
            }

            session(['last_activity_time' => now()]);
        }
        return $next($request);
    }
}
