<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetLocaleMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if($request->has('locale'))
        {
            app()->setLocale($request->get('locale'));
        }

        if($request->hasHeader('locale'))
        {
            app()->setLocale($request->get('locale'));
        }

        return $next($request);
    }
}
