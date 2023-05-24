<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Session;
use Symfony\Component\HttpFoundation\Response;

class LanguageMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @return Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Session::has('locale') AND array_key_exists(Session::get('locale'), config('app.languages'))) {
            app()->setLocale(Session::get('locale'));
        }else{
            app()->setLocale(config('app.locale'));
        }
        return $next($request);
    }
}
