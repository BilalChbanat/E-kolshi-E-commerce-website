<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class SellerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            $sellerRole = 'seller';

            if ($request->user()->role->name === $sellerRole) {
                return $next($request);
            }
        }

        return redirect('/')->with('error', 'Unauthorized access');
    }
}
