<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Auth;
use Closure;
use Illuminate\Http\Request;

class UserActivity
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            $expiresAt = Carbon::now()->addSecond(10);
            Cache::put('userOnline' . Auth::user()->id, true, $expiresAt);
        }
        return $next($request);
    }
}
