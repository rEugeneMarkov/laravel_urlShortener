<?php

namespace App\Services;

use Illuminate\Support\Str;
use App\Http\Helpers\PageTitleFetcher;
use App\Http\Requests\LinkStoreRequest;

class LinkService
{
    public function store(LinkStoreRequest $request): array
    {
        $data = $request->validated();

        $data['title'] = PageTitleFetcher::getTitle($data['link']);
        $data['back_halve'] = Str::random(5);
        $data['user_id'] = auth()->user()->id;

        return $data;
    }
}
