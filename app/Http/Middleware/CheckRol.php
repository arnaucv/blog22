<?php

namespace App\Http\Middleware;

use Closure;

class CheckRol
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $rol)
    {
        if (! $request -> user() -> hasRol($rol)) {
            return redirect('home');
            // abort(403, 'Non authorized');
        }
        return $next($request);
    }
}
