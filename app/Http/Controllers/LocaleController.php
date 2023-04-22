<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Redirect;

class LocaleController extends Controller
{
    public function change(Request $request)
    {
        $locale = $request->locale;
        $route = $request->route;
        session(['locale' => $locale]);
        URL::defaults(['locale' => $locale]);
        return redirect()->back();
    }
}
