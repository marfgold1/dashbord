<?php

namespace App\Http\Middleware;

use Closure;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!\Auth::user()->isAdmin()) {
            if ($request->ajax()) {
                return response('Admin account required.', 401);
            } else {
                return abort(404);
            }
        }

        return $next($request);
    }
}
