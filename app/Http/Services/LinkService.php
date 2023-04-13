<?php

namespace App\Http\Services;

use Exception;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class LinkService
{
    public function store(Request $request): array
    {
        $data['link'] = $request->link;
        $data['title'] = self::getTitle($request->link);
        $data['back_halve'] = Str::random(5);
        $data['user_id'] = auth()->user()->id;

        return $data;
    }

    public static function getTitle(string $link): string
    {
        try {
            $response = Http::get($link);
            $html = $response->body();
            preg_match('/<title[^>]*>(.*?)<\/title>/is', $html, $matches);
            $pageTitle = $matches[1] ?? '';
        } catch (Exception $exception) {
            $pageTitle = '';
        }

        return $pageTitle;
    }
}
