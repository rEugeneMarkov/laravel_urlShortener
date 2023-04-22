<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\View\View;
use App\Services\LinkService;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\LinkStoreRequest;
use App\Http\Requests\LinkUpdateRequest;

class LinkController extends Controller
{
    public function __construct(private LinkService $service)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $links = Link::where('user_id', '=', auth()->user()->id)
            ->orderBy('id', 'desc')
            ->paginate(10);
        return view('personal.link.index', compact('links'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('personal.link.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LinkStoreRequest $request, string $locale): RedirectResponse
    {
        $data = $this->service->store($request);
        Link::firstOrCreate($data);

        return redirect()->route('personal.link.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $locale, Link $link): View
    {
        return view('personal.link.show', compact('link'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $locale, Link $link): View
    {
        return view('personal.link.edit', compact('link'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LinkUpdateRequest $request, string $locale, Link $link): View
    {
        $data = $request->validated();
        $link->update($data);
        return view('personal.link.show', compact('link'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $locale, Link $link): RedirectResponse
    {
        $link->delete();
        return redirect()->route('personal.link.index');
    }

    public function link(Link $link): RedirectResponse
    {
        $transitions = $link->transitions + 1;
        $link->update(['transitions' => $transitions]);
        return redirect()->away($link->link);
    }
}
