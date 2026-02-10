<?php

namespace App\Http\Middleware;

use Closure;

class EnsureInstituteScope
{
    public function handle($request, Closure $next)
    {
        if (!$request->user() || !$request->user()->institute_id) {
            return $next($request);
        }

        $request->attributes->set('institute_id', $request->user()->institute_id);

        return $next($request);
    }
}
