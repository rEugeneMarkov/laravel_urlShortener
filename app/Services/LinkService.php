<?php

namespace App\Services;

use App\Http\Helpers\PageTitleFetcher;
use App\Http\Requests\LinkStoreRequest;
use App\Models\Link;
use Illuminate\Support\Str;

class LinkService
{
    public function store(LinkStoreRequest $request): array
    {
        $data = $request->validated();

        $data['title'] = PageTitleFetcher::getTitle($data['link']);
        $data['back_halve'] = $this->getBackHalve();
        $data['user_id'] = auth()->user()->id;

        return $data;
    }

    private function getBackHalve(): string
    {
        $backHalve = Str::random(5);
        $link = Link::where('back_halve', $backHalve)->get();

        if ($link->isEmpty()) {
            return $backHalve;
        }

        return $this->getBackHalve();
    }
}
