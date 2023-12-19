<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SetLocale
{
    public function handle(Request $request, Closure $next)
    {
        if (session('locale') !== null) {
            $locale = session('locale');
        } else {
            $locale = 'en';
        }
        app()->setLocale($locale);

        return $next($request);
    }
}
