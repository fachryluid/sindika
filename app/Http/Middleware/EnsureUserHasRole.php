<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserHasRole
{
    public function handle(Request $request, Closure $next, $role)
    {
        if (! $request->user()->hasRole($role)) {
        return redirect()
            ->back()
            ->withErrors(['message' => 'Role tidak sah.']);
        }

        return $next($request);
    }
}
