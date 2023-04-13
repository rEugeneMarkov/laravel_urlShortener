<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Http\Request;
use App\Http\Services\LinkService;

class LinkController extends Controller
{
    public function __construct(private LinkService $service)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $links = Link::where('user_id', '=', auth()->user()->id)->paginate(10);
        return view('personal.link.index', compact('links'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('personal.link.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $this->service->store($request);
        Link::firstOrCreate($data);

        return redirect()->route('personal.link.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Link $link)
    {
        return view('personal.link.show', compact('link'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Link $link)
    {
        return view('personal.link.edit', compact('link'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Link $link)
    {
        $data = [
            'title' => $request->title,
            'link' => $request->link,
        ];
        $link->update($data);
        return view('personal.link.show', compact('link'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Link $link)
    {
        $link->delete();
        return redirect()->route('personal.link.index');
    }

    public function link(Link $link)
    {
        $transitions = $link->transitions + 1;
        $link->update(['transitions' => $transitions]);
        return redirect()->away($link->link);
    }
}
