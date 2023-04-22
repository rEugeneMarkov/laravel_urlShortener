<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class SetLocale
{
    public function handle(Request $request, Closure $next)
    {
        if (session('locale') !== null) {
            $locale = session('locale');
        } else {
            $locale = 'en';
        }
        URL::defaults(['locale' => $locale]);
        app()->setLocale($locale);
        return $next($request);
    }
}
