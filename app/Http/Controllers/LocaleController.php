<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class LocaleController extends Controller
{
    public function change(Request $request)
    {
        $locale = $request->locale;
        // session(['locale' => $locale]);
        $cookie = cookie()->forever('locale', $locale);

        return redirect()->back()->withCookie($cookie);
    }
}
