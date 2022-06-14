<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsUserBanned
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        abort_if(auth()->user()->banned == 'yes', 403, 'you are banned');

        if (auth()->user()->isBanned()) {
            dd('yes banned');
        }

        return $next($request);
    }
}
