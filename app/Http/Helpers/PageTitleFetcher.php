<?php

namespace App\Http\Helpers;

use Exception;
use Illuminate\Support\Facades\Http;

class PageTitleFetcher
{
    public static function getTitle($url): ?string
    {
        if (! UrlChecker::check($url)) {
            return null;
        }

        try {
            $response = Http::get($url);
            $html = $response->body();
            preg_match('/<title>([^<]*)<\/title>/', $html, $matches);

            return isset($matches[1]) ? $matches[1] : null;
        } catch (Exception $e) {
            return null;
        }
    }
}
