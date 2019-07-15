<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use Auth;
use Symfony\Component\Finder\Exception\AccessDeniedException;

class IsAdministrator
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
        if (Auth::check()) {
            if (!(Auth::user()->user_type == User::USER_ADMIN)) {
                //            if ($request->ajax()) {
                //                return response('Forbidden', 403);
                //            }
                //            else
                //            {
                ////                throw new AccessDeniedException('Forbidden');
                //                return redirect()->back();
                //            }
                return redirect()->route('index');
            }
            return $next($request);
        }
        return redirect()->route('login');
    }
}
