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
        $loggedInUser = CurrentlyLoggedInUser::first(); // Assuming the table has only one record for the logged-in user

        if ($loggedInUser) {
            return $next($request);
        }

        abort(401);
    }
}
