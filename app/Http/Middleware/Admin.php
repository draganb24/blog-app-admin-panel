<?php

namespace App\Http\Middleware;

use App\Models\CurrentlyLoggedInUser;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $userAgent = md5($request->header('User-Agent'));

        $loggedInUser = CurrentlyLoggedInUser::where('browser', $userAgent)
                                             ->first();

        if ($loggedInUser) {
            return $next($request);
        }

        abort(401);
    }
}
