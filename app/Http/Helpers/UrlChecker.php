<?php

namespace App\Http\Helpers;

use Exception;
use Illuminate\Support\Facades\Http;

class UrlChecker
{
    public static function check($url): bool
    {
        try {
            $response = Http::get($url);

            return $response->status() == 200;
        } catch (Exception $e) {
            return false;
        }
    }
}
