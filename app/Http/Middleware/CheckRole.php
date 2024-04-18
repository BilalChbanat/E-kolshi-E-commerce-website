<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|array  $roles
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        // Check if the user is authenticated
        if (Auth::check()) {
            // Check if the user has any of the specified roles
            foreach ($roles as $role) {
                if (Auth::user()->hasRole($role)) {
                    return $next($request);
                }
            }
        }

        // Redirect unauthorized users
        return redirect('/login')->with('error', 'Unauthorized access');
    }
}
