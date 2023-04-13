<?php

namespace App\Http\Services;

use Exception;
use App\Models\Link;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

class LinkService
{
    public function store(Request $request): array
    {
        $data['link'] = $request->link;
        $data['title'] = $this->getTitle($request->link);
        $data['back_halve'] = Str::random(5);
        $data['user_id'] = auth()->user()->id;

        return $data;
    }

    public function getTitle(string $link): string
    {
        try {
            $response = Http::get($link);
            $html = $response->body();
            preg_match('/<title[^>]*>(.*?)<\/title>/is', $html, $matches);
            $pageTitle = $matches[1] ?? '';
        } catch (Exception $exception) {
            $message = $exception->getMessage();
            $pageTitle = '';
        }

        return $pageTitle;
    }
}
