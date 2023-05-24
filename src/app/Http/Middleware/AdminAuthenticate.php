<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Redirect;
use Session;
use Symfony\Component\HttpFoundation\Response;
use URL;

class AdminAuthenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->guard('admin')->check()){
            Session::put('url.intended', URL::full());
            return Redirect::to(route('admin.auth.login'));
        }
        return $next($request);
    }
}
