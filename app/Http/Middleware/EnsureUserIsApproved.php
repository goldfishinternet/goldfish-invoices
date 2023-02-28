<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;

class EnsureUserIsApproved
{
    public function handle($request, Closure $next)
    {
        if (!$request->user() || !$request->user()->is_approved) {
            return $request->expectsJson()
                ? abort(403, 'Your account is awaiting administrator approval.')
                : Redirect::guest(URL::route('approval.notice'));
        }

        return $next($request);
    }
}
