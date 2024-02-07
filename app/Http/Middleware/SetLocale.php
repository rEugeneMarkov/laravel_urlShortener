<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class SetLocale
{
    public function handle(Request $request, Closure $next)
    {
        $locale = $request->getPreferredLanguage(['en', 'ru']);

        if ($request->cookie('locale') !== null) {
            $locale = $request->cookie('locale');
        }

        app()->setLocale($locale);

        return $next($request);
    }
}
